<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/template.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// This is an autogenerated file, use manpages2php to create it.

//--------------------------------------------------------------------
// this manpages should not appear in the navigation structure
// so we hide its contents from navgen
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Man page - FvwmCommand";
$heading        = "FVWM - Man page - FvwmCommand";
$link_name      = "Man page";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages_unstable_FvwmCommand";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include_once(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FvwmCommand in unstable branch (2.5.14)"); ?>

<H1>FvwmCommand</H1>
Section: FVWM Modules (1)<BR>Updated: 24 August 2005 (2.5.14)<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>


<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

FvwmCommand - FVWM command external interface
<P>
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

FvwmCommand [-cmrvw] [-S name] [-i level] [-f name] [-F level] [command...]
<P>
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

<P>
FvwmCommand lets you monitor fvwm transaction and issue fvwm command
from a shell command line or scripts.
FvwmCommand takes each argument as a fvwm command. Quotes can be
used to send commands including spaces.


<P>


<blockquote><PRE>FvwmCommand 'FvwmPager 0 1'</PRE></blockquote>
<P>



<BR>

<A NAME="lbAE">&nbsp;</A>
<H2>INVOCATION</H2>

FvwmCommandS should be spawned once by fvwm, either in .fvwm2rc file,
from menu, or from FvwmConsole.
From then on, FvwmCommand
can be called from a shell or script to execute fvwm commands.
<P>
From within .fvwm2rc file:


<P>


<blockquote><PRE>Module FvwmCommandS

    or

AddToFunc StartFunction &quot;I&quot; Module FvwmCommandS</PRE></blockquote>
<P>



<P>
Then, in script file or from shell:
<P>


<P>


<blockquote><PRE>FvwmCommand  'popup Utilities'</PRE></blockquote>
<P>



<P>
<A NAME="lbAF">&nbsp;</A>
<H2>OPTIONS</H2>

<DL COMPACT>
<DT><I>-c</I><DD>
Informs FvwmCommand to read multiple commands from the standard input
instead of the one command specified in the command line arguments.
This disables <I>-m</I> or <I>-i</I>.
<P>


<P>


<blockquote><PRE>(echo &quot;Exec xload&quot;; echo &quot;Beep&quot;) | FvwmCommand -c</PRE></blockquote>
<P>



<P>
<DT><I>-F &lt;level&gt;</I><DD>
Specifies the level of fvwm window flags FvwmCommand outputs.
<P>
<DL COMPACT><DT><DD>
<DL COMPACT>
<DT>0<DD>
No window flags will be printed.
</DL>
</DL>

<DL COMPACT><DT><DD>
<DL COMPACT>
<DT>2<DD>
Full window flags will be printed if information level, -i
option, is 2 or 3.
<P>
</DL>
</DL>

<P>
<DT><I>-f &lt;name&gt;</I><DD>
Specifies an alternative FIFO set to communicate with a server.
The default FIFO set is /var/tmp/FvwmCommand-${DISPLAY}C, in which
FvwmCommand..C is used to send commands and FvwmCommand..M is to receive
messages.
FvwmCommandS must have been invoked with the same &lt;name&gt; as its first argument
prior to FvwmCommand invocation.
Alternatively, option -S can be used. Refer option -S.
This option -f is useful when a dedicated connection is necessary
to run a background job while another connection is kept for
interactive use.
<P>
<DT><I>-i &lt;level&gt;</I><DD>
Specifies the level of information that FvwmCommand outputs.
<P>
<DL COMPACT><DT><DD>
<DL COMPACT>
<DT>0<DD>
Error messages only.


<P>


<blockquote><PRE>FvwmCommand -i0 FvwmBanner</PRE></blockquote>
<P>



will show a banner without any output. On the other hand,


<P>


<blockquote><PRE>FvwmCommand -i 0 foobar</PRE></blockquote>
<P>



will return,


<P>


<blockquote><PRE>[FVWM][executeModule]: &lt;&lt;ERROR&gt;&gt; No such module
'foobar' in ModulePath '/usr/lib/X11/fvwm'</PRE></blockquote>
<P>



