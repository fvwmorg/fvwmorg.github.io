<?php if( strlen("$navigation_check") > 0 ) return; ?>
<html>
  <!--------------------------------------------------------------------- -->
  <!--  File          : navgen.php                                        -->
  <!--  Project       : FVWM Home Page                                    -->
  <!--  Date          : 26.11.2002                                        -->
  <!--  Programmer    : Uwe Pross                                         -->
  <!--------------------------------------------------------------------- -->
  <head>
    <title>PHP NavGen - uwp</title>
    <style type="text/css">
      body {
        background-color: white;
        color: black;
      }
      a:link,a:visited,a:active,a:hover {
        color:#0000aa;
        text-decoration:none;
	font-weight:bold;
      }
      a:hover {
        color:#0000aa;
      }
      .emph, .emph1 {
        color: #0000ff;
        font-weight: bold;
      }
      .warning {
        color: #0000ff;
	background-color: #ffff88;
        font-weight: medium;
	font-style: italic;
      }
      .error {
        color: #ff0000;
	background-color: #ffff88;
	font-size: medium;
        font-weight: bold;
      }
      .emph2 {
        color: #aa0000;
        font-weight: bold;
      }
      blockquote {
        margin-top: 0pt;
        margin-bottom: 0pt;
      }
    </style>
  </head>
<body>

<?php

if( strlen("$navigation_check") > 0 ) return;

include('definitions.inc');

function info_output($sting, $level = 1) {
  global $info_level;
  if( ! isset($info_level) ) $info_level = 0;
  if( $level <= $info_level ) {
    echo $sting;
  }
} 

//--------------------------------------------------------------------
// seach recursively all directories for php files
//--------------------------------------------------------------------
function read_directory($directory_name) {
  global $php_file_array;
  
  if( file_exists($directory_name."/.navgen_ignore") ) {
    info_output("Ignoring directory $directory_name<br>",2);
    return;
  }

  if( ! $directory = @opendir($directory_name) ) {
    info_output("Failed to open directory $directory_name<br>",0);
    return;
  }

  while ($file = readdir($directory)) {
    if( $file != "." and $file != ".." and filetype("$directory_name/$file") == "dir" ) {
      info_output("Changing to dir $directory_name <br>",2);
      read_directory("$directory_name/$file");
   }
    //echo "$directory_name/$file <br>";
    if( ereg(".php$","$file") ) {
      info_output( "Found file <b>$directory_name/$file</b><br>" );
      $php_file_array[] = ereg_replace("^./","","$directory_name/$file");
    }
  }
  closedir($directory);
}

