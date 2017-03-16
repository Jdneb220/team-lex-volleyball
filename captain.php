<!DOCTYPE html> 
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

<div data-role="page">

	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="i">	
		<div class="ui-body ui-body-b">
		
					<?php 
					require ('db_login.php');
					  if ($_GET["season"]<>""){
					   $thisSeason = $_GET["season"];
					  }
					  else {
						  $siteSeasonQuery = "SELECT the_content as ID FROM other_content WHERE other_content.name='siteSeason' LIMIT 1";
						  $siteSeasonQueryResult = mysql_query($siteSeasonQuery);
							
						  while ($row = mysql_fetch_array($siteSeasonQueryResult, MYSQL_ASSOC)) { 
							$thisSeason = $row[ID];
						}
					  }
  
					$thisID = $_GET["ID"];
					$playerQuery = "SELECT players.*, rosters.Team as CaptainTeam FROM players join rosters on players.ID = rosters.Player join teams on rosters.team = teams.ID WHERE players.ID = $thisID and rosters.Captain = 1 and teams.Season = $thisSeason";
					$playerResult = mysql_query($playerQuery);
					
					if (!playerResult) {
					die ("Could not query the database:". mysql_error());
					}
					$row = mysql_fetch_array($playerResult, MYSQL_ASSOC);
					?>
					
			<?php 
			$page = $_POST["password"]; 
			if ($page <> $row[Email]) {
		?>


		<form action="captain.php?ID=<? print $thisID; ?>" method="post">
		<h1>Team Lex Captain Login</h1>		
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" value="" autocomplete="off">
		<input type="submit" value="Go" data-icon="star" data-iconpos="right" data-mini="true" data-theme="j">
		</form>
		
		<?php
		   }
		   else {
				?>
				<h1>Greetings <?php print $row[Name];?></h1>
				<?php
					$teamQuery = "SELECT distinct players.Email FROM players join rosters on players.ID = rosters.player where rosters.Team = $row[CaptainTeam] ORDER BY players.email ASC";
					$teamResult = mysql_query($teamQuery);
					?>
					<h3>Please use the following emails to communicate with your team members:</h3>
					<ul>
					<?php
					while ($rowPlayer = mysql_fetch_array($teamResult, MYSQL_ASSOC)) { 
					  print $rowPlayer[Email] . ", ";
					}
		            ?>
					</ul>
			<?php
			 }
			?>
					
		</div><!-- /themed container -->
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

