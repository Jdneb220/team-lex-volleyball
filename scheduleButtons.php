<!DOCTYPE html> 
<html> 
<head> 
	<title>Team Lex Volleyball - LGBT Volleyball in Lexington, Kentucky</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
		
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
		<link rel="stylesheet" href="includes/css/teamlex.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
	
	<style>

		
	</style>
	

</head> 
<body> 

<div data-role="page" style="overflow-y:hidden">

<?php
	require ('db_login.php');

					  $siteSeasonQuery = "SELECT the_content as ID FROM other_content WHERE other_content.name='siteSeason' LIMIT 1";
					  $siteSeasonQueryResult = mysql_query($siteSeasonQuery);
					    
					  while ($row = mysql_fetch_array($siteSeasonQueryResult, MYSQL_ASSOC)) { 
					  	$thisSeason = $row[ID];
						}
					
    $datesQuery = "SELECT dateName from weeks where seasonNum = $thisSeason order by weekNum Asc";
	$datesQueryResult = mysql_query($datesQuery);
	
	$dates = array("September 7");
	
	while ($row = mysql_fetch_array($datesQueryResult, MYSQL_ASSOC)) { 
					  	array_push($dates, $row[dateName]);
						}
						
	$weekNotes = array("","","","","","","","","","");

?>

	    <div data-role="panel" id="right-panel" data-display="push" data-position="right" data-theme="j" style="background: #676767;">
        <ul data-role="listview" data-theme="j" data-icon="false">
            <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
            <li data-role="list-divider">Schedules</li>
			<li><a id=allbtn href="#">Show All</a></li>
			<li><a id=freeweekbtn href=\"#\">Free Week - <?php print $dates[0];?></a></li>
			<?php for($j=1; $j<count($dates); $j++){
			  print "<li><a id=week".$j."btn href=\"#\">Week ".$j." - ".$dates[$j]."</a></li>";
			}
			?>

			
        </ul>
    </div><!-- /panel -->
	
	
<script>

$('#allbtn').click(function() {
		$("#freeweeksched").show();
		<?php
			for($j=1; $j<count($dates); $j++){
			print "$(\"#week".$j."sched\").show();";
			}
		?>
		$( "#right-panel" ).panel( "close" );
});

$('#freeweekbtn').click(function() {
		$("#freeweeksched").show();
		<?php
			for($j=1; $j<count($dates); $j++){
			print "$(\"#week".$j."sched\").hide();";
			}
		?>
		$( "#right-panel" ).panel( "close" );
});

<?php
for($j=1; $j<count($dates); $j++){
	print  "$('#week".$j."btn').click(function() {";
	print "$(\"#freeweeksched\").hide();";
	for ($i=1; $i<count($dates); $i++){
		if ($i == $j){
		  print "$(\"#week".$i."sched\").show();";
		}
		else {
		  print "$(\"#week".$i."sched\").hide();";
		}
	}
    print "$(\"#right-panel\" ).panel(\"close\" );});";
}		
?>
</script>


	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
		<a href="#right-panel" data-role="button" data-icon="bars" data-iconpos="notext">Weekly Overview</a>
	</div><!-- /header -->

	

	<div data-role="content" data-theme="i">	
	
			
			
			<div class="ui-body ui-body-a">
				<h1>Fall 2014 Schedule</h1>
				<p><a href="https://www.dropbox.com/s/sx1sni58pv21nxz/Fall%202014%20Regular%20Season.xlsx?dl=0">Click here for an Excel version of the Fall 2014 Schedule</a>.  Matches will be two sets to 21 with a cap at 23 unless otherwise noted, using
<a href="https://www.volleyballreftraining.com/rules_interpretations_indoor.php" target="_blank">USAV domestic indoor rules</a></p>
<p>The first week of Team Lex is dedicated to <i>Skill Assessments</i>.  <i>Skill Assessments</i> are a collection of passing, setting, hitting, and serving drills to evaluate player abilities for team placement.  League organizers will help lead the drills and evaluate players in order to form evenly matched teams.</p>
				<p>Interested in playing?  Join our <a href="http://www.teamlexvb.com/contact.html">mailing list</a> and <a href="https://www.facebook.com/groups/492904774102678/" target=_blank>Facebook group</a>.
			</div>
			
	<DIV NAME=freeweek ID=freeweeksched style="">		
			<div data-role="header" data-theme="j"  style="background-image:none;">
				<h1><?php print $dates[0]?></h1>
			</div>
			<p><i>Skill Assessments</i> are a collection of passing, setting, hitting, and serving drills to evaluate player abilities for team placement.  Participation is encouraged.  League organizers will lead the drills and evaluate players in order to help form evenly matched teams.</p>
			<table data-role="table" id="financial-table-reflow" data-mode="reflow" class="financial-table-reflow table-stroke">
    <thead>
        <tr class="th-groups">
            <th style="width:110px"></th>
            <th>Courts 1 & 2</th>
        </tr>
		</thead>
		<tbody>
		<tr>
			<th>5:15pm</th>
			<td>Introductions</td>
        </tr>
		<tr>
			<th>5:30pm</th>
			<td>Skills Assessment Group 1</td>
        </tr>
		<tr>
			<th>6:15pm</th>
			<td>Skills Assessment Group 2</td>
        </tr>
		<tr>
			<th>7:00pm</th>
			<td>Skills Clinic: Basics of the Game (Rules, Points, Rotation)</td>
        </tr>
		<tr>
			<th>7:30pm</th>
			<td>Finishing Remarks</td>
        </tr>
		</tbody>
		</table>

		</div>

