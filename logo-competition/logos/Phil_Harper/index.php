<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Phil Harper logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start('By
<a href="http://www.biggyp.tk/">Phil Harper</a>', "100%", ""); ?>

<p>I've got some submissions for the contest, tiger might get resubmitted
when I've worked out how to draw stripes on the tale that don't look crap. :)

<p class=centered>
<img align=middle src="feeble.png">
<img align=middle src="tiger.png">

<p><i>[update]</i> After much GIMPing around I've got a pretty good fake fur
look, more realistic ears and half decent tail, enjoy.

<p class=centered>
<img align=middle src="fakefur.png">
<img align=middle src="tiger2.png">

<p>Plain versions.

<p class=centered>
<img align=middle src="plain.png">
<img align=middle src="black.png">

<p>This seems to lend itself to wallpaper more than a logo, hmmm, I might try
that later...

Disclaimer: 100% Synthetic, no tigers were harmed during the production of
this logo. ;)

<p class=centered>
<img align=middle src="tigerskin5.png">

<p>More FVWM related art by this <a href="http://gug.sunsite.dk/gallery.php?artist=123">artist</a>:
<ul>
  <li><a href="http://fvwm-themes.sf.net/backgrounds/">TigerSkin FVWM Wallpaper (GPL'd source, nice)</a>
  <li><a href="http://gug.sunsite.dk/pictures/1051903001.png">TigerSkin FVWM Wallpaper (Black Stripes)</a>
  <li><a href="http://www.deviantart.com/deviation/1814563">SynthSkin FVWM Wallpaper on deviantART</a>
  <li><a href="http://gug.sunsite.dk/pictures/1051839576.png">Another Skin Variation Wallpaper</a>
</ul>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
