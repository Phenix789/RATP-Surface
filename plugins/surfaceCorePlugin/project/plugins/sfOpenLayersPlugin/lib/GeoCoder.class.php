<?php

class GeoCoder {
    public static function addressToCoordinate($country, $city, $street, $location = null, $state = null, $zip = null) {
        return self::yahooGeoCode($street, $city, $state, $zip, $location, $country);
    }

    protected static function yahooGeoCode($street, $city, $state, $zip, $location, $country)
    {
        $result = array('longitude' => null, 'latitude' => null, 'warning' => '');
        $url = 'http://local.yahooapis.com/MapsService/V1/geocode';
        
        $query = array();
        $query['appid'] = 'YD-9G7bey8_JXxQP6rxl.fBFGgCdNjoDMACQA--';
        if ($street)
            $query['street'] = $street;
        if ($city)
            $query['city'] = $city;
        if ($state)
            $query['state'] = $state;
        if ($zip)
            $query['zip'] = $zip;
        if ($country)
            $query['country'] = $country;
        if ($location)
            $query['location'] = $location;
            
        $query['output'] = 'php';
        $url .= '?' . http_build_query($query, '', '&');
        $response = @file_get_contents($url);
        if ($response) {
            $response = unserialize($response);
            
            if (isset($response['ResultSet']['Result']['Latitude'])) {
                $result['latitude'] = $response['ResultSet']['Result']['Latitude'];
            }
            if (isset($response['ResultSet']['Result']['Longitude'])) {    
                $result['longitude'] = $response['ResultSet']['Result']['Longitude'];
            }
            if (isset($response['ResultSet']['Result']['warning'])) {    
                $result['warning'] = $response['ResultSet']['Result']['warning'];
            }
        }
        
        return $result;
    }
    
    protected static function googleGeoCode($street, $city, $state, $zip, $location, $country)
    {
        $result = array('longitude' => null, 'latitude' => null, 'warning' => '');
        $url = 'http://maps.google.com/maps/geo';
/*
    *  q (required) — The address that you want to geocode.*
    * key (required) — Your API key.
    * sensor (required) — Indicates whether or not the geocoding request comes from a device with a location sensor. This value must be either true or false. (Note that devices with sensors generally perform their own geocoding by definition; therefore, most geocoding requests to the Maps API Geocoding service should set sensor to false.)
    * output (required) — The format in which the output should be generated. The options are xml, kml, csv, or (default) json. (For more information, see Geocoding Responses below.)
    * oe (optional but strongly encouraged) — The output encoding format of the response. It is recommended that you set this output encoding explicitly to utf8 unless you have specific requirements to handle other encoding types.
    * ll (optional) — The {latitude,longitude} of the viewport center expressed as a comma-separated string (e.g. "ll=40.479581,-117.773438" ). This parameter only has meaning if the spn parameter is also passed to the geocoder. (For more information see Viewport Biasing below.)
    * spn (optional) — The "span" of the viewport expressed as a comma-separated string of {latitude,longitude} (e.g. "spn=11.1873,22.5" ). This parameter only has meaning if the ll parameter is also passed to the geocoder. (For more information see Viewport Biasing below.)
    * gl (optional) — The country code, specified as a ccTLD ("top-level domain") two-character value. (For more information see Country Code Biasing below.)

Note: The gl and spn,ll viewport parameters will only influence, not fully restrict, results from the geocoder.

         
         
*/
        $query = array();
        $query['key'] = ''; // App Id
        $address = ($location)? array($location) : array($street, $city, $state, $zip);
        if ($address)
            $query['q'] = implode(', ', $address);
        if ($country)
            $query['gl'] = $country;
        $query['sensor'] = 'false';
        $query['output'] = 'csv';

        $url .= '?' . http_build_query($query, '', '&');
        $response = @file_get_contents($url);
        if ($response) {
            $response = explode(",", $response);
            /*
            if (isset($response['ResultSet']['Result']['Latitude'])) {
                $result['latitude'] = $response['ResultSet']['Result']['Latitude'];
            }
            if (isset($response['ResultSet']['Result']['Longitude'])) {    
                $result['longitude'] = $response['ResultSet']['Result']['Longitude'];
            }
            if (isset($response['ResultSet']['Result']['warning'])) {    
                $result['warning'] = $response['ResultSet']['Result']['warning'];
            $result['longitude'] = $result['Point']['coordinates'][0];
            $result['latitude']  = $result['Point']['coordinates'][1];
            }*/
            $result['longitude'] = $result['Point']['coordinates'][2];
            $result['latitude']  = $result['Point']['coordinates'][3];
        }
    }
}