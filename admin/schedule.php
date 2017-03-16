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


		<form action="schedule.php" method="post"> 
		<h1>Team Lex Admin</h1>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" value="" autocomplete="off">
		<input type="submit" value="Go" data-icon="star" data-iconpos="right" data-mini="true" data-theme="j">
		</form>
		
		<?php
		   }
		   else {
		   require ('../db_login.php');
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
		   $thisWeek = $_GET["week"];
		   if ($thisWeek == "") {
		    $thisWeek = 0;
		   }

		   
				?>
				<h1>Team Lex Admin Portal</h1>
				
				<?php
				
				if($_POST['delmatch']<>"") {
				
						//DELETE MATCH
						$deleteMatchQuery="DELETE FROM matches WHERE ID='{$_POST['delmatch']}' LIMIT 1";
						$deleteMatchQueryResult = mysql_query($deleteMatchQuery);
						
						//DELETE CORRESPONDING SCORE ROW
						$deleteScoreQuery="DELETE FROM scores WHERE MatchID='{$_POST['delmatch']}' LIMIT 1";
						$deleteScoreQueryResult = mysql_query($deleteScoreQuery);

					}
				
				else if($_POST['time']<>"") {
	
						
						//CREATE NEW MATCH
						$insertMatchQuery="INSERT INTO matches SET Season='{$_POST['season']}', Week='{$_POST['newWeekSelector']}', Court='{$_POST['courtSlide']}', Home='{$_POST['homeTeamSelector']}', Away='{$_POST['awayTeamSelector']}', Ref='{$_POST['refTeamSelector']}', StartTime='{$_POST['time']}'";
						$insertMatchQueryResult = mysql_query($insertMatchQuery);
						
						//GET ID OF NEWLY CREATED MATCH, LARGEST ID
						$findIDQuery="SELECT ID from matches ORDER BY ID Desc LIMIT 1";
						$findIDQueryResult = mysql_query($findIDQuery);
						$findMatchID = mysql_fetch_array($findIDQueryResult, MYSQL_ASSOC);
						
						//CREATE CORRESPONDING SCORE ROW
						$insertScoreQuery="INSERT INTO scores SET MatchID='$findMatchID[ID]'";
						$insertScoreQueryResult = mysql_query($insertScoreQuery);
					}
				
				?>
				
				

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
                   	  <option value="schedule.php?season=<?php print $rowSeason[ID]; 
					  if ($_GET["week"]<>""){
					    print "&week={$_GET["week"]}";
					  }
					  ?>" <?php if ($thisSeason==$rowSeason[ID]) { 
					  $thisSeason = $rowSeason[ID];
					  print 'selected'; 
					  } ?>><?php print $rowSeason[Name]; ?></option>
                      <?php } ?>
					  <option value="seasons.php">Add/Edit Seasons</option>
                </select>
				</div>
				
				<?php
                      $weeksQuery = "SELECT DISTINCT Week FROM matches WHERE Season=$thisSeason ORDER BY Week Asc";
					  $weeksQueryResult = mysql_query($weeksQuery);
					  if (mysql_num_rows($weeksQueryResult) <> 0) {
				?>
				
				<div data-role="fieldcontain">
				<label for="weekSelector">Week:</label>
				<select name="weekSelector" id="weekSelector" onchange="MM_jumpMenu('parent',this,0)">
					  
					  <?php  
					  while ($rowWeek = mysql_fetch_array($weeksQueryResult, MYSQL_ASSOC)) { 
					  if ($thisWeek == "") {
					  $thisWeek = $rowWeek[Week];
					  }
                      ?>
                   	  <option value="schedule.php?week=<?php print $rowWeek[Week]; ?>&season=<?php print $thisSeason;?>" <?php if ($_GET["week"]==$rowWeek[Week]) { 
					  $thisWeek = $rowWeek[Week];
					  print 'selected'; 
					  } ?>><?php print $rowWeek[Week]; ?></option>
                      <?php } ?>
				
                </select>
				</div>
				
				<?php } ?>
				
				
				<?php
				
					$matchesQuery = "SELECT matches.ID, matches.Season, matches.Week, matches.Court, matches.StartTime, home.Name as homeTeam, home.Data_Theme as homeDataTheme, away.Name as awayTeam, away.Data_Theme as awayDataTheme, ref.Name as refTeam FROM matches JOIN teams as home on matches.Home = home.ID JOIN teams as away on matches.Away = away.ID JOIN teams as ref on matches.Ref = ref.ID WHERE (matches.Season = $thisSeason AND matches.Week = $thisWeek) ORDER BY matches.StartTime ASC, matches.Court ASC";
					$matchesQueryResult = mysql_query($matchesQuery);
							
					if (!matchesQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					if (mysql_num_rows($matchesQueryResult) == 0) {
					  print "No matches have been scheduled yet for the selected season.<br>";
					}
					
					else { ?>
						<table width=100%>
					<?php 
					}
					
					while ($rowMatch = mysql_fetch_array($matchesQueryResult, MYSQL_ASSOC)) 
					{ ?>
								<tr>
									<th rowspan=2><?php print $rowMatch[ID]; ?></th>
									<td align=center>
									
									<?php
									print "$rowMatch[homeTeam] vs $rowMatch[awayTeam]  (Ref - $rowMatch[refTeam])";
									?>
									
									<!--
									<?php 
									if ($rowMatch[homeDataTheme] <> "") { 
									print "<a href='#' data-inline='true' data-role='button' data-theme='$rowMatch[homeDataTheme]'>$rowMatch[homeTeam]</a>"; 
									}
									else {
									print "<a href='#' data-inline='true'  data-role='button' data-theme='j'>$rowMatch[homeTeam]</a>"; 
									}
									?>
									
									
									
									
									<?php 
									if ($rowMatch[awayDataTheme] <> "") { 
									print "<a href='#' data-inline='true'  data-role='button' data-theme='$rowMatch[awayDataTheme]'>$rowMatch[awayTeam]</a>"; 
									}
									else {
									print "<a href='#' data-inline='true'  data-role='button' data-theme='j'>$rowMatch[awayTeam]</a>"; 
									}
									?>

									<?php 
									print "<a href='#' data-inline='true'  data-mini='true' data-role='button' data-theme='j'>Ref: $rowMatch[refTeam]</a>"; 
									?>
									-->
									
									</td>
									
									</tr><tr>
									
									<td align=center>
									<?php

									
									?>
									
									<a href="#"  data-role="button" data-theme="d" data-icon="gear" data-iconpos="right" data-transition="pop" name="update-match-<?php print $rowMatch[ID]; ?>" data-mini="true" data-inline="true" onClick="<?php print "admin_jumpPage('match.php?ID=$rowMatch[ID]')"?>">Court <?php print $rowMatch[Court]; ?> - <?php print intval(substr($rowMatch[StartTime],0,2))-12 . ":" . substr($rowMatch[StartTime],3,2) . "PM"; ?></a> 
									
									<a href="#" data-role="button" data-theme="a" data-icon="delete" data-iconpos="right" name="del-match-<?php print $rowMatch[ID]; ?>" data-mini="true" data-inline="true" onClick="return confirmDeleteMatch(<?php print $rowMatch[ID]; ?>)">Delete</a>  </td>
								</tr>

								
							
						
						
						
						
					<?php
					 }
					?>
				 </table>
				
				
				
				
		
				
				<a href="#popupAdd" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-icon="check" data-theme="a" data-transition="pop">Create a Match</a>
				<div data-role="popup" id="popupMenu" data-theme="a">
					<div data-role="popup" id="popupAdd" data-theme="a" class="ui-corner-all">
						<form name="adminForm" id="adminForm" action="schedule.php<?php print "?week=$thisWeek&season=$thisSeason"; ?>" method="post"> 
						<input type="hidden" name="password" id="password" value="asd">
						<input type="hidden" name="delmatch" id="delmatch" value="">
						<input type="hidden" name="season" id="season" value="<?php print $thisSeason;?>">
							<div style="padding:10px 20px;">
							  <label for="homeTeamSelector" class="ui-hidden-accessible">Home:</label>
							<select name="homeTeamSelector" id="homeTeamSelector">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>"><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							
							  <label for="awayTeamSelector" class="ui-hidden-accessible">Away:</label>
							<select name="awayTeamSelector" id="awayTeamSelector">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>"><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							
							<label for="refTeamSelector" class="ui-hidden-accessible">Ref:</label>
							<select name="refTeamSelector" id="refTeamSelector" data-theme="j">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>"><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>
							
							<label for="newWeekSelector">Week:</label>
							<select name="newWeekSelector" id="weekSelector" data-mini="true">
								<option value="1" <?php if ($thisWeek == 1) {print "selected";}?>>1</option>
								<option value="2" <?php if ($thisWeek == 2) {print "selected";}?>>2</option>
								<option value="3" <?php if ($thisWeek == 3) {print "selected";}?>>3</option>
								<option value="4" <?php if ($thisWeek == 4) {print "selected";}?>>4</option>
								<option value="5" <?php if ($thisWeek == 5) {print "selected";}?>>5</option>
								<option value="6" <?php if ($thisWeek == 6) {print "selected";}?>>6</option>
								<option value="7" <?php if ($thisWeek == 7) {print "selected";}?>>7</option>
								<option value="8" <?php if ($thisWeek == 8) {print "selected";}?>>8</option>
								<option value="9" <?php if ($thisWeek == 9) {print "selected";}?>>9</option>
								<option value="10" <?php if ($thisWeek == 10) {print "selected";}?>>10</option>
								<option value="11" <?php if ($thisWeek == 11) {print "selected";}?>>11</option>
								<option value="12" <?php if ($thisWeek == 12) {print "selected";}?>>12</option>
							</select>
							
							<label for="time">Time:</label>
							<input type="text" name="time" id="time" value="" placeholder="18:30" data-theme="a">
							
							
							
							<label for="courtSlide">Court:</label>
							<select name="courtSlide" id="courtSlide" data-role="slider" data-mini="true">
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
							
							
							
							
							  <button type="submit" data-theme="b" data-icon="check" onClick="return admin_jumpPage('schedule.php<?php print "?week=$thisWeek&season=$thisSeason"; ?>')">Create</button>
							</div>
						</form>
					</div>
				</div>
		
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

