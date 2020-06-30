---
title: Fvwm Web Window
colors:
  - alpine
  - arizona
  - blue
  - broica
  - crimson
  - gray
  - green
  - neptune
  - orange
  - pink
  - purple
  - red
  - yellow-green
  - yellow
---

# Fvwm Web Window

{% capture fvwmtxt %}
<p>The Fvwm web window (or just FvwmWindow) is a decorated div
that can be included in a page as follows
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

{% endcapture %}
{% include fvwmwindow.html
id="fwin-ex"
title="FvwmWindow Example"
color="blue" logo=1
content=fvwmtxt %}

The above is an example of a FvwmWindow that can be included
in FvwmWeb pages. The above gives the basic syntax to
include a FvwmWindow and below gives more details
(including full lists of options).

## Full List of Variables

The FvwmWindow is created by using [Jekyll's Include](
https://jekyllrb.com/docs/includes/), which are used
to build the HTML. The full list of accepted variables is:

* `title`: Title bar text of window.
* `content`: Content (in HTML) of the window.
* `color`: Color of window decor.
* `bgcolor`: Background color of window (defaults to color and only useful if nocss is used)
* `id`: Unique ID string for window.
* `logo`: Adds the Fvwm logo in the window content if set.
* `max`: Defaults window to maximum size (no margins) if set.
* `shade`: Defaults window to be shaded (hidden content) if set.
* `nocss`: Remove the div wrapper that sets colors for window if set.

## Using Bootstrap Columns

By default the window will take up the full size of its containing div
where the difference between a maximized and regular window is
if the margins are zero or not. In order to stack multiple windows side
by side, use [Bootstrap's grid](https://getbootstrap.com/docs/4.5/layout/grid/)
to set the size of the windows.

For example if you wanted to have 4 columns for a large screen
but scale down to one column for a small screen with multiple
windows use something like the following:

{% highlight html %}
{% raw %}
<div class="row">

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex1"
title="Example Window 1"
color="arizona" content="Arizona"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex2"
title="Example Window 2"
color="crimson" content="Cimson"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex3"
title="Example Window 3"
color="neptune" content="Neptune"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex4"
title="Example Window 4"
color="alpine" content="Alpine"
logo=1 max=1 %}
</div>

</div>
{% endraw %}
{% endhighlight %}

In the above the `<div class="row">` connects
the following nested div's in the same grid. Then
each div sets its size by setting the number
of columns it uses. There are 12 possible columns, and
`col-md-6` tells the div to use 6 columns if the screen
is 'medium width' or bigger, while `col-xl-3` says
to use 3 columns if the screen is 'extra large'.

What that does is make it so on tiny screens
each div uses the full 12 columns and takes the
full width, while on medium screens each div uses
6 (of 12) columns and this fits 2 per row, and
finally on extra large screens, use 3 (of 12) columns
allow 4 windows per row.

By default the windows will use the sites dark
background as showcased in the windows below, which
are created using the above example. To see how
the responsiveness works, adjust your browsers width
between narrow and wide to see the various breakpoints.


<div class="row">
<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex1"
title="Example Window 1"
color="arizona" content="Arizona"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex2"
title="Example Window 2"
color="crimson" content="Cimson"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex3"
title="Example Window 3"
color="neptune" content="Neptune"
logo=1 max=1 %}
</div>

<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="ex4"
title="Example Window 4"
color="alpine" content="Alpine"
logo=1 max=1 %}
</div>
</div>


## All Possible Colors

The full list of possible decor colors is
alpine, arizona, blue, broica, crimson, gray,
green, neptune, orange, pink, purple, red,
yellow-green, and yellow. The following
is an example of each color:

<div class="row">
{% for color in page.colors %}
<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-1 p-1">
{% include fvwmwindow.html id=color
title=color color=color
content=color nocss=1
max=1 %}
</div>
{% endfor %}
</div>

It is possible to use windows (like above) without the
default background, to do so you need to first set
`nocss=1` and then choose the color with `bgcolor="color"`.
Here is some examples of mixing and matching.


<div class="row">
<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="mixex1"
title="Example Window 5" color="neptune" bgcolor="blue"
content="Border: neptune<br>Background: blue"
nocss=1 max=1 %}
</div>
<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="mixex2"
title="Example Window 4" color="arizona" bgcolor="yellow"
content="Border: arizona<br>Background: yellow"
nocss=1 max=1 %}
</div>
<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="mixex3"
title="Example Window 7" color="crimson" bgcolor="purple"
content="Border: crimson<br>Background: purple"
nocss=1 max=1 %}
</div>
<div class="col-md-6 col-lg-4 col-xl-3 mb-1 p-1">
{% include fvwmwindow.html id="mixex4"
title="Example Window 8" color="green" bgcolor="gray"
content="Border: green<br>Background: gray"
nocss=1 max=1 %}
</div>
</div>


