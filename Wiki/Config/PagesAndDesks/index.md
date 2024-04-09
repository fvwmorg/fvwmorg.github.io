---
title: Virtual Pages and Desks
type: config
weight: 470
description: |
  Fvwm supports multiple Virtual Desktops, and each Desktop
  is further split into an NxM grid of Pages.
---

# Virtual Desktops

* TOC
{:toc}

Fvwm splits up its virtual desktops into pages and desks.
Starting with fvwm3, [DesktopConfiguration](
{{ "/Config/DesktopConfiguration" | prepend: site.wikiurl }})
can be used to configure if monitors can move through each
virtual desk or page independently.

The module [/Modules/FvwmPager](
{{ "/Modules/FvwmPager" | prepend: site.wikiurl }})
gives a miniature view of your desks, pages, windows,
and monitors location.

## Pages

A single fvwm Desktop is split up into an `NxM` grid of pages.
Each page is a single viewport of all the [Monitors](
{{ "/Config/Monitors" | prepend: site.wikiurl }})
together. The virtual desktop is then extended in such a way
that the current view is of a single page in this much larger
virtual screen. The number of pages is configured with the
`DesktopSize` command.

{% fvwm2rc %}
# 4 Desktops split into a 3x2 Grid.
# Pages are identified using two numbers:
# COLUMN ROW
#   +---+---+---+
#   |0 0|1 0|2 0|
#   +---+---+---+
#   |0 1|1 1|2 1|
#   +---+---+---+
DesktopSize 3x2
{% endfvwm2rc %}

That will give you a grid of 3x2 Pages where the numbers
are the x and y coordinates of each page. You can move through
the pages using the `GotoPage` (and `MoveToPage` for windows).

In addition to just moving through the page you can scroll or only move part
way between two pages. You can also set up functions that will automatically
move you between pages when your mouse hits the edge of the screen.
For example (note, in fvwm3 all of these commands can be configured per
monitor by adding the `screen RandRname` option):

{% fvwm2rc %}
# EdgeScroll Xpercent Ypercent
# EdgeResistance - Timer before scrolling
# EdgeThickness - size of border for mouse around edge of screen
# Styles for dragging windows over the boundaries.
#
# Set EdgeScroll 0 0 and/or EdgeResistance -1 to disable.
EdgeScroll 100 100
EdgeResistance 450
EdgeThickness 1
Style * EdgeMoveDelay 350, EdgeMoveResistance 350
{% endfvwm2rc %}

Additionally you can move around with

{% fvwm2rc %}
GotoPage screen RandRname xPage yPage
GotoDeskAndPage screen RandRname desk xPage yPage
{% endfvwm2rc %}

## Desktops

Fvwm supports multiple Desktops. The default desktop is 0 and there
is no set cap on the number of desktops you can use. Desktops are
available on demand and can be moved between using the `GotoDesk`
command (note `MoveToDesk`, for windows, as the same syntax).

`GotoDesk` can be configured to go to a specific Desk or just cycle
through them. Here are some examples:

{% fvwm2rc %}
# GotoDesk [step] [min] [max]
# One Desk forward, max of 6
GotoDesk 1 0 6
# One desk backwards min of 0
GotoDesk -1 0 6

# GotoDesk [relative] [absolute]
# GotoDesk 5
GotoDesk 0 5
# GotoDesk 2
GotoDesk 0 2
{% endfvwm2rc %}

Additionally Desktops can be given names with:

{% fvwm2rc %}
DesktopName 0 Main
DesktopName 1 Web
...
{% endfvwm2rc %}

