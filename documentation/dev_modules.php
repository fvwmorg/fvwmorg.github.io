<?php
//--------------------------------------------------------------------
//-  File          : developers.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//-  Last modified : <09.04.2003 19:08:26 uwe>
//--------------------------------------------------------------------

if( strlen($rel_path)==0 ) $rel_path="./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Modules";
$heading        = "FVWM - Module Interface";
$link_name      = "Module Interface";
$link_picture   = "pictures/icons/doc_developers";
$parent_site    = "developers";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php","","$requested_file");

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

decoration_window_start("Module Interface");
?>

<h2>Table Of Contents</h2>

<ul>
  <li><a href="#mod_changes">Important Changes Since Fvwm-1.xx</a></li>
  <li><a href="#mod_concept">Concept</a></li>
  <li><a href="#mod_security">Security</a></li>
  <li><a href="#mod_initialization">Initialization</a></li>
      and <a href="#mod_initialization_colorsets">Colorsets</a></li>
  <li><a href="#mod_m2f_communication">Module-to-Fvwm Communication</a></li>
  <li><a href="#mod_f2m_communication">Fvwm-to-Module Communication</a></li>
  <!-- <li><a href="generated/perllib/">Perl Library Documentation</a> <i>[new]</i></li> -->
</ul>

<!------------------------------------------------------------------------ 
  --  mod_changes.html
  ------------------------------------------------------------------------ -->
<h3>Important Changes Since Fvwm-1.xx</h3>
<P>
The module interface remained fairly stable when going from Fvwm-1.xx
to Fvwm-2.xx. The change most likely to affect modules is the addition
of an extra value to the header. This value is a timestamp. Most
modules contained the line:</p>
<FONT COLOR="YELLOW"><PRE>
	unsigned long header[3];
</PRE></FONT>
This must be changed to:
<FONT COLOR="YELLOW"><PRE>
	unsigned long header[HEADER_SIZE];
</PRE></FONT>
The rest of the changes are handled in the library function
ReadFvwmPacket.
<P>
Another notable change is that modules do not have to read the .fvwmrc
file themselves. They can request the appropriate lines from fvwm:
<!-- dje, from FvwmAnimate.c -->
<FONT COLOR="YELLOW"><PRE>
  static void ParseOptions() {
    char *buf;
    while (GetConfigLine(Channel,&amp;buf), buf != NULL) {
      ParseConfigLine(buf);
    } /* end config lines */
  } /* end function */
</PRE></FONT>
This is the preferred method of getting module-specific
configuration lines.
<P>
Starting in fvwm-2.0 pl 1, fvwm2 passes command line arguments
to the modules, so if the user said ``FvwmPager 2 4'', the module
will see argv[6] = 2 and argv[7] = 4, instead of argv[6] = ``2 4''.
<P>
Some new packet types are defined, and a few values were added to
some packet types.
<P>
    <hr>
  </body>
</html>

<!------------------------------------------------------------------------
  -- mod_concept.html 
  ------------------------------------------------------------------------ -->

<P>
The module interface has several design goals:
<UL>
<LI>Modules are used to implement "extra" or "elaborate" features so
that the additional resources these features take don't affect users that
don't want to sacrifice the resources.
<LI>Modules (user programs) should be able to provide the window
manager with a limited amount of instruction regarding instructions to
execute.
<LI>Modules should not be able to corrupt the internal data bases
maintained by Fvwm, nor should unauthorized modules be able to
interface to Fvwm.
<LI>Modules should be able to extract all or nearly all information
held by the window manager, in a simple manner, to provide users with
feedback not available from built in services.
<LI>Modules should gracefully terminate when the window manager
dies, quits, or is re-started.
<LI>It should be possible for programmer-users to add modules
without understanding the internals of Fvwm. Ideally, modules could be
written in some scripting language such as Tcl/Tk.
</UL>
<P>

<!------------------------------------------------------------------------ 
  -- mod_security.html
  ------------------------------------------------------------------------ -->

<P>
Limited effort has been placed on security issues. In short, modules
can not communicate with Fvwm unless they are launched by Fvwm, which
means that they must be listed in the user's .fvwmrc file.
Modules can only issue commands to Fvwm that could be issued from a
menu or key binding. These measures do not keep a poorly written
module from destroying windows or terminating an X session, but they
do keep users from maliciously connecting to another users window
manager, and it should keep modules from corrupting the Fvwm internal 
databases.

<!------------------------------------------------------------------------
  -- mod_initialization.html 
  ------------------------------------------------------------------------ -->

<p>
Modules MUST be launched by Fvwm. Fvwm will first open a pair of pipes
for communication with the module. One pipe is for messages to Fvwm from
the module, and the other is for messages to the module from Fvwm. Each
module has its own pair of pipes. After the pipes are open, Fvwm will fork
and exec the module. Modules not specified with an absolute path must be
located in the ModulePath, as specified in the user's .fvwm2rc file.
Modules can be initiated as fvwm starts up,
or can be launched part way through an X session.

<h2>
<font color="#40E0D0">
Module Arguments</font></h2>

<h3>
Args 0
</h3>
Like any UNIX program, arg 0 is the full pathname of the module. Most modules
acquire this for use in error message, parsing their own configuration
commands, some other possible uses. Arg 0 is related to the optional arg
6 described under "Module Aliases".

<h3>
Args 1 and 2
</h3>
The pipes are open when the module starts execution. The integer file
descriptors are passed to the module as the first and second command
line arguments.

<h3>
Arg 3
</h3>
The third command line argument is a character pointer pointing to the full
path name of the configuration file from which the module was started. If
the module was not started from any configuration file (for example, it is
started from StartFunction), this arg points to a string containing "none".
This argument is mostly for backward compatibility with old modules.

