<?php
//--------------------------------------------------------------------
//-  File          : blue_theme.inc
//-  Project       : Fvwm Home page
//-  Date          : Sat Apr 19 15:21:26 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("blue_class.inc"));

// create a object of the theme class
$theme_object = new Blue_Theme();

// include function wrappers
include(helper_file("members2globals.inc"));

if (strlen($heading) == 0) $heading = $title;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html> 
  <head>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

    <link rel="stylesheet" type="text/css" title="default" href="<?php echo $rel_path; ?>/css/blue.css">

    <!-- provide alternate style sheet -->
    <!-- the capital "S" is needed to work around the Konqueror 3.1 bug -->
    <link rel="alternate styleSheet" type="text/css" title="alternative" href="<?php echo $rel_path; ?>/css/alternate.css">

    <title><?php print $title; ?></title>
    <!-- Changed by: Uwe Pross, 11-Aug-2003 -->

    <style type="text/css">
    <!--  
    <?php $theme_object->insert_css_definitions(); ?>
    body {
    margin:0pt;
    padding:0pt;
    }
    -->
    </style>
  </head>

  <body 
    bgcolor="<?php echo $theme_object->style_array['window_bg'];?>"
    text="<?php echo $theme_object->style_array['window_fg']; ?>"
    link="#ffff88"
    vlink="#f0c0c0"
    alink="#ff0000">
<?php
//     leftmargin="0"
//     topmargin="0" 
//     marginwidth="0" 
//     marginheight="0">
?>
    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <table width="100%" cellspacing="0" cellpadding="15" border="0" summary="">
      <tr>
	    <th bgcolor="<?php echo $theme_object->style_array['menu_bg']?>" height="1%">&nbsp;</th>
	    <th bgcolor="<?php echo $theme_object->style_array['menu_bg']?>" height="1%"><h2><?php echo $heading; ?></h2></th>
      </tr>
      <tr>
	<td valign="top" width="15%"
        bgcolor="<?php echo $theme_object->style_array['menu_bg']?>" 
        height="1000"
        align="right"><?php 
                 $theme_object->insert_menu_navigation(); ?></td>
	<td valign="top" align="left"><?php include(sec_filename($requested_file)); ?></td>
      </tr>
    </table>

    <!-- bottom of the page - display last modified information -->
    <p class="bottominfo">
    <a href="http://validator.w3.org/check/referer"><img
       src="http://www.w3.org/Icons/valid-html401"
       alt="Valid HTML 4.01!" height="31" width="88" border="0" hspace="2" vspace="2"></a>
    <a href="http://jigsaw.w3.org/css-validator/"><img
       src="http://jigsaw.w3.org/css-validator/images/vcss" 
       alt="Valid CSS!" border="0" height="31" width="88" hspace="2" vspace="2">
 </a>
    <?php $theme_object->insert_timestamp($requested_file); ?>
    </p>
    
  </body>
</html>
