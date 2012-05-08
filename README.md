eloqua-php-request
==================

Eloqua PHP Request

## Usage
### GET
	<?php
		include('./eloquaRequest.php');
		$response = $eloquaRequest->get('/API/REST/1.0/assets/emails?search=*Demand*&page=1&count=50&depth=minimal');
	?>

### POST
	<?php
		include('./eloquaRequest.php');
		$data = ...
		$response = $eloquaRequest->post('/API/REST/1.0/assets/emails?search=*Demand*&page=1&count=50&depth=minimal', $data);
		...
	?>

### PUT
	<?php
		include('./eloquaRequest.php');
		$data = ...
		$response = $eloquaRequest->put('/API/REST/1.0/assets/emails?search=*Demand*&page=1&count=50&depth=minimal', $data);
		...
	?>

### DELETE
	<?php
		include('./eloquaRequest.php');
		$response = $eloquaRequest->delete('/API/REST/1.0/assets/emails?search=*Demand*&page=1&count=50&depth=minimal');
	?>

	
