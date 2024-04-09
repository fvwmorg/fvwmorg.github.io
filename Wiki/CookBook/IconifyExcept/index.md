---
title: IconifyExcept
type: recipe
weight: 600
tags:
  - Conditional
description: |
  This will Iconfiy every window except one.
---

## Iconifying all windows except one.

To Iconify all windows except one (or all but a certain group of windows)
in Fvwm there are various ways. One way is to use the !Iconifiable style on the
windows you want to disclude the possibility of being iconified:

{% fvwm2rc %}
Style FvwmButtons !Iconifiable
{% endfvwm2rc %}

Then, to iconify windows on the current page, one might use:

{% fvwm2rc %}
All (CurrentPage, !Iconic) Iconify
{% endfvwm2rc %}

This can be attached to a key binding, or a mouse binding, or put it
as part of a complex function that could get called.

The All conditional will preform the Iconfiy action on all windows that satisfy
the conditions listed, which in this example are windows on the CurrentPage
and that are not Iconic.

Conditions can also include a windows name/class/resource. Thus you can use
the following to Iconify all windows whose name/class/resource doesn't match
MyWindowName as follows:

{% fvwm2rc %}
All (CurrentPage, !Iconic, !MyWindowName) Iconify
{% endfvwm2rc %}

As another option you could Iconify all windows except the window that has focus
by adding the !Focused condition.

{% fvwm2rc %}
All (CurrentPage, !Iconic, !Focused) Iconify
{% endfvwm2rc %}

