<?php
//--------------------------------------------------------------------
//-  File          : fvwm-web/screenshots/classes/window_decor_page.inc
//-  Project       : FVWM Homepage
//-  Date          : Mon Apr  5 20:44:09 2004
//-  Author        : Uwe Pross
//--------------------------------------------------------------------

include_once("picture_page.inc");

class Window_Decor_Page extends Picture_Page {

    function Window_Decor_Page( $singular="screenshot", $plural="screenshots", $start=0, $num=5, $max=10, $theme="", $user_theme=0) {
        Picture_Page::Picture_Page($singular, $plural, $start, $num, $max, $theme, $user_theme);
    }

    function show_start($fg="#ffffff", $bg="#777777") {
        $this->insert_navigation();
        if( ! $bg ) $bg = "#777777";
        if( ! $fg ) $fg = "#ffffff";
        $td_opts = ' nowrap style="color:'.$fg.'; background-color:'.$bg.'; "';
        echo '<table border="0" width="100%" cellspacing="1" cellpadding="5" summary="">';
    }

    function show_entry($entry=array()) {
        if( ! $entry["screenshot"] || ! $entry["preview"] ) {
            return;
        }
        $preview     = $entry["path"]."/".$entry["preview"];
        $screenshot  = $entry["path"]."/".$entry["screenshot"];
        $date        = $entry["date"];
        $size        = $entry["size"];
        $dimension   = $entry["dimension"];
        $description = $entry["description"];
        $fvwmrc      = $entry["rc"]["name"];
        $td_opts = '';

        if( $this->link_target_is_directory ) {
            $link_target = $entry["path"];
        } else {
            $link_target = $screenshot;
        }
        echo '<tr>'."\n";
        echo "<td".$td_opts.' valign="middle" align="left" class="showpageprev" colspan="2">';
        mylink($link_target, '<img src="'.$preview.'" border="1" alt="Preview">');
        // echo '<a href="'.$link_target.'"><img src="'.$preview.'" border="1" alt="Preview"></a>';
        echo "</td>";
        echo '</tr>'."\n";
        echo '<tr>'."\n";
        echo "<td".$td_opts.' align="center" class="showpageprop" nowrap>';
        echo date("y/m/d", $date);
        // echo ceil($size/1024)."k<br>";
        // echo $dimension;
        if( $fvwmrc ) {
            echo '<br><a href="'.$entry["path"]."/".$fvwmrc.'">config</a>';
        }
        echo "</td>";
        echo '<td'.$td_opts.' class="showpagedesc" width="99%">';
        $description = str_replace("@fvwm2rc@", '<a href="'.$entry["path"]."/".$fvwmrc.'">fvwm2rc</a>', $description);
        $description = str_replace("@path@", $entry["path"], $description);
        echo $description;
        echo "</td>";
        echo "</tr>\n";
        echo "<tr><td></td></tr>\n";
    }


}

?>
