<?php
//--------------------------------------------------------------------
//-  File          : definitions.inc
//-  Project       : PHP Homepage
//-  Date          : Sun Nov 17 20:57:39 2002
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// exclude this file from navgen 
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// check if this file has been already read 
//--------------------------------------------------------------------
if( strlen($definitions_has_been_read) > 0 ) return;
$definitions_has_been_read = "t";

//--------------------------------------------------------------------
// fvwm release information
// the strings here effect the release information on the home-page 
// and the links to the ftp-server 
//--------------------------------------------------------------------
$latest_stable_release   = "2.4.15";
$latest_unstable_release = "2.5.6";

//--------------------------------------------------------------------
//  my_get_global --
//  Returns the value of a named global variable in a portable way for
//  all known versions of PHP 3 & PHP 4.
//  Args:
//  $varname - the name of the variable requested.
//  $vartype - the global array where the variable should be found;
//  may be an actual array reference to the target array, or one of
//  the following strings: "ENV", "GET", "POST", "COOKIE". $SERVER",
//  "FILES", "SESSION", "REQUEST", or "GLOBALS".
//--------------------------------------------------------------------

function my_get_global($varname, $vartype)  {
    //  Change this to receive a literal for vartype,
    //  do a case on vartype and load a reference to
    //  the appropriate array, e.g., if $vartype = "SERVER",
    //  set $mytype = &$_SERVER (or &$HTTP_SERVER_VARS if 4.0,
    //  or maye &$GLOBALS if version 3 - ???).
    //  And let's call $vartype $egpcstype instead.
    //

    //  I have no idea what would happen if you tried to run this thing
    //  under a pre-3.0 version, but if it should get this far, we'll
    //  return an unset variable.  
    if (PHP_VERSION < 3.0)  {
        return $val;
    }

    //  The caller may have passed a reference to the desired array.
    //  If this arg is an array, assume he knows what he's doing.
    if (is_array($vartype))  {
        $mytype = $vartype;
        if (isset($mytype[$varname]))  {
            $val = $mytype[$varname];
        }
        return $val;
    }  else  {
        //  The new stuff - we have 3 paths, for 3.0, 4.0, and 4.1 and up.


        //  Version 3 had the $GLOBALS array, so just get the value from there.
        if (PHP_VERSION < 4.0)  {
            return $GLOBALS[$varname];
        }

        //  Version 4.0 and above - point to the appropriate global array.
        if (PHP_VERSION < 4.1)  {
            switch ($vartype)  {
            case "ENV":
                global $HTTP_ENV_VARS;
                $mytype = &$HTTP_ENV_VARS;
                break;
            case "GET":
                global $HTTP_GET_VARS;
                $mytype = &$HTTP_GET_VARS;
                break;
            case "POST":
                global $HTTP_POST_VARS;
                $mytype = &$HTTP_POST_VARS;
                break;
            case "COOKIE":
                global $HTTP_COOKIE_VARS;
                $mytype = &$HTTP_COOKIE_VARS;
                break;
            case "SERVER":
                global $HTTP_SERVER_VARS;
                $mytype = &$HTTP_SERVER_VARS;
                break;
            case "FILES":
                global $HTTP_POST_FILES;
                $mytype = &$HTTP_POST_FILES;
                break;
            case "SESSION":
                global $HTTP_SESSION_VARS;
                $mytype = &$HTTP_SESSION_VARS;
                break;
            case "REQUEST":
                //  There's no such entity before 4.1.
                return $val;
                break;
            case "GLOBALS":
                global $GLOBALS;        //  Is this necessary?
                $mytype = &$GLOBALS;
                break;
            default:
                //  Unknown array, return unset var. (Or should we try
                //  to fetch it from $GLOBALS?)
                //$mytype = &$GLOBALS;
                return $val;
                break;
            }  //  End switch

            //  Get the variable if it exists.
            if (isset($mytype[$varname]))  {
                $val = $mytype[$varname];
            }
            return $val;

        }

        //  Version 4.1 and above - 
        if (PHP_VERSION >= 4.1)  {
            switch ($vartype)  {
            case "ENV":
                $mytype = &$_ENV;
                break;
            case "GET":
                $mytype = &$_GET;
                break;
            case "POST":
                $mytype = &$_POST;
                break;
            case "COOKIE":
                $mytype = &$_COOKIE;
                break;
            case "SERVER":
                $mytype = &$_SERVER;
                break;
            case "FILES":
                $mytype = &$_FILES;
                break;
            case "SESSION":
                $mytype = &$_SESSION;
                break;
            case "REQUEST":
                $mytype = &$_REQUEST;
                break;
            case "GLOBALS":
                $mytype = &$_GLOBALS;
                break;
            default:
                //  Try to get any old global of that name.
                //  Or should we return unset var instead?
                $mytype = &$_GLOBALS;   
                //return $val;
                break;
            }  //  End switch

            //  Get the variable if it exists.
            if (isset($mytype[$varname]))  {
                $val = $mytype[$varname];
            }
            return $val;
        }

    }

    return $val;
}

function sec_filename($filename) {
    if( file_exists("$filename") )
        return $filename;
    else
        return "__".$filename."__";
}

function theme_file($filename) {
    global $rel_path;
    $file = $rel_path."/web-theme/themes/".$filename;
    if( file_exists("$file") )
        return $file;
    else
        return $rel_path."/web-theme/themes/default_theme.inc";  
}

function class_file($filename) {
    global $rel_path;
    $file = $rel_path."/web-theme/classes/".$filename;
    if( file_exists("$file") )
        return $file;
    else
        return $rel_path."/web-theme/classes/default_class.inc";  
}

function helper_file($filename) {
    global $rel_path;
    $file = $rel_path."/web-theme/helpers/".$filename;
    if( file_exists("$file") )
        return $file;
    else
        return "__".$file."__";  
}

//--------------------------------------------------------------------
// global definitions for all php files
//--------------------------------------------------------------------
if( strlen($rel_path) == 0 ) $rel_path=".";

$user_agent = my_get_global("HTTP_USER_AGENT","SERVER");

// if( my_get_global("theme","GET") ) {

$theme = my_get_global("theme", "GET");
// we can make a decision of default theme here
if( strlen($theme) > 0 ) {
    $theme_file = theme_file($theme."_theme.inc");
} elseif ( preg_match("/Emacs/", $user_agent) || 
           preg_match("/Lynx/", $user_agent)  || 
           preg_match("/w3m/", $user_agent)) {
    $theme_file = theme_file("plain_theme.inc");
} else {
    $theme_file = theme_file("default_theme.inc");
}

// layout file - old version
$layout_file = $theme_file;

$navigation_file = $rel_path."/navgen_write/navigation.inc";
$navgen_url      = $rel_path."/navgen.php";

?>

