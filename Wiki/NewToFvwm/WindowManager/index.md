---
layout: wiki
title: Window Mangers
---

# Window Managers

* TOC
{:toc}

## Introduction

Unlike other windowing systems the X Window System only provides access
to the graphics hardware, and other peripherals your computer uses. It
does not specify how window borders or title bars should be drawn, nor
does it explicitly handle window arrangement or key bindings. Such
implementations are left to special programs known as "Window Managers".
Their primary purpose is to do just that -- manage windows, both usually
in terms of placement, focus, decoration, etc.

Window managers can tell X11 what windows to see, where to position them,
and give you tools to organize all the running windows. Fvwm provides an
interface in which the user can tell X11 what to do with the running windows,
though both user input from the mouse and keyboard, to responding to
scripts and events.

In essence, the window manager manages all the running X11 window processes
and is a core tool for building a desktop on X11. A desktop is a window
manager along with configuration tools, panels, and additional software
all integrated and linked together. Fvwm on the other hand is just a window
manager, and the user needs to install and configure fvwm to interact
with the software they want to use.

## Why fvwm?

Fvwm provides a configuration/command syntax that can be used to configure
your own desktop, and for a more detailed response see [Why use Fvwm](
{{ "/NewToFvwm/WhyFvwm" | prepend: site.wikiurl }}).

Many people ask this question, and of course there is no answer, other
than a very personal and subjective one.  For many, FVWM was their first
graphical environment that they used when first installing Linux.  For many
years, RedHat used FVWM as their primary "desktop" GUI-frontend, and in 1996,
RedHat launched a competition -- the winner of which was called AnotherLevel.
 For me, and others that used RedHat, this was their first taste of FVWM.
 For many, it wasn't pleasant.  :)  Some people like to stick with what
they're used to, it seems.

But since then, and of late, I myself (ThomasAdam) have noticed a sudden
increase of FVWM users.  I attribute this to some sort of 'born-again' effect;
people are waking up as to how they can configure this beast.  :)

