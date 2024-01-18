---
layout : wiki
title : Decor
type : main
weight : 950
description : |
  Here is a collection of different window Decors examples for Fvwm.
  They range from Vector decors using Fvwm built-ins to MultiPixmap
  Decors with the .png image files inlucded.

---
# FVWM Decors

A Decor is a collection of configurations for the looks of the windows.
These pages are a collection of example decors that can be used in your
setup. Most of these decors were adopted from
[fvwm-themes](https://fvwm-themes.sourceforge.net) and are available here
as examples along with the images with any images needed.

These are only examples, for configuration descriptions see
+ [/Config/Decor]({{ "/Config/Decor" | prepend: site.wikiurl }})
+ [/Config/VectorButtons]({{ "/Config/VectorButtons" | prepend: site.wikiurl }})

## Decors

{% assign pages = site.pages | where:"type","decor" | sort:"weight" %}
{% capture fvwmtxt %}
{% for mypage in pages reversed %}
  <p class="title-indent">
  <a href="{{ mypage.url | prepend: site.baseurl }}">
  {{ mypage.url | remove: "Wiki/Decor" | remove: "/" }}</a><br>
  {{ mypage.description }}
  </p>
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-decor-pages"
title="FvwmWiki Decor Pages" content=fvwmtxt
color="alpine" %}
