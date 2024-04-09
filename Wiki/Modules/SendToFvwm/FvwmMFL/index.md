---
title: FvwmMFL
type: sendtofvwm
weight: 600
description: |
  FvwmMFL opens a unix file socket in which applications can talk to
  to and recieve events from fvwm written as JSON data packets.
  This allows one to write modules that can inneract via fvwm using
  most programing languages and just communicate to the FvwmMFL socket
  using JSON.
---
# FvwmMFL

This module has no command line or configuration options, and only
opens a socket for other modules or applications to talk to. FvwmMFL
is used by both [FvwmPrompt](
{{ "/Modules/SendToFvwm/FvwmPrompt" | prepend: site.wikiurl }})
and [FvwmCommand](
{{ "/Modules/SendToFvwm/FvwmCommand" | prepend: site.wikiurl }}),
and must be started for them to function correctly. FvwmMFL should be
started from the `StartFunction` in your config file.

{% highlight fvwm %}
AddToFunction StartFunction I Module FvwmMFL
{% endhighlight %}

FvwmMFL provides a JSON socket to talk directly to fvwm and to receive
information and events from the running instance of fvwm. This provides
a more modern method to talk to fvwm instead of using fvwm's
[ModuleInterface]({{ "/Archive/ModuleInterface" | prepend: site.url }}).
See the manual page for details on the api and the list of commands
and events you can tell FvwmMFL to broadcast.
