<?php

class Mail extends Site{

	public function sendMail($to,$from,$mess){
          //api
			https://api.emailyak.com/v1/ccliidnrl0z6zob/json/

/*
'{"FromAddress" : "sender@example.com", "ToAddress" : "receiver@example.com", "Subject" : "Test", "TextBody" : "Howdy!"}'		
*/

		$data=array("FromAddress"=>,"africo.simpleyak.com"
		"ToAddress"=>,$to
		"Subject"=>,$from
		"TexBody"=>$mess);	
		curl_setopt($this->connection,CURLOPT_HTTPHEADER,array("Content-Type"=>"application/json"));
		curl_setopt($this->connection,CULOPT_POST,true);
		curl_setopt($this->connection,CURLOPT_POSTFIELDS,json_encode($data));


		
		
	}	



}
