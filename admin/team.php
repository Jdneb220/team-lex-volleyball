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

				if($_POST['teamname']<>"") {
					//UPDATE TEAM NAME
					$updateTeamQuery="UPDATE teams SET Division = {$_POST['division']}, Name = '{$_POST['teamname']}' WHERE ID=$thisID";
					$updateTeamQueryResult = mysql_query($updateTeamQuery);
					}
					
				else if($_POST['delplayer']<>"") {
				
						//DELETE PLAYER AND DELETE ALL ROSTERS THAT HAD THE DELETED PLAYER
						$updateRostersQuery="DELETE FROM rosters WHERE Team='{$thisID}' and Player='{$_POST['delplayer']}'";
						$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				
				if($_POST['addPlayerSelect']<>"") {
					//ADD ROSTER ENTRY FOR NEW PLAYER
					$updateTeamQuery="INSERT INTO rosters SET Player = '{$_POST['addPlayerSelect']}', Team = '{$thisID}'";
					$updateTeamQueryResult = mysql_query($updateTeamQuery);
					}

				?>
			
				<form name="adminForm" id="adminForm" action="team.php<?php print "?ID={$_GET['ID']}"; ?>" method="post"> 

				<input type="hidden" name="password" id="password" value="asd">
				<input type="hidden" name="delteam" id="delteam" value="">
				<input type="hidden" name="delplayer" id="delplayer" value="">

			<?php
				
				$teamQuery = "SELECT * FROM teams WHERE ID = '{$_GET['ID']}' ORDER BY ID ASC";
				$teamQueryResult = mysql_query($teamQuery);
						
				if (!teamQueryResult) {
				die ("Could not query the database:". mysql_error());
				}
				
				while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
					<p>
					
					<h2><?php print $rowTeam[Name]; ?></h2>
					<?php

						switch ($rowTeam[Division]) {
						  case 0 : echo "<b>Recreational Division</b><br>"; break;
						  case 1 : echo "<b>Competitive Division</b><br>"; break;
						}
					?>
						<i>(ID: <?php print $rowTeam[ID]; ?>)</i></td>
					<br>
						Data-Theme: <?php print $rowTeam[Data_Theme]; ?></a>
					</p>
					
					<?php
				}
				
				$rostersQuery = "SELECT seasons.Name as SeasonName, rosters.PT, rosters.Captain, players.Name as PlayerName, players.ID FROM rosters JOIN players ON rosters.Player = players.ID JOIN teams ON rosters.Team = teams.ID JOIN seasons ON teams.Season = seasons.ID WHERE (rosters.Team='{$_GET['ID']}') ORDER BY seasons.ID ASC, players.Name ASC ";
				$rostersQueryResult = mysql_query($rostersQuery);
				if (!rostersQueryResult) {
					die ("Could not query the database:". mysql_error());
				}
				print "<b>Rosters</b><br>";
				if (mysql_num_rows($rostersQueryResult) == 0) {
					print "This team does not currently have any rosters.";
				}
				?>
				<table width='100%'>
				<?php
				while ($rowRoster = mysql_fetch_array($rostersQueryResult, MYSQL_ASSOC)) { 
				  if ($thisSeason <> $rowRoster[SeasonName]){
				    $thisSeason = $rowRoster[SeasonName];
					?>
					<tr><th colspan=3>
				    <?php print $rowRoster[SeasonName]; ?></th></tr>
				    <?php
					}
					?>
				   
				   <tr>
				   <td>

								<?php if ($rowRoster[Captain]=='1'){ ?>
											<img src="../includes/images/captainStar.png">
									  <?php 
									  }
											print $rowRoster[PlayerName];
									  if ($rowRoster[PT]=='1') { ?>
											<img src="../includes/images/partTimeIcon.png" style="margin-left:5px">
									  <?php
									  }
								?>

					</td>
					<td colspan =2>
					<a href="#" data-role="button" name="del-player-<?php print $rowRoster[ID] ?>" data-mini="true" data-inline="true" onClick="return confirmDeletePlayerFromRoster(<?php print $rowRoster[ID] ?>)">Remove Player</a>
					</td>
					</tr>
					
					
				
				<?php
				}
				?>
				<tr><td colspan=3>
				<select data-mini="true" data-inline="true" name="addPlayerSelect" id="addPlayerSelect">
					<option val="">Choose a player to add...</option>
					<?php
						$rostersQueryAdd = "SELECT DISTINCT players.Name as PlayerName, players.ID FROM players where Paid is not null ORDER BY players.Name ASC ";
						$rostersQueryAddResult = mysql_query($rostersQueryAdd);
						if (!rostersQueryAddResult) {
							die ("Could not query the database:". mysql_error());
						}	
						if (mysql_num_rows($rostersQueryAddResult) == 0) {
							print "This team does not currently have any rosters.";
						}
						while ($rowRosterAdd = mysql_fetch_array($rostersQueryAddResult, MYSQL_ASSOC)) { 
							echo "<option value=" . $rowRosterAdd[ID] . ">" . $rowRosterAdd[PlayerName]. "</option>";
						}
					?>
				
				</select>
				<br>
					<input type="submit" data-role="button" value="Add Player" data-icon="star" data-iconpos="right" data-mini="true" data-theme="d">
					</td>
				</tr>
					
				</table>
				<h3>Update Team Info</h3>
				
				<div data-role="fieldcontain">
				<label for="teamname">Name:</label>
				<input type="text" name="teamname" id="teamname" placeholder="" value="" />
				</div>
				
				<div data-role="fieldcontain">
				<label for="division">Division:</label>
				<select name="division" id="division" data-theme= "j">
					<option value=0>Recreational</option>
					<option value=1>Competitive</option>
				</select>
				</div>
				
				<input type="submit" data-role="button" value="Update" data-icon="star" data-iconpos="right" data-mini="true" data-theme="b">
				
				<a href="#" data-role="button" name="del-team-<?php print $_GET['ID'] ?>" data-mini="true" data-inline="true" onClick="return confirmDelete(<?php print $_GET['ID'] ?>)">Delete Team</a>

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

