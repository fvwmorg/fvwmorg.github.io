<?php
//--------------------------------------------------------------------
//-  File          : screenshots/desktops.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Desktop Screenshots";
$link_name      = "Desktops";
$link_picture   = "pictures/icons/screenshots_desks";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php", "", "$requested_file");

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  if( strlen($layout) > 0 ) {
    $file = $rel_path."/layout_".$layout.".inc";
    if( file_exists($file) ) $layout_file = $file;
  }
  include(sec_filename("$layout_file"));
  exit();
}
?>
<?php decoration_window_start("Desktop Screenshots"); ?>
<h5>Click on the image for the full sized version.</h5>
    <table border="1" cellpadding="5" frame="void" rules="rows" 
           summary="fvwm screenshots" class="screenshots">
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Mikhael-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Mikhael-desk-thumbnail.jpg"
	      border="0" alt="Mikhael Goikhman's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Mikhael Goikhman. This is a mix of different
	  <a href="http://fvwm-themes.sf.net/">fvwm-themes</a> components
	  plus some additional commands in FvwmConsole. This screenshot shows
	  new 2.5.x features like transparent FvwmPager in the upper left, png
	  icons from <a href="http://wm-icons.sf.net/">wm-icons</a> package,
	  tinted transparent menus, multipixmap titlebars, FvwmButtons on the
	  bottom that badly simulates the RedmondXP panel (it is managed by
	  fvwm module written in perl), icons tinted differently in menus,
	  shadow text and FreeType fonts. On the right is gkrellm.

	  <p>A similar configuration is availaible in the current fvwm-themes
	  cvs version, you probably want to wait for the final 0.7.0 to try it.
	</td>
      </tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Dan-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Dan-desk-thumbnail.jpg"
	      border="0" alt="Dan Espen's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Dan Espen, shows pixmap borders,
	  the Fvwm2 setup dialog using FvwmForm,
	  shaped icons, and a minimal use of fvwm modules.</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Michael-desk-1152x900.php');?>" target="screenshot_window">
	    <img src="Michael-desk-thumbnail.gif"
	      border="0" alt="Michael Han's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Michael Han,
	  multistyle decorations including HGradient titles and a nice
	  FvwmButtons, swallowing FvwmPager, procmeter and FvwmIconMan. Liberal
	  use of MiniIcons.</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Robert-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Robert-desk-thumbnail.jpg"
	      border="0" alt="Robert Ford's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Robert Ford,
	  shows gradients in menus and titlebars, FvwmWharf, FvwmTaskBar,
	  FvwmPager with pixmap backgrounds, some nice icons and mini-icons,
	  and an interesting purple/blue color scheme.</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Dominik-desk1-1152x864.php');?>" target="screenshot_window">
	    <img src="Dominik-desk1-thumbnail.jpg"
	      border="0" alt="Dominik Vogt's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Dominik Vogt,
	  shows soft gradients in menus and titlebars, a shaded window on the
	  left side of the top edge, FvwmButtons on the bottom edge, some menus
	  containing directory listings (updated every time they are opened)
	  and a bit of my .fvwm2rc in the top right shell. The colour palette
	  is one of about twenty I hijacked from CDE. Sub menus are nicely
	  centered around their parent item (use
	  'Popup menu-name item +100 c' for this effect).
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Dominik-desk2-1152x864.php');?>" target="screenshot_window">
	    <img src="Dominik-desk2-thumbnail.jpg"
	      border="0" alt="Dominik Vogt's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Dominik Vogt,
	  another one of my palettes (a list can be seen in the Palette menu),
	  an example of the 'SubmenusLeft' menu style. I'm fixing a menu bug
	  in the xemacs window in the background while viewing our screenshots
	  page with netscape 8-)
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Stric-desk1-1152x900.php');?>" target="screenshot_window">
	    <img src="Stric-desk1-thumbnail.gif"
	      border="0" alt="Tomas &Ouml;gren's Desktop"></a></td>
	<td valign="middle">
	  Submitted by Tomas &Ouml;gren,
	  A pretty lean theme without any annoying thick borders.
          FvwmButtons, xmeter, xbuffy, gimp and some stuff on other pages.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Windows95-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Windows95-desk-thumbnail.jpg"
	      border="0" alt="A Windows 95 like screenshot"></a></td>
	<td valign="middle">
	  Redmond98 theme from <a href="http://fvwm-themes.sf.net/">
	  fvwm-themes</a>.
	  A pretty close Windows 95 look and feel can be duplicated with
	  fvwm.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Paul_Johnson-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Paul_Johnson-desk-thumbnail.jpg"
	      border="0" alt="A Window Maker like screenshot"></a></td>
	<td valign="middle">
	  Submitted by Paul E. Johnson.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Ives_Aerts-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Ives_Aerts-desk-thumbnail.jpg"
	      border="0" alt="A Window Maker like screenshot"></a></td>
	<td valign="middle">
	  Submitted by Ives Aerts.
	  The screenshot
	  shows xmms, gfontsel, rxvt with vim and my FvwmButtons. The three
	  half-height buttons with the up arrows open up wharf-like button
	  arrays when pressed.
	  Menus and title bars are lightly gradiented and the (vector) titlebar
	  buttons were stolen from an old post to the fvwm mailing list. What
	  you can't see are all kinds of nifty keyboard shortcuts to popup/hide
	  mutt (mail reader), switch between windows and desks, etc.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Lee_Willis-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Lee_Willis-desk-thumbnail.jpg"
	      border="0" alt="A fairly simple setup"></a></td>
	<td valign="middle">
	  Submitted by Lee Willis.
	  A fairly simple setup, normally used with one window per page, very
	  easy on the eye, and hardly any decorations to get in your way :)
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Jason_Kibble-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Jason_Kibble-desk-thumbnail.jpg"
	      border="0" alt="Yet another theme"></a></td>
	<td valign="middle">
	  Submitted by Jason Kibblewhite.
	  This is my current favorite fvwm theme. The buttons and gradients
	  are based on an E fvwm theme which I thought looked quite spiffy.
	  As you can see I'm playing with FvwmButtons and FvwmTheme. I'm
	  never totally happy with what I come up with so this current
	  one has probably changed since this shot was taken.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Olivier_Chapuis-panelup-800x600.php');?>" target="screenshot_window">
	    <img src="Olivier_Chapuis-panelup-thumbnail.jpg"
	      border="0" alt="Panels up in a small screen"></a>
	  <a href="<?php echo conv_link_target('Olivier_Chapuis-paneldown-800x600.php');?>" target="screenshot_window">
	    <img src="Olivier_Chapuis-paneldown-thumbnail.jpg"
	      border="0" alt="Panels down in a small screen"></a></td>
	<td valign="middle">
	  Submitted by Olivier Chapuis.
	  Two screen shots in a small screen (800x600). The first one all
	  panels up, the second one all panels down and the TaskBar hidden.
	  Panels are quite useful on such a screen.
	  The "Window Maker FvwmButtons" has four panels that
	  run only if I use it: this saves my battery.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Andre_Bonhote-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Andre_Bonhote-desk-thumbnail.jpg"
	      border="0" alt="Gnome stuff"></a></td>
	<td valign="middle">
	  Submitted by Andre Bonhote.
	  My desktop shows (of course) fvwm,
	  of which not much is being seen actually.
	  Only the root menu and the decorations are really fvwm-like.
	  I like gtk so I am using gnome's panels (top and bottom, left hand side).
	  There's an aterm window using transparency, gqmpeg and netscape, and, of
	  course, gkrellm running.
	  For the colors, I used grdb and grdb2fvwm, which takes gnome's colors
	  and fonts and puts it into my fvwm2rc. it's quite useful, I think.
	</td></tr>

