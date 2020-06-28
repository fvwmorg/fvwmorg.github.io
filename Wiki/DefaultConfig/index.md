---
layout : wiki
title : DefaultConfig
---

At the end of this overview, you find the current default configuration 
Fvwm3 ships with. It is obvious that such a default setting needs to make
choices, and this page tries to explain some of these choices so as to 
enable the (new) user to understand them and to begin adapting the config
to their own needs. Again, this needs to be limited, please refer to the 
man page for a more exhaustive discussion of all available options.

1: Functions
2: Styles
3: Colorsets
4: Menus
5: Bindings
6: Decor
7: Modules


# Functions

There is already a more elaborate page on functions:  
<a href="/wiki/Config/Functions">Functions</a>

The StartFunction can also be used an elegant autostart section.
You can, e.g., add

{% highlight fvwm %}
+ I Test (Init) exec conky
{% endhighlight %}

to start your standard conky right at startup.

# Styles

Styles are settings that, broadly speaking, influence everything that is
related to windows and their behaviour.

## Focus Style
Fvwm3 has two ways of focusing a window using the mouse: clicking in the window
(this is the behaviour used in most other window managers like Windows), and
entering the window with the mouse pointer. 


## Focus by clicking a window:

{% highlight fvwm %}
Style * ClickToFocus
{% endhighlight %}


## Focus by putting mouse pointer in window

### Focus always under mouse pointer

{% highlight fvwm %}
Style * FocusFollowsMouse
{% endhighlight %}

In this configuration, the focus is always where the mouse is; if you move
the mouse out of a window that window loses focus, and if the mouse pointer
doesn't enter another window (stays on the root background, e.g.), no window
is focused at all.

### Focus in last window under mouse pointer

{% highlight fvwm %}
Style * SloppyFocus
{% endhighlight %}

In this configuration, the focus is in the window that was last "touched" by
the mouse pointer. If the pointer leaves the window and rests on the root background,
e.g., the window doesn't lose focus. This is the default in the default config.
This config  can make sense if you like to keep on writing in a window, but move 
the pointer far out of sight, possibly even to another screen altogether.

Unless you click to focus, the window is only focused, it is not _raised_ to the top,
so you might end up with a focused window of which you only see small areas because 
other windows cover it. Here, you can add _ClickToRaise_ to the style. This will
then raise the window to the top (i.e. make it wholly visible on top of all other 
windows) once you click somewhere in it. This is the default in the default config:

{% highlight fvwm %}
Style * SloppyFocus, MouseFocusClickRaises
{% endhighlight %}

## OpaqueMove

The default config sets the behaviour of windows that are moved or resized to the
values we know from other window managers, a kind of what you see is what you get.
Fvwm3 has another mode, in which the window and its contents are not dynamically moved 
or resized, but only after the window as been put in its new place or its new shape
respectively. When moving or resizing, you see what the comments in the default config 
call "a wired frame" and the man page "rubber-band". 
This behaviour can be achieved by:

{% highlight fvwm %}
XORValue 0
OpaqueMoveSize 0
Style * ResizeOutline, SnapAttraction 15 SameType ScreenAll, SnapGrid
{% endhighlight %}

XORValue influences the colour of the wire or rubber band, play with values as you like
until you're happy with the outcome, you cannot break anything.


# Menus

The default config tests for some typical programs that might be found on the average machine.
Once you are happy with your config, you can safely remove any line _Programs Menu_ that
refers to a program you haven't installed - and you can remove the "Test (x program)" bit, too.


# Decor

There are already elaborate pages in this Wiki that deal with decor, start here, e.g.:
<a href="/wiki/Config/Decor">Decor</a>


# Default Config

{% highlight fvwm %}
{% include_relative config %}
{% endhighlight %}

