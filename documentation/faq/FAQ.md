Most Asked Questions
====================

#### A few minutes after fvwm is started my keyboard and mouse bindings stop working.  What can I do?

Probably your NumLock, CapsLock or ScrollLock key is pressed.
See the following question for more details:

+ [Why do numlock, capslock, and scroll lock interfere with
  click to focus and/or my mouse mouse bindings?](
  #why-do-numlock-capslock-and-scrolllock-interfere-with-clicktofocus-andor-my-mouse-bindings)

Trivia: In all my years as an fvwm developer this has been by far the
most frequently asked question.  Whoever can solve this problem so
that this question is never asked again will be mentioned in big
letters on the fvwm home page :-)


#### I use XMMS, but it ignores some window styles.

XMMS wants to do everything by itself and overrides many
settings of the window manager.  Check the options menu in XMMS
and if that does not help, ask the XMMS people about it at

+ <http://xmms.org/>

**Please** do not ask XMMS questions on the fvwm mailing lists
and do not report XMMS related bugs before you tried the XMMS
mailing lists.  No offense meant, but we really have more
important things to do than providing user support for third
party software.

#### I like transparency.  What can I do?

See questions that deal with transparency:

+ [How to define transparent menus?](
#how-to-define-transparent-menus)
+ [How to define transparent modules?](
#how-to-define-transparent-modules)
+ [How to define transparent decorations?](
#how-to-define-transparent-decorations)
+ [How about transparent applications too?](
#how-about-transparent-applications-too)

Also see configurations supplied in fvwm-themes package, some
themes use transparent menus, modules and/or decorations.  E.g.:

+ <http://fvwm-themes.sf.net/screenshots/full/transparent.png>
+ <http://fvwm-themes.sf.net/screenshots/full/transparent.jpg>

About Fvwm
==========

####  What does fvwm stand for?

"Fill_in_the_blank_with_whatever_f_word_you_like_at_the_time
Virtual Window Manager".  Rob Nation (the original Author of fvwm)
doesn't really remember what the F stood for originally, so we
have several potential answers:

	Feeble, Fabulous, Famous, Fast, Foobar, Fantastic, Flexible,
	F!@#$%, Flashy, fvwm (the GNU recursive approach), Free, Final,
	Funky, Fred's (who the heck is Fred?), Freakin', Flawed,
	Father-of-all, Feivel (the mouse from "An American Tail"),
	Frungy (hey, where does that come from?), Floppy, Foxy,
	Frenzied, Funny, Fumbling etc.

Just pick your Favorite (hey, there's another one!), which will of
course change depending on your mood and whether or not you've run
across any bugs recently.  I prefer Fabulous or Fantastic myself,
although I often use F!@#$% or Freakin' while debugging...

Recently 'Feline' is becoming popular.  Perhaps this has something
to do with the discovery that four of the six core developers have
cats (averaging 1.17 cats)?  Miaow.

Know what? I found another one while stroking my cats: FEEDING :-)

Check this link: <http://fvwm.org/fvwm-cats>

#### Where do I find the current version of fvwm?

The source code and releases can all be found on GitHub:
<http://github.com/fvwmorg>

Versions older than 2.6.x are no longer supported.

#### Where do I ask questions about fvwm?

If you are unable to find the information you need in the
documentation, then:

+ You can ask questions on the fvwm discussion mailing
list <mailto:fvwm@fvwm.org>

They are maintained by Jason Tibbitts, and are Majordomo based
mailing lists.  Check the support page for more details:
<http://fvwm.org/support>

+ You can ask questions to other fvwm users on the forums:
  <http://fvwmforums.org>
+ You can also ask questions on `#fvwm` on `freenode`.

#### What should I name my config file (config or .fvwm2rc)?

Fvwm's config file has name has changed a few times in its
history. Starting from version 2.5.11 the default config file
should be located at `~/.fvwm/config` or system wide
`$datadir/fvwm/config`.

See the INITIALIZATION section of the man page for full details.

#### When will fvwm release X.Y.Z be ready?

This is always a difficult question to answer.  We work on fvwm on a volunteer
basis.  Things get done when we have the time.

Joining the fvwm-workers mailing list might prove instructive.

Installation
============

#### I want to use fvwm, but I don't have root access on my machine. Can I still install and run it?

Very easily, using the `--prefix` flag at configure time.

Suppose your home directory is `/home/sam`.  After unpacking the
fvwm sources, do:

    ./configure --prefix=/home/sam

Now, after building, `make`, and installing, `make
install`, you will find the binaries in `/home/sam/bin`, the
man pages in `/home/sam/man`, etc.  The modules will be in
`/home/sam/libexec`, and fvwm binary will have this module path
built in.

#### I'm trying to use fvwm under CDE/COSE, but encountering difficulties. Any suggestions?

Sure - here's one from Graeme McCaffery:

Finally I have found out how to run fvwm properly from CDE
(thanks to Lars Sodergren).

First set your home session in Dtwm.  That usually is an empty
session, though you could have the CDE session manager remember
what your desktop was like instead of FvwmSaveDesk etc..

Then you have to set two resources in .Xdefaults:

```
Dtsession*wmStartupCommand: /home/orion/spxgm/bin/Fvwm
Dtsession*waitWmTimeout: 1
```

In this case I run fvwm from a shell script so that library
variables etc are set properly for everyone.  The waitWmTimeout
tells the session manager how long to wait until it starts the
window manager.  I've set it to 1 second.  By default it's 60
seconds.

Finally you have to quit with

    /usr/dt/bin/dtaction ExitSession

Now you can happily use CDE programs and fvwm.


#### I'm a sysadmin, and if I wanted fvwm to look for all of its rc files in a hidden directory, say ~/.fvwm, much like CDE does, how could I do that?

Fvwm now supports ~/.fvwm search directory by default.

This could be probably done similarly to Q2.5 above.  The system rc
"$datadir"/fvwm/config (or system.fvwm2rc) could do something like:

```
Read Init      quiet
Read Decors    quiet
Read Styles    quiet
Read Functions quiet
Read Menus     quiet
Read Keys      quiet
Read Modules   quiet
```

or whatever breakdown you deemed appropriate, and you would have
default versions of these in "$datadir"/fvwm/ that it could find
in case the user was missing one of them and you wanted to supply
defaults.

Features, configuration, functions & commands
=============================================

#### Is it possible to raise a window when I click into the window itself, not just the border?

Yes, use:

`Style * MouseFocusClickRaises`

#### How do I get Alt-Tab behavior, as with other Window Managers?

The built in command WindowList provides a very close approximation
to the Alt-Tab feature found in another GUI.  It doesn't look the
same but the following fvwm/config sample will provide a similar
interface:

`Key Tab A M WindowList Root c c NoDeskSort`

Starting with release 2.3.2, the above key binding is built-in.

Starting with release 2.3.15 you can hold the alt key down and keep
hitting tab.  A single alt-tab selects the previous window. The
remainder of this FAQ entry describes releases prior to 2.3.2.

Hitting Alt-Tab will pop up the WindowList menu.  Unlike another
GUI you should not keep the Alt key held down, the menu will stay
up until you hit Return/Enter/Space or Escape.  You can change
focus to a window on the menu by using the up and down arrow keys
to move the menu selection and then hitting Return or
Enter. Hitting Escape will close the menu without doing anything.
The WindowList menu has hot keys assigned for the first 26 windows
and you can use the hot key to go directly to the window.

The menu invoked with the above line will show all windows in most
recently focused order unless you have used the Focus command (see
Q3.4).  It shows each windows name and geometry with some extra
flags to indicate Sticky, OnTop and iconified windows.

A simpler style can be used with the following:

`Key Tab A M WindowList Root c c CurrentDesk, NoGeometry`

This will just list the windows on the current desk (titles only).

The other GUI has the feature of selecting the previous window if
Alt-TAB is hit and released quickly.  This behavior can be exactly
duplicated with 2.5.1 or later but not with earlier fvwm versions.

```
Key Tab A M WindowList Root c c \
CurrentDesk, NoGeometry, CurrentAtEnd, IconifiedAtEnd
```

Similar functionality can be assigned to hitting Alt-TAB twice in
quick succession (like a double click for keys):

```
 DestroyFunc my_dbltab2
 AddToFunc   my_dbltab2
 + I WindowListFunc

 DestroyFunc my_dbltab
 AddToFunc   my_dbltab
 + I Prev (CurrentDesk) my_dbltab2

 Key Tab A M WindowList Root c c CurrentDesk, NoGeometry my_dbltab
```

There are a lot of options to the WindowList command to control
which windows are listed in which order and it may not be possible
to set conditions for the Prev command to reliably select the
second item when double keying.  The WindowList command has no
parallel for CurrentPage, Transient, Visible, Maximized, Raised,
and pattern matching.  The Prev conditions have no parallel for
OnTop, Alphabetic and desk sorting.  The WindowList menu respects
the WindowListSkip style attribute whereas Prev respects the
CirculateSkip and CirculateSkipIcon style attributes.

#### What's the difference between the Focus and FlipFocus commands?

Both of these commands change the keyboard focus to the target
window.  They differ only in the way they affect the internally
held list of windows.  This list is used by the Next, Prev and
WindowList commands.  The list is normally sorted in most recently
focused order with new windows being added to the end.  The
FlipFocus command plucks the target window from the list and
inserts it at the beginning, The Focus command rotates the list
around until the target window is at the beginning.  The behavior
of FlipFocus is also used when changing focus with the mouse and
the automatic focus changing when using ClickToFocus style.

If you never use the Focus command the list will remain in most
recently focused order.  If you do use the Focus command the list
will gradually get back to most recently focused order as you use
FlipFocus.

The Focus command is very useful in conjunction with the Next and
Prev commands.  e.g:

```
  Key KP_Add A M Next (AcceptsFocus, CurrentDesk, !Iconic) Focus
  Key KP_Subtract A M Prev (AcceptsFocus, CurrentDesk, !Iconic) Focus
```

These bindings allow you to circulate the focus around the windows
on the current desk in both directions.  If Prev FlipFocus were
used the focus would toggle between the top two windows on the
window list.

If you have several windows on a desk and you want to set the
circulation order for the Next and Prev commands you should focus
on the windows using the mouse or FlipFocus in the order you want.
Fvwm will learn the order and use it for the Next and Prev
commands.  If you subsequently use the mouse to focus or FlipFocus
the order will be lost.

#### You can bind mouse movements to keystrokes, how about mouse presses?

Although fvwm has commands for binding movements to keystrokes,
controlling the pointer with the keyboard should really be handled
by the X server.  The following is an excerpt of the X FAQ on this
topic:

If you have the X Keyboard (XKB) Extension, you can enable mouse
keys, which makes it possible to generate mouse motion and button
events using the keyboard.  Events generated by MouseKeys are
completely transparent -- they will work with any application
that connects to a server that has the X Keyboard Extension,
regardless of whether the application itself uses XKB.

XKB is enabled by default in X11R6.1.

First, set up the Num Lock key so that Shift+Num_Lock
toggles mouse keys:

`xmodmap -e "keysym Num_Lock = Num_Lock Pointer_EnableKeys"`

#### I really like the horizontal bars that appear on the title bars of sticky windows.  Can I get those on other windows as well?

Yes.  For release 2.3.14 and after, put the line

`Style * StippledTitle`

#### How do I set the Sun keyboard key xxxx to an fvwm command? Or more generally, I'm having problems defining key bindings for fvwm - what can I do?

From Jon Mountjoy, one of fvwm's users:

- Function keys on Sun Keyboard on Top Row are F1 - F8
- Keys on the function keypad on the Left of the Sun Keyboard are
  F11 == Stop, F12 == Again, ..., F20 == Cut

 His Example:

```
 # Function keys on Sun Keyboard on Top Row
 Key F1     A     N       Exec me(netscape) &
 Key F2     A     N       Exec me(netscape -install) &
 Key F5     A     N       Exec makex(Adder)
 Key F6     A     N       Exec makex(Lambda)
 Key F7     A     N       Exec makex(Castor)
 Key F8     A     N       Exec xterm -T Local &

 # Keys on the function keypad on the Left of the Sun Keyboard:
 # F11 = Stop, F12 = Again, ..., F20 = Cut
 Key F11    AWF   N       Next (!iconic, CurrentPage) Focus
 Key F12    AWF   N       Prev (!iconic, CurrentPage) Focus
 Key F13    WF    N       Maximize     100 100
 Key F15    WF    N       RaiseLower ""
 Key F17    WIF   N       Iconify ""
 Key F18    WF    N       Stick ""
 Key F20    WIF   N       Delete ""
 Key Help   AWF   N       Iconify ""
```

A more general solution is to use xev (usually distributed w/ X11)
or xkeycaps (an X11 interface to xmodmap written by Jamie Zawinski,
available from ftp.x.org) to find out what the keysym for whatever
key you want REALLY is, and use that for binding fvwm commands.

####  How do I get window titles on sub windows of ... (e.g. Firefox)?

These windows are known as 'transient' windows because of their
short lived nature.  To get the window decorations for transient
windows you can use the Style command:

`Style * DecorateTransient`


or to switch it off:

 Style * NakedTransient

#### Some applications don't use the icon I defined for them. Why?

Eterm provides its own icon and fvwm does not know if it is a plain
icon or if Eterm wants to draw into it (like xbiff does when you
get new mail).  You can explicitly override the application
provided icon with a style command:

 `Style <application-name> IconOverride`

#### I don't like the gaps in my icon box when I de-iconify an application. Is there some kind of auto arrange function?

Assuming you are using the IconBox option of the Style command
this can be done with a tricky fvwm function.  Put the
DeiconifyAndRearrange function below in your configuration file:

```
 DestroyFunc DeiconifyAndRearrange
 AddToFunc DeiconifyAndRearrange
  + C Iconify off
  + C All (CurrentPage, Iconic) PlaceAgain Icon

This works with fvwm-2.5.3 and later.  Older fvwm releases can
achieve the same effect with:

 DestroyFunc DeiconifyAndRearrange
 AddToFunc DeiconifyAndRearrange
  + C Iconify off
  + C All (CurrentPage, Iconic) RecaptureWindow
```

However, as the Recapture and RecaptureWindow commands may be
removed in the future, please use PlaceAgain instead of
Recapture if possible.

Also, replace all places where you call the Iconify builtin
function to de-iconify an icon with a call to the new function.
For example, replace

```
 DestroyFunc IconFunc
 AddToFunc IconFunc
  + C Iconify off
  + M Raise
  + M Move
  + D Iconify off
```

with:

```
 DestroyFunc IconFunc
 AddToFunc IconFunc
  + C DeiconifyAndRearrange
  + M Raise
  + M Move
  + D DeiconifyAndRearrange
```

and:

`Mouse 1 I A Iconify off`

with:

`Mouse 1 I A DeiconifyAndRearrange`

#### When my specific window (or all windows) pops up, I want it to get focus/be moved/be resized/be closed/be shaded...  How?

The following discusses a general solution, you should substitute
the application names used in the examples as well as fvwm commands
(Move, Iconify, Close) with the ones you need.  To get resource
names of an application you want to catch, use FvwmIdent module.

The first possible approach to achieve what you want is to have a
separate function to start your application, like:

```
   DestroyFunc StartKedit
   AddToFunc   StartKedit
   + I Exec exec kedit
   + I Wait kedit
   + I Next (kedit) Resize 100p 200p
```

This approach has 3 problems:
 1. You need to use StartKedit function to start your application,
    this will not work if you start it from the command line.
 2. If for some reason the application is not started, fvwm waits
    for it in Wait, you will need to press Ctrl-Alt-Esc.
 3. If you have more than one kedit window, it is not guaranteed
    that the right one is resized.

But this approach has one plus - it also enables any fvwm commands
that you may want to issue before executing your command.  For
example, to start kedit window iconic, but not affect its
subwindows, you can use:

```
   DestroyFunc StartAppIconic
   AddToFunc   StartAppIconic
   + I Style $0 StartIconic
   + I Exec exec $0 $1
   + I Wait $0
   + I Style $0 StartNormal
   + I UpdateStyles

   StartAppIconic kedit /tmp/my.txt
```

The second approach is to use FvwmEvent, this solves the first two
problems (in fvwm 2.2) or all three problems (in fvwm 2.3 and
later).

The sample to use with fvwm 2.2.3+ versions (this resizes the newly
created window "My Window", supposing you have only one such
window):

```
   DestroyModuleConfig FvwmEvent*
   *FvwmEvent add_window SetGeometryForMyWindow

   DestroyFunc SetGeometryForMyWindow
   AddToFunc   SetGeometryForMyWindow
   + I Next ("My Window") Move +10p +10p
   + I Next ("My Window") Resize 100p 200p

   AddToFunc StartFunction I Module FvwmEvent
```

The sample to use with fvwm 2.3.21 to 2.4.15 versions (consider to
upgrade and use the version below).  This moves a newly created
window named "My Window", and warps a pointer to all new windows
regardless of their name:

```
   *FvwmEvent-NewWindow: Cmd
   *FvwmEvent-NewWindow: PassId
   *FvwmEvent-NewWindow: StartDelay 4
   *FvwmEvent-NewWindow: add_window FuncFocusWindow

   DestroyFunc FuncFocusWindow
   AddToFunc   FuncFocusWindow
   + I WindowId $0 ("My Window") Move 200p 100p
   + I WindowId $0 Focus
   + I WindowId $0 WarpToWindow

   AddToFunc StartFunction I FvwmEvent FvwmEvent-NewWindow
```

And finally the suggested configuration for 2.5.7+ and
2.4.16+. This moves a newly created window named "My Window", and
wraps a pointer to all new windows regardless of their name:

```
   *FvwmEvent-NewWindow: StartDelay 4
   *FvwmEvent-NewWindow: add_window FuncFocusWindow

   DestroyFunc FuncFocusWindow
   AddToFunc   FuncFocusWindow
   + I ThisWindow ("My Window") Move 200p 100p
   + I Focus
   + I WarpToWindow

   AddToFunc StartFunction I FvwmEvent FvwmEvent-NewWindow
```

#### When my specific window (or all windows) is closed, I want to switch desks/wrap to my app X/popup a menu/start app X...  How?

Please read the answer to the previous question to understand better.

Again, there are two approaches.  The first is good in one kind of
situations, bad in others:

```
   DestroyFunc StartKedit
   AddToFunc   StartKedit
   + I Exec kedit; xmessage -name DummyWindow -g +10000+10000 "dummy"
   + I Wait DummyWindow
   + I Exec xmessage -timeout 10 "Sorry, you can't close kedit"
   + I StartKedit
```

The second approach is to use FvwmEvent:

```
   *FvwmEvent-OldWindow: Cmd
   *FvwmEvent-OldWindow: PassId
   *FvwmEvent-OldWindow: destroy_window FuncPopupMyMenu

   DestroyFunc FuncPopupMyMenu
   AddToFunc   FuncPopupMyMenu
   # go to the desk 0 when any window is closed
   + I GotoDesk 0
   # popup my menu when "panel" is closed
   + I WindowId $0 ("panel") Popup MenuFvwmRoot

   AddToFunc StartFunction I FvwmEvent FvwmEvent-OldWindow
```

#### I have a multi head setup (multiple screens used under X). How can I tell fvwm to use different configurations for the screens?

Fvwm spawns itself into all found screens unless -s command line
parameter is specified, as explained in the man page.  All spawned
fvwm processes by default use the same configuration on each
screen. There are several ways to change the default behavior.

Write your configuration file as you would if you had only one
screen.  Then move the screen specific lines into separate
configuration files and call them, for example, config.<screen>
where <screen> is the screen number.  Usually this will be 0 for
the main screen and 1 for the secondary screen.  Place the screen
specific files in the $HOME/.fvwm directory or whatever you set
$FVWM_USERDIR to.  Now add this line to your config file:

`Read config.$[screen]`

The $[screen] will be replaced with the number of the screen each
instance of fvwm is started on.


Another method, which should work for older fvwm versions as well,
is to specify a separate file for each screen explicitly.  For
this, start a separate fvwm for each screen in your .xinitrc (or
.Xclients):

```
   fvwm -s -d :0.0 -f config-0 &
   fvwm -s -d :0.1 -f config-1 &
   fvwm -s -d :0.2 -f config-2
```

Note that only the last command is without a trailing ampersand.
If you wish, config-* files may all include "Read config-common".

#### How do I maximize a window but not cover up FvwmTaskBar?

Instead of Maximize use "Maximize 100 -30p" where 30 is the width
of your FvwmTaskBar.

Or use EwmhBaseStruts in Fvwm 2.5.x or later.

```
  # EwmhBaseStruts [left] [right] [top] [bottom]
  EwmhBaseStruts 0 0 0 30
```

#### Why my close button looks pressed in maximized windows? Why don't buttons show on the titlebar of some windows?

Fvwm has some builtin idea of what the buttons do, and some
applications can request that certain buttons not be shown.
For example, it's normal for Fvwm to suppress the iconify button
(builtin button 4, the second button from the right) on a
transient (dialog) window.

The command:

`Style * DecorateTransient`

tells fvwm you want titles and buttons on transient windows.

`Style * MwmFunctions`

tells fvwm to accept application hints to hide certain buttons.

`ButtonStyle 2 - Clear MWMDecorMin`

says button 2 performs the minimize (iconify) function.

`Mouse 0 2 A Iconify`

makes any mouse button on button 2 iconify the window.
Buttons won't show until some action is assigned to them using
Mouse or Key commands.

Things to look for in the man page are:

`DecorateTransient, MwmDecorXXX, MwmFunctions`

So, if you use Windows-like buttons, then redefine button hints:

```
   ButtonStyle 1 - Clear MWMDecorMenu
   ButtonStyle 2 - Clear
   ButtonStyle 4 - Clear MWMDecorMax
   ButtonStyle 6 - Clear MWMDecorMin
```

Finally, this command makes button relief to follow the state:

`Style * MWMButtons`

#### How to define transparent menus?

By defining a colorset.

To define a transparent colorset, use something like:

`Colorset 23 Transparent, fg rgb:ff/ff/c4, bg darkgray`

(you may use any other number greater than 0 instead of 23)

There is another way to define transparent colorset, by using
RootTransparent instead of Transparent, but please remember,
you should use a good utility to set the root background image,
like "fvwm-root -r" or "Esetroot" or "wmsetbg", otherwise
RootTransparent will not work:

`Colorset 23 RootTransparent, fg rgb:ff/ff/c4, bg darkcyan`

The good thing about RootTransparent is that it is possible to
automatically calculate the average background color (used for
highlighting/shading) and efficiently tint the visible part of the
root image using something like:

```
Colorset 23 RootTransparent, fg rgb:ff/ff/c4, bg average, \
     Tint black 20, bgTint black 20
```

If you have enough memory, you may use "RootTransparent buffer"
to speed up transparent menus, modules or decorations.

If you are not sure whether you use "fvwm-root -r" or similar
utility to set the root background, do not use RootTransparent
option, use Transparent option without tinting, and set the bg
color explicitly.

Once a transparent colorset is defined, use it in menus:

`MenuStyle * MenuColorset 23`

See the man pages for a more complete explanation of colorsets.

#### How to define transparent modules?

See question 3.23 to learn how to define a transparent colorset
(you may reuse the same transparent colorset or define separate
colorsets for different modules).

Then read the man page for your specific module that you want to
make transparent and specify this transparent colorset(s), like:

```
   *FvwmPager: Colorset * 23
   *FvwmButtons: Colorset 23
   *FvwmIconMan: Colorset 23

   Style FvwmPager ParentalRelativity
   Style FvwmButtons ParentalRelativity
   Style FvwmIconMan ParentalRelativity
```

A side note: the `ParentalRelativity` option is not always needed.
It is not needed if you use `RootTransparent` or you never intend to
move a module inside its parent, or you swallow a module, since
FvwmButtons adds ParentalRelativity automatically for swallowed
fvwm modules.  Otherwise you need Style ParentalRelativity for
transparent windows, but doing this for all windows is overhead.

Note, that previously `Pixmap none` option was used to define
transparency; Pixmap option is obsolete, use colorsets instead.

If you swallow FvwmPager (or FvwmIconMan) into FvwmButtons, then
you may configure both FvwmPager and FvwmButtons to be transparent
or just one of them to be transparent, depending on what you want
to achieve.

#### How to define transparent decorations?

See question 3.23 to learn how to define a transparent colorset.
Only RootTransparent method works for transparent decorations!
This basically means that you should use external utilities like
"wmsetbg" or "Esetroot" to set background in JPG/GIF/TIFF format
and our utility "fvwm-root -r" for XPM/PNG images.

To get transparent decorations, use a configuration like this:

```
   AddToFunc StartFunction
   + I Exec fvwm-root -r $HOME/wallpapers/sea.png

   Colorset 41 RootTransparent buffer, fg white, bg average, \
     Tint cyan 15, bgTint cyan 15  # tint is optional
   Colorset 42 RootTransparent buffer, fg white, bg average, \
     Tint red  15, bgTint red  15  # tint is optional

   Style * Colorset 41, HilightColorset 42  # to use fg and bg
   BorderStyle Inactive Colorset 42 -- flat
   BorderStyle Active   Colorset 41 -- flat
   TitleStyle AllInactive Colorset 42 -- flat
   TitleStyle AllActive   Colorset 41 -- flat
   ButtonStyle All -- UseTitleStyle flat
```

It is possible to define partially transparent decorations too.
You may achieve this by adding "AddTitleStyle Colorset NN PP",
or even "TitleStyle Colorset NN PP".  Please read the man page.
Also search in fvwm-themes to see whether some theme provides
the window decoration look similar to what you want to achieve.

#### How about transparent applications too?

This is not really an fvwm related question, you should find X
applications supporting transparency and read their documentation.

Depending on the application you should set the root image in one
or another way.  Usually utilities like fvwm-root (with possible
"-r" parameter), Esetroot or wmsetbg should be used.

There is a wide range of terminal emulators that may be configured
to be transparent, like Eterm, aterm, gnome-terminal and others.
Here is an example command line:

`aterm -ls -sh 70 -bg black -fg white -tr +sb -fn 7x14 -fb 7x14bold`

Some applications have transparent theme, e.g. gkrellm and xmms.

Some applications may show text on the root image, e.g. root-tail.

There are a lot of other applications supporting transparency not
listed here, search in FreshMeat, <http://freshmeat.net/>.

Xcompmgr can also be used to give windows transparency.

#### How can I define emacs type multi-keystroke fvwm bindings?

In emacs, keys can be set up as prefix keys, so that once
you type the prefix key, a subsequent key has a special meaning.
For example, Control-a would normally go to the beginning of a line
but Control-c Control-a might do something completely different.
There are at least 2 ways to do the same thing with fvwm.

The simplest technique is to use the prefix key to invoke a menu
and then use the menu hot keys as the second key in the binding.
Since menu hot keys don't include modifiers, you can only use plain
keys for the second key in the sequence.

This second technique lets you use any key for the second key but
only works with 2.5.x or later.
This approach invokes a function on the first key that defines the
action of the second key for a short time and then removes it:

```
  DestroyFunc Ctrl-Alt-F-Action
  AddToFunc   Ctrl-Alt-F-Action
  + I Key X A A Exec xterm
  + I Key C A A Exec xcalc
  # optionally popup a prompt window here
  + I Schedule 5000 Key X A A -
  + I Schedule 5000 Key C A A -

  # Press Ctrl-Alt-F and then "x" or "c"
  Key F A CM Ctrl-Alt-F-Action
```

With this, you press the second key in 5 seconds otherwise the
binding for the second key is removed.

With fvwm-2.5.24 or later (using SendToModule) a much better
solution is:

`SendToModule buttons-alias PressButton A 1`

This would send the FvwmButtons instance "button-alias" a command
to invoke the action that button "A" has as though the button were
clicked with mouse button 1.  For instance:

```
    *button-alias: (Id A, Title "My Button", Action (Mouse 1) \
       `Exec exec xcalc`)
```

#### How do I remove all decorations from a window?


I see this a lot on IRC.  Most people try and do this:

`Style * !Title, BorderWidth 0`

This doesn't always work because many forget about a window having
having handles -- which sit on the border.  If a window has defined
handles, then these effectively override any of border settings --
especially the "BorderWidth" option.  But there are Handle
equivalents, hence the correct way to remove decorations from a window
would be:

`Style * !Title, !Borders, !Handles`

To set the BorderWidth of a window which has handles:

`Style * HandleWidth 5`

#### What's the best way to make on-the-fly config changes?

Often is the case, one might want to make config changes to fvwm.
Adding them to the .fvwm2rc file (or in more recent releases
.fvwm/.fvwm2rc or ~/.fvwm/config) and then restarting fvwm is one
way -- but this has problems with memory, especially with Colorset
definitions being redeclared, etc.

The better approach to making changes is instead to use FvwmConsole
which is a way of making live changes to fvwm configs.  When you're
satisfied that they're correct, then you can add them to your fvwm
config file so that they're there the next time fvwm loads, thus
reducing the need to restart fvwm.

#### How can I toggle a window's layer?

Usually what people want from this, is a means of making a window
stay on top for a time, and then putting it back in the layer it
was in originally.

This is best achieved with a function, as in:

```
  DestroyFunc ToggleLayer
  AddToFunc   ToggleLayer
  + I ThisWindow (Layer 6) Layer
  + I TestRc (NoMatch) Layer 0 6
```

This function first of all checks to see if the window that's going
to be toggled is in layer 6 (which in this context is assumed to be
the layer which is used for the style StaysOnTop -- see the
DefaultLayers command for more information), and if it is, to put it
in the layer it was previously in.

Otherwise, if we didn't do it (because the window in question was in
any other layer), the window is put in layer 6.

This function can be bound in the usual way, either via the Pick
command to some key/mouse binding, or bound to a button on the
titlebar, etc.

Modules
=======

#### I'm using FvwmButtons (or GoodStuff in 1.xx), and sometimes the buttons stay depressed, and other times they don't. Why is that?

From the FvwmButtons man page:

     If command is an fvwm Exec command, then the button
     will remain pushed in until a window whose name or
     class matches the quoted portion of the command is
     encountered.  This is intended to provide visual
     feedback to the user that the action he has requested
     will be performed.  If the quoted portion contains no
     characters, then the button will pop out immediately.
     Note that users can continue pressing the button, and
     re-executing the command, even when it looks "pressed
     in."

#### When having FvwmButtons swallow an app, is it possible to have button presses assigned to actions as well?  For instance, I'd like to swallow xload and have a button press pop up an xterm, or swallow xbiff and have a button press bring up the list of messages.

Yes, with the alpha release 2.5.0 or any later release.  For older
releases, read on.

The button presses normally get passed through to the swallowed
application, but if you put a title on the button, you can
assign actions to that. Here's an example that someone sent to
the mailing list once:

```
  *FvwmButtons(1x4,       \
    Title           'System Info', \
    Swallow         "xload" 'Exec xload', \
    Action(Mouse 1) 'Exec xosview -cua0 -net 200 -ul -l -geometry 325x325', \
    Action(Mouse 2) 'Exec xcpustate -interval 1 -bg "#a4978e" -fg black', \
    Action(Mouse 3) 'Exec rxvt -fg "khaki" -bg "dark olive green" \
                         -fat -n top -T Top -7 -e top' )
```

And you could come up with something similar for xbiff (untested):

```
  *FvwmButtons(1x2, \
    Title 'Check Mail' Swallow "xbiff" 'Exec xbiff', \
    Action(Mouse 1) 'Exec from | xmessage -file -' )
```

plus you could bind another button (say Mouse 3) to run your
mail program.

Sometime in the future I'll probably try and fix it so that you can
actually assign a button press over the application itself...

#### I'm seeing odd things when trying to preprocess files with the FvwmM4/Cpp module...

Yup, I imagine that you might be.  Things like the InitFunction not
being called or windows that were running before fvwm started not
getting their Borders & Style options set, etc.

The reason for all this is because of the fact that FvwmM4 is a
module.  Fvwm won't be looking at the commands coming back from
the module until after it hits the main loop of the code, AFTER the
startup is all done and it has already tried to execute the
InitFunction.

To force synchronous execution of FvwmM4/Cpp use:

`ModuleSynchronous FvwmM4/Cpp -lock filename`

See the man page for more details.

#### How can I open a sub panel or push buttons in FvwmButtons with a keyboard shortcut?

FvwmButtons does not support keyboard shortcuts itself.  Since
fvwm version 2.3.24 the FakeClick command can be used to
simulate a click in the FvwmButtons window:

  fvwm-2.3.24 or later:

```
  DestroyFunc press_fvwmbuttons
  AddToFunc press_fvwmbuttons
  + I Next (FvwmButtons, CirculateHit) WarpToWindow $1 $2
  + I FakeClick depth 2 press $0 release $0
```

fvwm-2.5.1 or later (moves the pointer back to the original position):

```
  DestroyFunc press_fvwmbuttons
  AddToFunc press_fvwmbuttons
  + I SetEnv pointer_x $[pointer.x]
  + I SetEnv pointer_y $[pointer.y]
  + I Next (FvwmButtons, CirculateHit) WarpToWindow $1 $2
  + I FakeClick depth 2 press $0 release $0
  + I WindowId root WarpToWindow $[pointer_x]p $[pointer_y]p
```

With this function, you can warp the pointer to the desired
button to press and simulate a click.  Call it with

```
   press_fvwmbuttons btn xoff yoff
                       ^    ^    ^
                       |    |    |___ y offset of the button
                       |    |________ x offset of the button
                       |_____________ button to press
```

For example, if the button of a panel is at 30% of FvwmButtons'
width and 10% of its height and you want to simulate mouse
button 1, issue

`press_fvwmbuttons 1 30 10`

You can bind this to a key.  For example:

`Key f1 a n press_fvwmbuttons 1 30 10`

Note that this solution does not work well if the mouse is moved at
the same time.

With fvwm-2.5.24 or later (using SendToModule) a much better
solution is:

`SendToModule buttons-alias PressButton A 1`

This would send the FvwmButtons instance "button-alias" a command
to invoke the action that button "A" has as though the button were
clicked with mouse button 1.  For instance:

```
    *button-alias: (Id A, Title "My Button", Action (Mouse 1) \
       `Exec exec xcalc`)
```

Development, known problems & bug reports
=========================================

#### Why do NumLock, CapsLock and ScrollLock interfere with ClickToFocus and/or my mouse bindings?

Because they are treated as modifiers.  You can use the
IgnoreModifiers command to turn individual modifiers off for
bindings.  With XFree86 and fvwm version 2.4.0 or above, the
right command is

`IgnoreModifiers L25`

If you changed your modifiers manually or are using a different
X server use the 'xmodmap' command to find out which modifiers
correspond to the keys you want to switch off.

This command creates a lot of extra network traffic, depending
on your CPU, network connection, the number of Key, Mouse or
PointerKey commands in your configuration file and the number
of modifiers you want to ignore.  If you do not have a
lightning fast machine or very few bindings you should not
ignore more than two modifiers.  So do not ignore scroll-lock
if you have no problem with it.

A better way to solve this problem is to modify the keyboard
mapping of your X server.  The commands

```
   xmodmap -e "clear Lock"
   xmodmap -e "clear Mod2"
   xmodmap -e "clear Mod5"
```

remove the CapsLock, NumLock and ScrollLock from the keyboard
map.  Pressing these keys has no effect then.  To re-add them
try this:

```
   xmodmap -e "add Lock = Caps_Lock"
   xmodmap -e "add Mod2 = Num_Lock"
   xmodmap -e "add Mod5 = Scroll_Lock"
```

Fvwm has to be restarted to use the changes made by
xmodmap.  Please refer to the man page of the xmodmap command
for further details.  If you disable the CapsLock key in your
keyboard map in this way, you can speed up fvwm a bit by
removing the Lock modifier from the list of ignored modifiers:

`IgnoreModifiers`

Since we all occasionally press NumLock or ScrollLock, it makes
sense to redefine some main bindings to work with any modifiers.
I.e. consider to replace something like this in your configuration:

`Mouse 1 R N Menu MenuFvwmRoot`

with this:

`Mouse 1 R A Menu MenuFvwmRoot`

#### Menus with gradient backgrounds flicker or are very slow.

The flickering is caused by fvwm constantly redrawing the menus
when a sub menu pops up or down.  One way to help this is to use
a X server with backing storage (XFree86 has backing storage
support, I don't know about other servers but I guess that any
decent X server has it).  If your Xserver is started with the
-bs option, remove it.  If not try the -wm option, for example:

`startx -- -wm`

You may have to adapt this example to your system (e.g. if you
use xinit to start X).

If that doesn't help, either because your X server does not have
backing storage or because system resources are limited, make
sure sub menus do not overlap the parent menu:

`MenuStyle <stylename> PopupOffset 1 100`

Unfortunately this does not work properly with the fvwm
menu style.

For the speed problem both suggestions above might help too.
Another thing to try is to turn hilighting of the active menu
item other than by foreground color off.  Put these lines in your
fvwm/config after the menu styles have been defined:

```
   MenuStyle <stylename> Hilight3DOff, HilightBackOff
   MenuStyle <Stylename> ActiveFore <preferred color>
```

#### Why won't the StartIconic style work with some applications?

The application won't allow it.  This has only been observed with
Firefox.  When Firefox starts up, fvwm starts the main window in
the iconic state.  Firefox immediately issues another MapRequest,
to which the window manager must respond by de-iconifying the
window, according to the ICCCM rules.  (Firefox can be persuaded
to start iconic, however, by invoking it with the -iconic command
line flag.)

#### How do I capture the output (e.g. errors) of fvwm?

Errors are reported to the standard error file.  You can redirect
standard error to a file when fvwm is started: "fvwm 2>
fvwm-errors". X sessions started by xdm often redirect errors to a
file named ".xsession-errors".

Alternatively, FvwmConsole or "FvwmForm FvwmForm-Talk" modules
will display error messages.

#### I try to run some program under fvwm, but it dies with an X11 error like BadAccess.  The same program works just fine under MWM or OLWM.  What's going on?

The error message usually looks something like this:

```
      X Error of failed request:  BadAccess (attempt to access private
      resource denied)
       Major opcode of failed request:  28 (X_GrabButton)
       Serial number of failed request:  1595
       Current serial number in output stream:  1596
```

Well, this is telling you that there is a conflict in key/button
assignments.  In your config you have bound some key/button that
this program really wants to bind to an action, but it can't since
fvwm has already done so (but you weren't doing it in the rc file
for your previous window manager).  Figure out what the offending
key binding is and remove it from your fvwm/config, or temporarily
via "FvwmForm FvwmForm-Talk" by removing the fvwm binding (see the
man page for the Key & Mouse commands).

####  Every time I update my install, my currently running fvwm session dies.  Why is that?

Many OSes swap the program from memory via the image on the disk,
and if you overwrite it, and then the current one tries to swap
something back into memory before you restart, it'll core dump.  To
avoid this, rename your old executables or move them to some other
directory.  The 'mv' command preserves the inode so it won't
core dump, but then when you restart fvwm it'll pick up the new
copy.

#### After I restart fvwm certain windows or icons raise above all other windows and cannot be lowered by any means. One example are the shortcuts of KFM (the KDE file manager). What can I do about that?

Some applications use so called 'override redirect' windows that
are not (and cannot be) managed by the window manager.  By
convention as defined in the ICCCM, such windows must only be
displayed for a very short time.  KFM and possibly other
applications ignore this convention and use permanent 'override
redirect' windows, e.g. the KFM shortcuts.  Fvwm can not easily
detect these windows when it restarts and places the windows
managed by fvwm below them.

However, since fvwm version 2.3.8 there is a command that will
help you, although it might cause trouble with other applications
using 'override redirect' windows.  We can't make any promises
since KFM is violating the conventions and the applications may
violate them in different ways.

Now the command.  Put this anywhere in your config file:

`BugOpts RaiseOverUnmanaged on`

#### The StartsOnPage style does not work for me.  Why?

Many applications request a specific position where they want to
appear (the so called 'program specified position').  Unless fvwm
is told explicitly to ignore this, the program specified position
overrides the StartsOnPage style.  Use this line in your
configuration file:

`Style * NoPPosition`

#### Some modules can not be started when I restart fvwm.

You may see the following error message on the console:

```
   [fvwm][PositiveWrite]: <<ERROR>> Failed to read descriptor:
   - data available=N
   - terminate signal=N
```

It means that fvwm has given up waiting for one of its modules to
reply, and so has killed it.  The length of the timeout is a
configuration parameter - try adding

`ModuleTimeout 10`

to your config file.  The units are in seconds and the default
value is 5.

This problem will only occur on slow machines or high system load
(many open windows).

#### Although I use the WindowListSkip style for my modules they still show up in FvwmIconMan, FvwmWinList etc.

Make sure you have

`*FvwmIconMan: UseWinList true`

in your config file.  If that does not help, the modules you are
using may not match the fvwm executable.  Recompile and reinstall
everything and the problem should go away.

#### When I Maximize an application, sometimes I get gaps around the edges, and other times I don't.  What's going on?

The ICCCM specification allows applications to specify certain
properties the window manager should honor, such as aspect
ratio (PAspect) or increments to be resized in (PResizeInc).  Of
course, sometimes these properties won't perfectly match the
size of your desktop (or ewmh struts), if that should happen,
you will get gaps.

In general, the application will have a good reason for doing
this (for example, a terminal window may not want to have only
part of a column visible), but you can make fvwm ignore the
hints with

`Style * ResizeHintOverride`

Miscellaneous
=============

#### What exactly is the difference between a DESK, a PAGE, and the SCREEN?

Our naming convention is sometimes a source of confusion, and when
discussing problems and the like it's good to maintain a consistent
meaning.  To illustrate how features of fvwm should be referred to
- fvwm has multiple disjoint DESKTOPS, each of which is comprised
of M by N PAGES, which are each the size of the physical SCREEN.
The physical SCREEN acts as a viewport over one of the PAGES of the
current DESK.  Here's a picture to clarify (also, take a look at
the FvwmPager module):

```
             Desk 0                     Desk 1
     +----------+----------+    +----------+----------+
     |          |          |    |          |          |
     | Page 0 0 | Page 1 0 |    |          |          |
     |          |          |    |          |          |
     |          |          |    |          |          |
     +----------+----------+    +----------+----------+
     |+--------+|          |    |          |          |
     ||Page 0 1|| Page 1 1 |    |          |          |
     ||        ||          |    |          |          |
     |+--------+|          |    |          |          |
     +----------+----------+    +----------+----------+
```

It shows two 2 x 2 DESKTOPS.  If the current DESK were number 0,
and the current PAGE were 0 1, the SCREEN would show only the
windows located there, plus any sticky ones.

Desktops are numbered consecutively, beginning with 0.  The user is
not responsible for creating new desktops, those details are
handled inside fvwm.  To display the different desktops, the user
can configure key bindings that determine which desktop is
displayed.  For example, to have the combinations Meta-1 to Meta-4
display desktop numbers 0 to 3, one would add this to her config:

```
   Key 1 A M GotoDesk 0
   Key 2 A M GotoDesk 1
   Key 3 A M GotoDesk 2
   Key 4 A M GotoDesk 3
```

The same can be done for pages.  For example, if each desktop has
a size of 2 by to pages you could bind Meta-F1 to Meta-F4 to
flip pages:

```
   DeskTopSize 2x2
   Key F1 A M GotoPage 0 0
   Key F2 A M GotoPage 1 0
   Key F3 A M GotoPage 0 1
   Key F4 A M GotoPage 1 1
```

It is also a good idea to create a pager that displays several
desktops, side by side.  This command displays the first 4
desktops:

`Module FvwmPager 0 3`

Or if you prefer to see only the current desktop in the pager:

`Module FvwmPager * *`

#### I'd really like {OpenWindows, NeXT, Win95, Mac, etc} look and feel.Are you going to support that?

This is not our primary mission, but we think fvwm does a pretty
good job of producing these appearances.

You may want to take a look at the

+ <http://fvwm-themes.sourceforge.net/>

#### Where can I get more XPMs for icons?

If you want more color icons, grab the ones out of the ctwm
distribution (also at ftp.x.org) which has a lot of nice ones.  You
can also find more in other distributions at ftp.x.org, and at
<http://www.sct.gu.edu.au/~anthony/icons/> (which has a lot, I
believe).

Icons used to be distributed along with fvwm.  Now there is a basic
set of icons available at the fvwm web site.  You might find some
links at the fvwm web site to other sources of icons.

You may want to take a look at the

+ <http://wm-icons.sourceforge.net/>

#### I know this question doesn't have to do with fvwm, but what happened to to rxvt and rclock which Rob Nation used to support? Where can I find them now?

The official home for rxvt is:

+ <http://www.rxvt.org/>

and rclock can be found in that rxvt distribution as well.

#### How do I set the background with fvwm?

Setting the background image is not really part of the window
manager.  If you are using one of the Linux distributions, most
likely, some part of the distribution is setting the background for
you.

There is a program shipped with fvwm (fvwm-root, previously known
as xpmroot) that you can use to set the background to an XPM or PNG
image.  Other programs like "xv", "xli", "xloadimage", "display",
"feh" and "Esetroot", may be used too, they support some image
formats that fvwm-root does not.

If you just want a static image on your background, you might
invoke one of these programs from your .xsession or .xinitrc file.
You can also invoke one of these programs from the StartFunction in
your config.

The fvwm module FvwmBacker can be used to change the background
depending on the desk you are currently on by calling an external
program.  One big disadvantage of external programs is that
changing the background on the fly can be pretty slow.  FvwmBacker
can use the image defined in a colorset and cached by fvwm for fast
background changing.  For example:

```
   Colorset 10 TiledPixmap foo.xpm
   Colorset 11 Pixmap bar.png
   FvwmBacker: Command (Desk *, Page * 0) Colorset 10
   FvwmBacker: Command (Desk *, Page * 1) Colorset 11
```

However, fvwm can handle only xpm, xbm and png images.  Other
formats must be converted before they can be used in fvwm.

If you want to set a different background per screen (i.e., you're
using Xinerama), then the program "Nitrogen" can be used to do
that.  See:  <http://projects.l3ib.org/nitrogen/>

#### When I use Fvwm, my XYZ isn't the right color.  Whats wrong?

Under this heading we've had questions about FvwmForm being all
white, icons not displaying and messages about being unable to
allocate colors.

Older hardware uses something called 8 bit color.  You can also
mis-configure newer hardware so that it's only using 8 bit color.
When you use 8 bit color, your display can only have 256 colors on
it at once.

This is explained in excruciating detail in the

+ <http://www.sunhelp.org/faq/FrameBuffer.html>

If your display can support more than 256 colors, that's the way to
go.  Look up the documentation for your X server.  You may want to
start with "man X".

If you are stuck with 8 bit color, fvwm can help.  In the 2.2.x
releases, you can use the "ColorLimit" command to reduce the number
of colors Fvwm uses in icons.  In the 2.3.x releases and later,
ColorLimiting is automatic, but you still might want to use this
command to further reduce color use.

Other things you may want to do:

+ Always run Firefox with the "-install" argument.
+ If you use an image on your screen background, reduce the number
  of colors it uses.  For xv add the "-nc nn" argument.  For
  xli use the "-colors nn" argument.
+ Don't use color gradients.
+ Some applications are color hungry.  Beware of anything TK based,
  and FrameMaker in its default setting.

If you still have problems after this, try the fvwm mailing list.

#### I just got a mouse with 57 buttons. How do I make Fvwm use them?

To use more than 9 buttons (up to 31), modify the file
`libs/defaults.h`.  Replace

```
     #define NUMBER_OF_EXTENDED_MOUSE_BUTTONS      9
```

with

```
     #define NUMBER_OF_EXTENDED_MOUSE_BUTTONS      15
```

#### Why does fvwm change my X Cursor theme?

It doesn't.  There is a standard set of cursors that should
always be available to applications, such as crosshair, left_ptr,
arrow, pencil, and so on.  Your theme should provide each of these
cursors, but some don't.  When something (for example, an
application or fvwm) requests a cursor that your theme does not
provide, X falls back to the default.  If you are seeing fvwm
using cursors that do not match your theme, you should use
CursorStyle to change to a cursor that is available, or find a
more complete theme.  Note that fvwm does not control what cursors
your applications request.

