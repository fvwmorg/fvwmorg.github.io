---
title: Fvwm website development
---


# FvwmWeb (fvwm.org) at GitHub

* TOC
{:toc}

The Fvwm website (<https://fvwm.org/>) is hosted using
[GitHub pages](https://help.github.com/en/github/working-with-github-pages).
The website is a static site built form markdown files using
[Jekyll](https://jekyllrb.com/). This page explains the
layout of the website and how to contribute to the
[FvwmWiki]({{ site.wikiurl }}/).

The source for the Fvwm website is located at
<https://github.com/fvwmorg/fvwmorg.github.io>.
To contribute to the FvwmWiki (or website) submit
pull requests using GitHub. The Wiki files are
located in the `Wiki/` directory.

The website is built from a single layout `_layouts/fvwm3.html`
which is used to wrap the page content in. The layout provides
the HTML and CSS needed create the top navigation menu,
margins, and behavior of the basic web elements. See
[/Wiki/FvwmWeb/Layout/](Layout/) for details about the
sites layout.

## FvwmWiki Content

The wiki is currently written for Fvwm2, and all edits
and new pages should be written with Fvwm2 syntax and
capabilities in mind. __Do not include Fvwm3 specific
syntax or information in pages located in `Wiki/`__.

The rational for this is that the current content
of the wiki is written for Fvwm2, so for consistency
all the pages in `Wiki/` must remain relevant
for Fvwm2 users. In addition since (at the time)
Fvwm3 is compatible with Fvwm2, the information in
`Wiki/` can apply to both Fvwm2 and Fvwm3.

Pages written for only Fvwm3 should be placed in
`Wiki3/` and have `version: fvwm3` in their
front matter. This way pages for Fvwm2 and
Fvwm3 are clearly separated in their respective locations.

It is preferable that all new pages and edits
stay relevant for Fvwm2 users until at which time
Fvwm3 starts to drift significantly from Fvwm2.
At that time the Fvwm2 `Wiki/` will be archived,
and work can switch to the Fvwm3 `Wiki3/`.

## Use a Local Copy with Jekyll

The website can be built and hosted locally using
Jekyll. After installing Jekyll and Git on your system,
clone and build the site running the following:

```
git clone https://github.com/fvwmorg/fvwmorg.github.io.git
cd fvwmorg.github.io
jekyll s
```

This will build the site using Jekyll and run
a local copy of the site on localhost. Use the
link provided by Jekyll to view the local copy.

If you need to change the location of the site
to `https://mydomain.com/mypath`, you need to update
the configuration variables `baseurl:` and `wikiurl:`
in the Jekyll configuration file `_confi.yml` and
update the SCSS variable `$baseurl:` in `_sass/_fvwmvars.scss`
to appropriate values.

Before contributing to the Wiki, build a local copy
of the site so you can preview and test your edits
before committing them.

## File Naming Conventions

All pages should be named by their full path and use an
[index file](https://en.wikipedia.org/wiki/Web_indexing),
such as `Path/To/Page/index.md`. This way all links are of
the form `https://fvwmorg/Path/To/Page/`. For example this page
(<https://fvwm.org/Wiki/FvwmWeb/>) is generated from the
file `Wiki/FvwmWeb/index.md`.

All page names should use the Fvwm2 configuration syntax
convention of capitalizing the first letter of each word,
and concatenating multiple words together into a single
word, such as FvwmWeb, in their path.

To create a new page, first decide where in the `Wiki/` file
tree to put the page and create the corresponding directory
and index.md file for the page. For example, to create a page
`MyRecipe` for the `Wiki/CookBook/`, first create the directory
`Wiki/CookBook/MyRecipe/`, then create and edit the index
file `Wiki/CookBook/MyRecipe/index.md`.

## FvwmWiki Organization

The wiki is split up into multiple categories, and
each category page contains all the links to its
subpages (identified by the page type). Here is
the current list of categories:


| Category | Type |
|----------|------|
| /Wiki/ | main |
| /Wiki/Config/ | config |
| /Wiki/Config/Functions/ | functions |
| /Wiki/CookBook/ | recipe |
| /Wiki/Tips/ | tip |
| /Wiki/Modules/ | module |
| /Wiki/Decor/ | decor |
| /Wiki/Panels/ | panel |
| /Wiki/Menus/ | menu |
| /Wiki/Irc/ | irc |

Each page above generates a list of links to pages based on their type. To create
a new page in one of the above lists, add the corresponding `type: <type>` to
the front matter of the page. For example to include a page in `/Wiki/CookBook/`
use `type: recipe` in the front matter.

## Front Matter

Jekyll requires all pages it generates to have [front matter](
https://jekyllrb.com/docs/front-matter/), which is a list
of [YAML](https://en.wikipedia.org/wiki/YAML) variables that
are used for page generation.

At a minimum every page should have the `title:` variable which
states the title of the page (used in the `<title></title>` tag).
In addition `Wiki/` pages should include a `version:` (`fvwm2`
or `fvwm3`). `type:` (page category), `weight:` (sorting order),
and `description:`, which are used for the category lists.

For example, to create a new CookBook recipe, `/Wiki/CookBook/MyRecipe/`,
first create and edit the following index file:

```
Wiki/CookBook/MyRecpie/index.md
```

Then include the following front matter at the top of the file:

```yaml
---
title : MyRecipe
version : fvwm2
type : recipe
weight : 250
description : |
  This is a multiline
  description of MyRecipe.
---
```

After the front matter write the content of the page using
markdown. Specifically using the [kramdown syntax](
https://kramdown.gettalong.org/quickref.html)

In addition to the above front matter variables, you can
use `showtitle: 1` to include the page title as the
first header (`<h1></h1>`) of the page. If you use this
option this header won't be included in kramdown's
table of contents.

## Page Content

Pages are built using markdown. Here is a quick reference
for the [kramdown syntax](https://kramdown.gettalong.org/quickref.html).
In addition here are some specific conventions to use to ensure
portability of the site.

### Links

In order to ensure that the site can be built and used
in other locations, such as `https://mysite.com/fvwmorg/`,
all links need to be relative or need to prepend the liquid
variable {% raw %}`{{ site.wikiurl }}`{% endraw %}.
Examples of valid links are:

{% raw %}
```markdown
## Example 1
[Link to /Wiki/FvwmWeb/]({{ site.wikiurl }}/FvwmWeb/)

## Example 2
[Link to /Wiki/FvwmWeb/]({{ "/FvwmWeb/" | prepend: site.wikiurl }})

## Example 3
[Link to /Wiki/FvwmWeb/]({{ site.baseurl }}/Wiki/FvwmWeb/)
```
{% endraw %}

The above examples will all correctly append the liquid variables
to the link path, to ensure the site can be built for other locations.


### Table of Contents

Markdown will create a table of contents for a page using the
page headers. In order to build a table of contents use
the following near the top of the page, usually under the main header.
The two lines `* TOC` and `{:toc}` create the table of contents:

```markdown
# Main Header

* TOC
{:toc}

Description of Page.

## Header2

## Header3
```

By default the TOC will float to the right on larger screens.
To make the header full size for all screen sizes, use
`{:toc #toc-full}` as the line under `* TOC`.

You can remove a header from the table of contents by
adding the class `.no_toc` to the header as follows:

```markdown
## Header not included in TOC
{:.no_toc}
```



### Code Blocks and Syntax Highlighting

Jekyll is configured to send code through the
[rouge syntax highlighter](https://github.com/rouge-ruby/rouge)
which is used to display code in code blocks.
Code blocks can be used for Fvwm configurations,
shell scripts, and so on. To get code blocks
and syntax highlighting using the language
`lang` use one of the following:

{% highlight markdown %}
{% raw %}
## Markdown Code Fence No Syntax Highlighting

```
place code here
```

## Markdown Code Fence Syntax Highlighting

```lang
place code here
```

## Liquid Highlight Block Syntax

{% highlight lang %}
place code here
{% endhighlight %}

## Liquid Highlight Block Syntax With Line Numbers

{% highlight lang linenos %}
place code here
{% endhighlight %}
{% endraw %}
{% endhighlight %}

A following lists all of [rouge's supported languages](
https://github.com/rouge-ruby/rouge/wiki/List-of-supported-languages-and-lexers).
There are plans to write a Lexer for the Fvwm2
configuration syntax for rogue so syntax highlighting will
work on GitHub for Fvwm2 configuration syntax. Some inital
attempts can be found at this outdated fork <https://github.com/somiaj/rouge>.

To prepare for a day when there is syntax highlighting for Fvwm2
configuration syntax, please use `fvwm2rc` as the language in all code
blocks, for example:


{% highlight markdown %}
{% raw %}
## Fvwm2 Config Syntax Highlighting

```fvwm2rc
place Fvwm2 config here
```

{% highlight fvwm2rc %}
place Fvwm2 config here
{% endhighlight %}
{% endraw %}
{% endhighlight %}


### FvwmWeb Window

{% capture fvwmtxt %}
<p>The Fvwm decorated div can be included in a page as follows
(note content of the window must be written using HTML and not
markdown):</p>

{% highlight liquid %}
{% raw %}
{% capture fvwmtxt %}

<HTML Content of Window>

{% endcapture %}
{% include fvwmwindow.html
id="id string"
title="Window Title"
color="Decor Color"
content=fvwmtxt %}
{% endraw %}
{% endhighlight %}

<p>What the above code does is capture all the HTML content as the
variable `fvwmtxt`, then sends that content variable along
with some other configuration options to the `fvwmwindow.html`
include file, which generates the window.</p>

<p>See <a href="{{ site.wikiurl }}/FvwmWeb/FvwmWindow/">
/Wiki/FvwmWeb/FvwmWindow/</a> for a full description of
all options.</p>
{% endcapture %}
{% include fvwmwindow.html
id="fwin-ex"
title="FvwmWindow Example"
color="orange"
content=fvwmtxt %}



