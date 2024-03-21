---
layout: wiki
title: Irc
type: main
weight: 300
description: |
  #fvwm on irc.libera.chat has been a gathering place for Fvwm users.
  Here is the channel FAQ and a few conversations that occurred on irc.

---

# \#fvwm on irc.libera.chat

A community of Fvwm users and developers can be found on the
`#fvwm` IRC channel on libera (`irc.libera.chat`). Please
stop by if you have questions about Fvwm or just want to talk
about the fantastic window manager.

If you need help with `#fvwm`, [see this FAQ answer](
HashFvwmFAQ/#who-do-i-ask-for-help-about-fvwm).

## HashFvwmFAQ

[/Irc/HashFvwmFAQ]({{ "/Irc/HashFvwmFAQ" | prepend: site.wikiurl }})
is an FAQ created by users of `#fvwm`.

## Conversations

Here are the list of conversations:

{% assign pages = site.pages | where:"type","irc" | sort:"weight" %}
{% for mypage in pages reversed %}
  <p class="title-indent">
  <a href="{{ mypage.url | prepend: site.baseurl }}">
  {{ mypage.url | remove: "Wiki/Irc" | remove: "/" }}</a><br>
  {{ mypage.description }}
  </p>
{% endfor %}