<h3>
Arg 4
</h3>
The next command line argument is the application window in whose context
the module was launched. This is 0 if the module is launched without an
application window context.

<h3>
Arg 5
</h3>
The next argument is the context of the window decoration in which the
module was launched. Contexts are listed below:
<pre><font color="#FFFF00">
#define C_NO_CONTEXT     0 - launched during initialization
#define C_WINDOW         1 - launched from an application window
#define C_TITLE          2 - launched from a title bar
#define C_ICON           4 - launched from an icon window
#define C_ROOT           8 - launched from the root window
#define C_FRAME         16 - launched from a corner piece
#define C_SIDEBAR       32 - launched from a side-bar
#define C_L1            64 - launched from left button #1
#define C_L2           128 - launched from left button #2
#define C_L3           256 - launched from left button #3
#define C_L4           512 - launched from left button #4
#define C_L5          1024 - launched from left button #5
#define C_R1          2048 - launched from right button #1
#define C_R2          4096 - launched from right button #2
#define C_R3          8192 - launched from right button #3
#define C_R4         16384 - launched from right button #4
#define C_R5         32768 - launched from right button #5

</font></pre>
Note that no more than one bit will ever be set so a case statement may be
used with the values above.

<h3>
Arg 6 and above
</h3>
A number of user specified command line arguments may be present (optional).
Any number of arguments may be passed. For example, in:
<pre><font color="#FFFF00">
        Module  "FvwmIdentify"  FvwmIdentify Hello rob! ``-fg purple''

</font></pre>
we would get argv[6] = ``Hello'', argv[7] = ``rob!'', argv[8] = ``-fg purple''.

<h2>
<font color="#40E0D0">
Module Aliases
</font></h2>
In the original fvwm, if you wanted to run 2 copies of a module, you were
advised to copy or soft-link the module executable to another name. For
example, you might have had to copies of FvwmButtons running. Some of the
modules now accept arg 6 as an Alias of the module name.
<p>
This alias is used in module generated messages, in recognizing configuration
commands, and possibly other uses. FvwmAnimate makes full use of this and
might provide a good model to follow.

