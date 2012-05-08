<?php

class EloquaRequest
{
	public $ch;
	public $baseUrl;

	public function __construct($site, $user, $pass, $baseUrl)
	{
		// initialize the cURL resource
		$this->ch = curl_init();

		// basic authentication credentials
		$credentials = $site . '\\' . $user . ':' . $pass;

		// set the base URL for the API endpoint
		$this->baseUrl = $baseUrl;
		
		// set cURL options
		curl_setopt($this->ch, CURLOPT_URL, $baseUrl);
		curl_setopt($this->ch, CURLOPT_USERPWD, $credentials); 
	}

	public function __destruct()
	{
		curl_close($this->ch);
	}

	public function get($url)
	{
		return $this->executeRequest($url, 'GET');
	}

	public function post($url, $data)
	{
		return $this->executeRequest($url, 'POST', $data);
	}

	public function put($url, $body)
	{
		return $this->executeRequest($url, 'PUT', $data);
	}

	public function delete($url)
	{
		return $this->executeRequest($url, 'DELETE');	
	}
	
	public function executeRequest($url, $method, $data=null)
	{
		// set the full URL for the request
		curl_setopt($this->ch, CURLOPT_URL, $this->baseUrl . '/' . $url);

		switch ($method) {
			case 'POST':
			case 'PUT':
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
				break;
			case 'DELETE':
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
				break;
			case 'GET':
			default:
				break;
		}

		// execute the request and return the result
		$data = curl_exec($this->ch);
	
		// todo : add support in constructor for contentType {xml, json}	
		return json_decode($data);
	}
}

?>
