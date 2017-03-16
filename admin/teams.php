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


		<form action="teams.php" method="post"> 
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
				if($_POST['teamname']<>"") {
	
						//CREATE NEW TEAM
						$insertTeamQuery="INSERT INTO teams SET Name='{$_POST['teamname']}', Data_Theme='{$_POST['data_theme']}', Season='{$_POST['teamseason']}'";
						$insertTeamQueryResult = mysql_query($insertTeamQuery);
							
					}

				else if($_POST['delteam']<>"") {
				
						//DELETE TEAM AND DELETE ALL ROSTERS THAT HAD THE DELETED TEAM
						$deleteTeamQuery="DELETE FROM teams WHERE ID='{$_POST['delteam']}' LIMIT 1";
						$deleteTeamQueryResult = mysql_query($deleteTeamQuery);
						$deleteRostersQuery="DELETE FROM rosters WHERE Team='{$_POST['delteam']}'";
						$deleteRostersQueryResult = mysql_query($deleteRostersQuery);
						
						//FIND ALL MATCHES WITH TEAM (AWAY, HOME, AND REF) AND DELETE MATCH WITH ASSOCIATED SCORE ROW
						$findMatchesQuery="SELECT ID FROM matches WHERE Home='{$_POST['delteam']}' OR Away='{$_POST['delteam']}' OR Ref='{$_POST['delteam']}'";
						$findMatchesQuery = mysql_query($findMatchesQuery);
						if (mysql_num_rows($findMatchesQuery) > 0) {
							while ($rowMatch = mysql_fetch_array($findMatchesQuery, MYSQL_ASSOC)) { 
								$deleteMatchQuery="DELETE FROM matches WHERE ID=$rowMatch[ID]";
								$deleteMatchQueryResult = mysql_query($deleteMatchQuery);
								$deleteScoreRowQuery="DELETE FROM scores WHERE MatchID=$rowMatch[ID]";
								$deleteScoreRowQueryResult = mysql_query($deleteScoresQuery);
							}
						}
					}
					
				else if ($_GET['data_theme']<>"") {
						//UPDATE DATA THEME FOR TEAM
						$updateTeamDataTheme="UPDATE teams SET Data_Theme='{$_GET['data_theme']}' WHERE ID='{$_GET['team']}'";
						$updateTeamDataThemeResult = mysql_query($updateTeamDataTheme);
					}
				?>
				
				<form name="adminForm" id="adminForm" action="teams.php<?php if ($_GET["season"]<>'') {print "?season=$thisSeason";} ?>" method="post"> 
				<input type="hidden" name="password" id="password" value="asd">
				<input type="hidden" name="delteam" id="delteam" value="">
				
				<div data-role="fieldcontain">
				<label for="seasonSelector">Season:</label>
				<select name="seasonSelector" id="seasonSelector" onchange="MM_jumpMenu('parent',this,0)">
					  <?php
					  
                      $seasonQuery = "SELECT * FROM seasons ORDER BY ID desc";
					  $seasonQueryResult = mysql_query($seasonQuery);
					    
					  while ($rowSeason = mysql_fetch_array($seasonQueryResult, MYSQL_ASSOC)) { 
					  if ($thisSeason == "") {
					  $thisSeason = $rowSeason[ID];
					  }
                      ?>
                   	  <option value="teams.php?season=<?php print $rowSeason[ID]; ?>" <?php if ($_GET["season"]==$rowSeason[ID]) { 
					  $thisSeason = $rowSeason[ID];
					  print 'selected'; 
					  } ?>><?php print $rowSeason[Name]; ?></option>
                      <?php } ?>
				
                </select>
				</div>
				
				
				<table width=100%>
				<tr><th>Name</th><th>Data-Theme</th></tr>
				<?php
				
					$teamsQuery = "SELECT * FROM teams WHERE Season=$thisSeason ORDER BY ID ASC";
					$teamsQueryResult = mysql_query($teamsQuery);
							
					if (!teamsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($rowTeam = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { ?>
						<tr>
							<td><?php 
							if ($rowTeam[Data_Theme] <> "") { 
							?>
							<a href='#' data-role='button' data-theme='<?php print $rowTeam[Data_Theme];?>' onClick="return admin_jumpPage('team.php?ID=<?php print $rowTeam[ID]; ?>');"><?php print $rowTeam[Name];?></a>
							<?php
							}
							else {
							?>
							<a href='#' data-role='button' data-theme='j' onClick="return admin_jumpPage('team.php?ID=<?php print $rowTeam[ID]; ?>');"><?php print $rowTeam[Name];?></a>
							<?php
							}
							?>
							</td>
							
							<td align=center>
							
							<div data-role="fieldcontain">
							<select name="dtSelector" id="dtSelector" data-theme= "j" onchange="MM_jumpMenu('parent',this,0)">

									<option value="teams.php?data_theme=a&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="a") { print 'selected'; } ?>>Red</option>
									
									<option value="teams.php?data_theme=b&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="b") { print 'selected'; } ?>>Orange</option>
									
									<option value="teams.php?data_theme=c&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="c") { print 'selected'; } ?>>Yellow</option>
									
									<option value="teams.php?data_theme=d&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="d") { print 'selected'; } ?>>Green</option>
									
									<option value="teams.php?data_theme=e&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="e") { print 'selected'; } ?>>Blue</option>
									
									<option value="teams.php?data_theme=f&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="f") { print 'selected'; } ?>>Violet</option>
									
									<option value="teams.php?data_theme=g&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="g") { print 'selected'; } ?>>Pink</option>
									
									<option value="teams.php?data_theme=h&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="h") { print 'selected'; } ?>>Brown</option>
									
									<option value="teams.php?data_theme=i&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="i") { print 'selected'; } ?>>Silver</option>
									
									<option value="teams.php?data_theme=j&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="j") { print 'selected'; } ?>>Black</option>
									
									<option value="teams.php?data_theme=k&team=<?php print $rowTeam[ID]; ?>&season=<?php print $thisSeason;?>" <?php if ($rowTeam[Data_Theme]=="k") { print 'selected'; } ?>>Indigo</option>

							
							</select>
							</div>
							
							
							</td>
							
							
							
						</tr>

					<?php
					 }
					?>
				 </table>
				
				
				
				<h3>Add a Team</h3>
				
				<div data-role="fieldcontain">
				<label for="teamname">Team Name:</label>
				<input type="text" name="teamname" id="teamname" placeholder=""value="" />
				</div>
				
				<div data-role="fieldcontain">
				<label for="data_theme">Data-theme:</label>
				<select name="data_theme" id="data_theme" data-mini="true" data-theme= "j">

									<option value="a">Red</option>
									
									<option value="b">Orange</option>
									
									<option value="c">Yellow</option>
									
									<option value="d">Green</option>
									
									<option value="e">Blue</option>
									
									<option value="f">Violet</option>
									
									<option value="g">Pink</option>
									
									<option value="h">Brown</option>
									
									<option value="i">Silver</option>
									
									<option value="j">Black</option>
									
									<option value="k">Indigo</option>

							
							</select>
				</div>
				
				<select name="teamseason">
				<?php
					  $seasonQuery = "SELECT * FROM seasons ORDER BY ID";
					  $seasonQueryResult = mysql_query($seasonQuery);
					    
					  while ($rowSeason = mysql_fetch_array($seasonQueryResult, MYSQL_ASSOC)) { 
					  if ($thisSeason == "") {
					  $thisSeason = $rowSeason[ID];
					  }
                      ?>
                   	  <option value="<?php print $rowSeason[ID]; ?>" <?php if ($thisSeason ==$rowSeason[ID]) { 
					  $thisSeason = $rowSeason[ID];
					  print 'selected'; 
					  } ?>><?php print $rowSeason[Name]; ?></option>
                      <?php } ?>
				</select>
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

