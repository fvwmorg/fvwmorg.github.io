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
      - name: Fvwm 2.6.x Manpages
        url: /Archive/Manpages/
  - title: Development Information
    color: arizona
    links:
      - name: Fvwm3 Development Info
        url: https://github.com/fvwmorg/fvwm3/blob/master/dev-docs/DEVELOPERS.md
      - name: Fvwm2 Module Interface
        url: /Archive/ModuleInterface/
  - title: Community Support
    color: green
    links:
      - name: Fvwm Forums
        url: https://fvwmforums.org/
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
<a href="{{ site.baseurl }}/Archive/Faq#what-does-fvwm-stand-for">
and so on</a>, window manager we have today.</p>

<p>Fvwm is ICCCM-compliant and highly configurable. Starting from
a <a href="{{ site.baseurl }}/Wiki/Config/BlankConfig/">minimal
configuration</a>, Fvwm can be configured with both internal tools
and third party software to customize most aspects of a desktop.</p>

<p>This site is an <a href="{{ site.baseurl }}/Archive/">archive</a>
of documentation for Fvwm version 2.6.x,
which is the current frozen release. For information
about the development of Fvwm version 3, check out
<a href="https://github.com/fvwmorg/fvwm3">fvwmorg/fvwm3</a> on GitHub.</p>
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

+ The stable frozen release is __Fvwm2__
  version {{ site.fvwm2-version }}:

  + Many operating systems provide fvwm packages
    to install Fvwm2.
  + Only newer versions (2.6.7 or newer) are supported.
  + OpenBSD users can install a newer version from ports.
  + The source for [Fvwm2 is on github](
    https://github.com/fvwmorg/fvwm/).
  + This version is in a feature freeze and only receives
    serious bugfixes.

+ __Fvwm3__ version {{ site.fvwm3-version }}:

  + __Users wanted__ to use, test, and report bugs for Fvwm3.
  + Use the current master branch of [Fvwm3 on github](
    https://github.com/fvwmorg/fvwm3/) to build and install.
  + Report bugs using the [github issue tracker](
    https://github.com/fvwmorg/fvwm3/issues).


## Configuring Fvwm

Fvwm starts from a [minimal configuration](
{{ site.baseurl }}/Wiki/Config/BlankConfig/)
and allows users to configure as much or little
of their desktop as desired. Starting with
Fvwm 2.6.7 a [default configuration](
{{ site.baseurl }}/Wiki/DefaultConfig/) is provided
to give users a starting point that can be edited
instead of configuring from scratch.

When coupled with third party software and custom scripts,
Fvwm becomes a powerful tool to build a full desktop
environment from. If you want a preconfigured desktop
environment using Fvwm, check out the following:

{% capture fvwmtxt %}
<div id="FvwmCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#FvwmCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#FvwmCarousel" data-slide-to="1"></li>
    <li data-target="#FvwmCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ site.baseurl }}/img/fvwm-crystal.jpg" class="d-block mx-auto" alt="Screen shot of Fvwm Crystal.">
      <div class="carousel-caption d-block small p-1">
        <h4><a href="https://fvwm-crystal.sourceforge.io/">Fvwm Crystal</a></h4>
        <p>Fvwm-Crystal aims to create an easy to use, eye-candy but also powerful
        desktop environment for Linux or other Unix-like operating systems built
        using Fvwm.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ site.baseurl }}/img/NsCDE.png" class="d-block mx-auto" alt="Screen shot of NsCDE.">
      <div class="carousel-caption d-block small p-1">
        <h4><a href="https://github.com/NsCDE/NsCDE">NsCDE</a></h4>
        <p>The Not so Common Desktop Environment (NsCDE) is a retro looking
        UNIX desktop environment which resembles CDE look (and partially feel)
        built using Fvwm. </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ site.baseurl }}/img/fvwm-nightshade.jpg" class="d-block mx-auto" alt="Screen shot of Fvwm Nightshade.">
      <div class="carousel-caption d-block small p-1">
        <h4><a href="http://fvwm-nightshade.github.io/Fvwm-Nightshade/">Fvwm Nightshade</a></h4>
        <p>This project aims to be a lightweight but feature rich and good
        looking configuration of Fvwm.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#FvwmCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#FvwmCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
{% endcapture %}

{% include fvwmwindow.html  id=fvwmcarousel
title="Built using Fvwm" color="neptune"
content=fvwmtxt %}


<div style="height:57px;"></div>
