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
  <p class="title-indent">
  <a href="{{ mypage.url | prepend: site.baseurl }}">
  {{ mypage.url | remove: "Wiki/Tips" | remove: "/" }}</a><br>
  {{ mypage.description }}
  </p>
{% endfor %}
{% endcapture %}
{% include fvwmwindow.html id="wiki-tips-pages"
title="FvwmWiki Tips Pages" content=fvwmtxt
color="yellow-green" %}