//--------------------------------------------------------------------
// exports the navigation defintion
//--------------------------------------------------------------------
function export_nav($this_site, $export_depth = 1) {
  global $$this_site, $child_array, $child_file_array, $nav_file;

  info_output("Exporting <a href=\"".${$this_site}["url"]."\"><span class=\"emph2\"> $this_site - ".${$this_site}["link_name"]."</span></a><br>", 0);
  info_output("<blockquote>", 0);

  $found_childs = array();

  if( count(${$this_site}["child_sites"]) > 0 ) {

    info_output("Reseting $$this_site <br>",5);
    if( ! reset(${$this_site}["child_sites"]) ) return;

    // go through all childs of this page and find the corresponding php file
    while( list($i1,$searched_child) = each(${$this_site}["child_sites"]) ) {

      $found_php_file_for_this_child = 0;

      info_output("  Searching for <span class=\"emph\">$searched_child</span><br>", 5);

      // go through all php files and check if is describes a child of this parent
      $local_child_file_array = $child_file_array;
      reset($local_child_file_array);
      while( list($i2,$child_file) = each($local_child_file_array) ) {

	info_output("  Checking $child_file for $searched_child <br>",5);

        if( $child_array["$child_file"]["this_site"] == "$searched_child" ) {

	  // check if the child site refers to this parent
	  if( strcmp($child_array["$child_file"]["parent_site"],$this_site) ) {
	    echo '<span class="warning">Child and parent reference do not match. ';
	    echo 'Please check files ';
	    echo $child_array["$child_file"]["file"].' and '.${$this_site}["file"].'<br></span>';
	  }

	  $found_php_file_for_this_child = 1;
	  $this_name = $searched_child;

	  if( ! isset($$this_name) ) global $$this_name;

	  // check if this php-file has been used already
          if( $child_array["$child_file"]["is_exported"] or ${$this_name}["is_exported"] ) {
            // child has been already exported
            echo '<span class="error">Error: ambiguous site definition - ignore file ';
	    echo $child_array["$child_file"]["file"].'</span><br>';
          } else {
	    // add this child to list of found childs
	    $found_childs[] = $searched_child;
            // export this child with sub childs
            $child_array["$child_file"]["is_exported"] = 1;
            // $this_name = $this_site."_".$searched_child;
            // $this_name = $searched_child;
	    // echo "** $this_name $this_site<br>";
            ${$this_name}["file"]        = $child_array["$child_file"]["file"];
            ${$this_name}["url"]         = $child_array["$child_file"]["url"];
            ${$this_name}["rel_path"]    = $child_array["$child_file"]["rel_path"];
            ${$this_name}["link_chapter"]= $child_array["$child_file"]["link_chapter"];
            ${$this_name}["link_name"]   = $child_array["$child_file"]["link_name"];
            ${$this_name}["link_pic"]    = $child_array["$child_file"]["link_pic"];
            ${$this_name}["parent_site"] = $this_site;
            ${$this_name}["child_sites"] = $child_array["$child_file"]["child_sites"];
            export_nav($this_name);
          }
        } else {
	  // file definitions do not match
	  // echo $child_array["$child_file"]["this_site"]." == "."$searched_child AND ";
	  // echo $child_array["$child_file"]["parent_site"]." == "."$this_site";
	  // echo " failed<br>";
	}
      }
      
      if( ! $found_php_file_for_this_child ) {
	// there was no php file found which matches this child
	echo '<span class="error">Could not find a php file which is named &quot;'.$searched_child.'&quot;. ';
	echo 'Please check file &quot;'.${$this_site}["file"].'&quot; and edit the child_array entry.</span><br>';
      }
    }
  }

  if( ${$this_site}["is_exported"] != 1 ) {
    // export information of this file
    fputs($nav_file,"\n");
    fputs($nav_file,'$'.$this_site.'["file"]         = "'.${$this_site}["file"].'";'."\n");
    // fputs($nav_file,'$'.$this_site.'["url"]          = "'.${$this_site}["url"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["rel_path"]     = "'.${$this_site}["rel_path"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["link_name"]    = "'.${$this_site}["link_name"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["link_chapter"] = "'.${$this_site}["link_chapter"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["link_pic"]     = "'.${$this_site}["link_pic"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["parent_site"]  = "'.${$this_site}["parent_site"].'";'."\n");
    fputs($nav_file,'$'.$this_site.'["child_sites"]  = array(');
    reset($found_childs);
    if( count($found_childs) > 0 ) {
      $child_file = "";
      list($index,$child_file) = each($found_childs);
      fputs($nav_file,'"'.$child_file.'"');
      while( list($index,$child_file) = each($found_childs) ) {
	fputs($nav_file,', "'.$child_file.'"');
      }
    }
    fputs($nav_file,");\n");
    ${$this_site}["is_exported"] = 1;
  } else {
    echo "<span class=\"error\">$this_site has been exported already!!</span><br>";
  }

  echo "</blockquote>";
}

//--------------------------------------------------------------------
//- get the relative path to the "root" directory 
//--------------------------------------------------------------------
function get_relative_path($file) {
  $path = dirname($file);
  if( !strcmp($path,".") ) return ".";
  $relative_path = ereg_replace("[^/][^/]*","..",$path);
  $relative_path = "./".ereg_replace("^\./","",$relative_path);
  $relative_path = ereg_replace("/$","",$relative_path);
  return $relative_path;
}

