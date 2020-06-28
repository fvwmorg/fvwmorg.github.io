---
layout : wiki
title : BlankConfig
type : config
weight : 500
description : |
  This is a description of how to configure Fvwm3 from scratch with a blank config file
---

* TOC
{:toc}

# Starting Fvwm3 with a Blank Config File

Fvwm3 has been written with literally hundreds of options for most (if not all) aspects of window management.

In order for windows to appear in the first place, there needs to be a root area (which, in turn, needs to "look like something"); a window needs to either have decorations or no decorations; if it has decorations, they need to be defined and styled; once a window is opened, it needs to open with some kind of geometry somewhere over the root area, etc...

Imagine you need to define all these options _before_ you can make use of your window manager -- you'd be configuring it for quite some time. To provide a working Fvwm3, all the necessary options have a default setting so that you can fire up Fvwm3 from the console and begin using it as your window management tool.

Since Fvwm2 (version 2.6.7), there has been a default configuration that ships together with a new Fvwm2 install, and when you run Fvwm3, it will be read from its default location (in most cases /usr/local/share/fvwm3/default-config/config, or whatever the fvwm-datadir is set to (see:  fvwm-config -d)) until you as the user direct Fvwm3 to another specific config file. 

You could copy the default config to your own $HOME and start making Fvwm your own by adapting it (this option is described in greater detail in: [DefaultConfig](/DefaultConfig)).

Or, and that is the fun thing about Fvwm3, you can start Fvwm3 with a blank, empty config file and start configuring from scratch without all the suggestions from either the default config or any other ready-made config file you might get from the internet ([fvwmforums.org/c/fvwm-themes/user-configurations](https://fvwmforums.org/c/fvwm-themes/user-configurations/)/, e.g.).

## Where to put the blank file

In order to bypass the default config, you need to have a config in a place that is read by Fvwm3 _before_ the default. This place is `$HOME/.fvwm/config` . 

The easiest way is, of course, to simply touch the file.

## What happens then?

With an empty config file, Fvwm3 starts with its own defaults. What you see is:

  * root area is black
  * there is an arrow shaped mouse pointer
  * a very basic menu can be called with a left click on the root area.
  * in this menu, you can chose, amongst a few other things:
  * xterm as the terminal emulator, and
  * FvwmConsole as your means to communicate with Fvwm3.

You can now begin writing your very own Fvwm3 config file from scratch by opening the blank config using a text editor in an xterm window. Once you have set options and saved the file, you can re-read the new configuration by typing "read config" in the FvwmConsole window, most changes will take immediate effect.
