<?php

namespace Rcambridge\Silex\Api;

/**
 * Extends the BaseFacebook class with the intent of using
 * PHP sessions to store user ids and access tokens.
 *
 * This file was copied from facebook's supplied Facebook class
 * Modify as required to improve functionality
 */
class Facebook extends \Facebook
{
    protected $countries = <<<EOT
[{"uid":"US","text":"United States"},{"uid":"CA","text":"Canada"},{"uid":"GB","text":"United Kingdom"},{"uid":"AF","text":"Afghanistan"},{"uid":"AX","text":"Aland Islands"},{"uid":"AL","text":"Albania"},{"uid":"DZ","text":"Algeria"},{"uid":"AS","text":"American Samoa"},{"uid":"AD","text":"Andorra"},{"uid":"AO","text":"Angola"},{"uid":"AI","text":"Anguilla"},{"uid":"AQ","text":"Antarctica"},{"uid":"AG","text":"Antigua"},{"uid":"AR","text":"Argentina"},{"uid":"AM","text":"Armenia"},{"uid":"AW","text":"Aruba"},{"uid":"AU","text":"Australia"},{"uid":"AT","text":"Austria"},{"uid":"AZ","text":"Azerbaijan"},{"uid":"BH","text":"Bahrain"},{"uid":"BD","text":"Bangladesh"},{"uid":"BB","text":"Barbados"},{"uid":"BY","text":"Belarus"},{"uid":"BE","text":"Belgium"},{"uid":"BZ","text":"Belize"},{"uid":"BJ","text":"Benin"},{"uid":"BM","text":"Bermuda"},{"uid":"BT","text":"Bhutan"},{"uid":"BO","text":"Bolivia"},{"uid":"BQ","text":"Bonaire, Sint Eustatius and Saba"},{"uid":"BA","text":"Bosnia and Herzegovina"},{"uid":"BW","text":"Botswana"},{"uid":"BV","text":"Bouvet Island"},{"uid":"BR","text":"Brazil"},{"uid":"IO","text":"British Indian Ocean Territory"},{"uid":"VG","text":"British Virgin Islands"},{"uid":"BN","text":"Brunei"},{"uid":"BG","text":"Bulgaria"},{"uid":"BF","text":"Burkina Faso"},{"uid":"BI","text":"Burundi"},{"uid":"KH","text":"Cambodia"},{"uid":"CM","text":"Cameroon"},{"uid":"CV","text":"Cape Verde"},{"uid":"KY","text":"Cayman Islands"},{"uid":"CI","text":"C\u00f4te d'Ivoire"},{"uid":"CF","text":"Central African Republic"},{"uid":"TD","text":"Chad"},{"uid":"CL","text":"Chile"},{"uid":"CN","text":"China"},{"uid":"CX","text":"Christmas Island"},{"uid":"CC","text":"Cocos (Keeling) Islands"},{"uid":"CO","text":"Colombia"},{"uid":"KM","text":"Comoros"},{"uid":"CK","text":"Cook Islands"},{"uid":"CR","text":"Costa Rica"},{"uid":"HR","text":"Croatia"},{"uid":"CU","text":"Cuba"},{"uid":"CW","text":"Cura\u00e7ao"},{"uid":"CY","text":"Cyprus"},{"uid":"CZ","text":"Czech Republic"},{"uid":"CD","text":"Democratic Republic of the Congo"},{"uid":"DK","text":"Denmark"},{"uid":"DJ","text":"Djibouti"},{"uid":"DM","text":"Dominica"},{"uid":"DO","text":"Dominican Republic"},{"uid":"EC","text":"Ecuador"},{"uid":"EG","text":"Egypt"},{"uid":"SV","text":"El Salvador"},{"uid":"GQ","text":"Equatorial Guinea"},{"uid":"ER","text":"Eritrea"},{"uid":"EE","text":"Estonia"},{"uid":"ET","text":"Ethiopia"},{"uid":"FK","text":"Falkland Islands"},{"uid":"FO","text":"Faroe Islands"},{"uid":"FM","text":"Federated States of Micronesia"},{"uid":"FJ","text":"Fiji"},{"uid":"FI","text":"Finland"},{"uid":"FR","text":"France"},{"uid":"GF","text":"French Guiana"},{"uid":"PF","text":"French Polynesia"},{"uid":"TF","text":"French Southern Territories"},{"uid":"GA","text":"Gabon"},{"uid":"GE","text":"Georgia"},{"uid":"DE","text":"Germany"},{"uid":"GH","text":"Ghana"},{"uid":"GI","text":"Gibraltar"},{"uid":"GR","text":"Greece"},{"uid":"GL","text":"Greenland"},{"uid":"GD","text":"Grenada"},{"uid":"GP","text":"Guadeloupe"},{"uid":"GU","text":"Guam"},{"uid":"GT","text":"Guatemala"},{"uid":"GG","text":"Guernsey"},{"uid":"GN","text":"Guinea"},{"uid":"GW","text":"Guinea-Bissau"},{"uid":"GY","text":"Guyana"},{"uid":"HT","text":"Haiti"},{"uid":"HM","text":"Heard Island and McDonald Islands"},{"uid":"HN","text":"Honduras"},{"uid":"HK","text":"Hong Kong"},{"uid":"HU","text":"Hungary"},{"uid":"IS","text":"Iceland"},{"uid":"IN","text":"India"},{"uid":"ID","text":"Indonesia"},{"uid":"IR","text":"Iran"},{"uid":"IQ","text":"Iraq"},{"uid":"IE","text":"Ireland"},{"uid":"IM","text":"Isle Of Man"},{"uid":"IL","text":"Israel"},{"uid":"IT","text":"Italy"},{"uid":"JM","text":"Jamaica"},{"uid":"JP","text":"Japan"},{"uid":"JE","text":"Jersey"},{"uid":"JO","text":"Jordan"},{"uid":"KZ","text":"Kazakhstan"},{"uid":"KE","text":"Kenya"},{"uid":"KI","text":"Kiribati"},{"uid":"XK","text":"Kosovo"},{"uid":"KW","text":"Kuwait"},{"uid":"KG","text":"Kyrgyzstan"},{"uid":"LA","text":"Laos"},{"uid":"LV","text":"Latvia"},{"uid":"LB","text":"Lebanon"},{"uid":"LS","text":"Lesotho"},{"uid":"LR","text":"Liberia"},{"uid":"LY","text":"Libya"},{"uid":"LI","text":"Liechtenstein"},{"uid":"LT","text":"Lithuania"},{"uid":"LU","text":"Luxembourg"},{"uid":"MO","text":"Macau"},{"uid":"MK","text":"Macedonia"},{"uid":"MG","text":"Madagascar"},{"uid":"MW","text":"Malawi"},{"uid":"MY","text":"Malaysia"},{"uid":"MV","text":"Maldives"},{"uid":"ML","text":"Mali"},{"uid":"MT","text":"Malta"},{"uid":"MH","text":"Marshall Islands"},{"uid":"MQ","text":"Martinique"},{"uid":"MR","text":"Mauritania"},{"uid":"MU","text":"Mauritius"},{"uid":"YT","text":"Mayotte"},{"uid":"MX","text":"Mexico"},{"uid":"MD","text":"Moldova"},{"uid":"MC","text":"Monaco"},{"uid":"MN","text":"Mongolia"},{"uid":"ME","text":"Montenegro"},{"uid":"MS","text":"Montserrat"},{"uid":"MA","text":"Morocco"},{"uid":"MZ","text":"Mozambique"},{"uid":"MM","text":"Myanmar"},{"uid":"NA","text":"Namibia"},{"uid":"NR","text":"Nauru"},{"uid":"NP","text":"Nepal"},{"uid":"NL","text":"Netherlands"},{"uid":"AN","text":"Netherlands Antilles"},{"uid":"NC","text":"New Caledonia"},{"uid":"NZ","text":"New Zealand"},{"uid":"NI","text":"Nicaragua"},{"uid":"NE","text":"Niger"},{"uid":"NG","text":"Nigeria"},{"uid":"NU","text":"Niue"},{"uid":"NF","text":"Norfolk Island"},{"uid":"KP","text":"North Korea"},{"uid":"MP","text":"Northern Mariana Islands"},{"uid":"NO","text":"Norway"},{"uid":"OM","text":"Oman"},{"uid":"PK","text":"Pakistan"},{"uid":"PW","text":"Palau"},{"uid":"PS","text":"Palestine"},{"uid":"PA","text":"Panama"},{"uid":"PG","text":"Papua New Guinea"},{"uid":"PY","text":"Paraguay"},{"uid":"PE","text":"Peru"},{"uid":"PH","text":"Philippines"},{"uid":"PN","text":"Pitcairn"},{"uid":"PL","text":"Poland"},{"uid":"PT","text":"Portugal"},{"uid":"PR","text":"Puerto Rico"},{"uid":"QA","text":"Qatar"},{"uid":"RE","text":"R\u00e9union"},{"uid":"CG","text":"Republic of the Congo"},{"uid":"RO","text":"Romania"},{"uid":"RU","text":"Russia"},{"uid":"RW","text":"Rwanda"},{"uid":"BL","text":"Saint Barth\u00e9lemy"},{"uid":"SH","text":"Saint Helena"},{"uid":"KN","text":"Saint Kitts and Nevis"},{"uid":"MF","text":"Saint Martin"},{"uid":"PM","text":"Saint Pierre and Miquelon"},{"uid":"VC","text":"Saint Vincent and the Grenadines"},{"uid":"WS","text":"Samoa"},{"uid":"SM","text":"San Marino"},{"uid":"ST","text":"Sao Tome and Principe"},{"uid":"SA","text":"Saudi Arabia"},{"uid":"SN","text":"Senegal"},{"uid":"RS","text":"Serbia"},{"uid":"SC","text":"Seychelles"},{"uid":"SL","text":"Sierra Leone"},{"uid":"SG","text":"Singapore"},{"uid":"SX","text":"Sint Maarten"},{"uid":"SK","text":"Slovakia"},{"uid":"SI","text":"Slovenia"},{"uid":"SB","text":"Solomon Islands"},{"uid":"SO","text":"Somalia"},{"uid":"ZA","text":"South Africa"},{"uid":"GS","text":"South Georgia and the South Sandwich Islands"},{"uid":"KR","text":"South Korea"},{"uid":"SS","text":"South Sudan"},{"uid":"ES","text":"Spain"},{"uid":"LK","text":"Sri Lanka"},{"uid":"LC","text":"St. Lucia"},{"uid":"SD","text":"Sudan"},{"uid":"SR","text":"Suriname"},{"uid":"SJ","text":"Svalbard and Jan Mayen"},{"uid":"SZ","text":"Swaziland"},{"uid":"SE","text":"Sweden"},{"uid":"CH","text":"Switzerland"},{"uid":"SY","text":"Syria"},{"uid":"TW","text":"Taiwan"},{"uid":"TJ","text":"Tajikistan"},{"uid":"TZ","text":"Tanzania"},{"uid":"TH","text":"Thailand"},{"uid":"BS","text":"The Bahamas"},{"uid":"GM","text":"The Gambia"},{"uid":"TL","text":"Timor-Leste"},{"uid":"TG","text":"Togo"},{"uid":"TK","text":"Tokelau"},{"uid":"TO","text":"Tonga"},{"uid":"TT","text":"Trinidad and Tobago"},{"uid":"TN","text":"Tunisia"},{"uid":"TR","text":"Turkey"},{"uid":"TM","text":"Turkmenistan"},{"uid":"TC","text":"Turks and Caicos Islands"},{"uid":"TV","text":"Tuvalu"},{"uid":"UG","text":"Uganda"},{"uid":"UA","text":"Ukraine"},{"uid":"AE","text":"United Arab Emirates"},{"uid":"UM","text":"United States Minor Outlying Islands"},{"uid":"UY","text":"Uruguay"},{"uid":"VI","text":"US Virgin Islands"},{"uid":"UZ","text":"Uzbekistan"},{"uid":"VU","text":"Vanuatu"},{"uid":"VA","text":"Vatican City"},{"uid":"VE","text":"Venezuela"},{"uid":"VN","text":"Vietnam"},{"uid":"WF","text":"Wallis and Futuna"},{"uid":"EH","text":"Western Sahara"},{"uid":"YE","text":"Yemen"},{"uid":"ZM","text":"Zambia"},{"uid":"ZW","text":"Zimbabwe"}]
EOT;

