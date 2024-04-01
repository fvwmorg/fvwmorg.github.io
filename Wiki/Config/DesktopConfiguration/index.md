---
layout: wiki
title: DesktopConfiguration
type: config
weight: 460
description: |
  Fvwm3 supports multiple monitor setups using RandR. Using RandR
  fvwm can manage which virtual desk and page are on independently.
  DesktopConfiguration controls if monitors are treated independently
  or as a group.
---

# DesktopConfiguration

* TOC
{:toc}

Starting with fvwm3, using RandR support, fvwm can manage each
monitor connected to it independently. The `DesktopCoonfiguration`
command tells fvwm3 how to manage the virtual desktop. The three supported
modes are:

* `global` (default)
* `per-monitor`
* `shared`

Fvwm splits its virtual desktop into both [Pages and Desks](
{{ "/Config/PagesAndDesks" | prepend: site.wikiurl }}). The
[FvwmPager]({{ "/Modules/FvwmPager" | prepend: site.wikiurl }})
module provides a miniature view of the desks and virtual pages.

## Global

This is the default and traditional way of dealing with multiple monitors.
They all move through the virtual pages and desks as a single group. In
essence think of all monitors as a single big monitor that can view a given
piece of the virtual desktop.

## Per-Monitor

This allows controlling which page/desktop each monitor is on independently.
In this case think of each monitor as having its own virtual desktop
independent of each other, with the advantage you can move windows between
monitors on different desks/pages.

## Shared

This is similar to per-monitor mode, in that each monitor can move around the
pages independently. The difference is the virtual desktops are shared across
the monitors. This means, that only a single monitor can view a desk at a
time. If you move a monitor to a desk that is currently being viewed another
monitor, the two desks these monitors are viewing will be swapped. In other
words all the windows in all pages across the same desk are swapped between
the two monitors.
