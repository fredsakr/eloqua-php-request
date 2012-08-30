<?php

class EloquaRequest
{
	public $ch;
	public $baseUrl;
	private $credentials;

	public function __construct($site, $user, $pass, $baseUrl)
	{
		// initialize the cURL resource
		$this->ch = curl_init();

		// basic authentication credentials
		$this->credentials = $site . '\\' . $user . ':' . $pass;

		// set the base URL for the API endpoint
		$this->baseUrl = $baseUrl;		
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
		// initialize the cURL resource
		$this->ch = curl_init();

		// set cURL options
		curl_setopt($this->ch, CURLOPT_URL, $this->baseUrl);
		curl_setopt($this->ch, CURLOPT_USERPWD, $this->credentials); 

		// set headers
		$headers = array('Content-type: application/json');
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

		// set the full URL for the request
		curl_setopt($this->ch, CURLOPT_URL, $this->baseUrl . '/' . $url);

		switch ($method) {
			case 'GET':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'GET');
				break;
			case 'POST':
				curl_setopt($this->ch, CURLOPT_POST, 1);
				curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($data));
				break;
			case 'PUT':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PUT');
				curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($data));
				break;
			case 'DELETE':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
				break;
			default:
				break;
		}

		$response = curl_exec($this->ch);

		// catch http error status
		if (curl_getinfo($this->ch, CURLINFO_HTTP_CODE) >= 400) 
		{
			// handle and log the error 
			// note : error message is in the response body
		}

		// todo : add support in constructor for contentType {xml, json}	
		return json_decode($response);
	}
}

?>
