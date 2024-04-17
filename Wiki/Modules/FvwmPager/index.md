---
title: FvwmPager
type: module
weight: 900
description: |
  FvwmPager shows a miniature view of the Fvwm Desktops and Pages.
  This can be configured to show only the Current Desktop or any
  selection of Desktops.
---
# FvwmPager

* TOC
{:toc}

The FvwmPager module shows a miniature view of the how fvwm divides
its virtual desktops into [Pages and Desks](
{{ "/Config/PagesAndDesks" | prepend: site.wikiurl }}).
This can be used as a reminder of the location of the windows, allows
movement between the pages and desks, and can move windows between
the virtual desktops.

For example, my setup uses two monitors side by side, and I divide each
virtual desktop up into a 1x3 grid of pages, `DesktopSize 1x3`. Combined
with `per-monitor` [DesktopConfiguration](
{{ "/Config/DesktopConfiguration" | prepend: site.wikiurl }}),
each monitor can move up and down between the pages and between the
virtual desktops independently. Below is a screen shot of FvwmPager showing
how different monitors and windows are positioned in the virtual desktops.
The configuration for this screenshot is given in the [Example Configuration](
#example-configuration) below.

![Screenshot of FvwmPager showing 4 virtual desktops in a row.](
pager-grid.png){:.d-block .mx-auto .img-fluid}

FvwmPager is extremely configurable and the manual page already organizes
and documents each and every option. For the full list of all possible
options, read the [FvwmPager manual page](
{{ "/Man/FvwmPager" | prepend: site.baseurl }}).
This page describes how to use the pager and an overview of what options
are available.

## Version Notes

Certain aspects
shown here will only work with fvwm3 version 1.1.1 or newer. Most of the
features are still present in older pagers, so here is a quick overview
of the differences, to adjust for older versions of the pager.

+ Fvwm3 version 1.1.1 added DeskStyles that allows a uniform configuration
  of the looks of each virtual desktop individually. All the same options
  are present before this change, but some only applied to the looks of
  all desktops and couldn't be configured individually. All old configuration
  options still function, but this change added a handful of new options
  which won't work on older versions. Check the manual page for your version
  for a list of which ones still apply.

+ Fvwm3 introduced RandR support and with it the pager added the option
  `Monitor RandRname` to only show the windows on a single specified monitor.
  Fvwm3 versions 1.1.0 and 1.1.1 added the ability to show and control
  each monitor location's individually using the pager, and added the
  `CurrentDeskPerMonitor` and `IsShared` modes. For the best multi monitor
  support, use Fvwm3 1.1.1 or newer.

## Launching FvwmPager

FvwmPager must be launched using fvwm's `Module` command. This command
can be added to the `StartFunction`, menus, key bindings, buttons, etc.
Which desks are shown is chosen when launching FvwmPager, and the choices
are to either show a specified list of desktops or to always show the
current desktop.

{% fvwm2rc %}
# Show only virtual desktop 2.
Module FvwmPager 2
# Show the first four virtual desktops between 0 and 3.
Module FvwmPager 0 3
# Always show the current virtual desktop.
Module FvwmPager *
{% endfvwm2rc %}

FvwmPager supports aliases, which can allow configuring and running
multiple pagers at once, useful when using configuring each pager
to track a specific monitor and/or desktop. Provide the alias as the
first parameter to run FvwmPager using an alias. For example to make
a pager only track the RandR monitor `DP-1` under the alias `FPDP1`:

{% fvwm2rc %}
# Configure the pager
*FPDP1: Monitor DP-1
*FPDP1: MiniIcons
*FPDP1: Balloons All

# Launch the pager.
Module FvwmPager FPDP1 0 3
{% endfvwm2rc %}

FvwmPager can be launched with the optional `-transient` flag, which
puts turns the pager into a transient window that closes when done
with. This is useful with a key binding that will bring up the pager
to move between desktops, and then close afterwards.

## Icon Pager

FvwmPager pager has two separate pagers. The first is the one pictured
above, showing multiple desktops at once. When FvwmPager is `Iconified`
it will show a second pager instead of its `Icon`. This pager has no
labels and always shows the current desk (this is basically the same as
using `FvwmPager *`). This allows having a full pager showing multiple
desktops, and when `Iconified`, only showing the current desk.

Note, that in order to see the iconified pager, the icon must be shown.
The icon can be shown with the following `Style` line (let's also make the
pager sticky so it shows all desks/ages):

{% fvwm2rc %}
Style FvwmPager Icon, Sticky
{% endfvwm2rc %}

The icon pager is fully functional and can be used to move monitors and
windows around the current desktop.

## Using FvwmPager

FvwmPager can be used to move between the virtual desktops. Clicking on
the pager with `Mouse 1` (left click) will move to the desk/page clicked.
Exactly which monitor is moved depends both on the `DesktopConfiguration`
and the location clicked.

+ `global`: Clicks on the desk labels or desks will move all monitors to
   the desktop/page clicked.
+ `per-monitor`: Clicks on the monitor label will move the clicked monitor
   to the associated desktop. Clicks on the desktop will only move the
   corresponding monitor to the desk/page clicked.
+ `shared`: Clicking on a desktop currently occupied by a monitor, will move
  that monitor to the page clicked. The only way to move monitors between
  virtual desktops is using the monitor labels.
+ Only clicks in areas which it is abundantly clear what to do are honored.
  For example, clicking into a "monitor dead zone" or on a desktop label in
  `per-monitor` mode won't do anything, because it cannot be determined what
  monitor to move.

Clicking on FvwmPager with `Mouse 3` (right click) will cause fvwm's viewport
to `Scroll` centered on the location clicked. This allows partial positioning
between pages. Holding down `Mouse 3` and moving will continuously scroll
around the area. Scrolling best works with `global` desktop configuration.
Note due to the amount of communication between FvwmPager and fvwm during the
continuous scroll, this can cause the movement to lag.

Clicking and dragging a window in FvwmPager using `Mouse 2` (middle button)
will move the window to the location they are placed. Dragging the window
out of the pager will move the window to the pointers current location, and
it can be placed on the current desktop.

If balloon labels are turned on, `*FvwmPager: Balloons All`, the label with
the name of the window will hover above the window.  What the label shows
can be configured via the `BalloonStringFormat` option.

## DeskStyles

FvwmPager allows configuration of the colors/colorsets the desktops,
highlighted areas, windows, and balloon labels use. Most options can be
configured for each individual desktop shown. Due to the number of options,
read the [FvwmPager manual page]({{ "/Man/FvwmPager" | prepend: site.baseurl }})
for a full list.

The colors for each object are separated into a foreground color, used for
text and border lines, and a background color, used as fill. The color of
the desktops and highlighted areas are set by the pager, while the color
of the windows can be set by fvwm. **Unless a color is set in the pager, the
windows will use the same foreground and background color as their colorset
from fvwm**.

The foreground and background colors can be configured using `X11/rgb.txt`
color names, such as `*FvwmPager: Fore red` and `*FvwmPager: Back blue`.
Color names can be used to configure: `Fore`, `Back`, `HiFore`, `HiBack`,
`WindowFore`, `WindowBack`, `FocusFore`, `FocusBack`, `BalloonFore`,
`BalloonBack`, and `BallonBorderColor`.

[Colorsets]({{ "/Config/Colorsets" | prepend: site.wikiurl }}) are the
preferred method of using colors in FvwmPager. The colorsets can define
the foreground and background color together, and can also use pixmaps
or transparency for the backgrounds of the different desk/windows.
Colorsets can be configured using the `Colorset`, `HilightColorset`,
`WindowColorset`, `FocusColorset`, and `BalloonColorset` options.

All DeskStyle options accept the same standardized format:
`*FvwmPager: Option [desk] value`. If the _desk_ number is not included
or is `*`, then the option is applied to all virtual desktops,
otherwise it is applied only to the given _desk_ number. It is best
to set global settings first then individual desks second.

This simple example configures all desktops to use colorsets 12 and 13,
except desk 2, which uses colorsets 14 and 15. Since no window colors
are set, windows will use the same colors as fvwm.

{% fvwm2rc %}
# Set a colorset for all desks, both syntax's do the same thing.
*FvwmPager: Colorset 12
*FvwmPager: HilightColorset * 13

# Set colorset for desk 2.
*FvwmPager: Colorset 2 14
*FvwmPager: HilightColorset 2 15
{% endfvwm2rc %}

**Note:** Colorsets will always be used over color names, so if a colorset
is applied, colorname settings will have no effect. It is best to not
mix using color names and colorsets.

## Multiple Monitor Support

Fvwm and FvwmPager both support multiple monitors using RandR and their
RandR names. In addition fvwm's [DesktopConfiguration](
{{ "/Config/DesktopConfiguration" | prepend: site.wikiurl }})
`per-monitor` and `shared` modes allow monitors to move between virtual
desks and pages individually.
FvwmPager understands and can be used with any desktop configuration.
In addition the following options can be used to better help navigate
the virtual desktops when using modes like `per-monitor` or `shared`.

