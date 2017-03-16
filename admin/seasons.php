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


		<form action="seasons.php" method="post">
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
				
				

				<div class="ui-grid-a ui-responsive">
				<div class="ui-block-a">
				<div class="ui-body ui-body-d">
                	<!-- LEFT COLUMN BEINGS -->
               <?php
					//UPDATE or CREATE week
					if (isset($_POST['weeks_save_submit'])) {
						if($_POST['week_id']=="") {
	
							//CREATE NEW WEEK
							$insertSeasonQuery="INSERT INTO weeks SET weekNum='{$_POST['weekNum_input']}', seasonNum='{$_POST['season_id2']}', dateName='{$_POST['dateName_input']}', weekNotes='{$_POST['weekNotes_input']}', scrim='{$_POST['scrim_input']}', Extra1='{$_POST['Extra1_input']}', Extra2='{$_POST['Extra2_input']}', ExtraStartTime='{$_POST['ExtraStartTime_input']}'";
							
							$insertSeasonResult = mysql_query($insertSeasonQuery);
							
							if (mysql_affected_rows() == 1) {
							} //End of create
							
						} else {
							//UPDATE WEEK							
							$updateSeasonQuery="UPDATE weeks SET weekNum='{$_POST['weekNum_input']}', seasonNum='{$_POST['season_id2']}', dateName='{$_POST['dateName_input']}', weekNotes='{$_POST['weekNotes_input']}', scrim='{$_POST['scrim_input']}', Extra1='{$_POST['Extra1_input']}', Extra2='{$_POST['Extra2_input']}', ExtraStartTime='{$_POST['ExtraStartTime_input']}' WHERE id='{$_POST['week_id']}'";
	
							$updateSeasonResult = mysql_query($updateSeasonQuery);
								
							if (!updateSeasonResult) {
								die ("Could not query the database:".mysql_error());
							}
						} //End of update	
					} //End of update/create
					?>
               
                                   
					<?php
					
					//UPDATE or CREATE season
					if (isset($_POST['season_save_submit'])) {
						if($_POST['season_id']=="") {
	
							//CREATE NEW SEASON
							$insertSeasonQuery="INSERT INTO seasons SET FreeWeek='{$_POST['free_week_input']}', name='{$_POST['name_input']}'";
							
							$insertSeasonResult = mysql_query($insertSeasonQuery);
							
							if (mysql_affected_rows() == 1) {
							} //End of create
							
						} else {
							//UPDATE SEASON							
							$updateSeasonQuery="UPDATE seasons SET FreeWeek='{$_POST['free_week_input']}', name='{$_POST['name_input']}' WHERE id='{$_POST['season_id']}'";
	
							$updateSeasonResult = mysql_query($updateSeasonQuery);
								
							if (!updateSeasonResult) {
								die ("Could not query the database:".mysql_error());
							}
						} //End of update	
					} //End of update/create
					
					
						//DELETE ANNOUNCEMENT
						if (isset($_POST['delete_submit'])) {
							$deleteAnnouncementQuery="DELETE FROM announcements WHERE announcement_id='{$_POST['announcement_id']}' LIMIT 1";
							$deleteAnnouncementResult = mysql_query($deleteAnnouncementQuery);
							}
					
					
					$seasonsQuery = "SELECT * FROM seasons ORDER BY ID DESC";
	
					$seasonsQueryResult = mysql_query($seasonsQuery);
					
					if (!seasonsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($row = mysql_fetch_array($seasonsQueryResult, MYSQL_ASSOC)) { ?>
                    
					<h4><?php print $row[Name]; ?></h4>
					
						<?php
						$weeksQuery = "SELECT * FROM weeks where seasonNum = $row[ID] ORDER BY weekNum ASC";
	
						$weeksQueryResult = mysql_query($weeksQuery);
						
						if (!weeksQueryResult) {
						die ("Could not query the database:". mysql_error());
						}
						
						while ($weekRow = mysql_fetch_array($weeksQueryResult, MYSQL_ASSOC)) { ?>
						<table width=100% style="<?php if (($_GET["editSelection"]==$weekRow[seasonNum] && $_GET["editWeek"] == "") or ($_GET["editWeek"]==$weekRow[ID]))  {print "background:yellow;";}?>margin-bottom:5px;border:1px solid black">
						<tr style="border-bottom:1px solid black"><td width=50%>Week <?php print $weekRow[weekNum]; ?>
						
						</td><td style="text-align:right">Date: <?php print $weekRow[dateName]; ?></td></tr>
						
						<tr>
						
						<?php if ($weekRow[Extra1]<>"") {?>
						<td valign=top><u>Court 1 Extra</u><br><?php print $weekRow[Extra1]; ?>
						</td>
						<?php } ?>
						
						<?php if ($weekRow[Extra2]<>"") {?>
						<td valign=top style="text-align:right"><u>Court 2 Extra</u><br><?php print $weekRow[Extra2]; ?>
						</td>
						<?php } ?>
						
						</tr>
						<?php if ($weekRow[weekNotes]<>"") {print "<tr><td colspan=2>Notes: ".$weekRow[weekNotes];} ?>
						<?php if ($weekRow[scrim]) {print " <br><font color=blue>Scrimmage week</font>";} ?>
						</td></tr>
						</table>
						<? } ?>
					

                    <? } ?>
                    <!-- LEFT COLUMN ENDS -->
                 </div>
				 </div>
	<div class="ui-block-b">   
	<div class="ui-body ui-body-d" style="background:#F2F2F2; padding:30px">
                    <!-- RIGHT COLUMN BEINGS -->

                 
                  <div align="center" class="standingsHeaderLG">SEASONS</div><br>
                  <form action="seasons.php" method="post">
                  		<span class="defaultCopy">Enter a new season or select an exisiting season to change.</span><br /><br />
                    <select name="seasonSelector" id="seasonSelector" onchange="MM_jumpMenu('parent',this,0)" data-theme= "j">
                      <option value="seasons.php?edit_selection=">New season</option>
					  <?php
					  
                      $seasonsQuery = "SELECT * FROM seasons ORDER BY ID DESC";
					  $seasonsQueryResult = mysql_query($seasonsQuery);
					    
					  while ($row = mysql_fetch_array($seasonsQueryResult, MYSQL_ASSOC)) { 
                      if($_GET["editSelection"]==$row[ID]) {
						$edit_name = $row[Name];
						$edit_season_id = $row[ID];
						$edit_free_week = $row[FreeWeek];
						}
                      ?>
                   	  <option value="seasons.php?editSelection=<?php print $row[ID]; ?>" <?php if ($_GET["editSelection"]==$row[ID]) { print 'selected'; } ?>><?php print $row[Name]; ?></option>
                      <?php } ?>
                      </select>
                      <br />
                      <br /><span class="formLabels">Season Name:</span><br />
               	      <input type="text" size="35" value="<?php print $edit_name; ?>" name="name_input" />
					  
					  <br /><span class="formLabels">Free Week:</span><br />
               	      <input type="text" size="35" value="<?php print $edit_free_week; ?>" name="free_week_input" />
					  <br /><br />
					
                      
                      <input type="hidden" name="season_id" value="<?php print $edit_season_id; ?>" />
                      <input type="submit" value=" Save " name="season_save_submit" data-theme= "j"/>
					  <input type="hidden" name="password" id="password" value="asd">
                   </form>       

				   
				   <div <?if($_GET["editSelection"]=="") {print "style='display:none'";}?>>
				   
					<hr style="margin: 30px">
					
					<div align="center" class="standingsHeaderLG">WEEKS</div><br>
                  <form action="seasons.php" method="post">
                  		<span class="defaultCopy">Enter a new season or select an exisiting season to change.</span><br /><br />
                    <select name="seasonSelector" id="seasonSelector" onchange="MM_jumpMenu('parent',this,0)" data-theme= "j">
                      <option value="seasons.php?edit_selection=">New week</option>
					  <?php
					  
                      $weeksQuery = "SELECT * FROM weeks where seasonNum = '{$_GET["editSelection"]}' ORDER BY weekNum ASC";
					  $weeksQueryResult = mysql_query($weeksQuery);
					    
					  while ($row2 = mysql_fetch_array($weeksQueryResult, MYSQL_ASSOC)) { 
                      if($_GET["editWeek"]==$row2[ID]) {
						$edit_weekNum = $row2[weekNum];
						$edit_weekDateName = $row2[dateName];
						$edit_weekExtraStartTime = $row2[ExtraStartTime];
						$edit_weekExtra1 = $row2[Extra1];
						$edit_weekExtra2 = $row2[Extra2];
						$edit_weekNotes = $row2[weekNotes];
						$edit_scrim = $row2[scrim];
						$edit_week_id = $row2[ID];
						}
                      ?>
                   	  <option value="seasons.php?editSelection=<?php print $_GET["editSelection"]; ?>&editWeek=<?php print $row2[ID]; ?>" <?php if ($_GET["editWeek"]==$row2[ID]) { print 'selected'; } ?>><?php print $row2[dateName]; ?></option>
                      <?php } ?>
                      </select>
                      <br />
                      <br /><span class="formLabels">Week Number:</span><br />
               	      <input type="text" size="35" value="<?php print $edit_weekNum; ?>" name="weekNum_input" /><br /><br />
					  <span class="formLabels">Date Name:</span><br />
               	      <input type="text" size="35" value="<?php print $edit_weekDateName; ?>" name="dateName_input" /><br /><br />
					  <span class="formLabels">Extra Start Time:</span><br />
					  <input type="text" size="35" value="<?php print $edit_weekExtraStartTime; ?>" name="ExtraStartTime_input" /><br /><br />
					  
					   <span class="formLabels">Court 1 Extra:</span><br />
                      <textarea rows="15" wrap="virtual" cols="33" name="Extra1_input" style="height:65px"><?php print $edit_weekExtra1; ?></textarea><br />
					  <span class="formLabels">Court 2 Extra:</span><br />
					  <textarea rows="15" wrap="virtual" cols="33" name="Extra2_input" style="height:65px"><?php print $edit_weekExtra2; ?></textarea><br />
					   <span class="formLabels">Notes:</span><br />
                      <textarea rows="15" wrap="virtual" cols="33" name="weekNotes_input" style="height:200px"><?php print $edit_weekNotes; ?></textarea><br /><br />
                      <span class="formLabels">Scrimmage?</span><br>
					  <select name="scrim_input" id="scrim_input" data-role="slider" data-mini="true">
								<option value="0">Nary</option>
								<option value="1" <?php if ($edit_scrim==1) {print "selected";} ?>>Yas</option>
							</select>
					  <br /><br />
					
                      <input type="hidden" name="season_id2" value="<?php print $edit_season_id; ?>" />
					  <input type="hidden" name="week_id" value="<?php print $edit_week_id; ?>" />
                      <input type="submit" value=" Save " name="weeks_save_submit" data-theme= "j"/>
					  <input type="hidden" name="password" id="password" value="asd">
                   </form>       
				   </div>
				   
				   </td>
                  <!-- RIGHT COLUMN ENDS -->
								</div>
								</div>
				</div><!-- /grid-b -->


				
				
				
				
				
				
				<form name="adminForm" id="adminForm" action="seasons.php<?php if ($_GET["season"]<>'') {print "?season=$thisSeason";} ?>" method="post"> 
				<input type="hidden" name="password" id="password" value="asd">
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

function confirmDelete()
{
var agree=confirm("Are you sure you want to DELETE that entry?");
if (agree)
	return true ;
else
	return false ;
}

</script>
</html>

