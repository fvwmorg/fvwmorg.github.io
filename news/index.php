<?php
//--------------------------------------------------------------------
//-  File          : news_template.php_
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include_once($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - NEWS";
$link_name      = "News";
$link_picture   = "pictures/icons/news";
$parent_site    = "top";
$child_sites    = array("logo_competition", "logo");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "news";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Latest News");

?>

<h4>Selection by release:</h4>
<center>
<table border="0" width="100%" cellspacing="2" summary="">
<tr>
<td><a href="#2.5.14" style="font-weight:normal;">&nbsp;2.5.14&nbsp;</a></td>
<td><a href="#2.5.13" style="font-weight:normal;">&nbsp;2.5.13&nbsp;</a></td>
<td><a href="#2.5.12" style="font-weight:normal;">&nbsp;2.5.12&nbsp;</a></td>
<td><a href="#2.5.11" style="font-weight:normal;">&nbsp;2.5.11&nbsp;</a></td>
<td><a href="#2.5.10" style="font-weight:normal;">&nbsp;2.5.10&nbsp;</a></td>
<td><a href="#2.5.9" style="font-weight:normal;">&nbsp;2.5.9&nbsp;</a></td>
<td><a href="#2.5.8" style="font-weight:normal;">&nbsp;2.5.8&nbsp;</a></td>
<td><a href="#2.5.7" style="font-weight:normal;">&nbsp;2.5.7&nbsp;</a></td>
<td><a href="#2.5.6" style="font-weight:normal;">&nbsp;2.5.6&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.5.5" style="font-weight:normal;">&nbsp;2.5.5&nbsp;</a></td>
<td><a href="#2.5.4" style="font-weight:normal;">&nbsp;2.5.4&nbsp;</a></td>
<td><a href="#2.5.3" style="font-weight:normal;">&nbsp;2.5.3&nbsp;</a></td>
<td><a href="#2.5.2" style="font-weight:normal;">&nbsp;2.5.2&nbsp;</a></td>
<td><a href="#2.5.1" style="font-weight:normal;">&nbsp;2.5.1&nbsp;</a></td>
<td><a href="#2.5.0" style="font-weight:normal;">&nbsp;2.5.0&nbsp;</a></td>
<td><a href="#2.4.19" style="font-weight:normal;">&nbsp;2.4.19&nbsp;</a></td>
<td><a href="#2.4.18" style="font-weight:normal;">&nbsp;2.4.18&nbsp;</a></td>
<td><a href="#2.4.17" style="font-weight:normal;">&nbsp;2.4.17&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.16" style="font-weight:normal;">&nbsp;2.4.16&nbsp;</a></td>
<td><a href="#2.4.15" style="font-weight:normal;">&nbsp;2.4.15&nbsp;</a></td>
<td><a href="#2.4.14" style="font-weight:normal;">&nbsp;2.4.14&nbsp;</a></td>
<td><a href="#2.4.13" style="font-weight:normal;">&nbsp;2.4.13&nbsp;</a></td>
<td><a href="#2.4.12" style="font-weight:normal;">&nbsp;2.4.12&nbsp;</a></td>
<td><a href="#2.4.11" style="font-weight:normal;">&nbsp;2.4.11&nbsp;</a></td>
<td><a href="#2.4.10" style="font-weight:normal;">&nbsp;2.4.10&nbsp;</a></td>
<td><a href="#2.4.9" style="font-weight:normal;">&nbsp;2.4.9&nbsp;</a></td>
<td><a href="#2.4.8" style="font-weight:normal;">&nbsp;2.4.8&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.7" style="font-weight:normal;">&nbsp;2.4.7&nbsp;</a></td>
<td><a href="#2.4.6" style="font-weight:normal;">&nbsp;2.4.6&nbsp;</a></td>
<td><a href="#2.4.5" style="font-weight:normal;">&nbsp;2.4.5&nbsp;</a></td>
<td><a href="#2.4.4" style="font-weight:normal;">&nbsp;2.4.4&nbsp;</a></td>
<td><a href="#2.4.3" style="font-weight:normal;">&nbsp;2.4.3&nbsp;</a></td>
<td><a href="#2.4.2" style="font-weight:normal;">&nbsp;2.4.2&nbsp;</a></td>
<td><a href="#2.4.1" style="font-weight:normal;">&nbsp;2.4.1&nbsp;</a></td>
<td><a href="#2.4.0" style="font-weight:normal;">&nbsp;2.4.0&nbsp;</a></td>
<td><a href="#2.3.33" style="font-weight:normal;">&nbsp;2.3.33&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.32" style="font-weight:normal;">&nbsp;2.3.32&nbsp;</a></td>
<td><a href="#2.3.31" style="font-weight:normal;">&nbsp;2.3.31&nbsp;</a></td>
<td><a href="#2.3.30" style="font-weight:normal;">&nbsp;2.3.30&nbsp;</a></td>
<td><a href="#2.3.29" style="font-weight:normal;">&nbsp;2.3.29&nbsp;</a></td>
<td><a href="#2.3.28" style="font-weight:normal;">&nbsp;2.3.28&nbsp;</a></td>
<td><a href="#2.3.27" style="font-weight:normal;">&nbsp;2.3.27&nbsp;</a></td>
<td><a href="#2.3.26" style="font-weight:normal;">&nbsp;2.3.26&nbsp;</a></td>
<td><a href="#2.3.25" style="font-weight:normal;">&nbsp;2.3.25&nbsp;</a></td>
<td><a href="#2.3.24" style="font-weight:normal;">&nbsp;2.3.24&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.23" style="font-weight:normal;">&nbsp;2.3.23&nbsp;</a></td>
<td><a href="#2.3.22" style="font-weight:normal;">&nbsp;2.3.22&nbsp;</a></td>
<td><a href="#2.3.21" style="font-weight:normal;">&nbsp;2.3.21&nbsp;</a></td>
<td><a href="#2.3.20" style="font-weight:normal;">&nbsp;2.3.20&nbsp;</a></td>
<td><a href="#2.3.19" style="font-weight:normal;">&nbsp;2.3.19&nbsp;</a></td>
<td><a href="#2.3.18" style="font-weight:normal;">&nbsp;2.3.18&nbsp;</a></td>
<td><a href="#2.3.17" style="font-weight:normal;">&nbsp;2.3.17&nbsp;</a></td>
<td><a href="#2.3.16" style="font-weight:normal;">&nbsp;2.3.16&nbsp;</a></td>
<td><a href="#2.3.15" style="font-weight:normal;">&nbsp;2.3.15&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.14" style="font-weight:normal;">&nbsp;2.3.14&nbsp;</a></td>
<td><a href="#2.3.13" style="font-weight:normal;">&nbsp;2.3.13&nbsp;</a></td>
<td><a href="#2.3.12" style="font-weight:normal;">&nbsp;2.3.12&nbsp;</a></td>
<td><a href="#2.3.11" style="font-weight:normal;">&nbsp;2.3.11&nbsp;</a></td>
<td><a href="#2.3.10" style="font-weight:normal;">&nbsp;2.3.10&nbsp;</a></td>
<td><a href="#2.3.9" style="font-weight:normal;">&nbsp;2.3.9&nbsp;</a></td>
<td><a href="#2.3.8" style="font-weight:normal;">&nbsp;2.3.8&nbsp;</a></td>
<td><a href="#2.3.7" style="font-weight:normal;">&nbsp;2.3.7&nbsp;</a></td>
<td><a href="#2.3.6" style="font-weight:normal;">&nbsp;2.3.6&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.5" style="font-weight:normal;">&nbsp;2.3.5&nbsp;</a></td>
<td><a href="#2.3.4" style="font-weight:normal;">&nbsp;2.3.4&nbsp;</a></td>
<td><a href="#2.3.3" style="font-weight:normal;">&nbsp;2.3.3&nbsp;</a></td>
<td><a href="#2.3.2" style="font-weight:normal;">&nbsp;2.3.2&nbsp;</a></td>
<td><a href="#2.3.1" style="font-weight:normal;">&nbsp;2.3.1&nbsp;</a></td>
<td><a href="#2.3.0" style="font-weight:normal;">&nbsp;2.3.0&nbsp;</a></td>
<td><a href="#2.2.5" style="font-weight:normal;">&nbsp;2.2.5&nbsp;</a></td>
<td><a href="#2.2.4" style="font-weight:normal;">&nbsp;2.2.4&nbsp;</a></td>
<td><a href="#2.2.3" style="font-weight:normal;">&nbsp;2.2.3&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.2.2" style="font-weight:normal;">&nbsp;2.2.2&nbsp;</a></td>
<td><a href="#2.2.0" style="font-weight:normal;">&nbsp;2.2.0&nbsp;</a></td>
</tr>
</table>
</center>
<a name="2.5.15"></a>
<h4>Changes in beta release 2.5.15 (not released yet) <a href="#top">[top]</a></h4>
<a name="2.5.14"></a>
<h4>Changes in beta release 2.5.14 (24-Aug-2005) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> Fvwm now officially supports 64-bit architertures.</li>
  <li> New Test conditions EnvIsSet, EnvMatch, EdgeHasPointer and     EdgeIsActive.</li>
  <li> New window condition FixedPosition.</li>
  <li> New module features:</li>
  <li> FvwmPerl module supports window context when preprocessing.</li>
  <li> FvwmPerl module accepts new --export option that by default     defines two fvwm functions &quot;Eval&quot; and &quot;.&quot;, to be used like:       FvwmPerl -x       Eval $a = $[desk.n] - 2; cmd(&quot;GotoDesk 0 $a&quot;) if $a &gt;= 0