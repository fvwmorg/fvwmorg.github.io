---
title: FvwmButtons
type: module
weight: 800
description: |
  FvwmButtons provides a method to build docks, panels, taskbars,
  and more.
---
# FvwmButtons

* TOC
{:toc}

The FvwmButtons module provides a window of buttons which can be used
to build a different type of [/Panels]({{ "/Panels" | prepend: site.wikiurl }}).
The window is rectangular and can be split into different rectangular
buttons of varying sizes. Each button can contain `Title`, `Icon`, `Action`,
and even `Swallow` other applications.

Buttons can be configured to change their text/icon/colorset when `Active` and
preform different actions when clicked. Additionally with the use of `SendToModule`,
buttons can be changed by other aspects of Fvwm.

SendToModule example:

{% fvwm2rc %}
*FvwmButtons: (Id note1, Title "13:30 - Dinner", Icon clock1.xpm)

SendToModule FvwmButtons Silent \
ChangeButton note1 Icon clock2.xpm, Title "18:00 - Go Home"
{% endfvwm2rc %}

For a full list of FvwmButtons configuration options see the FvwmButtons manpage.

## Layout

The basic layout of `FvwmButtons` is a rectangle, by giving its size (width X height)
and then break that into a grid by expressing the number of `Rows` and `Columns` it has.
This includes the size of the window that will contain the buttons and the size of
the smallest button. When configuring `FvwmButtons`, first draw the layout of the
buttons. You will want to think about the shape of the buttons, and what sizes you are
going to need for the buttons.

## Active Buttons

FvwmButtons that will **hover** the button, icon or title when the mouse is moved over it.
The hover commands are: `ActiveColorset`, `ActiveIcon`, and `ActiveTitle`.

{% fvwm2rc %}
Colorset 10 fg #ffffff, bg #2b4e5e, hi #aaaaaa, sh #999999, Plain, NoShape

*FvwmButtons: ActiveColorset 10
{% endfvwm2rc %}

Tells FvwmButtons to use `Colorset 10` for the background color/image or title color
of a button when the mouse is hovering above the button.

{% fvwm2rc %}
*FvwmButtons: (2x1, Icon /exit.png, ActiveIcon /door.png, Action Quit)
{% endfvwm2rc %}

The name of an image file, containing an alternative icon to display on the
button when the mouse is hovering above the button.

{% fvwm2rc %}
*FvwmButtons: (2x2, Title "Xterm", ActiveTitle "Right-click", Action(Mouse 3)
'Exec exec xterm')
{% endfvwm2rc %}

Defines the title to be changed on the button when the mouse is hovering
above the button.

## Actions

Specifies an Fvwm  command  to be executed when the button is activated by
pressing return or a mouse button. The command needs to be quoted if it
contains a comma or a closing parenthesis.

The current options of the `Action` are: `Mouse  n` - this action is only
executed for mouse button `n`. One action can be defined for each mouse
button, in addition to the general action.

{% fvwm2rc %}
*FvwmButtons: (Title "Xload", Action(Mouse 1) 'Exec exec xload -geometry -0-0')
{% endfvwm2rc %}

For more `Action` commands see the FvwmButtons manpage.