+ The option `*FvwmPager: Monitor RandRname` can be used to tell FvwmPager
  to only show the windows and area of the virtual desktop occupied by that
  monitor. This can be useful when controlling monitors individually to
  have a pager for each monitor that only shows what that monitor sees.

+ The option `*FvwmPager: CurrentDeskPerMonitor` will make both the icon
  pager and the full pager when viewing the current desk via
  `Module FvwmPager *` show the windows for each monitor's current desk
  independently. This way you can always see what each monitor is currently
  viewing. The following shows the windows for monitor `DP-4` on desk 0 and
  the windows for monitor `DP-2` on desk 1.

  ![Screenshot of FvwmPager using CurrentDeskPerMonitor.](
  CurrentDeskPerMonitor.png){:.d-block .mx-auto .img-fluid}

+ The option `*FvwmPager: IsShared` is designed for working with the
  `shared` desktop configuration. Since only one monitor can
  occupy a desktop at a time, the windows only occupy the space taken
  up by that single monitor, leaving a lot of empty space for
  the other monitors. The `IsShared` option only shows the windows
  for the monitor that is currently occupying the shared desktop.
  The following screenshot shows two pagers side by side in a `shared`
  desktop configuration with `DesktopSize 2x2`. The one on the left is in
  normal mode showing all monitors, and the one on the right is using
  `IsShared`.

  ![Screenshot of FvwmPager using IsShared.](
  IsShared.png){:.d-block .mx-auto .img-fluid}

  Notice all the blank space for the other monitor on each desktop, which
  remains unused in `shared` mode since only a single monitor can be on each
  desktop at a time (the monitor the windows are on currently on depends on
  the last monitor to visit that virtual desktop). The `IsShared` option
  will only show the area for the monitor that last viewed the desktop,
  by removing the unused space.

