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

<?php
  $thisTeam = $_GET["ID"];
  require ('db_login.php');
?>

  <div data-role="page">
	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
	</div><!-- /header -->
	<div data-role="content" data-theme="i">	
		<div class="ui-body ui-body-b">
		<h2>Team Profiles</h2>
					<?php
					$teamsQuery = "SELECT teams.*, seasons.Name as SeasonName FROM teams join seasons on teams.Season = seasons.ID ORDER BY Season DESC, ID DESC";
					$teamsQueryResult = mysql_query($teamsQuery);
					$thisSeason = "";
					?>
					<form action="team.php" method="get" id="teamSelectForm">
					<div class="ui-field-contain" style="width:320px">
						<select name="ID" id="teamSelect" data-mini="true" onchange="this.form.submit()">
						<option value="0">Choose a team...</option>
					<?php
					
					
					while ($row = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					
					$nextSeason = $row[SeasonName];
					if  ($nextSeason <> $thisSeason){  
						if ($thisSeason <> "") {
							print "</optgroup>";
						}
						$thisSeason = $nextSeason;
						print "<optgroup label=\"Season: " . $thisSeason . "\">";	
					}
					
					?>
					
	
								<option value="<?php print $row[ID]; ?>" <?php if ($thisTeam == $row[ID]) {$thisTeamName = $row[Name];}?>><?php print $row[Name]; ?></option>
					
					<?php
					}
					?>
						</optgroup>
						</select>
					</div>
					</form>
					
					


					
	    <?php
		  if ($_GET["ID"]<>'0' and $_GET["ID"]<>'') {
			
			print "<h4>" . $thisTeamName ."</h4>"
		?>
		
		
		
		<?php
						$rosterQuery = "SELECT rosters.Player, rosters.PT, rosters.Captain, players.Name FROM rosters JOIN players ON rosters.Player = players.ID WHERE (rosters.Team=$thisTeam) ORDER BY players.Name ASC";
						$rosterQueryResult = mysql_query($rosterQuery);
						
						
						 if(mysql_num_rows($rosterQueryResult) == 0){
							?>
							<li>There is no roster for this team yet.</li>
							<?php
						 }
						 	 
						
						 while($player = mysql_fetch_array($rosterQueryResult, MYSQL_ASSOC)) {
							?>
								<li>
								<?php if ($player[Captain]=='1'){ ?>
											<a href="captain.php?ID=<?php print $player[Player];?>"><img src="includes/images/captainStar.png"></a>
									  <?php 
									  }
											print $player[Name];
									  if ($player[PT]=='1') { ?>
											<img src="includes/images/partTimeIcon.png" style="margin-left:5px">
									  <?php
									  }
								?>
								</li>
							<?php
						 }
						
						
						
						$scoresQuery = "SELECT matches.Week, matches.StartTime, weeks.dateName, weeks.Scrim, teams1.id AS homeID, teams1.name AS homeTeam, teams2.id AS awayID, teams2.name AS awayTeam, teams3.id as refID, teams3.name as refTeam, scores . * FROM matches JOIN scores ON matches.ID = scores.MatchID JOIN teams AS teams1 ON matches.home = teams1.id JOIN teams AS teams2 ON matches.away = teams2.id JOIN teams AS teams3 ON matches.ref = teams3.id JOIN weeks ON matches.week = weeks.weeknum AND matches.season = weeks.seasonnum WHERE home =$thisTeam OR away =$thisTeam or ref =$thisTeam ORDER BY week ASC , starttime ASC ";
						$scoresQueryResult = mysql_query($scoresQuery);
						$thisWeek = "";
						$i = -1;
						?>
						<h3>Schedule</h3>
						<div style="overflow:auto">
						<table width=100% style="border-collapse: separate;
border-spacing: 2px;
border-color: gray;">
						
						<tr <?php if ($i == -1){ print "style=background:#D5D5D5";}?>><td>Week</td><td>Date</td><td>Opponent</td><td>Result</td></tr>
						<?php
						while($score = mysql_fetch_array($scoresQueryResult, MYSQL_ASSOC)) {
						$nextWeek = $score[Week];
						$i = $i * -1;
						if ($thisWeek <> $nextWeek){
							?>
								<tr <?php if ($i == -1){ print "style=background:#D5D5D5";}?>>
								<td><?php print $score[Week];
								
								?>
								
								</td>
								<td><?php print $score[dateName];?></td>
								
								
								<?php
								if ($thisTeam == $score[refID]){
								  print "<td><b>R</b>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM " . $score[homeTeam] . " vs " . $score[awayTeam] . "</td><td></td>";
								}
								elseif ($thisTeam == $score[homeID]) {
								  print "<td>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM " . $score[awayTeam];
								  if ($score[Scrim] == 1) {
								 print " <i>(Scrimmage)</i>";
								}
								print "</td>";
								  print "<td>";
								  if ($score[Home1] <> $score[Away1]){
									print $score[Home1] . "-" . $score[Away1];
								  }
								  if ($score[Home2] <> $score[Away2]){
									print ", " . $score[Home2] . "-" . $score[Away2];
								  }
								  if ($score[Home3] <> $score[Away3]){
									print ", " . $score[Home3] . "-" . $score[Away3];
								  }
								  print "</td>";
								}
								else {
								  print "<td>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM @" . $score[homeTeam];
								  if ($score[Scrim] == 1) {
								 print " <i>(Scrimmage)</i>";
								}
								print "</td>";
								   print "<td>";
								   
								  if ($score[Home1] <> $score[Away1]){
									print $score[Away1] . "-" . $score[Home1];
								  }
								  if ($score[Home2] <> $score[Away2]){
									print ", " . $score[Away2] . "-" . $score[Home2];
								  }
								  if ($score[Home3] <> $score[Away3]){
									print ", " . $score[Away3] . "-" . $score[Home3];
								  }
								 
								  print "</td>";
								}
								?>

								</tr>
							<?php
						$thisWeek = $nextWeek;
						}
						else{
							?>
								<tr <?php if ($i == -1){ print "style=background:#D5D5D5";}?>>
								<td></td>
								<td></td>
								
								<?php
								if ($thisTeam == $score[refID]){
								  print "<td><b>R</b>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM " . $score[homeTeam] . " vs " . $score[awayTeam] . "</td><td></td>";
								}
								elseif ($thisTeam == $score[homeID]) {
								  print "<td>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM " . $score[awayTeam];
								if ($score[Scrim] == 1) {
								 print " <i>(Scrimmage)</i>";
								}
								print "</td>";
								  print "<td>";
								  if ($score[Home1] <> $score[Away1]){
									print $score[Home1] . "-" . $score[Away1];
								  }
								  if ($score[Home2] <> $score[Away2]){
									print ", " . $score[Home2] . "-" . $score[Away2];
								  }
								  if ($score[Home3] <> $score[Away3]){
									print ", " . $score[Home3] . "-" . $score[Away3];
								  }
								  print "</td>";
								}
								else {
								  print "<td>" . intval(intval(substr($score[StartTime],0,2))-12) . ":" . substr($score[StartTime],3,2) . "PM @" . $score[homeTeam];
								  if ($score[Scrim] == 1) {
								 print " <i>(Scrimmage)</i>";
								}
								print "</td>";
								   print "<td>";
								   
								  if ($score[Home1] <> $score[Away1]){
									print $score[Away1] . "-" . $score[Home1];
								  }
								  if ($score[Home2] <> $score[Away2]){
									print ", " . $score[Away2] . "-" . $score[Home2];
								  }
								  if ($score[Home3] <> $score[Away3]){
									print ", " . $score[Away3] . "-" . $score[Home3];
								  }
								 
								  print "</td>";
								}
								?>
								
								</tr>
							<?php
						}
							
						 }
						?>
						</table>
						</div>
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
function MM_jumpMenu(targ,selObj,restore,form){ //v3.0
	  $(form).attr("action",selObj.options[selObj.selectedIndex].value);
	  $(form).submit();
	  
	  //eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  //if (restore) selObj.selectedIndex=0;
	}


					
</script>
</html>

