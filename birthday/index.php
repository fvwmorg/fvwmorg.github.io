<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = "./..";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

$theme = "default";
$theme_file = theme_file("birthday_theme.inc");
$layout_file = $theme_file;

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "Happy Birthday FVMW!";
$heading        = '<img src="happy_birthday.gif" border="0" alt="Happy Birthday FVWM!">';
$link_name      = "Home";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array("fvwm_cats", "authors", "customize_theme");
//  RBW...
//  Must be able to cope with register_globals = off.
//$requested_file = basename(my_get_global("PHP_SELF", &$_SERVER));
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));

$this_site      = "home";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen("$site_has_been_loaded") == 0) {
  $site_has_been_loaded = "true";
  include(sec_filename($layout_file));
  exit();
}
?>

  <style type="text/css">
  <!--
    .Color01{ Color: #FFBA00; }
    .Color02{ Color: #59C400; }
    .Color03{ Color: #007BBA; }
    .Color04{ Color: #5B00A1; }
    .Color05{ Color: #FF2200; }
    .BgColor01{ background-color: #FFBA00; }
    .BgColor02{ background-color: #59C400; }
    .BgColor03{ background-color: #007BBA; }
    .BgColor04{ background-color: #5B00A1; }
    .BgColor05{ background-color: #FF2200; }
   -->
  </style>

<?php 
decoration_window_start("Celebrate 10 years of FVWM"); 
?> 

    <img src="birthday_celebration1.gif" border="0" alt="The FVWM Birthday Celebration">

      <p>
	On the 1st of June, 1993, the first version of fvwm, venerable 
	grandfather of many other window managers, first saw the light of
	day.  Robert Nation, the original author, bundled the initial
	release with rxvt, his still widely used terminal program.  After
	all these years, fvwm still stands strong.
      </p>

      <p>
	We, the developers of fvwm, would like to invite you to the fvwm
	birthday party on Sunday, 1st of June, 2003:
      </p> 


      <ul>
	<li>Visit the brand new fvwm home page at 
	  <a href="<?php echo $rel_path;?>/index.php" class="link">http://www.fvwm.org</a>
	  The special birthday layout will be available only for a couple of
	  days.</li>
 
	<li>Learn more about fvwm's history and its authors and users.</li>
 
	<li>Fvwm needs a new, shiny logo.  Participate in the fvwm logo
	  competition.  The best logo wins 100 Euro.</li>
	
	<li>Chat with developers and users via IRC on<br>
	  <br>
	  #fvwm on freenode (English channel)<br>
	  +fvwm.de on IRCnet (German channel)<br><br>
	</li>
	
	<li>Send your congratulations to the 
	  <a href="mailto:fvwm@fvwm.org" class="link">fvwm@fvwm.org</a> mailing list.</li>
	
      </ul>
      
      <p>
	Please visit the fvwm home page for further details:
      </p>
      <p>   
	<a href="<?php echo $rel_path;?>/index.php" class="link">http://www.fvwm.org</a>
      </p>

      <h1>Pictures of some FVWM Developers</h1>

<center>
<table>
<tr>
<td align="center" valign="middle"><a href="developers/Cameron_Simpson.php"><img src="developers/Cameron_Simpson_small.jpg" border="1"></a><br>Cameron Simpson</td>
<td align="center" valign="middle"><a href="developers/Dan_Espen.php"><img src="developers/Dan_Espen_small.jpg" border="1"></a><br>Dan Espen</td>
<td align="center" valign="middle"><a href="developers/Greg_Badros.php"><img src="developers/Greg_Badros_small.jpg" border="1"></a><br>Greg Badros</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="developers/Marcus_Lundblad-2.php"><img src="developers/Marcus_Lundblad-2_small.jpg" border="1"></a><br>Marcus Lundblad</td>
<td align="center" valign="middle"><a href="developers/Mikhael_Goikhman.php"><img src="developers/Mikhael_Goikhman_small.jpg" border="1"></a><br>Mikhael Goikhman</td>
<td align="center" valign="middle"><a href="developers/Tomas_Oegren.php"><img src="developers/Tomas_Oegren_small.jpg" border="1"></a><br>Tomas &Ouml;gren</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="developers/Dominik_Vogt.php"><img src="developers/Dominik_Vogt_small.jpg" border="1"></a><br>Dominik Vogt</td>
<td align="center" valign="middle"><a href="developers/Chuck_Hines.php"><img src="developers/Chuck_Hines_small.jpg" border="1"></a><br>Chuck Hines</td>
<td align="center" valign="middle"><a href="developers/Bob_Woodside.php"><img src="developers/Bob_Woodside_small.jpg" border="1"></a><br>Bob Woodside</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="developers/Olivier_Chapuis.php"><img src="developers/Olivier_Chapuis_small.jpg" border="1"></a><br>Olivier Chapuis</td>
<td align="center" valign="middle"><a href="developers/Richard_Lister.php"><img src="developers/Richard_Lister_small.jpg" border="1"></a><br>Richard Lister</td>
<td align="center" valign="middle"><a href="developers/Steve_Robbins.php"><img src="developers/Steve_Robbins_small.jpg" border="1"></a><br>Steve Robbins</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="developers/Suzanne_Britton.php"><img src="developers/Suzanne_Britton_small.jpg" border="1"></a><br>Suzanne Britton</td>
<td align="center" valign="middle"><a href="developers/Uwe_Pross.php"><img src="developers/Uwe_Pross_small.jpg" border="1"></a><br>Uwe Pro&szlig;</td>
</tr>
</table>
</center>

<?php 
decoration_window_end(); 
?> 
