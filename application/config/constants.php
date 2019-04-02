<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://". @$_SERVER['HTTP_HOST'];
$base_url .=     str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$base_url =rtrim($base_url,"/");
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('BASE_URL')            OR define('BASE_URL', $base_url);
defined('SITE_NAME')            OR define('SITE_NAME', 'Whocanfixmycar');
defined('SITE_LOGO')            OR define('SITE_LOGO', 'logo.svg');
defined('UTC_TIME')            OR define('UTC_TIME', '+5:30');

defined('MAIL_FROM_NAME') OR define('MAIL_FROM_NAME', 'Whocanfixmycar');
defined('MAIL_ID_FROM') OR define('MAIL_ID_FROM', 'support@Whocanfixmycar.ie');
defined('SUBLOGO_URL') OR define('SUBLOGO_URL', $base_url.'assets/front/images/logo/logo.jpg');

 $aQuickNav = array(
 
 );


define('SECOND_VERFICATION', FALSE); // highest automatically-assigned error code

$mobile_country_code1 = array(
""=>"Select Country Code",
"213"=>"Algeria (+213)",
"376"=>"Andorra (+376)",
"244"=>"Angola (+244)",
"1264"=>"Anguilla (+1264)",
"1268"=>"Antigua &amp; Barbuda (+1268)",
"54"=>"Argentina (+54)",
"374"=>"Armenia (+374)",
"297"=>"Aruba (+297)",
"61"=>"Australia (+61)",
"43"=>"Austria (+43)",
"994"=>"Azerbaijan (+994)",
"1242"=>"Bahamas (+1242)",
"973"=>"Bahrain (+973)",
"880"=>"Bangladesh (+880)",
"1246"=>"Barbados (+1246)",
"375"=>"Belarus (+375)",
"32"=>"Belgium (+32)",
"501"=>"Belize (+501)",
"229"=>"Benin (+229)",
"1441"=>"Bermuda (+1441)",
"975"=>"Bhutan (+975)",
"591"=>"Bolivia (+591)",
"387"=>"Bosnia Herzegovina (+387)",
"267"=>"Botswana (+267)",
"55"=>"Brazil (+55)",
"673"=>"Brunei (+673)",
"359"=>"Bulgaria (+359)",
"226"=>"Burkina Faso (+226)",
"257"=>"Burundi (+257)",
"855"=>"Cambodia (+855)",
"237"=>"Cameroon (+237)",
"1"=>"Canada (+1)",
"238"=>"Cape Verde Islands (+238)",
"1345"=>"Cayman Islands (+1345)",
"236"=>"Central African Republic (+236)",
"56"=>"Chile (+56)",
"86"=>"China (+86)",
"57"=>"Colombia (+57)",
"269"=>"Comoros (+269)",
"242"=>"Congo (+242)",
"682"=>"Cook Islands (+682)",
"506"=>"Costa Rica (+506)",
"385"=>"Croatia (+385)",
"53"=>"Cuba (+53)",
"90392"=>"Cyprus North (+90392)",
"357"=>"Cyprus South (+357)",
"42"=>"Czech Republic (+42)",
"45"=>"Denmark (+45)",
"253"=>"Djibouti (+253)",
"1809"=>"Dominica (+1809)",
"1809"=>"Dominican Republic (+1809)",
"593"=>"Ecuador (+593)",
"20"=>"Egypt (+20)",
"503"=>"El Salvador (+503)",
"240"=>"Equatorial Guinea (+240)",
"291"=>"Eritrea (+291)",
"372"=>"Estonia (+372)",
"251"=>"Ethiopia (+251)",
"500"=>"Falkland Islands (+500)",
"298"=>"Faroe Islands (+298)",
"679"=>"Fiji (+679)",
"358"=>"Finland (+358)",
"33"=>"France (+33)",
"594"=>"French Guiana (+594)",
"689"=>"French Polynesia (+689)",
"241"=>"Gabon (+241)",
"220"=>"Gambia (+220)",
"7880"=>"Georgia (+7880)",
"49"=>"Germany (+49)",
"233"=>"Ghana (+233)",
"350"=>"Gibraltar (+350)",
"30"=>"Greece (+30)",
"299"=>"Greenland (+299)",
"1473"=>"Grenada (+1473)",
"590"=>"Guadeloupe (+590)",
"671"=>"Guam (+671)",
"502"=>"Guatemala (+502)",
"224"=>"Guinea (+224)",
"245"=>"Guinea - Bissau (+245)",
"592"=>"Guyana (+592)",
"509"=>"Haiti (+509)",
"504"=>"Honduras (+504)",
"852"=>"Hong Kong (+852)",
"36"=>"Hungary (+36)",
"354"=>"Iceland (+354)",
"91"=>"India (+91)",
"62"=>"Indonesia (+62)",
"98"=>"Iran (+98)",
"964"=>"Iraq (+964)",
"353"=>"Ireland (+353)",
"972"=>"Israel (+972)",
"39"=>"Italy (+39)",
"1876"=>"Jamaica (+1876)",
"81"=>"Japan (+81)",
"962"=>"Jordan (+962)",
"7"=>"Kazakhstan (+7)",
"254"=>"Kenya (+254)",
"686"=>"Kiribati (+686)",
"850"=>"Korea North (+850)",
"82"=>"Korea South (+82)",
"965"=>"Kuwait (+965)",
"996"=>"Kyrgyzstan (+996)",
"856"=>"Laos (+856)",
"371"=>"Latvia (+371)",
"961"=>"Lebanon (+961)",
"266"=>"Lesotho (+266)",
"231"=>"Liberia (+231)",
"218"=>"Libya (+218)",
"417"=>"Liechtenstein (+417)",
"370"=>"Lithuania (+370)",
"352"=>"Luxembourg (+352)",
"853"=>"Macao (+853)",
"389"=>"Macedonia (+389)",
"261"=>"Madagascar (+261)",
"265"=>"Malawi (+265)",
"60"=>"Malaysia (+60)",
"960"=>"Maldives (+960)",
"223"=>"Mali (+223)",
"356"=>"Malta (+356)",
"692"=>"Marshall Islands (+692)",
"596"=>"Martinique (+596)",
"222"=>"Mauritania (+222)",
"269"=>"Mayotte (+269)",
"52"=>"Mexico (+52)",
"691"=>"Micronesia (+691)",
"373"=>"Moldova (+373)",
"377"=>"Monaco (+377)",
"976"=>"Mongolia (+976)",
"1664"=>"Montserrat (+1664)",
"212"=>"Morocco (+212)",
"258"=>"Mozambique (+258)",
"95"=>"Myanmar (+95)",
"264"=>"Namibia (+264)",
"674"=>"Nauru (+674)",
"977"=>"Nepal (+977)",
"31"=>"Netherlands (+31)",
"687"=>"New Caledonia (+687)",
"64"=>"New Zealand (+64)",
"505"=>"Nicaragua (+505)",
"227"=>"Niger (+227)",
"234"=>"Nigeria (+234)",
"683"=>"Niue (+683)",
"672"=>"Norfolk Islands (+672)",
"670"=>"Northern Marianas (+670)",
"47"=>"Norway (+47)",
"968"=>"Oman (+968)",
"680"=>"Palau (+680)",
"507"=>"Panama (+507)",
"675"=>"Papua New Guinea (+675)",
"595"=>"Paraguay (+595)",
"51"=>"Peru (+51)",
"63"=>"Philippines (+63)",
"48"=>"Poland (+48)",
"351"=>"Portugal (+351)",
"1787"=>"Puerto Rico (+1787)",
"974"=>"Qatar (+974)",
"262"=>"Reunion (+262)",
"40"=>"Romania (+40)",
"7"=>"Russia (+7)",
"250"=>"Rwanda (+250)",
"378"=>"San Marino (+378)",
"239"=>"Sao Tome &amp; Principe (+239)",
"966"=>"Saudi Arabia (+966)",
"221"=>"Senegal (+221)",
"381"=>"Serbia (+381)",
"248"=>"Seychelles (+248)",
"232"=>"Sierra Leone (+232)",
"65"=>"Singapore (+65)",
"421"=>"Slovak Republic (+421)",
"386"=>"Slovenia (+386)",
"677"=>"Solomon Islands (+677)",
"252"=>"Somalia (+252)",
"27"=>"South Africa (+27)",
"34"=>"Spain (+34)",
"94"=>"Sri Lanka (+94)",
"290"=>"St. Helena (+290)",
"1869"=>"St. Kitts (+1869)",
"1758"=>"St. Lucia (+1758)",
"249"=>"Sudan (+249)",
"597"=>"Suriname (+597)",
"268"=>"Swaziland (+268)",
"46"=>"Sweden (+46)",
"41"=>"Switzerland (+41)",
"963"=>"Syria (+963)",
"886"=>"Taiwan (+886)",
"7"=>"Tajikstan (+7)",
"66"=>"Thailand (+66)",
"228"=>"Togo (+228)",
"676"=>"Tonga (+676)",
"1868"=>"Trinidad &amp; Tobago (+1868)",
"216"=>"Tunisia (+216)",
"90"=>"Turkey (+90)",
"7"=>"Turkmenistan (+7)",
"993"=>"Turkmenistan (+993)",
"1649"=>"Turks &amp; Caicos Islands (+1649)",
"688"=>"Tuvalu (+688)",
"256"=>"Uganda (+256)",
"44"=>"UK (+44)", 
"380"=>"Ukraine (+380)",
"971"=>"United Arab Emirates (+971)",
"598"=>"Uruguay (+598)",
"1"=>"USA (+1)", 
"7"=>"Uzbekistan (+7)",
"678"=>"Vanuatu (+678)",
"379"=>"Vatican City (+379)",
"58"=>"Venezuela (+58)",
"84"=>"Vietnam (+84)",
"84"=>"Virgin Islands - British (+1284)",
"84"=>"Virgin Islands - US (+1340)",
"681"=>"Wallis &amp; Futuna (+681)",
"969"=>"Yemen (North)(+969)",
"967"=>"Yemen (South)(+967)",
"260"=>"Zambia (+260)",
"263"=>"Zimbabwe (+263)"
);

