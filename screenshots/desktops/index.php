<?php
//--------------------------------------------------------------------
//-  File          : screenshots/desktops/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Desktop Screenshots";
$link_name      = "Desktops";
$link_picture   = "pictures/icons/screenshots";
$parent_site    = "top";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_desktops";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

<?php 
decoration_window_start("FVWM Screenshots");
include("./screenshot_db.inc");

$total_num_of_screenshots = count($db);
if( ! $show_start = get_user_setting("start", array("GET","POST") ) ) $show_start = 0;
if( ! $show_num   = get_user_setting("num"  , array("GET","POST") ) ) $show_num   = 5;
// correct settings
if( $show_start > $total_num_of_screenshots ) {
    if( $show_num >= $total_num_of_screenshots ) {
        $show_start = 0;
    } else {
        $show_start = $total_num_of_screenshots - $show_num;
    }
}
if( $show_num + $show_start > $total_num_of_screenshots ) {
    $show_num = $total_num_of_screenshots - $show_start;
}
?>

<p>
Total <?php echo $total_num_of_screenshots;?> screenshots available. 
Displaying from shot no. <?php echo $show_start + 1; ?> -
<?php echo $show_start + $show_num; ?>.
</p>

<?php 

if( ! function_exists("my_show_shot") ) {
    function my_show_start() {
        global $theme_object;
        if( ! $bg = $theme_object->style_array["window_border_bg"] ) {
            $bg = "#c0c0c0";
        }
        $td_opts = ' bgcolor="'.$bg.'"'; 
        echo '<table border="0" width="100%" cellspacing="2" cellpadding="5" summary="">';
        echo "<tr>\n";
        echo "<th".$td_opts.">Preview</th>\n";
        echo "<th".$td_opts.">Date/Size</th>\n";
        echo "<th".$td_opts." width=\"99%\">Description</th>\n";
        echo "</tr>\n";
    }
    function my_show_shot($entry=array()) {
        $preview     = $entry["path"]."/".$entry["preview"];
        $screenshot  = $entry["path"]."/".$entry["screenshot"];
        $date        = $entry["date"];
        $size        = $entry["size"];
        $dimension   = $entry["dimension"];
        $description = $entry["description"];
        $adds        = $entry["additions"];
        $td_opts = ''; 
        echo "<tr>\n";
        echo "<td".$td_opts.">";
        echo '<a href="'.$screenshot.'"><img src="'.$preview.'" border="1"></a>';
        echo "</td>";
        echo "<td".$td_opts.' align="center">';
        echo date("y/m/d", $date)."<br>";
        echo ceil($size/1024)."k<br>";
        echo $dimension;
        echo "</td>";
        echo "<td".$td_opts.">";
        echo $description;
        echo "</td>";
        echo "</tr>\n";
    }
    function my_show_end() {
        echo '</table>';
    }
}

my_show_start();
for( $ii=$show_start; $ii<$show_start+$show_num; $ii++) {
    my_show_shot($db[$ii]);
}
my_show_end();

?>

<?php decoration_window_end(); ?>
