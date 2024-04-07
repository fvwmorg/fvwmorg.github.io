---
title: Modules
type: main
weight: 700
description: |
  Fvwm has various modules that can be used to create custom panels,
  docks, task managers, desktop switchers and more. These are a collection
  of pages describing the different modules in Fvwm.

---

# FVWM Modules

Here is the list of modules:

{% assign pages = site.pages | where:"type","module" | sort:"weight" %}
{% capture fvwmtxt %}
{% for mypage in pages reversed %}
  {% include wiki_index_item.html mypage=mypage %}
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-module-pages"
title="FvwmWiki Module Pages" content=fvwmtxt
color="orange" %}
