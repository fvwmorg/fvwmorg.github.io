<?php
//--------------------------------------------------------------------
//-  File          : screenshots/menus/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Window Decor Screenshots";
$link_name      = "Window Decor Screenshots";
$link_picture   = "pictures/icons/screenshots_windowdecor";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_windowdecors";

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

decoration_window_start("FVWM Decor Window Decor"); 

mylink("../", "Back to window decor list.");

$decor_shots = array();
$description = "";
$full_description = "";
$requirements = "";
$configs = array();

foreach($file_array as $file) {
    if(preg_match("/^description/", $file["name"])) {
        $description = $file["name"];
    } 
    elseif(preg_match("/^full_desc/", $file["name"])) {
        $full_description = $file["name"];
    } 
    elseif(preg_match("/^require/", $file["name"])) {
        $requirements = $file["name"];
    } 
    elseif(preg_match("/^shot|^decor/", $file["name"])) {
        $decor_shots[] = $file["name"];
    }
    elseif(preg_match("/fvwmrc|config|fvwmrc/", $file["name"])) {
        $configs[] = $file["name"];
    }
    else {
        // unknown file 
    }
}

if($full_description) {
    $description = $full_description;
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

if(count($decor_shots)) {
    echo "<h2>Decor shots</h2>\n";
    echo "<p>\n";
    foreach($decor_shots as $decor_shot) {
        echo '<img src="'.$decor_shot.'" vspace="5" align="top" alt="decor screenshot"><br>';
    }
    echo "</p>\n\n";
}

if($requirements) {
    echo "<h2>Requirements</h2>";
    echo "<p>\n";
    include(sec_filename($requirements));
    echo "\n";
    echo "</p>\n\n";
}

if(count($configs)) {
    echo "<h2>Configuration</h2>\n";
    echo "<p>\n";
    foreach($configs as $config) {
        echo '<a href="'.$config.'">'.$config.'</a><br>'."\n";
    }
    echo "</p>\n\n";
}

mylink("../", "Back to decor screenshot list.");

decoration_window_end(); 

?>
