<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path."/definitions.inc");

$theme = "voting";
$theme_file = theme_file($theme."_theme.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Voting Page";
$heading        = "FVWM - Logo Competition - Voting Page";
$link_name      = "Logo Competition Voting Page";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($theme_file));
	exit();
}

include_once(sec_filename("voting_functions.inc"));

echo "<hr>";

save_voting();

?>

