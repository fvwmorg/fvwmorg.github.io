---
layout: wiki
title: FvwmCommand
type: module
weight: 660
description: |
  FvwmCommand is a python script which can send commands directly to to
  fvwm from any terminal or script, provided FvwmMFL is running.
---

# FvwmCommand

**Note:** In fvwm3, a new module [FvwmPrompt](
{{ "/Modules/FvwmPrompt" | prepend: site.wikiurl }})
exists that is a combination of FvwmCommand and [FvwmConsole](
{{ "/Modules/FvwmConsole" | prepend: site.wikiurl }}).
Though due to golang dependencies, this new module is not in wide use yet.
If FvwmPrompt is installed, you should use it instead.

FvwmCommand is a command line tool that allows you to send commands
directly to fvwm from any terminal or shell by talking to the
[FvwmMFL]({{ "/Modules/FvwmMFL" | prepend: site.wikiurl }}) socket.
FvwmCommand then sends the command you give it directly to fvwm.
For example to launch [FvwmPager](
{{ "/Modules/FvwmPager" | prepend: site.wikiurl }}) from a terminal:

{% highlight sh %}
FvwmCommand Module FvwmPager 0 3
{% endhighlight %}

You can send any command to fvwm, using `FvwmCommand <command>`. In
order for FvwmCommand to function, FvwmMFL must be running to give
FvwmCommand a socket to talk to fvwm though. So make sure you have
started FvwmMFL from your start function:

{% highlight fvwm %}
AddToFunc StartFunction I Module FvwmMFL
{% endhighlight %}

