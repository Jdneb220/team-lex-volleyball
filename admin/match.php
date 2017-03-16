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


		<form action="match.php?ID=<?php print $_GET["ID"];?>" method="post"> 
		<h1>Team Lex Admin</h1>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" value="" autocomplete="off">
		<input type="submit" value="Go" data-icon="star" data-iconpos="right" data-mini="true" data-theme="j">
		</form>
		
		<?php
		   }
		   else {
		   require ('../db_login.php');
		   $thisMatch = $_GET["ID"];
			?>
				<h1>Match Admin</h1>
				
				<?php
				
				if($_POST['scoreID']<>"") {
				
						$matchUpdateQuery = "UPDATE matches SET Week = {$_POST['u_weekSelector']}, Court = {$_POST['u_courtSlide']}, Home = {$_POST['u_homeTeamSelector']}, Away = {$_POST['u_awayTeamSelector']}, Ref = {$_POST['u_refTeamSelector']}, StartTime = '{$_POST['u_time']}' WHERE ID = {$_POST['scoreID']}";
						$matchUpdateQueryResult = mysql_query($matchUpdateQuery);
						

						$scoreUpdateQuery = "UPDATE scores SET Home1 = {$_POST['hset1']}  , Home2 = {$_POST['hset2']}  , Home3 = {$_POST['hset3']} , Away1 = {$_POST['aset1']} , Away2 = {$_POST['aset2']} , Away3 = {$_POST['aset3']} WHERE MatchID = {$_POST['scoreID']}";
						$scoreUpdateQueryResult = mysql_query($scoreUpdateQuery);

					}
				
				
				$matchesQuery = "SELECT scores.Home1, scores.Home2, scores.Home3, scores.Away1, scores.Away2, scores.Away3, matches.ID, matches.Season, matches.Week, matches.Court, matches.StartTime, home.Name as homeTeam, home.Data_Theme as homeDataTheme, away.Name as awayTeam, away.Data_Theme as awayDataTheme, ref.Name as refTeam FROM matches JOIN teams as home on matches.Home = home.ID JOIN teams as away on matches.Away = away.ID JOIN teams as ref on matches.Ref = ref.ID JOIN scores ON matches.ID = scores.MatchID WHERE (matches.ID = $thisMatch)";
					$matchesQueryResult = mysql_query($matchesQuery);
							
					if (!matchesQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					if (mysql_num_rows($matchesQueryResult) == 0) {
					  die ("No matches have that specified ID... ". mysql_error());
					}
					

					
					$rowMatch = mysql_fetch_array($matchesQueryResult, MYSQL_ASSOC);
					$thisSeason =$rowMatch[Season];
					$thisWeek =$rowMatch[Week];
				?>

				

				<form name="adminForm" id="adminForm" action="match.php?ID=<?php print $_GET["ID"];?>" method="post"> 
						<input type="hidden" name="password" id="password" value="asd">
						<input type="hidden" name="scoreID" id="scoreID" value="">
							<div style="padding:10px 20px;">
							  
							  

							<label for="u_homeTeamSelector">Home:</label>
							<select name="u_homeTeamSelector" <?php print "data-theme='$rowMatch[homeDataTheme]'";?> id="u_homeTeamSelector">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>" <?php if ($rowTeam[Name] == $rowMatch[homeTeam]) {print "selected";} ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>

							  <label for="u_awayTeamSelector">Away:</label>
							<select name="u_awayTeamSelector" <?php print "data-theme='$rowMatch[awayDataTheme]'";?> id="awayTeamSelector">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>"  <?php if ($rowTeam[Name] == $rowMatch[awayTeam]) {print "selected";} ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>

							<label for="u_refTeamSelector">Ref:</label>
							<select name="u_refTeamSelector" id="u_refTeamSelector" data-theme="j">
							<?php
								$teamQuery = "SELECT * FROM teams WHERE (Season = $thisSeason) ORDER BY ID ASC";
								  $teamQueryResult = mysql_query($teamQuery);
								  while ($rowTeam = mysql_fetch_array($teamQueryResult, MYSQL_ASSOC)) { ?>
									<option value="<?php print $rowTeam[ID]; ?>"  <?php if ($rowTeam[Name] == $rowMatch[refTeam]) {print "selected";} ?>><?php print $rowTeam[Name]; ?></option>
								  <?php 
								  } 
								  
								  ?>
							
							</select>

							
							
							
							<table width=100%>
							<tr><td>
							<label for="u_weekSelector">Week:</label>
							<select name="u_weekSelector" id="u_weekSelector" data-mini="true">
								<option value="1" <?php if ($rowMatch[Week] == 1) {print "selected";} ?>>1</option>
								<option value="2" <?php if ($rowMatch[Week] == 2) {print "selected";} ?>>2</option>
								<option value="3" <?php if ($rowMatch[Week] == 3) {print "selected";} ?>>3</option>
								<option value="4" <?php if ($rowMatch[Week] == 4) {print "selected";} ?>>4</option>
								<option value="5" <?php if ($rowMatch[Week] == 5) {print "selected";} ?>>5</option>
								<option value="6" <?php if ($rowMatch[Week] == 6) {print "selected";} ?>>6</option>
								<option value="7" <?php if ($rowMatch[Week] == 7) {print "selected";} ?>>7</option>
								<option value="8" <?php if ($rowMatch[Week] == 8) {print "selected";} ?>>8</option>
								<option value="9" <?php if ($rowMatch[Week] == 9) {print "selected";} ?>>9</option>
								<option value="10" <?php if ($rowMatch[Week] == 10) {print "selected";} ?>>10</option>
								<option value="11" <?php if ($rowMatch[Week] == 11) {print "selected";} ?>>11</option>
								<option value="12" <?php if ($rowMatch[Week] == 12) {print "selected";} ?>>12</option>
							</select>
							</td>
							<td align=center>
							<label for="u_courtSlide">Court:</label>
							<select name="u_courtSlide" id="u_courtSlide" data-role="slider" data-mini="true">
								<option value="1" <?php if ($rowMatch[Court] == 1) {print "selected";} ?>>1</option>
								<option value="2" <?php if ($rowMatch[Court] == 2) {print "selected";} ?>>2</option>
							</select>
							</td>
							<td>
							<label for="u_time">Time:</label>
							<input type="text" name="u_time" id="u_time" value="<?php print intval(substr($rowMatch[StartTime],0,2)) . ":" . substr($rowMatch[StartTime],3,2); ?>" data-theme="a">
							</td></tr>
							</table>
							
							
							<table width=100%>
							<tr><th></th><th>Set 1</th><th>Set 2</th><th>Set 3</th></tr>
							<tr><td><?php print $rowMatch[homeTeam];?></td>
							<td>
								<input onclick="this.select()" type="number" name="hset1" pattern="[0-9]*" id="hset1" value="<?php print $rowMatch[Home1];?>">
							</td>
							<td>
							    <input onclick="this.select()" type="number" name="hset2" pattern="[0-9]*" id="hset2" value="<?php print $rowMatch[Home2];?>">
							</td>
							<td>
							    <input onclick="this.select()" type="number" name="hset3" pattern="[0-9]*" id="hset3" value="<?php print $rowMatch[Home3];?>">
							</td>
							</tr>
							<tr><td><?php print $rowMatch[awayTeam];?></td>
							<td>
							    <input onclick="this.select()" type="number" name="aset1" pattern="[0-9]*" id="hset1" value="<?php print $rowMatch[Away1];?>">
							</td>
							<td>
							    <input onclick="this.select()" type="number" name="aset2" pattern="[0-9]*" id="aset2" value="<?php print $rowMatch[Away2];?>">
							</td>
							<td>
							    <input onclick="this.select()" type="number" name="aset3" pattern="[0-9]*" id="aset3" value="<?php print $rowMatch[Away3];?>">
							</td>
							</tr>
							</table>
							
							
							
							
							
							
							  <button type="submit" data-theme="b" data-icon="check" onClick="$('#scoreID').val(<?php print $thisMatch;?>);">Update</button>
						</form>
		
			<?php
			 }
			?>

	
	</div><!-- /content -->

	<div data-role="footer" class="nav-glyphish-example" data-theme="i" data-position="fixed">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
			<ul>
				<li><a href="#" id="sched" data-icon="custom" data-theme="i" onClick="return admin_jumpPage('schedule.php?season=<?php print $thisSeason;?>&week=<?php print $thisWeek;?>');">Schedule</a></li>
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

