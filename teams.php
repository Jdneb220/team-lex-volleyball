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
					  
					    $numDivisionsQuery = "SELECT Divisions FROM seasons where ID = $thisSeason";
					  $numDivisionsQueryResult = mysql_query($numDivisionsQuery);
							
						  while ($row = mysql_fetch_array($numDivisionsQueryResult, MYSQL_ASSOC)) { 
							$numDivisions = $row[Divisions];
						}
					?>
		    <form name="teamForm" id="teamForm" action="teams.php" method="post"> 
			<div data-role="fieldcontain" data-theme="i">
				<label for="seasonSelector">Season:</label>
				<select name="seasonSelector" id="seasonSelector" data-theme="i" onchange="MM_jumpMenu('parent',this,0,'#teamForm')">
					  <?php
                      $seasonQuery = "SELECT * FROM seasons ORDER BY ID desc";
					  $seasonQueryResult = mysql_query($seasonQuery);
					    
					  while ($rowSeason = mysql_fetch_array($seasonQueryResult, MYSQL_ASSOC)) { 
					  if ($thisSeason == "") {
					  $thisSeason = $rowSeason[ID];
					  }
                      ?>
                   	  <option value="teams.php?season=<?php print $rowSeason[ID]; ?>" <?php if ($thisSeason==$rowSeason[ID]) { 
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
					
			<h2><?php print $row[Name]; ?>  Teams</h2>
			
			<!-- Rec Div -->
			<h3 <?php if ($numDivisions == 1) { echo "style='display:none'"; } ?>>Recreational Division</h3>
					<?php
					$teamsQuery = "SELECT * FROM teams WHERE (Season=$row[ID]  and Division=0) ORDER BY ID ASC";
					$teamsQueryResult = mysql_query($teamsQuery);
					
					while ($rowRec = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					?>
                    
					<div data-role="collapsible" data-theme="<?php print $rowRec[Data_Theme]; ?>" data-content-theme="i" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
						<h3><?php print $rowRec[Name]; ?></h3>

						<!-- Roster -->

						<ul>
						<?php
						$rosterQuery = "SELECT rosters.Player, rosters.PT, rosters.Captain, players.Name FROM rosters JOIN players ON rosters.Player = players.ID WHERE (rosters.Team=$rowRec[ID]) ORDER BY players.Name ASC";
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
						
						?>
						</ul>
						
					</div>
			
					<?php
				
					}
					?>
			<!-- End Rec Div -->		
			
			
			<!-- Comp Div -->
			<div <?php if ($numDivisions == 1) { echo "style='display:none'"; } ?>>
			<h3>Competitive Division</h3>
					<?php
					$teamsQuery = "SELECT * FROM teams WHERE (Season=$row[ID] and Division=1) ORDER BY ID ASC";
					$teamsQueryResult = mysql_query($teamsQuery);
					
					while ($rowComp = mysql_fetch_array($teamsQueryResult, MYSQL_ASSOC)) { 
					?>
                    
					<div data-role="collapsible" data-theme="<?php print $rowComp[Data_Theme]; ?>" data-content-theme="i" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
						<h3><?php print $rowComp[Name]; ?></h3>

						<!-- Roster -->

						<ul>
						<?php
						$rosterQuery = "SELECT rosters.Player, rosters.PT, rosters.Captain, players.Name FROM rosters JOIN players ON rosters.Player = players.ID WHERE (rosters.Team=$rowComp[ID]) ORDER BY players.Name ASC";
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
						
						?>
						</ul>
						
					</div>
			
					<?php
				
					}
					?>
			</div>
			<!-- End Comp Div -->
			
			
			
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

