eloqua-php-request
==================

Eloqua PHP Request is a client for Eloqua's REST API. It supports get, post, put and delete operations. The response from each method contains the raw string response from the HTTP request and the class contains a public variable (requestInfo) containing metadata from the response, including details such as the HTTP status code.

## Usage
	<?php
	include('./eloquaRequest.php');
    ?>
    
### GET
	<?php
	$baseUrl = 'https://secure.eloqua.com/API/REST/1.0';
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', baseUrl);
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

	
