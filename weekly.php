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
	.winner{
	background:#fffb7c;
	}
</style>



</head> 
<body> 


			
			
<div data-role="page">

	<div data-role="header" data-theme="j">
		<a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
		<h1></h1>
		<a href="standings.php" data-role="button" data-icon="back" data-iconpos="notext">Standings</a>
	</div><!-- /header -->

	<div data-role="content" data-theme="i">	
	
			<?php 
					require ('db_login.php');
					$scoreQuery = "SELECT matches.StartTime, matches.Court,  home.Name as Home, home.Data_Theme as HDT, away.Name as Away, ref.Name as Ref, away.Data_Theme as ADT, scores.*, seasons.Name FROM matches JOIN teams as ref ON matches.Ref = ref.ID JOIN teams as home ON matches.Home = home.ID JOIN teams as away ON matches.Away = away.ID JOIN scores ON matches.ID = scores.MatchID JOIN seasons ON seasons.ID = matches.Season WHERE matches.Season = '{$_GET['season']}' and Week = '{$_GET['week']}' ORDER BY StartTime ASC, Court ASC";
					$scoreQueryResult = mysql_query($scoreQuery);
					
					if (!scoreQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					$row = mysql_fetch_array($scoreQueryResult, MYSQL_ASSOC);
					?>
				<div class="ui-body ui-body-a">
				<h1><?php print $row[Name]; ?> Week <?php print $row[Week]; ?>Standings</h1>	
								<p>

				Weekly Details:
				<div data-theme="i" data-role="controlgroup" data-type="horizontal" data-mini="true" data-inline="true">
				<?php 
					$weekQuery = "SELECT weekNum FROM weeks WHERE seasonNum = '{$_GET['season']}' order by weekNum asc";
					$weeksResult = mysql_query($weekQuery);
					if (!weeksResult) {
					die ("Could not query the database:". mysql_error());
					}
					while ($row2 = mysql_fetch_array($weeksResult, MYSQL_ASSOC)){
					
					?>
						<a href="weekly.php?season=<?php print $_GET['season']; ?>&week=<?php print $row2[weekNum];?>" data-theme="j" data-role="button"><?php print $row2[weekNum];?></a>
					<?php }?>
					</div>
					
				</p>
				
				
				<?php
				$i=1;
					do
					{ 
					?>
					<table data-role="table" id="movie-table-custom" data-mode="reflow" class="movie-list table-stroke" style="border:1px solid black; padding:2px; margin:5px;border-collapse: separate;">
					<thead>
    <tr>
      <th data-priority="1">Match <?php print $i;?></th>
      <th data-priority="2">1</th>
      <th data-priority="3">2</th>
	  <th data-priority="4">3</th>
    </tr>
  </thead>
  <tbody>
						  <?php
						  $H1 = $row[Home1];
						  $H2 = $row[Home2];
						  $H3 = $row[Home3];
						  $A1 = $row[Away1];
						  $A2 = $row[Away2];
						  $A3 = $row[Away3];
						  ?>
						  
						<tr>
						  <th width=50% class="title">
						  
						  <?php print $row[Home]; 
						  
						  ?>
						  
						  <!--<a href="#" data-role="button" data-theme="<?php print $row[HDT]; ?>"><?php print $row[Home]; ?></a>
						  -->
						  
						  </th>
						  <td <?php if (($H1 <> 0) and ($H1 > $A1))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Home1] <> 0) print $H1; ?></td>
						  <td <?php if (($H2 <> 0) and ($H2 > $A2))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Home2] <> 0) print $H2; ?></td>
						  <td <?php if (($H3 <> 0) and ($H3 > $A3))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Home3] <> 0) print $H3; ?></td>
						</tr>
						
						<tr>
						  <th width=50% class="title">
						  
						  <?php print $row[Away]; ?>
						  
						  <!--<a href="#" data-role="button" data-theme="<?php print $row[ADT]; ?>"><?php print $row[Away]; ?></a>-->
						  
						  </th>
						  <td <?php if (($A1 <> 0) and ($A1 > $H1))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Away1] <> 0) print $A1; ?></td>
						  <td <?php if (($A2 <> 0) and ($A2 > $H2))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Away2] <> 0) print $A2; ?></td>
						  <td <?php if (($A3 <> 0) and ($A3 > $H3))
						  {
						  ?>  class=winner <?php
						  }
						  ?>><?php if ($row[Away3] <> 0) print $A3; ?></td>
						</tr>	
						<tr>
						<th colspan=4><?php print "Ref: " . $row[Ref]; ?></th>
						</tr>
  </tbody>
</table>		
					
					<?php
					
					$i+=1;
					}
					while ($row = mysql_fetch_array($scoreQueryResult, MYSQL_ASSOC)); 
					?>
					
				</table>	

					
			
			

				
				
  
  




			</div>

		
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
</script>
</html>

