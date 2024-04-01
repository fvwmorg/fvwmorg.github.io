---
layout: wiki
title: FvwmConsole
type: module
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

FvwmConsole has been replaced by [FvwmPrompt](
{{ "/Modules/FvwmPrompt" | prepend: site.wikiurl }}),
which can function both as an interactive console and command line tool
to send fvwm commands. Fvwm will only build and install one of FvwmConsole
or FvwmPrompt. If FvwmPrompt is installed, FvwmConsole won't be, so you
must use FvwmPrompt instead. Due to the Go language requirements,
FvwmPrompt is not built on most systems (most notably FvwmPrompt is not
included in the Debian package). [FvwmCommand](
{{ "/Modules/FvwmCommand" | prepend: site.wikiurl }}) is another
module that can be used to send fvwm commands directly.

FvwmConsole must be run from fvwm. You can either start a console when you
boot, or add a key or menu, key binding, FvwmButon, etc, to run FvwmConsole
from within fvwm.

{% highlight fvwm %}
# Launch FvwmConsole when fvwm starts.
AddToFunc StartFunction Module FvwmConsole

# Add FvwmConsole to a menu
AddToMenu MenuName
...
+ "Fvwm&Console" Module FvwmConsole -terminal xterm
{% endhighlight %}

Since only one of FvwmConsole or FvwmPrompt can be installed, a portable
option is to only add them to a menu (or add key bindings etc) after first
testing for the existence of each module. The following is used in
the [Default Configuration]({{ "/DefaultConfig" | prepend: site.wikiurl }})
to only include the menu entry for the module that is installed.

{% highlight fvwm %}
AddToMenu MenuFvwmRoot "Fvwm" Title
+ ...
Test (x $[FVWM_MODULEDIR]/FvwmConsole) + "Fvwm&Console%icons/terminal.png%" Module FvwmConsole -terminal $[infostore.terminal]
Test (x FvwmPrompt) + "&FvwmPrompt%icons/terminal.png%" Exec exec $[infostore.terminal] -title FvwmPrompt -e FvwmPrompt
+ ...
{% endhighlight %}