    protected $app;

    /**
    * Identical to the parent constructor, except that
    * we start a PHP session to store the user ID and
    * access token if during the course of execution
    * we discover them.
    *
    * @param Array $config the application configuration. Additionally
    * accepts "sharedSession" as a boolean to turn on a secondary
    * cookie for environments with a shared session (that is, your app
    * shares the domain with other apps).
    * @see BaseFacebook::__construct in facebook.php
    */
    public function __construct($config) {
        $this->app = $config['app'];

        $this->app['session']->start();

      // extends the supported keys to the signed requesst to the persistent data
      self::$kSupportedKeys = array_merge(parent::$kSupportedKeys, array('original_signed_request'));

        parent::__construct($config);

        // this must be done before getOriginalSignedRequest()
        $this->getUser();

        // cache the signed request if it's available
        $this->getOriginalSignedRequest();
    }

    protected function setPersistentData($key, $value) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to setPersistentData.');
            return;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        // $_SESSION[$session_var_name] = $value;
        $this->app['session']->set($session_var_name, $value);
    }

    protected function getPersistentData($key, $default = false) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to getPersistentData.');
            return $default;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        // return isset($_SESSION[$session_var_name]) ?
        //     $_SESSION[$session_var_name] : $default;

        return $this->app['session']->get($session_var_name, $default);
    }

    protected function clearPersistentData($key) {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to clearPersistentData.');
            return;
        }

        $session_var_name = $this->constructSessionVariableName($key);
        // unset($_SESSION[$session_var_name]);

        return $this->app['session']->remove($session_var_name);
    }

    protected function clearAllPersistentData() {
        foreach (self::$kSupportedKeys as $key) {
            $this->clearPersistentData($key);
        }
        if ($this->sharedSessionID) {
            $this->deleteSharedSessionCookie();
        }
    }

    public function fql($queries = array()) {
        $responses = $this->api('/fql?q=' . rawurlencode(json_encode($queries)));

        $retval = array();
        foreach ($responses['data'] as $response)
        {
            $retval[$response['name']] = $response['fql_result_set'];
        }
        return $retval;
    }

    public function getSupportedCountry($key = null) {
        if (!is_array($this->countries))
        {
            $this->countries = json_decode($this->countries, true);
        }

        if ($key === null)
        {
            return $this->countries;
        }

        $key = strtoupper($key);
        foreach ($this->countries as $country)
        {
            if ($key == $country['uid'])
            {
                return $country;
            }
        }
    }

    /**
    * Provides the signed request which was POSTed by the tab/canvas initialisation form
    *
    * @return array with the signed request or null
    */
    public function getOriginalSignedRequest()
    {
        if (isset($_REQUEST['signed_request']) || !$this->getPersistentData('original_signed_request'))
        {
            $this->setPersistentData('original_signed_request', $this->getSignedRequest());
        }

        return $this->getPersistentData('original_signed_request');
    }

    /**
    * Provides merged signed request + original signed request
    *
    * @return array with the signed request or null
    */
    public function getMergedSignedRequest()
    {
        return array_merge(is_array($osr = $this->getOriginalSignedRequest()) ? $osr : array(), is_array($sr = $this->getSignedRequest()) ? $sr : array());
    }
}