<h2><font color="#40E0D0">
Acquiring the read/write pipes
</font></h2>
The following mechanism is recommended to acquire the pipe descriptors:
<pre><font color="#FFFF00">
int fd[2];
void main(int argc, char **argv) {
  if((argc &lt; 6)) {
    fprintf(stderr,
      "%s: Should only be executed by fvwm!\n", argv[0]);
    exit(1);
  }
  fd[0] = atoi(argv[1]);
  fd[1] = atoi(argv[2]);

</font></pre>
The descriptor fd[0] is available for the module to send messages to fvwm,
while the descriptor fd[1] is available to read messages from fvwm. Since
"int fd[2]" is an array, you will often see modules send commands to fvwm
with the construct "SendText(fd,"Command",0);". Of course, they really
mean "SendText(&amp;fd[0],"Command",0);".

<h2><font color="#40E0D0">
Pipe Status
</font></h2>
Special attention is paid to the status of the pipe. If Fvwm gets a read
error on a module-to-fvwm pipe, then it assumes that the module is terminating,
and all communication with the module is terminated. Similarly, if a module
gets a read error on an fvwm-to-module pipe, then it should assume that
fvwm is terminating, and it should gracefully shut down. All modules should
also allow themselves to be shut down via the Delete Window protocol for
X11.

<h2><font color="#40E0D0">
Reading initial configuration information
</font></h2>
In previous implementations, the modules were expected to read and parse
the .fvwmrc file by themselves. This caused some difficulty if a pre-processor
was used on the .fvwmrc file. In fvwm-2.0 and later, fvwm retains the module
command lines (those which start with a ``*''), and passes them to any
module on request. Modules can request the command list by sending a
``Send_ConfigInfo'' command to fvwm. Modules can request configuration
commands to be sent whenever fvwm reads one, even after the module has started
up, see
<a href="mod_m2f_communication.html#M_SENDCONFIG">M_SENDCONFIG</a> in
<a href="mod_m2f_communication.html">Module-to-Fvwm Communication</a>.


<h2><a NAME="colorsets"></a><font color="#40E0D0">
Colorset support
</font></h2>
When a module requests configuration information the configuration commands
sent are preceded by some global configuration lines and a list of colorsets.
In order to use colorsets a module must do the following:
<ul>
<li>make sure <em>-lm</em> is contained in the <em>LDADD</em> variable in
    <em>Makefile.am</em></li>
<li><em>#include "libs/Colorset.h"</em></li>
<li>Call <em>InitPictureCMap()</em> just after <em>XOpenDisplay()</em> to get
    access to the visuals that fvwm uses. Sharing pixmaps will not work unless
    you use the same colormap. This means that the module cannot create a top
    level window with <em>XCreateSimpleWindow()</em>. It must use
    <em>XCreateWindow()</em> and specify the visual as <em>Pvisual</em>, the
    colormap as <em>Pcmap</em>, the depth as <em>Pdepth</em>, the background
    and border pixels must also be specified otherwise they default to
    <em>CopyFromParent</em> which may give an error.</li>
<li>Call <em>AllocColorset(0)</em> to initialize the colorset array.</li>
<li>Set the <em>M_SENDCONFIG</em> bit in the message mask</li>
<li>In the configuration parsing routine look for <em>Colorset</em> and pass
    the line to <em>LoadColorset()</em></li>
<li>Add additional configuration commands such as
    <em>*&lt;module_name>Colorset</em> and parse for them. Colorsets usually
    duplicate static settings of foreground and background so you probably
    want a different colorset option for each background color option.</li>
<li>Add some state to select between using a colorset or a fore/background
    color for an object. The convention is that the last configuration command
    takes precedence.</li>
<li>The module must wait on <em>select()</em> not <em>XNextEvent()</em>. The
    <em>select()</em> must include the fvwm pipe so that messages from fvwm
    can be read. Any <em>M_CONFIG_INFO</em> message must be passed to the
    option parser so that a colorset message can be passed on to
    <em>LoadColorset()</em>. If a colorset that is referenced is changed the
    module must redraw itself. Don't forget that colorset backgrounds have to
    be redrawn when the window is resized.</li>
<li>Accessing colorset <em>N</em> must be done with via <em>Colorset[N]</em>.
    <em>Colorset[]</em> is a global array in <em>libs/Colorset.c</em>.
    It is a good idea to call <em>AllocColorset(N)</em> whenever <em>N</em>
    is changed before trying to access <em>Colorset[n]</em>. The pixels
    available are.
    <ul>
    <li>fg: the foreground pixel</li>
    <li>bg: the background pixel</li>
    <li>hilite: the top and left shadow pixel</li>
    <li>shadow: the bottom and right shadow pixel</li>
    </ul>
<li><em>SetWindowBackground()</em> takes a colorset pointer, generates an
    appropriate background for the window. An additional input enables the
    background to be painted and generates an expose event so the normal
    event handling will repaint the window. If performance is critical the
    module should clear the window itself and call it's repaint routine to
    save a round trip delay.</li>
<li><em>CreateBackgroundPixmap()</em> creates the pixmap used by
    <em>SetWindowBackground()</em> in case you want to paint the background
    manually, you have to check that the colorset contains a valid pixmap first
    though: <em>
    (cset.pixmap&nbsp;&amp;&amp;&nbsp;cset.pixmap&nbsp;!=&nbsp;<a href="#transparency">ParentRelative</a>)
    </em>. Note that if you call this function with a colorset that has no
    pixmap, it returns a pixmap filled with the <em>cset.bg</em> pixel.</li>
<li><em>SetRectangleBackground()</em> draws the background provided in a
    colorset directly into the specified rectangle of a target drawable. Note
    that this creates and deletes a pixmap internally every time it is used.</li>
<li><em>CreateBackgroundPixmap()</em> does not handle the shape mask in the
    colorset at all while <em>SetRectangleBackground()</em> only draws the
    pixels selected in the shape mask. Only <em>SetWindowBackground()</em>
    will shape a window with the shape mask. Thus
    <em>SetWindowBackground()</em> should be used for the application's main
    window while shaping is optional everywhere else.</li>
</ul>

<h2><a NAME="transparency"></a><font color="#40E0D0">
Transparency
</font></h2>
Fvwm and modules can implement a limited form of transparency. It does not
allow the contents of one window to show through another but instead copies the
parent window background into the window. X11 makes it impossible to examine the
background color or pixmap of any window so there is no facility to tint
or shade the root window background. Transpency is only supported in colorsets
managed by FvwmTheme and it won't work if you start fvwm with the -visual option.
<p>
In order to support transparency a module must do the following:
<ul>
<li>Detect transparency in a colorset by
    <em>(colorset.pixmap&nbsp;==&nbsp;ParentRelative)</em>.</li>
<li>For any item that may be drawn with a transparent colorset set the window
    background pixmap to <em>ParentRelative</em> and all ancestor windows up to
    the top level window. <em>SetWindowBackground()</em> will do this for
    a single window.</li>
<li>If any window that has been set to ParentRelative is drawn with a
    non-transparent colorset <em>CreateBackgroundPixmap()</em> must be used
    together with <em>XFillRectangle()</em> to paint the background instead
    of <em>SetWindowBackground()</em>.</li>
<li>Detect if the parent window background changes. This can be achieved
    by monitoring the MX_PROPERTY_CHANGE fvwm to module message.
<li>If the window is likely to be moved or repositions itself the module must
    handle <em>ConfigureNotify</em> events and repaint the whole window
    whenever it is moved. This is because X servers only handle ParentRelative
    on the window that moves (the window manager frame) and don't propogate
    the background down to any descendants of a ParentRelative window. Luckily
    most fvwm modules will only be run by fvwm and there is a reliable method
    of handling this situation (from FvwmWinList)
    <pre><font color="yellow">
    XEvent Event;

    XNextEvent(dpy,&Event);
    switch(Event.type)
    {
      case ConfigureNotify:
        {
          XEvent event;

        /* Opaque moves cause lots of these to be sent which causes flickering
         * It's better to miss out on intermediate steps than to do them all
         * and take too long. Look down the event queue and do the last one */
          while (XCheckTypedWindowEvent(dpy, win, ConfigureNotify, &event))
          {
            /* If send_event is true it means the user has moved the window or
             * winlist has mapped itself, take note of the new position.
             * If it is false it comes from the Xserver and is bogus */
            if (!event.xconfigure.send_event)
              continue;
            Event.xconfigure.x = event.xconfigure.x;
            Event.xconfigure.y = event.xconfigure.y;
            Event.xconfigure.send_event = True;
          }
        }
        if (Event.xconfigure.send_event) {
          /* may have to redraw even if win_x == Event.xconfigure.x and 
           * win_y = Event.xconfigure.y for the window shaded operation */
          win_x = Event.xconfigure.x;
          win_y = Event.xconfigure.y;
          if (win_bg == ParentRelative)
            RedrawWindow(True, True); /* clears the window, redraw everything */
        }
        break;
    }

    </font></pre></li>
<li>Whenever a colorset change is handled by the configuration parsing routine
    it must be prepared to handle colorsets changing to and from transparent.
    It would be annoying for a user to try a transparent theme and be stuck with
    it until a restart.</li>
</ul>
The user must also arrange for the window manager frame to support transparency
with the <em>``Style&nbsp;module_name&nbsp;ParentalRelativity''</em> command. This
is not the default style as it results in the root window background being
drawn in windows in some circumstances (which are OK for transparent windows).
<p>
I humbly apologize for <em>ParentalRelativity</em>, it's the only thing I could
think of that wouldn't imply something else. Count yourself lucky that the
opposite setting is <em>Opacity</em> and not <em>Obscurity</em> or
<em>ParentalIndifference</em>

<!------------------------------------------------------------------------
  -- mod_m2f_communication.html 
  ------------------------------------------------------------------------ -->

<h2><font color="turquoise">
Module Writing
</font></h2>

<p>
Before you write a module, you will want to look at a few different
fvwm modules. The techniques used have evolved over time, and no
one module contains all the best techniques. Some of them may be on
this page, but undoubtedly some of them are buried in the source code.</p>

<h2><font color="turquoise">
Module communications protocol
</font></h2>
Modules communicate with fvwm via a simple protocol. In essence, a
textual command line, similar to a command line which could be bound
to a mouse, or key-stroke in the .fvwm2rc, is transmitted to fvwm.
<p>
First the module should send the ID of the window which should be
manipulated. A window ID of ``None'' may be used, in which case Fvwm
will prompt the user to select a window if needed. Next the length of
the the command line is sent as an integer. After that the command
line itself is sent. Finally, an integer 1 is sent if the module plans
to continue operating, or 0 if the module is finished. The following
subroutine is provided as an example of a suitable method of sending
messages to fvwm:
<font color="yellow"><pre>
void SendText(int *fd, char *message, unsigned long window) {
  int w;
  if (message != NULL) {
      write(fd[0],&amp;win,sizeof(Window));
      w=strlen(message);                /* calc the length of the message */
      write(fd[0],&amp;w,sizeof(int));  /* send the message length */
      write(fd[0],message,w);           /* send the message itself */
      /* send a 1, indicating that this module will keep going */
      /* a 0 would mean that this module is done */
      w=1;
      write(fd[0],&amp;w,sizeof(int));
  }
}

</pre></font>
This routine is available as a library function in libfvwm.
For compatibility with older code, there is a macro "SendInfo"
which can be used instead of the function name SendText.
<h2><font color="turquoise">
Module information requests
</font></h2>
There are special built-in functions, Send_WindowList and Send_ConfigInfo.
Send_WindowList causes fvwm to transmit everything that it is
currently thinking about to the module which requests the information.
This information contains the paging status (enabled/disabled),
current desktop number, position on the desktop, current focus and,
for each window, the window configuration, window, icon, and class
names, and, if the window is iconified, the icon location and size.
For example, some modules during start up want to know the state of
all current windows.  The would ask fvwm for this information like this:
<font color="yellow"><pre>
SendText(Channel,"Send_WindowList",0);

</pre></font>
Send_ConfigInfo causes fvwm to send the module a list of all some or all
commands it has received which start with a ``*'', as well as the
some global settings that fvwm is currently using.
This is implemented in fvwm/modconf.c.
Note that "Send_ConfigInfo" is sort of a memory dump type request,
and the number of commands a module might get from this request
may change over time. The module should be prepared to ignore commands
it is not interested in without generating a warning or error.
This request is normally made during module startup for a module
to read its current configuration and some general information.
Fvwm provides some subroutines to make this process fairly painless.
Here is an example from FvwmAnimate.c:
<font color="yellow"><pre>
static void ParseOptions() {
  char *buf;
  InitGetConfigInfo(Channel,MyName);  /* char *MyName = "*FvwmAnimate" */
  while (GetConfigLine(Channel,&buf), buf != NULL) {
    ParseConfigLine(buf);
  }
}

</pre></font>
The call to "InitGetConfigInfo" is optional. If a module wants all
the module commands (commands starting with ``*''), there is no
need to use this command. Most modules only want module commands for
the module itself. As shown in the example above, the second argument includes
the leading asterisk. The match is case insensitive.
<p>
InitGetConfigInfo improves performance. Since the command matching is done in
fvwm2, time is saved in both fvwm2 and the module. Remember that the module
still has to name match if it wants to find its own configuration lines since
other kinds of commands are sent along with module configuration lines.
<h2><font color="turquoise">
Controlling information sent to modules
</font></h2>
Fvwm lets each module control exactly what information is passed
to the module. A module can send the command Set_Mask, followed by
a number which is the bitwise OR of the packet-types the module
wishes to receive. If the module never sends the Set_Mask command,
then all message types in the default mask are sent. The default
mask is defined in fvwm_module_interface.h as "MAX_MASK" and
"DEFAULT_XMSG_MASK". This currently (January 2002) includes all
messages except M_SENDCONFIG and all of the MX_... messages.
A library function, SetMessageMask, makes it easy to set this
mask. Since 2.5.0 was released, the highest bit in the message
mask marks extended messages that were introduced to allow more
than 32 message types.  The type of a message received by a module
can be compared against one of the macros in libs/Module.h as
usual, but when passing a mask to the SetMessageMask, SetSyncMask
or SetNoGrabMask functions, the normal and extended masks must be
set in separate calls.
Here is an example from FvwmGtk.c:
<font color="yellow"><pre>
SetMessageMask(fvwm_fd, M_STRING | M_CONFIG_INFO | M_SENDCONFIG | ...);
SetMessageMask(fvwm_fd, MX_VISIBLE_ICON_NAME);

</pre></font>
This mask is used to reduce the amount of communication between
fvwm and its modules so that a module only gets the messages it
needs.

<h2><font color="turquoise"><a name="M_SENDCONFIG"></a>
Dynamic reconfiguration
</font></h2>
Fvwm can change configuration whilst running and modules can also share this
ability. The <tt><font color="yellow">while(GetConfigLine())</font></tt>
loop gets the current configuration but other module config lines may be added
at any time from a variety of sources.  If a module wants to be notified of
any configuration changes it must set the <em>M_SENDCONFIG</em> bit in the
event mask

<H2> <font color="turquoise">Synchronous vs. Asynchronous Operation</font></h2>
A module normally runs asynchrously with fvwm2. For example FvwmPager
may be updating its display to show a window being iconified while fvwm2 may
have already iconfied and de-iconified the window. This is usually desirable.
Other modules might need to synchronize (a part of) their processing with
fvwm. If this is the case, the module must nform fvwm which packet-types
it wishes to be processed synchronously. There is a mask for this propose.
A library function, SetSyncMask, allows this mask to be set.
Here is an example from FvwmAnimate.c:
<font color="yellow"><pre>
SetSyncMask(Channel,M_ICONIFY|M_DEICONIFY|M_STRING);
</pre></font>
When this mask is set, every message in the mask sent to the
module from fvwm must be answered with an "UNLOCK" message.
FvwmAnimate is the first module to implement this and should be
used as a reference implementation. Note that FvwmAnimate sends the command
"UNLOCK 1". The "1" is currently ignored but may be used in the future.
This facility comes from Afterstep, and we are just tracking what they
have done. The Afterstep documentation doesn't seem to say, but most
likely this is the time in seconds that fvwm should wait for the module
to respond with "UNLOCK" before it proceeds without the module's response.

<!------------------------------------------------------------------------ 
  -- mod_f2m_communication.html 
  ------------------------------------------------------------------------ -->

<h2><font color="turquoise">
When communication takes place
</font></h2>
Fvwm can send messages to the modules in either a broadcast mode, or a
module specific mode. Certain messages regarding important window or desktop
manipulations are broadcast to all modules, whether they want it or not.
Modules are able to request information about current windows from fvwm,
via the Send_WindowList built-in. When invoked this way, only the requesting
module receives the data.

<h2><font color="turquoise">
Communication packet format
</font></h2>
Packets from fvwm to modules conform to a standard format, so modules which
are not interested in broadcast messages can easily ignore them. A header
consisting of 4 unsigned long integers, followed by a body of a variable
length make up a packet. The header always begins with 0xffffffff. This
is provided to help modules re-synchronize to the data stream if necessary.
The next entry describes the packet type. Existing packet types are listed
in the file libs/Module.h (see table below). Additional packet types will
be defined in the future. The third entry
in the header tells the total length of the packet, in unsigned longs,
including the header. The fourth entry is the last time stamp received
from the X server, which is expressed in milliseconds.
<p>
The body information is packet specific, as described below.

<pre><font color="yellow">
     #define <a href="#M_NEW_PAGE"         >M_NEW_PAGE</a>             (1 &lt;&lt; 0)
     #define <a href="#M_NEW_DESK"         >M_NEW_DESK</a>             (1 &lt;&lt; 1)
     #define <a name="obsolete"            >M_OLD_ADD_WINDOW</a>       (1 &lt;&lt; 2)
     #define <a href="#M_RAISE_WINDOW"     >M_RAISE_WINDOW</a>         (1 &lt;&lt; 3)
     #define <a href="#M_LOWER_WINDOW"     >M_LOWER_WINDOW</a>         (1 &lt;&lt; 4)
     #define <a name="obsolete"            >M_OLD_CONFIGURE_WINDOW</a> (1 &lt;&lt; 5)
     #define <a href="#M_FOCUS_CHANGE"     >M_FOCUS_CHANGE</a>         (1 &lt;&lt; 6)
     #define <a href="#M_DESTROY_WINDOW"   >M_DESTROY_WINDOW</a>       (1 &lt;&lt; 7)
     #define <a href="#M_ICONIFY"          >M_ICONIFY</a>              (1 &lt;&lt; 8)
     #define <a href="#M_DEICONIFY"        >M_DEICONIFY</a>            (1 &lt;&lt; 9)
     #define <a href="#M_WINDOW_NAME"      >M_WINDOW_NAME</a>          (1 &lt;&lt; 10)
     #define <a href="#M_ICON_NAME"        >M_ICON_NAME</a>            (1 &lt;&lt; 11)
     #define <a href="#M_RES_CLASS"        >M_RES_CLASS</a>            (1 &lt;&lt; 12)
     #define <a href="#M_RES_NAME"         >M_RES_NAME</a>             (1 &lt;&lt; 13)
     #define <a href="#M_END_WINDOWLIST"   >M_END_WINDOWLIST</a>       (1 &lt;&lt; 14)
     #define <a href="#M_ICON_LOCATION"    >M_ICON_LOCATION</a>        (1 &lt;&lt; 15)
     #define <a href="#M_MAP"              >M_MAP</a>                  (1 &lt;&lt; 16)
     #define <a href="#M_ERROR"            >M_ERROR</a>                (1 &lt;&lt; 17)
     #define <a href="#M_CONFIG_INFO"      >M_CONFIG_INFO</a>          (1 &lt;&lt; 18)
     #define <a href="#M_END_CONFIG_INFO"  >M_END_CONFIG_INFO</a>      (1 &lt;&lt; 19)
     #define <a href="#M_ICON_FILE"        >M_ICON_FILE</a>            (1 &lt;&lt; 20)
     #define <a href="#M_DEFAULTICON"      >M_DEFAULTICON</a>          (1 &lt;&lt; 21)
     #define <a href="#M_STRING"           >M_STRING</a>               (1 &lt;&lt; 22)
     #define <a href="#M_MINI_ICON"        >M_MINI_ICON</a>            (1 &lt;&lt; 23)
     #define <a href="#M_WINDOWSHADE"      >M_WINDOWSHADE</a>          (1 &lt;&lt; 24)
     #define <a href="#M_DEWINDOWSHADE"    >M_DEWINDOWSHADE</a>        (1 &lt;&lt; 25)
     #define <a href="#M_VISIBLE_NAME"     >M_VISIBLE_NAME</a>         (1 &lt;&lt; 26)
     #define <a href="#M_SENDCONFIG"       >M_SENDCONFIG</a>           (1 &lt;&lt; 27)
     #define <a href="#M_RESTACK"          >M_RESTACK</a>              (1 &lt;&lt; 28)
     #define <a href="#M_ADD_WINDOW"       >M_ADD_WINDOW</a>           (1 &lt;&lt; 29)
     #define <a href="#M_CONFIGURE_WINDOW" >M_CONFIGURE_WINDOW</a>     (1 &lt;&lt; 30)
     #define <a href="#M_EXTENDED_MSG"     >M_EXTENDED_MSG</a>         (1 &lt;&lt; 31)

     #define <a href="#MX_VISIBLE_ICON_NAME">MX_VISIBLE_ICON_NAME</a>  (1 &lt;&lt; 0 + M_EXTENDED_MSG)
     #define <a href="#MX_ENTER_WINDOW"     >MX_ENTER_WINDOW</a>       (1 &lt;&lt; 1 + M_EXTENDED_MSG)
     #define <a href="#MX_LEAVE_WINDOW"     >MX_LEAVE_WINDOW</a>       (1 &lt;&lt; 2 + M_EXTENDED_MSG)
     #define <a href="#MX_PROPERTY_CHANGE"  >MX_PROPERTY_CHANGE</a>    (1 &lt;&lt; 3 + M_EXTENDED_MSG)

<h2><a name="M_NEW_PAGE"></a>
M_NEW_PAGE
</h2>
These packets contain 5 integers. The first two are the x and y coordinates
of the upper left corner of the current viewport on the virtual desktop.
The third value is the number of the current desktop. The fourth and fifth
values are the maximum allowed values of the coordinates of the upper-left
hand corner of the viewport.

<h2><a name="M_NEW_DESK"></a>
M_NEW_DESK
</h2>
The body of this packet consists of a single long integer, whose value
is the number of the currently active desktop. This packet is transmitted
whenever the desktop number is changed.

<h2><a name="M_ADD_WINDOW"></a><a name="M_CONFIGURE_WINDOW"></a>
M_ADD_WINDOW, and M_CONFIGURE_WINDOW
</h2>
These packets contain 25 values.
The first value is the ID of the affected application's top level window,
the next is the ID of the Fvwm frame window, and the final value is the
pointer to Fvwm's internal database entry for that window. The
pointer itself is of no use to a module, it is there for backward
compatibilty with older modules.
The next 22 identify the location and size, as described in the table below.
Configure packets will be generated when the viewport on the current desktop
changes, or when the size or location of the window is changed. The flags
field is an bitwise OR of the flags defined in fvwm.h.

Important note:  The individual fields of the packet must not be
accessed directly with the 'body' member of the packet structure.
THe size of these fields may change in the future and has changed
in the past, thus breaking any module relying on the exact
position of the value in the packet.  Instead, use the structures
defined in libs/vpacket.h.
<p>
<table align="center" border>
<tr>
<td align="right">0</td>
<td>ID of the application's top level window</td>
</tr><tr>
<td align="right">1</td>
<td>ID of the Fvwm frame window</td>
</tr><tr>
<td align="right">2</td>
<td>Pointer to the Fvwm database entry (not useful)</td>
</tr><tr>
<td align="right">3</td>
<td>X location of the window's frame</td>
</tr><tr>
<td align="right">4</td>
<td>Y location of the window's frame</td>
</tr><tr>
<td align="right">5</td>
<td>Width of the window's frame</td>
</tr><tr>
<td align="right">6</td>
<td>Height of the window's frame</td>
</tr><tr>
<td align="right">7</td>
<td>Desktop number</td>
</tr><tr>
<td align="right">8</td>
<td>Layer number</td>
</tr><tr>
<td align="right">9</td>
<td>Window Title Height</td>
</tr><tr>
<td>10</td>
<td>Window Border Width</td>
</tr><tr>
<td>11</td>
<td>Window Base Width</td>
</tr><tr>
<td>12</td>
<td>Window Base Height</td>
</tr><tr>
<td>13</td>
<td>Window Resize Width Increment</td>
</tr><tr>
<td>14</td>
<td>Window Resize Height Increment</td>
</tr><tr>
<td>15</td>
<td>Window Minimum Width</td>
</tr><tr>
<td>16</td>
<td>Window Minimum Height</td>
</tr><tr>
<td>17</td>
<td>Window Maximum Width</td>
</tr><tr>
<td>18</td>
<td>Window Maximum Height</td>
</tr><tr>
<td>19</td>
<td>Icon Label Window ID, or 0</td>
</tr><tr>
<td>20</td>
<td>Icon Pixmap Window ID, or 0</td>
</tr><tr>
<td>21</td>
<td>Window Gravity</td>
</tr><tr>
<td>22</td>
<td>Pixel value of the text color</td>
</tr><tr>
<td>23</td>
<td>Pixel value of the window border color</td>
</tr><tr>
<td>24</td>
<td>Style flags</td>
</tr>
</table>

<h2>
<a name="M_LOWER_WINDOW"></a><a name="M_RAISE_WINDOW"></a><a name="M_DESTROY_WINDOW"></a>
M_LOWER_WINDOW, M_RAISE_WINDOW, and M_DESTROY_WINDOW
</h2>
These packets contain just the first three values of
<a href="#M_ADD_WINDOW">M_ADD_WINDOW</a>.

<h2>
<a name="M_FOCUS_CHANGE"></a>
M_FOCUS_CHANGE
</h2>
These packets contain 5 values, all of the same size as an unsigned long.
The first value is the ID of the affected application's (the application
which now has the input focus) top level window, the next is the ID of
the Fvwm frame window, and the third value is set to 0 when the focus change
is from the Focus command and 1 for all other focus changes (FlipFocus,
focusing with the mouse etc.). The third value can be used by the module
to manage the windowlist in the same way as Fvwm i.e. 0 means rotate the
list around to the target, 1 means pluck the target from the list and insert
at the beginning. The fourth and fifth values are the text focus color's
pixel value and the window border's focus color's pixel value. In the event
that the window which now has the focus is not a window which fvwm recognizes,
only the ID of the affected application's top level window is passed. Zeros
are passed for the other values.
<p>
<table align="center" border>
<tr>
<td align="right">0</td>
<td>ID of the application's top level window</td>
</tr><tr>
<td align="right">1</td>
<td>ID of the Fvwm frame window</td>
</tr><tr>
<td align="right">2</td>
<td>Focus change type</td>
</tr><tr>
<td align="right">3</td>
<td>Hilight text color</td>
</tr><tr>
<td align="right">4</td>
<td>Hilight background color</td>
</tr>
</table>

