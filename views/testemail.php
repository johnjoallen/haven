<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require ('../config/appconfig.php');
$n = new Volunteer();
$id = 31;
$n->downloadSinglePDF($id);

?>