$country_array_data = array(
""=>"Land auswählen",
"DE" => "Deutschland",
"NL" => "Niederlande",
);

$mobile_country_code = array(
""=>"Select Country Code",
"213"=>"(+213) AL",
"376"=>"DZ (+376)",
"244"=>"AO (+244)",
"1264"=>"AI (+1264)",
"1268"=>"AG (+1268)",
"54"=>"AR (+54)",
"374"=>"AM (+374)",
"297"=>"AW (+297)",
"61"=>"AU (+61)",
"43"=>"AT (+43)",
"994"=>"AZ (+994)",
"1242"=>"BS (+1242)",
"973"=>"BH (+973)",
"880"=>"BD (+880)",
"1246"=>"BB (+1246)",
"375"=>"BY (+375)",
"32"=>"BE (+32)",
"501"=>"BZ (+501)",
"229"=>"BJ (+229)",
"1441"=>"BM (+1441)",
"975"=>"BT (+975)",
"591"=>"BO (+591)",
"387"=>"BA (+387)",
"267"=>"BW (+267)",
"55"=>"BR (+55)",
"673"=>"BN (+673)",
"359"=>"BG (+359)",
"226"=>"BF (+226)",
"257"=>"BI (+257)",
"855"=>"KH (+855)",
"237"=>"CM (+237)",
"1"=>"CA (+1)",
"238"=>"CV (+238)",
"1345"=>"KY (+1345)",
"236"=>"CF (+236)",
"56"=>"CL (+56)",
"86"=>"CN (+86)",
"57"=>"CO (+57)",
"269"=>"KM (+269)",
"242"=>"CG (+242)",
"682"=>"CK (+682)",
"506"=>"CR (+506)",
"385"=>"HR (+385)",
"53"=>"CU (+53)",
"90392"=>"CY (+90392)",
"357"=>"CY (+357)",
"42"=>"CZ (+42)",
"45"=>"DK (+45)",
"253"=>"DJ (+253)",
"1809"=>"DM (+1809)",
"1809"=>"DO (+1809)",
"593"=>"EC (+593)",
"20"=>"EG (+20)",
"503"=>"SV (+503)",
"240"=>"GQ (+240)",
"291"=>"ER (+291)",
"372"=>"EE (+372)",
"251"=>"ET (+251)",
"500"=>"FK (+500)",
"298"=>"FO (+298)",
"679"=>"FJ (+679)",
"358"=>"FI (+358)",
"33"=>"FR (+33)",
"594"=>"FG (+594)",
"689"=>"FP (+689)",
"241"=>"GA (+241)",
"220"=>"GM (+220)",
"7880"=>"GE (+7880)",
"49"=>"DE (+49)",
"233"=>"GH (+233)",
"350"=>"GI (+350)",
"30"=>"GR (+30)",
"299"=>"GL (+299)",
"1473"=>"GD	 (+1473)",
"590"=>"GL (+590)",
"671"=>"GU (+671)",
"502"=>"GT (+502)",
"224"=>"GN (+224)",
"245"=>"GW (+245)",
"592"=>"GY (+592)",
"509"=>"HT (+509)",
"504"=>"HN (+504)",
"852"=>"HK (+852)",
"36"=>"HU (+36)",
"354"=>"IS (+354)",
"91"=>"IN (+91)",
"62"=>"ID (+62)",
"98"=>"TR (+98)",
"964"=>"IQ (+964)",
"353"=>"IE (+353)",
"972"=>"IL (+972)",
"39"=>"IP (+39)",
"1876"=>"JM (+1876)",
"81"=>"JP (+81)",
"962"=>"JO (+962)",
"7"=>"KZ (+7)",
"254"=>"KE (+254)",
"686"=>"KI (+686)",
"850"=>"KP (+850)",
"82"=>"KR (+82)",
"965"=>"KW (+965)",
"996"=>"KG (+996)",
"856"=>"LA (+856)",
"371"=>"LV (+371)",
"961"=>"LB (+961)",
"266"=>"LS (+266)",
"231"=>"LR (+231)",
"218"=>"LY (+218)",
"417"=>"LI (+417)",
"370"=>"LT (+370)",
"352"=>"LU (+352)",
"853"=>"MO (+853)",
"389"=>"MK (+389)",
"261"=>"MG (+261)",
"265"=>"MW (+265)",
"60"=>"MY (+60)",
"960"=>"MV (+960)",
"223"=>"ML (+223)",
"356"=>"MT (+356)",
"692"=>"MH (+692)",
"596"=>"MQ (+596)",
"222"=>"MR (+222)",
"269"=>"YT (+269)",
"52"=>"MX (+691)",
"373"=>"MD (+373)",
"377"=>"MC (+377)",
"976"=>"MN (+976)",
"1664"=>"MS (+1664)",
"212"=>"MA (+212)",
"258"=>"MZ (+258)",
"95"=>"MM (+95)",
"264"=>"NA (+264)",
"674"=>"NR (+674)",
"977"=>"NP (+977)",
"31"=>"NL (+31)",
"687"=>"NC (+687)",
"64"=>"NZ (+64)",
"505"=>"NI (+505)",
"227"=>"NE (+227)",
"234"=>"NG (+234)",
"683"=>"NU (+683)",
"672"=>"NF (+672)",
"670"=>"MP (+670)",
"47"=>"NO (+47)",
"968"=>"OM (+968)",
"680"=>"PW (+680)",
"507"=>"PA (+507)",
"675"=>"PG (+675)",
"595"=>"PY (+595)",
"51"=>"PE (+51)",
"63"=>"PH (+63)",
"48"=>"PL (+48)",
"351"=>"PT (+351)",
"1787"=>"PR (+1787)",
"974"=>"QA (+974)",
"262"=>"RE (+262)",
"40"=>"RO (+40)",
"7"=>"RU (+7)",
"250"=>"RW (+250)",
"378"=>"SM (+378)",
"239"=>"ST (+239)",
"966"=>"SA (+966)",
"221"=>"SN (+221)",
"381"=>"RS (+381)",
"248"=>"SC (+248)",
"232"=>"SC (+232)",
"65"=>"SG (+65)",
"421"=>"SK (+421)",
"386"=>"SI (+386)",
"677"=>"SB (+677)",
"252"=>"SO (+252)",
"27"=>"ZA (+27)",
"34"=>"ES (+34)",
"94"=>"LK (+94)",
"290"=>"SH (+290)",
"1869"=>"KN (+1869)",
"1758"=>"LC (+1758)",
"249"=>"SD (+249)",
"597"=>"SR (+597)",
"268"=>"SZ (+268)",
"46"=>"SE (+46)",
"41"=>"SZ (+41)",
"963"=>"SY (+963)",
"886"=>"TW (+886)",
"7"=>"TJ (+7)",
"66"=>"TH (+66)",
"228"=>"TG (+228)",
"676"=>"Tonga (+676)",
"1868"=>"TT (+1868)",
"216"=>"TN (+216)",
"90"=>"TR (+90)",
"7"=>"TM (+7)",
"993"=>"TM (+993)",
"1649"=>"TC (+1649)",
"688"=>"TV (+688)",
"256"=>"UG (+256)",
"44"=>"UK (+44)", 
"380"=>"UA (+380)",
"971"=>"AE (+971)",
"598"=>"UY (+598)",
"1"=>"USA (+1)", 
"7"=>"UZ (+7)",
"678"=>"VU (+678)",
"58"=>"VE (+58)",
"84"=>"VN (+84)",
"84"=>"VG (+1284)",
"84"=>"VI (+1340)",
"681"=>"WF (+681)",
"969"=>"YE(+969)",
"260"=>"ZM (+260)",
"263"=>"ZW (+263)"
);


