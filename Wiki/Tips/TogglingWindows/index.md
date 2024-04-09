---
title: Toggling Windows
type: tip
description: |
  This function will toggle windows from a Menu entry, FvwmButton,
  etc. If the window is not running it will launch it, if it is
  running on a different desk/page, it will move it to the current
  desk/page. If it is currently visible it will close it.

---

# Toggling Windows

It is often desirable to have a menu item or perhaps a button in
FvwmButtons or FvwmWharf that launches an application when used
the first time and closes it if used a second time.  Although it
is not obvious how to do this, it is possible.  Let's assume you
need a menu item that toggles an FvwmConsole window on and off.
Then put the following lines in your .fvwm2rc:

{% fvwm2rc %}
DestroyFunc ToggleFvwmConsole
AddToFunc ToggleFvwmConsole
+ I None (FvwmConsole, CirculateHit) Module FvwmConsole
+ I Next (FvwmConsole, CirculateHit, CurrentPage, Visible) Close
+ I Next (FvwmConsole, CirculateHit) MoveToDesk
+ I Next (FvwmConsole, CirculateHit) MoveToPage
+ I Next (FvwmConsole, CirculateHit) Raise

AddToMenu SomeMenu
+ "toggle FvwmConsole" Function ToggleFvwmConsole
{% endfvwm2rc %}

Or if you prefer a button in the button bar:

{% fvwm2rc %}
*FvwmButtons: (Action ToggleFvwmConsole)
{% endfvwm2rc %}

The lines with MoveToDesk, MoveToPage and Raise will bring the
window to the top of the current page if it is not visible
instead of closing it.

If you want to toggle one specific window, e.g. an xterm, but
still want to have other xterms that are not toggled, you must
give the window an unique name:

{% fvwm2rc %}
+ I None (XMessages, CirculateHit) Exec exec \
          xterm -T XMessages -n XMessages -e tail -f /var/adm/?* ~/.X.err
+ I Next (XMessages, CirculateHit) Close
{% endfvwm2rc %}

(CirculateHit is needed for windows with Style CirculateSkip.)

Or for a toggling Netscape button:

{% fvwm2rc %}
DestroyFunc ToggleNetscape
AddToFunc ToggleNetscape
+ I None (Navigator) Exec exec netscape
+ I All (Navigator) Close
{% endfvwm2rc %}

Keep in mind that these functions simply check if a window with
the specified name exists.  They will happily close manually
opened windows or launch an application multiple times if the
application is slow to start (e.g. like netscape).
