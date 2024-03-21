---
layout: wiki
title: FvwmWiki
---
# Welcome to the FvwmWiki

This is the home of the __FvwmWiki__, a collection of user
pages, tips, etc., focusing on [Fvwm](https://www.fvwm.org).
Fvwm is a very flexible and configurable [window manager](
{{ "/WindowManager" | prepend: site.wikiurl }}).
Here are some [testimonials]({{ "/Testimonials" | prepend: site.wikiurl }})
from Fvwm users.

If you are new to Fvwm,
[Read me]({{ "/NewToFvwm" | prepend: site.wikiurl }}) first.

## About the Wiki

This wiki is a collection of pages describing configuration
examples for Fvwm. The syntax examples are mostly written
for the 2.6.x versions of Fvwm and it is suggest that you run
the current release, <https://github.com/fvwmorg/fvwm/releases>

FvwmWiki is built from Markdown files using [Jekyll](
https://jekyllrb.com/). The source to build the wiki
can be found at <https://github.com/fvwmorg/fvwmorg.github.io>.

A list of things left unfinished can be found on the [/Todo](
{{ "/Todo" | prepend: site.wikiurl }}) list.

## List of main pages

This wiki is divided into the following main collections of pages:

{% assign pages = site.pages | where:"type","main" | sort:"weight" %}
{% capture fvwmtxt %}
{% for mypage in pages reversed %}
  <p class="title-indent">
  <a href="{{ mypage.url | prepend: site.baseurl }}">
  {{ mypage.url | remove: 'Wiki' | remove: '/' }}</a><br>
  {{ mypage.description }}
</p>
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-main-pages"
title="FvwmWiki Main Pages" content=fvwmtxt
color="crimson" %}


