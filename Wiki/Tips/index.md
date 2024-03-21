---
layout: wiki
title: Fvwm Tips
type: main
weight: 800
description: |
  These are a collection of tips to deal with various tasks.
  
---
# FVWM Tips

Here is the list of tips:

{% assign pages = site.pages | where:"type","tip" | sort:"weight" %}
{% capture fvwmtxt %}
{% for mypage in pages reversed %}
  {% include wiki_index_item.html mypage=mypage %}
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-tips-pages"
title="FvwmWiki Tips Pages" content=fvwmtxt
color="yellow-green" %}
