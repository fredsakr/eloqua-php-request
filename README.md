eloqua-php-request
==================

Eloqua PHP Request is a client for Eloqua's REST API. It supports GET, POST, PUT and DELETE operations. The response from each method contains the raw string response from the HTTP request and the class contains a public variable (requestInfo) containing metadata from the response, including details such as the HTTP status code.

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
To determine the base url, you can use the following endpoint : login.eloqua.com/{id}  
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

## License
	Copyright [2012] [Fred Sakr]
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at
	http://www.apache.org/licenses/LICENSE-2.0
	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.
