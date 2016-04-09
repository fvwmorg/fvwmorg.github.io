README file for screenshot database
===================================

The screenshots are now generated though Jekyll (using Liquid).

To configure the number of screen shots per page and the number of
pages modify the _config.yml file and adjust max_page and count.

There needs to be an indexN.html file for each page.

 + N is the page number. Do not include a leading zero for pages 1-9.
 + Index page 1 is just called index.html
 + Index pages 1-9 are in place already.
 + The pages are identical except for a single variable in the
   YML front matter defining the page number.
 + Each index page includes the template.html file to create the page.

The template.html file is the page template. Edit this to edit
the layout of each page. This page uses the Liquid language.

 + <https://github.com/Shopify/liquid/wiki/Liquid-for-Designers>

Adjust the template to adjust the layout of each page.

Adding a new shot
=================

Each screenshot directory should be named

    YYYY-MM-DD_Name_Optional

Where YYYY-MM-DD is the date. You can include optional description
in the directory name, but only the date on front, an underscore
and then a name is required.

Inside each directory should be three files

 + screenshot.{jpg,gif,png}
   + The screenshot file can have any extension.
 + preview.png
   + The preview.png should be 160px wide (height can vary).
   + The preview will not be generated and must be supplied.
 + description.inc
   + The description.inc file can contain html for formatting.

If any file is missing it will break the build.

* * *

Note: The script looks file files that contain the name 'screenshot.',
so if there are files with this name in other parts of the site it
could break the build.
