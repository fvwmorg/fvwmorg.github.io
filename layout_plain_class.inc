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

class Layout_Plain extends Layout_Base {
  function get_parent_path($site) {
    // first we should check if the array is consistent
    if( strlen($this->nav_array["$site"]["parent_site"]) < 1 ) {
      // the actual site is not in the navigation array
      // we return the first entry of $this->nav_array["top_array"] here
      return array($this->nav_array["top_array"][0]);
    }
    // check if this site is a parent - if not return the parent
    // of its parent; -)
    if( ! strcmp( $this->nav_array["$site"]["parent_site"], "top") ) {
      return array($site);
    } else {
      $parent_path = $this->get_parent_path($this->nav_array["$site"]["parent_site"]);
      $parent_path[] = $site;
      return $parent_path;
    }
  }

  function insert_navigation() {
    $parent_path = $this->get_parent_path($this->this_site);
    $array_array = array($this->nav_array["top_array"]);
    for($ii=0; $ii<count($parent_path); $ii++) {
      if( count($this->nav_array[$parent_path[$ii]]["child_sites"]) > 0 )
	$array_array[] = $this->nav_array[$parent_path[$ii]]["child_sites"];
    }

    foreach( $array_array as $link_array ) {
      foreach( $link_array as $site ) {
	$target = $this->conv_link_target($this->rel_path."/".$this->nav_array["$site"]["file"]);
	echo ' :';
	if( strcmp($site, $this->this_site)) 
	  echo '<a href="'.$target.'">';
	else
	  echo '<b>';
	echo $this->nav_array["$site"]["link_name"];
	if( strcmp($site, $this->this_site)) 
	  echo '</a>';
	else
	  echo '</b>';
	echo ":&nbsp; \n";      
      }
      echo "<hr>\n";
    }
  }

  function decoration_window_start($string="", $width="", $height="", $padding="") {}

  function decoration_window_end() {}

  function insert_quick_jump_list($quick_jump_array, $col_num = 2, $width = "60%")
    {
      // check which sites exist
      reset($quick_jump_array);
      while(list($key, $jump) = each($quick_jump_array) ) {
	if( ! is_array($jump) ) {
	  // check it this site exists
	  if( strlen($this->nav_array["$jump"]["file"]) == 0 ) {
	    // if the site does not exists remove from quick jump list
	    unset($quick_jump_array[$key]);
	  }
	}
      }
      
      $cell_width = floor(100/$col_num);

      reset($quick_jump_array);
      $count = count($quick_jump_array);
      echo '<table align="center" ';
      //echo '<table ';
      if (strlen($width) > 0) echo 'width="'.$width.'" ';
      echo 'border="0" cellpadding="5" cellspacing="0" summary="" style="padding-left:10%;">'."\n";
      for($ii=0; $ii<ceil($count/$col_num); $ii++) {
	echo "<tr>\n";
	for($jj=0; $jj<$col_num; $jj++) {
	  if( list($key, $jump) = each($quick_jump_array) ) {
	    if( ! is_array($jump) ) {
	      $target = conv_link_target($this->rel_path.'/'.$this->nav_array["$jump"]["file"]);
	      // mini icon and text
	      echo '<td align="left" valign="bottom" nowrap="nowrap" width="'.$cell_width.'%">';
	      echo '<a href="'.$target.'">';
	      //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
	      echo str_replace(" ", "&nbsp;", $this->nav_array["$jump"]["link_name"]);
	      echo '</a>';
	      echo '</td>'."\n";
	    }
	    // links outside of this domain
	    else {
	      // mini icon and text
	      echo '<td align="left" valign="bottom" nowrap="nowrap">';
	      echo '<a href="'.$jump[1].'">';
	      //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
	      echo str_replace(" ", "&nbsp;", $jump[0]);
	      echo '</a>';
	      echo '</td>'."\n";
	    }
	  }
	}
	echo "</tr>\n";
      }
      echo "</table>\n";
    }


  function conv_link_target($target) {
    global $layout;
    if( $layout ) return $target."?layout=".$layout;
    else return $target;
  }
}

// create a object of the layout class
$layout_object = new Layout_Plain();

// include function wrappers
include(sec_filename($rel_path."/interface_definitions.inc"));

if( strlen($heading) == 0 ) $heading = $title;
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

  <body>

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <h1><?php echo $heading;?></h1>

    <hr>
    <?php $layout_object->insert_navigation(); ?>
    <?php include(sec_filename($requested_file)); ?>
    <hr>

    <p>
    Switch to <a href="<?php echo "./$requested_file";?>?layout=default_class">window layout</a>.
    </p>
    <!-- bottom of the page - display last modified information -->
    <p style="text-align:right; font-size:xx-small; font-style:italic;">
       <?php $layout_object->insert_timestamp($requested_file); ?>
       <!-- we may place a "contact" statement here -->
       <!-- &nbsp;&nbsp;&lt;<a href="mailto:fvwm-workers@fvwm.org">FVWM Workers</a>&gt; -->
    </p>

  </body>
</html>
