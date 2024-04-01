---
layout: wiki
title: Why Use Fvwm?
---

# Why should I use fvwm?

Fvwm users continue to use fvwm for many different reasons.
Fvwm is a very old project and at one time was a fairly
popular window manager, and is now a tiny project still used
by lots of core users. What is it about fvwm that users like?

+ Fvwm is light weight and fast. Fvwm is built on top of X11,
  and doesn't use a lot of additional libraries or widget
  sets, as such it has a very small foot print on top of
  the already running X server, making it quite sleek.

+ Fvwm is very stable, and preforms its task as a window manager
  very well. It is very rare fvwm crashes, and most instability
  is the application itself.

+ Fvwm is extremely configurable, and you can customize almost
  every possible aspect of your desktop. Though this does take
  a lot of work to both learn how to configure fvwm and how
  to put your dream configuration into practice.

+ Fvwm has the retro Motif look, similar to CDE. But fvwm doesn't
  need to look retro, and can be configured to have modern sleek
  looks, to fantasy looks. Did I mention fvwm is extremely
  configurable?

+ Fvwm has a wide range of modules that can be used to improve
  the experience. These include a pager which shows all the
  virtual pages and desktops. And modules to build panels,
  and even interactive forums. Even more configurability.

+ Fvwm's configuration file is a command syntax. Configuration
  commands can be sent to the running instance of fvwm at any
  time. This allows writing custom scripts that can interact
  and control fvwm by sending it the appropriate command.

+ Due to its configurability, fvwm has been used as the basis
  for multiple desktop environments throughout the years. Two
  examples are NsCDE which gives a good retro CDE look and feel,
  while using modern software, and fvwm-crystal, which gives a
  nice sleek look.

Fvwm is quite versatile, but in order to get the most out of
fvwm, you need to be willing to take the time to learn its
command syntax (which is just the configuration file syntax).
As you learn how to tell fvwm how to handle your windows,
you can tweak fvwm into your own dream window manager. Okay,
there are limits as to what fvwm can do, but within its
structure, there is a lot of power.

# What are fvwm's weaknesses?

If fvwm was so great, why isn't everyone using it? And though I
agree with that, the reality is fvwm requires a lot of effort
to understand and use. Configuration files are rarely portable,
as they are tied to peoples' personal images, scripts, software
installed on their system, and so on.

These days there are some portable configuration files that can
be used as a starting point, such as the [DefaultConfig](
{{ "/DefaultConfig" | prepend: site.wikiurl }}). But making
changes to fvwm still requires reading through the config file and
understanding what to change. There are no GUI tools for this
(partly because an GUI tool couldn't reasonable hold all the
options fvwm has) and learning what to change can take a little
bit of trial and error.

Fvwm's isn't built using any modern widget set or frame work, and
though its modules can allow some building of interactive UI elements,
they are a bit primitive and don't contain a lot of modern features.
Though you can build tools using modern frame works that talk to
fvwm.

Fvwm isn't for everyone, but if a quick, fast, low memory use, and
very customizable window manager sounds good to you, give it a try.
I would start by using the [DefaultConfig](
{{ "/DefaultConfig" | prepend: site.wikiurl }}),
and then you can either try to modify it to fit your desires, or go
check out all the other fvwm configurations you can find out there.
