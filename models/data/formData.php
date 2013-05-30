<?php

include('../models/identifiableContract.php');

class formData extends identifiableContract
{
	public $fieldValues;
	public $submittedAt;
	public $submittedByContactId;
}

class FieldValue
{
	public $id;
	public $type;
	public $value;
}

?>
