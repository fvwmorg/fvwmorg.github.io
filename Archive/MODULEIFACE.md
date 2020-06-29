---
title: Module Interface
showtitle: 1
permalink: /Archive/ModuleInterface/index.html
---

* TOC
{:toc #toc-full}


## Concept

The module interface has several design goals:

* Modules are used to implement "extra" or "elaborate" features so that the
  additional resources these features take don't affect users that don't want
  to sacrifice the resources.
* Modules (user programs) should be able to provide the window manager with a
  limited amount of instruction regarding instructions to execute.
* Modules should not be able to corrupt the internal data bases maintained by
  fvwm, nor should unauthorized modules be able to interface to fvwm.
* Modules should be able to extract all or nearly all information held by the
  window manager, in a simple manner, to provide users with feedback not
  available from built in services.
* Modules should gracefully terminate when the window manager dies,
  quits, or is re-started.
* It should be possible for programmer-users to add modules without
  understanding the internals of fvwm. Ideally, modules could be written in
  some scripting language such as Tcl/Tk, Perl/Tk, etc.

## Security

Limited effort has been placed on security issues. In short, modules can not
communicate with fvwm unless they are launched by fvwm, which means that they
must be listed in the user's .fvwmrc file. Modules can only issue commands to
fvwm that could be issued from a menu or key binding. These measures do not
keep a poorly written module from destroying windows or terminating an X
session, but they do keep users from maliciously connecting to another users
window manager, and it should keep modules from corrupting the fvwm internal
databases.

## Initialisation

Modules MUST be launched by fvwm that will first open a pair of pipes for
communication with the module. One pipe is for messages to fvwm from the
module, and the other is for messages to the module from fvwm. Each module has
its own pair of pipes. After the pipes are open, fvwm will fork and exec the
module. Modules not specified with an absolute path must be located in the
ModulePath, as specified in the user's .fvwm2rc file. Modules can be initiated
as fvwm starts up, or can be launched part way through an X session.

## Module Arguments

### Arg 0

Like any UNIX program, arg 0 is the full pathname of the module. Most modules
acquire this for use in error message, parsing their own configuration
commands, some other possible uses. Arg 0 is related to the optional arg 6
described under "Module Aliases".

### Arg 1 & 2

The pipes are open when the module starts execution. The integer file
descriptors are passed to the module as the first and second command line
arguments.

### Arg 3

The third command line argument is a character pointer pointing to the full
path name of the configuration file from which the module was started. If the
module was not started from any configuration file (for example, it is started
from StartFunction), this arg points to a string containing "none". This
argument is mostly for backward compatibility with old modules.

### Arg 4

The next command line argument is the application window in whose context the
module was launched. This is 0 if the module is launched without an
application window context.

### Arg 5

The next argument is the context of the window decoration in which the module
was launched. Contexts are listed below:

```
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
```

### Arg 6 and above

A number of user specified command line arguments may be present (optional).
Any number of arguments may be passed. For example, in:

```
Module  "FvwmIdent" Hello rob! '-fg purple'
```

we would get: `argv[6] = ``Hello''`, `argv[7] = 'rob!'`, `argv[8] = '-fg purple'`

## Acquiring Read/Write Pipes

The following mechanism is recommended to acquire the pipe descriptors:

```
int fd[2];
void main(int argc, char **argv) {
  if((argc < 6)) {
    fprintf(stderr,
      "%s: Should only be executed by fvwm!\n", argv[0]);
    exit(1);
  }
  fd[0] = atoi(argv[1]);
  fd[1] = atoi(argv[2]);
```

The descriptor `fd[0]` is available for the module to send messages to fvwm,
while the descriptor `fd[1]` is available to read messages from fvwm. Since `int
fd[2]` is an array, you will often see modules send commands to fvwm with the
construct `SendText(fd,"Command",0);`. Of course, they really mean
`SendText(&fd[0],"Command",0);`.

## Pipe Status

Special attention is paid to the status of the pipe. If fvwm gets a read error
on a module-to-fvwm pipe, then it assumes that the module is terminating, and
all communication with the module is terminated. Similarly, if a module gets a
read error on an fvwm-to-module pipe, then it should assume that fvwm is
terminating, and it should gracefully shut down. All modules should also allow
themselves to be shut down via the Delete Window protocol for X11.

## Reading Initial Configuration Information

In previous implementations, the modules were expected to read and parse the
.fvwmrc file by themselves. This caused some difficulty if a pre-processor was
used on the .fvwmrc file. In fvwm-2.0 and later, fvwm retains the module
command lines (those which start with a `*`), and passes them to any module
on request. Modules can request the command list by sending a
`Send_ConfigInfo` command to fvwm. Modules can request configuration
commands to be sent whenever fvwm reads one, even after the module has started
up, see `M_SENDCONFIG` in module-to-fvwm Communication.

## Colorset Support

When a module requests configuration information the configuration commands
sent are preceded by some global configuration lines and a list of colorsets.
In order to use colorsets a module must do the following:


* Make sure -lm is contained in the LDADD variable in Makefile.am
* #include "libs/Colorset.h"
* Call InitPictureCMap() just after XOpenDisplay() to get access to the visuals
  that fvwm uses. Sharing pixmaps will not work unless you use the same colormap.
  This means that the module cannot create a top level window with
  `XCreateSimpleWindow`. It must use XCreateWindow() and specify the visual as
  Pvisual, the colormap as Pcmap, the depth as Pdepth, the background and border
  pixels must also be specified otherwise they default to CopyFromParent which
  may give an error.
* Call AllocColorset(0) to initialize the colorset array.
* Set the M_SENDCONFIG bit in the message mask
* In the configuration parsing routine look for Colorset and pass the line to
  LoadColorset()
* Add additional configuration commands such as *<module_name>: Colorset and
  parse them. Colorsets usually duplicate static settings of foreground and
  background so you probably want a different colorset option for each background
  color option.
* Add some state to select between using a colorset or a fore/background color
  for an object. The convention is that the last configuration command takes
  precedence.
* The module must wait on select() not XNextEvent(). The select() must include
  the fvwm pipe so that messages from fvwm can be read. Any M_CONFIG_INFO message
  must be passed to the option parser so that a colorset message can be passed on
  to LoadColorset(). If a colorset that is referenced is changed the module must
  redraw itself. Don't forget that colorset backgrounds have to be redrawn when
  the window is resized.
* Accessing colorset N must be done with via Colorset[N]. Colorset[] is a
  global array in libs/Colorset.c. It is a good idea to call AllocColorset(N)
  whenever N is changed before trying to access Colorset[n]. The pixels available
  are:
	* fg: the foreground pixel
	* bg: the background pixel
	* hilite: the top and left shadow pixel
	* shadow: the bottom and right shadow pixel
* SetWindowBackground() takes a colorset pointer, generates an appropriate
  background for the window. An additional input enables the background to be
  painted and generates an expose event so the normal event handling will
  repaint the window. If performance is critical the module should clear the
  window itself and call it's repaint routine to save a round trip delay.
* CreateBackgroundPixmap() creates the pixmap used by SetWindowBackground() in
  case you want to paint the background manually, you have to check that the
  colorset contains a valid pixmap first though: (cset.pixmap && cset.pixmap
  !=  ParentRelative). Note that if you call this function with a colorset
  that has no pixmap, it returns a pixmap filled with the cset.bg pixel.
* SetRectangleBackground() draws the background provided in a colorset
  directly into the specified rectangle of a target drawable. Note that this
  creates and deletes a pixmap internally every time it is used.
* CreateBackgroundPixmap() does not handle the shape mask in the colorset at
  all while SetRectangleBackground() only draws the pixels selected in the
  shape mask. Only SetWindowBackground() will shape a window with the shape
  mask. Thus SetWindowBackground() should be used for the application's main
  window while shaping is optional everywhere else.

## Transparency

Fvwm and modules can implement a limited form of transparency. It does not
allow the contents of one window to show through another but instead copies
the parent window background into the window. X11 makes it impossible to
examine the background color or pixmap of any window so there is no facility
to tint or shade the root window background. Transpency is only supported in
colorsets and it won't work if you start fvwm with the -visual option.

In order to support transparency a module must do the following:

* Detect transparency in a colorset by (colorset.pixmap == ParentRelative).
* For any item that may be drawn with a transparent colorset set the window
  background pixmap to ParentRelative and all ancestor windows up to the top
  level window. SetWindowBackground() will do this for a single window.
* If any window that has been set to ParentRelative is drawn with a
  non-transparent colorset CreateBackgroundPixmap() must be used together with
  XFillRectangle() to paint the background instead of SetWindowBackground().
* Detect if the parent window background changes. This can be achieved by
  monitoring the MX_PROPERTY_CHANGE fvwm to module message.
* If the window is likely to be moved or repositions itself the module must
  handle ConfigureNotify events and repaint the whole window whenever it is
  moved. This is because X servers only handle ParentRelative on the window
  that moves (the window manager frame) and don't propogate the background
  down to any descendants of a ParentRelative window. Luckily most fvwm
  modules will only be run by fvwm and there is a reliable method of handling
  this situation (from FvwmWinList)

  ```
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
        if (Event.xconfigure.send_event)
        {
          /* may have to redraw even if win_x == Event.xconfigure.x and 
           * win_y = Event.xconfigure.y for the window shaded operation */
          win_x = Event.xconfigure.x;
          win_y = Event.xconfigure.y;
          if (win_bg == ParentRelative)
            RedrawWindow(True, True); /* clears the window, redraw everything */
        }
        break;
    }
  ```

* Whenever a colorset change is handled by the configuration parsing routine
  it must be prepared to handle colorsets changing to and from transparent. It
  would be annoying for a user to try a transparent theme and be stuck with it
  until a restart.

The user must also arrange for the window manager frame to support
transparency with the ``Style module_name ParentalRelativity'' command. This
is not the default style as it results in the root window background being
drawn in windows in some circumstances (which are OK for transparent windows).

I humbly apologize for ParentalRelativity, it's the only thing I could think
of that wouldn't imply something else. Count yourself lucky that the opposite
setting is Opacity and not Obscurity or ParentalIndifference.

## Module Writing

Before you write a module, you will want to look at a few different fvwm
modules. The techniques used have evolved over time, and no one module
contains all the best techniques. Some of them may be on this page, but
undoubtedly some of them are buried in the source code.

## Module Communication Protocol

Modules communicate with fvwm via a simple protocol. In essence, a textual
command line, similar to a command line which could be bound to a mouse, or
key-stroke in the .fvwm2rc, is transmitted to fvwm.

First the module should send the ID of the window which should be manipulated.
A window ID of ``None'' may be used, in which case fvwm will prompt the user
to select a window if needed. Next the length of the the command line is sent
as an integer. After that the command line itself is sent. Finally, an integer
1 is sent if the module plans to continue operating, or 0 if the module is
finished. The following subroutine is provided as an example of a suitable
method of sending messages to fvwm:

```
void SendText(int *fd, char *message, unsigned long window)
{
  int w;
  if (message != NULL)
  {
      write(fd[0], &win, sizeof(Window));
      w=strlen(message);                  /* calc the length of the message */
      write(fd[0], &w, sizeof(int));  /* send the message length */
      write(fd[0], message, w);           /* send the message itself */
      /* send 1, indicating that this module will keep going */
      /* 0 would mean that this module is done */
      w = 1;
      write(fd[0], &w, sizeof(int));
  }
}
```

This routine is available as a library function in libfvwm. For compatibility
with older code, there is a macro "SendInfo" which can be used instead of the
function name SendText.

## Module Information Requests

There are special built-in functions, Send_WindowList, Send_ConfigInfo and
Send_Reply. Send_WindowList causes fvwm to transmit everything that it is
currently thinking about to the module which requests the information. This
information contains the paging status (enabled/disabled), current desktop
number, position on the desktop, current focus and, for each window, the
window configuration, window, icon, and class names, and, if the window is
iconified, the icon location and size. For example, some modules during start
up want to know the state of all current windows. The would ask fvwm for this
information like this:

```
SendText(Channel,"Send_WindowList",0);
```

Send_ConfigInfo causes fvwm to send the module a list of all some or all
commands it has received which start with a ``*'', as well as the some global
settings that fvwm is currently using. This is implemented in fvwm/modconf.c.
Note that "Send_ConfigInfo" is sort of a memory dump type request, and the
number of commands a module might get from this request may change over time.
The module should be prepared to ignore commands it is not interested in
without generating a warning or error. This request is normally made during
module startup for a module to read its current configuration and some general
information. Fvwm provides some subroutines to make this process fairly
painless. Here is an example from FvwmAnimate.c:

```
static void ParseOptions()
{
  char *buf;
  InitGetConfigInfo(Channel, MyName);  /* char *MyName = "*FvwmAnimate" */
  while (GetConfigLine(Channel, &buf), buf != NULL){
	 ParseConfigLine(buf);
  }
}
```

The call to "InitGetConfigInfo" is optional. If a module wants all the module
commands (commands starting with `*`), there is no need to use this command.
Most modules only want module commands for the module itself. As shown in the
example above, the second argument includes the leading asterisk. The match is
case insensitive.

InitGetConfigInfo improves performance. Since the command matching is done in
fvwm, time is saved in both fvwm and the module. Remember that the module
still has to name match if it wants to find its own configuration lines since
other kinds of commands are sent along with module configuration lines.

`Send_Reply` causes fvwm to send back a string to the sending module. This may
be used to accnowledge that fvwm has reached a certain point in the message
queue, or to get some information from fvwm variable expansion.

## Controlling Information Sent to Modules

Fvwm lets each module control exactly what information is passed to the
module. A module can send the command Set_Mask, followed by a number which is
the bitwise OR of the packet-types the module wishes to receive. If the module
never sends the Set_Mask command, then all message types in the default mask
are sent. The default mask is defined in fvwm_module_interface.h as "MAX_MASK"
and "DEFAULT_XMSG_MASK". This currently (January 2002) includes all messages
except M_SENDCONFIG and all of the MX_... messages. A library function,
SetMessageMask, makes it easy to set this mask. Since 2.5.0 was released, the
highest bit in the message mask marks extended messages that were introduced
to allow more than 32 message types. The type of a message received by a
module can be compared against one of the macros in libs/Module.h as usual,
but when passing a mask to the SetMessageMask, SetSyncMask or SetNoGrabMask
functions, the normal and extended masks must be set in separate calls. Here
is an example from FvwmGtk.c:

```
SetMessageMask(fvwm_fd, M_STRING | M_CONFIG_INFO | M_SENDCONFIG | ...);
SetMessageMask(fvwm_fd, MX_VISIBLE_ICON_NAME);
```

This mask is used to reduce the amount of communication between fvwm and its
modules so that a module only gets the messages it needs.

## Dynamic Reconfiguration

Fvwm can change configuration whilst running and modules can also share this
ability. The while (GetConfigLine()) loop gets the current configuration but
other module config lines may be added at any time from a variety of sources.
If a module wants to be notified of any configuration changes it must set the
`M_SENDCONFIG bit` in the event mask

## Synchronous vs. Asynchronous Operation

A module normally runs asynchrously with fvwm. For example FvwmPager may be
updating its display to show a window being iconified while fvwm may have
already iconfied and de-iconified the window. This is usually desirable. Other
modules might need to synchronize (a part of) their processing with fvwm. If
this is the case, the module must nform fvwm which packet-types it wishes to
be processed synchronously. There is a mask for this propose. A library
function, SetSyncMask, allows this mask to be set. Here is an example from
FvwmAnimate.c:

```
SetSyncMask(Channel,M_ICONIFY|M_DEICONIFY|M_STRING);
```

When this mask is set, every message in the mask sent to the module from fvwm
must be answered with an "UNLOCK" message. FvwmAnimate is the first module to
implement this and should be used as a reference implementation. Note that
FvwmAnimate sends the command "UNLOCK 1". The "1" is currently ignored but may
be used in the future. This facility comes from Afterstep, and we are just
tracking what they have done. The Afterstep documentation doesn't seem to say,
but most likely this is the time in seconds that fvwm should wait for the
module to respond with "UNLOCK" before it proceeds without the module's
response.

## When communication takes place

Fvwm can send messages to the modules in either a broadcast mode, or a module
specific mode. Certain messages regarding important window or desktop
manipulations are broadcast to all modules, whether they want it or not.
Modules are able to request information about current windows from fvwm, via
the Send_WindowList built-in. When invoked this way, only the requesting
module receives the data.

## Communication packet format

Packets from fvwm to modules conform to a standard format, so modules which
are not interested in broadcast messages can easily ignore them. A header
consisting of 4 unsigned long integers, followed by a body of a variable
length make up a packet. The header always begins with 0xffffffff. This is
provided to help modules re-synchronize to the data stream if necessary. The
next entry describes the packet type. Existing packet types are listed in the
file libs/Module.h (see table below). Additional packet types will be defined
in the future. The third entry in the header tells the total length of the
packet, in unsigned longs, including the header. The fourth entry is the last
time stamp received from the X server, which is expressed in milliseconds.

The body information is packet specific, as described below.

```
#define M_NEW_PAGE       	(1 << 0)
#define M_NEW_DESK             	(1 << 1)
#define M_OLD_ADD_WINDOW       	(1 << 2)
#define M_RAISE_WINDOW         	(1 << 3)
#define M_LOWER_WINDOW         	(1 << 4)
#define M_OLD_CONFIGURE_WINDOW 	(1 << 5)
#define M_FOCUS_CHANGE         	(1 << 6)
#define M_DESTROY_WINDOW       	(1 << 7)
#define M_ICONIFY              	(1 << 8)
#define M_DEICONIFY            	(1 << 9)
#define M_WINDOW_NAME          	(1 << 10)
#define M_ICON_NAME            	(1 << 11)
#define M_RES_CLASS            	(1 << 12)
#define M_RES_NAME             	(1 << 13)
#define M_END_WINDOWLIST       	(1 << 14)
#define M_ICON_LOCATION        	(1 << 15)
#define M_MAP                  	(1 << 16)
#define M_ERROR                	(1 << 17)
#define M_CONFIG_INFO          	(1 << 18)
#define M_END_CONFIG_INFO      	(1 << 19)
#define M_ICON_FILE            	(1 << 20)
#define M_DEFAULTICON          	(1 << 21)
#define M_STRING               	(1 << 22)
#define M_MINI_ICON            	(1 << 23)
#define M_WINDOWSHADE          	(1 << 24)
#define M_DEWINDOWSHADE        	(1 << 25)
#define M_VISIBLE_NAME         	(1 << 26)
#define M_SENDCONFIG           	(1 << 27)
#define M_RESTACK              	(1 << 28)
#define M_ADD_WINDOW           	(1 << 29)
#define M_CONFIGURE_WINDOW     	(1 << 30)
#define M_EXTENDED_MSG         	(1 << 31)
#define MX_VISIBLE_ICON_NAME   	(1 << 0 + M\_EXTENDED\_MSG)
#define MX_ENTER_WINDOW        	(1 << 1 + M\_EXTENDED\_MSG)
#define MX_LEAVE_WINDOW        	(1 << 2 + M\_EXTENDED\_MSG)
#define MX_PROPERTY_CHANGE     	(1 << 3 + M\_EXTENDED\_MSG)
#define MX_REPLY               	(1 << 4 + M\_EXTENDED\_MSG)
```

### M\_NEW\_PAGE

These packets contain 5 integers. The first two are the x and y coordinates of
the upper left corner of the current viewport on the virtual desktop. The
third value is the number of the current desktop. The fourth and fifth values
are the maximum allowed values of the coordinates of the upper-left hand
corner of the viewport.

### M\_NEW\_DESK

The body of this packet consists of a single long integer, whose value is the
number of the currently active desktop. This packet is transmitted whenever
the desktop number is changed.

### M\_ADD\_WINDOW, and M\_CONFIGURE\_WINDOW

These packets contain 25 long values, 2 short values and 2 structures. The
first value is the ID of the affected application's top level window, the next
is the ID of the fvwm frame window, and the final value is the pointer to
fvwm's internal database entry for that window. The pointer itself is of no
use to a module, it is there for backward compatibilty with older modules. The
next 24 identify the location and size, as described in the table below.
Configure packets will be generated when the viewport on the current desktop
changes, or when the size or location of the window is changed. The style
flags field a structure, window_flags, defined in fvwm.h with access macros
defined in window_flags.h. Not all flag changes trigger M_CONFIGURE_WINDOW
message, which mean that they might be outdated. The action flags is a
structure, action_flags, define in fvwm.h which controls what actions are
possible to perform on the window from the module.

Important note: The individual fields of the packet must not be accessed
directly with the 'body' member of the packet structure. The size of these
fields may change in the future and has changed in the past, thus breaking any
module relying on the exact position of the value in the packet. Instead, use
the structures defined in libs/vpacket.h.

|-------|------|
|0	|ID of the application's top level window |
|1	|ID of the fvwm frame window |
|2	|Pointer to the fvwm database entry (not useful) |
|3	|X location of the window's frame |
|4	|Y location of the window's frame |
|5	|Width of the window's frame |
|6	|Height of the window's frame |
|7	|Desktop number |
|8	|Layer number |
|9	|Window Base Width |
|10	|Window Base Height |
|11	|Window Resize Width Increment |
|12	|Window Resize Height Increment |
|13	|Window Minimum Width |
|14	|Window Minimum Height |
|13	|Original Window Resize Width Increment (before fvwm messed with it) |
|14	|Original Window Resize Height Increment (before fvwm messed with it) |
|15	|Window Maximum Width |
|16	|Window Maximum Height |
|17	|Icon Label Window ID, or 0 |
|18	|Icon Pixmap Window ID, or 0 |
|19	|Window Gravity |
|20	|Pixel value of the text color |
|21	|Pixel value of the window border color |
|22	|EWMH layer |
|23	|EWMH desktop |
|24	|EWMH window type |
|25	|Window Title Height |
||Window Border Width |
||padding |
||padding |
||Style flags |
||Action flags |

### M\_LOWER\_WINDOW, M\_RAISE\_WINDOW, and M\_DESTROY\_WINDOW

These packets contain just the first three values of `M\_ADD\_WINDOW`

### M\_FOCUS\_CHANGE

These packets contain 5 values, all of the same size as an unsigned long. The
first value is the ID of the affected application's (the application which now
has the input focus) top level window, the next is the ID of the fvwm frame
window, and the third value is set to 0 when the focus change is from the
Focus command and 1 for all other focus changes (FlipFocus, focusing with the
mouse etc.). The third value can be used by the module to manage the
windowlist in the same way as fvwm i.e. 0 means rotate the list around to the
target, 1 means pluck the target from the list and insert at the beginning.
The fourth and fifth values are the text focus color's pixel value and the
window border's focus color's pixel value. In the event that the window which
now has the focus is not a window which fvwm recognizes, only the ID of the
affected application's top level window is passed. Zeros are passed for the
other values.

