<?php
//--------------------------------------------------------------------
//-  File          : screenshots/desktops/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Desktop Screenshots";
$link_name      = "Desktop Screenshots";
$short_name     = "Desktops";
$link_picture   = "pictures/icons/screenshots_desks";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_desks";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

<?php
decoration_window_start("FVWM Screenshots");
include("./screenshot_db.inc");

$total_num_of_screenshots = count($db);
if( ! $show_start = get_user_setting("start", array("GET", "POST") ) ) $show_start = 0;
if( ! $show_num   = get_user_setting("num",   array("GET", "POST") ) ) $show_num   = 5;
// correct settings
if( $show_start >= $total_num_of_screenshots ) {
    if( $show_num >= $total_num_of_screenshots ) {
        $show_start = 0;
    } else {
        $show_start = $total_num_of_screenshots - $show_num;
    }
}
$show_start = floor($show_start / $show_num) * $show_num;
$show_end = $show_start + $show_num - 1;
if( $show_end >= $total_num_of_screenshots ) {
    $show_end = $total_num_of_screenshots - 1;
}

if(!isset($user_theme)) $user_theme = "";

//--------------------------------------------------------------------
//- screenshot table
//--------------------------------------------------------------------
include_once("./../classes/picture_page.inc");
$page = new Picture_Page("screenshot",
                         "screenshots",
                         $show_start,
                         $show_num,
                         $total_num_of_screenshots,
                         $theme,
                         $user_theme);
$page->show_start();
for( $ii=$show_start; $ii<=$show_end; $ii++) {
    $page->show_entry($db[$ii]);
}
$page->show_end();

?>

<?php decoration_window_end(); ?>
