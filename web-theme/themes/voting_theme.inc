<?php
//--------------------------------------------------------------------
//-  File          : plain_theme.inc
//-  Project       : Fvwm Home page
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
require_once(class_file("plain_class.inc"));

// create a object of the theme class
$theme_object = new Plain_Theme();

// include function wrappers
include_once(helper_file("members2globals.inc"));

// correct heading
if( strlen($heading) == 0 ) $heading = $title;
?>

<?php
if( $_GET["window_bg"] ) {
    $bg_color = $_GET["window_bg"];
} else {
    $bg_color = "#305050";
}
if( $_GET["window_fg"] ) {
    $fg_color = $_GET["window_fg"];
} else {
    $fg_color = "#e0e0e0";
}
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
    
  <body 
    text="<?php echo $fg_color;?>"
    bgcolor="<?php echo $bg_color;?>"
    link="#e0e050"
    alink="#e05050"
    vlink="#e05050"
    >

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <h1><a href="http://www.fvwm.org">FVWM</a> - Logo Competition - Voting Page</h1>

    <?php 
    
    if( preg_match('/www.fvwm.org/', $_SERVER["HTTP_HOST"])) {
        echo '
<h1>Voting is not possible at www.fvwm.org</h1>
<h2>Please vote at <a href="http://www.tu-chemnitz.de/~uwp/fvwm-web/logo-competition/logos/voting">http://www.tu-chemnitz.de/~uwp/fvwm-web/logo-competition/logos/voting</a></h2>
';
    } else {
        include(sec_filename($requested_file)); 
    }

   ?>

    <hr>

    <p>
    Back to <a href="http://www.fvwm.org">www.fvwm.org</a>
    </p>

    <!-- bottom of the page - display last modified information -->
    <p style="text-align:right; font-size:xx-small; font-style:italic;">
       <?php $theme_object->insert_timestamp($requested_file); ?>
    </p>

  </body>
</html>
