<?php
//--------------------------------------------------------------------
//-  File          : layout_fast.inc
//-  Project       : FVWM Home page
//-  Date          : Fri Mar 14 21:16:52 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// This is a layout defintion file for a web page project.
// This file contains php function definitions which can be 
// used in the php files and it provides the html frame work 
// in which the php file is included
// 
// Some comments on the concept of this php framework: In same
// directory as this file a php file called navgen.php should
// exist. This file can be ran though the php command line
// interface. navgen looks recursively for all *.php files and
// creates an array stucture which describes the sturcture of the php
// files belonging to this web page project. The array structure is
// written usally to the file navgen_write/navigation.inc
//     If a php page is requested some definitions are made in the
// header of this file like $title, $header and after this file is
// included which describes the layout of the page. In this file the
// php file is include again and processed to the end.
//--------------------------------------------------------------------

// exit here in case of a navgen run
if( strlen("$navigation_check") > 0 ) return;

// $navigation_file should be definined in definitions.inc which 
// is included in the php file
if( strlen($navigation_file) < 1 )
     die("<span class=\"error\">No navigation file specified</span><br>");

// include navigation definition
include(sec_filename($navigation_file));

function debug($string, $level=1) {
  if($level>0) echo $string."<br>";
}

// set relative path which is defined in the php files
if( ! isset($rel_path) ) $rel_path = $nav_array["$this_site"]["rel_path"];

//--------------------------------------------------------------------
//- variable definitions
//- set defaults. This new version needs to be propagated to all the
//  other layout files.
//--------------------------------------------------------------------
//  Do any sanity checks on any value here...is it ridiculously
//  long, does the directory exist, etc.
//  ...or maybe add a generalized function for doing this?  - RBW

$default_settings_array = array(
  "layout"           => "",				
  "decoration_path"  => $rel_path."/pictures/decorations/window_deco_simple_blue",
  "window_border_bg" => "#c5cecd",
  "window_border_fg" => "#ffffff",
  "window_bg"        => "#000000",
  "window_fg"        => "#ffffff",
  "body_bg"          => "#000000",
  "body_fg"          => "#ffffff",
  "body_bg_image"    => $rel_path."/pictures/backgrounds/default.jpg",
  "menu_bg"          => "#c5cecd",
  "menu_fg"          => "#000000",
  "windowlist_bg"    => "#c5cecd",
  "windowlist_fg"    => "#000000",
  "pager_bg"         => "#fafae8",
  "pager_fg"         => "#000000",
  "hilight_bg"       => "#1a6e99",
  "hilight_fg"       => "#ffffff",
);

// make the global variables from the keys of the
// $default_settings_array
// if some variables are given from the user override the default
// settings and store them in an array $user_settings_array so that
// this settings can be passed to sub pages
$user_settings_array = array();
reset($default_settings_array);
while(list($key,$default) = each($default_settings_array) ) {
  if( $$key = my_get_global($key, "GET") ) {
    $user_settings_array[$key] = str_replace("#","%23",$$key); 
  } else {
    $$key = $default;
  }
}

// $body_bg_image = $rel_path."/".$body_bg_image;
$decoration_path_stack = array();

// time stampt function to insert a statement on the site when the
// viewing pages was changed
function insert_timestamp($file) {
  if( file_exists($file) ) {
    echo 'Last modified on ';
    echo date('F d, Y -- H:i --', fileatime("$file"));
  }
}

// function returns an array which contains the names of pages which
// are parents from the current pages like
// home -> photos -> holiday -> beach
// it is mostly used to display this path as links 
function get_parent_path($site) {
  global $nav_array, $top_array;
  // echo "+++checking $site+++<br>";
  // first we should check if the array is consistent
  if( strlen($nav_array["$site"]["parent_site"]) < 1 ) {
    // echo "Error in navigation array<br>";
    // the actual site is not in the navigation array 
    // we return the first entry of $top_array here
    return $top_array[0];
  }
  // check if this site is a parent - if not return the parent
  // of its parent;-)
  if( ! strcmp( $nav_array["$site"]["parent_site"],"top") ) {
    if( ! strcmp($site,$top_array[0]) )
      return array($site);
    else
      return array($top_array[0],$site);
  } else {
    $parent_path = get_parent_path($nav_array["$site"]["parent_site"]);
    $parent_path[] = $site;
    return $parent_path;
  }
}

