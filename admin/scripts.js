// JavaScript Document

function admin_jumpPage(targ){
      if(targ!=''){
	  $("#adminForm").attr("action",targ);
	  }
	  $("#adminForm").submit();
	}
	
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	  $("#adminForm").attr("action",selObj.options[selObj.selectedIndex].value);
	  $("#adminForm").submit();
	  
	  //eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  //if (restore) selObj.selectedIndex=0;
	}


	function confirmDelete(teamID)
	{
	var agree=confirm("Are you sure you want to DELETE that team (as well as all associated Rosters and MATCHES)?");
	if (agree){
		$("#delteam").val(teamID);
		$("#adminForm").attr("action","teams.php");
		$("#adminForm").submit();
	}
	else
		return false ;
	}
	
	function confirmDeletePlayer(playerID)
	{
	var agree=confirm("Are you sure you want to DELETE that player?");
	if (agree){
		$("#delplayer").val(playerID);
		$("#adminForm").attr("action","players.php");
		$("#adminForm").submit();
	}
	else
		return false ;
	}
	
	function confirmDeletePlayerFromRoster(playerID)
	{
	var agree=confirm("Are you sure you want to REMOVE that player this roster?");
	if (agree){
		$("#delplayer").val(playerID);
		$("#adminForm").submit();
	}
	else
		return false ;
	}
	
	function confirmDeleteRoster(rosterID)
	{
	var agree=confirm("Are you sure you want to DELETE this roster entry?");
	if (agree){
		$("#delroster").val(rosterID);
		$("#adminForm").submit();
	}
	else
		return false ;
	}
	
	function confirmDeleteMatch(matchID)
	{
	var agree=confirm("Are you sure you want to DELETE this match?");
	if (agree){
		$("#delmatch").val(matchID);
		$("#adminForm").submit();
	}
	else
		return false ;
	}
	
	function togglePT(rosterID)
	{
		$("#togglept").val(rosterID);
		$("#adminForm").submit();
	}
	
	function toggleC(rosterID)
	{
		$("#togglec").val(rosterID);
		$("#adminForm").submit();
	}