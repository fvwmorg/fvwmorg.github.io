---
title: FvwmRearrange
type: module
weight: 750
description: |
  FvwmRearrange can be used to tile or cascade windows.
---
# FvwmRearrange

<div class="alert alert-warning text-dark">
FvwmRerrange options changed in fvwm3 1.1.1, below only
applies to that version and newer. For older versions
refer to the manual page for the options.
</div>

* TOC
{:toc}

This module can be called to tile or cascade windows.

When tiling the module rearranges all the windows on the current
monitor into a grid (or matrix). By default FvwmRearrange will
tile the windows into a grid that is close to a square grid as
possible based on the number of windows on the monitor. The size
(and direction) of the grid can be configured using various options.

When cascading the module will resize (to 75% the size of the monitor)
then place them starting from the top left of the monitor, and place
each window down and to the left of the previous window so its title
bar and borders can be seen behind it. Both the size windows are
resized to and the size of the increments can be configured using
various options.

## Configuration and Use

FvwmRearrange is a module that must be invoked from fvwm. It can be
add to a menu, key binding, event, and so on. FvwmRearrange is configured
using command line options (all with a single `-`). These options affect
the placement, resizing, ordering of windows and so on. For a full list
of FvwmRearrange configuration options see the FvwmRearrange manpage.

The simplest way to run FvwmRerrange is with no options, which 
will auto tile (the same as the `-auto_tile` option) the windows
on the current monitor. You can additionally specify a specific
monitor to rearrange, and how to order the windows. For example
to auto tile all the windows and order them by their class in
reverse alphabetical order on the RandR monitor `DP-2` use:

{% fvwm2rc %}
FvwmRearrange -screen DP-2 -order_class -reverse
{% endfvwm2rc %}

By default FvwmRerrange cannot restore the position of the windows.
If you want to be able to return windows to their original position
you can by including the `-maximze` option (note this only works on
windows which are not already in the maximized state), which will put
all the windows into a maximized state. This allows you to return the
 window to its original position by unmaximizing them. For example:

{% fvwm2rc %}
# Auto tile all windows on RandR monitor DP-2
FvwmRearrange -screen DP-2 -maximize

# Restore the windows original position
All (CurrentPage, !Iconic, CirculateHit, !Sticky) Maximize Off
{% endfvwm2rc %}

## Tiling Windows

Tiling windows will place them in a grid, whose size can be controlled
using various options. By default FvwmRerrange will use an auto tile mode
which will compute a grid that is as close to a square as possible depending
on the number of windows available. For instance if you have 6 windows, a
2x2 grid is too small, while a 3x3 grid is too big, so a 3x2 grid will be
used instead (if the option `-swap` is included the grid will be 2x3).

If the number of windows doesn't match the size of the grid some cells are
initially empty, for example if there are only 5 windows and a 3x2 grid is
used, one cell of the grid is left empty. In auto tile mode the option
`-fill_start` is implied, which will fill the first row (or column if `-swap`
is used) with the first two windows, and then place the remaining 3 windows
on the second row using all the space. The option `-fill_end` can be used to
instead fill the first row with the first three windows, then fill the last
row with the remaining two windows.

The size of the grid can be controlled in various ways. If using auto tile
mode, the option `-max_n N` can be used to offset the size of the grid, by
stating how many more columns (or rows with `-swap`) the final grid must
have.  For example `-max_n 2` will mean there is always at least two more
columns than rows, so 5-8 windows will cause a 4x2 grid (or a 2x4 grid with
`-swap`). For more control of the grid use the `-tile` option, which will
put all windows into a single row (or column with `-swap`). If you combine
`-tile` with `-max_n N`, then you can specify the maximum number of columns
(or rows). For example `-tile -max_n 3` will tile the windows so there is at
most three columns, and the number of rows is based off the number of windows
tiled. By default `-tile` will leave cells empty unless the `-fill_start` or
`-fill_end` option is included.

Last, windows are resized to fit into their respective cells subject to
EWMH size hints. That means windows like terminals that include hints to
only allowing resizing by specific increments (equal to the size of a single
character in terminals) may not completely fill their cell leaving gaps. If
you want to override this behavior, tell fvwm to ignore resize hints using
the following style:

{% fvwm2rc %}
Style * ResizeHintOverride
{% endfvwm2rc %}

## Cascading Windows

FvwmRerrange can be used to cascade windows using the `-cascade` option.
This option mimics the fvwm `CascadePlacement` style where windows are placed
starting in the upper left corner of the monitor, placing each window on top
of the previous window shifted down and to the left so the title bar and
border of the previous window is seen behind it.

