---
title: Monitors
type: config
weight: 480
description: |
  Fvwm3 supports multiple monitor setups using RandR.
  Fvwm identifies monitors by their RandR name, and
  many aspects of fvwm can be configuraed on a per-monitor
  basis.
---

# Fvwm RandR Support

* TOC
{:toc}

Starting with fvwm3, monitors are managed using the RandR
protocol. RandR monitors can be configured using various
tools, two of which are the command line tool `xrandr` which
can query and configure monitors, and a graphical tool
`arandr` which you can use a GUI to position the monitors.
Fvwm will also respond to any changes to the RandR layout,
including adding, disabling, or removing monitors.

Fvwm understands each RandR monitors name, and can control
what is viewed on each monitor independently. This allows
for lots of commands to contain a `screen RandRname` configuration
open, where `RandRname` is the name of the monitor according
to `RandR`. See `xrandr -q` for monitor names and your current
configuration.

Beyond just being able to use the RandR name to specify
which screen to move windows to, or start them on, many
configuration options can be controlled per monitor.
Some notable examples are each monitor has its own set
of edges, and options such as `EwmhBaseStruts`,
`EdgeCommand`, `EdgeThickness`, and `EdgeScroll`, can
be configured individually for each monitor.

RandR arranges the monitors together into a single
bounding rectangle, which serves the current view
port of the fvwm virtual desktop layout. Each RandR
view port counts as a single Page, and fvwm divides
the virtual desktop into multiple [Pages and Desks](
{{ "/Config/PagesAndDesks" | prepend: site.wikiurl }}).
Monitors can move between the different pages and
desks independently or in a group, and this behavior
is controlled by the [DesktopConfiguration](
{{ "/Config/DesktopConfiguration" | prepend: site.wikiurl }})
command.

An overview of fvwm's virtual desktop, including which desk
and page each window and monitor is view can be seen using
the [FvwmPager]({{ "/Modules/FvwmPager" | prepend: site.wikiurl }})
module.

# Monitor Expansion and Numbering

Fvwm provides string expansion that can be used with monitors
that can be used in fvwm configuration and commands. Some examples
include `$[monitor.primary]` or `$[monitor.current]` which return
the name of the primary monitor or the monitor the pointer is in
respectively. These expansions can be used in place of a
RandR name when sending fvwm monitor based commands.


{% fvwm2rc %}
# Move the primary monitor to the second desk,
# while leaving the other monitors alone.
DesktopConfiguration per-monitor 
GotoDesk screen $[monitor.primary] 0 2
{% endfvwm2rc %}

In addition fvwm numbers the monitors based on their
position inside their combined view port. This numbering
is deterministic, starting with the top, left most
monitor being zero. And numbering each row horzitonally
The ordering then moves in rows

```
# Example 1, three monitors in a row.

+---+---+---+
| 0 | 1 | 2 |
+---+---+---+

# Example 2, one monitor above two in a row.

  +---+
  | 0 |
  +---+
+---+---+
| 1 | 2 |
+---+---+
```

This numbering is independent on which monitors are binging
used and provide a way to make a configuration only depend
on a monitors position, not its name. The name of each monitor
can be expanding using the `$[monitor.n.name]` expansion, for
example change the desk of only monitor 2 use.

```
GotoDesk screen $[monitor.2.name] 0 2
```

See the fvwm3 manual page for all the different monitor expansions
which can be used to both reference and get RandR configuration
information from, including size and position. For instance, to
get fvwm3 to tell you the width of monitor number 1, use:

```
Echo $[monitor.$[monitor.1.name].width]
```

