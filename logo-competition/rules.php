<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------
// disabled by uwp
return;

$rel_path = "..";

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
$title          = "FVWM - Logo Competition - Rules";
$heading        = "FVWM Logo Competition Rules";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/default";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition_rules";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Participant information"); ?>

<h1>The FVWM Logo Competition</h1>

<p>FVWM stands for F? Virtual Window Manager (see 
<a href="<?php echo conv_link_target('../documentation/faq/#1.1'); ?>">FAQ</a>
to get an idea what F? may mean).  Historically, fvwm had
no good logo, but this is going to be changed.  With your help.</p>

<h2>Competition Schedule</h2>

<table cellspacing=5 cellspacing=2 border=1>
<tr>
	<th>Date</th>
	<th>Description</th>
</tr>
<tr>
	<td><b>23-Apr-2003</b> / <b>31-Aug-2003</b></td>
	<td>Logo contributions are accepted.</td>
</tr>
<tr>
	<td><b>Sep</b> / <b>Oct-2003</b></td>
	<td>The winning logo is elected.</td>
</tr>
<tr>
	<td>around <b>Oct / Nov-2003</b></td>
	<td>The winning logo is proclaimed.</td>
</tr>
</table>

<h2>How your logo should look like</h2>

<ul>
	<li>The name "fvwm" must appear in the logo, without a version
	number (i.e. *not* as "fvwm2").</li>

	<li>We want to use your logo in different formats.  The actual size
	will depend on the logo.
	<ul>
		<li>On the fvwm web site (about 200x120, full colour)</li>
		<li>As a banner for fvwm startup (about 300x180, 256 colours)</li>
		<li>As a banner with only black and white (about 300x180)</li>
		<li>Running up the left side of a menu (about 24x64, low color)</li>
	</ul>
	</li>

	<li>You do not need to make all these different images yourself.
	Just draw a big image with all the colours you like and we will
	take care of the smaller versions.  Of course you may do that
	yourself too - your choice.</li>

	<li>What you should keep in mind is that the banners will be
	converted to XPM format and put in the distribution.  They
	should look good on any background and not occupy more than 40Kb
	after compression.</li>

	<li>Logos can be submitted in either XPM or PNG format.</li>
</ul>
    
<h2>Contributing your logo</h2>

<ul>
	<li>Everybody may submit any number of logos by posting a url to the
	work or sending the images themselves as attachment (preferably
	compressed) to email address <b>fvwm-logo@lists.sf.net</b>.</li>

	<li>The contributed logos are exhibited at
	<a href="<?php echo conv_link_target('index.php');?>">http://fvwm.org/logo-competition/</a></li>
	
	<li>Logos not created by the submitter or logos with illegal,
	discriminating or otherwise offensive contents, at the
	discretion of the fvwm developers, can not be accepted.</li>
</ul>

<h2>Copyrights and License</h2>

<ul>
	<li>The artist retains full copyright of his or her work.</li>
	
	<li>By submitting a logo to the competition, the artist accepts that
	the logo is converted into XPM format (if necessary) and
	distributed under the terms of the GNU General Public License.</li>
</ul>

<h2>There can be only one</h2>
    
<ul>
	<li>In the election phase, one voting email per person can be sent to
	<b>fvwm-logo@lists.sf.net</b>.</li>
	
	<li>You can give one or no votes for each logo. The email should
	contain a list of logos for which you vote.  Give a vote for
	each logo you would enjoy to see as the official fvwm logo.</li>
	
	<li>The web interface is available too.</li>
	
	<li>The logo with the most votes wins.  It requires an easy email
	confirmation (using a mere reply) to disallow multiple voting.</li>
	
	<li>The above voting mode is meant to determine the logo that is
	accepted by the broadest range of users and not disliked strogly
	by a large fraction of fvwm users.</li>
</ul>
    
<h2>Gimme the Prize</h2>
    
<p>
	The prize for the new official fvwm logo is 100 Euro or the same
	amount in any other currency.
</p>
    
<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('index.php');?>">index</a>.</p>
