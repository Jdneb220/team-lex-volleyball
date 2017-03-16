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


		<form action="players.php" method="post">
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
				?>
				<h1>Team Lex Admin Portal</h1>
				
				<?php
				if($_POST['name']<>"") {
	
						//CREATE NEW PLAYER
						$insertPlayerQuery="INSERT INTO players SET Name='{$_POST['name']}', Email='{$_POST['email']}'";
						$insertPlayerQueryResult = mysql_query($insertPlayerQuery);
							
						}
				else if ($_GET["player"] <> "") {
						//A REQUEST TO PUT A PLAYER ON A TEAM HAS BEEN MADE
						
						//FIND THE NUMBER OF ROWS IN ROSTERS THAT HAVE THIS PLAYER PLAYING ON A TEAM THIS SEASON
						  $numRostersQuery = "SELECT rosters.ID, rosters.Player, rosters.Team FROM rosters JOIN teams ON rosters.Team = teams.ID JOIN seasons ON teams.Season = seasons.ID WHERE (seasons.ID = $thisSeason AND rosters.player = '{$_GET['player']}')";
						  $numRostersQueryResult = mysql_query($numRostersQuery);
						  $numRosters = mysql_num_rows($numRostersQueryResult);
						  //IF THERE ARE NO ROSTERS
						  if ($numRosters == 0){				
								$updateRoster="INSERT INTO rosters SET Team='{$_GET['team']}',Player='{$_GET['player']}'";
								$updateRosterResult = mysql_query($updateRoster);
						  }
						  //IF THERE ARE ROSTERS AND A REQUEST WAS SENT TO CHANGE THIS PLAYER'S TEAM
						  else 
						   $message = "team.php?ID=" . $_GET["team"];
						   echo "<script type='text/javascript'>admin_jumpPage('$message');</script>";
						  
						   //$rosterToUpdate = mysql_fetch_array($numRostersQueryResult, MYSQL_ASSOC);
						   //if ($_GET["team"] <> $rosterToUpdate["Team"]){
							//$updateRoster="UPDATE rosters SET Captain=0, Team='{$_GET['team']}',Player='{$_GET['player']}' WHERE ID=$rosterToUpdate[ID]";
							//$updateRosterResult = mysql_query($updateRoster);
						   //}
						  }
				
				
				else if($_POST['delplayer']<>"") {
				
						//DELETE PLAYER AND DELETE ALL ROSTERS THAT HAD THE DELETED PLAYER
						$deletePlayerQuery="DELETE FROM players WHERE ID='{$_POST['delplayer']}' LIMIT 1";
						$deletePlayerQueryResult = mysql_query($deletePlayerQuery);
						$updateRostersQuery="DELETE FROM rosters WHERE Player='{$_POST['delplayer']}'";
						$updateRostersQueryResult = mysql_query($updateRostersQuery);
					}
				?>
				
				<form name="adminForm" id="adminForm" action="players.php<?php if ($_GET["season"]<>'') {print "?season=$thisSeason";} ?>" method="post"> 
				<input type="hidden" name="password" id="password" value="asd">
				
				
				<div data-role="fieldcontain">
				<label for="seasonSelector">Season:</label>
				<select name="seasonSelector" id="seasonSelector" onchange="MM_jumpMenu('parent',this,0)">
					  <?php
					  
                      $seasonQuery = "SELECT * FROM seasons ORDER BY ID Desc";
					  $seasonQueryResult = mysql_query($seasonQuery);
					    
					  while ($rowSeason = mysql_fetch_array($seasonQueryResult, MYSQL_ASSOC)) { 
					  if ($thisSeason == "") {
					  $thisSeason = $rowSeason[ID];
					  }
                      ?>
                   	  <option value="players.php?season=<?php print $rowSeason[ID]; ?>" <?php if ($_GET["season"]==$rowSeason[ID]) { 
					  $thisSeason = $rowSeason[ID];
					  print 'selected'; 
					  } ?>><?php print $rowSeason[Name]; ?></option>
                      <?php } ?>
				
                </select>
				</div>
				
				
				<div id='stats' data-role='collapsible'>
				<?php
				
					$playersQuery = "SELECT * FROM players ORDER BY Name ASC";
					$playersQueryResult = mysql_query($playersQuery);
					
					if (!playersQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					print "<h4>Emails</h4><table width=100%>";
					$emails = "";
					while ($rowPlayer = mysql_fetch_array($playersQueryResult, MYSQL_ASSOC)) {
					  $emails = $emails . $rowPlayer[Email] . "; ";
					}
					print "<tr><td align=center colspan=2>" . $emails . "</td></tr>";
					
					print "<tr><td colpan=2>Number of players in database = " . mysql_num_rows($playersQueryResult) . "</td></tr>";
					
					$numPlayerThisSeasonQuery = "SELECT * FROM players JOIN rosters ON players.ID = rosters.Player JOIN teams ON rosters.Team = teams.ID JOIN seasons ON seasons.ID = teams.Season WHERE seasons.ID = $thisSeason ORDER BY players.Name ASC";
					$numPlayerThisSeasonQueryResult = mysql_query($numPlayerThisSeasonQuery);
					
					print "<tr><td colspan=2>Players on teams this season = " . mysql_num_rows($numPlayerThisSeasonQueryResult) . "</td></tr>";
					
					
					$numPlayerThisSeasonQuery = "SELECT * FROM players WHERE isNull(Paid) = false";
					$numPlayerThisSeasonQueryResult = mysql_query($numPlayerThisSeasonQuery);
					print "<tr><td colspan=2>Players paid and registered = " . mysql_num_rows($numPlayerThisSeasonQueryResult) . "</td></tr>";
					
					print "</table></div>";
					
					$playersQuery = "SELECT * FROM players ORDER BY Name ASC";
					$playersQueryResult = mysql_query($playersQuery);
					
					print "<div id='allPlayers' data-role='collapsible'><h4>All Players</h4><table width=100%>";
					while ($rowPlayer = mysql_fetch_array($playersQueryResult, MYSQL_ASSOC)) { ?>
						<tr>
							<td>

							<a href="#" data-role="button" name="player-prof-<?php print $rowPlayer[ID]; ?>" 
							<?php
								  if ($rowPlayer[Paid] <> NULL){
									print "data-theme='d'";
								  }
						    ?> data-inline="true" onClick="return admin_jumpPage('player.php?ID=<?php print $rowPlayer[ID]; ?>&season=<?php print $thisSeason;?>')"><?php print $rowPlayer[Name]; ?></a> 
							
							</td>
							
							<td>
							
							<?php
						
							//FIND THE DATA THEME OF THE TEAM THIS PLAYER IS ON
							$definitePlayerTeamDataTheme = "SELECT teams.Data_Theme FROM teams JOIN rosters ON teams.ID = rosters.Team JOIN seasons ON teams.Season = seasons.ID where rosters.Player = $rowPlayer[ID] and teams.Season =$thisSeason";
							$definitePlayerTeamDataThemeResult = mysql_query($definitePlayerTeamDataTheme);
							
							//IF THERE ARE NO TEAMS
							if (mysql_num_rows($definitePlayerTeamDataThemeResult) == 0){
								$dataTheme = "";
							}
							else{
								$dataTheme = mysql_fetch_array($definitePlayerTeamDataThemeResult, MYSQL_ASSOC);
							}
							
							?>
							<div data-role="fieldcontain">
							<select name="teamSelector" id="teamSelector" data-theme= "<?php print $dataTheme[Data_Theme] ?>" onchange="MM_jumpMenu('parent',this,0)">

								  <?php
								  if ($dataTheme == ""){
									print "<option>Choose a team..</option>";
								  }
								  $teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { 
									?>
									<option value="players.php?player=<?php print $rowPlayer[ID]?>&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]==$dataTheme[Data_Theme]) { print 'selected'; } ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							</div>
							
							</td>
							
							

						</tr>

					<?php
					 }
					 print "</table></div>";
					 
					  //All Players Dropdown
					  $emails = "";
					  $totalMoney = 0;
					  $totalPlayers = 0;
					
					
					
					
					
					
					
					$playersQuery = "SELECT * FROM players WHERE isNull(Paid) = false ORDER BY Name ASC";
					$playersQueryResult = mysql_query($playersQuery);
					
					print "<div id='paidPlayers' data-role='collapsible'><h4>Registered Players</h4><table width=100%>";
					while ($rowPlayer = mysql_fetch_array($playersQueryResult, MYSQL_ASSOC)) { 
					$totalMoney = $totalMoney + $rowPlayer[Paid];
					if ($rowPlayer[Paid] <> 0){
						$totalPlayers++;
					}
					$emails = $emails . $rowPlayer[Email] . "; ";
					?>
						<tr>
							<td>

							<a href="#" data-role="button" name="player-prof-<?php print $rowPlayer[ID]; ?>" 
							<?php
								  if ($rowPlayer[Paid] <> NULL){
									print "data-theme='d'";
								  }
						    ?> data-inline="true" onClick="return admin_jumpPage('player.php?ID=<?php print $rowPlayer[ID]; ?>&season=<?php print $thisSeason;?>')"><?php print $rowPlayer[Name]; ?></a> 
							
							</td>
							
							<td>
							
							<?php
						
							//FIND THE DATA THEME OF THE TEAM THIS PLAYER IS ON
							$definitePlayerTeamDataTheme = "SELECT teams.Data_Theme FROM teams JOIN rosters ON teams.ID = rosters.Team JOIN seasons ON teams.Season = seasons.ID where rosters.Player = $rowPlayer[ID] and teams.Season =$thisSeason";
							$definitePlayerTeamDataThemeResult = mysql_query($definitePlayerTeamDataTheme);
							
							//IF THERE ARE NO TEAMS
							if (mysql_num_rows($definitePlayerTeamDataThemeResult) == 0){
								$dataTheme = "";
							}
							else{
								$dataTheme = mysql_fetch_array($definitePlayerTeamDataThemeResult, MYSQL_ASSOC);
							}
							
							?>
							<div data-role="fieldcontain">
							<select name="teamSelector" id="teamSelector" data-theme= "<?php print $dataTheme[Data_Theme] ?>" onchange="MM_jumpMenu('parent',this,0)">

								  <?php
								  if ($dataTheme == ""){
									print "<option>Choose a team..</option>";
								  }
								  $teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { 
									?>
									<option value="players.php?player=<?php print $rowPlayer[ID]?>&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]==$dataTheme[Data_Theme]) { print 'selected'; } ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							</div>
							
							</td>
							
							

						</tr>

					<?php
					 }
					 print "<tr><td colspan=2><h4>Total Paid Players = " . $totalPlayers . "</h4><h4>Registration Money = $" . $totalMoney . "</h4><div id='paidEmails' data-role='collapsible'  data-theme='b' data-content-theme='d'><h4>Registered Player Emails</h4>" . $emails . "</div></td></tr>";
					 print "</table></div>";
					 
					 
					  //Paid Players Dropdown
					  $emails = "";
					  $totalMoney = 0;
					  $totalPlayers = 0;
					  
					  $playersQuery = "SELECT * FROM players WHERE Paid = 0 ORDER BY Name ASC";
					$playersQueryResult = mysql_query($playersQuery);
					
					print "<div id='unpaidPlayers' data-role='collapsible'><h4>Registered Unpaid Players</h4><table width=100%>";
					while ($rowPlayer = mysql_fetch_array($playersQueryResult, MYSQL_ASSOC)) { 
					$emails = $emails . $rowPlayer[Email] . "; ";
					?>
						<tr>
							<td>

							<a href="#" data-role="button" name="player-prof-<?php print $rowPlayer[ID]; ?>" 
							<?php
								  if ($rowPlayer[Paid] <> NULL){
									print "data-theme='d'";
								  }
						    ?> data-inline="true" onClick="return admin_jumpPage('player.php?ID=<?php print $rowPlayer[ID]; ?>&season=<?php print $thisSeason;?>')"><?php print $rowPlayer[Name]; ?></a> 
							
							</td>
							
							<td>
							
							<?php
						
							//FIND THE DATA THEME OF THE TEAM THIS PLAYER IS ON
							$definitePlayerTeamDataTheme = "SELECT teams.Data_Theme FROM teams JOIN rosters ON teams.ID = rosters.Team JOIN seasons ON teams.Season = seasons.ID where rosters.Player = $rowPlayer[ID] and teams.Season =$thisSeason";
							$definitePlayerTeamDataThemeResult = mysql_query($definitePlayerTeamDataTheme);
							
							//IF THERE ARE NO TEAMS
							if (mysql_num_rows($definitePlayerTeamDataThemeResult) == 0){
								$dataTheme = "";
							}
							else{
								$dataTheme = mysql_fetch_array($definitePlayerTeamDataThemeResult, MYSQL_ASSOC);
							}
							
							?>
							<div data-role="fieldcontain">
							<select name="teamSelector" id="teamSelector" data-theme= "<?php print $dataTheme[Data_Theme] ?>" onchange="MM_jumpMenu('parent',this,0)">

								  <?php
								  if ($dataTheme == ""){
									print "<option>Choose a team..</option>";
								  }
								  $teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { 
									?>
									<option value="players.php?player=<?php print $rowPlayer[ID]?>&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]==$dataTheme[Data_Theme]) { print 'selected'; } ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							</div>
							
							</td>
							
							

						</tr>

					<?php
					 }
					 print "<tr><td colspan=2><div id='unpaidEmails' data-role='collapsible'  data-theme='b' data-content-theme='d'><h4>Registered Unpaid Player Emails</h4>" . $emails . "</div></td></tr>";
					 print "</table></div>";
					 
					 
					  //UnPaid Players Dropdown
					  $emails = "";
					  
					  

					
					$playersQuery = "SELECT * FROM players WHERE isNull(Paid) = true ORDER BY Name ASC";
					$playersQueryResult = mysql_query($playersQuery);
					
					print "<div id='UnregisteredPlayers' data-role='collapsible'><h4>Unregistered Players</h4><table width=100%>";
					while ($rowPlayer = mysql_fetch_array($playersQueryResult, MYSQL_ASSOC)) { 
					$emails = $emails . $rowPlayer[Email] . "; ";
					?>
						<tr>
							<td>

							<a href="#" data-role="button" name="player-prof-<?php print $rowPlayer[ID]; ?>" 
							<?php
								  if ($rowPlayer[Paid] <> NULL){
									print "data-theme='d'";
								  }
						    ?> data-inline="true" onClick="return admin_jumpPage('player.php?ID=<?php print $rowPlayer[ID]; ?>&season=<?php print $thisSeason;?>')"><?php print $rowPlayer[Name]; ?></a> 
							
							</td>
							
							<td>
							
							<?php
						
							//FIND THE DATA THEME OF THE TEAM THIS PLAYER IS ON
							$definitePlayerTeamDataTheme = "SELECT teams.Data_Theme FROM teams JOIN rosters ON teams.ID = rosters.Team JOIN seasons ON teams.Season = seasons.ID where rosters.Player = $rowPlayer[ID] and teams.Season =$thisSeason";
							$definitePlayerTeamDataThemeResult = mysql_query($definitePlayerTeamDataTheme);
							
							//IF THERE ARE NO TEAMS
							if (mysql_num_rows($definitePlayerTeamDataThemeResult) == 0){
								$dataTheme = "";
							}
							else{
								$dataTheme = mysql_fetch_array($definitePlayerTeamDataThemeResult, MYSQL_ASSOC);
							}
							
							?>
							<div data-role="fieldcontain">
							<select name="teamSelector" id="teamSelector" data-theme= "<?php print $dataTheme[Data_Theme] ?>" onchange="MM_jumpMenu('parent',this,0)">

								  <?php
								  if ($dataTheme == ""){
									print "<option>Choose a team..</option>";
								  }
								  $teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { 
									?>
									<option value="players.php?player=<?php print $rowPlayer[ID]?>&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]==$dataTheme[Data_Theme]) { print 'selected'; } ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							</div>
							
							</td>
							
							

						</tr>

					<?php
					 }
					 print "<tr><td colspan=2><div id='UnregisteredEmails' data-role='collapsible'  data-theme='b' data-content-theme='d'><h4>Unregistered Player Emails</h4>" . $emails . "</div></td></tr>";
					 print "</table></div>";
					 
					 
					  //Unregistered Players Dropdown
					  $emails = "";
					  
					  

					
					?>
					
					
					
					
					
				 
				
				
				<h3>Add a Player</h3>
				
				<div data-role="fieldcontain">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" placeholder="Name as it will appear on website"value="" />
				</div>
				
				<div data-role="fieldcontain">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" placeholder=""value="" />
				</div>
				
				
				<input type="submit" value="Go" data-icon="star" data-iconpos="right" data-mini="true" data-theme="b">
			
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