<P>
Note that Fvwm doesn't return any error messages in
cases like below since 'windowid' itself is a valid command.
<P>


<P>


<blockquote><PRE>FvwmCommand -i 0 'windowid foo bar'</PRE></blockquote>
<P>



<DT>1<DD>
Errors and window configuration information. This is the default.


<P>


<blockquote><PRE>FvwmCommand send_windowlist</PRE></blockquote>
<P>



Information like below will show up.


<P>


<blockquote><PRE>0x02000014 window               FvwmConsole
0x02000014 icon                 FvwmConsole
0x02000014 class                XTerm
0x02000014 resource             FvwmConsole
0x01c00014 window               console
0x01c00014 icon                 console
0x01c00014 class                XTerm
0x01c00014 resource             console
0x01000003 window               Fvwm Pager
0x01000003 icon
0x01000003 class                FvwmModule
0x01000003 resource             FvwmPager
0x00c0002c window               emacs: FvwmCommand.man
0x00c0002c icon                 FvwmCommand.man
0x00c0002c icon file            xemacs.xpm
0x00c0002c class                Emacs
0x00c0002c resource             emacs
end windowlist</PRE></blockquote>
<P>



The first column shows the window ID number, which can be used in 'windowid' command.
The second column shows the information types.
The last column shows the information contents.
If no information is returned, add -w &lt;time&gt; or -r option.
This might be needed in heavily loaded systems.
<DT>2<DD>
Above and static window information.


<P>


<blockquote><PRE>FvwmCommand -i2 'FvwmPager 0 1'</PRE></blockquote>
<P>



The below is its output.


<P>


<blockquote><PRE>0x03c00003 frame                x 962, y 743, width 187, height 114
0x03c00003 desktop              0
0x03c00003 StartIconic          no
0x03c00003 OnTop                yes
0x03c00003 Sticky               yes
0x03c00003 WindowListSkip       yes
0x03c00003 SuppressIcon         no
0x03c00003 NoiconTitle          no
0x03c00003 Lenience             no
0x03c00003 StickyIcon           no
0x03c00003 CirculateSkipIcon    no
0x03c00003 CirculateSkip        no
0x03c00003 ClickToFocus         no
0x03c00003 SloppyFocus          no
0x03c00003 SkipMapping          no
0x03c00003 Handles              no
0x03c00003 Title                no
0x03c00003 Mapped               no
0x03c00003 Iconified            no
0x03c00003 Transient            no
0x03c00003 Raised               no
0x03c00003 Visible              no
0x03c00003 IconOurs             no
0x03c00003 PixmapOurs           no
0x03c00003 ShapedIcon           no
0x03c00003 Maximized            no
0x03c00003 WmTakeFocus          no
0x03c00003 WmDeleteWindow       yes
0x03c00003 IconMoved            no
0x03c00003 IconUnmapped         no
0x03c00003 MapPending           no
0x03c00003 HintOverride         yes
0x03c00003 MWMButtons           no
0x03c00003 MWMBorders           no
0x03c00003 title height         0
0x03c00003 border width         4
0x03c00003 base size            width 8, height 7
0x03c00003 size increment       width 9, height 9
0x03c00003 min size             width 8, height 7
0x03c00003 max size             width 32767, height 32767
0x03c00003 gravity              SouthEast
0x03c00003 pixel                text 0xffffff, back 0x7f7f7f
0x03c00003 window               Fvwm Pager
0x03c00003 icon                 Fvwm Pager
0x03c00003 class                FvwmModule
0x03c00003 resource             FvwmPager</PRE></blockquote>
<P>



<DT>3<DD>
All information available.


<P>


<blockquote><PRE>FvwmCommand -i3 'Killmodule Fvwm*'</PRE></blockquote>
<P>



This will report which windows are closed.


<P>


<blockquote><PRE>0x03400003 destroy
0x02400002 destroy</PRE></blockquote>
<P>



