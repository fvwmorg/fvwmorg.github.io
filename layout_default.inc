<?php
//--------------------------------------------------------------------
//-  File          : layout_default.inc
//-  Project       : FVWM Home page
//-  Date          : Fri Mar 14 21:16:52 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <10.04.2003 08:59:15 uwp>
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

if( strlen($navigation_file) < 1 )
     die("<span class=\"error\">No navigation file specified</span><br>");

include(sec_filename($navigation_file));

function debug($string, $level=1) {
  if($level>0) echo $string."<br>";
}

// override relative path
$rel_path = ${$this_site}["rel_path"];

//--------------------------------------------------------------------
//- variable definitions
//- set defaults. This new version needs to be propagated to all the
//  other layout files.
//--------------------------------------------------------------------
//  Do any sanity checks on any value here...is it ridiculously
//  long, does the directory exist, etc.
//  ...or maybe add a generalized function for doing this?  - RBW

$default_settings_array = array(
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
  //"pager_bg"         => "#b5bebd",
  "pager_fg"         => "#000000",
  "hilight_bg"       => "#1a6e99",
  "hilight_fg"       => "#ffffff",
);

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

function insert_timestamp($file) {
  if( file_exists($file) ) {
    echo 'Last modified at ';
    echo date('F d, Y -- H:i --', fileatime("$file"));
  }
}

function get_parent_path($site) {
  global $$site, $top_array;
  // echo "+++checking $site+++<br>";
  // first we should check if the array is consistent
  if( strlen(${$site}["parent_site"]) < 1 ) {
    // echo "Error in navigation array<br>";
    // the actual site is not in the navigation array 
    // we return the first entry of $top_array here
    return $top_array[0];
  }
  // check if this site is a parent - if not return the parent
  // of its parent;-)
  if( ! strcmp( ${$site}["parent_site"],"top") ) {
    if( ! strcmp($site,$top_array[0]) || count(${$site}["child_sites"]) == 0 )
      return array($site);
    else
      return array($top_array[0],$site);
  } else {
    $parent_path = get_parent_path(${$site}["parent_site"]);
    $parent_path[] = $site;
    return $parent_path;
  }
}

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
  return $target.$opts;
}

function push_decoration_path($path) {
  global $decoration_path_stack, $decoration_path, $rel_path;
  $decoration_path_stack[] = $decoration_path;
  $decoration_path = $rel_path."/".$path;
} 

function pop_decoration_path() {
  global $decoration_path_stack, $decoration_path;
  if( count($decoration_path_stack) == 0 ) return;
  end($decoration_path_stack);
  list($key,$value) = each($decoration_path_stack);
  $decoration_path = $decoration_path_stack[$key];
  unset($decoration_path_stack[$key]);
}

function decoration_pic($direction) {
  global $decoration_path;
  return $decoration_path."/".$direction.".gif";
}

function decoration_cell_start($position, $string, $css, 
			       $bg_repeat="repeat", $bg_pos="top", 
			       $td_options="") {
  global $decoration_path, $this_site, $window_border_bg, $rel_path;

  $def_file = $decoration_path."/deco_definitions.inc";
  if( file_exists($def_file) ) include(sec_filename($def_file)); 
  $dimension = "";
  if( isset($border_width) ) $dimension=$dimension.'width="'.$border_width.'" ';
  if( isset($border_height) ) $dimension=$dimension.'height="'.$border_height.'"';
  $pic=decoration_pic($position);
  echo '<td '.$td_options;
  if( strlen($bg_color) > 0 ) 
    echo ' bgcolor="'.$bg_color.'"';
  else
    echo ' bgcolor="'.$window_border_bg.'"';
  echo ' style="background-image:url('.$pic.');';
  echo 'background-repeat:'.$bg_repeat.';';
  echo 'background-position:'.$bg_pos.';'.$css.'"';
  if( ereg("(left)|(right)","$position") ) echo ' width="1"';
  echo '>'.$string;
  echo '<img src="'.decoration_pic("transparent").'" ';
  echo 'border="0" vspace="0" hspace="0" '.$dimension.' alt="">';
}

function decoration_top_left_cell_start($string="", $css="") {
  decoration_cell_start("top_left",$string,$css,"no-repeat");
}
function decoration_top_left_cell($string="", $css="") {
  decoration_top_left_cell_start($string,$css,"repeat-x","bottom");
  echo  '</td>'."\n";
}