<!-- Second screenshot by Andre Bonhote -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Andre_Bonhote-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Andre_Bonhote-desk2-thumbnail.jpg"
	      border="0" alt="Andre_Bonhote second version"></a></td>
	<td valign="middle">
	  Second submission by Andre Bonhote.
          Normally, we show one screenshot per user, but just this once,
	  we'll show how desktops evolve over time.  This was submitted Dec 2002,
	  and the first one was submitted Oct 2000.
          <p>
	  Andre says:
	  This screenshot shows fvwm 2.5.5 (from cvs) with a lot of transparency.
	  Title bars, borders, menues and pagers (invisible at the moment) are all fully 
	  transparent, some are shaded to look blueish. Besides fvwm2, you see my logs 
	  in three aterms on the right side of the screen. Below that xchat and a small
	  gkrellm. On the left, there's mutt in an Eterm. The nice background is done
	  by xplanet and refreshed every 15 minutes.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Kendrick_Vargas-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Kendrick_Vargas-desk-thumbnail.jpg"
	      border="0" alt="Fvwm Integrated with Gnome"></a></td>
	<td valign="middle">
	  Submitted by Kendrick Vargas.
	  Fvwm2 integrated with GNOME (HelixCode) on RH 7.0 with FvwmGTK Menus,
	  FvwmPager swallowed into a gnome-panel and showing Mozilla M18 as the web
	  browser. GTK theme used is minEgtk.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Tenebrae-desk-800x600.php');?>" target="screenshot_window">
	    <img src="Tenebrae-desk-thumbnail.jpg"
	      border="0" alt="Light Marble GTK+ theme"></a></td>
	<td valign="middle">
	  Submitted by Tenebrae.
	  Here's my latest screenshot running FVWM 2.2.4 under RedHat Linux 6.2.  I
	  have a light marble GTK+ theme that I've extended manually onto my FVWM
	  buttons, and a custom icon or two.  I made the blue Vampire Princess Miyu
	  background for the Eterm, and threw Vampire Princess Miyu skins that I
	  found onto Licq and xmms.  I also customized the title bars a bit with a
	  textured background that fits in with the overall blueness of the Miyu
	  stuff.  Heres the <a href="Tenebrae.fvwm2rc">config file</a>.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('MURAKAMI_Tomokazu-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="MURAKAMI_Tomokazu-desk-thumbnail.jpg"
	      border="0" alt="Kanji Enabled"></a></td>
	<td valign="middle">
	  Submitted by MURAKAMI Tomokazu.
	  This is FVWM version 2.3.22. It's compiled with the --enable-kanji
	  option.  With this, I can use Nipponese satisfactorily.  Furthermore, I set
	  up Emacs to be able to use JIS X 0213."
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('An_Thi_Nguyen_Le-desk1-1152x864.php');?>" target="screenshot_window">
	    <img src="An_Thi_Nguyen_Le-desk1-thumbnail.jpg"
	      border="0" alt="An_Thi-Nguyen_Le"></a></td>
	<td valign="middle">
	  Submitted by An Thi-Nguyen Le.
	  Simple  window  and    menu   decors  using diagonal     and
	  backwards-diagonal gradients.    Buttons are actual defaults
	  from fvwm.  :) The modules used are FvwmButtons (I'd use the
	  $fg and $bg variables for the swallowed shell but that makes
	  it harder to read in this case), FvwmPager, FvwmIconMan (the
	  very bestest icon manager around).  Dockapps are xpostit and
	  wmnetselect.  On the right is GKrellM, nice themable stacked
	  system monitors.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('An_Thi_Nguyen_Le-desk2-1152x864.php');?>" target="screenshot_window">
	    <img src="An_Thi_Nguyen_Le-desk2-thumbnail.jpg"
	      border="0" alt="An_Thi_Nguyen_Le2"></a></td>
	<td valign="middle">
	  Another  one  by An  Thi-Nguyen   Le.  I got  really  really
	procrast-- I mean, bored, and fooled around with FvwmTheme for
	a while.  This particular scheme is borrowing heavily from the
	Enlightenment theme  AbsoluteE  (the blue  version) and  makes
	heavy use of the stretching pixmap feature  of FvwmTheme.  The
	background   is Tigert's  Blue   Space, the   GKrellM theme is
	something obscure called 3051.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="An_Thi_Nguyen_Le-desk3-1152x864.gif" target="screenshot_window">
	    <img src="An_Thi_Nguyen_Le-desk3-thumbnail.jpg"
	      border="0" alt="An_Thi_Nguyen_Le3"></a></td>
	<td valign="middle">
	  A third  one by An Thi-Nguyen Le.   Here's also a screenshot
	  of a   mockup of Gnutopia, a  rather  cheery BlackBox theme,
	  with  the large   pager  retracted (another  thing I  fooled
	  around  with.  Actually, all  the  buttons retract, just for
	  the heck  of  it).    Cheery happy  yellowy  and   all that.
	</td></tr>

