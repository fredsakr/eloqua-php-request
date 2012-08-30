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
		curl_setopt($this->ch, CURLOPT_HEADER, 1); 
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

		// set headers
		$headers = array('Content-type: application/json');
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
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
				curl_setopt($this->ch, CURLOPT_POST, 1);
				curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($data));
				break;
			case 'DELETE':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
				break;
			case 'GET':
			default:
				break;
		}

		$response = curl_exec($this->ch);

		// catch http error status
		if (curl_getinfo($this->ch, CURLINFO_HTTP_CODE) >= 400) {
			return ($response);
		}

		// todo : add support in constructor for contentType {xml, json}	
		return json_decode($response);
	}
}

?>