</DL>
</DL>

<P>
<DT><I>-m</I><DD>
Monitors fvwm window information transaction. FvwmCommand continuously outputs
information that it receives without exiting.
This option can be used in a
background job often combined with -i3 option in order to control windows
dynamically.


<P>


<blockquote><PRE>FvwmCommand -mi3 | grep 'iconify'</PRE></blockquote>
<P>



It will report when windows are iconified or de-iconified.
<P>
Note: FvwmCommand does not block buffer its output but many utilities such as
grep or sed use block buffer. The output of the next example will not show up
until either FvwmCommand is terminated or stdout buffer from
grep is filled.


<P>


<blockquote><PRE>FvwmCommand -mi3 | grep ' map' |
sed 's/\(0x[0-9a-f]*\).*/windowid \1 move 0 0/'</PRE></blockquote>
<P>



Instead, use tools with buffer control such as pty or perl.
The below will iconify new windows when opened.


<P>


<blockquote><PRE>Fvwm -mi3 | perl -ne '
$|=1;
print &quot;windowid $1 iconify\n&quot; if /^(0x\S+) add/;
' &gt; ~/.FvwmCommandC</PRE></blockquote>
<P>



<DT><I>-r</I><DD>
Waits for a reply before it exits.
FvwmCommand exits if no information or error is returned in a fixed amount of
time period. (Refer option -w.)
The option -r overrides this time limit and wait for at least one message
back.
After the initial message, it will wait for another message for the time
limit.
This option is useful when the system is too loaded to make any prediction
when the system is responding AND the command causes some
message to be sent back.
<P>
<DT><I>-S &lt;name&gt;</I><DD>
Invokes another server, FvwmCommandS, with FIFO set &lt;name&gt;.
<BR>

If -f option is not used with this option,
the invoking FvwmCommand uses the default FIFO to communicate
the default server to invoke a new server.
<BR>

If -f option is used with this option,
the invoking FvwmCommand uses the default FIFO to communicate
the default server to invoke a new server. Then, switch the FIFO
set and start communicating the new server.
<BR>

This option -S is useful when a dedicated connection is necessary
to run a background
job while another connection is kept for interactive use.
<P>
If the &lt;name&gt; is a relative path name, that is relative from where
fvwm is running, not from where FvwmCommand is invoked.
<P>
<DT><I>-v</I><DD>
Returns FvwmCommand version number and exits.
<P>
<DT><I>-w &lt;time&gt;</I><DD>
Waits for &lt;time&gt; micro seconds for a message.
FvwmCommand exits if no information or error is returned in a fixed amount of
time period unless option -m is used.
The default is 500 ms. This option overrides this default value.
<P>
</DL>
<A NAME="lbAG">&nbsp;</A>
<H2>WRAPPER</H2>

<P>
<P>
FvwmCommand.sh has bourne shell function definitions
to keep the syntax similar to fvwm configuration file.
This file is to be sourced:


<P>


<blockquote><PRE>. FvwmCommand.sh
<BR>
DesktopSize 5x5</PRE></blockquote>
<P>



<BR>

FvwmCommand.pm is for perl in order
to keep the syntax similar to fvwm configuration file.
Commas can be used to separate fvwm commands' arguments.


<P>


<blockquote><PRE>use FvwmCommand;
if( $ARGV[0] eq 'home' ) {
    Desk 0,0; GotoPage '1 1';
}elsif( $ARGV[0] eq 'jump' ) {
    Desk &quot;0 2&quot;; GotoPage 0, 1;
}</PRE></blockquote>
<P>



Although arguments in FvwmCommand are not case sensitive as fvwm,
the functions defined in FvwmCommand.sh and FvwmCommand.pl are case sensitive.
<P>
<P>
<A NAME="lbAH">&nbsp;</A>
<H2>ERRORS</H2>

If the following error message show up, it is most likely that FvwmCommandS
is not running.


<P>


<blockquote><PRE>FvwmCommand error in opening message fifo
--No such file or directory--</PRE></blockquote>
<P>



