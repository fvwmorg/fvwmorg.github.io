---
layout: wiki
title: NewToFvwm
---
* TOC
{:toc}

# New to FVWM

## Introduction 

Welcome. So you're new to FVWM and you're wondering what it's all about.
Perhaps you want some further information about FVWM but don't quite know
where to look. That's fine -- and hopefully this page will help point you
to all the right places in getting started.

The first thing to bear in mind about FVWM is that it is not
a Desktop Environment (such as GNOME, KDE, XFCE, etc). A desktop
environment comes with a collection of preconfigured settings and
software (file managers, docks/panels, and so on) all integrated
together.

FVWM is a [WindowManager]({{ "/WindowManager" | prepend: site.wikiurl }})
that gives the user the choice of expression. Details such as the
appearance of windows, which program will act as your file manager,
etc., are defined by the user. FVWM won't make that choice for you.

All of these choices are put into a very extensive [Config file](
{{ "/Config/Fvwm2rc" | prepend: site.wikiurl }}). This config
file configures not only FVWM but how it interacts with your
additional software. In order to configure FVWM to fit your
needs you will have to dive into the config file.

First and foremost, be aware that FVWM is not considered to be a
walk in the park. There will often be a lot of work needed on your
part. It will require patience, head-scratching, and presumably
support. All of which is fine, provided you are willing to put the
effort in. No one else can do this but you. If you stick with it,
though, you will get something that suits your needs, habits, and
tastes much better than most competitors, and that you can continue
to modify as those change.

## But where do I start?

This is often a daunting question for people new to FVWM. And it's not a
question that's easily answered. Most people new to FVWM like to look
around first for inspiration. It's never that easy trying to think of how
you want your layout to look.

You could, if you had a few months, start with a blank config file,
sit down and do nothing but read the man page for FVWM and attempt
to piece everything together. Some people have done this, and they
generally feel as though they have learnt a lot from the process.

Of course, you may not have the time or want to start out with a
blank config. Starting with FVWM 2.6.7 a [DefaultConfig]({{
"/DefaultConfig" | prepend: site.wikiurl }}) is provided as a starting
point for users. A user can copy this config then edit, add and remove
stuff until they have a setup that suits their needs.

Besides the default config there are some additional configurations
that can be used as a starting point:

+ [FVWM Forums User Configs](
  https://fvwmforums.org/c/fvwm-themes/27) --
  Examples and screenshots of various users configs.
+ [Taviso's fvwm2rc](
  https://fvwm.org/Archive/Screenshots/2004-01-24_Tavis_Ormandy-desk-1152x864/fvwmrc)
  -- An older example used as a basis for many users.

In addition here are two more feature rich setups for FVWM that not
only provide a configuration file but additional scripts and tools
to function more as a desktop environment.

+ [FVWM Nightshade](https://fvwm-nightshade.github.io/Fvwm-Nightshade/)
+ [FVWM Crystal](https://fvwm-crystal.sourceforge.net/)

After choosing a default config, it's a case of customizing FVWM to suit
your needs, based on the starter config you've chosen.

## I have a config file. Now What?

Good question. This depends entirely on the problem you have, or
the next feature you wish to add. If you find reading ''man fvwm''
is not sufficient, then maybe this [Wiki]({{ "/" | prepend: site.wikiurl }})
can help you out.

To start with check out the [/Config](
{{ "/Config" | prepend: site.wikiurl }}) pages, which will provide
information about the different parts of the configuration file.

If you are looking for an answer to a specific question maybe it is
covered in the [FVWM FAQ](https://fvwm.org/Archive/Faq/) or the
[/irc/HashFvwmFAQ]({{ "/Irc/HashFvwmFAQ" | prepend: site.wikiurl }}).

Looking for examples to achieve different effects, maybe you can find
them in the [/CookBook]({{ "/CookBook" | prepend: site.wikiurl }})
or [/Tips]({{ "/Tips" | prepend: site.wikiurl }}) pages.

[/Decor]({{ "/Decor" | prepend: site.wikiurl }}) and [/Panels](
{{ "/Panels" | prepend: site.wikiurl }}) pages provide examples
of different window looks and panels/docks.

You might,of course, still have a question to ask. You can ask on the
[Mailing Lists](https://www.fvwm.org/Community/#fvwm-mailing-lists),
as well as the [FVWM Forums](https://fvwmforums.org/), or the [/Irc](
{{ "/Irc" | prepend: site.wikiurl }}) Channel.