$country_array = array(
""=>"Select Country",
"AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"BQ" => "British Antarctic Territory",
"IO" => "British Indian Ocean Territory",
"VG" => "British Virgin Islands",
"BN" => "Brunei",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CT" => "Canton and Enderbury Islands",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos [Keeling] Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo - Brazzaville",
"CD" => "Congo - Kinshasa",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"CI" => "Côte d’Ivoire",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"NQ" => "Dronning Maud Land",
"DD" => "East Germany",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"FQ" => "French Southern and Antarctic Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GG" => "Guernsey",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and McDonald Islands",
"HN" => "Honduras",
"HK" => "Hong Kong SAR China",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran",
"IQ" => "Iraq",
"IE" => "Ireland",
"IM" => "Isle of Man",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JE" => "Jersey",
"JT" => "Johnston Island",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Laos",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macau SAR China",
"MK" => "Macedonia",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"FX" => "Metropolitan France",
"MX" => "Mexico",
"FM" => "Micronesia",
"MI" => "Midway Islands",
"MD" => "Moldova",
"MC" => "Monaco",
"MN" => "Mongolia",
"ME" => "Montenegro",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar [Burma]",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NT" => "Neutral Zone",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"KP" => "North Korea",
"VD" => "North Vietnam",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PC" => "Pacific Islands Trust Territory",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territories",
"PA" => "Panama",
"PZ" => "Panama Canal Zone",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"YD" => "People's Democratic Republic of Yemen",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn Islands",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RO" => "Romania",
"RU" => "Russia",
"RW" => "Rwanda",
"RE" => "Réunion",
"BL" => "Saint Barthélemy",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"MF" => "Saint Martin",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and the Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"RS" => "Serbia",
"CS" => "Serbia and Montenegro",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and the South Sandwich Islands",
"KR" => "South Korea",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syria",
"ST" => "São Tomé and Príncipe",
"TW" => "Taiwan",
"TJ" => "Tajikistan",
"TZ" => "Tanzania",
"TH" => "Thailand",
"TL" => "Timor-Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UM" => "U.S. Minor Outlying Islands",
"PU" => "U.S. Miscellaneous Pacific Islands",
"VI" => "U.S. Virgin Islands",
"UG" => "Uganda",
"UA" => "Ukraine",
"SU" => "Union of Soviet Socialist Republics",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"ZZ" => "Unknown or Invalid Region",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VA" => "Vatican City",
"VE" => "Venezuela",
"VN" => "Vietnam",
"WK" => "Wake Island",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe",
"AX" => "Åland Islands",
);