Hints and examples from the developers
======================================

#### An easy way to test new configurations.

Did you know that you do not need to restart X or fvwm to see what
most configuration commands do? There are several modules
that allow you to issue fvwm commands at any time.  Among
these are FvwmCommand, `FvwmForm FvwmForm-Talk` and FvwmConsole.
Personally I use FvwmCommand and FvwmConsole.

When you run FvwmConsole you get a shell like window where you can
type configuration commands that are sent to fvwm.  Just add an
entry to some menu that starts it:

```
   AddToMenu main_menu
    + "FvwmConsole" Module FvwmConsole
```

Using FvwmCommand is a bit more tricky.  To use it you need to
start a server in your config by adding this line:

`Module FvwmCommandS`

Make sure FvwmCommand is in your search path.  Now you can enter
commands on the command line of your favorite shell:

`FvwmCommand "MenuStyle * Font 6x9"`

Note that you have to quote the command.  The advantage of
FvwmCommand over FvwmConsole is that you can use your shell with
all its features to run commands (command completion and history
for example).  The disadvantage is that it is a bit slow since a
new FvwmCommand has to be started for each command.

Other related modules and commands are FvwmScript and PipeRead.

#### Using shell commands for configuration.

Sometimes you might want to use the output of a shell command or
script in your config.  For example you might need a menu that
has all filenames in a certain directory as its entries.  You can
use the PipeRead command and the FvwmCommand module.  I recommend
using PipeRead since creating twenty menu items takes a
considerable amount of time with FvwmCommand.

