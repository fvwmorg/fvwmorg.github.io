---
layout : wiki
title : DefaultConfig
version : fvwm2
type : config
weight : 250

description : |
	This is a quick overview of the default config file
	Fvwm ships with

---

If you are new to Fvwm, you might probably want to start in the
New to Fvwm Section of the Wiki]({{ "/NewToFvwm" | prepend: site.wikiurl}}). 

This page gives some insight into the default configuration that comes
with Fvwm.

At the end of this overview, you find the current default configuration 
Fvwm ships with. It is obvious that such a default setting needs to make
choices, and this page tries to explain some of these choices so as to 
enable the (new) user to understand them and to begin adapting the config
to their own needs. Again, this needs to be limited, please refer to the 
man page for a more exhaustive discussion of all available options.

1: Functions
2: Styles
3: Colorsets
4: Menus
5: Bindings
6: Decor
7: Modules


# Functions

There is already a more elaborate page on functions:  
[/Wiki/Functions]({{ "/Functions" | prepend: site.wikiurl }})

The StartFunction can also be used an elegant autostart section.
You can, e.g., add

{% highlight fvwm %}
+ I Test (Init) exec conky
{% endhighlight %}

to start your standard conky right at startup.


# Styles

Styles are settings that, broadly speaking, influence everything that is
related to windows and their behaviour.

## Focus Style
Fvwm has two ways of focusing a window using the mouse: clicking in the window
(this is the behaviour used in most other window managers like Windows), and
entering the window with the mouse pointer. 



## Focus by clicking a window:

{% highlight fvwm %}
Style * ClickToFocus
{% endhighlight %}




## Focus by putting mouse pointer in window


### Focus always under mouse pointer

{% highlight fvwm %}
Style * FocusFollowsMouse
{% endhighlight %}

In this configuration, the focus is always where the mouse is; if you move
the mouse out of a window that window loses focus, and if the mouse pointer
doesn't enter another window (stays on the root background, e.g.), no window
is focused at all.


### Focus in last window under mouse pointer

{% highlight fvwm %}
Style * SloppyFocus
{% endhighlight %}

In this configuration, the focus is in the window that was last "touched" by
the mouse pointer. If the pointer leaves the window and rests on the root background,
e.g., the window doesn't lose focus. This is the default in the default config.
This config  can make sense if you like to keep on writing in a window, but move 
the pointer far out of sight, possibly even to another screen altogether.

Unless you click to focus, the window is only focused, it is not _raised_ to the top,
so you might end up with a focused window of which you only see small areas because 
other windows cover it. Here, you can add _ClickToRaise_ to the style. This will
then raise the window to the top (i.e. make it wholly visible on top of all other 
windows) once you click somewhere in it. This is the default in the default config:

{% highlight fvwm %}
Style * SloppyFocus, MouseFocusClickRaises
{% endhighlight %}

## OpaqueMove

The default config sets the behaviour of windows that are moved or resized to the
values we know from other window managers, a kind of what you see is what you get.
Fvwm has another mode, in which the window and its contents are not dynamically moved 
or resized, but only after the window has been put in its new place or its new shape
respectively. When moving or resizing, you see what the comments in the default config 
call "a wired frame" and the man page "rubber-band". 
This behaviour can be achieved by:

{% highlight fvwm %}
XORValue 0
OpaqueMoveSize 0
Style * ResizeOutline, SnapAttraction 15 SameType ScreenAll, SnapGrid
{% endhighlight %}

XORValue influences the colour of the wire or rubber band, play with values as you like
until you're happy with the outcome, you cannot break anything.



# Menus

The default config tests for some typical programs that might be found on the average machine.
Once you are happy with your config, you can safely remove any line from _Programs Menu_ that
refers to a program you haven't installed - and you can remove the "Test (x program)" bit, too.



# Decor

There are already elaborate pages in this Wiki that deal with decor, start here: 
[Wiki/Decor]({{ "/Decor" | prepend: site.wikiurl }})



# Default Config
{:.no_toc}

* TOC
{:toc}

Starting with FVWM 2.6.7 a default configuration file was introduced. When
FVWM starts it loads some internal defaults, then looks for a [Configuration](
/Wiki/Config) file (see the **INITIALIZATION** section of the manual page for
details). If it is unable to find any configuration file it loads the default
configuration.

The default configuration file is a fully commented configuration file that
both gives users [new to FVWM](/Wiki/NewToFvwm) a default set of options to
start with and a commented configuration file, which describes the config
options used that they can edit to start creating their own config.

