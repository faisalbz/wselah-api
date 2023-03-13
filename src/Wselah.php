<?php

    namespace Faisalbz\WselahApi;
	
	/**
		* Class Wselah
		* @package WselahApi
	*/
	
    class Wselah {
        protected $token = '';
        protected $device_id = '';  
		
        /**
			* Wselah constructor.
			* @param $token
			* @param $device_id
		*/
        public function __construct($token, $device_id){
            $this->token = $token; 
			$this->device_id = preg_replace('/[^0-9]/', '',$device_id);
			
		}
		
		// messages
		public function sendWhatsapp($to,$text){
			$params =array("to"=>$to,"text"=>$text, "device"=> $this->device_id);
			return $this->sendRequest("POST","send",$params );
		}
		
		
		public function sendRequest($method,$path,$params=array()){

			if(!is_callable('curl_init')){
				return array("Error"=>"cURL extension is disabled on your server");
			}
			$url="https://wselah.net/api/".$path;
			$data=http_build_query($params);

			if(strtolower($method)=="get")$url = $url . '?' . $data;

			$curl = curl_init($url);
			if(strtolower($method)=="post"){
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
			}
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer ' . $this->token
				));
			$response = curl_exec($curl);
			curl_close($curl);

		    return $response;
		}
		
		
		
		
	}																																																													