<?php
//--------------------------------------------------------------------
//-  File          : default_theme.inc
//-  Project       : Fvwm Home page
//-  Date          : Sat Apr 19 15:21:26 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// exit here in case of a navgen run
if(isset($navigation_check)) return;

// set relative path which is defined in the php files
if(!isset($rel_path)) $rel_path=$nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("default_class.inc"));

// create a object of the theme class
$theme_object = new Default_Theme();

// include function wrappers
include(helper_file("members2globals.inc"));

if(!isset($heading)) $heading = $title;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html> 
  <head>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="keywords" content="fvwm, window manager, screenshots, themes">
    <meta name="description" content="The Official FVWM Home Page">
    
    <link rel="shortcut icon" href="<?php echo $rel_path; ?>/fvwm.ico">
				      
    <link rel="stylesheet" type="text/css" title="default" href="<?php echo $rel_path; ?>/css/default.css">

    <!-- provide alternate style sheet -->
    <!-- the capital "S" is needed to work around the Konqueror 3.1 bug -->
    <link rel="alternate styleSheet" type="text/css" title="alternative" href="<?php echo $rel_path; ?>/css/alternate.css">

    <title><?php print $title; ?></title>
    <!-- Changed by: Uwe Pross, 02-May-2003 -->

    <style type="text/css">
    <!--  
    <?php $theme_object->insert_css_definitions(); ?>
     -->
    </style>
  </head>

  <body 
    bgcolor="<?php echo $theme_object->style_array['body_bg'];?>"
    <?php 
    // check if background image exists
    if(isset($theme_object->style_array['body_bg_image']) 
       && file_exists($theme_object->style_array['body_bg_image']) 
       && strlen($theme_object->style_array['body_bg_image']) > 0) { 
           echo 'background="'.$theme_object->style_array['body_bg_image'].'"'; 
       }
    ?>
    text="<?php echo $theme_object->style_array['body_fg']; ?>"
    link="#ffff88"
    vlink="#f0c0c0"
    alink="#ff0000">

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <!-- wrapper table contains two columns  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="2" summary="">
      <tr>
	<td valign="top">
	  <!-- wrapper table contains two rows - heading and contents -->
	  <table width="100%" border="0" cellpadding="0" cellspacing="10" summary="">
	    <tr>
	      <td align="center" valign="bottom"><h1><?php echo $heading; ?></h1></td>
	    </tr>
	    <tr>
	      <td valign="top"><?php include(sec_filename($requested_file)); ?></td>
	    </tr>
	  </table>
	</td>
	
	<!-- second cell of the outer wrapper table which contains the pager -->
	<td valign="top" align="right" width="80"><?php
	    $theme_object->push_decoration_path("pictures/decorations/window_deco_ice");
	    $theme_object->insert_pager_navigation();
	    $theme_object->pop_decoration_path();
	    ?></td>
      </tr>
    </table>
    
    <!-- bottom of the page - display last modified information -->
    <p class="bottominfo"><?php $theme_object->insert_timestamp($requested_file); ?></p>
    
  </body>
</html>