function decoration_top_cell_start($string="", $css="") {
  decoration_cell_start("top",$string,$css,"repeat-x");
}
function decoration_top_cell($string="", $css="") {
  decoration_top_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_top_right_cell_start($string="", $css="") {
  decoration_cell_start("top_right",$string,$css,"no-repeat");
}
function decoration_top_right_cell($string="", $css="") {
  decoration_top_right_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_left_cell_start($string="", $css="") {
  decoration_cell_start("left",$string,$css,"repeat-y","left","align=\"left\"");
}
function decoration_left_cell($string="", $css="") {
  decoration_left_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_middle_cell_start($string="", $css="") {
  decoration_cell_start("middle",$string,$css);
}
function decoration_middle_cell($string="", $css="") {
  decoration_middle_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_right_cell_start($string="", $css="") {
  decoration_cell_start("right",$string,$css,"repeat-y");
}
function decoration_right_cell($string="", $css="") {
  decoration_right_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_bottom_left_cell_start($string="", $css="") {
  decoration_cell_start("bottom_left",$string,$css);
}
function decoration_bottom_left_cell($string="", $css="") {
  decoration_bottom_left_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_bottom_cell_start($string="", $css="") {
  decoration_cell_start("bottom",$string,$css,"repeat-x");
}
function decoration_bottom_cell($string="", $css="") {
  decoration_bottom_cell_start($string,$css);
  echo  '</td>'."\n";
}

function decoration_bottom_right_cell_start($string="", $css="") {
  decoration_cell_start("bottom_right",$string,$css);
}
function decoration_bottom_right_cell($string="", $css="") {
  decoration_bottom_right_cell_start($string,$css);
  echo  '</td>'."\n";
}


function decoration_top_line($string="", $add_css="") {
  echo "<tr>\n";
  decoration_top_left_cell();
  decoration_top_cell($string,$add_css);
  decoration_top_right_cell();
  echo "</tr>\n";  
}

function decoration_middle_line($string="", $add_css="") {
  echo "<tr>\n";
  decoration_left_cell();
  decoration_middle_cell($string,$add_css);
  decoration_right_cell();
  echo "</tr>\n";
}

function decoration_bottom_line($string="", $add_css="") {
  echo "<tr>\n";
  decoration_bottom_left_cell();
  decoration_bottom_cell($string,$add_css);
  decoration_bottom_right_cell();
  echo "</tr>\n";
}

function decoration_title_bar($string="") {
  global $decoration_path, $this_site, $window_border_bg, 
         $hilight_fg, $hilight_bg, $no_def_file, $rel_path;

  $def_file = $decoration_path."/deco_definitions.inc";
  if( file_exists($def_file) ) include(sec_filename($def_file)); 
  if( isset($title_height) ) $dimension='width="'.$title_height.'" height="'.$title_height.'"';
  if( file_exists(decoration_pic("button_1"))) {
    echo '<tr>'."\n";
    decoration_left_cell();
    echo '<td>';
    if( strlen($title_background) == 0 ) $title_background=$hilight_bg;
    echo '<table border="0" cellspacing="0" cellpadding="0" summary="" width="100%" bgcolor="'.$title_background.'">'."\n";
    echo '<tr>'."\n";

    echo '<td style="background-image:url('.decoration_pic("button_1").');">';
    echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '<td style="background-image:url('.decoration_pic("button_3").');">';
    echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '<td style="background-image:url('.decoration_pic("title").');font-size:10pt;"';
    echo ' width="99%" bgcolor="'.$title_background.'">';
    if( strlen($string) > 0 )
      echo '<font size="3" color="'.$hilight_fg.'">&nbsp;'.$string.'</font></td>'."\n";
    else
      echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '<td style="background-image:url('.decoration_pic("button_6").');">';
    echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '<td style="background-image:url('.decoration_pic("button_4").');">';
    echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '<td style="background-image:url('.decoration_pic("button_2").');">';
    echo '<img src="'.decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

    echo '</tr>'."\n";
    echo '</table>'."\n";    
    echo '</td>';    
    decoration_right_cell();
    echo '</tr>'."\n";
  }
}

function decoration_window_start($string="",$width="100%",$height="800",$padding="5") {
  global $window_bg;
  echo '<table';
  if(strlen($width)> 0) echo ' width="'.$width.'"';
  echo ' border="0" cellpadding="0" cellspacing="0" summary="" class="decorated">'."\n";
  decoration_top_line();
  decoration_title_bar($string);
  echo '<tr>'."\n";
  decoration_left_cell();
  echo '<td bgcolor="'.$window_bg.'">';
  echo '<table';
  if(strlen($padding)> 0) echo ' cellpadding="'.$padding.'"';
  echo ' summary="" width="100%">'."\n";
  echo '<tr>'."\n";
  echo '<td valign="top" align="left"';
  if(strlen($height)> 0) echo ' height="'.$height.'"';
  echo ' class="windowcontents">';
}

function decoration_window_end() {
  echo '</td>'."\n";
  echo '</tr>'."\n";
  echo '</table>'."\n";
  echo '</td>'."\n";
  decoration_right_cell();
  echo '</tr>'."\n";
  decoration_bottom_line();
  echo '</table>'."\n";
}

function insert_menu_link_line($site,$depth,$selected_path) {
     
  global $this_site, $rel_path, $top_array, $hilight_bg;
  global $hilight_fg, $menu_fg, $menu_bg;
  global $$this_site;

  if( strlen(${$site}["file"]) == 0 ) global $$site;

  if( !strcmp($site,$this_site) ) {
    $bg = $hilight_bg;
    $fg = $hilight_fg;
    $triangle = $rel_path.'/pictures/fvwm_menu_triangle.gif';
  } else {
    $bg = $menu_bg;
    $fg = $menu_fg;
    $triangle = $rel_path.'/pictures/fvwm_menu_triangle.gif';
  }

  $target = conv_link_target($rel_path.'/'.${$site}["file"]);
  $td_opt = 'valign="middle" nowrap="nowrap" bgcolor="'.$bg.'" style="background-color:'.$bg.';"';
  $td = '<td '.$td_opt.'>';

  echo '<tr>'."\n";

  $max_depth = count($selected_path);
  if( count(${$this_site}["child_sites"]) == 0 ) $max_depth--;

  // echo $td.$depth." ".$max_depth."</td>";

  for( $ii=0; $ii<($depth); $ii++ ) {
    echo $td."&nbsp;";
    // echo '<img src="'.$rel_path.'/pictures/icons/';
    // if( $ii < ($depth-1) ) echo 'in';
    // echo 'direct_subitem_mini.gif" border="0" alt="" hspace="0" vspace="0">';
    echo "</td>";
  }

  // mini icon
  echo $td;
  echo '<a href="'.$target.'">';
  echo '<img src="'.$rel_path.'/'.${$site}["link_pic"];
  echo '_mini.gif" border="0" alt="" hspace="0" vspace="0"></a>';
  echo '</td>'."\n";

  // text
  echo '<td '.$td_opt.' colspan="'.($max_depth-$depth+1).'">';
  echo '<a href="'.$target.'">';
  echo '<font size="+0" color="'.$fg.'"><b>';
  echo ${$site}["link_name"].'</b></font></a></td>'."\n";

  // triangle
  echo $td.'<a href="'.$target.'">';
  echo '<img src="'.$triangle.'" border="0" hspace="2" vspace="2" alt=""></a></td>'."\n";

  // decoration_right_cell();
  echo '</tr>'."\n";
}

function insert_menu_link_list($link_array, $depth, $selected_path) {
  //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
  while( list($key,$site) = each($link_array) ) {
    // echo "$site<br>";
    if( ! isset(${$site}) ) global $$site;
    if( ! isset(${$site}) ) {
      // the navigation structure seems to be invalid
      echo "Problem with $site<br>";
    } else {
      // insert this 
      insert_menu_link_line($site, $depth, $selected_path);
      if( count(${$site}["child_sites"])> 0 && ! strcmp($site,$selected_path[$depth]) ) {
	insert_menu_link_list(${$site}["child_sites"], $depth+1, $selected_path);
      }
    }
  }
}

function insert_menu_navigation() {
  global $this_site, $top_array, $rel_path, $hilight_bg, $hilight_fg, $menu_fg, $menu_bg;
  global $$this_site;

  push_decoration_path("pictures/decorations/border_grey_flat");
  echo '<table border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
  decoration_top_line();
  echo "<tr>\n";
  decoration_left_cell();
  echo "<td>";
  echo '<table bgcolor="'.$menu_bg.'" cellpadding="3" cellspacing="0" border="0" summary="">'."\n";
  insert_menu_link_list($top_array, 0, get_parent_path($this_site));
  echo '</table>';
  echo "</td>\n";
  decoration_right_cell();
  echo '</tr>'."\n";
  decoration_bottom_line();
  pop_decoration_path();
  echo '</table>'."\n";
}

function insert_pager_page($site,$do_hilight=1) {

  global $this_site, $rel_path, $top_array, $hilight_bg;
  global $hilight_fg, $pager_fg, $pager_bg;

  if( !strcmp($site,$this_site) && $do_hilight ) {
    $bg = $hilight_bg;
    $fg = $hilight_fg;
  } else {
    $bg = $pager_bg;
    $fg = $pager_fg;
  }
  $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" style="background-color:'.$bg.';"';

  if( strlen($site) == 0 ) {
    echo '<td '.$td_opt.'>';
    echo '<img src="'.$rel_path.'/pictures/icons/pager_empty.gif"';
    echo ' border="0" alt="" hspace="0" vspace="0">';    
    echo '</td>';
    return;
  }

  if( strlen(${$site}["file"]) == 0 ) global $$site;

  $target = conv_link_target($rel_path.'/'.${$site}["file"]);

  if( file_exists($rel_path.'/'.${$site}["link_pic"]."_pager.gif") ) {
    $img = $rel_path.'/'.${$site}["link_pic"]."_pager.gif";
  } else {
    $img = $rel_path.'/pictures/icons/default_pager.gif';
  }

  echo '<td '.$td_opt.'>';
  echo '<a href="'.$target.'">';
  echo '<img src="'.$img.'" border="0" alt="'.${$site}["link_name"].'" ';
  echo 'title="'.${$site}["link_name"].'" hspace="0" vspace="0"></a>';
  echo '</td>'."\n";

}

// make a 2x2 desk containing the sub sites
function insert_pager_desk($site) {
     
  global $this_site, $rel_path, $top_array, $hilight_bg;
  global $hilight_fg, $pager_fg, $pager_bg;
  global $$this_site;

  if( strlen(${$site}["file"]) == 0 ) global $$site;

  $bg = $pager_bg;
  $fg = $pager_fg;
  
  $target = conv_link_target($rel_path.'/'.${$site}["file"]);
  $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" style="background-color:'.$bg.';"';

  // desk label = link name
  echo '<tr>'."\n";
  echo '<td '.$td_opt.' colspan="2">';
  echo '<a href="'.$target.'" style="font-weight:normal; font-family:monospace;">';
  echo '<font size="2" color="'.$fg.'">&nbsp;'.${$site}["link_name"].'&nbsp;</font></a>';
  echo '</td>'."\n";
  echo '</tr>'."\n";

  // page 0 0 - the site itself 
  echo '<tr>'."\n";
  insert_pager_page($site);
  // first subsite
  $child_sites = ${$site}["child_sites"];
  insert_pager_page($child_sites[0]);
  echo '</tr>'."\n";

  echo '<tr>'."\n";
  // second subsite
  insert_pager_page($child_sites[1]);
  // third subsite
  insert_pager_page($child_sites[2]);
  echo '</tr>'."\n";
}

function insert_pager_link_list($link_array) {
  
  $is_first = 1;
  //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
  while( list($key,$site) = each($link_array) ) {
    if( $is_first == 1 ) 
      $is_first = 0; 
    else {
      echo '<tr><td colspan="2">';
      echo '<img src="'.decoration_pic("transparent").'" width="1" height="1" alt="">';
      echo '</td></tr>';
    }
    insert_pager_desk($site);
  }
}

function insert_pager_navigation() {

  global $this_site, $rel_path, $top_array, $hilight_bg;
  global $hilight_fg, $pager_fg, $pager_bg;
  global $$this_site;
  
  $number_of_pages = 4;

  // table for the border
  echo '<table border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
  decoration_top_line();
  echo "<tr>\n";
  decoration_left_cell();
  echo '<td bgcolor="'.$pager_fg.'" width="80">';
  // table for the pages
  echo '<table cellpadding="1" cellspacing="1" border="0" width="100%" summary="">'."\n";
  $parent_path = get_parent_path($this_site);
  $count = count($parent_path);
  $parent_site = ${$this_site}["parent_site"];
  if( strlen(${$parent_site}["file"]) == 0 ) global $$parent_site;

  // check if we are on a top site which has no child sites
  if( $count < 2 || ( ! strcmp(${$parent_site}["parent_site"],"top")  && 
		      count(${$this_site}["child_sites"]) == 0 && 
		      count(${$parent_site}["child_sites"]) <= $number_of_pages - 1 )
                 || ( $count == 2 &&
		      count(${$this_site}["child_sites"]) <= $number_of_pages - 1)) {
    $navigation_array = $top_array;
  } else {
    // merge $parent_path and $actual_sub_sites
    $navigation_array = array();
    reset($parent_path);
    while( list($key,$site) = each($parent_path) ) $navigation_array[] = $site;
    // check if there are further sub sites
    if( count(${$this_site}["child_sites"]) > 0 ) {
      $sub_sites = ${$this_site}["child_sites"];
    } else {
      // if the actual site has not childs use the childs of the 
      // parent as sub sites
      $parent_site = ${$this_site}["parent_site"];
      if( strlen(${$parent_site}["file"]) == 0 ) global $$parent_site;
      $sub_sites = ${$parent_site}["child_sites"];
      // the actual site is in the parent path - since it is a child of 
      // its parent it is remove from the $navigation_array to not appear
      // twice
      end($navigation_array);
      unset($navigation_array[key($navigation_array)]);
    }
    reset($sub_sites);
    while( list($key,$site) = each($sub_sites) ) {
      $navigation_array[] = $site;    
    }
  }
  insert_pager_link_list($navigation_array);
  echo '</table>';  
  echo "</td>\n";
  decoration_right_cell();
  echo '</tr>'."\n";
  decoration_bottom_line();
  echo '</table>'."\n";  
}

function insert_navigation_path_entry($site) {
  global $this_site, $rel_path, $top_array;
  global $windowlist_bg, $windowlist_fg;
  global $$this_site;

  if( strlen(${$site}["file"]) == 0 ) global $$site;
  $target = conv_link_target($rel_path.'/'.${$site}["file"]);

//   echo '<td>';
//   echo '<table border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
//   decoration_top_line();
//   decoration_left_cell();
  echo '<td bgcolor="'.$windowlist_bg.'">';
  echo '<a href="'.$target.'">';
  echo '<font size="2" color="'.$windowlist_fg.'">';
  echo ${$site}["link_name"];
  echo '</font>';
  echo '</a>';
  echo '</td>'."\n";
//   decoration_right_cell();
//   decoration_bottom_line();
//   echo '</table>';  
//   echo '</td>';  
}

function insert_navigation_path() {
  global $this_site, $rel_path, $top_array, $hilight_bg;
  global $hilight_fg, $pager_fg, $pager_bg;
  global $$this_site;

  if( ! strcmp($top_array[0],$this_site) ) return;

//   push_decoration_path("decorations/border_grey_flat");
// 
//   echo '<table border="1" cellspacing="0" cellpadding="3" frame="void" summary="">'."\n";
//   echo "<tr>\n";
  $parent_path = get_parent_path($this_site);
//   insert_navigation_path_entry($top_array[0]);
  reset($parent_path);
  while(list($key,$site) = each($parent_path) ) {
    echo " &gt;&gt; ".$site;
    // insert_navigation_path_entry($site);
  }
//   echo '</tr>';
//   echo '</table>';
//   pop_decoration_path();
  
}

function insert_quick_jump_list($site_array,$col_num=2) {
  global $rel_path;

  // check which sites exist
  reset($site_array);
  while(list($key,$site) = each($site_array) ) {
    global $$site; 
    // check it this site exists
    if( strlen(${$site}["file"]) == 0 ) {
      // if the site does not exists remove from quick jump list
      unset($site_array[$key]);
    }
  }

  $count = count($site_array);
  reset($site_array);
  echo '<table width="70%" border="0" cellpadding="5" cellspacing="0" summary="">'."\n";
  
  for($ii=0;$ii<ceil($count/$col_num);$ii++) {
    echo "<tr>\n";
    for($jj=0; $jj<$col_num; $jj++) {
      if( list($key,$site) = each($site_array) ) {
	if( file_exists($rel_path.'/'.${$site}["link_pic"]."_mini.gif") ) {
	  $img = $rel_path.'/'.${$site}["link_pic"]."_mini.gif";
	} else {
	  $img = $rel_path.'/pictures/icons/default_mini.gif';
	}
	$target = conv_link_target($rel_path.'/'.${$site}["file"]);
	// mini icon and text 
	echo '<td align="left" valign="bottom" nowrap="nowrap">';
	echo '<a href="'.$target.'">';
	echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
	echo ${$site}["link_name"];
	echo '</a>';
	echo '</td>'."\n";
      }
    }
    echo "</tr>\n";    
  }
  echo "</table>\n";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

  <head>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="generator" content="by hand with a little help of bluefish and xemacs">
    <meta name="keywords" content="fvwm, window manager, screenshots, themes">
    <meta name="description" content="The Official FVWM Home Page">

<!--
    <meta http-equiv="content-language" content="de">
    <meta name="robots" content="index">
    <meta name="robots" content="follow">
-->

    <link rel="shortcut icon" href="fvwm.ico">

    <title><?php print $title; ?></title>

    <style type="text/css">
      <!--
       body {
	 background-color:<?php echo $body_bg;?>;
	 <?php 
          if(strlen($body_bg_image)>0) 
	   echo 'background-image:url("'.$body_bg_image.'");';
	 ?>
	 color:<?php echo $body_fg;?>;
	 margin:0pt;
	 padding:0pt;
       }
       p {
         text-align:left; 
       }
       .intern { 
         color: #ffffff; 
       }
       .windowcontents {
	 padding-left:5%;
	 padding-right:5%;
       }
       a:link,a:visited,a:active,a:hover {
	 text-decoration:none;
	 font-weight:bold;
       }
       h2, h3, h4, h5 { 
       color:#2bbbff;
       }
       h4.author {
	 margin-top:15pt;
	 margin-bottom:5pt;
         padding:0pt;
       }
       p.author {
	 padding-left:20pt;
	 margin:0pt;
       }
       table.screenshots { 
       border-color:#aaaa00;
       }
       h2.cats { 
       text-decoration:underline;
       font-size:xx-large; 
       color:#ffff33;
       }
       h3.cats { 
       font-size:xx-large; 
       color:#8888ff;
       }
       h4.cats { 
       margin:0pt;
       font-size:x-large; 
       color:#ff3333;
       }
       h5.cats { 
       font-size:large; 
       font-weight:normal;
       color:#ffff99;
       margin:0pt;
       }
       p.cats, h2.cats,  h3.cats, h4.cats, h5.cats, ul.cats { 
       }
       pre.cvs {
       color:#ffff99;
       /* background:#112266; */
       padding:5pt;
       }
       .bottominfo {
	 text-align:right;
	 margin-right:5pt;
	 font-weight:normal;
       }
       a.done {
	color:#bbbbbb;
	text-decoration:line-through;
	font-weight:normal;
       }
        -->
    </style>

  </head>

  <body bgcolor="<?php echo $body_bg;?>" 
        text="<?php echo $body_fg;?>" 
        <?php 
          if(strlen($body_bg_image)>0) echo 'background="'.$body_bg_image.'"';
        ?>
        link="#ffff44" 
	vlink="#ffff00" 
	alink="#ffff99">

    <a name="top"></a>
    <table width="100%" border="0" cellpadding="0" cellspacing="2" summary="">
       
       <tr> 
        <td valign="top">
         <table width="100%" border="0" cellpadding="0" cellspacing="10" summary="">

           <tr>
             <td align="center" valign="bottom">
	        <?php if( strlen($heading) == 0 ) $heading = $title; ?>
	        <h1><?php echo $heading;?></h1>
	     </td>
           </tr>

           <tr>
            <td valign="top"><?php include(sec_filename($requested_file));?></td>
          </tr>
	   
        </table>
       </td>
       <td valign="top" align="right" width="1"><?php 
            push_decoration_path("pictures/decorations/window_deco_ice");
	    insert_pager_navigation();
            pop_decoration_path();
            // Add links to html and css checkers - hide them for the checker sites 
            // since they seem not to be html-conform.
            // echo $_SERVER["REMOTE_ADDR"]." ".$_SERVER["REMOTE_HOST"]."<br>\n";
            if( ! ereg("^212.219",$_SERVER["REMOTE_ADDR"]) && 
		! ereg("mirror.ac.uk", $_SERVER["REMOTE_HOST"]) && 
		! ereg("validator", $_SERVER["REMOTE_HOST"]) && 
		! ereg("nordstrom.hrz.tu-chemnitz.de", $_SERVER["REMOTE_HOST"])) {
	      echo '<a href="http://www.mirror.ac.uk/services/validator/check?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&ss=" target="validation">html check&nbsp;</a><br>'."\n";
	      echo '<a href="http://jigsaw.w3.org/css-validator/validator?uri='.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'&warning=1&profile=css2" target="validation">css check&nbsp;</a><br>'."\n";
	    }
       ?><a href="http://validator.w3.org/check/referer">w3c check&nbsp;</a><br></td>
      </tr>

    </table>

    <p class="bottominfo">
       <?php insert_timestamp($requested_file); ?>
       <!-- we may place a "contact" statement here -->
       <!-- &nbsp;&nbsp;&lt;<a href="mailto:fvwm-workers@fvwm-org">Fvwm Workers</a>&gt; -->
    </p>

  </body>
</html>
