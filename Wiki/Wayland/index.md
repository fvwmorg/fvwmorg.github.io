---
layout: wiki
title: Fvwm Doesn't Support Wayland
---

# Will fvwm support Wayland?
{:.no_toc}

* TOC
{:toc}

The short answer is, **No, fvwm will not support Wayland**.
But wait, there is more, what is keeping fvwm from supporting
Wayland?

This is a question that keeps coming up as more and more desktops
are primarily supporting Wayland, and X11 (via Xorg) is primarily
getting security and bug fixes, and is essentially in a feature freeze.
There is a feeling that X11 is dying and with it their favorite
window manager, and they both want to not only keep using fvwm, but
use it with the more modern Wayland protocol. Let's address some
some of these concerns here.

## The difference between X11 and Wayland.

To better see why fvwm won't be moving over to Wayland, lets
look at the differences between X11 and Wayland[^1]. In short
Wayland is a protocol that specifies how applications talk to
a Wayland compositor and receive input from a user. Note that
Wayland is mostly the protocol of commutation and there is no
single compositor server. The compositor also handles most of
the GUI experience, and each desktop and window manager needs
to now fulfill a much larger role as a compositor as well.

In comparison, X11 is a single server which not only provides
communication between applications and the server, it can also
handle most the GUI experience. Fvwm uses X11, via Xlib, for
most of its GUI aspects. In essence the code of fvwm is very
strongly tied to Xlib, all graphics are drawn using Xlib, all
modules function using Xlib, and so on.

Thus to move away from X11, fvwm would need to rewrite most
aspects of its code base, rewrite all modules, and build
a compositor. The project doesn't have the maintainers to
undergo such a tasks, and even if it did, it would be better
to start a new project.

As time moves on, more and more compositors are becoming
available, and with the help of projects like wlroots,
compositors will be easier to write. So it could be that
one day a new compositor inspired by fvwm will emerge, but
it will be a completely independent project.

## Other desktops and window managers have moved over, why not fvwm?

Outside of the fact fvwm is currently a very small project and
doesn't have the man power to move over, fvwm is also far more
tied to X11 than other window managers.
Over time the desktops and even window managers have become
far less dependent on X11, and instead widget sets like
Tk, Gtk, Qt, etc. were dealing with a lot of the graphical aspects
and they were no longer using the core X11 tools. As these widget
sets developed, less of the code based was tied directly to X11,
which helped with the migration.

In closing, it is a combination of being a very small project,
and how interdependent fvwm is with X11, keeping fvwm from supporting
Wayland. It would also be better to start a new project
writing a compositor inspired by fvwm, instead.

## So why not just write a new compositor inspired by fvwm?

That is a good question, why don't you get right on that? In all
seriousness, it falls back to decide what it is about fvwm that
you would like to see in a compositor: The configurability,
the way fvwm handles windows, virtual desktops, control
of how to organize your applications, the look of the window
decorations, the modules, and so on.

If what you find important about fvwm is its older Motif/CDE look,
then you would most likely need to write your own graphical engine
that can draw such window borders, as there doesn't appear to be
a way to do that with current graphical libraries.

## I am fine using fvwm and X11, but if X11 dies what will I do?

Okay, I understand that fvwm and X11 are tied together, and would
love to keep using fvwm on X11 for the rest of my happy days, but what
happens if X11 is no longer an option in my os? With Wayland maturing
quickly, X11 may die, and then there will be no more fvwm, a sad day.
At least this is what some people think.

On the other hand, X11 is currently getting security and bug fixes. There
is still a lot of skilled enough users using X11 that are willing to keep
it alive. Fvwm itself is proof that an old solid project can be kept alive
by a few number of people. I don't think X11 is going to stop being an
optional package installable in your os any time soon. There is enough
interest in X11, that it should remain functional.

The bigger issue is going to be widget sets, what happens when Gtk or
Qt no longer support X11? You will still be able to use fvwm, but
you no longer be able to use any application which require newer
versions of the widget sets. And once you can no longer use a web browser
or other applications that use these widget sets, you may no longer
have a choice to use X11 with fvwm. But currently there is no sign
of widget sets fully dropping X11 support yet, but this will probably
be the final nail in the coffin so to speak, and it won't be because
X11 died or won't function.

In short, although I do see that over time less and less users will
be using X11, it should still remain an option for us dedicated fvwm
users for some time. Even if the modern widget sets do decide to drop
X11 support, it will take a while for projects to move to the newest
version.

---

[^1]: This is a very simplified comparison, so don't take too
      much stock in the technical aspects.