<h2>
<a name="M_ICON_LOCATION"></a>
M_ICON_LOCATION
</h2>
These packets contain 7 values. The first 3 are the same as
<a href="#M_ADD_WINDOW">M_ADD_WINDOW</a>,
and the next four describe the location and size of the icon,
as described in the table. An M_ICON_LOCATION packet will be sent when
an icon is created or moved and when the icon window is changed via the XA_WM_HINTS
in a property notify event.
<p>
<table align="center" border>
<tr>
<td>0</td>
<td>ID of the application's top level window</td>
</tr><tr>
<td>1</td>
<td>ID of the Fvwm frame window</td>
</tr><tr>
<td>2</td>
<td>Pointer to the Fvwm database entry (not useful)</td>
</tr><tr>
<td>3</td>
<td>X location of the icon</td>
</tr><tr>
<td>4</td>
<td>Y location of the icon</td>
</tr><tr>
<td>5</td>
<td>Width of the icon</td>
</tr><tr>
<td>6</td>
<td>Height of the icon</td>
</tr>
</table>

<h2>
<a name="M_ICONIFY"></a>
M_ICONIFY
</h2>
These packets contain 7 or 11 values. The first 3 are the same as
<a href="#M_ADD_WINDOW">M_ADD_WINDOW</a>, and the next 4 values describe
the location and size of the icon. If 4 further items are sent they are
the location and size of the window being iconified. Note that M_ICONIFY
packets are also sent whenever a window is started in the iconic state.
<p>
In addition, if a window which has transients is iconified,
then an M_ICONIFY packet is sent for each transient window, with the icon x and
y fields set to -10000. This packet will be sent even if
the transients were already iconified. Note that no icons are actually
generated for the transients in this case.
<p>
If a window has the NoIcon style the width and height of the icon window are
set to 0 and the location is meaningless.
<p>
<table align="center" border>
<tr>
<td align="right">0</td>
<td>ID of the application's top level window</td>
</tr><tr>
<td align="right">1</td>
<td>ID of the Fvwm frame window</td>
</tr><tr>
<td align="right">2</td>
<td>Pointer to the Fvwm database entry</td>
</tr><tr>
<td align="right">3</td>
<td>X location of the icon</td>
</tr><tr>
<td align="right">4</td>
<td>Y location of the icon</td>
</tr><tr>
<td align="right">5</td>
<td>Width of the icon</td>
</tr><tr>
<td align="right">6</td>
<td>Height of the icon</td>
</tr><tr>
<td align="right">7</td>
<td>X location of the window's frame</td>
</tr><tr>
<td align="right">8</td>
<td>Y location of the window's frame</td>
</tr><tr>
<td align="right">9</td>
<td>Width of the window's frame</td>
</tr><tr>
<td>10</td>
<td>Height of the window's frame</td>
</tr>
</table>

