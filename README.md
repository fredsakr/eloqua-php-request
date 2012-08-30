eloqua-php-request
==================

Eloqua PHP Request

## Usage

### GET
	<?php
	include('./eloquaRequest.php');
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$response = $eloquaRequest->get('/API/REST/1.0/assets/emails?search=Demand*&page=1&count=50&depth=minimal');
	?>

### POST
	<?php
	include('./eloquaRequest.php');
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');	
	$data = ...
	$response = $eloquaRequest->post('/API/REST/1.0/assets/email', $data);
	...
	?>

### PUT
	<?php
	include('./eloquaRequest.php');
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$data = ...
	$response = $eloquaRequest->put('/API/REST/1.0/assets/email/123', $data);
	...
	?>

### DELETE
	<?php
	include('./eloquaRequest.php');
	$eloquaRequest = new EloquaRequest('site', 'user', 'password', 'baseUrl');
	$response = $eloquaRequest->delete('/API/REST/1.0/assets/email/123');
	?>

	