// this function is used to have all link targets in the same format
// and do some conversions here. for exampe one may convert php to
// html here to get a html tree of this web project
function conv_link_target($target) {
  global $user_settings_array;
  if( count($user_settings_array) > 0 ) {
    reset($user_settings_array);
    list($key,$setting) = each($user_settings_array);
    $opts = "?".$key."=".$setting;  
    while( list($key,$setting) = each($user_settings_array) ) {
      $opts = $opts."&".$key."=".$setting;
    }
  }
  $target = str_replace("index.php", "", $target);
  return $target.$opts;
}

// pushes the actual decoration path to a stack and set the given
// argument as decoration path. this function is used to have
// different window decorations on the same page
function push_decoration_path($path) {
  global $decoration_path_stack, $decoration_path, $rel_path;
  $decoration_path_stack[] = $decoration_path;
  $decoration_path = $rel_path."/".$path;
} 

// pops the last value from the stack and sets it to the actual
// decoration path. this function is used to have different window
// decorations on the same page
function pop_decoration_path() {
  global $decoration_path_stack, $decoration_path;
  if( count($decoration_path_stack) == 0 ) return;
  end($decoration_path_stack);
  list($key,$value) = each($decoration_path_stack);
  $decoration_path = $decoration_path_stack[$key];
  unset($decoration_path_stack[$key]);
}

// inserts a decoration picture
function decoration_pic($direction) {
}

// starts a decoration cell which contains a decoration picture
// like <td><img src="picture">
// not the cell is opend only and not closed
function decoration_cell_start($position, $string, $css, 
			       $bg_repeat="repeat", $bg_pos="top", 
			       $td_options="") {
}

//--------------------------------------------------------------------
// the next functions provide start and complete decoration cell
// interfaces.
//--------------------------------------------------------------------
function decoration_top_left_cell_start($string="", $css="") {
}
function decoration_top_left_cell($string="", $css="") {
}

function decoration_top_cell_start($string="", $css="") {
}
function decoration_top_cell($string="", $css="") {
}

function decoration_top_right_cell_start($string="", $css="") {
  decoration_cell_start("top_right",$string,$css,"no-repeat");
}
function decoration_top_right_cell($string="", $css="") {
}

function decoration_left_cell_start($string="", $css="") {
}
function decoration_left_cell($string="", $css="") {
}

function decoration_middle_cell_start($string="", $css="") {
}
function decoration_middle_cell($string="", $css="") {
}

function decoration_right_cell_start($string="", $css="") {
}
function decoration_right_cell($string="", $css="") {
}

function decoration_bottom_left_cell_start($string="", $css="") {
}
function decoration_bottom_left_cell($string="", $css="") {
}

function decoration_bottom_cell_start($string="", $css="") {
}
function decoration_bottom_cell($string="", $css="") {
}

function decoration_bottom_right_cell_start($string="", $css="") {
}
function decoration_bottom_right_cell($string="", $css="") {
}

// inserts a whole decoration line which contains a table row which 3
// cells each of them with one picture
function decoration_top_line($string="", $add_css="") {
}

// inserts a whole decoration line which contains a table row which 3
// cells each of them with one picture
function decoration_middle_line($string="", $add_css="") {
}

// inserts a whole decoration line which contains a table row which 3
// cells each of them with one picture
function decoration_bottom_line($string="", $add_css="") {
}

// inserts a table row <tr> ... </tr> which contains the window
// buttons like the window decoration of a window manager
function decoration_title_bar($string="") {
}

// inserts the upper and left corner of the window decoration
function decoration_window_start($string="",$width="100%",$height="400",$padding="5") {
	echo "<h3>$string</h3>";
}

// insert the right and lower corner of the window decoration
function decoration_window_end() {
}


