<?php
//--------------------------------------------------------------------
//-  File          : developers.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path="./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Developers";
$heading        = "FVWM - Developer Information";
$link_name      = "Developer Info";
$link_picture   = "pictures/icons/doc_developers";
$parent_site    = "documentation";
$child_sites    = array("dev_cvs","dev_modules","dev_downloadbugs","dev_creating_rpms","dev_webpage");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php","","$requested_file");

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Developer Information");
?>

<p>
FVWM was created by Robert Nation, originally derived from
<em>TWM</em> code.  Thanks, Rob!
</p>

<p> Rob then passed the torch on to Charles Hines, who passed the
torch to Brady Montz.  The FVWM torch is now carried by lots of people
on the <a href="mailto:fvwm-workers@fvwm.org">fvwm-workers</a> list. Jason
Tibbitts continues to provide infrastructure in the form of mailing
lists, a web site, an FTP site, a CVS tree, and anonymous rsync.
</p>

<p> 
If you are an FVWM developer or want to become one, or are just
curious, these links may be of interest to you:
</p>

<?php insert_quick_jump_list(array("dev_cvs",
				   "dev_modules",
				   "dev_downloadbugs",
				   "dev_creating_rpms",
				   "dev_webpage"),
			     1); ?>

<?php decoration_window_end(); ?>
