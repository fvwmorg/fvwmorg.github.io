<?php
//--------------------------------------------------------------------
//-  File          : developers.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path="./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Creating RPM Packages";
$heading        = "FVWM - Creating RPM Packages";
$link_name      = "Creating RPM Packages ";
$link_picture   = "pictures/icons/doc_developers_creating_rmps";
$parent_site    = "developers";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php", "", "$requested_file");

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Creating RPM Packages");
?>

  <h2>Preface</h2>
  <p>If you use an rpm based distribution, you may sometimes want to create
    a binary rpm package and install it on all your machines instead of
    individual installation using "make install" to a local place.</p>

  <p>Creating rpm packages from any given released tarball or a cvs tree is
    automated in FVWM. The same instructions may be applied to 3 projects
    <i>fvwm</i>, <i>fvwm-themes</i> and <i>wm-icons</i>. The official rpm
    packages for these projects can be found on this
    <a href="http://fvwm-themes.sf.net/rpm/">rpm</a> page.</p>

  <h2>Before you begin</h2>
  <p>You should install
    <a href="http://rpmfind.net/linux/RPM/rpm-build.html">rpm-build</a>.</p>

  <p>You should install all <i>-devel</i> packages needed for building.
    If you are going to install your newly built rpm on other machines, you
    should have both <i>somelib</i> and <i>somelib-devel</i> rpm packages
    installed on your system and only <i>somelib</i> installed on these other
    systems. Don't use non rpm installed stuff unless you know what you do.
    Depending on your distribution the packages may be (some are optional):</p>

  <ul>
    <li><a href="http://rpmfind.net/linux/RPM/glibc-devel.html">glibc-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/XFree86-devel.html">XFree86-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/xpm-devel.html">xpm-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/libstroke-devel.html">libstroke-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/readline-devel.html">readline-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/ncurses-devel.html">ncurses-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/libtermcap-devel.html">libtermcap-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/perl.html">perl</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/gtk+-devel.html">gtk+-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/glib-devel.html">glib-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/imlib-devel.html">imlib-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/fontconfig-devel.html">fontconfig-devel</a></li>
    <li><a href="http://rpmfind.net/linux/RPM/fribidi-devel.html">fribidi-devel</a></li>
  </ul>
  
  <p>It is suggested that you create rpm packages on a stock or almost a stock
    system (this is a requirement for the official rpms), but this is not really
    needed. You should just verify that all dependancies of the newly created rpm
    may be found by users of your rpm. For example, if you have a symlink of
    <tt>/usr/local/bin/perl</tt> to the actual <tt>/usr/bin/perl</tt> the created
    rpm will require an executable that is not a part of any standard package.
    To avoid this, set environment variable <b>PERL</b> in your shell
    to <tt>/usr/bin/perl</tt> before creating rpms.</p>

  <h2>What version will be packaged</h2>
  <p>If you want to create an rpm from a given tarball, unpack it and
    <tt>cd</tt> to the top <i>fvwm-x.y.z</i> directory. Alternativelly you may
    just move this tarball to some working cvs tree or another unpacked tree.</p>
    
  <p>If you use cvs and want to create the rpm of the current cvs snapshot,
    you should not do anything special on this step.</p>
    
  <p>If you use cvs and want to create the rpm of some specific version
    <b>x.y.z</b> in the past (or in the future if you are a prophet), first
    update the cvs tree to this version by executing:</p>

<pre class="doc">
cvs update -r version-x_y_z
</pre>

  <p>for example <B>version-2_5_4</b>. This creates sticky tags that are ok
    if you use this cvs tree for updating to final (tagged) releases only.
    If you use it for anything else, you may want to remove sticky flags
    by "cvs update -A" after creating rpms.</p>
    
  <h2>Where rpms will be created</h2>
  <p>By default, the resulting rpms are created in the system's directory
    that varies from one rpm-based distribution to another. You usually need root
    permisions to create files in this directory.</p>

  <p>But this is not really needed, you may create rpms as a regular user.
    To do this, create <i>~/.rpmmacros</i> file that has one line:</p>

<pre class="doc">  
%_topdir /home/<i>user</i>/redhat
</pre>

  <p>Note that both binary and source rpms will be created and they will
    sit in different subdirectories, like <i>~/redhat/RPMS/i386/</i> and
    <i>~/redhat/SRPMS/</i>.</p>

  <h2>Creating binary and source rpm packages</h2>
  <p>Hopefully you are in the top directory after the previous steps.
    If you don't have <i>Makefile</i>, run <tt>./configure</tt>. If you don't
    have <i>configure</i>, produce it as described on the
    <a href="./cvs.html">cvs</a> page.</p>

  <p>Creating binary and source rpm packages is as simple as executing:</p>

<pre class="doc">
make <b>rpm-dist</b>
</pre>

  <p>This should create two files like
    <i>RPMS/i386/fvwm-&lt;version&gt;-&lt;release&gt;.i386.rpm</i> and
    <i>SRPMS/fvwm-&lt;version&gt;-&lt;release&gt;.src.rpm</i>.</p>

  <p>Don't distress if it will not work for you from the first run. This usually
    means that you didn't install something or you don't have permissions or
    something like this. Investigate an error and complete the previous steps.
    If you are really stuck, ask on the mailing lists.</p>

  <p>If you already have a correct <i>fvwm-x.y.z.tar.gz</i> file in the top
    directory (not the parent directory), because you either downloaded the
    released tarball or symlinked it or executed "make rpm-dist" or "make dist"),
    you may shorten the process by executing the following instead:</p>

<pre class="doc">
make <b>rpm-this</b>
</pre>

  <p>By default the release name is <i>0.YYYYMMDD</i>, like 0.20021207.
    To change it specify:</p>

<pre class="doc">
make rpm-dist <b>release</b>=test1
</pre>

  <p>You may pass <tt>make</tt> and <tt>configure</tt> options that will
    be used when rpm is created like shown here:</p>

<pre class="doc">
make rpm-dist <b>cparams</b>='--enable-gnome --quiet' <b>mparams</b>='CFLAGS="-O2 -g"'
</pre>

  <p>Finally, if you want to create rpm packages for a tarball with a version
    different than the current top directory version, you may do this by:</p>

<pre class="doc">
make <b>version</b>=2.3.22 release=2 <b>rpm-this</b>
</pre>

  <p>Good luck.</p>

<?php decoration_window_end(); ?>