<!-- Shawn Anderson resubmitted 22 Dec 2002 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('S_Anderson-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="S_Anderson-desk-thumbnail.gif"
	      border="0" alt="S_Anderson"></a></td>
	<td valign="middle">
	  Submitted by Shawn Anderson.    After seeing An Thi-Nguyen  Le's
	  screenshots(they are very nice BTW), I thought I would send one also
	  :-). It is fvwm 2.3.28.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('GlenLeeEdwards-desk3-1024x768.php');?>" target="screenshot_window">
	    <img src="GlenLeeEdwards-desk3-thumbnail.gif"
	      border="0" alt="GlenLeeEdwards"></a></td>
	<td valign="middle">
	  Submitted by Glen Lee Edwards.
This screenshot is intended to show the versatility of FvwmButtons.
FvwmButtons can swallow programs as well as menu items.  There are 3
separate FvwmButton panels active on this desktop.  MyBar1 is the
button on the right, and runs xbuffy, which monitors my incoming mail.
MyBar2, the bar across the bottom contains menu items and the
FvwmPager.  I have 24 active desktops.  The labeling, F1, F2,
etc. tells me which key combination to hit to go to that desktop.
MyBar3, which takes up the bulk of the screen, holds several programs
I constantly run and need quick access to.  All 3 bars are easily
iconized and removed from the screen with a simple key stroke designed
specifically for that individual bar, leaving me a clean and open
desktop to run additional programs.
<p>
Note: Check out Glen's excellent FVWM
<a href="http://members.fcwm.org/glen/fvwm/">page</a>
for even more FVWM
screenshots and information.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('GlenLeeEdwards-desk4-1024x768.php');?>" target="screenshot_window">
	    <img src="GlenLeeEdwards-desk4-thumbnail.gif"
	      border="0" alt="GlenLeeEdwards"></a></td>
	<td valign="middle">
	  Submitted by Glen Lee Edwards.
