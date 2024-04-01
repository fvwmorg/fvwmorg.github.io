---
layout: wiki
title: FvwmWiki
---
# Welcome to the FvwmWiki

This is the home of the __FvwmWiki__, a collection of user
pages, tips, etc., focusing on [Fvwm](https://www.fvwm.org).
Fvwm is a very flexible and configurable [window manager](
{{ "/NewToFvwm/WindowManager" | prepend: site.wikiurl }}).

If you are new, check out the
[New to Fvwm]({{ "/NewToFvwm" | prepend: site.wikiurl }})
page and the [Why use Fvwm](
{{ "/NewToFvwm/WhyFvwm" | prepend: site.wikiurl }})
pages.

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
  {% include wiki_index_item.html mypage=mypage %}
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-main-pages"
title="FvwmWiki Main Pages" content=fvwmtxt
color="crimson" %}


