/**
 * Absolute Map
 *
 * Author: Callum Hardy <callum.hardy@absolute-design.co.uk>
 *
 * Version: 1.0
 */

/**
 * Fall back for older browsers that don't support Object.create
 */
if( typeof Object.create !== 'function' )
{
  Object.create = function( object )
    {
    function Obj(){}
    Obj.prototype = object;
    return new Obj();
  };
}

/**
 * Fall back for older browsers that don't support Object.keys
 */
if (!Object.keys)
{
  Object.keys = function(obj)
  {
    var keys = [];

    for (var i in obj)
    {
        if (obj.hasOwnProperty(i))
        {
            keys.push(i);
        }
    }

    return keys;
  };
}

function guid()
{
  function s4()
  {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}

/**
 * Anonymous function
 */

(function( $, window, document, undefined )
{
    'use strict';

    window.absoluteMaps = [];

    var themeUrl ='https://stallioni.in/fixmycar';/// global.url.theme;

    var defaults = {

        lat: null,
        lng: null,
        radius: null,
        search: null,

    };

    /**
     * absoluteMap
     *
     * Creates a google map on each of the selected elements
     *
     * EG: `$('.map').absoluteMap({radius: 30, search: 'NG1 2PZ'});`
     * 
     * @param  {object} config 
     * @return {void}
     */
    $.fn.absoluteMap = function(config)
    {
        var $maps = $(this);

        $maps.each(function(key){

            var $map = $(this);
            var absoluteMap = Object.create(AbsoluteMap);

            var config = $.extend( {}, defaults, config );

            absoluteMap.$map = $map;
            absoluteMap.init(config);

            window.absoluteMaps[key] = absoluteMap;

        });
    };

    /**
     * AbsoluteMap
     *
     * The absolute map object. 
     * Used in the jquery function above for creating google maps
     * 
     * @type {Object}
     */
    var AbsoluteMap = {
        //  The map element and object
        $map: null,
        map: null,

        //  Object data and config
        data: {},
        config: {},

        // Area vars
        searchArea: null,
        searchCircle: null,

        //  Marker vars
        pins: {},
        markers: [],
        markersData: {},
        markerData: {},

        init: function(config)
        {
            var self = this;

            //  Set the config
            self.config = config;

            //  Set some variable values
            self.getConfig();
            self.setPins();
            self.setLatLng();

            self.options = {
                zoom: 13,
                center: self.data.latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: false,
                draggable: true,
                scrollwheel: false
            };

            self.clusterOptions = {
                gridSize: 50,
                styles: [{
                    height: 57,
                    width: 51,
                    textColor: '#58595b',
                    textSize: 1,
                    url: themeUrl + 'assets/images/multi-pin.png'
                }]
            };

            self.render();

            return self;
        },

        getAddressLatLng: function()
        {

        },

        getConfig: function()
        {
            var self = this;

            var config = self.$map.data('config');

            if(config)
            {
                self.config = $.extend( {}, self.config, config );
            }

            return self;
        },

        setLatLng: function()
        {
            var self = this;

            self.data.lat = self.$map.data('lat');
            self.data.lng = self.$map.data('lng');
            self.data.latLng = new google.maps.LatLng(self.data.lat, self.data.lng);

            return self;
        },

        setCurrentPosition: function(callback)
        {
            var self = this;
            var position = null;
console.log('zzzzzzzzzzzzzzzzzzzzzz');
            navigator.geolocation.getCurrentPosition(

                function(position)
                {
                    var geocoder = new google.maps.Geocoder();

                    console.log(position);

                    geocoder.geocode(
                        {
                            "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
                        },
                        function(results, status)
                        {
                            if (status == google.maps.GeocoderStatus.OK)
                            {
                                callback(results);
                            }
                            else
                            {
                                showMessage('Unable to retrieve your position', 'error');
                            }
                        }
                    );
                },
                function(positionError)
                {
                    showMessage(positionError.message, 'error');
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10 * 1000 // 10 seconds
                }
            );

            // showMessage('Error', 'error');

            return position;
        },

        bindMapEvents: function()
        {
            var self = this;

            var mapDraging = null;

            google.maps.event.addListener( self.map, 'drag', function()
            {
                clearTimeout(mapDraging);

                mapDraging = setTimeout(function()
                {
                    //  Center search area
                    if( self.map.searchArea )
                    {                      
                        self.map.searchArea.setCenter(self.map.getCenter());  
                    }

                    if( self.map.searchCircle )
                    {                       
                        self.map.searchCircle.setCenter(self.map.getCenter());
                    }

                    if( self.map.searchZoom )
                    {                       
                        self.map.searchZoom.setCenter(self.map.getCenter());
                    }

                    /**
                     * Note: refreshing on drag disables as not necessary at the moment
                     */
                    // self.resetMarkers(); 

                }, 50);
            });

            /*$body.on('click', '.current-location', function(event)
            {
                event.preventDefault();

                var $button = $(this);
                var $input = $($button.data('input'));
                var $form = $input.closest('form');

                self.setCurrentPosition(function(results)
                {
                    $input.val(results[0].formatted_address);
                    // showMessage('Position calculated', 'success');
                    $form.submit();
                });

            });*/

            return self;
        },

        bindMarkerEvents: function(marker, markerData)
        {

            var self = this;

            //  Info window
            google.maps.event.addListener(marker, 'click', function()
            {
                
                console.log('ssssssssssssssssss');
                // Show the modal window
                $('#modalMarkerInfo'+markerData.id).fadeIn();
            });

            // Get details for draggable markers
            if (markerData.draggable)
            {
                google.maps.event.addListener(marker, 'dragend', function(event)
                {
                    $('#field-latitude').val(event.latLng.lat().toFixed(3));
                    $('#field-longitude').val(event.latLng.lng().toFixed(3));

                    self.map.setCenter(event.latLng);
                    self.center();

                    showMessage('Map updated.', 'success');
                });
            }
        },

        setMap: function()
        {
            var self = this;

            // If there's isn't a data map on the element, Create a new one
            if( ! self.$map.data('uid'))
            {
                self.uid = guid();
                self.map = new google.maps.Map(self.$map[0], self.options);
                self.$map.attr('data-uid', self.uid);
                window[self.uid] = self.map;
                return false;
            }
            // If there is an existing map, use it instead of creating another
            else
            {
                self.uid = self.$map.data('uid');
                self.map = window[self.uid];
                return true;
            }

            return self;
        },

        /**
         * getRadius()
         *
         * converts miles or kilometeres to meters
         * 
         * @param  number radius
         * @param  string unit   'mi' or 'km'
         * 
         * @return int
         */
        getRadius: function(radius, unit)
        {
            if(unit == 'mi')
            {
                radius *= 1609.34;
            }
            else if(unit == 'km')
            {
                radius *= 1000;
            }

            return parseInt(radius, 10);
        },

        /**
         * setSearchArea()
         *
         * Setup a search radius
         */
        setSearchArea: function()
        {
            var self = this;
            var radius = self.getRadius(self.config.radius, 'mi');

            self.searchAreaOptions = {
                map: self.map,
                clickable: false,
                radius: radius,
                fillColor: 'green',
                strokeColor: 'green',
                strokeWeight: 2,
                center: self.data.latLng,
                draggable: false,
                fillOpacity: 0,
                strokeOpacity: 0,
            };

            self.map.searchArea = new google.maps.Circle(self.searchAreaOptions);

            var zoomRadius = radius - ( radius / 3 );

            self.searchZoomOptions = {
                map: self.map,
                clickable: false,
                radius: zoomRadius,
                fillColor: 'red',
                strokeColor: 'red',
                strokeWeight: 2,
                center: self.data.latLng,
                draggable: false,
                fillOpacity: 0,
                strokeOpacity: 0,
            };

            self.map.searchArea = new google.maps.Circle(self.searchZoomOptions);

            var circleRadius = radius * 1.13;

            self.searchCircleOptions = {
                map: self.map,
                clickable: false,
                radius: circleRadius,
                fillColor: '#325d93',
                strokeColor: '#0f2355',
                strokeWeight: 2,
                center: self.data.latLng,
                draggable: true,
                fillOpacity: 0,
                strokeOpacity: 0,
            };

            self.map.searchCircle = new google.maps.Circle(self.searchCircleOptions);

            return self;
        },

        setPins: function()
        {
            var self = this;

            // Setup Standard marker
            self.pins.pin = new google.maps.MarkerImage(themeUrl + 'assets/images/pin.png',
                new google.maps.Size(50, 62),
                new google.maps.Point(0,0)
            );

            // Setup Car repair plan marker
            self.pins.crpPin = new google.maps.MarkerImage(themeUrl + 'assets/images/crp-pin.png',
                new google.maps.Size(100, 94),
                new google.maps.Point(0,0)
            );

            return self;
        },

        /**
         * addMarkers()
         * 
         */
        addMarkers: function()
        {
            var self = this;

            self.markers = [];

            self.markersData = self.$map.data('markers');

            $.each(self.markersData, function(key, markerData)
            {
                self.addMarker(markerData);
            });

            self.markerData = self.$map.data('marker');
            self.addMarker(self.markerData);

            self.setCluster();

            return self;
        },

        /**
         * addMarker
         *
         * Adds a marker to the map
         * 
         * @param object markerData
         *
         * @return this
         */
        addMarker: function(markerData)
        {
            if( ! markerData)
            {
                return;
            }

            var self = this;

            var latLng = new google.maps.LatLng(markerData.lat, markerData.lng);

            // console.log(markerData);

            var marker = new google.maps.Marker({
                position: latLng,
                icon: markerData.crp ? self.pins.crpPin : self.pins.pin,
                title: markerData.name,
                draggable: markerData.draggable
            });

            /**
             * Note: I'm disabling this as I dont see the point in not loading all the markers. As long as wee zoom the map to the correct radius it should be basically the smae thing
             */
            /*if(self.map.searchArea)
            {
                // var bounds = self.map.searchArea.getBounds();
                var bounds = self.map.getBounds();

                if(bounds.contains( latLng ))
                {
                    self.markers.push(marker);
                }
            }
            else
            {
                self.markers.push(marker);
            }*/

            self.markers.push(marker);

            self.bindMarkerEvents(marker, markerData);

            return self;
        },

        clearMarkers: function()
        {
            var self = this;

            $.each(self.markers, function(i, marker)
            {
                self.markers[i].setMap(null);
            });

            self.markers = [];

            if(self.markerClusters)
            {
                self.markerClusters.clearMarkers();
            }

            return self;
        },

        resetMarkers: function()
        {
            var self = this;

            self.clearMarkers();

            self.addMarkers();

            return self;
        },

        /**
         * setCluster()
         */
        setCluster: function()
        {
            var self = this;

            self.markerClusters = new MarkerClusterer(self.map, self.markers, self.clusterOptions);

            return self;
        },

        /**
         * center()
         *
         * Centersthe Map Duh!
         * 
         * @return this
         */
        center: function()
        {
            var self = this;

            if(self.map.searchArea)
            {
                self.map.fitBounds(self.map.searchArea.getBounds());
            }
            else if(self.markers.length > 1)
            {
                
                //  Fit all markers
                var bounds = new google.maps.LatLngBounds();

                $.each( self.markers, function( i, marker )
                {
                    // console.log(marker);

                    var latLng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latLng );

                });

                self.map.fitBounds( bounds );
            }
            else if(self.markers.length == 1)
            {
                self.map.setCenter(self.markers[0].getPosition());
            }

            return self;
        },

        /**
         * render()
         *
         * Renders the Map
         * 
         * @return this
         */
        render: function()
        {
            var self = this;

            var mapSet = self.setMap();

            // If the map is already setup, exit
            if(mapSet)
            {
                return;
            }

            if(self.config.radius)
            {
                self.setSearchArea();
            }

            // self.clearMarkers();
            // self.addMarkers();
            self.resetMarkers();

            self.center();

            self.bindMapEvents();

            //  save the most recent map data to the dom element
            window[self.uid] = self.map;

            return self;
        },

    }

})( jQuery, window, document );