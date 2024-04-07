---
title: CookBook
type: main
weight: 900
description: |
  This is a collection of different recipes to get fvwm to achieve
  different effects. Some examples are a show desktop feature, give
  sticky windows their own decor, and many more.
  
---
# FVWM CookBook

These recipes were written by Thomas Adam to demonstrate some tasks
that a lot of people wanted to do in Fvwm. They have since been
converted and live on in the wiki.

Here is the list of recipes:

{% assign pages = site.pages | where:"type","recipe" | sort:"weight" %}
{% capture fvwmtxt %}
{% for mypage in pages reversed %}
  {% include wiki_index_item.html mypage=mypage %}
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-cookbook-pages"
title="FvwmWiki CookBook Pages" content=fvwmtxt
color="broica" %}