By default FvwmRerrange will resize the windows to be 75% the size of the
current monitor. The option `-noresize` can be used to prevent FvwmRearrange
from resizing the windows, while the option `-nostretch` will prevent
FvwmRerrange from making windows bigger, but will shrink them to fit if they
are too big. The options `-cascadew X` and `-cascadeh Y` can be used to
specify the width and height of the windows. `X` and `Y` are taken to be
percent of the bounding box, or pixel sizes if they are suffixed with a `p`.

The options `-inc_equal` can used to make the horizontal and vertical offsets
the same. The options `-incx X` and `-incy Y` can be used to specify additional
offsets in the respective direction. The values `X` and `Y` are percent values
or pixel sizes if suffixed with a `p`. The options `flatx` and `flaty` will
disable auto increments, and if used with `-incx X` and `-incy Y` can be used
to specify the exact increments.

The following example will cascade and resize the windows to have a width
of 60% the monitor, a height of 75% the monitor, and make the horizontal
and vertical offsets equal.

{% fvwm2rc %}
FvwmRearrange -cascade -inc_equal -cascadew 60
{% endfvwm2rc %}

## Window Ordering

FvwmRearrange places the windows in the order they are reported by fvwm, that
is the stack order (usually based off of how recently a window was focused)
is used. It is possible to reorder the windows using various order options.
`-order_name`, `-order_icon`, `-order_class`, and `-order_resources` orders
the name, icon name, class, or resource alphabetically. `-order_xy` and
`-order_yx` order the windows based on their position on the screen.
`-order_hw` and `order_wh` order windows based on their height and width.
All orders can be reversed using the `-reverse` option.

## Bounding Box

FvwmRearrange honors any `EWMHBaseStruts` of the monitor it is on and will
move and resize windows to fit inside the EWMH working area.  If the option
`-ewmhiwa` is include, the working area be ignored and FvwmRearrange will
use the full monitor. The global screen can be used, `-screen g` to span
multiple monitors (this implies `-ewmhiwa`).

In addition you can specify a bounding box by adding including four additional
numbers at then end of the options. The numbers give the `Left Top Right Bottom`
position of the region of the monitor to use. These can either be percent values
or pixel values if a `p` suffix is used.

The bounding box can be used to work with more complicated setups. For example
if your want a web browser to take up the left half of the monitor, and then
tile the remaining windows on the right half of the monitor into at most two
columns, use the following (half way is 50%, if you want to avoid panels or be
more exact use pixel values instead):

{% fvwm2rc %}
FvwmRearrange -tile -max_n 2 -fill_end 50 0 100 100
{% endfvwm2rc %}

## Examples

Setup a key binding to auto tile the current monitor, and order by class
so the windows appear in approximately the same order. When windows are
added or removed, just hit Alt-T to tile again.

{% fvwm2rc %}
# Alt-T auto tile
Key t A M FvwmRearrange -order_class
{% endfvwm2rc %}

Use FvwmEvent to make it so you auto tile the monitor a window is
added to or deleted from. This uses the context of the window to
determine what monitor it was on, and only rearranges that screen.

{% fvwm2rc %}
# FvwmEvent triggers on add_window and destroy_window.
DestroyModuleConfig FE-AutoTile: *
*FE-AutoTile: Cmd Function
*FE-AutoTile: add_window AutoTile
*FE-AutoTile: destroy_window AutoTile

DestroyFunc AutoTile
AddToFunc AutoTile I FvwmRearrange -screen $[w.screen] -order_class

# Run FvwmEvent when fvwm starts.
AddToFunc StartFunction I Module FvwmEvent FE-AutoTile

# Ignore size hints so windows fill the full cell when tiled.
Style * ResizeHintOverride
{% endfvwm2rc %}

This example is attached to key binding (alt-T) which will auto tile all
windows on the current monitor. With the same keybinding, it will restore
all windows to their original position. To work in a multiple monitor
setup, the current state is saved in an `InfoStore` variable
`TitleSwitch<monitor name>`.

{% fvwm2rc %}
DestroyFunc AutoTile
AddToFunc AutoTile
+ I FvwmRearrange -maximize

DestroyFunc Tile
AddToFunc Tile
+ I Test (EnvMatch infostore.TileSwitch$[monitor.current] ON) TileOff
+ I TestRc (NoMatch) TileOn

DestroyFunc TileOn
AddToFunc TileOn
+ I AutoTile
+ I InfoStoreAdd TileSwitch$[monitor.current] ON

DestroyFunc TileOff
AddToFunc TileOff
+ I All (CurrentPage, !Iconic, CirculateHit, !Sticky) Maximize Off
+ I InfoStoreAdd TileSwitch$[monitor.current] OFF

# Alt-T key binding
Key t A M Tile
{% endfvwm2rc %}
