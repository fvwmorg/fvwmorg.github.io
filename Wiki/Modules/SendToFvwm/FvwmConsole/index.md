---
title: FvwmConsole
type: sendtofvwm
weight: 650
description: |
  FvwmConsole runs in a terminal (such as xterm) and allows one to send
  commands to the running instance of fvwm. This is a very useful module
  in testing new configurations.
---
# FvwmConsole

The FvwmConsole module allows the user to type fvwm configuration commands
into a terminal that are sent to fvwm to be executed immediately. This tool
is particularly useful for testing new configuration ideas, or opening up
a console to send fvwm commands without having previously configured a
menu, button, keybinding, etc in the configuration file.

{% fvwm2rc %}
# Launch FvwmConsole when fvwm starts.
AddToFunc StartFunction Module FvwmConsole

# Add FvwmConsole to a menu
AddToMenu MenuName
...
+ "Fvwm&Console" Module FvwmConsole -terminal xterm
{% endfvwm2rc %}

On fvwm3 and newer installs, FvwmConsole may no longer be installed.
If launching FvwmConsole fails, then it has been replaced[^1] by [FvwmPrompt](
{{ "/Modules/SendToFvwm/FvwmPrompt" | prepend: site.wikiurl }}),
and you must use that instead. Another useful tool to send commands to
send commands to fvwm is [FvwmCommand](
{{ "/Modules/SendToFvwm/FvwmCommand" | prepend: site.wikiurl }}),
which can be run from any current command line, without having
to launch a full console.

# Configuration Options

FvwmConsole inherits its resources from the terminal it is ran in (xterm by
default). You can append options to FvwmConsole to pass to the terminal to
change the style of the terminal. You can also use the `-terminal` option
to change the terminal FvwmConsole uses.

{% fvwm2rc %}
# Change FvwmConsole's style
Module FvwmConsole -g 40x10 -fg black -bg green3

# Change FvwmConsole's terminal
Module FvwmConsole -terminal rxvt 
{% endfvwm2rc %}

---
[^1]: Fvwm will only build and install one of FvwmConsole or FvwmPrompt
