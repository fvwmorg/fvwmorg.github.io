# FvwmWiki at GitHub

This is the source to build the FvwmWiki: <http://fvwm.org/Wiki>

The wiki is built from Markdown files with front matter using Jekyll:
<https://jekyllrb.com>.

To contribute to the wiki you will need to submit pull requests against
this source.

## Layout and info for contributors

The wiki is currently divided into the following main pages.

| Page | Type |
|------|------|
| / | main |
| /Config | config |
| /Config/Functions | functions |
| /CookBook | recipe |
| /Tips | tip |
| /Modules | module |
| /Decor | decor |
| /Panels | panel |
| /Menus | menu |
| /irc | irc |

Each page above generates a list of links to pages based on their type. To create
a new page in one of the above lists first create a directory and index.md
file for your page. For example if you wanted to put a new CookBook recipe,
MyRecipe, you would create the following file

    /Wiki/CookBook/MyRecipe/index.md

Put the following front matter at the top of your index.md file

    ---
    layout : wiki
    title : MyRecipe
    type : recipe
    weight : 250
    description : |
      This is a multiline
      description of MyRecipe.
    ---

This sets the variables that are used when building. The layout must
be set to "wiki" and the title is the title of your page. type, weight and
description are used when building the lists on the main pages.

Set type to the main page you want a link on. The weight is used
to order the list. 1000 is the current top of the list and steps are by 50
or 100 to give room to put pages in between. The description is what appears
below the link when describing that page in the list.

Under the front matter you then write your page using markdown syntax. Here
are some notes.

+ To include a table of contents built from the markdown headers use

        * TOC
        {:toc}

  This will float the TOC to the right. To use a full width TOC use

      * TOC
      {:toc #toc-full}  

+ __Note:__ Syntax highlighting currently doesn't work on github. This
  is here for the possibility of adding it back (see below). The below
  should still be used for fvwm configuration code.

  To use syntax highlighting you need to put your configuration code between
  special code block as follows

      {% highlight fvwm %}
      # Example Function
      DestroyFunc FuncName
      AddToFunc FuncName
      + ...
      {% endhighlight %}

  Non-highlighted code blocks can be generated by indenting them four spaces.

+ For links between pages please use the following (so they can be built for
  different locations):

      [/CookBook/MyRecipe]({{ "/CookBook/MyRecipe" | prepend: site.wikibaseurl }})

  This uses the variable wikibaseurl from the \_config.yml file to expand the url
  in the link.

+ Include any images or extra files for your page in the directory alongside the
  index.md file.

+ If you want to include links in your description you must write them using html.

        <a href="{{ "/CookBook/MyRecipe" | prepend: site.wikibaseurl }}">/CookBook/MyRecipe</a>

  This is because the variable is not parsed through the markdown processor.

+ If you want to generate your own main page, look at the current ones for examples
  on building a list from these variables. You need to use an index.html file to
  generate lists you want to be able to use links from the description variable.

## Page Naming Convention

To follow the fvwm config syntax, the naming convention of wiki pages is to
capitalize the first letter of each word. For example the wiki page
for the RightPanel is located at [/Wiki/Panels/RightPanel](
http://www.fvwm.org/Wiki/Panels/RightPanel/).

## Building the site with Jekyll

This static site is built from the Markdown files using [Jekyll](
(https://jekyllrb.com/). To build the wiki you need a copy of
the source and Jekyll installed. In which case the wiki can be
built using

    fvwmorg.github.io# jekyll build

You can build and run a local server of the wiki with

    fvwmorg.github.io# jekyll serve

The static .html for the Wiki are built in fvwmorg.github.io/\_site/Wiki.
If using `jekyll serve`, you will be given a local address to view the Wiki
(along with the full fvwm.org site) at, and any changes you made will be
built and updated to be viewed.

## Syntax Highlighting

My past attempts at syntax highlighting can be found on my old unused
wiki sources at <https://github.com/somiaj/fvwmwiki>. These are not
compatible with github pages, so the current Wiki has no syntax highlighting.

It might be possible to add syntax highlighting in the future if someone
were to write a full lexer for [rouge](https://github.com/rouge-ruby/rouge),
and get it accepted into their source. My initial attempts at this can be
found at my outdated fork <https://github.com/somiaj/rouge>.

