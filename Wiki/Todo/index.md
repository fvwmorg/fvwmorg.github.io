---
layout: wiki
title: Todo List
---

# FvwmWiki Todo List

The source for the wiki can be found at
<https://github.com/fvwmorg/fvwmorg.github.io>,
under the Wiki directory.

The wiki is written mostly in [Markdown](
https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet),
and built with [Jekyll](https://jekyllrb.com/).

Information about the layout, building and syntax highlighting
used in the wiki can be found on the github page.

This is a list of things that are still left unfinished.

## Edits and Cleanup

+ There is still some mention of configuration syntax for 2.4.x and 2.5.x in the
  older pages. Update syntax and versions to 2.6.x. Older syntax should be removed
  or left has a historical note.

+ There are still artifacts left in older pages from importing them from the
  previous wiki format.

## Blank Pages

These are pages that are places holders.

+ [/DefaultConfig]({{ "/DefaultConfig" | prepend: site.wikiurl }})
  -- Currently just a copy of the config file.
  Intended to give an overview of how the config works in terms of bindings,
  menu ops, etc.
+ [/Config/Conditionals]({{ "/Config/Conditionals" | prepend: site.wikiurl }})
  -- Intended to be a guide into how
  to use conditional statements, both in the config and in complex functions.
+ [/Config/Modules]({{ "/Config/Modules" | prepend: site.wikiurl }})
  -- Intended to describe module alias
  configuration syntax, \*Foo, and how to configure, start and stop them.
  Then point at [/Modules]({{ "/Modules" | prepend: site.wikiurl }})
  for specifics for each module.

## Updates

Pages that need to be updated

+ [/Modules/\*]({{ "/Modules" | prepend: site.wikiurl }})
  -- Most the modules don't have much more than a
  description. These need to all be updated and include some examples of different
  panels and things that can be done with modules.
+ Probably others I haven't listed.


