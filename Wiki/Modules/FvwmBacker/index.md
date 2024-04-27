---
title: FvwmBacker
type: module
weight: 430
description: |
  This module will change the background/wallpaper when changing desktops.
  Any command can be executed when changing desktops so this module can
  be used for more than just switching the background.
---
# FvwmBacker

The FvwmBacker module provides functionality to change the background when
changing  desktops. Any command can be executed to change the backgrounds.
Actually, any arbitrary command can be sent to fvwm to execute, so you
could also do things such as changing window border colors, etc.

Between the desktops you can personalize them by giving them individual
background colors. This can be done by either using X11 color names or fvwm
[Colorsets]({{ "/Config/Colorsets" | prepend: site.wikiurl }}),
as illustrated below.

{% fvwm2rc %}
*FvwmBacker: Command (Desk 0) -solid white
*FvwmBacker: Command (Desk 1) Colorset 5
{% endfvwm2rc %}

Instead of colors, use external applications to set background images.
This example uses `fvwm-root`, which only supports `.xpm`, `.png`, and `.svg`
and cannot scale images. A tool like `feh` would support more image formats,
allow image scaling, and allow setting wallpapers per monitor.

{% fvwm2rc %}
*FvwmBacker: Command (Desk 0) Exec exec fvwm-root $[HOME]/background-mono.png
*FvwmBacker: Command (Desk 1) Exec exec fvwm-root $[HOME]/wallpaper-nature.png
{% endfvwm2rc %}

The background can also be set for each page within each desktop:

{% fvwm2rc %}
*FvwmBacker: Command (Desk 1, Page 0 0) -solid green
*FvwmBacker: Command (Desk 1, Page 1 0) Colorset 10
{% endfvwm2rc %}

`FvwmBacker` must be running in order to change the background. It is best to
start `FvwmBacker` from the [StartFunction](
{{ "/Config/Functions/StartFunction" | prepend: site.wikiurl }}):

{% fvwm2rc %}
AddToFunc StartFunction I Module FvwmBacker
{% endfvwm2rc %}

## Example

This example shows how to use `FvwmBacker` with [FvwmPager](
{{ "/Modules/FvwmPager" | prepend: site.wikiurl }}) to show the
background image used on each desktop. In this example four
desktops are used, each divided into two pages. Here is a screenshot
of `FvwmPager` showing the four desktops and background image for each
desktop. The first desktop is shown with a grey background.

![Screenshot of FvwmPager showing four desktops with different backgrounds.](
multidesk-fvwmbacker.png){:.d-block .mx-auto .img-fluid}

First configure the `Colorsets` used by `FvwmPager`. The first sets the
grey background, the next three set the `Pixmap` that `FvwmPager` will
use for the background of each desktop. The final colorset sets the color
of the active page.

{% fvwm2rc %}
Colorset 22 #92a8d5
Colorset 23 Pixmap $[FVWM_USERDIR]/images/email-thumb.png
Colorset 24 Pixmap $[FVWM_USERDIR]/images/work-thumb.png
Colorset 25 Pixmap $[FVWM_USERDIR]/images/misc-thumb.png
Colorset 30 fg #ffffff, bg #028383
{% endfvwm2rc %}

Next configure the desktops and `FvwmPager` to use the previous
colorsets.

{% fvwm2rc %}
DesktopSize 2x1

DesktopName 0 Web
DesktopName 1 Email
DesktopName 2 Work
DesktopName 3 Misc

DestroyModuleConfig FvwmPager: *
*FvwmPager: HilightColorset * 30
*FvwmPager: Rows 1
*FvwmPager: Colorset 0 22
*FvwmPager: Colorset 1 23
*FvwmPager: Colorset 2 24
*FvwmPager: Colorset 3 25

AddToFunc StartFunction I Module FvwmPager 0 3
{% endfvwm2rc %}

Finally, configure FvwmBacker to set background images for
each desktop. In addition the first desktop (`Desk 0`) will
use a different image on each page.

{% fvwm2rc %}
DestroyModuleConfig FvwmBacker: *
*FvwmBacker: Command (Desk 0, Page 0 0) Exec exec fvwm-root $[FVWM_USERDIR]/images/web.png
*FvwmBacker: Command (Desk 0, Page 1 0) Exec exec fvwm-root $[FVWM_USERDIR]/images/media.png

*FvwmBacker: Command (Desk 1) Exec exec fvwm-root $[FVWM_USERDIR]/images/email.png
*FvwmBacker: Command (Desk 2) Exec exec fvwm-root $[FVWM_USERDIR]/images/work.png
*FvwmBacker: Command (Desk 3) Exec exec fvwm-root $[FVWM_USERDIR]/images/misc.png

AddToFunc StartFunction I Module FvwmBacker
{% endfvwm2rc %}
