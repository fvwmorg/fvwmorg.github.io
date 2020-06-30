---
title: Fvwm Web Layout
---

# Fvwm Web Layout

The Fvwm website is built using a single layout `_layout/fvwm3.html`.
This single layout is linked to both `_layout/default.html` and
`_layout/wiki.html` to ensure that old pages that explicitly set
their layout in the front matter get built.

The layout is built using [Bootstrap v4.5](
https://getbootstrap.com/docs/4.5/getting-started/introduction/)
as the CSS framework. Thus all pages can make
use of any Bootstrap 4.5 styles along with jQuery slim.

To preview what all the web elements look like using
the sites layout, see the following test page:
[/Wiki/FvwmWeb/FvwmFoo/TestLongPath/FvwmBar](
{{ site.wikiurl }}/FvwmWeb/FvwmFoo/TestLongPath/FvwmBar/).

## Site Configuration

Some site variables are configured in the
`_config.yaml` file. These include:

+ `baseurl`, `wikiurl`, and `url`. These variables set the
  location to host the site.

  For example to host the site
  at `http://mydomain.com/my/path/`, set the following:

  + `baseurl: /my/path`
  + `wikiurl: /my/path/Wiki`
  + `url: http://mydomain.com`

  In addition you need to manually set `$baseurl` in
  `_sass/_fvwmvars.scss` to match the baseurl above.

+ `fvwm2-version` and `fvwm3-version` are set to
  the current version of fvwm2 and fvwm3, which is
  used in various locations in the site.

+ `nav` is a list of links for the main (top)
  navigation menu, which provides both the
  name and url of each link. 

## \_SASS Files

In addition to the Bootstrap CSS framework, additional
CSS are provided for overrides to the Bootstrap settings
and to provide additional web elements. These files
are generated using SCSS and are all located in the
`_sass` directory. The files used are:

+ `_fvwmvars.scss`: This file defines all the color
  variables used in the layout to provide a single
  location to update colors.

+ `_fvwm3.scss`: Provides the CSS for the main
  layout including all the Bootstrap overrides
  and custom classes.

+ `_monokai.scss`: Provides the CSS for syntax
  highlighting using the monokai theme.

+ `_fvwm3-carousel.scss`: Provides the CSS for
  the image carousel on the index page.

+ `_fvwmwindow.scss`: Provides the CSS for
  the div's with Fvwm window decor as the border.


## SCSS Color Variables

The colors should all be configurable by setting the
following variables in `_sass/_fvwmvars.scss`, which are:

```scss
// Sets the Variables for the CSS generation
@charset "utf-8";

// Base url -- must be manually set until someone figures out how
// to use Liquid variables on GitHub in SCSS files.
$baseurl: "";

// Default Colors:
$text-color: #000000;
$bg-color: #ffffff;
$border-color: #1a6e99;
// Link Colors (bootstrap's are too light):
$link-color: #002bff;
$link-bgcolor: $bg-color;
$link-button-pressed-color: #797907;
$hilink-color: #000000;
$hilink-bgcolor: #d9d915;
// Navbar Link Colors:
$navlink-color: #003c3c;
$navlink-bgcolor: #ffffff;
$navhilink-color: $border-color;
// Fvwmwindow Colors:
$fwin-color: #ffffff;
$fwin-bgcolor: #003c3c;
$fwinlink-color: #d9d915;
$fwinlink-bgcolor: $fwin-bgcolor;
$fwinhilink-color: #000000;
$fwinhilink-bgcolor: #f8f8b3;
```

