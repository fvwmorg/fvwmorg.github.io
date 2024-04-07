---
title: FvwmCommand
type: sendtofvwm
weight: 660
description: |
  FvwmCommand is a python script which can send commands directly to to
  fvwm from any terminal or script, provided FvwmMFL is running.
---
# FvwmCommand

FvwmCommand is a command line tool that allows you to send commands
directly to fvwm from any terminal or shell by talking to the
[FvwmMFL]({{ "/Modules/SendToFvwm/FvwmMFL" | prepend: site.wikiurl }})
socket. FvwmCommand then sends the command you give it directly to fvwm.
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

**Note:** In fvwm3, if [FvwmPrompt](
{{ "/Modules/SendToFvwm/FvwmPrompt" | prepend: site.wikiurl }})
is installed, you should use that instead. FvwmPrompt can both send
single commands exactly like FvwmCommand, it can also open an
interactive shell that can be used to talk to fvwm.
