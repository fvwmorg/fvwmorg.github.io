---
layout: wiki
title: FvwmPrompt
type: sendtofvwm
weight: 700
description: |
  FvwmPrompt is a command line tool that can be run in a terminal (such
  as xterm) and can either send fvwm a single command to process or open
  an interactive shell that can be used to send fvwm multiple commands.
---
# FvwmPrompt

FvwmPrompt is the replacement of both [FvwmConsole](
{{ "/Modules/SendToFvwm/FvwmConsole" | prepend: site.wikiurl }}) and
[FvwmCommand]({{ "/Modules/SendToFvwm/FvwmCommand" | prepend: site.wikiurl }})
introduced in fvwm3. FvwmPrompt allows users to send commands
directly to fvwm from a terminal, such as xterm.
If FvwmPrompt is run with no arguments, then it will open up an
interactive shell that can be used send fvwm commands one at a time.
If FvwmPrompt is given a command, it will send that command to fvwm
without opening the interactive shell.

{% highlight sh %}
# Open an interactive shell to send fvwm commands.
$ FvwmPrompt

# Send fvwm a single command to change the current virtual desktop.
$ FvwmPrompt GotoDesk 0 2
{% endhighlight %}

FvwmPrompts communicates to fvwm via the [FvwmMFL](
{{ "/Modules/SendToFvwm/FvwmMFL" | prepend: site.wikiurl }})
socket, and as such FvwmMFL must be running to use FvwmPrompt,
so be sure to start FvwmMFL from your StartFunction:

{% highlight fvwm %}
AddToFunc StartFunction I Module FvwmMFL
{% endhighlight %}

The fvwm source will only build FvwmPrompt or FvwmConsole, not both,
so you will only have access to one of the tools. Since FvwmPrompt
is built using the Go language, it may not be built on all systems.
If FvwmPrompt is not built, use FvwmConsole for an interactive console
and FvwmCommand for a command line tool to send fvwm commands.