//--------------------------------------------------------------------
// checks if a given element is in a array
//--------------------------------------------------------------------
function is_in_array($my_item, $my_array) {
  reset($my_array);
  while( list($key,$value) = each($my_array) ) {
    if( $my_item == $value ) return 1;
  }
  return 0;
}

//--------------------------------------------------------------------
// puts the top array in the right order
//--------------------------------------------------------------------
function resort_top_array() {
  global $top_array, $navigation_file;

  $new_top_array = $top_array;
  $sorted_array = array();

  $failsave_file = "navgen_write/navgen.lock";

  if( file_exists($failsave_file) ) {
    info_output( "<span class=\"warning\">It seems that the sorting algorithm has failed on last run - ");
    info_output( "skipping it this time - use restart on your browser to run it again</span><br>");
    if( ! @unlink($failsave_file) )
      info_output( "<span class=\"error\">The file $failsave_file which causes to skip the sorting algorithm could not be removed. Please remove this file by hand and restart this script</span><br>");
    return;
  } 

  if( ! @touch($failsave_file) ) 
    info_output( "<span class=\"warning\">The sorting file $failsave_file could not be created. The sorting algorithm may cause to fail this script next time. Please set the right permissions that this file can be created next time.<br></span>");

  if( ! file_exists($navigation_file) ) return;
  
  include("$navigation_file");
  
  if( ! @unlink($failsave_file) ) 
    info_output( "<span class=\"error\">The file $failsave_file which causes to skip the sorting algorithm could not be removeed. Please remove this file by hand and restart this script</span><br>");

  
  reset($top_array);
  info_output( "<hr><h5>Sorting...</h5>");
  while( list($key,$value) = each($top_array) ) {
    info_output( "$pre_value ");
    reset($new_top_array);
    while( list($new_key,$new_value) = each($new_top_array) and
	   strcmp($value,$new_value) ) { 
      info_output( "$new_value ");
    }
    if( ! strcmp($value,$new_value) ) {
      info_output( "<span class=\"emph\">$value</span> ");
      $sorted_array[] = $value;
    }
    info_output( "<br>");
  }
  
  // check if new sites have been added
  reset($new_top_array);
  while( list($new_key,$new_value) = each($new_top_array) ) {
    reset($top_array);
    while( list($key,$value) = each($top_array) and strcmp($value,$new_value) ) {}
    if( strcmp($value,$new_value) ) {
      info_output( "Found new site <span class=\"emph\">$new_value</span><br>");
      $sorted_array[] = $new_value;
    }
  }

  $top_array = $sorted_array;
}

//====================================================================
// php script start
//====================================================================
$php_file_array   = array();
$top_array        = array();
$child_file_array = array();
read_directory(".");

while( list($index,$php_file) = each($php_file_array) ) {

  // init variables
  $title          = "";
  $link_chapter   = "";
  $link_name      = "";
  $link_picture   = "";
  $parent_site    = "";
  $child_sites    = "";
  $this_site      = "";

  // load the file
  $navigation_check = "true";
  info_output( "Loading $php_file ");
  include(sec_filename("$php_file"));

  if( strlen($link_name) and strlen($parent_site) ) {

    if( $this_site == str_replace(".php","",basename(my_get_global("PHP_SELF", "SERVER"))) ) {
      $this_site = basename(str_replace(".php","","$php_file"));
    }
    info_output( "$this_site ");

    // check if this a top site
    if( $parent_site == "top" ) {

      if( ! is_in_array($this_site,$top_array) ) {
        $top_array[]                 = $this_site;
        ${$this_site}["file"]        = $php_file;
        ${$this_site}["url"]         = $php_file;
        ${$this_site}["rel_path"]    = get_relative_path($php_file);
        ${$this_site}["link_name"]   = $link_name;
        ${$this_site}["link_chapter"]= $link_chapter;
        ${$this_site}["link_pic"]    = $link_picture;
        ${$this_site}["parent_site"] = $parent_site;
        ${$this_site}["child_sites"] = $child_sites;
        ${$this_site}["is_exported"] = 0;
        info_output( '<span class="emph1">top</span> <span class="emph2">loaded</span>');
      } else {
        info_output( '<span class="warning">WARNING: '.$this_site.' is defined twice</span> ');
      }
    } else {

        $child_file_array[] = "$php_file";
        $child_array["$php_file"]["file"]        = $php_file;
        $child_array["$php_file"]["url"]         = $php_file;
        $child_array["$php_file"]["rel_path"]    = get_relative_path($php_file);
        $child_array["$php_file"]["this_site"]   = $this_site;
        $child_array["$php_file"]["link_name"]   = $link_name;
        $child_array["$php_file"]["link_chapter"]= $link_chapter;
        $child_array["$php_file"]["link_pic"]    = $link_picture;
        $child_array["$php_file"]["parent_site"] = $parent_site;
        $child_array["$php_file"]["child_sites"] = $child_sites;
        $child_array["$php_file"]["is_exported"]    = 0;
        info_output( '<span class="emph2">loaded</span> ');

    }
  }
  info_output( "<br>");
}