//--------------------------------------------------------------------
// interface function to insert valid links to sub pages
//--------------------------------------------------------------------
function insert_quick_jump_list(
  $site_array, $outside_link_array = array(), $col_num = 2, $width = "50%")
{
  global $rel_path, $nav_array;

  // check which sites exist
  reset($site_array);
  while(list($key,$site) = each($site_array) ) {
    // check it this site exists
    if( strlen($nav_array["$site"]["file"]) == 0 ) {
      // if the site does not exists remove from quick jump list
      unset($site_array[$key]);
    }
  }

  reset($site_array);
  reset($outside_link_array);
  echo '<table align="center" ';
  if (strlen($width) > 0) echo "width=\"$width\" ";
  echo 'border="0" cellpadding="5" cellspacing="0" summary="">'."\n";
  $count = count($site_array) + count($outside_link_array);
  for($ii=0;$ii<ceil($count/$col_num);$ii++) {
    echo "<tr>\n";
    for($jj=0; $jj<$col_num; $jj++) {
      if( list($key,$site) = each($site_array) ) {
	if( file_exists($rel_path.'/'.$nav_array["$site"]["link_pic"]."_mini.gif") ) {
	  $img = $rel_path.'/'.$nav_array["$site"]["link_pic"]."_mini.gif";
	} else {
	  $img = $rel_path.'/pictures/icons/default_mini.gif';
	}
	$target = conv_link_target($rel_path.'/'.$nav_array["$site"]["file"]);
	// mini icon and text 
	echo '<td align="left" valign="bottom" nowrap="nowrap">';
	echo '<a href="'.$target.'">';
	//echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
	echo $nav_array["$site"]["link_name"];
	echo '</a>';
	echo '</td>'."\n";
      } 
      // links outside of this domain
      elseif ( list($key,$array) = each($outside_link_array) ) {
	if( file_exists($rel_path.'/pictures/icons/'.$array[2]."_mini.gif") ) {
	  $img = $rel_path.'/pictures/icons/'.$array[2]."_mini.gif";
	} else {
	  $img = $rel_path.'/pictures/icons/default_mini.gif';
	}
	// mini icon and text 
	echo '<td align="left" valign="bottom" nowrap="nowrap">';
	echo '<a href="'.$array[1].'">';
	//echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
	echo $array[0];
	echo '</a>';
	echo '</td>'."\n";	
      }
    }
    echo "</tr>\n";    
  }
  echo "</table>\n";
}

function insert_parent_path() {
  global $this_site, $rel_path, $top_array ;
  global $nav_array;

  if( ! strcmp($top_array[0],$this_site) ) return;

  $parent_path = get_parent_path($this_site);

  reset($parent_path);
  while(list($key,$site) = each($parent_path) ) {
    $target = conv_link_target($rel_path."/".$nav_array["$site"]["file"]);
    echo ' ::<a href="'.$target.'">'.$nav_array["$site"]["link_name"].'</a>:: '."\n";
  }
  echo '<br>';
}

//--------------------------------------------------------------------
// set heading variable
//--------------------------------------------------------------------
if( strlen($heading) == 0 ) $heading = $title;

//--------------------------------------------------------------------
//--------------------------------------------------------------------
//--
//-- End of function definitions - start of html frame  
//--
//--------------------------------------------------------------------
//--------------------------------------------------------------------

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

  <head>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="generator" content="by hand with a little help of bluefish and xemacs">
    <meta name="keywords" content="fvwm, window manager, screenshots, themes">
    <meta name="description" content="The Official FVWM Home Page">

    <link rel="shortcut icon" href="<?php echo $rel_path;?>/fvwm.ico">
    <!--  default style sheet defintions for this page -->
    <style type="text/css">
      <!--
       a.done {
       text-decoration:line-through;
       font-weight:normal;
       color:#aaaaaa;
       }
        -->
    </style>

    <title><?php print $title; ?></title>

  </head>

  <body>

    <!-- make a local link target here so we can jump to the top of this site -->
    <a name="top"></a>

    <h1><?php echo $heading;?></h1>

    <?php 
    insert_parent_path();

    include(sec_filename($requested_file));

    // Add links to html and css checkers - hide them for the checker sites 
    // since they seem not to be html-conform.
    // echo $_SERVER["REMOTE_ADDR"]." ".$_SERVER["REMOTE_HOST"]."<br>\n";
    if( my_get_global("checks","GET") ) {
      echo '<a href="http://www.mirror.ac.uk/services/validator/check?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&ss=" target="validation">html check&nbsp;</a><br>'."\n";
      echo '<a href="http://jigsaw.w3.org/css-validator/validator?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&warning=1&profile=css2" target="validation">css check&nbsp;</a><br>'."\n";
      echo '<a href="http://validator.w3.org/check/referer">w3c check&nbsp;</a>';
    }
    ?>
    <hr>
    <p>Switch to <a href="<?php echo "./$requested_file";?>?layout=default">window layout</a>.</p>
    <!-- bottom of the page - display last modified information -->
    <p style="text-align:right; font-size:xx-small; font-style:italic;">
       <?php insert_timestamp($requested_file); ?>
       <!-- we may place a "contact" statement here -->
       <!-- &nbsp;&nbsp;&lt;<a href="mailto:fvwm-workers@fvwm-org">Fvwm Workers</a>&gt; -->
    </p>

  </body>
</html>
