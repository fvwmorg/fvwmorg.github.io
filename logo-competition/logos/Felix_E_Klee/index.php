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
$title          = "FVWM - Logo Competition - Felix E. Klee logos";
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

<?php decoration_window_start('Logos by Felix E. Klee', "100%", ""); ?>

<!--
From: "Felix E. Klee" <felix.klee@inka.de>
Subject: Re: [FVWM-LOGO] Some logos 
Date: Tue, 3 Jun 2003 11:05:30 +0200
User-Agent: KMail/1.5.1

You can find a smaller one at
    http://sites.inka.de/~W1787/fvwm/logos/logos.png

For the
    http://www.fvwm.org/logo-competition/logos/Felix_E_Klee/
page the big version of the logos can be found at
    http://sites.inka.de/~W1787/fvwm/logos/logosbig.png
and here's the text for that page:
-->

  <p>
    In most of my logos I try to reflect the fact that FVWM is a
    <em>Window</em> Manager. The first five are based on four squares laid
    out in a geometric "window-like" pattern. The sixth and the eighth were
    inspired by the idea of overlapping windows in FVWM. Finally, there
    is also a feline logo (the seventh one). 
  </p>
  <p>
    The logos below all exist in vector format and I plan to put
    corresponding DXF or, if possible, SVG files here soon. In addition, I
    might put variations of the logos and some new logos on this page in the
    next few weeks.
  </p>
  <p>
    For more info see my personal <a href="http://sites.inka.de/klee/fvwm/logos">FVWM Logo Page</a>.
  </p>
  <p>
    <img src="logos.png" width="543" height="745" border="0" alt="Logo">
  </p>	
    
<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
