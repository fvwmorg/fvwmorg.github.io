<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Scott Smedley logos";
$heading        = "FVWM - Logo Competition - Scott Smedley logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start("By Scott Smedley", "100%", ""); ?>

<p>Here's my first attempts at using <a href="http://www.gimp.org/">the GIMP</a>.</p>

<p>Window managers are so intangible. It took me a while to think
of an idea for the FVWM logo. In the end I was asking myself what I
think of when I think of FVWM &amp; this is what I came up with: </p>
<p><img src="fvwm02.png"></p>

<p>This logo isn't  serious  -  it's  just  for  a  laugh.  Having  a
background  in  Astronomy, it is natural to think of the <i>bigger</i>
picture. I couldn't find a picture of the universe, so:</p> 

<p><img src="fvwm03.png"></p>

<p>I love butterflies &amp; I love FVWM, so:</p>

<p><img src="fvwm04.png"></p>

<p>The Feline theme (not my idea) is a great one!</p>

<p><img src="fvwm05.png"></p>

<p><img src="fvwm06.png"></p>

<p>What do palm trees have to do with FVWM? Dunno, but it looks good.</p>

<p><img src="fvwm07.png"></p>

<!-- ignored on Scotts wish
<p>An earlier attempt, but far too large.</p>
<p><img src="fvwm01.png"></p>
-->

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
