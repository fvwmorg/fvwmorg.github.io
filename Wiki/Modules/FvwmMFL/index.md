---
layout: wiki
title: FvwmMFL
type: module
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
is used by both [FvwmPrompt]({{ "/Modules/FvwmPrompt" | prepend: site.wikiurl }})
and [FvwmCommand]({{ "/Modules/FvwmCommand" | prepend: site.wikiurl }}),
and must be started for them to function correctly. FvwmMFL should be started
from the `StartFunction` in your config file.

{% highlight fvwm %}
AddToFunction StartFunction I Module FvwmMFL
{% endhighlight %}

Besides being required for FvwmPrompt and FvwmCommand, other applications
can both talk to and receive event information from fvwm using the
FvwmMFL socket.
