---
title: F? Virtual Window Manager
showtitle: 1
helpnav:
  - title: User Documentation
    color: crimson
    links:
      - name: New to Fvwm
        url: /Wiki/NewToFvwm/
      - name: Fvwm Wiki
        url: /Wiki/
      - name: Frequently Asked Questions
        url: /Archive/Faq/
      - name: Fvwm3 Manual Pages
        url: /Man/
  - title: Development Information
    color: arizona
    links:
      - name: Fvwm3 Development Info
        url: https://github.com/fvwmorg/fvwm3/blob/main/dev-docs/DEVELOPERS.md
      - name: Fvwm2 Module Interface
        url: /Archive/ModuleInterface/
  - title: Community Support
    color: green
    links:
      - name: Fvwm Forums / Discussions
        url: https://github.com/fvwmorg/fvwm3/discussions
      - name: Github Issues
        url: https://github.com/fvwmorg/fvwm3/issues
      - name: "Irc (#fvwm)"
        url: /Wiki/Irc/
      - name: Mailing Lists
        url: "/Community/#fvwm-mailing-lists"
---
<link href="{{ site.baseurl }}/css/fvwm3-carousel.css" rel="stylesheet">

{% capture fvwmtxt %}
<p>Fvwm is a virtual window manager for the X windows
system. It was originally a feeble fork of TWM
by Robert Nation in 1993 (<a href="{{ site.wikiurl }}/FvwmHistory/">fvwm
history</a>), and has evolved into
the fantastic, fabulous, famous, flexible,
<a href="{{ site.baseurl }}/Archive/Faq/#what-does-fvwm-stand-for">
and so on</a>, window manager we have today.</p>

<p>Fvwm is a ICCCM/EWMH compliant and highly configurable floating window
manager built primarily using Xlib.  Fvwm is configured using a
<a href="{{ site.wikiurl }}/Config/Fvwm2rc/">configuration file</a>,
which is used to configure most aspects of the window manager including
window looks, key bindings, menus, window behavior, additional
<a href="{{ site.wikiurl }}/Modules/">modules</a>, and more.  There is a
<a href="{{ site.wikiurl }}/DefaultConfig/">default configuration</a> file
that can be used as a starting point for writing one's own configuration file.</p>

<p>Fvwm is a light weight window manager and can be configured to be anything from
a small sleek window manager to a full featured desktop environment.  To get the most
out of fvwm, one should be willing to read the documents, and take the time
to write a custom configuration file that suites their needs.  The manual pages and
the <a href="{{ site.wikiurl }}/">fvwm wiki</a> can be used to help learn how to
configure fvwm.</p>

{% endcapture %}

{% include fvwmwindow.html id="titlewindow"
title="F? Virtual Window Manager"
content=fvwmtxt logo=1 %}

## Need Help?

Looking for help configuring, using, or developing
Fvwm, check out the following options:

<div class="row">

{% for block in page.helpnav %}
{% capture fvwmtxt %}
<ul>{% for link in block.links %}
<li>{% if link.url contains "http" %}<a href="{{ link.url }}">
  {% else %}<a href="{{ site.baseurl | append: link.url }}">{% endif %}
  {{ link.name }}</a></li>
{% endfor %}</ul>
{% endcapture %}

<div class="col-md-6 col-lg-4 mb-1 p-1">
{% include fvwmwindow.html id=block.title
title=block.title color=block.color
content=fvwmtxt max=1 %}
</div>
{% endfor %}

</div>

## Getting Fvwm

__Fvwm3__ is the currently supported release of fvwm, and fvwm version 2
is no longer supported. Fvwm3's key new feature is full RandR support for
multihead setups, along with a new DesktopConfiguration that allows independent
virtual desktops for each monitor. Here is a
[list of key differences between fvwm2 and fvwm3](
https://github.com/fvwmorg/fvwm3/discussions/878)
along with tips to upgrade an fvwm2 config to an fvwm3 config.

The current release of fvwm3 is version __{{ site.fvwm3-version }}__.
Fvwm3 can be installed in one of the following ways:

+ Many operating systems provide a "fvwm3" package. Note, the
  "fvwm" package most likely refers to fvwm version 2.
+ Build the current release [fvwm3 version {{ site.fvwm3-version }}](
  https://github.com/fvwmorg/fvwm3/releases/tag/{{ site.fvwm3-version }})
  from the source tarball.
+ Clone and build the [fvwm3 main branch](
  https://github.com/fvwmorg/fvwm3).
+ [Build a Debian .deb package](
  https://github.com/somiaj/fvwm3-debian) from the fvwm3 source.

Report fvwm3 bugs using the [github issues](
https://github.com/fvwmorg/fvwm3/issues) tracker.

## Configuring Fvwm

Fvwm starts from a [minimal configuration](
{{ site.wikiurl }}/Config/BlankConfig/)
and allows users to configure as much or little
of their desktop as desired. Starting with
Fvwm 2.6.7 a [default configuration](
{{ site.wikiurl }}/DefaultConfig/) is provided
to give users a starting point that can be edited
instead of configuring from scratch.

When coupled with third party software and custom scripts,
Fvwm becomes a powerful tool to build a full desktop
environment from. If you want a preconfigured desktop
environment using Fvwm, check out the following:

{% capture fvwmtxt %}
<div id="FvwmCarousel" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#FvwmCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Fvwm-Crystal Slide"></button>
    <button type="button" data-bs-target="#FvwmCarousel" data-bs-slide-to="1" aria-label="NSCD Slide"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ site.baseurl }}/img/fvwm-crystal.jpg" class="d-block mx-auto" alt="Screen shot of Fvwm Crystal.">
      <div class="carousel-caption d-block small p-1">
        <h3><a href="https://fvwm-crystal.sourceforge.io/">Fvwm Crystal</a></h3>
        <p>Fvwm-Crystal aims to create an easy to use, eye-candy but also powerful
        desktop environment for Linux or other Unix-like operating systems built
        using Fvwm.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ site.baseurl }}/img/NsCDE.png" class="d-block mx-auto" alt="Screen shot of NsCDE.">
      <div class="carousel-caption d-block small p-1">
        <h3><a href="https://github.com/NsCDE/NsCDE">NsCDE</a></h3>
        <p>The Not so Common Desktop Environment (NsCDE) is a retro looking
        UNIX desktop environment which resembles CDE look (and partially feel)
        built using Fvwm.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#FvwmCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#FvwmCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{% endcapture %}

{% include fvwmwindow.html  id=fvwmcarousel
title="Built using Fvwm" color="neptune"
content=fvwmtxt %}

<div style="height:57px;"></div>
