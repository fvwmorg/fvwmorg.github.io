<?php
//=============================================================
// This file is generated automatically by navgen.
// You may change the order of $top_array only!
// Uwe Pross 2002
//=============================================================

// names of the top sites - you may change the order if you like
$top_array = array(
	"home", 
	"news", 
	"screenshots", 
	"download", 
	"documentation", 
	"contact", 
); 

$fvwm_cats["file"]         = "fvwm-cats/index.php"; 
$fvwm_cats["rel_path"]     = "./.."; 
$fvwm_cats["link_name"]    = "Cats"; 
$fvwm_cats["link_chapter"] = ""; 
$fvwm_cats["link_pic"]     = "pictures/icons/fvwm_cats"; 
$fvwm_cats["parent_site"]  = "home"; 
$fvwm_cats["child_sites"]  = array(); 

$authors["file"]         = "authors/index.php"; 
$authors["rel_path"]     = "./.."; 
$authors["link_name"]    = "Authors"; 
$authors["link_chapter"] = ""; 
$authors["link_pic"]     = "pictures/icons/authors"; 
$authors["parent_site"]  = "home"; 
$authors["child_sites"]  = array(); 

$home["file"]         = "index.php"; 
$home["rel_path"]     = "."; 
$home["link_name"]    = "Home"; 
$home["link_chapter"] = ""; 
$home["link_pic"]     = "pictures/icons/home"; 
$home["parent_site"]  = "top"; 
$home["child_sites"]  = array("fvwm_cats", "authors"); 

$logo_competition["file"]         = "logo-competition/index.php"; 
$logo_competition["rel_path"]     = "./.."; 
$logo_competition["link_name"]    = "Logo Competition"; 
$logo_competition["link_chapter"] = ""; 
$logo_competition["link_pic"]     = "pictures/icons/logo_competition"; 
$logo_competition["parent_site"]  = "news"; 
$logo_competition["child_sites"]  = array(); 

$news["file"]         = "latest_news/index.php"; 
$news["rel_path"]     = "./.."; 
$news["link_name"]    = "News"; 
$news["link_chapter"] = ""; 
$news["link_pic"]     = "pictures/icons/news"; 
$news["parent_site"]  = "top"; 
$news["child_sites"]  = array("logo_competition"); 

$windowdecors["file"]         = "screenshots/windowdecors/index.php"; 
$windowdecors["rel_path"]     = "./../.."; 
$windowdecors["link_name"]    = "Decors"; 
$windowdecors["link_chapter"] = ""; 
$windowdecors["link_pic"]     = "pictures/icons/screenshots_decor"; 
$windowdecors["parent_site"]  = "screenshots"; 
$windowdecors["child_sites"]  = array(); 

$menus["file"]         = "screenshots/menus/index.php"; 
$menus["rel_path"]     = "./../.."; 
$menus["link_name"]    = "Menus"; 
$menus["link_chapter"] = ""; 
$menus["link_pic"]     = "pictures/icons/screenshots_menu"; 
$menus["parent_site"]  = "screenshots"; 
$menus["child_sites"]  = array(); 

$screenshots["file"]         = "screenshots/index.php"; 
$screenshots["rel_path"]     = "./.."; 
$screenshots["link_name"]    = "Screenshots"; 
$screenshots["link_chapter"] = ""; 
$screenshots["link_pic"]     = "pictures/icons/screenshots"; 
$screenshots["parent_site"]  = "top"; 
$screenshots["child_sites"]  = array("windowdecors", "menus"); 

$download["file"]         = "download/index.php"; 
$download["rel_path"]     = "./.."; 
$download["link_name"]    = "Download"; 
$download["link_chapter"] = ""; 
$download["link_pic"]     = "pictures/icons/download"; 
$download["parent_site"]  = "top"; 
$download["child_sites"]  = array(); 

$manpages["file"]         = "documentation/manpages/index.php"; 
$manpages["rel_path"]     = "./../.."; 
$manpages["link_name"]    = "Man pages"; 
$manpages["link_chapter"] = ""; 
$manpages["link_pic"]     = "pictures/icons/doc_manpages"; 
$manpages["parent_site"]  = "documentation"; 
$manpages["child_sites"]  = array(); 

$documentation["file"]         = "documentation/index.php"; 
$documentation["rel_path"]     = "./.."; 
$documentation["link_name"]    = "Docs"; 
$documentation["link_chapter"] = ""; 
$documentation["link_pic"]     = "pictures/icons/documentation"; 
$documentation["parent_site"]  = "top"; 
$documentation["child_sites"]  = array("manpages"); 

$contact["file"]         = "contact/index.php"; 
$contact["rel_path"]     = "./.."; 
$contact["link_name"]    = "Contact"; 
$contact["link_chapter"] = ""; 
$contact["link_pic"]     = "pictures/icons/contact"; 
$contact["parent_site"]  = "top"; 
$contact["child_sites"]  = array(); 

?>
