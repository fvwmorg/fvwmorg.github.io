<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path."/definitions.inc");

$theme = "plain";
$theme_file = theme_file($theme."_theme.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Voting Page";
$heading        = "FVWM - Logo Competition - Voting Page";
$link_name      = "Logo Competition Voting Page";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($theme_file));
	exit();
}
?>

<script language="JavaScript">
function change_bg_color(color) {
    document.bgColor = color;
    document.body.style.backgroundColor = color;
}
</script>

<map name="colormap">
  <area shape="rect" coords="0,0,19,19"  href="javascript:change_bg_color('#ffffff');" alt="white background">
  <area shape="rect" coords="20,0,39,19" href="javascript:change_bg_color('#d0d0d0');" alt="white background">
  <area shape="rect" coords="40,0,59,19" href="javascript:change_bg_color('#808080');" alt="white background">
  <area shape="rect" coords="60,0,79,19" href="javascript:change_bg_color('#505050');" alt="white background">
  <area shape="rect" coords="80,0,99,19" href="javascript:change_bg_color('#000000');" alt="white background">
</map>


<h1><blink>This is a draft page!!! Voting is not possible yet</blink></h1>

<?php 

if( ! function_exists("insert_color_list") ) {
    function insert_color_list() {
        echo 'Change background color:&nbsp;<img src="colors.gif" align="middle" border="1" usemap="#colormap">';
    }
}

decoration_window_start("FVWM Logo Competition Voting Page", "100%", "");
?>


<p>
Using this web site you can vote for logos taking part on the fvwm logo competition.
</p>


<h3>Voting rules</h3>
<p>
You can vote for one or more logos. To vote for a logo or a logo group check the box left beside the logo. 
</p>

<form action="index.php">
<?php
//--------------------------------------------------------------------
//- insert logos 
//--------------------------------------------------------------------
$logo_list = "logo_list.inc";

$logo_array = array();
include(sec_filename($logo_list));

foreach( $logo_array as $number => $logos ) {
    echo '<input type="checkbox" name="logo'.$number.'" value="1">&nbsp;Vote&nbsp;&nbsp;';
    foreach( $logos as $logo ) {
        $logo_preview = preg_replace('/...$/', "png", $logo);
        echo '<a href="../'.dirname($logo).'" target="newwindow">';
        echo '<img src="previews/'.$logo_preview.'" border="0" align="middle">';
        echo '</a>';
    }
    echo "<br>\n";
    insert_color_list();
    echo '<hr size="1" width="100%" noshade>'."\n";
}
?>

</form>


<?php decoration_window_end();?>


