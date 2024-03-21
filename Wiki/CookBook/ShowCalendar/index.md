---
layout: wiki
title: ShowCalendar
type: recipe
description: |
  A calendar popping up when the clock/date in a dock is clicked
  is a common feature. This is one way of doing it in Fvwm using a
  slightly modified FvwmScript-DateTime
  
---

## Having a calcurse instance pop up when clicking on time or date

FvwmScript-TimeDate is provided with a basic installation of Fvwm3,
it is then swallowed into RightPanel and displays the current time
and date. Towards the end of the script, you see these lines:

{% highlight fvwm %}
Widget 1
Property
 Position 0 0
 Size 120 20
 Font "xft:Sans:style=Bold:size=11"
 Type ItemDraw
 Flags NoReliefString
 Title {}
Main
 Case message of
  SingleClic :
  Begin
  End
End

Widget 2
Property
 Position 0 20
 Size 120 15
 Font "xft:Sans:style=Bold:size=8"
 Type ItemDraw
 Flags NoReliefString
 Title {}
Main
 Case message of
  SingleClic :
  Begin
  End
End
{% endhighlight %}

"SingleClic" is not filled in, so nothing happens when we do a single click
on one of the Widgets.

The basic syntax of "SingleClic" is easy: what should be done with the click
is put between "Begin" and "End" and follows basic Fvwm syntax.

The calendar I use does not have a GUI, so I need to run a terminal in which
it is then started, if yours has a graphic interface, it'll work just as fine.

As the time is displayed in a larger font, I find it easier to hit with my 
mouse pointer, so I display the calendar when I click once on the time, if
you prefer the calendar popping up when clicking on the date, just put the 
respective line between "Begin" and "End" of "Widget2".

So, here's my Widget1 (=Time) modification:

{% highlight fvwm %}
Widget 1
Property
 Position 0 0
 Size 120 20
 Font "xft:Sans:style=Bold:size=11"
 Type ItemDraw
 Flags NoReliefString
 Title {}
Main
 Case message of
  SingleClic :
  Begin
   Do {Test (x calcurse) exec $[infostore.terminal] -e calcurse}
  End
End
{% endhighlight %}

The "Do" tells the Script it should now _do_ something; I then test
if calcurse is actually installed and can be run; then my
terminal is executed with the request of running calcurse. I use
the variable infostore.terminal here, which is defined in your 
FVWM config file.
