<?php

// include the Eloqua REST client and models
include_once('../eloquaRequest.php');
include_once('../models/data/contact.php');

// instantiate a new instance of the Client
$client = new EloquaRequest('site', 'user', 'password', 'https://secure.eloqua.com/API/REST/1.0');

// invoke a GET request to List all contacts
$contacts = $client->get('/data/contacts?search=*&count=100&page=1');

// instantiate a new instance of the Contact class  
$contact = new Contact();  
$contact->firstName = 'Sample';  
$contact->lastName = 'Last';  
$contact->emailAddress = 'sample@test.com';

// invoke a POST request to create the contact  
$response = $client->post('/data/contact', $contact); 

// retrieve the ID of the new contact  
$contactId = $response->id;  

// change the contact's first name  
$contact->id = $contactId;   
$contact->firstName = 'updated';  
 
// invoke a PUT request to update the contact         
$response = $client->put('/data/contact/' . $contactId, $contact); 

// delete the contact
$client->delete('/data/contact/' . $contactId);  

?>
