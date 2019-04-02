/**
 * Find a garage
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

/**
 * Anonymous function
 */

// $(document).ready(function()
// {
    (function( $, window, document, undefined )
    {
        /**
         * Scope vars
         */
        var $body = $('body');

        /**
         * FindAGarage
         * @type Object
         */
        var FindAGarage = {

            /**
             * Initialise the object
             */
            init: function()
            {
                var self = this;
                self.bindEvents();

                $maps = $('.js-map');

                if($maps.length > 0)
                {
                    $maps.absoluteMap();
                }

                console.log('---init---');
            },

            refresh: function()
            {
                $('.js-map').absoluteMap();
            },

            /**
             * Bind some event to the DOM
             */
            bindEvents: function()
            {
                var self = this;

                /**
                 * When current location button is clicked get the location and submit the data
                 */
                $body.on('click', '.current-location', function(event)
                {
                    event.preventDefault();
                     // console.log('clciked curretn location');
                    var $button = $(this);
                    var $input = $($button.data('input'));
                    var $form = $input.closest('form');

                    self.setCurrentPosition(function(results)
                    {
                        $input.val(results[0].formatted_address);
                        // showMessage('Position calculated', 'success');
                        $form.submit();
                    });

                });

                /**
                 * Update data when any select is changed
                 */
                $body.on('change', '#garagesSearch select, #garagesSort select, [name=filter_crp]', function()
                {
                    var $select = $(this);
                    var $form = $select.closest('form');

                    $form.submit();
                });

                /**
                 * Update data when ajax submission is succesful
                 */
                $body.on('beforeUpdate', function()
                {
                    // console.log('beforeUpdate');
                    // $('.js-map').absoluteMap();
                });

                $body.on('ajaxUpdate', function()
                {
                    // console.log('ajaxUpdate');
                    self.refresh();
                    // $('.js-map').absoluteMap();
                });

                $body.on('ajaxUpdateComplete', function()
                {
                    // console.log('ajaxUpdateComplete');
                    // $('.js-map').absoluteMap();
                });
            },
            
            /**
             * Get the current location and return it
             */
            setCurrentPosition: function(callback)
            {
                var self = this;
                var position = null;
                console.log(self);
                //if(navigator.geolocation) { alert('sadsadsadsadsa');}
                navigator.geolocation.getCurrentPosition(function(position)
                    {
                        console.log("position");
                        var geocoder = new google.maps.Geocoder();
                        console.log(geocoder);

                        console.log("position"+position);

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
        };

        /**
         * Create and initialise the component JS Object
         * @type Object
         */
        var findAGarage = Object.create(FindAGarage);
        findAGarage.init();

    })( jQuery, window, document );

// });