|-------|------|
|0	|ID of the application's top level window |
|1	|ID of the fvwm frame window |
|2	|Focus change type |
|3	|Hilight text color |
|4	|Hilight background color |

### M\_ICON\_LOCATION

These packets contain 7 values. The first 3 are the same as M\_ADD\_WINDOW, and
the next four describe the location and size of the icon, as described in the
table. An M\_ICON\_LOCATION packet will be sent when an icon is created or moved
and when the icon window is changed via the XA_WM_HINTS in a property notify
event.

|-------|------|
|0	|ID of the application's top level window |
|1	|ID of the fvwm frame window |
|2	|Pointer to the fvwm database entry (not useful) |
|3	|X location of the icon |
|4	|Y location of the icon |
|5	|Width of the icon |
|6	|Height of the icon |

### M\_ICONIFY

These packets contain 7 or 11 values. The first 3 are the same as
M_ADD_WINDOW, and the next 4 values describe the location and size of the
icon. If 4 further items are sent they are the location and size of the window
being iconified. Note that M\_ICONIFY packets are also sent whenever a window
is started in the iconic state.

In addition, if a window which has transients is iconified, then an M_ICONIFY
packet is sent for each transient window, with the icon x and y fields set to
-10000. This packet will be sent even if the transients were already
iconified. Note that no icons are actually generated for the transients in
this case.

