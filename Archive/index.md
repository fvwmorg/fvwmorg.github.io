---
title: Fvwm2 Archive Pages
showtitle: 1
archivenav:
  - title: Fvwm2 Documentation
    color: purple
    links:
      - name: The Offical Fvwm FAQ
        url: Faq/
      - name: Features
        url: Features/
      - name: News
        url: News/
      - name: Developer Information
        url: Developers/
      - name: Module Interface
        url: ModuleInterface/
  - title: Other Fvwm2 Information
    color: yellow-green
    links:
      - name: Screenshots
        url: Screenshots/
      - name: Logos
        url: Logos/
      - name: Fvwm2 Code Statistics 
        url: Stats/
      - name: Fvwm Authors
        url: Authors/
      - name: Fvwm Author's Photographs
        url: Authors/Photos
---


This is an archive of the old web pages for Fvwm2. This archive is for historical
reasons and provides copies of files/pages/information for Fvwm2 that is not longer
maintained or updated.


<div class="row">

{% for block in page.archivenav %}
{% capture fvwmtxt %}
<ul>{% for link in block.links %}
<li><a href="{{ link.url }}">{{ link.name }}</a></li>
{% endfor %}</ul>
{% endcapture %}

<div class="col-md-6 mb-1 p-1">
{% include fvwmwindow.html id=block.title
title=block.title color=block.color
content=fvwmtxt max=1 %}
</div>
{% endfor %}

</div>


