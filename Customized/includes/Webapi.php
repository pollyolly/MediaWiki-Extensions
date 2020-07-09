<?php

class WebApi {

	public function getFeaturedImage($id){
		try {
    		$url = 'https://ilc.upd.edu.ph/wp-json/wp/v2/media/' . $id;
    		$data = self::websiteApi($url);
		return str_replace('http://','https://',$data['guid']['rendered']);
		} catch (Exception $e) {
		echo 'Unable to load the website.';
		}
	}
	public function getArticleText(){
		try {
    		$url = 'https://ilc.upd.edu.ph/wp-json/wp/v2/posts';
    		$data = self::websiteApi($url);
		return $data;
		} catch (Exception $e) {
		echo '<p>Unable to load the website.</p>';
		}
	}
	public function websiteApi($url){
    		$options = array(
         		CURLOPT_RETURNTRANSFER => true, // return web page
         		CURLOPT_HEADER => false, // don't return headers
         		CURLOPT_FOLLOWLOCATION => true, // follow redirects
         		CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
         		CURLOPT_ENCODING => "utf8", // handle compressed
         		CURLOPT_USERAGENT => "iskomuniadad.upd.edu.ph", // name of client
         		CURLOPT_AUTOREFERER => true // set referrer on redirect
    //CURLOPT_CONNECTTIMEOUT => 120, // time-out on connect
    //CURLOPT_TIMEOUT => 120, // time-out on response
    		);
    		$curl = curl_init();
    		curl_setopt($curl, CURLOPT_URL, $url);
    //curl_setopt($curl, CURLOPT_POST, 1);
    		curl_setopt_array($curl, $options);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($credentials));
    //$errmsg = curl_error($curl);
    // $cinfo = curl_getinfo($curl);
    		$response = curl_exec($curl);
    		if(curl_errno($curl)){
        		throw new Exception(curl_error($curl));
    		}
    		curl_close($curl);
    		$data = json_decode($response, true);
    		return $data;
	}
}
