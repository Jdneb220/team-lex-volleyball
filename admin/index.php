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


		<form action="index.php" method="post">
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
				
				
				
				<h3 style="color:red">GoDaddy Account #: 27934979</h3>
				<?php
					//UPDATE HOME PAGE HEADING
					if (isset($_POST['season_save_submit'])) {
                    $updateSiteSeasonQuery="UPDATE other_content SET the_content='{$_POST['season_Selector']}' WHERE id=2";
					$updateSiteSeasonQueryResult = mysql_query($updateSiteSeasonQuery);
					}
					?>
               
               
               	  <?php
					  $siteSeasonQuery = "SELECT seasons.Name FROM other_content join seasons on other_content.the_content = seasons.ID WHERE other_content.name='siteSeason' LIMIT 1";
					  $siteSeasonQueryResult = mysql_query($siteSeasonQuery);
					    
					  while ($row = mysql_fetch_array($siteSeasonQueryResult, MYSQL_ASSOC)) { 
					  	$site_season = $row[Name];
						}
					?>
                  
                  <h3>Site Season: <?print $site_season;?></h3>
				  
				
				<div class="ui-grid-a ui-responsive">
				<div class="ui-block-a">
				<div class="ui-body ui-body-d" style="background:#666">
                	<!-- LEFT COLUMN BEINGS -->
					
				  
               <?php
					//UPDATE HOME PAGE HEADING
					if (isset($_POST['heading_save_submit'])) {
                    $updatehomePhotoURLQuery="UPDATE other_content SET the_content='{$_POST['home_page_heading_input']}' WHERE id=1";
					$updatehomePhotoURLQueryResult = mysql_query($updatehomePhotoURLQuery);
					}
					?>
               
               
               	  <?php
					  $homePhotoURLQuery = "SELECT * FROM other_content WHERE name='homePhotoURL' LIMIT 1";
					  $homePhotoURLQueryResult = mysql_query($homePhotoURLQuery);
					    
					  while ($row = mysql_fetch_array($homePhotoURLQueryResult, MYSQL_ASSOC)) { 
					  	$home_page_heading = $row[the_content];
						}
					?>
                  
                  <div align="center" class="homeSeasonHeadline"><img src="<?php print $home_page_heading; ?>" style="width:100%; max-width:640px"></div>
                    
					<?php
					
					//UPDATE or CREATE announcement
					if (isset($_POST['save_submit'])) {
						if($_POST['announcement_id']=="") {
	
							//CREATE NEW ANNOUNCEMENT
							$insertAnnouncementQuery="INSERT INTO announcements SET list_order='{$_POST['list_order_input']}', heading='{$_POST['heading_input']}', body='{$_POST['body_input']}', data_theme='{$_POST['data_theme_input']}'";
							
							$insertAnnouncementResult = mysql_query($insertAnnouncementQuery);
							
							if (mysql_affected_rows() == 1) {
							} //End of create
							
						} else {
							//UPDATE ANNOUNCEMENT							
							$updateAnnouncementQuery="UPDATE announcements SET list_order='{$_POST['list_order_input']}', heading='{$_POST['heading_input']}', data_theme='{$_POST['data_theme_input']}', body='{$_POST['body_input']}' WHERE announcement_id='{$_POST['announcement_id']}'";
	
							$updateAnnouncementResult = mysql_query($updateAnnouncementQuery);
								
							if (!updateAnnouncementResult) {
								die ("Could not query the database:".mysql_error());
							}
						} //End of update	
					} //End of update/create
					
					
						//DELETE ANNOUNCEMENT
						if (isset($_POST['delete_submit'])) {
							$deleteAnnouncementQuery="DELETE FROM announcements WHERE announcement_id='{$_POST['announcement_id']}' LIMIT 1";
							$deleteAnnouncementResult = mysql_query($deleteAnnouncementQuery);
							}
					
					
					$announcementsQuery = "SELECT * FROM announcements ORDER BY list_order DESC";
	
					$announcementsQueryResult = mysql_query($announcementsQuery);
					
					if (!announcementsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($row = mysql_fetch_array($announcementsQueryResult, MYSQL_ASSOC)) { ?>
                    
					<div data-theme="<?php print $row[data_theme]; ?>" data-content-theme="i" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content" style="max-width:640px; margin: 10px auto;">
					<h3 class="ui-collapsible-heading"><a href="#" class="ui-collapsible-heading-toggle ui-btn ui-fullsize ui-btn-icon-left ui-btn-up-<?php print $row[data_theme]; ?>" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="left" data-theme="<?php print $row[data_theme]; ?>" data-mini="false"> <span class="ui-btn-inner"> <span class="ui-btn-text"><?php print $row[heading]; ?> <i>(<?php print $row[list_order]; if ($row[list_order] <= 0) {print ") (Hidden";}?>)</i></span> <span class="ui-icon ui-icon-shadow ui-icon-star">&nbsp;</span> </span></a></h3>
					<div class="ui-collapsible-content ui-body-i" aria-hidden="false">
					<p style="text-align: center;"><?php print $row[body]; ?>
					</div>
					</div>

                    <? } ?>
                    <!-- LEFT COLUMN ENDS -->
                 </div>
				 </div>
	<div class="ui-block-b">   
	<div class="ui-body ui-body-d" style="background:#F2F2F2; border:none; padding:30px">
                    <!-- RIGHT COLUMN BEINGS -->

					<div align="center" class="standingsHeaderLG" style="margin-bottom:10px">CURRENT SEASON</div>
                  <form action="index.php" method="post">
				  <p><a href="#" onClick="return admin_jumpPage('seasons.php');">Edit Season Details</a></p>
				  <span class="defaultCopy">Which season should the site default to?</span><br /><br />
                  <select name="season_Selector" id="season_Selector" data-theme= "j">
					  <?php
					  
                      $seasonsQuery = "SELECT * FROM seasons ORDER BY ID DESC";
					  $seasonsQueryResult = mysql_query($seasonsQuery);
					    
					  while ($row = mysql_fetch_array($seasonsQueryResult, MYSQL_ASSOC)) { 
                      if($site_season==$row[ID]) {
						$edit_name = $row[Name];
						$edit_season_id = $row[ID];
						}
                      ?>
                   	  <option value="<?php print $row[ID]; ?>" <?php if ($site_season==$row[Name]) { print 'selected'; } ?>><?php print $row[Name]; ?></option>
                      <?php } ?>
                      </select>
					  
					<input type="hidden" name="season_id" value="<?php print $edit_season_id; ?>" />  
					<input type="submit" value=" Save " name="season_save_submit" data-theme= "j"/>
				  <input type="hidden" name="password" id="password" value="asd">
                  </form>
				  
				  <hr / style="margin:10px 0 10px 0">
				  
                  <div align="center" class="standingsHeaderLG">HOME PAGE PHOTO</div>
                  <form action="index.php" method="post">
                  <input type="text" size="20" value="<?php print $home_page_heading; ?>" name="home_page_heading_input" /> <input type="submit" value=" Save " name="heading_save_submit" />
				  <input type="hidden" name="password" id="password" value="asd">
                  </form>
                  
                  <hr / style="margin:10px 0 10px 0">
                  
                  <div align="center" class="standingsHeaderLG">ANNOUNCEMENTS</div>
                  <form action="index.php" method="post">
                  		<span class="defaultCopy">Enter a new announcement or select an exisiting announcement to change or delete.</span><br /><br />
                    <select name="announcementSelector" id="announcementSelector" onchange="MM_jumpMenu('parent',this,0)" data-theme= "j">
                      <option value="index.php?edit_selection=">New announcement</option>
					  <?php
					  
                      $announcementsQuery = "SELECT * FROM announcements ORDER BY list_order DESC";
					  $announcementsQueryResult = mysql_query($announcementsQuery);
					    
					  while ($row = mysql_fetch_array($announcementsQueryResult, MYSQL_ASSOC)) { 
                      if($_GET["editSelection"]==$row[announcement_id]) {
						$edit_heading = $row[heading];
						$edit_data_theme = $row[data_theme];
						$edit_body = $row[body];
						str_replace("\n", "", $edit_body);
						$edit_list_order = $row[list_order];
						$edit_announcement_id = $row[announcement_id];
						}
                      ?>
                   	  <option value="index.php?editSelection=<?php print $row[announcement_id]; ?>" <?php if ($_GET["editSelection"]==$row[announcement_id]) { print 'selected'; } ?>><?php print $row[heading]; ?></option>
                      <?php } ?>
                      </select>
                      <br />
                      <br /><span class="formLabels">Heading:</span><br />
               	      <input type="text" size="35" value="<?php print $edit_heading; ?>" name="heading_input" /><br /><br />
					<span class="formLabels">Data-Theme:</span><br />
				<select name="data_theme_input" id="data_theme" data-mini="true" data-theme= "j">

									<option <?php if ($edit_data_theme=="a") { print 'selected'; } ?> value="a">Red</option>
									
									<option <?php if ($edit_data_theme=="b") { print 'selected'; } ?> value="b">Orange</option>
									
									<option <?php if ($edit_data_theme=="c") { print 'selected'; } ?> value="c">Yellow</option>
									
									<option <?php if ($edit_data_theme=="d") { print 'selected'; } ?> value="d">Green</option>
									
									<option <?php if ($edit_data_theme=="e") { print 'selected'; } ?> value="e">Blue</option>
									
									<option <?php if ($edit_data_theme=="f") { print 'selected'; } ?> value="f">Violet</option>
									
									<option <?php if ($edit_data_theme=="g") { print 'selected'; } ?> value="g">Pink</option>
									
									<option <?php if ($edit_data_theme=="h") { print 'selected'; } ?> value="h">Brown</option>
									
									<option <?php if ($edit_data_theme=="i") { print 'selected'; } ?> value="i">Silver</option>
									
									<option <?php if ($edit_data_theme=="j") { print 'selected'; } ?> value="j">Black</option>
									
									<option <?php if ($edit_data_theme=="k") { print 'selected'; } ?> value="k">Indigo</option>

							
							</select>
                      <br /><br />
                    <span class="formLabels">Body:<br><i>HTML friendly</i></span><br />
                      <textarea rows="15" wrap="virtual" cols="33" name="body_input" style="height:200px"><?php print $edit_body; ?></textarea><br /><br />
                      <span class="formLabels">List Order:<br><i>greater the number, higher on the list</i></span><input type="text" size="3" value="<?php print $edit_list_order; ?>" name="list_order_input" /><br /><br />
                      
                      <input type="hidden" name="announcement_id" value="<?php print $edit_announcement_id; ?>" />
                      <input type="submit" value=" Delete " data-theme= "a" id="delete_form" name="delete_submit" onClick="return confirmDelete()" <?php if($_GET["editSelection"]=="") { print 'disabled="disabled"';} ?> />
                      <input type="submit" value=" Save " name="save_submit" data-theme= "j"/>
					  <input type="hidden" name="password" id="password" value="asd">
                   </form>                  </td>
                  <!-- RIGHT COLUMN ENDS -->
								</div>
								</div>
				</div><!-- /grid-b -->


				
				
				
				
				
				
				<form name="adminForm" id="adminForm" action="index.php<?php if ($_GET["season"]<>'') {print "?season=$thisSeason";} ?>" method="post"> 
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

