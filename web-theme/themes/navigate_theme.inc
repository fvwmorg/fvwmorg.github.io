<?php
//--------------------------------------------------------------------
//-  File          : navigate_theme.inc
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("navigate_class.inc"));

// create a object of the theme class
$theme_object = new Navigate_Theme();

// include function wrappers
include(helper_file("members2globals.inc"));

if (strlen($heading) == 0) $heading = $title;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html> 
  <head>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="keywords" content="Uwe Pross, fvwm, emacs, linux">
    <meta name="description" content="Personal homepage">
    
    <link rel="stylesheet" type="text/css" title="navigate" href="<?php echo $rel_path; ?>/css/navigate.css">

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

  <body>

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <table width="100%" cellspacing="0" cellpadding="10" border="0" summary="">
      <tr>
	    <th>&nbsp;</th>
	    <th><h2><?php echo $heading; ?></h2></th>
      </tr>
      <tr>
    	<td valign="top" class="navigationcell" width="15%" height="700"><?php $theme_object->insert_navigation();?></td>
	    <td valign="top" align="left"><?php include(sec_filename($requested_file)); ?></td>
      </tr>
    </table>

    <!-- bottom of the page - display last modified information -->
    <p class="bottominfo">
        <a href="<?php echo "./$requested_file";?>?theme=default">:Window theme:</a> 
        <a href="<?php echo "./$requested_file";?>?theme=pager_on_top">:Pager theme:</a> 
        <a href="<?php echo "./$requested_file";?>?theme=plain">:Fast theme:</a> 
        <a href="<?php echo "./$requested_file";?>?theme=birthday">:Birthday theme:</a>

    <a href="http://validator.w3.org/check/referer"><img
       src="http://www.w3.org/Icons/valid-html401"
       alt="Valid HTML 4.01!" height="31" width="88" border="0" hspace="2" vspace="2" align="middle"></a>
    <a href="http://jigsaw.w3.org/css-validator/"><img
       src="http://jigsaw.w3.org/css-validator/images/vcss" 
       alt="Valid CSS!" border="0" height="31" width="88" hspace="2" vspace="2" align="middle"></a>
    <?php $theme_object->insert_timestamp($requested_file); ?>
    </p>
    
  </body>
</html>