This screenshot demonstrates the WindowShade feature.
Instead of using icons, you can scroll the window up into
the titlebar.
The left buttons on the titlebar are created using vectors.
The right buttons are pixmaps.
All the buttons are user definable which further demonstrates
FVWM's flexibility. 
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('J_C_Lawrence-desk-1920x1440.php');?>" target="screenshot_window">
	    <img src="J_C_Lawrence-desk-thumbnail.gif"
	      border="0" alt="J C Lawrence"></a></td>
	<td valign="middle">
	  Submitted by J C Lawrence.
The basic rules guiding this <a href="J_C_Lawrence.fvwm2rc">setup</a>:
<ul>
<li>
 Modal interfaces are evil.
<li>
 No icons will ever appear on any system I run.  
<li>
 Nothing ever gets dragged, nothing ever gets dropped.
<li>
 There will be no system controls which are bound to or only
 accessible via particular locations on the screen.
<li>
 Key bindings/keyboard acceleration is your friend.
<li>
 No Z-order limits on any controls or feature accessibility.
<li>
 All controls must be accessible and controllable without
 requiring prior access (such as by changing z-order or moving a
 window out of the way (BAD!)), or to any other particular window
 or X or WM widget or device.
</ul>
	</td></tr>
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Christian_Lyra-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Christian_Lyra-desk-thumbnail.gif"
	      border="0" alt="Christian Lyra"></a></td>
	<td valign="middle">
	  Submitted by Christian Lyra.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('j_g_a_van_riswick-desk-1152x864.php');?>" target="screenshot_window">
	    <img src="j_g_a_van_riswick-desk-thumbnail.jpg"
	      border="0" alt="J G A van Riswick"></a></td>
	<td valign="middle">
	  Submitted by J.G.A. van Riswick.
This is a screen shot of fvwm mimicking the cde environment.
The setup features motif-style window decorations and
shadow/hilight color calculations.  The colors are calculated in
a perl script, which also generates .xresources and .gtkrc files
so that a consistent color scheme is used throughout all
applications.  In addition, given background pixmaps are colored
in the same colors, who on turn are reflected in the colors of
the buttons on the pager.  To mimic the cde front panel (in the
bottom) I used the gnome panel with some custom applets added.
Left to be done to fully get the cde look are window decorations
for icons. 
You can dowload
CDEmu which includes config files and scripts
<a href="http://themes.freshmeat.net/projects/cdemu">
here</a>.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('FilipHroch-desk-800x600.php');?>" target="screenshot_window">
	    <img src="FilipHroch-desk-thumbnail.gif"
	      border="0" alt="Filip Hroch"></a></td>
	<td valign="middle">
	  Submitted by Filip Hroch.