<h2>
<a name="M_DEICONIFY"></a>
M_DEICONIFY
</h2>
These packets contain up to 3, 7 or 11 values starting with the usual window identifiers.
The packet is sent when a window is de-iconified. Like M_ICONIFY icon and window
location and size are sent.

<h2>
<a name="M_MAP"></a>
M_MAP
</h2>
These packets contain 3 values, which are the usual window identifiers.
The packets are sent when a window is mapped, if it is not being deiconified.
This is useful to determine when a window is finally mapped, after being
added.

<h2>
<a name="M_WINDOW_NAME"></a><a name="M_ICON_NAME"></a><a name="M_RES_CLASS"></a><a name="M_RES_NAME"></a>
M_WINDOW_NAME, M_ICON_NAME, M_RES_CLASS and M_RES_NAME
</h2>
These packets contain 3 values, which are the usual window identifiers,
followed by a variable length character string. The packet size field in the
header is expressed in units of unsigned longs, and the packet is zero-padded
until it is the size of an unsigned long.  The RES_CLASS and RES_NAME fields
are fields in the XClass structure for the window. Icon and Window name
packets will be sent upon window creation or whenever the name is
changed. The RES_CLASS and RES_NAME packets are sent on window creation.
All packets are sent in response to a Send_WindowList request from a module.

