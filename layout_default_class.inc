<?php
//--------------------------------------------------------------------
//-  File          : layout_default_class.inc
//-  Project       : Fvwm Home page
//-  Date          : Sat Apr 19 15:21:26 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

// read base class declaration
include(sec_filename($rel_path."/class_layout_base.inc"));

class Layout_Default extends Layout_Base {
  function conv_link_target($target) {
    global $layout;
    if( $layout ) return $target."?layout=".$layout;
    else return $target;
  }
}

// create a object of the layout class
$layout_object = new Layout_Default();

// include function wrappers
include(sec_filename($rel_path."/interface_definitions.inc"));
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
  body {
    background-color: <?php echo $layout_object->properties_array["body_bg"];?>;
    background-image: url("<?php echo $layout_object->properties_array['body_bg_image'];?>");
    color: <?php echo $layout_object->properties_array["body_fg"];?>;
  -->
  </style>
</head>

<body 
    bgcolor="<?php echo $layout_object->properties_array['body_bg'];?>"
    <?php 
    if (strlen($layout_object->properties_array['body_bg_image']) > 0) 
       echo 'background="'.$layout_object->properties_array['body_bg_image'].'"'; 
    ?>
    text="<?php echo $layout_object->properties_array['body_fg']; ?>"
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
<td align="center" valign="bottom">
<?php if (strlen($heading) == 0) $heading = $title; ?>
  <h1><?php echo $heading; ?></h1>
</td>
</tr>
<tr>
<td valign="top"><?php include(sec_filename($requested_file)); ?></td>
</tr>
</table>
</td>

<!-- second cell of the outer wrapper table which contains the pager -->
<td valign="top" align="right"><?php
    $layout_object->push_decoration_path("pictures/decorations/window_deco_ice");
    $layout_object->insert_pager_navigation();
    $layout_object->pop_decoration_path();
  // Add links to html and css checkers - hide them for the checker sites
  // since they seem not to be html-conform.
  // echo $_SERVER["REMOTE_ADDR"]." ".$_SERVER["REMOTE_HOST"]."<br>\n";
  if (my_get_global("checks", "GET")) {
    echo '<a href="http://www.mirror.ac.uk/services/validator/check?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&ss=" target="validation">html check&nbsp; </a><br>'."\n";
    echo '<a href="http://jigsaw.w3.org/css-validator/validator?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&warning=1&profile=css2" target="validation">css check&nbsp; </a><br>'."\n";
    echo '<a href="http://validator.w3.org/check/referer">w3c check&nbsp; </a>';
  }
?></td>

</tr>
</table>

<!-- bottom of the page - display last modified information -->
<p class="bottominfo"><?php $layout_object->insert_timestamp($requested_file); ?></p>

</body>
</html>
