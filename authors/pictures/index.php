<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = "./../..";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

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
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename($layout_file));
  exit();
}

decoration_window_start("FVWM Developers"); 
?> 

<center>
<table>
<tr>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Cameron_Simpson.php'); ?>"><img src="Cameron_Simpson_small.jpg" width="150" height="124" border="1"></a><br>Cameron Simpson</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Dan_Espen.php'); ?>"><img src="Dan_Espen_small.jpg" width="150" height="113" border="1"></a><br>Dan Espen</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Greg_Badros.php'); ?>"><img src="Greg_Badros_small.jpg" width="150" height="103" border="1"></a><br>Greg Badros</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Marcus_Lundblad-2.php'); ?>"><img src="Marcus_Lundblad-2_small.jpg" width="150" height="113" border="1"></a><br>Marcus Lundblad</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Mikhael_Goikhman.php'); ?>"><img src="Mikhael_Goikhman_small.jpg" width="150" height="107" border="1"></a><br>Mikhael Goikhman</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Tomas_Oegren.php'); ?>"><img src="Tomas_Oegren_small.jpg" width="94" height="150" border="1"></a><br>Tomas &Ouml;gren</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Dominik_Vogt.php'); ?>"><img src="Dominik_Vogt_small.jpg" width="115" height="150" border="1"></a><br>Dominik Vogt</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Chuck_Hines.php'); ?>"><img src="Chuck_Hines_small.jpg" width="113" height="150" border="1"></a><br>Chuck Hines</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Bob_Woodside.php'); ?>"><img src="Bob_Woodside_small.jpg" width="100" height="150" border="1"></a><br>Bob Woodside</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Olivier_Chapuis.php'); ?>"><img src="Olivier_Chapuis_small.jpg" width="132" height="150" border="1"></a><br>Olivier Chapuis</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Richard_Lister.php'); ?>"><img src="Richard_Lister_small.jpg" width="119" height="150" border="1"></a><br>Richard Lister</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Steve_Robbins.php'); ?>"><img src="Steve_Robbins_small.jpg" width="79" height="150" border="1"></a><br>Steve Robbins</td>
</tr>

<tr>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Suzanne_Britton.php'); ?>"><img src="Suzanne_Britton_small.jpg" width="117" height="150" border="1"></a><br>Suzanne Britton</td>
<td align="center" valign="middle"><a href="<?php echo conv_link_target('Uwe_Pross.php'); ?>"><img src="Uwe_Pross_small.jpg" width="150" height="113" border="1"></a><br>Uwe Pro&szlig;</td>
</tr>
</table>
</center>

<a href="<?php echo conv_link_target('../index.php'); ?>">Back to authors page</a>

<?php 
decoration_window_end(); 
?> 
