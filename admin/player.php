<!DOCTYPE html> 
<html> 
<head> 
	<title>Team Lex Volleyball - LGBT Volleyball in Lexington, Kentucky</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<meta name="description" content="Team Lex Volleyball offers a fun and friendly atmosphere for recreational and competitive volleyball among Lexington's gay, lesbian, bisexual and transgender community." />
	<meta name="keywords" content="gay, lesbian, bisexual, transgender, lgbt, lexington, kentucky, KY, lex, volleyball, nagva, recreational, competitive, sports, central, pioneer, adult, co-ed, bluegrass, bvc, team lex" />
			<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
				<link rel="stylesheet" href="../includes/css/teamlex.min.css" />
			<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
			<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
			
	<style>
	.ui-content p {
	padding:0 20px 0 20px;
	}
	</style>
	
	<script src="scripts.js"></script>
</head> 
<body> 

<div data-role="page" data-theme="j">

	<div data-role="header" data-theme="j">
		<a href="../index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a><h1></h1><a href="#" onClick="return admin_jumpPage('index.php');" data-role="button" data-icon="gear" data-iconpos="notext"></a>
	</div><!-- /header -->


	
	<div data-role="content">	
						<center>
	<img id="myBG" src="../includes/images/bg.png" align=center width="100%" style="max-width:420px;margin:0px;     
	-moz-border-radius: 25px;
	border-radius: 25px; display:none;">
	</center>
	
	
		
		<?php 
			$page = $_POST["password"]; 
			if ($page <> "asd") {
		?>


		<form action="index.php" method="post"> 
		<h1>Team Lex Admin</h1>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" value="" autocomplete="off">
		
		<input type="submit" value="Go" data-icon="star" data-iconpos="right" data-mini="true" data-theme="j">
		</form>
		
		<?php
		   }
		   else {
		        
				require ('../db_login.php');
				$thisSeason = $_GET["season"];
				$thisID = $_GET["ID"];
				if($_POST['email']<>"") {
					//UPDATE PLAYER EMAIL
					$updateRostersQuery="UPDATE players SET Email = '{$_POST['email']}' WHERE ID=$thisID";
					$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				if($_POST['name']<>"") {
					//UPDATE PLAYER NAME 
					$updateRostersQuery="UPDATE players SET Name = '{$_POST['name']}' WHERE ID=$thisID";
					$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				if($_POST['paid']<>"") {
					//UPDATE PLAYER AMOUNT PAID
					if($_POST['paid']=="-1"){
						$updateRostersQuery="UPDATE players SET Paid = NULL WHERE ID=$thisID";
					}
					else
					{
						$updateRostersQuery="UPDATE players SET Paid = '{$_POST['paid']}' WHERE ID=$thisID";
					}
					$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				if($_POST['togglept']<>"") {
					$updateRostersQuery="UPDATE rosters SET PT = !PT WHERE ID = '{$_POST['togglept']}'";
					$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				if($_POST['togglec']<>"") {
					$updateRostersQuery="UPDATE rosters SET Captain = !Captain WHERE ID = '{$_POST['togglec']}'";
					$updateRostersQueryResult = mysql_query($updateRostersQuery);
				}
				if($_POST['delroster']<>"") {
				
						//DELETE PLAYER AND UPDATE ALL ROSTERS THAT HAD THE DELETED PLAYER
						$deleteRostersQuery="DELETE FROM rosters WHERE ID='{$_POST['delroster']}'";
						$deleteRostersQueryResult = mysql_query($deleteRostersQuery);
					}
				?>
			
				<form name="adminForm" id="adminForm" action="player.php<?php print "?ID={$_GET['ID']}"; ?>" method="post"> 

				<input type="hidden" name="password" id="password" value="asd">
				<input type="hidden" name="delplayer" id="delplayer" value="">
				<input type="hidden" name="delroster" id="delroster" value="">
				<input type="hidden" name="togglept" id="togglept" value="">
				<input type="hidden" name="togglec" id="togglec" value="">

			<?php
				
				$playersQuery = "SELECT * FROM players WHERE ID = '{$_GET['ID']}' ORDER BY ID ASC";
				$playersQueryResylt = mysql_query($playersQuery);
						
				if (!playersQueryResylt) {
				die ("Could not query the database:". mysql_error());
				}
				
				while ($rowPlayer = mysql_fetch_array($playersQueryResylt, MYSQL_ASSOC)) { ?>
					<p>
					<h1><?php print $rowPlayer[Name]; ?></h1>
						<i>(ID: <?php print $rowPlayer[ID]; ?>)</i></td>
					<br>
						Email: <a href="mailto:<?php print $rowPlayer[Email]; ?>"><?php print $rowPlayer[Email]; ?></a>
					<br>
						Amount Paid: <?php print $rowPlayer[Paid]; ?>
					</p>
					
					<?php
				}
				
				$rostersQuery = "SELECT rosters.ID, rosters.PT, rosters.Captain, seasons.Name as seasonname, teams.Name as teamname FROM rosters JOIN teams ON rosters.Team = teams.ID JOIN seasons ON teams.Season = seasons.ID WHERE rosters.Player = '{$_GET['ID']}' ORDER BY seasons.ID ASC";
				$rostersQueryResult = mysql_query($rostersQuery);
				if (!rostersQueryResult) {
					die ("Could not query the database:". mysql_error());
				}
				print "<b>Rosters</b><br>";
				if (mysql_num_rows($rostersQueryResult) == 0) {
					print "This player is not currently on any rosters.";
				}
				?>
				<table width='100%'>
				<?php
				while ($rowRoster = mysql_fetch_array($rostersQueryResult, MYSQL_ASSOC)) { ?>
				   <tr><th colspan=3>
				   <?php print $rowRoster[seasonname]; ?></th></tr>
				   <td valign=middle><a href="#" data-role="button" name="del-player-<?php print $rowRoster[ID]; ?>" data-theme="a" data-mini="true" data-inline="true"  data-icon="delete" data-iconpos="right" onClick="return confirmDeleteRoster(<?php print $rowRoster[ID]; ?>)"><?php print $rowRoster[teamname]; ?></a></td>
				   <td valign=middle>
				   <label for="slider-flip-pt-<?php print $rowRoster[ID]; ?>">Part-time? </label>
					<select name="slider-flip-pt-<?php print $rowRoster[ID]; ?>" id="slider-flip-pt-<?php print $rowRoster[ID]; ?>" data-role="slider" data-mini="true" onChange="togglePT(<?php print $rowRoster[ID]; ?>)">
						<option value="0">No</option>
						<option value="1" <?php if ($rowRoster[PT]<>'0') print "selected";?>>Yes</option>
					</select>

				</td><td valign=middle>
				   
				  <label for="slider-flip-c-<?php print $rowRoster[ID]; ?>">Captain? </label>
					<select name="slider-flip-c-<?php print $rowRoster[ID]; ?>" id="slider-flip-c-<?php print $rowRoster[ID]; ?>" data-role="slider" data-mini="true" onChange="toggleC(<?php print $rowRoster[ID]; ?>)">
						<option value="0">No</option>
						<option value="1" <?php if ($rowRoster[Captain]<>'0') print "selected";?>>Yes</option>
					</select>
					
					</td>
					</tr>
				<?php
				}
				?>
				</table>
				<h3>Update Player Info</h3>
				
				<div data-role="fieldcontain">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" placeholder="Name as it will appear on website"value="" />
				</div>
				
				<div data-role="fieldcontain">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" placeholder=""value="" />
				</div>
				
				<div data-role="fieldcontain">
				<label for="paid">Amount Paid:</label>
				<input type="number" name="paid" id="paid" placeholder=""value="Enter -1 to mark as unpaid" />
				</div>
				
				
				<input type="submit" data-role="button" value="Update" data-icon="star" data-iconpos="right" data-mini="true" data-theme="b">
				
				<a href="#" data-role="button" name="del-player-<?php print $thisID; ?>" data-theme="a" data-mini="true" data-inline="true"  data-icon="delete" data-iconpos="right" onClick="return confirmDeletePlayer(<?php print $thisID; ?>)">Delete All Player Data</a> 

				</form>
		
				<?php
				}
				?>
		
	
	</div><!-- /content -->

	<div data-role="footer" class="nav-glyphish-example" data-theme="i" data-position="fixed">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
			<ul>
				<li><a href="#" id="sched" data-icon="custom" data-theme="i" onClick="return admin_jumpPage('schedule.php');">Schedule</a></li>
				<li><a href="#" id="teams" data-icon="custom" data-theme="i" onClick="return admin_jumpPage('teams.php');">Teams</a></li>
				<li><a href="#" id="standings" data-icon="custom" data-theme="i" onClick="return admin_jumpPage('standings.php');">Standings</a></li>
				<li><a href="#" id="contact" data-icon="custom" data-theme="i" onClick="return admin_jumpPage('players.php');">Players</a></li>
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