<h2>
<a name="M_VISIBLE_NAME"></a><a name="MX_VISIBLE_ICON_NAME"></a>
MX_VISIBLE_NAME, MX_VISIBLE_ICON_NAME
</h2>
These packets are similar to the M_WINDOW_NAME and M_ICON_NAME packets
(respectively). The difference is that they contain the window and
icon title that fvwm displays (which may be differrent than the
Window name and the Icon name if the IndexedWindowName and IndexedIconName
fvwm styles are used).

<h2>
<a name="M_END_WINDOWLIST"></a>
M_END_WINDOWLIST
</h2>
These packets contain no values. This packet is sent to mark the end of
transmission in response to a Send_WindowList request. A module which requests
Send_WindowList, and processes all packets received between the request
and the M_END_WINDOWLIST will have a snapshot of the status of the desktop.

<h2>
<a name="M_ERROR"></a>
M_ERROR
</h2>
When fvwm has an error message to report, it is echoed to the modules in
a packet of this type. This packet has 3 values, all zero, followed by
a variable length string which contains the error message.

<h2>
<a name="M_CONFIG_INFO"></a>
M_CONFIG_INFO
</h2>
Fvwm records all configuration commands that it encounters which begins
with the character ``*''. When the built-in command ``Send_ConfigInfo''
is invoked by a module, this entire list is transmitted to the module in
packets (one line per packet) of this type. The packet consists of three
zeros, followed by a variable length character string. In addition, the
DeskTopSize, ImagePath, ColorLimit, Colorset and XineramaConfig
definitions are sent to the module. The XineramaConfig string is
followed by the primary screen number (counting from 1 upwards, 0
for the global screen or -1 if Xinerama is disabled).
<p>Note that all the module configuration commands are sent. Each module
has to check the configuration commands to see if it is a command for that
specific module. This is actually a feature. This way one module can learn
about all other modules configurations. Also fvwm doesn't currently know
anything about module aliases (this is not correct anymore, the alias name
is guessed from the command line).
<p>Starting with release 2.0.47, a module can set M_SENDCONFIG on in its
mask and receive M_CONFIG_INFO packets while it is running. (M_CONFIG_INFO
has to be on also.) A module can use M_SENDCONFIG to be able to change
configuration while it is running. Refer to module FvwmAnimate for an
example.

