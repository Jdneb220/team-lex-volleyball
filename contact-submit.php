<?php

require ('db_login.php');
				

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name.  Click Sign Up to try again.");
//$tel = check_input($_POST['tel'], "Enter your phone number");
$email = check_input($_POST['email']);
$layout = check_input($_POST['layout']);
$pos1 = check_input($_POST['pos1']);
$pos2 = check_input($_POST['pos2']);
//$exp = check_input($_POST['exp']);
$transition = check_input($_POST['transition']);
$other = check_input($_POST['other']);


$playersQuery = "SELECT * FROM players WHERE Name = '{$name}' or Email = '{$email}'";
$playersQueryResult = mysql_query($playersQuery);

if (mysql_num_rows(	$playersQueryResult) > 0)
{
	show_error("Duplicate name/email found, you are already signed up to receive emails from Team Lex Volleyball.  If you were attempting to register and registration is still open, please visit our homepage.");
}
	
/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid.  Click Sign Up to try again.");
}

/* Set e-mail recipient */
$myemail = "teamlexvb@gmail.com";

/* Let's prepare the message for the e-mail */
$subject = "Team Lex Volleyball Sign Up";
$from = "From: $email";
$fromtag = "-f $email";

$message = "Name: $name
E-mail: $email

Message:
Vball Experience: $layout
Primary Preferred Position: $pos1
Secondary Preferred Position: $pos2
How they heard about Team Lex: $transition
Other: $other
";

/* Send the message using mail() function */
mail($myemail, $subject, $message, $from, $fromtag);
mail($email, $subject, "Thank you for your interest in Team Lex Volleyball!

Visit our website at http://www.teamlexvb.com or find us on Facebook.

You have been added to the Team Lex Volleyball Email Distribution List.  You will receive periodic updates regarding league events and the start of the next season.  For more information visit us at the Bluegrass Volleyball Center (709 Miles Point Way, Lexington KY).

See you soon,
Ben de Jesus
League Commissioner", "From: teamlexvb@gmail.com", "-f teamlexvb@gmail.com");

// Add player to DB... Does not redirect...

//CREATE NEW PLAYER
$insertPlayerQuery="INSERT INTO players SET Name='$name', Email='$email'";
$insertPlayerQueryResult = mysql_query($insertPlayerQuery);

mysql_close($connection);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>

<html> 
<head> 
	<title>Team Lex Volleyball - LGBT Volleyball in Lexington, Kentucky</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
			<link rel="stylesheet" href="includes/css/teamlex.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
		

</head> 
<body> 

<div data-role="page" data-theme="j">

	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h1>Error</h1>
		
		<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>

		
	</div><!-- /content -->

	<div data-role="footer" class="nav-glyphish-example" data-theme="i" data-position="fixed">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
			<ul>
				<li><a href="schedule.php" id="sched" data-icon="custom" data-theme="i">Schedule</a></li>
				<li><a href="teams.php" id="teams" data-icon="custom" data-theme="i">Teams</a></li>
				<li><a href="standings.php" id="standings" data-icon="custom" data-theme="i">Standings</a></li>
				<li><a href="contact.html" id="contact" data-icon="custom" data-theme="i">Sign Up</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
	
</div><!-- /page -->

</body>
<script>
$('#layout-radio-a').change(function() {
        $("#pos1-fieldcontain").show();
		$("#pos2-fieldcontain").show();

});

$('#layout-radio-b').change(function() {
        $("#pos1-fieldcontain").hide();
		$("#pos2-fieldcontain").hide();
});
</script>
</html>
<?php
exit();
}
?>