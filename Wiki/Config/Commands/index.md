---
layout : wiki
title : Commands
type : config
weight : 1200
description : |
  Fvwm is a command driven window manager. When Fvwm receives a command
  it processes the command to set/change settings, preform actions, and
  so on. This page is an overview of how Fvwm works and processes commands.
---

* TOC
{:toc}

# Fvwm Commands

Fvwm is configured and controlled though an extensive list of commands.
These commands control all aspects of Fvwm.

## Issuing Commands

Commands are sent to Fvwm though a variety of methods:

+ When starting Fvwm, all commands in the [Fvwm2rc](
  {{ "/Config/Fvwm2rc" | prepend: site.wikiurl }}) configuration file
  are processed.

+ Commands can be issued directly to Fvwm using the [FvwmConsole](
  {{ "/Modules/FvwmConsole" | prepend: site.wikiurl }}) or [FvwmCommand](
  {{ "/Modules/FvwmCommandS" | prepend: site.wikiurl }}) modules.

+ Commands are bound to key and mouse [Bindings](
  {{ "/Config/Bindings" | prepend: site.wikiurl }}), which are processed
  when the key and/or mouse is pressed.

+ Commands can be triggered when an event happens and issued to Fvwm
  via [FvwmEvent]({{ "/Modules/FvwmEvent" | prepend: site.wikiurl }}).

+ Fvwm [Modules]({{ "/Modules" | prepend: site.wikiurl }}) communicate
  to Fvwm by issuing commands, which Fvwm then processes. These are triggered
  depending on the module.

## Types of Commands

Commands control all aspects of Fvwm. Here is a small list of things commands
can do:

+ **Configurations:**
  create window [Decor]({{ "/Config/Decor" | prepend: site.wikiurl }}),
  set window [Styles]({{ "/Config/Style" | prepend: site.wikiurl }}),
  create [Menus]({{ "/Config/Menus" | prepend: site.wikiurl }}),
  create [Colorsets]({{ "/Config/Colorsets" | prepend: site.wikirul }}),
  and configure all aspects of Fvwm.

+ **Actions:** move and/or resize windows, change virtual pages and desktops,
  Iconify/Maximize/Shade/etc windows, run external commands, and various
  other actions.

## Custom Commands

Besides just the commands Fvwm provides, users can program multiple
commands to be processed by Fvwm at once. This greatly extends the
configurability of Fvwm to be able to link multiple commands together
into a single command.

+ Users can write their own custom [Functions](
  {{ "/Config/Functions" | prepend: site.wikiurl }}) which can combine
  multiple commands together to achieve a variety of effects.

+ External scripts can be used to create commands and read via
  `PipeRead` which allows users to greatly extend what Fvwm can do.
  For example fvwm provides a perl script `fvwm-menu-directory`
  which creates menus from a directory or a python script
  `fvwm-menu-desktop` which creates menus from an XDG deskop menu.

+ A combination of both functions and scripts can be used, for example
  [ThumbnailsAsIcons]({{ "/Tips/ThumbnailsAsIcons" | prepend: site.wikurl }})
  is a function that runs an external script using imagemagick to create
  an icon from a screenshot of a window.

**Note:** Fvwm does not wait to complete one command before running another
command, as such when sending Fvwm multiple commands, they may not
be completed in the order issued. See [FunctionSynchronisation](
{{ "/Config/FunctionSynchronisation/" | prepend: site.wikiurl }})
for details.