## Example Configuration

Here is the configuration of the first pager shown (top of the page).
The colorsets were built from the [CDE color themes](
{{ "/Config/Colorsets/CdeColors.tar.gz" | prepend: site.wikiurl }}).

{% fvwm2rc %}
#CDE Colors
#Default
Colorset 20 fg white, bg #686f82
Colorset 21 fg white, bg #cd9850
Colorset 22 fg white, bg #9900991b99fe
Colorset 23 fg white, bg #eda870

#Neptune
Colorset 25 fg black, bg #a2e5c6
Colorset 26 fg white, bg #3ffc93008d77
Colorset 27 fg black, bg #7889a5
Colorset 28 fg white, bg #3ffc93008d77

#Alpine
Colorset 30 fg black, bg #af35bfa1fb00
Colorset 31 fg white, bg #78aab8
Colorset 32 fg black, bg #bfc0c5
Colorset 33 fg white, bg #7ab9d8

#Crimson
Colorset 35 fg white, bg #b24d7a
Colorset 36 fg white, bg #e0b8ca
Colorset 37 fg white, bg #718ba5
Colorset 38 fg black, bg #aeb2c3

# CdePager Confgiruation
Style CdePager Sticky, Icon
DestroyModuleConfig CdePager: *
*CdePager: Font "xft:Sans:Bold:size=8:antialias=True"
*CdePager: MonitorLabels
*CdePager: Colorset 20
*CdePager: HilightColorset 21
*CdePager: WindowColorsets 22 23
*CdePager: Colorset 1 25
*CdePager: HilightColorset 1 26
*CdePager: WindowColorset 1 27
*CdePager: FocusColorset 1 28
*CdePager: Colorset 2 30
*CdePager: HilightColorset 2 31
*CdePager: WindowColorset 2 32
*CdePager: FocusColorset 2 33
*CdePager: Colorset 3 35
*CdePager: HilightColorset 3 36
*CdePager: WindowColorset 3 37
*CdePager: FocusColorset 3 38
*CdePager: WindowBorderWidth 4
*CdePager: Window3DBorders
*CdePager: MiniIcons
*CdePager: Balloons All
*CdePager: BalloonFont "xft:Sans:Bold:size=8:antialias=True"

# Run when fvwm starts
AddToFunc StartFunction I Module FvwmPager CdePager 0 3
{% endfvwm2rc %}

Here are some notes to better understand the configuration:

+ DeskStyles are of the form: `Option [desk] value`. If the _desk_
  is not included, the setting applies to all virtual desktops, otherwise
  it only applies to the specified virtual desktop.
+ Always define global settings for all desktops first, then add specific
  desks second. The first two options, `Colorset 20` and `HilightColorset 21`
  set these colorsets as the default for all desks, then future options like
  `Colorset 2 30` only applies to desk `2`.
+ `WindowColorsets 23 24` (notice the ending "s") is the older option to
  apply both `WindowColorset 23` and `FocusColorset 24` to all desktops
  in a single command. It is used here for convince.
+ `Window3DBorders` uses `hi` and `sh` colors in a colorset, and only works
  if window colorsets are used.
