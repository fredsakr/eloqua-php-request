<?php
include('./eloquaRequest.php');

$request = new EloquaRequest('site', 'user', 'password', 'https://secure.eloqua.com/API/REST/2.0');

class FieldValue
{
	public $id;
	public $type;
	public $value;
}

class FormSubmit
{
	public $submittedByContactId;
	public $fieldValues;
}

$firstNameData = new FieldValue();
$firstNameData->id = 5766;
$firstNameData->value = 'Fred';
$firstNameData->type = 'FieldValue';

$lastNameData = new FieldValue();
$lastNameData->id = 5767;
$lastNameData->value = 'Sakr';
$lastNameData->type = 'FieldValue';

$emailAddressData = new FieldValue();
$emailAddressData->id = 5768;
$emailAddressData->value = 'fred.sakr@oracle.com';
$emailAddressData->type = 'FieldValue';

$fieldValues = array($firstNameData, $lastNameData, $emailAddressData);

$submitData = new FormSubmit();
$submitData->submittedByContactId = 44891;
$submitData->fieldValues = $fieldValues;
$response = $request->post('/data/form/1011', $submitData);

?>