<?php
	$weeksQuery = "SELECT * FROM  weeks where seasonNum = $thisSeason order by weekNum Asc";
	$weeksQueryResult = mysql_query($weeksQuery);
							
					if (!weeksQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					if (mysql_num_rows($weeksQueryResult) == 0) {
					  print "No matches have been scheduled yet for the selected season.<br>";
					}
					
					else { 
						$i = 1;
						
						while ($rowMatch = mysql_fetch_array($weeksQueryResult, MYSQL_ASSOC)) 
						{
						?>

						<DIV NAME=week<?php print $i;?> ID=week<?php print $i;?>sched  style="">

									<div data-role="header" data-theme="j" style="background-image:none;">
										<h1><?php print $rowMatch[dateName];?></h1>
									</div>
									<?php if ($rowMatch[weekNotes] <> ""){ ?>	
									<p><?php print $rowMatch[weekNotes];?></p>
									<?php } ?>
									
									<?php if ($weekNotes[$i] <> ""){ ?>	
									<p><?php print $weekNotes[$i];?></p>
									<?php } ?>
							
							<?php if ($rowMatch[Extra1] <> ""){ ?>							
									<table data-role="table" id="financial-table-reflow" data-mode="reflow" class="financial-table-reflow table-stroke">
								<thead>
								<tr class="th-groups">
									<th></th>
									<th>Court 1</th>
									<th>Court 2</th>
								</tr>
								</thead>
								<tbody>
											<tr>
									<th><?php print intval(substr($rowMatch[ExtraStartTime],0,2))-12 . ":" . substr($rowMatch[ExtraStartTime],3,2) . "PM"; ?></th>
									<td><?php print $rowMatch[Extra1];?></td>
									<td><?php print $rowMatch[Extra2];?></td>
								</tr>
								</tbody>
								</table>
							<?php } ?>	
								
									<table data-role="table" id="financial-table-reflow" data-mode="reflow" class="financial-table-reflow table-stroke">
							<thead>
								<tr class="th-groups">
									<th></th>
									<th colspan="3">Court 1</th>
									<th colspan="3">Court 2</th>
								</tr>
								<tr>
									<th></th>
									<th>Home</th>
									<th>Away</th>
									<th>Ref</th>
									<th>Home</th>
									<th>Away</th>
									<th>Ref</th>
								</tr>
							</thead>

							<tbody>
							
								<?php
								
								$matchesQuery = "SELECT matches.ID, matches.Season, matches.Week, matches.Court, matches.StartTime, home.Name as homeTeam, home.ID as homeID, home.Data_Theme as homeDataTheme, away.Name as awayTeam, away.ID as awayID, away.Data_Theme as awayDataTheme, ref.Name as refTeam FROM matches JOIN teams as home on matches.Home = home.ID JOIN teams as away on matches.Away = away.ID JOIN teams as ref on matches.Ref = ref.ID WHERE (matches.Season = $thisSeason AND matches.Week = $i) ORDER BY matches.StartTime ASC, matches.Court ASC";
								$matchesQueryResult = mysql_query($matchesQuery);
								$num_rows = mysql_num_rows($matchesQueryResult);
								if (!matchesQueryResult) {
								die ("Could not query the database:". mysql_error());
								}
								
								if (mysql_num_rows($matchesQueryResult) == 0) {
								  print "<th colspan=7 align=center><b>No matches have been scheduled yet for this week.</th>";
								}
								
								else { 	
									while ($rowMatch2 = mysql_fetch_array($matchesQueryResult, MYSQL_ASSOC)) 
										{    ?>  							
										<th><?php print intval(substr($rowMatch2[StartTime],0,2))-12 . ":" . substr($rowMatch2[StartTime],3,2) . "PM"; ?></th>
										<td><a href="team.php?ID=<?php print $rowMatch2[homeID]; ?>" data-role="button" data-theme="<?php print $rowMatch2[homeDataTheme]; ?>"><?php print $rowMatch2[homeTeam]; ?></a></td>
										<td><a href="team.php?ID=<?php print $rowMatch2[awayID]; ?>" data-role="button" data-theme="<?php print $rowMatch2[awayDataTheme]; ?>"><?php print $rowMatch2[awayTeam]; ?></a></td>
										<td><a href="#" data-role="button" data-theme="<?php print $rowMatch2[refDataTheme]; ?>"><?php print $rowMatch2[refTeam]; ?></a></td>
									
									<?php
									$num_rows= $num_rows-1;
									$rowMatch2 = mysql_fetch_array($matchesQueryResult, MYSQL_ASSOC);
									if ($num_rows > 0){
									  ?>
									  <td><a href="team.php?ID=<?php print $rowMatch2[homeID]; ?>" data-role="button" data-theme="<?php print $rowMatch2[homeDataTheme]; ?>"><?php print $rowMatch2[homeTeam]; ?></a></td>
										<td><a href="team.php?ID=<?php print $rowMatch2[awayID]; ?>" data-role="button" data-theme="<?php print $rowMatch2[awayDataTheme]; ?>"><?php print $rowMatch2[awayTeam]; ?></a></td>
										<td><a href="#" data-role="button" data-theme="<?php print $rowMatch2[refDataTheme]; ?>"><?php print $rowMatch2[refTeam]; ?></a></td>
									  <?php
									  $num_rows= $num_rows-1;
									}
									else{
									  print "<td colspan=3 style='display:none'></td>";
									}
									
									print "</tr>";
									
									} ?>
									
								<?php } ?>
							</tbody>

						</table>

						</div>
						
						<?php
						 $i++;
						 }
						 //print "<img src='http://uimg2.gpotato.eu/forum/ALLODS_EN_F009/img/1199738_3.jpg'>";
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