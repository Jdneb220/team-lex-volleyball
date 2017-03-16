
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="description" content="Team Lex Volleyball offers a fun and friendly atmosphere for recreational and competitive volleyball among Lexington's gay, lesbian, bisexual and transgender community." />
<meta http-equiv="Content-Type" CONTENT="text/html; charset=iso-8859-1">
	<title>Team Lex Volleyball - LGBT Volleyball in Lexington, Kentucky</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<meta name="keywords" content="gay, lesbian, bisexual, transgender, lgbt, lexington, kentucky, KY, lex, volleyball, nagva, recreational, competitive, sports, central, pioneer, adult, co-ed, bluegrass, bvc, team lex" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
			<link rel="stylesheet" href="includes/css/teamlex.min.css" />

			

		
<style>
.gradient-bg {
   background-color: #efefef; 
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#898989), to(#efefef));
   background-image: -webkit-linear-gradient(top, #898989, #efefef); 
   background-image:    -moz-linear-gradient(top, #898989, #efefef);
   background-image:     -ms-linear-gradient(top, #898989, #efefef);
   background-image:      -o-linear-gradient(top, #898989, #efefef);
}
.ui-content p {
padding:0 20px 0 20px;
}


</style>

		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>


	
</head> 
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '253284838162727',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div data-role="page" data-theme="j">
<div data-role="header" data-theme="j"><a href="index.php" data-role="button" data-icon="home" data-iconpos="notext">Home</a>
<h1></h1>
</div>
<!-- /header -->

 <?php
					require ('db_login.php');
					  $homePhotoURLQuery = "SELECT * FROM other_content WHERE name='homePhotoURL' LIMIT 1";
					  $homePhotoURLQueryResult = mysql_query($homePhotoURLQuery);
					    
					  while ($row = mysql_fetch_array($homePhotoURLQueryResult, MYSQL_ASSOC)) { 
					  	$home_page_heading = $row[the_content];
						}
					?>
					
<div data-role="content" class="gradient-bg">


	<div class="ui-grid-a ui-responsive">

		<div class="ui-block-a"  style="padding-right:5px">
		
			<center><!-- rumor.png --> <a href="more.html"><img src="<?php print $home_page_heading; ?>" id="myBG" align="center" width="100%" style="max-width: 640px; margin: 0 0 10px 0; -moz-border-radius: 25px; border-radius: 25px;" /></a></center>

			<!--
					<center>
				<a target=_blank href="https://www.facebook.com/events/427334014027983/?fref=ts"><img id="myBG" src="includes/images/meet.png" align=center width="100%" style="max-width:640px;margin:20px 0px;     
				-moz-border-radius: 25px;
				border-radius: 25px;"></a>
				</center>
				-->
		
		
			<div class="extras">	

			<?php	

					$announcementsQuery = "SELECT * FROM announcements WHERE list_order < 0 ORDER BY list_order DESC";
	
					$announcementsQueryResult = mysql_query($announcementsQuery);
					
					if (!announcementsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($row = mysql_fetch_array($announcementsQueryResult, MYSQL_ASSOC)) { ?>
                    
					<div data-role="collapsible" data-theme="<?php print $row[data_theme]; ?>" data-content-theme="i" data-collapsed="false" style="max-width:640px; margin: 0 0 10px 0;">
					<h3><?php print $row[heading]; ?></h3>
					<p style="text-align: center;"><?php print $row[body]; ?>
					</div>

                    <? } ?>
					
			</div> <!-- end extras -->
		
		
		</div> <!-- end block A -->

		<div class="ui-block-b" style="padding-left:5px">
	
		<?php	

					$announcementsQuery = "SELECT * FROM announcements WHERE list_order > 0 ORDER BY list_order DESC";
	
					$announcementsQueryResult = mysql_query($announcementsQuery);
					
					if (!announcementsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($row = mysql_fetch_array($announcementsQueryResult, MYSQL_ASSOC)) { ?>
                    
					<div data-role="collapsible" data-theme="<?php print $row[data_theme]; ?>" data-content-theme="i" data-collapsed="false" style="margin: 0 0 10px 0;">
					<h3><?php print $row[heading]; ?></h3>
					<p style="text-align: center;"><?php print $row[body]; ?>
					</div>

                    <? } ?>
					
		</div> <!-- end block B -->		
	</div> <!-- end grid A -->
	
	
	<div class="extrasfooter">		
	
	<?php	

					$announcementsQuery = "SELECT * FROM announcements WHERE list_order < 0 ORDER BY list_order DESC";
	
					$announcementsQueryResult = mysql_query($announcementsQuery);
					
					if (!announcementsQueryResult) {
					die ("Could not query the database:". mysql_error());
					}
					
					while ($row = mysql_fetch_array($announcementsQueryResult, MYSQL_ASSOC)) { ?>
                    
					<div data-role="collapsible" data-theme="<?php print $row[data_theme]; ?>" data-content-theme="i" data-collapsed="false" style="max-width:640px; margin: 0 0 10px 0;">
					<h3><?php print $row[heading]; ?></h3>
					<p style="text-align: center;"><?php print $row[body]; ?>
					</div>

                    <? } ?>
					
			</div> <!-- end extras -->
		
<p></p>
<table width="100%" style="padding: 0; margin: 0; border-spacing: 0;">
<tbody>
<tr>
<td valign="middle" align="left" width="33%"><a href="contact.html">Sign up</a> for Team Lex!</td>
<td valign="middle" align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
" /> <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /> <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
</td>
<td valign="bottom" align="right" width="33%"><a href="http://www.glyphish.com/" style="font-size: 10px;">Icons by Glyphish</a><br /> <a href="http://www.teamlexvb.com/admin/" style="font-size: 10px;">Admin</a></td>
</tr>
</tbody>
</table>
<!-- /content -->
<div data-role="footer" class="nav-glyphish-example" data-theme="i" data-position="fixed">
<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
<ul>
<li><a href="schedule.php" id="sched" data-icon="custom" data-theme="i">Schedule</a></li>
<li><a href="teams.php" id="teams" data-icon="custom" data-theme="i">Teams</a></li>
<li><a href="standings.php" id="standings" data-icon="custom" data-theme="i">Standings</a></li>
<li><a href="contact.html" id="contact" data-icon="custom" data-theme="i">Sign Up</a></li>
</ul>
</div>
<!-- /navbar --></div>
<!-- /footer -->
<p></p>
<!-- /page -->
<p></p>
</div>
</div>
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

function foo() {
    jQuery("#myBG").animate({opacity: 1.0}, {duration: 3000})
        .animate({opacity: 0}, {duration: 3000, complete: meh});



}

function foo2(){
        jQuery("#myBG").animate({opacity: 0}, {duration: 3000})
        .animate({opacity: 1.0}, {duration: 3000})
		.animate({opacity: 1.0}, {duration: 3000})
        .animate({opacity: 0}, {duration: 3000, complete: meh2});
}

function foo3(){
		jQuery("#myBG").animate({opacity: 0}, {duration: 3000})
		.animate({opacity: 1.0}, {duration: 3000, complete: foo});
}

function meh(){
		jQuery("#myBG").attr("src","includes/images/champsS14.jpg")
		.css("max-width","640px").css("max-height","427px");
		foo2();
}

function meh2(){
		jQuery("#myBG").attr("src","<?php print $home_page_heading; ?>").css("max-width","640px").css("max-height","427px");
		foo3();
}

//foo();

 
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39560730-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</html>
		
		
		
		
		