If a window has the NoIcon style the width and height of the icon window are
set to 0 and the location is meaningless.

|-------|------|
|0	|ID of the application's top level window |
|1	|ID of the fvwm frame window |
|2	|Pointer to the fvwm database entry |
|3	|X location of the icon |
|4	|Y location of the icon |
|5	|Width of the icon |
|6	|Height of the icon |
|7	|X location of the window's frame |
|8	|Y location of the window's frame |
|9	|Width of the window's frame |
|10	|Height of the window's frame |

### M\_DEICONIFY

These packets contain up to 3, 7 or 11 values starting with the usual window
identifiers. The packet is sent when a window is de-iconified. Like M_ICONIFY
icon and window location and size are sent.

### M\_MAP

These packets contain 3 values, which are the usual window identifiers. The
packets are sent when a window is mapped, if it is not being deiconified. This
is useful to determine when a window is finally mapped, after being added.

### M\_WINDOW\_NAME, M\_ICON\_NAME, M\_RES\_CLASS and M\_RES\_NAME

These packets contain 3 values, which are the usual window identifiers,
followed by a variable length character string. The packet size field in the
header is expressed in units of unsigned longs, and the packet is zero-padded
until it is the size of an unsigned long. The RES\_CLASS and RES\_NAME fields
are fields in the XClass structure for the window. Icon and Window name
packets will be sent upon window creation or whenever the name is changed. The
RES\_CLASS and RES\_NAME packets are sent on window creation. All packets are
sent in response to a Send_WindowList request from a module.