Filip says: 
I've been using Fvwm for many years. Two years ago I created by own
<a href="FilipHroch.fvwm2rc">configuration</a>
from an IRIX-like configuration. Today I looked at the nice 
screenshots on the www.fvwm.org site and I'm therefore sending my 
screenshot with a dfm icon manager and a transparent aterm on the root window.
	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Christian_Michon-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Christian_Michon-desk-thumbnail.gif"
	      border="0" alt="Christian Michon"></a></td>
	<td valign="middle">
	  Submitted by Christian Michon, who says:
<pre>
Using fvwm-2.4.6 and loving it.
* Liberal usage of FvwmWharf, FvwmTheme, FvwmAnimate
* Plenty of xpm...
* Gradients were not used: pixmaps with reduced color
were used instead

Fvwm2 *does* rock! Waiting impatiently for
native PNG support.
</pre>
<p>
(Christian's wish was fulfilled.)
 	</td></tr>

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Remko_Troncon-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Remko_Troncon-desk-thumbnail.gif"
	      border="0" alt="Remko Troncon"></a></td>
	<td valign="middle">
	  Submitted by Remko Troncon.
Remko says:
This screenshot shows a clean and simple desktop 
<A HREF="http://www.cs.kuleuven.ac.be/~remko/fvwm/fvwm2rc">setup</A>. 
On the top left
is FvwmButtons which opens panels of apps I use frequently for a 
very short time (like IM's). On the top right, 
<A HREF="http://www.gkrellm.net">GKrellM</A> is showing
all the things I like to monitor. The bottom right corner contains
FvwmPager. The background is generated by 
<A HREF="http://xplanet.sourceforge.net/">Xplanet</A>.
The fonts show the anti-aliasing support of FVWM.
The <A HREF="http://www.cs.kuleuven.ac.be/~remko/fvwm/icons.tgz">icons</A> 
in the menus are mostly taken from the 
<A HREF="http://wm-icons.sourceforge.net/">wm-icons</A> distribution.
 	</td></tr>

	<!-- Cameron Simpson -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Cameron_Simpson-desk-2560x1024.php');?>" target="screenshot_window">
	    <img src="Cameron_Simpson-desk-2560x1024-thumbnail.jpg"
	      border="0" alt="Cameron Simpson"></a></td>
	<td valign="middle">
	  Submitted by Cameron Simpson.  Uses Xinerama.
This is the
Zen style by Cameron Simpson,
<a href="http://www.cskk.ezoshosting.com/cs/fvwm/index.html">details here</a>.

      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Parv-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Parv-desk-thumbnail.jpg"
	      border="0" alt="Parv"></a></td>
	  <td valign="middle">
	  Submitted by Parv.
Parv says:
(fvwm 2.5.4) shows titles on bottom and on right hand side,
sticky windows with and without title-bars, FvwmPager, and
aterm with transparent background and tinting.
<p>
You can visit Parv's web site and see
the<A HREF="http://www103.pair.com/parv/comp/unix/cf/fvwm/#fvwm-2.5.4">
configuration file</a>.

See also the
<A HREF="http://www103.pair.com/parv/comp/graphic.comp/shot-fvwm-2.5.4-annotated.png">
annotated version of the screen shot</a>.
 	</td></tr>

<!-- Marc A Lehmann - submitted 22 Nov 2002 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Marc_A_Lehmann-desk-2880x1094.php');?>" target="screenshot_window">
	    <img src="Marc_A_Lehmann-desk-thumbnail.jpg"
	      border="0" alt="Marc_A_Lehmann"></a></td>
	  <td valign="middle">
	  Submitted by Marc A. Lehmann.
This is an Xinerama desktop showing some interesting side mounted titles,
flat borders and gradients in the titlebars.
The
<a href="Marc_A_Lehmann.fvwm2rc">config file</a>
is M4 based and contains some interesting stuff too.
<p>
Mark says:
... features XineramaSls, a really old fvwm config incrementally
updated to fvwm2 over the years. The config tries to implement the
following:
<ul>
<li>clean and reasonably fast (ok, gradients crept in over time ;)
<li>the active window must be very visible
<li>lots of virtual desktops, overlaps reduced to the minimum
<li>no unnecessary clutter, large terminals
<li>syslog on root-window using root-tail
</ul>
 	</td></tr>

<!-- Len Philpot - submitted 27 Dec 2002 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Len_Philpot-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Len_Philpot-desk-thumbnail.jpg"
	      border="0" alt="Len_Philpot"></a></td>
	  <td valign="middle">
	  Submitted by Len Philpot.
Len says:
it's simple (no transparent
terminals, multiple modules, etc., etc), but that might be a nice
contrast to all the "walk and talk" .fvwm2rc's out there. It does have
custom pixmaps buttons and titlebar, along with FvwmButtons on the
taskbar...
I'd like
to combine the maximize and restore buttons into one.
<p>
The question mark button brings up a form containing choices for all the
FVWM man pages, which launch in their own xterms.
 	</td></tr>

<!-- Brian Sturk - submitted 08 Feb 2003 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Brian_Sturk-desk-1280x1024.php');?>" target="screenshot_window">
	    <img src="Brian_Sturk-desk-thumbnail.jpg"
	      border="0" alt="Brian_Sturk"></a></td>
	  <td valign="middle">
	  Submitted by Brian Sturk.
Brian says:
I run 2.4.9 on FreeBSD 4.7 and Slackware Linux.   The two
FvwmButtons on the left top/right toggle showing a pager
and gkrellm respectively.
 	</td></tr>

<!-- Ploum - submitted 17 Feb 2003 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Ploum-desk-1152x864.php');?>" target="screenshot_window">
	    <img src="Ploum-desk-thumbnail.jpg"
	      border="0" alt="Ploum"></a></td>
	  <td valign="middle">
	  Submitted by Ploum.
Ploum says:

I like a clean desktop. I created a gradient for my fvwm menu and I called
it  "ocean".  I used a blue  gradient  for the active  titlebar  and a grey
gradient for  inactive.  I  can  easily  switch between viewports  with
"alt+arrow". The icons are from <b>wm-icons</b>. You  can see in the top left
corner two tiny  fvwm buttons. The first is  to  hide/unhide zinf, the
audio player, the second is a "swallow" of  my jabber status. Clicking
on it hides/unhides the psi main window.

I put xplanet in the backround with tracking of some satellites. (you
can see ISS  and XMM). On   the right, this   is gkrellm and a  sticky
transprent aterm in the bottom. Only 3 lines, it's just to launch some
commands.

When I minimize an application, the icon is  sent to my vertical icon
box,  just under grkrellm,  but  I do it rarely.  I  prefer shading of
windows, like the xterm at the top of the screen.

I just discovered today the cool "Aqua" skin for GTK and the "Aqua" skin
for phoenix, my favourite browser.

I documented a lot my
<a href="Ploum.fvwm2rc">fvwm2rc</a> file, but in french...

Yes, I hate taskbars and icons ! ;)

 	</td></tr>

