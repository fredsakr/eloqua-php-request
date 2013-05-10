eloqua-php-request
==================

Eloqua PHP Request is a client for Eloqua's REST API. It supports get, post, put and delete operations. The response from each method contains the raw string response from the HTTP request and the class contains a public variable (requestInfo) containing metadata from the response, including details such as the HTTP status code.

## Usage
	<?php
	include('./eloquaRequest.php');
    ?>
    
### GET
	<?php
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$response = $eloquaRequest->get('/assets/emails?search=Demand*&page=1&count=50&depth=minimal');
	?>

### POST
	<?php
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');	
	$data = ...
	$response = $eloquaRequest->post('/assets/email', $data);
	?>

### PUT
	<?php
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$data = ...
	$response = $eloquaRequest->put('/assets/email/123', $data);
	?>

### DELETE
	<?php
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$response = $eloquaRequest->delete('/assets/email/123');
	?>

## Endpoint URL
To determine the base url, you can use the following endpoint : login.eloqua.com/id  
The endpoint, when called with basic authentication, will return details about the URLs for the various APIs.
     
```json
{
    "site": {
        "id": 42,
        "name": "SampleInstall"
    },
    "user": {
        "id": 314,
        "username": "Fred Sakr",
        "displayName": "Fred Sakr",
        "firstName": "Fred",
        "lastName": "Sakr",
        "emailAddress": "fred.sakr@eloqua.com"
    },
    "urls": {
        "base": "https://www05.secure.eloqua.com",
        "apis"	...
	}
}
```