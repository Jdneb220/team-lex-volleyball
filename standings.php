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
	
	<style>
	@media (min-width: 40em) .ui-table-reflow td .ui-table-cell-label, .ui-table-reflow th .ui-table-cell-label {
	display: none;
	}
</style>

</head> 
<body> 

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
  
  $numDivisionsQuery = "SELECT Divisions FROM seasons where ID = $thisSeason";
  $numDivisionsQueryResult = mysql_query($numDivisionsQuery);
		
	  while ($row = mysql_fetch_array($numDivisionsQueryResult, MYSQL_ASSOC)) { 
		$numDivisions = $row[Divisions];
	}
?>

<?php							  
  $hideStandingsQuery = "SELECT * FROM other_content WHERE name='hideStandings' LIMIT 1";
	$hideStandingsQueryResults = mysql_query($hideStandingsQuery);
	while ($rowX = mysql_fetch_array($hideStandingsQueryResults, MYSQL_ASSOC)) { 
	$hide_Standings = $rowX[the_content];
	$bracket_URL = $rowX[extra];
	}
  ?>
			
			
<div data-role="page">

	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
	</div><!-- /header -->
    
		
	
	
	<div data-role="content" data-theme="i">	
	
	<?php if ($hide_Standings<>'0') {?>
	
	<h3>Tournament Time!</h3>
	<p>Final standings will be announced at our seeding party.  Check back for an <a href="<?php print $bracket_URL;?>">updated tournament bracket</a> following seed announcements.  Good luck!</p>
	
    <?php }
	else {
	?>
	
	
			<form name="standingsForm" id="standingsForm" action="standings.php<?php if ($_GET["season"]<>'') {print "?season=$thisSeason";} ?>" method="post"> 
			<div data-role="fieldcontain" data-theme="i">
				<label for="seasonSelector">Season:</label>
				<select name="seasonSelector" id="seasonSelector" data-theme="i" onchange="MM_jumpMenu('parent',this,0,'#standingsForm')">
					  <?php
					  
                      $seasonQuery = "SELECT * FROM seasons ORDER BY ID desc";
					  $seasonQueryResult = mysql_query($seasonQuery);
					    
					  while ($rowSeason = mysql_fetch_array($seasonQueryResult, MYSQL_ASSOC)) { 
					  ?>
                   	  <option value="standings.php?season=<?php print $rowSeason[ID]; ?>" <?php if ($thisSeason==$rowSeason[ID]) { 
					  print 'selected'; 
					  } ?>><?php print $rowSeason[Name]; ?></option>
                      <?php } ?>
				
                </select>
			</div>
			</form>	

					
			<?php 

					$seasonsQuery = "SELECT * FROM seasons WHERE ID = $thisSeason";
					$seasonsResult = mysql_query($seasonsQuery);
					
					if (!seasonsResult) {
					die ("Could not query the database:". mysql_error());
					}
					$row = mysql_fetch_array($seasonsResult, MYSQL_ASSOC);
					?>
					

					
			
			<div class="ui-body ui-body-a">
				<h2><?php print $row[Name]; ?> Standings</h2>
				<p>

				Weekly Details:
				<div data-theme="i" data-role="controlgroup" data-type="horizontal" data-mini="true" data-inline="true">
				<?php 
					$weekQuery = "SELECT weekNum FROM weeks WHERE seasonNum = $thisSeason order by weekNum asc";
					$weeksResult = mysql_query($weekQuery);
					if (!weeksResult) {
					die ("Could not query the database:". mysql_error());
					}
					while ($row2 = mysql_fetch_array($weeksResult, MYSQL_ASSOC)){
					
					?>
						<a href="weekly.php?season=<?php print $thisSeason; ?>&week=<?php print $row2[weekNum];?>" data-theme="j" data-role="button"><?php print $row2[weekNum];?></a>
					<?php }?>
					</div>
					
				</p>
				
				
				<!-- Rec Division -->
				<h3 <?php if ($numDivisions == 1) { echo "style='display:none'"; } ?>>Recreational Division</h3>
				<div style="overflow:auto">
				<table data-role="table" id="movie-table-custom" data-mode="reflow" class="movie-list table-stroke">
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
  <tbody>
  
					<?php
					$teamsQuery = "SELECT * FROM teams WHERE (Season=$row[ID] and Division = 0) ORDER BY PWin DESC, Spread Desc";
					$teamsQueryResult = mysql_query($teamsQuery);
					
					$rank = 1;
					while ($rowRec = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					?>
						<tr>
						  <th><?php print $rank?></th>
						  <td class="title"><a href="team.php?ID=<?php print $rowRec[ID]; ?>"   data-role="button" data-theme="<?php print $rowRec[Data_Theme]; ?>"><?php print $rowRec[Name]; ?></a></td>
						  <td><?php print $rowRec[Wins]; ?></td><td><?php print $rowRec[Loss]; ?></td><td><?php print number_format($rowRec[PWin],3,'.',''); ?></td><td><?php if ($rowRec[Spread] > 0) {print "+";} print $rowRec[Spread]; ?></td>
						</tr>
						
						<div data-role="popup" id="popupDialog<?php print $rank; ?>" class="ui-content ui-popup ui-overlay-shadow ui-corner-all" style="border: 1px solid #f7c942 /*{e-body-border}*/;
color: #222 /*{e-body-color}*/;
text-shadow: 0 /*{e-body-shadow-x}*/ 1px /*{e-body-shadow-y}*/ 0 /*{e-body-shadow-radius}*/ #fff /*{e-body-shadow-color}*/;
background: #fff9df /*{e-body-background-color}*/;
background-image: -webkit-gradient(linear, left top, left bottom, from( #fffadf /*{e-body-background-start}*/), to( #fff3a5 /*{e-body-background-end}*/));
background-image: -webkit-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -moz-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -ms-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -o-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);">
	<p>
	
	<ul style="list-style:none;margin:0px;padding-left:0px;">
						<?php
						$rosterQuery = "SELECT rosters.PT, rosters.Captain, players.Name FROM rosters JOIN players ON rosters.Player = players.ID WHERE (rosters.Team=$rowRec[ID]) ORDER BY players.Name ASC";
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
											<img src="includes/images/captainStar.png">
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
						
						?>
						</ul>
	
	</p>
</div>


					<?php
					$rank++;
					}
					?>						
  </tbody>
</table>
</div>
<!-- End Rec Division -->


<!-- Comp Division -->
<div <?php if ($numDivisions == 1) { echo "style='display:none'"; } ?>>
<h3>Competitive Division</h3>
				<div style="overflow:auto">
				<table data-role="table" id="movie-table-custom" data-mode="reflow" class="movie-list table-stroke">
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
  <tbody>
  
					<?php
					$teamsQuery = "SELECT * FROM teams WHERE (Season=$row[ID] and Division = 1) ORDER BY PWin DESC, Spread Desc";
					$teamsQueryResult = mysql_query($teamsQuery);
					
					$rank = 1;
					while ($rowComp = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					?>
						<tr>
						  <th><?php print $rank?></th>
						  <td class="title"><a href="team.php?ID=<?php print $rowComp[ID]; ?>"   data-role="button" data-theme="<?php print $rowComp[Data_Theme]; ?>"><?php print $rowComp[Name]; ?></a></td>
						  <td><?php print $rowComp[Wins]; ?></td><td><?php print $rowComp[Loss]; ?></td><td><?php print number_format($rowComp[PWin],3,'.',''); ?></td><td><?php if ($rowComp[Spread] > 0) {print "+";} print $rowComp[Spread]; ?></td>
						</tr>
						
						<div data-role="popup" id="popupDialog<?php print $rank; ?>" class="ui-content ui-popup ui-overlay-shadow ui-corner-all" style="border: 1px solid #f7c942 /*{e-body-border}*/;
color: #222 /*{e-body-color}*/;
text-shadow: 0 /*{e-body-shadow-x}*/ 1px /*{e-body-shadow-y}*/ 0 /*{e-body-shadow-radius}*/ #fff /*{e-body-shadow-color}*/;
background: #fff9df /*{e-body-background-color}*/;
background-image: -webkit-gradient(linear, left top, left bottom, from( #fffadf /*{e-body-background-start}*/), to( #fff3a5 /*{e-body-background-end}*/));
background-image: -webkit-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -moz-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -ms-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: -o-linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);
background-image: linear-gradient( #fffadf /*{e-body-background-start}*/, #fff3a5 /*{e-body-background-end}*/);">
	<p>
	
	<ul style="list-style:none;margin:0px;padding-left:0px;">
						<?php
						$rosterQuery = "SELECT rosters.PT, rosters.Captain, players.Name FROM rosters JOIN players ON rosters.Player = players.ID WHERE (rosters.Team=$rowComp[ID]) ORDER BY players.Name ASC";
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
											<img src="includes/images/captainStar.png">
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
						
						?>
						</ul>
	
	</p>
</div>


					<?php
					$rank++;
					}
					?>						
  </tbody>
</table>
</div>

</div>
<!-- End Comp Division -->



			</div>

	<?php
	}
	?>
	
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

