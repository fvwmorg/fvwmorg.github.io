---
title: Fvwm Test Page
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

# Test Page

* TOC
{:toc}

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec neque vel dolor tincidunt aliquam quis vel massa. Pellentesque at commodo purus. Praesent condimentum ornare sem nec finibus. In leo massa, sodales elementum tortor eget, semper imperdiet felis. Praesent in viverra orci. Cras dignissim fringilla arcu, non consequat lacus mollis ut. In semper cursus enim at tincidunt. Proin felis elit, pharetra id dolor in, auctor sagittis massa. Ut non molestie odio, quis tristique nisi. Nulla at auctor diam.

Sed facilisis in leo quis pharetra. Nullam fringilla, elit pellentesque mattis commodo, velit tortor tincidunt elit, viverra pellentesque est lectus eget mauris. Morbi elementum egestas nulla, a mattis diam varius vitae. Nunc et volutpat ligula. Vivamus nec elit varius dolor auctor egestas sed et diam. In ullamcorper vel neque ac venenatis. Vivamus porta ornare libero, sit amet suscipit dui sodales non. Pellentesque quis ex iaculis, eleifend odio in, tempus justo. Maecenas pulvinar sapien sed tortor bibendum consectetur. Quisque sed ligula at lorem vulputate accumsan vel eget massa.

## Test Headers

# Test Header1
{:.no_toc}

## Test Header2
{:.no_toc}

### Test Header3
{:.no_toc}

#### Test Header4
{:.no_toc}

##### Test Header5
{:.no_toc}

###### Test Header6
{:.no_toc}

## Test Text

_Test Emphasis._

__Test Strong.__

___Test Strong Emphasis.___

~~Strikethrough Test~~