if( strlen($navigation_file) < 1 ) 
     die("<span class=\"error\">No navigation file specified</span><br>");

// check the array if it can be resorted
resort_top_array();

//--------------------------------------------------------------------
//- start from top sites and find its children
//--------------------------------------------------------------------
$nav_file = fopen($navigation_file, "w") or
   die("<span class=\"error\">File $navigation_file could not be opened for writing!!</span>") ;

fputs($nav_file,"<?php\n");
fputs($nav_file,"//=============================================================\n");
fputs($nav_file,"// This file is generated automatically by navgen.php.\n");

/* migo: do not include the following otherwise we will _always_ get cvs */
/* conflicts; without it conflicts are still possible, but less */
/*
fputs($nav_file,"// by ".my_get_global("PHP_SELF", "SERVER")."\n");
fputs($nav_file,"// Created at ".date("d/m/y H:i", time())."\n");
*/

fputs($nav_file,"// You may change the order of ".'$top_array'." only!\n");
fputs($nav_file,"// Uwe Pross 2002\n");
fputs($nav_file,"//=============================================================\n");
fputs($nav_file,"\n");
fputs($nav_file,"// names of the top sites - you may change the order if you like\n");
fputs($nav_file,'$top_array = array('."\n");
$site = "";
list($index,$site) = each($top_array);
fputs($nav_file, "\t\"$site\",\n");
/* migo: it is always good to have all lines with commas, less conflicts */
while( list($index,$site) = each($top_array) ) {
  fputs($nav_file, "\t\"$site\",\n");
}
fputs($nav_file,");\n");

// export sites recursivly
reset($top_array);
info_output( "<hr>");
while( list($index,$this_site) = each($top_array) ) {
  export_nav($this_site);
}

fputs($nav_file,"\n?>\n");

fclose($nav_file);

//chmod($navigation_file,0666);

//--------------------------------------------------------------------
// check if all found files were exported
//--------------------------------------------------------------------
reset($top_array);
info_output( "<hr>");
while( list($index,$this_site) = each($top_array) ) {
  info_output("Checking ".${$this_site}["file"]." for exporting<br>",5);
  if( ${$this_site}["is_exported"] != 1 ) {
    echo "<span class=\"warning\">Warning: top site $this_site in file ".${$this_site}["file"]." was not exported</span><br>\n";
  }
}

reset($child_file_array);
while( list($index,$php_file) = each($child_file_array) ) {
  info_output("Checking $php_file for exporting<br>",5);
  if( $child_array["$php_file"]["is_exported"] != 1 ) {
    echo "<span class=\"warning\">Warning: child site ".$child_array["$php_file"]["this_site"]." in file ".$php_file." was not exported</span><br>\n";
  }  
}

// phpinfo();
?>
</body>
</html>

<!-------------------------------------------------------------------->
<!-- end of file -->
<!-------------------------------------------------------------------->