Example from my config:

```
   # make the background menu
    DestroyFunc MakeBackgroundMenu
    AddToFunc MakeBackgroundMenu
    + I DestroyMenu BackgroundMenu
    + I AddToMenu BackgroundMenu Backgrounds Title
    + I PipeRead 'for i in `/bin/ls $HOME/.fvwm/backgrounds/*.bg.*`; \
          do echo -e AddToMenu BackgroundMenu `basename $i | sed -e \
          "s/\.bg\..*$//"` Function SetDefaultBackground $i; done'

   # set the default background
   DestroyFunc SetDefaultBackground
   AddToFunc SetDefaultBackground
    + I Exec echo -e $0 > $HOME/.fvwm/background
    + I SetBackground

   # set a new background
   DestroyFunc SetBackground
   AddToFunc SetBackground
    + I Exec test -r $HOME/.fvwm/background && xv -root -quit -viewonly \
          `cat $HOME/.fvwm/background|tr -d "\n"`

   # activate setting from last session and build the menu
   AddToFunc StartFunction
    + I SetBackground
    + I MakeBackgroundMenu
```

The MakeBackgroundMenu function builds a menu that contains an item
for every file that matches the pattern "*.bg.*" in the directory
$HOME/.fvwm/backgrounds.  The suffix .bg.* is removed.  When I
select an item the file is displayed in the background using
xv. Furthermore the path and filename are stored in
$HOME/.fvwm/background.  When I start my next fvwm session the
filename is fetched from there so I get the background from my last
session.

I have an even more complex setup for color palettes.

#### How to start applications on a page or desk other than the current?

Use the `StartsOnDesk` or `StartsOnPage` style in your config:

`Style Firefox* StartsOnPage 0 1`

or

`Style Firefox* StartsOnDesk 1`

Any window with a title that begins with 'Firefox' will be placed
on page 0 1 (desk 1).  You will probably want to use these options
too:

`Style * RecaptureHonorsStartsOnPage, CaptureHonorsStartsOnPage`

If you want to start applications on a different page in the
background without switching to this page, use the 'SkipMapping'
style:

`Style Firefox* StartsOnPage 0 1, SkipMapping`

#### How to start applications on a page or desk other than the current without moving the viewport to the new page or desk.

Use the SkipMapping style:

`Style Firefox* StartsOnPage 0 1, SkipMapping`

#### A more efficient MWM menu style.

Perhaps you have noticed that with the MWM menu style your sub
menus are shown as soon as the pointer enters their menu items,
even if you just want to scroll down the list.  You can prevent
this with the `PopupDelay` and `PopupDelayed` options of the
MenuStyle command:

```
   MenuStyle mwm
   MenuStyle PopupDelayed, PopupDelay 80
```

The sub menu will be shown 80 milliseconds after the pointer enters
the menu item.  You will hardly notice the delay.  Note that 80 ms
is just long enough to move through the menu with auto repeat on my
cursor keys.  You may have to experiment with this number to get it
right.

#### Placing menus on the screen.

Do you have to close windows or move the pointer all over the
screen to find some part of the background where you can bring up
your main menu (or any other root menu)?

Then you should use a keyboard shortcut.  For example

`Key  space A M   Menu root c c main_menu`

in your config gives you the menu 'main_menu' in the center of the
screen when you press Alt-space.  Or you might want a shortcut to
the window menu:

`Key  space A SM  Menu root c c WindowMenu`

You can place menus anywhere you like, not just where the mouse
pointer is.  Please read the section for the 'Menu' command in the
man page.

#### Are you flipping pages by accident when moving the mouse close to the border of the screen?

You can disable page flipping with the EdgeScroll command:

`EdgeScroll 0 0`

in your config turns it off.

#### Lining up your windows and icons.

The SnapAttraction and SnapGrid commands really help to keep your
desktop tidy.  With SnapAttraction windows (or icons or both) are
'attracted' to each other.  When you drag a window (icon) and it
comes close to another window (icon) it clings to it without a gap
between the borders.  Put this command in your config:

`SnapAttraction 8 SameType`

This means windows cling to other windows if they get closer than
8 pixels and icons cling to icons.  Or if you just want it for
windows/icons use

`SnapAttraction 8 Windows`

or

`SnapAttraction 8 Icons`

Or if you want icons to cling to windows and vice versa:

`SnapAttraction 8 All`

The SnapGrid command is a big help too:

`SnapGrid 8`

in your config tells fvwm to use a grid of 8 pixels to place
windows and icons.  Try it and see if you like it.

Hint: It might be a good idea to use a divisor of your desktop
width and height for SnapGrid.

#### Moving the mouse/focus/page with the keyboard.

Try these key bindings for mouse movement:

```
   # shift-<direction> to move a few pixels
   Key   Left   A   S   CursorMove -1 0
   Key   Right  A   S   CursorMove +1 +0
   Key   Up     A   S   CursorMove +0 -1
   Key   Down   A   S   CursorMove +0 +1

   # shift-meta-<direction> to move 1/4 page
   Key   Left   A   SM  Scroll -25 +0
   Key   Right  A   SM  Scroll +25 +0
   Key   Up     A   SM  Scroll +0  -25
   Key   Down   A   SM  Scroll +0  +25
```

or these to flip pages

```
   # shift-control-<direction> to move a full page
   Key   Left   A   SC  CursorMove -10 +0
   Key   Right  A   SC  CursorMove +10 +0
   Key   Up     A   SC  CursorMove +0  -10
   Key   Down   A   SC  CursorMove +0  +10

   # Alt-Fn to go to a specific page (like on the Linux console)
   Key F1 A M GotoPage 0 0
   Key F2 A M GotoPage 1 0
   Key F3 A M GotoPage 0 1
   Key F4 A M GotoPage 1 1
```

or to change the focus to a window in a specific direction:

```
   # number keys on keypad to move the focus
   Key KP_1 A C Direction SouthWest (AcceptsFocus) Focus
   Key KP_2 A C Direction South (AcceptsFocus) Focus
   Key KP_3 A C Direction SouthEast (AcceptsFocus) Focus
   Key KP_4 A C Direction West (AcceptsFocus) Focus
   Key KP_6 A C Direction East (AcceptsFocus) Focus
   Key KP_7 A C Direction NorthWest (AcceptsFocus) Focus
   Key KP_8 A C Direction North (AcceptsFocus) Focus
   Key KP_9 A C Direction NorthEast (AcceptsFocus) Focus
```

####  The cat safe desktop ^_^

If your cats keep stepping on your keyboard while you are brewing
another cup of coffee, one of these hints may help:

   Use `Style * MouseFocus` and move the mouse pointer over the
   background when you go away.

If you can't do without your `SloppyFocus` you can move the
mouse pointer into a window that takes no keyboard input and
give it the focus (e.g. FvwmButtons or a console message
window).  A true fanatic creates a separate window with a picture
of his cat for this ^_^

#### Lowering and moving windows.

In some configurations moving a window with the middle mouse
button lowers the window after moving it.  Lowering it before
moving gives you a nice visual effect:

```
   Mouse  2 T A  Function MoveOrLower

   DestroyFunc MoveOrLower
   AddToFunc MoveOrLower
    + C   Lower
    + M   Lower
    + M   Move
    + D   Lower
```

#### Toggling windows on and off.

It is often desirable to have a menu item or perhaps a button in
FvwmButtons or FvwmWharf that launches an application when used
the first time and closes it if used a second time.  Although it
is not obvious how to do this, it is possible.  Let's assume you
need a menu item that toggles an FvwmConsole window on and off.

Then put the following lines in your config (for fvwm-2.5.11 or
later):

```
   DestroyFync ToggleFvwmConsole
   AddToFunc ToggleFvwmConsole
   + I ToggleWindow FvwmConsole "Module FvwmConsole"

   # Application toggling function
   # First argument is the window name, second argument is the
   # command to start the application.
   DestroyFunc ToggleWindow
   AddToFunc ToggleWindow
   + I None ($$0, CirculateHit) $$1
   + I TestRc (Match) Break
   + I Next (currentpage, visible, !iconic, $$0, CirculateHit) Close
   + I TestRc (Match) Break
   + I Next ($$0, CirculateHit) Function MakeVisible

   # Helper function
   DestroyFunc MakeVisible
   AddToFunc MakeVisible
   + I MoveToDesk
   + I MoveToPage
   + I MoveToScreen
   + I Raise
   + I Iconify off
   + I WindowShade off
```

To invoke the function, you can add it to a menu

```
   AddToMenu <some menu>
   + "toggle FvwmConsole" Function ToggleFvwmConsole
```

Or if you prefer a button in the button bar:

`*FvwmButtons: (Action ToggleFvwmConsole)`

The lines with MoveToDesk, MoveToPage and Raise will bring the
window to the top of the current page if it is not visible
instead of closing it.  The generic function ToggleWindow can be
reused to toggle all kinds of windows.

If you want to toggle one specific window, e.g. an xterm, but
still want to have other xterms that are not toggled, you must
give the window an unique name:

```
   DestroyFunc RunXMessages
   AddToFunc RunXMessages
   + I Exec exec xterm -T XMessages -n XMessages \
       -e tail -f /var/adm/?* ~/.X.err

   DestroyFunc ToggleXMessages
   AddToFunc ToggleXMessages
   + I ToggleWindow XMessages RunXMessages
```

Keep in mind that these functions simply check if a window with
the specified name exists.  They will happily close manually
opened windows or launch an application multiple times if the
application is slow to start (e.g. like netscape).

 For fvwm-2.5.10 or earlier, these functions should work too:

```
   DestroyFunc ToggleFvwmConsole
   AddToFunc ToggleFvwmConsole
   + I None (FvwmConsole, CirculateHit) FvwmConsole
   + I Next (FvwmConsole, CirculateHit, CurrentPage, Visible) Close
   + I Next (FvwmConsole, CirculateHit) MoveToDesk
   + I Next (FvwmConsole, CirculateHit) MoveToPage
   + I Next (FvwmConsole, CirculateHit) Raise

   DestroyFunc ToggleXMessages
   AddToFunc ToggleXMessages
   + I None (XMessages, CirculateHit) Exec exec \
     xterm -T XMessages -n XMessages -e tail -f /var/adm/?* ~/.X.err
   + I Next (XMessages, CirculateHit) Close
```

#### Starting applications by clicking on an icon (also known as "docking" applications).

Normally an icon represents a minimized application.  If you
want to turn that around, and launch applications by clicking
on icons we can't stop you.  Heres a way to do that using
FvwmButtons:

```
   # FvwmButtons icon launcher:
   DestroyFunc Launcher
   AddToFunc Launcher
   + I DestroyModuleConfig $0Launch: *
   + I *$0Launch: Geometry 64x68
   + I *$0Launch: Columns 1
   + I *$0Launch: Rows    4
   + I *$0Launch: Frame   0
   + I *$0Launch: (1x3+0+0, Icon $1, Action (Mouse 1) `Exec $2`)
   + I *$0Launch: Pixmap none
   + I *$0Launch: (1x1+0+3, Font 9x15, Fore White, Back DarkBlue, \
                  Title $0, Action (Mouse 1) `Exec $2`)
   + I Style $0Launch HandleWidth 0, NoTitle
   + I Module FvwmButtons $3 $0Launch
   # Examples:
   Launcher RXVT xterm.xpm "rxvt -bg black" "-g +0+0"
   Launcher XV   xv.xpm    "xv"   "-g +0+100"
```

Also, GNOME and KDE have desktop icon applications gmc and kfm,
which enable this functionality.  These applications may be run
under fvwm. Nautilus (version >= 2) and kdesktop may be run under
fvwm version 2.5.1 or better.

#### Positioning a window using arithmetic.

This example shows how to center a window on the screen.  Note
how is uses PipeRead and the shell construct $(()) in order to
perform arithmetic.

```
   DestroyFunc CenterWindow
   AddToFunc   CenterWindow
   + I ThisWindow Piperead "echo Move \
     +$(( $[vp.width]/2-$[w.width]/2 ))p \
     +$(( $[vp.height]/2-$[w.height]/2 ))p"
```

If you had a window named "MyWindow" you would center it using
the command:

`Next (MyWindow) CenterWindow`

ThisWindow may be removed, it is only needed to avoid errors when
CenterWindow is called without a window context.  (In which case
see the Pick command.)

With fvwm release 2.5.11, you can place windows in the center of
the screen using `Style X CenterPlacement`.

But with fvwm release 2.5.22 and greater CenterPlacement is
deprecated over the use of PositionPlacement style which allows for
not only centering windows, but positioning windows anywhere on the
screen using the same arguments as the Move command.  But in terms of
centering windows:

`Style MyWindow PositionPlacement Center`

#### Hiding the mouse pointer.

Some users don't like the mouse pointer getting in the way of
what they are looking at.  You might want to search for and
install the "unclutter" program.  Unclutter hides the mouse
pointer after you haven't moved the mouse for a while.

If you find unclutter causes the pointer to flash on and off
or move around on its own, run unclutter with the -noevents
argument.

#### Finding the mouse pointer.

Sometimes its hard to see the mouse pointer.  Here is a way to
find it:

```
   Key Super_L A A Exec xmessage -name "SmallBlob" -bg red \
     	-fg white -nearmouse -timeout 1 'I am here!'
   Style SmallBlob UsePPosition, NoTitle, NoHandles, BorderWidth 10
```

#### Autohiding FvwmButtons or other windows.

Some applications have a feature usually called "autohiding"
which allows to withdraw a window to a location where it does
not use precious desktop space.  It is possible to write some
small functions in fvwm that can hide any window you like:

fvwm-2.5.11 or later:

```
   # The autohiding functions
   DestroyFunc autohide
   AddToFunc autohide
   + I ThisWindow ($0) Deschedule $[w.id]
   + I ThisWindow ($0) KeepRc ThisWindow (shaded) WindowShade off
   + I TestRc (!Match) All ($0, !shaded) autohide_hide $1 $2

   DestroyFunc autohide_hide
   AddToFunc autohide_hide
   + I Schedule $0 $[w.id] WindowShade $1
   + I Schedule $0 $[w.id] Deschedule $[w.id]

   # Start FvwmAuto
   AddToFunc StartFunction
   + I Module FvwmAuto 1 -menter enter_handler

   # Add the windows you want to autohide
   DestroyFunc enter_handler
   AddToFunc enter_handler
   + I autohide FvwmButtons 500 S
   #            ^           ^   ^
   #            |           |   |___  Shade direction (optional)
   #            |           |_______  Hide delay (milliseconds)
   #            |___________________  Unique window name/resource
```

Simply add any windows you like to the enter_handler function
as in the example above.  The autohide function is called with
two or three parameters.  The first one is the window's name or
class, which must be unique.  The second is the delay in
milliseconds before the window is hidden after the pointer
leaves it, and the last - optional - one indicates the
direction in which it is hidden (N, S, E, W, NW, NE, SW or SE).

You can find a slightly more complicated version below.  The
difference is that showing the window does not happen
immediately, but can be delayed too.

fvwm-2.5.11 or later:

```
   DestroyFunc autohide
   AddToFunc autohide
   + I ThisWindow ($0) Deschedule $[w.id]
   + I TestRc (!Match) Deschedule -$[w.id]
   + I ThisWindow ($0) KeepRc ThisWindow (shaded) \
       autohide_show $1 $3
   + I TestRc (!Match) All ($0, !shaded) autohide_hide $2 $3

   DestroyFunc autohide_show
   AddToFunc autohide_show
   + I Schedule $0 -$[w.id] WindowShade $1 off
   + I Schedule $0 -$[w.id] Deschedule $[w.id]
   + I Schedule $0 -$[w.id] Deschedule -$[w.id]

   DestroyFunc autohide_hide
   AddToFunc autohide_hide
   + I Schedule $0 $[w.id] WindowShade $1 on
   + I Schedule $0 $[w.id] Deschedule $[w.id]
   + I Schedule $0 $[w.id] Deschedule -$[w.id]

   AddToFunc StartFunction
   + I Module FvwmAuto 1 -menter enter_handler

   DestroyFunc enter_handler
   `AddToFunc enter_handler
   + I autohide FvwmButtons 250 500 S
   #            ^           ^   ^   ^
   #            |           |   |   |__  Shade direction (optional)
   #            |           |   |______  Hide delay
   #            |           |__________  Show delay
   #            |______________________  Unique window name/resource
```

These functions work too in 2.5.8 to 2.5.10, but you may have
to remove the KeepRc command from the autohide function in both
versions.

#### Using application screenshots as icon or mini icon thumbnails.

With a bit of scripting magic, fvwm can take a screenshot of an
application window when it's iconified, resize it, and use it as
the application's icon.  However, there are some applications that
can do it on their own, which is the recommended method.

With xterm, you can use the +ai (active icon) option on the command
line:

`xterm +ai`

There is a live-icon elisp package for XEmacs.  Put this in your
XEmacs configuration file:

```
   (load-library "live-icon")
   ; Control size, same as max icon size, uncomment if you want
   ; this feature.
   ;(setq live-icon-max-height 48)
   ;(setq live-icon-max-width 48)
```

Make sure you are not using the style IconOverride for these
applications.  It disables the use of active icons.  There may be
other applications with similar features.

Assuming you want application thumbnails as icons provided by fvwm,
you need fvwm 2.5.8 or later, as this solution requires the
WindowStyle command, and you should have the ImageMagick utilities
available in your $PATH -- <http://www.imagemagick.org>.

The function below provides a Replacement for the Iconify command
called Thumbnail, which you can use in your bindings and raises
each window, takes a screenshot and attempts to set the screenshot
as the window's Icon.  Taking a screenshot may take a couple of
seconds.  The window is iconified immediately, but the new
thumbnail is activated when the screenshot is ready.

Note that a screenshot can only be made reliably from the visible
parts of a window.  So if the window is halfway off screen, on a
different desk, or buried beneath other windows, the thumbnail may
be smaller than expected or be empty in the hidden parts.  There is
no way to prevent this.

The same solution should work for mini icons.  Just replace the
word "icon" with "miniicon" everywhere.

```
   DestroyFunc Thumbnail
   AddToFunc Thumbnail
   + I Raise
   + I ThisWindow (!Shaded, Iconifiable, !Iconic) PipeRead \
       "xwd -silent -id $[w.id] | convert -scale 64 -frame 1x1 \
       -mattecolor black -quality 0 xwd:- \
       png:$[FVWM_USERDIR]/icon.tmp.$[w.id].png \
       && echo WindowStyle IconOverride, \
       Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png \
       || echo Nop"
   + I Iconify
```

You can use FvwmEvent to remove the Icons when each window is
returned to its non Iconic state.

```
   DestroyFunc DeThumbnail
   AddToFunc DeThumbnail
   + I Exec rm -f $[FVWM_USERDIR]/icon.tmp.$[w.id].png
   + I DestroyWindowStyle

   *FvwmEvent: deiconify DeThumbnail

   AddToFunc StartFunction I Module FvwmEvent
```

If you cannot use DestroyWindowStyle as you require it for some
other purpose, you can save the window's current Icon, and restore
it when required, this solution requires fvwm 2.5.9 or later.

The Thumbnail function should look like this:

```
   DestroyFunc Thumbnail
   AddToFunc Thumbnail
   + I Raise
   + I SetEnv Icon-$[w.id] $[w.iconfile]
   + I ThisWindow (!Shaded, Iconifiable, !Iconic) PipeRead \
       "xwd -silent -id $[w.id] | convert -scale 64 -frame 1x1 \
       -mattecolor black -quality 0 xwd:- \
       png:$[FVWM_USERDIR]/icon.tmp.$[w.id].png \
       && echo WindowStyle IconOverride, \
       Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png \
       || echo Nop"
   + I Iconify
```

And then the Icon is restored with this function:

```
   DestroyFunc DeThumbnail
   AddToFunc DeThumbnail
   + I PipeRead "echo WindowStyle Icon \\$\\[Icon-$[w.id]\\]"
   + I UnsetEnv Icon-$[w.id]
   + I Exec rm -f $[FVWM_USERDIR]/icon.tmp.$[w.id].png
```

These Icons can also survive a Restart by adding this check to your
StartFunction:

```
   AddToFunc StartFunction I Test (Restart) All (Iconic) \
     Test (f $[FVWM_USERDIR]/icon.tmp.$[w.id].png) WindowStyle \
     IconOverride, Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png
```

You can also check for any remaining icons left behind and remove
them in your ExitFunction:

```
   DestroyFunc ExitFunction
   AddToFunc ExitFunction I Test (!ToRestart) \
     Exec rm -f $[FVWM_USERDIR]/icon.tmp.*
```

The same solution should work for mini icons.  Just replace the
word "icon" with "miniicon" everywhere.

Taming problematic application windows
======================================

#### I'm having problems giving Wine windows focus.

This is a known issue.  The ICCCM states that windows that take
input should indicate so in their WM hints.  Wine windows don't do
this.  To work around this issue try:

`Style * Lenience`
