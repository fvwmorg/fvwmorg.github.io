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
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start('Logos by Felix E. Klee', "100%", ""); ?>

<?php
// From: "Felix E. Klee" <felix.klee@inka.de>
// Subject: Re: [FVWM-LOGO] Some logos 
// Date: Tue, 3 Jun 2003 11:05:30 +0200
// User-Agent: KMail/1.5.1
// 
// You can find a smaller one at
//     http://sites.inka.de/~W1787/fvwm/logos/logos.png
// 
// For the
//     http://www.fvwm.org/logo-competition/logos/Felix_E_Klee/
// page the big version of the logos can be found at
//     http://sites.inka.de/~W1787/fvwm/logos/logosbig.png
// and here's the text for that page:
?> 

<p>
First, I want to state that I can easily create design variations (not just
resized images, of course) of the logos below in order to match the size
constraints in the competition rules. However, due to lack of time, I couldn't
provide any variations in advance of the voting process.
</p>

<p>
Note that all logos were created in a vector graphics application, so I can
provide them for example in SVG- or DXF-format. This also means that the colors
and the background can be easily adjusted or set to be transparent (I choose a
white background here for - among other things - better visibility).
</p>
<h3>Feline</h3>
<img src="feline.png">

<h3>Cloudy Sky</h3>
I created two versions of this logo to show how it can be adjusted to different
aspect ratios by reordering the window squares.
<img src="cloudy_sky.png">

<h3>Stacked Windows</h3>
<img src="stacked_windows.png">
<h3>Overlapping Windows</h3>
<img src="overlapping_windows.png">
<h3>FVWM Geometric Sans Serif</h3>
IIRC, this was my first design for an FVWM logo. The letters F, V, W, M are arranged
in a geometric window like pattern.
<img src="fvwm_geometric_sans_serif.png">
<h3>FVWM Geometric Serif</h3>
<img src="fvwm_geometric_serif.png">

<?php
//   <p>
//     In most of my logos I try to reflect the fact that FVWM is a
//     <em>Window</em> Manager. The first five are based on four squares laid
//     out in a geometric "window-like" pattern. The sixth and the eighth were
//     inspired by the idea of overlapping windows in FVWM. Finally, there
//     is also a feline logo (the seventh one). 
//   </p>
//   <p>
//     The logos below all exist in vector format and I plan to put
//     corresponding DXF or, if possible, SVG files here soon. In addition, I
//     might put variations of the logos and some new logos on this page in the
//     next few weeks.
//   </p>
//   <p>
//     For more info see my personal <a href="http://sites.inka.de/klee/fvwm/logos">FVWM Logo Page</a>.
//   </p>
//   <p>
//     <img src="logos.png" width="543" height="745" border="0" alt="Logo">
//   </p>	
//     
?>
<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