$days_array = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');


//define('STATIC_TABLES', json_encode($static_table_array));

defined('Days_array')  OR define('Days_array', json_encode($days_array));

$moverscount_array = array(1,2,3,4,5,6,7,8,9,10,11,12);


//define('STATIC_TABLES', json_encode($static_table_array));

defined('MoversCount_array')  OR define('MoversCount_array', json_encode($moverscount_array));

 
$stripe_mode = 'test';
if($stripe_mode == 'test')
{
	// $client_id = 'ca_EIRQEJ7PJ87frv8PUyyc2ylpi5HN0dGc';  //viji test stripe client id
	$client_id = 'ca_AVTEqNcoBMjPHgyNPjkBSpC7LmyvU0yo';  //client test stripe client id

	// $STRIPE_SECRET_API_KEY = 'sk_test_oreX4gPVvkYgx26g0KsjMCiE';  //viji test stripe client id
	$STRIPE_SECRET_API_KEY = 'sk_test_ArGzjn9I6ZTNNTgeLpADldcF';  //client test stripe client id
	// $STRIPE_PUBLIC_API_KEY = 'pk_test_XCYqdDIIwJWQ1JJ7OQqo4ptl';  //viji test stripe client id
	$STRIPE_PUBLIC_API_KEY = 'pk_test_xBkV7iOr9ktlSKjuAbYJ0Sln';  //client test stripe client id

	defined('STRIPE_CLIENT_ID')  OR define('STRIPE_CLIENT_ID', $client_id);
	defined('STRIPE_SECRET_API_KEY')  OR define('STRIPE_SECRET_API_KEY', $STRIPE_SECRET_API_KEY); 
	defined('STRIPE_PUBLIC_API_KEY')  OR define('STRIPE_PUBLIC_API_KEY', $STRIPE_PUBLIC_API_KEY);  
}
else
{
	$client_id = 'ca_AVTErw8RHdzQlynZKsngFPEKqnTD6oQr'; 
	$STRIPE_SECRET_API_KEY = 'sk_live_U6wd7u76sNotSrMW4lLMkwgz'; 
	$STRIPE_PUBLIC_API_KEY = 'pk_live_nxUWGu0Dsvj6QNfSMxorj375';  

	defined('STRIPE_CLIENT_ID')  OR define('STRIPE_CLIENT_ID', $client_id);
	defined('STRIPE_SECRET_API_KEY')  OR define('STRIPE_SECRET_API_KEY', $STRIPE_SECRET_API_KEY); 
	defined('STRIPE_PUBLIC_API_KEY')  OR define('STRIPE_PUBLIC_API_KEY', $STRIPE_PUBLIC_API_KEY);  
}



