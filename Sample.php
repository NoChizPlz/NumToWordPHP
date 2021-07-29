<?php
class Maptools {
    public function getCoordinates($zip){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, '__API__LINK__');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        $headers = array();
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"88\", \"Google Chrome\";v=\"88\", \";Not A Brand\";v=\"99\"';
        $headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
        $headers[] = 'Referer: ';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function getZipCodeswithinRange($lat, $long){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, '__API__LINK__');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        $headers = array();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"88\", \"Google Chrome\";v=\"88\", \";Not A Brand\";v=\"99\"';
        $headers[] = 'Accept: application/xml, text/xml, */*; q=0.01';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Referer: ';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Cookie: PHPSESSID=c04c2450085ed0bf8613140643cd12e3; __gads=ID=663db8684fe0d79b-22cf090e41c600f6:T=1614954902:RT=1614954902:S=ALNI_MYer4rOX9jwutv5Hquee8QIVpp8cQ; _ga=GA1.2.357010568.1614954902; _gid=GA1.2.1594048011.1614954902; FCCDCF=[[\"AKsRol-uasKsl7v-wDeb0jE5Aa3J7qWivy4RdLrwArigweCTvERObgn94dDLzIRpd0n89ouMGDEA_AQbVyZHlOhwv0MxIwPLTeyPmsAXaAmTLpw7OTKENfWRkKjP2gK_J2MzakKLfHXRxfLPaLkJw1iSq2q8427uHQ==\"],null,[\"[[],[],[],[],null,null,true]\",1614954901902],null]';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $xml = simplexml_load_string($result);
        $json = json_encode($xml);
        return $json;
    }
}

class autoSrcTrack{
    public function findtracking($zip, $cour, $datefrom, $dateto){
        $auth = curl_init();
        curl_setopt($auth, CURLOPT_URL, '__API__LINK__');
        curl_setopt($auth, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($auth, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($auth, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($auth, CURLOPT_POST, 1);
        curl_setopt($auth, CURLOPT_POSTFIELDS, 'grant_type=password&username=' . $user . '&password=' . $pass);
        curl_setopt($auth, CURLOPT_ENCODING, 'gzip, deflate');
        $headers = array();
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"88\", \"Google Chrome\";v=\"88\", \";Not A Brand\";v=\"99\"';
        $headers[] = 'Accept: application/json, text/plain, */*';
        $headers[] = 'Authorization: Basic YWNtZTphY21lc2VjcmV0';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Origin: ';
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Referer: ';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Cookie: __stripe_mid=66dbed37-49ec-4486-991a-ade6ff44df3c2e6811; __stripe_sid=662a644d-db5d-45d2-9db2-844fbc8476552e5e37';
        curl_setopt($auth, CURLOPT_HTTPHEADER, $headers);
        $arr = json_decode(curl_exec($auth));
        curl_close($auth);
        if(array_key_exists("access_token", $arr)){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, '__API__LINK__');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"shippingDateFrom\":\"$datefrom\",\"shippingDateTo\":\"$dateto\",\"carrier\":\"$cour\",\"zipCode\":\"$zip\"}");
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
            $headers = array();
            $headers[] = 'Connection: keep-alive';
            $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"88\", \"Google Chrome\";v=\"88\", \";Not A Brand\";v=\"99\"';
            $headers[] = 'Accept: application/json';
            $headers[] = 'Authorization: Bearer ' . $arr->access_token;
            $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
            $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Origin: ';
            $headers[] = 'Sec-Fetch-Site: same-origin';
            $headers[] = 'Sec-Fetch-Mode: cors';
            $headers[] = 'Sec-Fetch-Dest: empty';
            $headers[] = 'Referer: ';
            $headers[] = 'Accept-Language: en-US,en;q=0.9';
            $headers[] = 'Cookie: __stripe_mid=66dbed37-49ec-4486-991a-ade6ff44df3c2e6811; __stripe_sid=662a644d-db5d-45d2-9db2-844fbc8476552e5e37';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
    }
}