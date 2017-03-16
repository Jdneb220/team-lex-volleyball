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
     #standings td {
	 text-align: center;
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


		<form action="standings.php" method="post"> 
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
		   ?>
		   
		   <?php
					//UPDATE HIDE STANDINGS
					if (isset($_POST['hide_standings_submit'])) {

							$updateHideStandingsQuery="UPDATE other_content SET the_content='{$_POST['standings_Selector']}', extra='{$_POST['hide_Standings_input']}' WHERE id=3";

						$updateHideStandingsQueryResult = mysql_query($updateHideStandingsQuery);
					}
					?>
					
					
					
					  <form action="standings.php" method="post"> 
					  <table><tr> 
					  <td><span class="defaultCopy">Would you like to hide the standings prior to tournament?</span></td>
					  <td>
					
						  <select name="standings_Selector" id="standings_Selector" data-theme= "j">
							  <?php
							  
							  $hideStandingsQuery = "SELECT * FROM other_content WHERE name='hideStandings' LIMIT 1";
								$hideStandingsQueryResults = mysql_query($hideStandingsQuery);
								while ($rowX = mysql_fetch_array($hideStandingsQueryResults, MYSQL_ASSOC)) { 
								$hide_Standings = $rowX[the_content];
								$bracket_URL = $rowX[extra];
								}
							  ?>
							  <option value="0" <?php if ($hide_Standings=='0') { print 'selected'; } ?>>No</option>
							  <option value="1" <?php if ($hide_Standings<>'0') { print 'selected'; } ?>>Yes</option>
							  </select>
							  </td></tr><tr><td colspan=2>
							  
							  <div id="bracketURL">
							  <span class="defaultCopy">Tournament Bracket URL</span>
							  <input type="text" size="20" value="<?php print $bracket_URL; ?>" name="hide_Standings_input" /> 
							  </div>
							  
						<input type="submit" value="Save" name="hide_standings_submit" data-theme= "j"/>
					  <input type="hidden" name="password" id="password" value="asd">
					  </td></tr></table>
					  </form>
				  
				  
					<form name="adminForm" id="adminForm" action="standings.php" method="post"> 
					<input type="hidden" name="password" id="password" value="asd">
					<h2>Standings</h2>
					<p>Once you have entered the weekly scores on the Schedule page, click <a href="#" onClick="return admin_jumpPage('standings.php');">here</a> to update the standings.
					</p>
					
					<table>
					  <thead>
						<tr>
						  <th data-priority="1">Rank</th>
						  <th style="width:40%">Team Name</th>
						  <th data-priority="2">Wins</th>
						  <th data-priority="3">Losses</th>
						  <th data-priority="4"><abbr title="Wins / Games Played">% Won</abbr></th>
						  <th data-priority="5">Point Spread</th>
						</tr>
					  </thead>
					  <tbody id=standings>
  
					<?php
					$teamsQuery = "SELECT * FROM teams WHERE (Season=$thisSeason) ORDER BY PWin DESC, Spread Desc";
					$teamsQueryResult = mysql_query($teamsQuery);
					
					$rank = 1;
					while ($row = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					?>
					
					
							   <?php //UPDATE Standings
		   
					$newWins = 0;
					$newLoss = 0;
					$newPWin = 0;
					$newSpread = 0;
					$mySets = "";
					$myTotal = 0;
					$theirSets = "";
					$theirTotal = 0;
					
					//Home Matches
					$requestMatchesWhereHomeQuery = "SELECT distinct scores.matchID, scores.*, weeks.scrim FROM matches JOIN scores ON matches.ID = scores.MatchID JOIN weeks ON matches.Week = weeks.weekNum WHERE weeks.seasonNum = $thisSeason and matches.Home = $row[ID] AND weeks.scrim =0";
					$requestMatchesWhereHomeQueryResult = mysql_query($requestMatchesWhereHomeQuery);

					while ($winRow = mysql_fetch_array($requestMatchesWhereHomeQueryResult, MYSQL_ASSOC)) { 
					  if ($winRow[Home1] > $winRow[Away1]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow[Home1] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away1] . "</td>";
					   $myTotal = $myTotal + $winRow[Home1];
					   $theirTotal = $theirTotal + $winRow[Away1];
					  }
					  else if ($winRow[Away1] > $winRow[Home1]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow[Home1] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away1] . "</td>";
					   $myTotal = $myTotal + $winRow[Home1];
					   $theirTotal = $theirTotal + $winRow[Away1];
					  }
					  if ($winRow[Home2] > $winRow[Away2]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow[Home2] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away2] . "</td>";
					   $myTotal = $myTotal + $winRow[Home2];
					   $theirTotal = $theirTotal + $winRow[Away2];
					  }
					  else if ($winRow[Away2] > $winRow[Home2]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow[Home2] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away2] . "</td>";
					   $myTotal = $myTotal + $winRow[Home2];
					   $theirTotal = $theirTotal + $winRow[Away2];
					  }
					  if ($winRow[Home3] > $winRow[Away3]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow[Home3] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away3] . "</td>";
					   $myTotal = $myTotal + $winRow[Home3];
					   $theirTotal = $theirTotal + $winRow[Away3];
					  }
					  else if ($winRow[Away3] > $winRow[Home3]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow[Home3] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow[Away3] . "</td>";
					   $myTotal = $myTotal + $winRow[Home3];
					   $theirTotal = $theirTotal + $winRow[Away3];
					  }
					  $newSpread = $newSpread + $winRow[Home1] + $winRow[Home2] + $winRow[Home3] - $winRow[Away1] -$winRow[Away2] -$winRow[Away3];
					}
					
					//AwayMatches
					$requestMatchesWhereAwayQuery = "SELECT distinct scores.matchID, scores.*, weeks.scrim FROM matches JOIN scores ON matches.ID = scores.MatchID JOIN weeks ON matches.Week = weeks.weekNum WHERE weeks.seasonNum = $thisSeason and matches.Away = $row[ID] AND weeks.scrim =0";
					$requestMatchesWhereAwayQueryResult = mysql_query($requestMatchesWhereAwayQuery);
					while ($winRow2 = mysql_fetch_array($requestMatchesWhereAwayQueryResult, MYSQL_ASSOC)) { 
					  if ($winRow2[Home1] > $winRow2[Away1]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow2[Away1] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home1] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away1];
					   $theirTotal = $theirTotal + $winRow2[Home1];
					  }
					  else if ($winRow2[Away1] > $winRow2[Home1]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow2[Away1] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home1] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away1];
					   $theirTotal = $theirTotal + $winRow2[Home1];
					  }
					  if ($winRow2[Home2] > $winRow2[Away2]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow2[Away2] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home2] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away2];
					   $theirTotal = $theirTotal + $winRow2[Home2];
					  }
					  else if ($winRow2[Away2] > $winRow2[Home2]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow2[Away2] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home2] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away2];
					   $theirTotal = $theirTotal + $winRow2[Home2];
					  }
					  if ($winRow2[Home3] > $winRow2[Away3]){
					   $newLoss++;
					   $mySets = $mySets . "<td>" . $winRow2[Away3] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home3] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away3];
					   $theirTotal = $theirTotal + $winRow2[Home3];
					  }
					  else if ($winRow2[Away3] > $winRow2[Home3]){
					   $newWins++;
					   $mySets = $mySets . "<td style='color:red'>" . $winRow2[Away3] . "</td>";
					   $theirSets = $theirSets . "<td>" . $winRow2[Home3] . "</td>";
					   $myTotal = $myTotal + $winRow2[Away3];
					   $theirTotal = $theirTotal + $winRow2[Home3];
					  }
					  $newSpread = $newSpread - $winRow2[Home1] - $winRow2[Home2] - $winRow2[Home3] + $winRow2[Away1] + $winRow2[Away2] + $winRow2[Away3];
					}
					
					if ($newWins + $newLoss > 0){
						$newPWin = $newWins / ($newWins + $newLoss);
					}
		   $updateStandingsQuery="UPDATE teams SET Wins = $newWins, Loss = $newLoss, PWin = $newPWin, Spread = $newSpread WHERE ID=$row[ID]";
		   $updateStandingsQueryResult = mysql_query($updateStandingsQuery);
					
					?>
					
					
					<tr>
						  <th><?php print $rank?></th>
						  <td class="title"><?php print $row[Name]; ?></td>
						  <td><?php print $row[Wins]; ?></td><td><?php print $row[Loss]; ?></td><td><?php print number_format($row[PWin],3,'.',''); ?></td><td><?php if ($row[Spread] > 0) {print "+";} print $row[Spread]; ?></td>
						</tr>
						<tr><td colspan=6><center><table cellpadding=2px border=1><tr><?php print $mySets; ?><td><i><?php print $myTotal; ?></i></td></tr><tr><?php print $theirSets; ?><td><i><?php print $theirTotal; ?></i></td></tr></table></center></td></tr>
						
					<?php
					$rank++;
					}
					?>						
					</tbody>
					</table>
					
					
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