<!-- Taviso - submitted 17 Feb 2003 -->
      <tr valign="top"><td valign="middle">
	  <a href="<?php echo conv_link_target('Taviso-desk-1024x768.php');?>" target="screenshot_window">
	    <img src="Taviso-desk-thumbnail.jpg"
	      border="0" alt="Taviso"></a></td>
	  <td valign="middle">
	  Submitted by Taviso.
Taviso says:

A Flat look, using vector buttons with solid color, loosely based on
a fluxbox look with wallpaper from QNX. The icons are from the wm-icons
package, and theres a transparent pager in the top left. Running fvwm-2.5.5 
on Linux Alpha and x86.

Taviso's submissions prompted some questions which he graciously answered:
<br>
Q: what is your file browser ?
<br>
A: its xftree, from the xfce project <a href="http://www.xfce.org/">http://www.xfce.org/</a>
<br>
Q: how do you change the look of this program ? (flat button bar style...)
<br>
A: its a gtk theme engine i use this one <a href="http://themes.freshmeat.net/projects/flat/">
http://themes.freshmeat.net/projects/flat/</a>
<br>
Q: how do you change the style of your browser ? (nice scroller !) 
<br>
A: thats the gtk theme engine again :) i just changed the prelighting to
blue to match my fvwm theme :)

 	</td></tr>

    </table>
	<?php decoration_window_end(); ?>