### MX\_VISIBLE\_NAME, MX\_VISIBLE\_ICON\_NAME

These packets are similar to the M\_WINDOW\_NAME and M\_ICON\_NAME packets
(respectively). The difference is that they contain the window and icon title
that fvwm displays (which may be differrent than the Window name and the Icon
name if the IndexedWindowName and IndexedIconName fvwm styles are used).

### M\_END\_WINDOWLIST

These packets contain no values. This packet is sent to mark the end of
transmission in response to a Send\_WindowList request. A module which requests
Send_WindowList, and processes all packets received between the request and
the M\_END\_WINDOWLIST will have a snapshot of the status of the desktop.

### M\_ERROR

When fvwm has an error message to report, it is echoed to the modules in a
packet of this type. This packet has 3 values, all zero, followed by a
variable length string which contains the error message.

### M\_CONFIG\_INFO

Fvwm records all configuration commands that it encounters which begins with
the character ``*''. When the built-in command `Send\_ConfigInfo` is invoked
by a module, this entire list is transmitted to the module in packets (one
line per packet) of this type. The packet consists of three zeros, followed by
a variable length character string. In addition, the DeskTopSize, ImagePath,
ColorLimit, Colorset and XineramaConfig definitions are sent to the module.
The XineramaConfig string is followed by the primary screen number (counting
from 1 upwards, 0 for the global screen or -1 if Xinerama is disabled).

