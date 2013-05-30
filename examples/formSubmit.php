<?php

// include the request library and models
include('../eloquaRequest.php');
include('../models/data/formData.php');

// instantiate a new instance of the request class
$request = new EloquaRequest('site', 'user', 'password', 'baseUrl');

// populate values for each field, note that you can describe
// a form and its fields using the following endpoint : GET /assets/form/{id}

// assumes a form field (Name) with id : 1001
$nameField = new FieldValue();
$nameField->id = 1001;
$nameField->value = 'Fred';
$nameField->type = 'FieldValue';

// assumes a form field (Email) with id : 1002
$emailField = new FieldValue();
$emailField->id = 1002;
$emailField->value = 'fred.sakr@oracle.com';
$emailField->type = 'FieldValue';

// add the fieldValues to a collection
$fieldValues = array($nameField, $emailField);

// populate the form data submission request
$submitData = new formData();
$submitData->submittedByContactId = 1001;
$submitData->fieldValues = $fieldValues;
$submitData->type = 'FormData';

// invoke an HTTP Post request to submit the form data
$response = $request->post('/data/form/1011', $submitData);

?>