<h2><a name="M_END_CONFIG_INFO"></a>
M_END_CONFIG_INFO
</h2>
After fvwm sends all of its M_CONFIG_INFO packets to a module, it sends
a packet of this type to indicate the end of the configuration information.
This packet contains no values. This packet it not sent for subsequent
config lines sent when the M_SENDCONFIG mask bit is on.

<h2>
<a name="M_ICON_FILE"></a>
M_ICON_FILE
</h2>
This packet is broadcast when a window is added or during send window list.
It is only sent for windows that have icons defined, and contains the usual 3
identifiers plus the filename of the icon.

<h2>
<a name="M_DEFAULTICON"></a>
M_DEFAULTICON
</h2>
This packet is sent during send window list. This is the icon associated
with Style "*". The packet contains the filename of the icon.

<h2>
<a name="M_STRING"></a>
M_STRING
</h2>
This packet is sent when a "SendToModule" command is processed. It contains the
usual 3 window identifiers (of the current window) plus the actual string.

<h2>
<a name="M_MINI_ICON"></a>
M_MINI_ICON
</h2>
This packet is broadcast when a window is added or during send window list.
It is only sent for windows that have mini_icons defined, and contains
the filename of the mini_icon. It contains the 3 window identifiers followed by
the width and height of the mini_icon, the depth (which is useless, it is always
the depth of the visual that fvwm is using), the window ID of the pixmap and mask,
and finally a string that is the path to the file (also not useful).

