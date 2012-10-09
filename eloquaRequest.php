<?php

/**
 * REST client for Eloqua's API.
 */
class EloquaRequest
{
    private $ch;
    public $baseUrl;
    public $responseInfo;

	public function __construct($site, $user, $pass, $baseUrl)
	{
		// basic authentication credentials
		$credentials = $site . '\\' . $user . ':' . $pass;

		// set the base URL for the API endpoint
		$this->baseUrl = $baseUrl;		

		// initialize the cURL resource
		$this->ch = curl_init();

		// set cURL and credential options
		curl_setopt($this->ch, CURLOPT_URL, $this->baseUrl);
		curl_setopt($this->ch, CURLOPT_USERPWD, $credentials); 

		// set headers
		$headers = array('Content-type: application/json');
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);

		// return transfer as string
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
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

	public function put($url, $data)
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
			case 'GET':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'GET');
				break;
			case 'POST':
				curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'POST');
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

        // execute the request
        $response = curl_exec($this->ch);

        // store the response info including the HTTP status
        // 400 and 500 status codes indicate an error
        $this->responseInfo = curl_getinfo($this->ch);
        $httpCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        
        if ($httpCode > 400) 
        {            
            print_r($this->responseInfo);            
        }
        
        // todo : add support in constructor for contentType {xml, json}	
        return json_decode($response);
	}
}

?>
