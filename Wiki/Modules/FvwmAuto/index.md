---
layout: wiki
title: FvwmAuto
type: module
weight: 450
description: |
  The FvwmAuto module allows you to define actions for when the pointer enters
  and leaves a window after a specified delay. A common use of this would be
  to automatically raise windows, which is in fact the module's default
  behaviour. This can also be used to auto show/hide a panel/dock.
---
# FvwmAuto

* TOC
{:toc}

The FvwmAuto module allows you to define actions for when the pointer enters
and leaves a window after a specified delay, assuming you are using either
`SloppyFocus` or `MouseFocus`. FvwmAuto does this by responding to EnterFocus
and LeaveFocus events, which is why this is best used with the mentioned focus
styles. A common use of this would be to automatically raise windows, which is
in fact the module's default behaviour.

FvwmAuto is a simplified version of [FvwmEvent](
{{ "/Modules/FvwmEvent" | prepend: site.wikiurl }})
which only responds to EnterFocus and LeaveFocus events.
Use FvwmEvent if you want actions to trigger on other types
of events beyond just focus changes.

## Sample Configuration

FvwmAuto doesn't have a module configuration in the same sense as a lot of
the other modules.  The way this particular module works, is listening for
certain events that you can specify.  Along with that is the action to be
performed (typically a function.)

In its simplest form, FvwmAuto will preform the Raise action on focused
windows after a set amount of time. In order to raise focus windows
250 milliseconds after receiving and maintaining the focus, add the following
to your config file to launch the module at start:

{% highlight fvwm %}
AddToFunc StartFunction I Module FvwmAuto 250
{% endhighlight %}

## Advanced Features

You can also use FvwmAuto to preform custom actions when a window either
gains or looses focus[^1]. This is done by first understanding that all
options are passed to FvwmAuto when it is launched. The format to launch
FvwmAuto when fvwm starts is:

{% highlight fvwm %}
AddToFunc StartFunction I Module FvwmAuto TimeOut [options] EnterCommand LeaveCommand
{% endhighlight %}

This will cause FvwmAuto to run EnterCommand TimeOut milliseconds after gaining
focus, and LeaveCommand the same time out after leaving focus. If EnterCommand
or LeaveCommand are not provided, the default action is to Raise windows after
they gain focus. The EnterCommand and LeaveCommand can either be fvwm builtin
commands or custom functions. Using the `-passid` option, FvwmAuto will append
the window id as the last parameter sent to the function. The following example
will only raise specific windows whose name/class/resource

{% highlight fvwm %}
DestroyFunc SelectiveRaiseLower
AddToFunc SelectiveRaiseLower
+ I WindowId $1 (FvwmIconMan) $0
+ I WindowId $1 (FvwmButtons) $0
+ I WindowId $1 (xteddy) $0

AddToFunc StartFunction Module FvwmAuto 250 -passid \
"SelectiveRaiseLower Raise" "SelectiveRaiseLower Lower"
{% endhighlight %}

The FvwmAuto manual page provides more details and examples of the various
options available, but FvwmAuto is a fairly limited module. To be able to
have more control and respond to more events, use [FvwmEvent](
{{ "/Modules/FvwmEvent" | prepend: site.wikiurl }}) instead.

-------
[^1]: This is not how EnterFocus and LeaveFocus operate, but from an
      explanation point of view, it suffices. FvwmAuto also can be configured to
      respond to `-menter`, `-menterleave`, or `-mfocus` events. See the
      manual page for more details.