<h2>
<a name="M_WINDOWSHADE"></a><a name="M_DEWINDOWSHADE"></a>
M_WINDOWSHADE and M_DEWINDOWSHADE
</h2>
This packet is sent when a window is window shaded. It contains just the
window identifiers.

<h2>
<a name="M_SENDCONFIG"></a>
M_SENDCONFIG
</h2>
This is a dummy packet that is never sent by fvwm and is described under
<a href="mod_m2f_communication.html#M_SENDCONFIG">Module to Fvwm communication</a>.

<h2>
<a name="M_RESTACK"></a>
M_RESTACK
</h2>
This packet is sent when the stacking order changes. It contains a list
of windows, each one being given by its three identifiers. The meaning
is that the first window keeps its position in the stacking order and all
subsequent windows are restacked below it (like XRestackWindows).

<h2>
<a name="MX_ENTER_WINDOW"></a><a name="MX_LEAVE_WINDOW"></a>
MX_ENTER_WINDOW, MX_LEAVE_WINDOW
</h2>
These packets are sent when the pointer enters or leaves a window.
It contains just the window identifiers. Note that multiple packets of the
same type for the same window may be sent at any time.

<h2>
<a name="MX_PROPERTY_CHANGE"></a>
MX_PROPERTY_CHANGE
</h2>
This packet is an all purpose message. It contains 3 values followed by a
variable length character string. The first value is the type of the
message, the others values depend on the message type. The message types are:
<b>MX_PROPERTY_CHANGE_BACKGROUND</b> and <b>MX_PROPERTY_CHANGE_SWALLOW</b>.
<p>
<b>MX_PROPERTY_CHANGE_BACKGROUND</b> is sent by fvwm and FvwmButtons (and
maybe other modules) to indicate a background change. If the 3rd value
is 0, it means that the root background changed. (fvwm sends this message
when it detects the change).
If the 3rd value is not zero it is the window id
of the module which should be concerned by the message.
This indicates that
the parent(s) window background of this module has changed.
(FvwmButtons
sends this message for the modules that it swallows, when its background
colorset changes).
The string and the second value are not used.
<br><br>
<b>MX_PROPERTY_CHANGE_SWALLOW</b> is sent by FvwmButtons (and
maybe other modules) to indicate that the module with the window id given by the
3rd value has been swallowed or unswallowed. It is a swallowed message
if the 2nd value is 1 and it is an unswallowed message if the 2nd value is 0.
The string is not used.
<br><br>
There is a fvwm command which causes modules to send such message:
<br><br>
<b>PropertyChange</b> 1st_value 2nd_value 3rd_value "string"

<p>


<?php decoration_window_end(); ?>
