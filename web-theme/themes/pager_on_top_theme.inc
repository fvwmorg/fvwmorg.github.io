<?php
//--------------------------------------------------------------------
//-  File          : pager_on_top_theme.inc
//-  Project       : Fvwm Home page
//-  Date          : Sat Apr 19 15:21:26 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("pager_on_top_class.inc"));

// create a object of the theme class
$theme_object = new Pager_On_Top_Theme();

// include function wrappers
include(helper_file("members2globals.inc"));

if (strlen($heading) == 0) $heading = $title;
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

    <style type="text/css">
    <!--  
    <?php $theme_object->insert_css_definitions(); ?>
     a:link, a:visited, a:active, a:hover {
         text-decoration:underline;
         font-weight: bold;
     }
     .historydominik { color:#ffff00;}
     .historychuck   { color:#00ffff;}
     .historyrobert  { color:#ffaaff;}
     -->
    </style>
  </head>

  <body 
    bgcolor="<?php echo $theme_object->style_array['window_bg'];?>"
    text="<?php echo $theme_object->style_array['window_fg']; ?>"
    link="#ffba00"
    vlink="#ff9a00"
    alink="#ff9a00">

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <!-- wrapper table contains two columns  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" summary="">
        <tr>
          <td>
        <?php
	    $theme_object->push_decoration_path("pictures/decorations/window_deco_ice");
	    $theme_object->insert_pager_navigation();
	    $theme_object->pop_decoration_path();
        ?>
          </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
         <td align="center" valign="bottom"><?php $theme_object->insert_heading(); ?></td>
	    </tr>
    </table>

    <?php include(sec_filename($requested_file)); ?>

    <!-- bottom of the page - display last modified information -->
    <p class="bottominfo"><?php $theme_object->insert_timestamp($requested_file); ?></p>
    
  </body>
</html>
