<?php
//--------------------------------------------------------------------
//-  File          : plain_theme.inc
//-  Project       : Fvwm Home page
//--------------------------------------------------------------------

// exit here in case of a navgen run
if(isset($navigation_check)) return;

// set relative path which is defined in the php files
if(!isset($rel_path)) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("plain_class.inc"));

// create a object of the theme class
$theme_object = new Plain_Theme();

// include function wrappers
include(helper_file("members2globals.inc"));

// correct heading
if(!isset($heading)) $heading = $title;
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
  <head>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="keywords" content="fvwm, window manager, screenshots, themes">
    <meta name="description" content="The Official FVWM Home Page">

    <link rel="shortcut icon" href="<?php echo $rel_path;?>/fvwm.ico">

    <title><?php print $title; ?></title>
  </head>
    
<?php
echo "<body";
if(isset($theme_object->style_array["window_bg"]) && preg_match('/#[0-9a-fA-F]{6}/', $theme_object->style_array["window_bg"])) {
     echo ' bgcolor="'.$theme_object->style_array["window_bg"].'"';
}
if(isset($theme_object->style_array["window_fg"]) &&  preg_match('/#[0-9a-fA-F]{6}/', $theme_object->style_array["window_fg"])) {
     echo ' text="'.$theme_object->style_array["window_fg"].'"';
//      echo ' link="'.$theme_object->style_array["window_fg"].'"';
//      echo ' vlink="'.$theme_object->style_array["window_fg"].'"';
//      echo ' alink="'.$theme_object->style_array["window_fg"].'"';
}
echo ">";
?>

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <h1><?php echo $heading;?></h1>

    <hr>
    <?php $theme_object->insert_navigation(); ?>
    <?php include(sec_filename($requested_file)); ?>
    <hr>

    <p>
    Switch to 
      <a href="<?php echo "./$requested_file";?>?theme=default">window theme</a>, 
      <a href="<?php echo "./$requested_file";?>?theme=pager_on_top">pager on top theme</a>, 
      <a href="<?php echo "./$requested_file";?>?theme=navigate">navigation theme</a>, 
    </p>

    <!-- bottom of the page - display last modified information -->
    <p style="text-align:right; font-size:xx-small; font-style:italic;">
       <?php $theme_object->insert_timestamp($requested_file); ?>
    </p>

  </body>
</html>