Note that all the module configuration commands are sent. Each module has to
check the configuration commands to see if it is a command for that specific
module. This is actually a feature. This way one module can learn about all
other modules configurations. Also fvwm doesn't currently know anything about
module aliases (this is not correct anymore, the alias name is guessed from
the command line).

Starting with release 2.0.47, a module can set M\_SENDCONFIG on in its mask and
receive M\_CONFIG\_INFO packets while it is running. (M\_CONFIG\_INFO has to be on
also.) A module can use M_SENDCONFIG to be able to change configuration while
it is running. Refer to module FvwmAnimate for an example.

### M\_END\_CONFIG\_INFO

After fvwm sends all of its M\_CONFIG\_INFO packets to a module, it sends a
packet of this type to indicate the end of the configuration information. This
packet contains no values. This packet it not sent for subsequent config lines
sent when the M\_SENDCONFIG mask bit is on.

### M\_ICON\_FILE

This packet is broadcast when a window is added or during send window list. It
is only sent for windows that have icons defined, and contains the usual 3
identifiers plus the filename of the icon.

### M\_DEFAULTICON

This packet is sent during send window list. This is the icon associated with
`Style "*"`. The packet contains the filename of the icon.

### M\_STRING

This packet is sent when a "SendToModule" command is processed. It contains
the usual 3 window identifiers (of the current window) plus the actual string.

