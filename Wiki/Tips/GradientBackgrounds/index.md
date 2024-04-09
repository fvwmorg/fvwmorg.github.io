---
title: Gradient Backgrounds
type: tip
description: |
  This descibes how to get nice gradients on different fvwm desktops or pages.
---
# Gradient Backgrounds

* TOC
{:toc}

This describes how to get nice gradients on different fvwm desktops or pages.

## Create the Gradients

Say you have got a picture directory where you want to store the gradient pics. You can create xpm pictures having a width of 1 using commands like

    bggen -w 1 black green | convert ppm:- gradient\_green.xpm
    bggen -w 1 black blue black | convert ppm:- gradient\_blue.xpm
    bggen -w 1 black red black | convert ppm:- gradient\_red.xpm

## Switching Automatically

To switch the graident backgrounds automatically when changing
Desktops, use the FvwmBacker module.

Configure FvwmBacker in your config file:

{% fvwm2rc %}
*FvwmBacker: Command (Desk 0) Exec fvwm-root -r $[HOME]/pictures/gradient_green.xpm
*FvwmBacker: Command (Desk 1) Exec fvwm-root -r $[HOME]/pictures/gradient_blue.xpm
*FvwmBacker: Command (Desk 2) Exec fvwm-root -r $[HOME]/pictures/gradient_red.xpm
{% endfvwm2rc %}

Start FvwmBacker Module on start and restart:

{% fvwm2rc %}
AddToFunc StartFunction  I Module FvwmBacker
{% endfvwm2rc %}

After restarting fvwm your desktops having different gradient backgrounds.
Which are small and changes quite fast when changing the desktop. The same
can be achieved using pages instead of desktops.

