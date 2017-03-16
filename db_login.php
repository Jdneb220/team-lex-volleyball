<?php



$db_host='teamlexvb.db.10830125.hostedresource.com';

$db_database='teamlexvb';

$db_username='teamlexvb';

$db_password='';





$connection = mysql_connect($db_host, $db_username, $db_password);

	if (!connection) {

		die ("Could not connect to the database: <br />". mysql_error());

		}



	$db_select = mysql_select_db($db_database);

	if (!$db_select){

		die ("Could not select the database: <br />". mysql_error());

		}



?>
