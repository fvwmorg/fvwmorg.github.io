# FvwmWeb (fvwm.org) at GitHub

This is the source to build the Fvwm website, <https://www.fvwm.org/>,
including the wiki located at <https://www.fvwm.org/Wiki/>.

The site is generated from markdown using Jekyll (including Jekyll's
Kramdown flavor of markdown). See <https://www.fvwm.org/Wiki/FvwmWeb/>
for information on how the site is organized, the styles and plugins used.

To build and view the site locally, clone the repo, then use Jekyll to
serve the site:

```shell
git clone https://github.com/fvwmorg/fvwmorg.github.io.git
cd fvwmorg.github.io
jekyll serve
```

By default the fvwm2rc syntax highlighter is disabled, as it increases
build times drastically. To build or serve the site with syntax highlighting
use the `--config` option:

```shell
jekyll serve --config _config.yml,_config-fvwm2rc.yml
```