[Link Test](#)

[_Emphasis Link Test_](#)

[__Strong Link Test__](#)

[___Strong Emphasis Link Test___](#)

## Test Paragraphs


Nullam ipsum augue, eleifend ornare nisl sit amet, facilisis volutpat magna. Sed tincidunt auctor purus et interdum. Praesent vel interdum nibh. Suspendisse volutpat, felis id sodales volutpat, augue dui sollicitudin tellus, sit amet vehicula odio dui ut enim. Sed sapien lorem, tristique quis ex non, facilisis dignissim justo. Integer suscipit urna egestas, luctus quam et, hendrerit urna. Sed sit amet cursus quam. Nulla suscipit finibus felis eget rhoncus.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque a ullamcorper erat. Praesent pellentesque vestibulum eros. Phasellus eu egestas felis. Duis fringilla fringilla eleifend. Nulla facilisi. Vivamus sed nulla sit amet risus faucibus auctor sit amet quis arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla posuere porttitor elit ut finibus. Cras posuere urna massa, eget dictum erat condimentum at. In sit amet augue a est ornare posuere id condimentum mi. Curabitur et pretium nisl.

Suspendisse potenti. Vestibulum varius velit sit amet erat facilisis, id dictum ante accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec a lacinia quam. Etiam malesuada eleifend mauris, maximus suscipit tortor placerat quis. Cras condimentum lacus ligula, et luctus justo aliquet eu. Mauris interdum dolor non gravida pellentesque. Phasellus imperdiet, nibh in pretium consequat, nunc quam congue nibh, et interdum elit ante vitae felis. Aenean id placerat arcu. Integer pellentesque ullamcorper ex, non fringilla quam semper vitae. 

## Test Code Blocks

Here is a test of inline code block `def factorial(n)`, and here is some text afterwards.

### Markdown Fence

Below is a markdown fenced code block with
syntax highlighting.

```python
def factorial(n):
    if n == 0: return 1
    else: return n*factorial(n-1)

print(factorial(10))
```

### Liquid highlight blocks

Here is the code again using liquid highlight
blocks showing line numbers.

{% highlight python linenos %}
def factorial(n):
    if n == 0: return 1
    else: return n*factorial(n-1)

print(factorial(10))
{% endhighlight %}

## Block Quote Test

> "Class aptent taciti sociosqu ad litora torquent per conubia nostra,
>  per inceptos himenaeos." - Duis Fitam

## Table Test

| Head1 | Head2 | Head3 | Head4 |
|:------|:-----:|-------|------:|
| Row 1 Column 1 | Row 1 Column 2 | Row 1 Column 3 | Row 1 Column 4 |
| Row 2 Column 1 | Row 2 Column 2 | Row 2 Column 3 | Row 2 Column 4 |
| Row 3 Column 1 | Row 3 Column 2 | Row 3 Column 3 | Row 3 Column 4 |
| Row 4 Column 1 | Row 4 Column 2 | Row 4 Column 3 | Row 4 Column 4 |
| Row 5 Column 1 | Row 5 Column 2 | Row 5 Column 3 | Row 5 Column 4 |
| Row 6 Column 1 | Row 6 Column 2 | Row 6 Column 3 | Row 6 Column 4 |


## Fvwm Window Test

{% capture fvwmtxt %}
<div>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor, tellus at consectetur sollicitudin, tellus enim aliquet tortor, at tempus ligula sem non leo. Vivamus tincidunt finibus efficitur. Nullam semper semper massa et pellentesque. Proin et arcu congue, sagittis sapien vitae, rhoncus sapien. Nam sed lacus cursus, tristique justo at, semper turpis. Mauris tristique eleifend nulla, ac blandit neque faucibus ac. Ut mi massa, ullamcorper elementum malesuada quis, facilisis a ante. Suspendisse nibh diam, consequat ut ante non, eleifend posuere ligula. Fusce laoreet hendrerit suscipit. Donec maximus, nunc nec interdum scelerisque, nulla diam accumsan erat, sed aliquam leo ligula id libero. Nam imperdiet dui ut quam aliquet lacinia.</p>

<p>Integer convallis velit sed dapibus scelerisque. Phasellus lectus arcu, ornare quis eros eu, auctor tincidunt turpis. Donec non odio non metus posuere sodales id vel magna. Mauris quis molestie lectus. Pellentesque varius interdum risus eu aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. In pellentesque lectus tortor, in suscipit lorem dapibus et. Praesent molestie arcu nisl, sed aliquet velit hendrerit non. Etiam at neque tincidunt, cursus erat non, pharetra magna. Vivamus fermentum sem dui, nec porta orci placerat vitae. </p>

<h1>Header 1</h1>
<h2>Header 2</h2>
<h3>Header 3</h3>
<h4>Header 4</h4>

<table>
  <thead>
    <tr>
      <th style="text-align: left">Head1</th>
      <th style="text-align: center">Head2</th>
      <th>Head3</th>
      <th style="text-align: right">Head4</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left">Row 1 Column 1</td>
      <td style="text-align: center">Row 1 Column 2</td>
      <td>Row 1 Column 3</td>
      <td style="text-align: right">Row 1 Column 4</td>
    </tr>
    <tr>
      <td style="text-align: left">Row 2 Column 1</td>
      <td style="text-align: center">Row 2 Column 2</td>
      <td>Row 2 Column 3</td>
      <td style="text-align: right">Row 2 Column 4</td>
    </tr>
    <tr>
      <td style="text-align: left">Row 3 Column 1</td>
      <td style="text-align: center">Row 3 Column 2</td>
      <td>Row 3 Column 3</td>
      <td style="text-align: right">Row 3 Column 4</td>
    </tr>
    <tr>
      <td style="text-align: left">Row 4 Column 1</td>
      <td style="text-align: center">Row 4 Column 2</td>
      <td>Row 4 Column 3</td>
      <td style="text-align: right">Row 4 Column 4</td>
    </tr>
    <tr>
      <td style="text-align: left">Row 5 Column 1</td>
      <td style="text-align: center">Row 5 Column 2</td>
      <td>Row 5 Column 3</td>
      <td style="text-align: right">Row 5 Column 4</td>
    </tr>
    <tr>
      <td style="text-align: left">Row 6 Column 1</td>
      <td style="text-align: center">Row 6 Column 2</td>
      <td>Row 6 Column 3</td>
      <td style="text-align: right">Row 6 Column 4</td>
    </tr>
  </tbody>
</table>

<p><a href="#">Link Test</a>.
<strong>Bold Test</strong>.
<a href="#"><strong>Bold Link Test</strong></a>
</p>

<ul>
<li>Item 1</li>
<li>Item 2</li>
<li>Item 3</li>
</ul>
</div>
{% endcapture %}
{% include fvwmwindow.html id=wintest
title="Test Window Title"
content=fvwmtxt
logo=1 %}


## List Tests

First the bullet lists:

+ Item 1
+ Item 2

  + Item 2.1
  + Item 2.2
  + Item 2.3

    + Item 2.3.1
    + Item 2.3.2
  + Item 2.4
  + Item 2.5
+ Item 3

  1. Item 3.1
  2. Item 3.2

     1. Item 3.2.1
     2. Item 3.2.2
     3. Item 3.2.3

+ Item 4

Then the enumerated lists:

1. Item 1
2. Item 2
3. Item 3

   1. Item 3.1
   2. Item 3.2
   3. Item 3.3

      + Item 3.3.1
      + Item 3.3.2
      + Item 3.3.3
   4. Item 3.4

      1. Item 3.4.1
      2. Item 3.4.2
      3. Item 3.4.3


## Fvwm Window Color Tests

<div class="row">
{% for color in page.colors %}
{% assign fvwmtitle=color | prepend: "Test: " %}
<div class="col-sm-6 col-md-3 mb-1 p-1">
{% include fvwmwindow.html id=color
title=fvwmtitle color=color
content="Doh!" nocss=1
logo=1 max=1 %}
</div>
{% endfor %}

<div class="col-sm-6 col-md-3 mb-1 p-1">
{% include fvwmwindow.html id="mixcolor1"
title="arizona+alpine" color="arizona" bgcolor="alpine"
content="Doh!" nocss=1
logo=1 max=1 %}
</div>
<div class="col-sm-6 col-md-3 mb-1 p-1">
{% include fvwmwindow.html id="mixcolor2"
title="crimson+purple" color="crimson" bgcolor="purple"
content="Doh!" nocss=1
logo=1 max=1 %}
</div>

</div>



