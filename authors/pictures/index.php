<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = "./../..";

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
$title          = "FVWM Developers";
$heading        = "Pictures of some FVWM Developers";
$link_name      = "FVWM Developers";
$link_picture   = "pictures/icons/birthday";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "authors";

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

decoration_window_start("FVWM Developers"); 
?> 

<center>
<table>
<tr>
<td align="center" valign="middle"><a href="Cameron_Simpson.php"><img src="Cameron_Simpson_small.jpg" border="1"></a><br>Cameron Simpson</td>
<td align="center" valign="middle"><a href="Dan_Espen.php"><img src="Dan_Espen_small.jpg" border="1"></a><br>Dan Espen</td>
<td align="center" valign="middle"><a href="Greg_Badros.php"><img src="Greg_Badros_small.jpg" border="1"></a><br>Greg Badros</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="Marcus_Lundblad-2.php"><img src="Marcus_Lundblad-2_small.jpg" border="1"></a><br>Marcus Lundblad</td>
<td align="center" valign="middle"><a href="Mikhael_Goikhman.php"><img src="Mikhael_Goikhman_small.jpg" border="1"></a><br>Mikhael Goikhman</td>
<td align="center" valign="middle"><a href="Tomas_Oegren.php"><img src="Tomas_Oegren_small.jpg" border="1"></a><br>Tomas &Ouml;gren</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="Dominik_Vogt.php"><img src="Dominik_Vogt_small.jpg" border="1"></a><br>Dominik Vogt</td>
<td align="center" valign="middle"><a href="Chuck_Hines.php"><img src="Chuck_Hines_small.jpg" border="1"></a><br>Chuck Hines</td>
<td align="center" valign="middle"><a href="Bob_Woodside.php"><img src="Bob_Woodside_small.jpg" border="1"></a><br>Bob Woodside</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="Olivier_Chapuis.php"><img src="Olivier_Chapuis_small.jpg" border="1"></a><br>Olivier Chapuis</td>
<td align="center" valign="middle"><a href="Richard_Lister.php"><img src="Richard_Lister_small.jpg" border="1"></a><br>Richard Lister</td>
<td align="center" valign="middle"><a href="Steve_Robbins.php"><img src="Steve_Robbins_small.jpg" border="1"></a><br>Steve Robbins</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="Suzanne_Britton.php"><img src="Suzanne_Britton_small.jpg" border="1"></a><br>Suzanne Britton</td>
<td align="center" valign="middle"><a href="Uwe_Pross.php"><img src="Uwe_Pross_small.jpg" border="1"></a><br>Uwe Pro&szlig;</td>
</tr>
</table>
</center>

<?php 
decoration_window_end(); 
?> 