Fvwm modules don't return error messages to fvwm but output on
stderr. These error messages will not be shown as FvwmCommand messages.
<P>
FvwmCommand is an interface to send commands to and receive
information from Fvwm2 from processes which are not Fvwm modules.
<P>
<P>
<A NAME="lbAI">&nbsp;</A>
<H2>EXAMPLES</H2>

<BR>&nbsp;&nbsp;test1.pl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;takes&nbsp;1&nbsp;argument&nbsp;&nbsp;'t'&nbsp;to&nbsp;invoke&nbsp;FvwmTalk
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'td'&nbsp;&nbsp;to&nbsp;kill&nbsp;FvwmTalk
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;''&nbsp;&nbsp;to&nbsp;move&nbsp;windows
<BR>&nbsp;&nbsp;test2.sh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;takes&nbsp;1&nbsp;argument&nbsp;&nbsp;'b'&nbsp;&nbsp;to&nbsp;invoke&nbsp;FvwmButtons
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'kb'&nbsp;to&nbsp;kill&nbsp;FvwmButtons
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'r'&nbsp;&nbsp;to&nbsp;change&nbsp;#&nbsp;of&nbsp;button&nbsp;rows
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'c'&nbsp;&nbsp;to&nbsp;change&nbsp;#&nbsp;of&nbsp;button&nbsp;columns
<BR>&nbsp;&nbsp;ex-auto.pl&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;auto&nbsp;raise&nbsp;small&nbsp;windows.&nbsp;It&nbsp;will&nbsp;keep&nbsp;them&nbsp;visible.
<BR>&nbsp;&nbsp;ex-cascade.pl&nbsp;-&nbsp;cascade&nbsp;windows,&nbsp;then&nbsp;move&nbsp;them&nbsp;back.
<BR>&nbsp;&nbsp;ex-grpmv.pl&nbsp;&nbsp;&nbsp;-&nbsp;choose&nbsp;a&nbsp;group&nbsp;of&nbsp;windows&nbsp;to&nbsp;move&nbsp;together.
<P>
<BR>&nbsp;&nbsp;Above&nbsp;examples&nbsp;are&nbsp;not&nbsp;meant&nbsp;to&nbsp;be&nbsp;practical&nbsp;but&nbsp;to&nbsp;show&nbsp;how&nbsp;it&nbsp;can
<BR>&nbsp;&nbsp;be&nbsp;done.
<P>
<P>
<P>
<BR>&nbsp;&nbsp;focus-link.pl
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;a&nbsp;user&nbsp;programmable&nbsp;window&nbsp;focus&nbsp;script.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Default&nbsp;behavior&nbsp;is:
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;When&nbsp;a&nbsp;window&nbsp;is&nbsp;opened&nbsp;up,&nbsp;focus&nbsp;the&nbsp;window&nbsp;and&nbsp;move&nbsp;the&nbsp;pointer
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;it.&nbsp;The&nbsp;parent&nbsp;window&nbsp;regains&nbsp;focus&nbsp;when&nbsp;a&nbsp;window&nbsp;is&nbsp;closed.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parenthood&nbsp;is&nbsp;determined&nbsp;when&nbsp;a&nbsp;window&nbsp;is&nbsp;opened.&nbsp;It&nbsp;is&nbsp;the&nbsp;last
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;focused&nbsp;window&nbsp;with&nbsp;the&nbsp;same&nbsp;X&nbsp;class.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;#1&nbsp;would&nbsp;not&nbsp;occur&nbsp;to&nbsp;AcroRead&nbsp;opening&nbsp;window.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;#1&nbsp;would&nbsp;not&nbsp;occur&nbsp;when&nbsp;SkipMapping&nbsp;is&nbsp;set&nbsp;and&nbsp;the&nbsp;window&nbsp;is&nbsp;the
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;only&nbsp;window&nbsp;of&nbsp;its&nbsp;class.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;For&nbsp;Netscape&nbsp;find&nbsp;dialog&nbsp;window,&nbsp;addition&nbsp;to&nbsp;#1,&nbsp;resize&nbsp;the&nbsp;window
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;300x150&nbsp;pixels&nbsp;and&nbsp;move&nbsp;it&nbsp;to&nbsp;East&nbsp;edge&nbsp;of&nbsp;the&nbsp;screen.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download/upload&nbsp;windows&nbsp;will&nbsp;not&nbsp;be&nbsp;focused&nbsp;nor&nbsp;be&nbsp;in&nbsp;focus&nbsp;link
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;list.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp;Move&nbsp;appletviewer&nbsp;to&nbsp;NorthWest&nbsp;corner.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp;Xterm&nbsp;won't&nbsp;focus&nbsp;back&nbsp;to&nbsp;its&nbsp;parent&nbsp;after&nbsp;closed.
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp;When&nbsp;a&nbsp;window&nbsp;is&nbsp;de-iconified,&nbsp;focus&nbsp;it&nbsp;and&nbsp;move&nbsp;the&nbsp;pointer.
<P>
<BR>&nbsp;&nbsp;focus-Netscape.pl
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Focuses&nbsp;pop-up&nbsp;windows,&nbsp;such&nbsp;as&nbsp;'open&nbsp;URL'&nbsp;or&nbsp;'find'&nbsp;whenever
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;opened&nbsp;up.&nbsp;This&nbsp;let&nbsp;the&nbsp;user&nbsp;to&nbsp;type&nbsp;in&nbsp;immediately&nbsp;without
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;moving&nbsp;mouse.&nbsp;This&nbsp;script&nbsp;also&nbsp;moves&nbsp;'download'&nbsp;window&nbsp;to&nbsp;the
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;right&nbsp;edge&nbsp;to&nbsp;keep&nbsp;it&nbsp;visible.&nbsp;If&nbsp;this&nbsp;is&nbsp;invoked&nbsp;from
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.fvwm2rc,&nbsp;use&nbsp;as:
<P>
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AddToFunc&nbsp;&quot;StartFunction&quot;&nbsp;&quot;I&quot;&nbsp;Module&nbsp;&nbsp;FvwmCommandS
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&quot;I&quot;&nbsp;Exec&nbsp;$HOME/scripts/focus-Netscape.pl
<P>
<BR>&nbsp;&nbsp;push-away.pl&nbsp;&lt;direction&gt;&nbsp;&lt;window&nbsp;name&gt;
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pushes&nbsp;windows&nbsp;away&nbsp;to&nbsp;avoid&nbsp;overlapping.&nbsp;use&nbsp;as:
<P>
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;push-away.pl&nbsp;up&nbsp;'Fvwm&nbsp;Pager'
<P>
<P>
<P>
Your comments will be appreciated.
<P>
<P>
Toshi Isogai
<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="mailto:isogai@ucsub.colorado.edu">isogai@ucsub.colorado.edu</A>
<P>
<P>
May 11 '98
<P>
<P>
<P>
<P>
<P>
<P>
<P>
<A NAME="lbAJ">&nbsp;</A>
<H2>SEE ALSO</H2>

<a href="<?php echo conv_link_target('./fvwm.php');?>">fvwm</a>
<P>
<A NAME="lbAK">&nbsp;</A>
<H2>AUTHOR</H2>

Toshi Isogai  <A HREF="mailto:isogai@ucsub.colorado.edu">isogai@ucsub.colorado.edu</A>
<P>
<P>
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">INVOCATION</A><DD>
<DT><A HREF="#lbAF">OPTIONS</A><DD>
<DT><A HREF="#lbAG">WRAPPER</A><DD>
<DT><A HREF="#lbAH">ERRORS</A><DD>
<DT><A HREF="#lbAI">EXAMPLES</A><DD>
<DT><A HREF="#lbAJ">SEE ALSO</A><DD>
<DT><A HREF="#lbAK">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 01:10:57 GMT, August 27, 2005


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 27-Aug-2005 -->
