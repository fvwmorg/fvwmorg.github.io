<?php
//--------------------------------------------------------------------
//-  File          : screenshots/menus/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Menu Screenshots";
$link_name      = "Menu Screenshots";
$link_picture   = "pictures/icons/screenshots_menu";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_menus";

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

//--------------------------------------------------------------------
// direcory lister object
//--------------------------------------------------------------------
include_once(sec_filename($rel_path."/screenshots/classes/directory_lister.inc"));

$lister = new Directory_lister();
$file_array = $lister->get_file_array(".");

decoration_window_start("FVWM Menu Screenshots"); 

// $back = my_get_global("HTTP_REFERER", "SERVER");
// 
// if(!$back) {
//     $back = "..";
// }

mylink("../", "Back to menu screenshot list.");

// echo "<pre>"; print_r($file_array); print "</pre>";

$menu_shots = array();
$description = "";
$fvwmrc = "";
$backgrounds = array();

foreach($file_array as $file) {
    if(preg_match("/^description/", $file["name"])) {
        $description = $file["name"];
    } 
    elseif(preg_match("/^menu/", $file["name"])) {
        $menu_shots[] = $file["name"];
    }
    elseif(preg_match("/^fvwm/", $file["name"])) {
        $fvwmrc = $file["name"];
    }
    elseif(preg_match("/^back.*(png|jpg|gif)/", $file["name"])) {
        $backgrounds[] = $file["name"];
    }
    else {
        // unknown file 
    }
}

if($description) {
    $desc = "";
    if( $handle = fopen($description, "r") ) {
        while( $line = fgets($handle, 10000) ) {
            $desc = $desc." ".str_replace("@path@", ".", $line);
        }
    }
    if($desc) {
        echo "<h2>Description</h2>";
        echo "<p>\n";
        echo $desc."\n";
        echo "</p>\n\n";
    }
}

if(count($menu_shots)) {
    echo "<h2>Menu shots</h2>\n";
    echo "<p>\n";
    foreach($menu_shots as $menu_shot) {
        echo '<img src="'.$menu_shot.'" vspace="5" hspace="5" align="top" alt="menu screenshot">';
    }
    echo "</p>\n\n";
}

if(count($backgrounds)) {
    echo "<h2>Background pictures</h2>\n";
    echo "<p>\n";
    foreach($backgrounds as $background) {
        echo '<img src="'.$background.'" vspace="5" hspace="5" alt="menu background">';
    }
    echo "</p>\n\n";
}

if($fvwmrc) {
    echo "<h2>Configuration</h2>\n";
    echo "<pre >\n";
    include(sec_filename($fvwmrc));
    echo "</pre>\n\n";
}

mylink("../", "Back to menu screenshot list.");

decoration_window_end(); 

?>