### M\_MINI\_ICON

This packet is broadcast when a window is added or during send window list. It
is only sent for windows that have mini_icons defined, and contains the
filename of the mini_icon. It contains the 3 window identifiers followed by
the width and height of the mini_icon, the depth (which is useless, it is
always the depth of the visual that fvwm is using), the window ID of the
pixmap and mask, and finally a string that is the path to the file (also not
useful).

### M\_WINDOWSHADE and M\_DEWINDOWSHADE

This packet is sent when a window is window shaded. It contains just the
window identifiers.

### M\_SENDCONFIG

This is a dummy packet that is never sent by fvwm and is described under
module-to-fvwm communication.

### M\_RESTACK

This packet is sent when the stacking order changes. It contains a list of
windows, each one being given by its three identifiers. The meaning is that
the first window keeps its position in the stacking order and all subsequent
windows are restacked below it (like XRestackWindows).

### MX\_ENTER\_WINDOW, MX\_LEAVE\_WINDOW

These packets are sent when the pointer enters or leaves a window. It contains
just the window identifiers. Note that multiple packets of the same type for
the same window may be sent at any time.

### MX\_PROPERTY\_CHANGE

This packet is an all purpose message. It contains 3 values followed by a
variable length character string. The first value is the type of the message,
the others values depend on the message type. The message types are:
MX\_PROPERTY\_CHANGE\_BACKGROUND and MX\_PROPERTY\_CHANGE\_SWALLOW.

MX\_PROPERTY\_CHANGE\_BACKGROUND is sent by fvwm and FvwmButtons (and maybe other
modules) to indicate a background change. If the 3rd value is 0, it means that
the root background changed. (fvwm sends this message when it detects the
change). If the 3rd value is not zero it is the window id of the module which
should be concerned by the message. This indicates that the parent(s) window
background of this module has changed. (FvwmButtons sends this message for the
modules that it swallows, when its background colorset changes). The string
and the second value are not used.

MX\_PROPERTY\_CHANGE\_SWALLOW is sent by FvwmButtons (and maybe other modules) to
indicate that the module with the window id given by the 3rd value has been
swallowed or unswallowed. It is a swallowed message if the 2nd value is 1 and
it is an unswallowed message if the 2nd value is 0. The string is not used.

There is a fvwm command which causes modules to send such message:

PropertyChange 1st\_value 2nd\_value 3rd\_value "string"

### MX\_REPLY

This packet is sent when a "Send_Reply" command is processed. It contains the
usual 3 window identifiers (of the current window) plus the actual string.