Here is a copy of the [fvwm2 default-config](
https://github.com/fvwmorg/fvwm/blob/master/default-config/config)
and the [fvwm3 default-confg](
https://github.com/fvwmorg/fvwm3/blob/master/default-config/config).

## Anatomy of the Default Config

Most aspects of FVWM are configurable, as such the default configuration
file is quite long. It configures everything from key bindings, window
decoration, what buttons do, how windows behave, and even additional
modules. For new users the default configuration can be confusion, so
here is a brief overview of the defaults.

### Bindings

All [key bindings and mouse bindings](/Wiki/Config/Bindings/) (what happens
when you click on a button, window, etc) are configurable. The default
config file sets up the following bindings.

**Key Bindings**

+ **Alt-F1** or **Menu Key**: Open the root menu.
+ **Alt-Tab**: Opens a menu to cycle through the current windows. Holding Alt
  down and hitting tab will cycle through the windows. Releasing Alt will
  select that window and take you to it (Focus it).
+ **Ctrl-1**, **Ctrl-2**, **Ctrl-3**, **Ctrl-4**: Takes you to the Virtual
  Dekstops 1-4.
+ **Super_R** (the right windows key): Opens a terminal (xterm by default).

**New in fvwm3**

+ **Alt-Space**: Opens a dynamic menu (if `dmenu_run` is installed) that is
  used to run commands.
+ **Ctrl-Alt-ArrowKey**: Moves the current window in the selected direction
  until it hits another window or screen boundary.
+ **Ctrl-Alt-Shift-ArrowKey**: Grows the current window in the selected
  direction until it hits another window. Hitting the maximize button
  returns the window to its original size.

**Mouse Bindings**

The mouse buttons are Mouse 1 = left button, Mouse 2 = middle button, Mouse
3 = right button, Mouse 4 = scroll wheel up, Mouse 4 = scroll wheel down.

+ Mouse 1 on root window (desktop): Opens the root menu.
+ Mouse 2 on root window (desktop): Opens a menu that lists all windows.
+ Mouse 3 on root window (desktop): Opens the full window operations menu.
+ Mouse 1 on any window: Raises the window.
+ Mouse 1 hold and drag title bar: Move the window.
+ Mouse 1 hold and drag window border: Resize the window.
+ Mouse 1 double click title bar: Maximize/Unmaximize the window.
+ Mouse 3 on the title bar: Opens the short window operations menu.
+ Mouse 4 (scroll up) on the title bar: Shades the window.
+ Mouse 5 (scroll down) on the title bar: Unshades the window.

### Menus

All [Menus](/Wiki/Config/Menus/) are fully configurable. You can create
as many menus as you want, configure how to open them, and even what
they look like. The default config includes the following menus:

+ **FvwmRoot Menu**: This menu is includes the Programs Menu,
  XDG Menu, Background Menu, FvwmManPage Menu, and access to a terminal,
  FvwmConsole, and to Restart or Quit FVWM.
+ **Programs Menu**: A collection of commonly used programs (if they
  are installed).
+ **XDG Menu**: This menu is generated using the XDG deskop menu specs.
  If you have `python-xdg` installed along with a desktop menu from LXDE,
  Gnome, etc, it will use that to generate a desktop menu.
+ **Background Menu**: A collection of some tileable wallpapers.
+ **FvwmManPage Menu**: Access to the FVWM manual pages.
+ **WindowOps Menu**: A collection of actions you can preform on windows
  (such as iconify, maximize, resize, etc). There is both a short and long
  version. This can be access by right clicking the desktop or a window's
  title bar.

### Virtual Desktops

FVWM does virtual desktops differently, it virtualises desktops using both
[Desks and Pages](/Wiki/Config/PagesAndDesks/). First it has the standard
virtual desktop support found in other window managers (called Desks),
where you can have collection of windows visible on independent desks
that you can switch between.

Second, FVWM divides each desktop into a grid Pages. You can think of Pages
as an extension of the current desktop, where each page is the size of
your current viewport. You can then move left/right/up/down through these
pages. You can access other pages by dragging your mouse to the edge
of your screen, then `EdgeScroll` will scroll you to the next page. You
can move windows between pages by dragging them over the edge of your screen
moving them to the next page (note there is a delay, before the page switch
to avoid accidentally switching pages).

The default configuration configures 4 Desks and each of the Desktops are
divided in to a 2x2 grid of 4 Pages.

### Styles

[Window Styles](/Wiki/Config/Style/) are a versatile set of options
for how windows look, behave, and much more. FVWM has hundreds of styles
that can be applied to all windows, or a group of windows, or specific
windows. These styles can configure most aspects of windows. Some of
the styles used in the default config are:

+ **SloppyFocus**: Windows are focused when the mouse pointer enters the
  window, so whatever window the mouse is in has focus.
+ **!Icons**: When a window is Iconfied (minimized) it does not (due to the
  `!`) create an Icon on the desktop. Note the reason FVWM calls minimizing
  a window **Iconify** is because in traditional window managers (before
  task bars) the minimized window would turn into an Icon on the desktop.
  The default config doesn't use this feature, but you can turn it back
  on with `Style * Icon`.
+ **ResizeOpaque**: When a window is resized you see the window contents.
  The other option is to only see a resize grid. The resize grid is a nice
  retro look and is useful on very old hardware.
+ **SnapAttraction**: When moving a window around, if you get within 15
  pixels of another window or screen edge, it will snap to it. This helps
  to move windows to screen boundaries or next to other windows.

### Colorsets

FVWM uses [Colorsets](/Wiki/Config/Colorsets/) to configure the colors
of window decors, menus, and modules. The default config defines the first
fifteen colorsets (0-14) for use:


{% highlight fvwm %}
#######
# Colorset Convention
#
#   0 - Default
#   1 - Inactive Windows
#   2 - Active Window
#   3 - Inactive Windows Borders
#   4 - Active Windows Borders
#   5 - Menu - Inactive Item
#   6 - Menu - Active Item
#   7 - Menu - Grayed Item
#   8 - Menu - Title
#   9 - Reserved
#  10+ Modules
#      10 - Module Default
#      11 - Module Hilight
#      12 - Module ActiveButton (Mouse Hover)
#      13 - FvwmPager Active Page
#      14 - FvwmIconMan Iconified Button
###########
{% endhighlight %}

The colors used by the default config are based off the colors used
on the [fvwm.org](/) website years ago (2000ish).

### Functions

FVWM provides the ability to write custom [Functions](/Wiki/Config/Functions/)
which can be used to link various FVWM configuration tools together to
provide even more control over how to interact with windows using FVWM.
The default config uses Functions to help assist in many of its aspects.

No need to go into detail about the functions here, just pointing out
how extensive the FVWM config file is and all of the options that can
be used to configure (program) your own setup.

### Modules

FVWM also includes a collection of [Modules](/Wiki/Modules/)
which can add to FVWM. These modules include tools that can extend
the features of FVWM and even make it more desktop like. Some
modules the default config uses are:

+ [**FvwmButtons**](/Wiki/Modules/FvwmButtons/): A module that can
  be used to create anything from a collection of simple buttons
  to launch apps, to full [Panels](/Wiki/Panels/). The default config
  uses FvwmButtons to create the [RightPanel](/Wiki/Panels/RightPanel/).

+ [**FvwmPager**](/Wiki/Modules/FvwmPager/): A module that provides
  a miniature view of the virtual desktop (Desks and Pages). This
  module can be used to see your current virtual layout, move between
  desks and pages, and even move windows around. The default config
  Swallows the pager in the RightPanel.

+ [**FvwmIconMan**](/Wiki/Modules/FvwmIconMan/): A module that functions
  as a task bar of sorts. It lists running windows, and allows you to
  access them. The default config Swallows FvwmIconMan in the RightPanel
  which can be used to switch to the selected window (left click) or
  open up the window ops menu (right click) to act on the selected window.

+ [**FvwmIdent**](/Wiki/Modules/FvwmIdent/): This simple module gives you
  information about a window. This can be useful to identify a windows
  name/class/resource if writing a Style for it. The default config includes
  this module in the window ops menu under 'identify'.

+ [**FvwmEvent**](/Wiki/Modules/FvwmEvent/): This powerful module allows
  you to run custom functions when certain events trigger (focus changes,
  page/desk changes, when windows are iconified, maximized, and so on).
  This module can be used to automate certain actions (like auto hide
  a panel). The default config uses FvwmEvent to change the active desktop
  in the RightPanel whenever a desk change event happens.


## Making Changes to the Default Config

Most likely you want (and should) make changes to the default config, as
the power of FVWM is to configure it to do what you want, and no default
config file can ever satisfy everyone.

The default config is meant to be a starting point and something usable
for new users. To edit the default config you need to first copy it to
`$FVWM_USERDIR/.config` (`$HOME/.fvwm/config` by default), then edit
your copy. You can use the `Copy Config` option in the FvwmRoot Menu
to do this for you.

Use the comments in the configuration file, the [Fvwm Wiki](/Wiki),
and the manual pages to look up options and to customize until you
make FVWM your window manager.

### Local Configuration File

Starting in Fvwm3 1.0.4, there is now a local configuration file that
(if it exists) is read after the default config file. If you don't
want to have a copy of the fully default config, you can create the
file `$FVWM_USERDIR/local.config` (`$HOME/.fvwm/local.config` by default).
Any commands you enter into that file are read after the default config
and can be used to change, override, or add to the default configuration.

