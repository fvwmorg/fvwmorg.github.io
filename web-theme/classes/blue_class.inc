<?php
//--------------------------------------------------------------------
//-  File          : blue_class.inc
//-  Project       : FVWM Home page
//--------------------------------------------------------------------

require_once(class_file("base_class.inc"));

class Blue_Theme extends Base_Theme {

    function Blue_Theme() {
        $this->theme_name = "blue";
        $_COOKIE = array();
        $this->init();
    }

    // function returns an array which contains the names of pages which
    // are parents from the current pages like
    // home -> photos -> holiday -> beach
    // it is mostly used to display this path as links
    function get_parent_path($site) {
        // first we should check if the array is consistent
        if( strlen($this->nav_array["$site"]["parent_site"]) < 1 ) {
            // echo "Error in navigation array<br>";
            // the actual site is not in the navigation array
            // we return the first entry of $this->nav_array["top_array"] here
            return $this->nav_array["top_array"][0];
        }
        // check if this site is a parent - if not return the parent
        // of its parent; -)
        if( ! strcmp( $this->nav_array["$site"]["parent_site"], "top") ) {
            if( count($this->nav_array["$site"]["child_sites"]) == 0 )
                return array($site);
            else
                return array($this->nav_array["top_array"][0], $site);
        } else {
            $parent_path = $this->get_parent_path($this->nav_array["$site"]["parent_site"]);
            $parent_path[] = $site;
            return $parent_path;
        }
    }

    // inserts a decoration picture
    function decoration_pic($direction) {
        return $this->style_array["decoration_path"]."/".$direction.".gif";
    }

    // starts a decoration cell which contains a decoration picture
    // like <td><img src="picture">
    // not the cell is opend only and not closed
    function decoration_cell_start($position, $string, $css,
                                   $bg_repeat="repeat", $bg_pos="top",
                                   $td_options="") {}

    function decoration_top_left_cell_start($string="", $css="") {}
    function decoration_top_left_cell($string="", $css="") {}
    function decoration_top_cell_start($string="", $css="") {}
    function decoration_top_cell($string="", $css="") {}
    function decoration_top_right_cell_start($string="", $css="") {}
    function decoration_top_right_cell($string="", $css="") {}
    function decoration_left_cell_start($string="", $css="") {}
    function decoration_left_cell($string="", $css="") {}
    function decoration_middle_cell_start($string="", $css="") {}
    function decoration_middle_cell($string="", $css="") {}
    function decoration_right_cell_start($string="", $css="") {}
    function decoration_right_cell($string="", $css="") {}
    function decoration_bottom_left_cell_start($string="", $css="") {}
    function decoration_bottom_left_cell($string="", $css="") {}
    function decoration_bottom_cell_start($string="", $css="") {}
    function decoration_bottom_cell($string="", $css="") {}
    function decoration_bottom_right_cell_start($string="", $css="") {}
    function decoration_bottom_right_cell($string="", $css="") {}
    function decoration_top_line($string="", $add_css="") {}
    function decoration_middle_line($string="", $add_css="") {}
    function decoration_bottom_line($string="", $add_css="") {}
    function decoration_title_bar($string="") {}
    function decoration_window_start($string="", $width="100%", $height="400", $padding="5") {}
    function decoration_window_end() {}

    //--------------------------------------------------------------------
    // functions to draw a menu navigation in style of a fvwm menu
    // [not used at the moment]
    //--------------------------------------------------------------------

    // inserts one menu line
    function insert_menu_link_line($site, $depth, $selected_path) {
        if( !strcmp($site, $this->this_site) ) {
            $bg = $this->style_array["hilight_bg"];
            $fg = $this->style_array["hilight_fg"];
        } else {
            $bg = $this->style_array["menu_item_bg"];
            $fg = $this->style_array["menu_item_fg"];
        }

        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
        $td_opt = 'valign="middle" nowrap="nowrap" bgcolor="'.$bg.'" style="background-color:'.$bg.'; border:1px '.$fg.' solid;"';
        $td = '<td '.$td_opt.'>';

        echo '<tr>'."\n";

        $max_depth = count($selected_path);
        if( count($this->nav_array["$this->this_site"]["child_sites"]) == 0 ) $max_depth--;

        for( $ii=0; $ii<($depth); $ii++ ) { 
            echo '<td>&nbsp;</td>'; 
        }

        // text
        echo '<td '.$td_opt.' colspan="'.($max_depth-$depth).'">';
        // echo '<td '.$td_opt.' colspan="$max_depth">';
        if( !strcmp($site, $this->this_site) ) {
            echo '<a href="'.$target.'" style="color:'.$fg.';" class="menu">';
        } else {
            echo '<a href="'.$target.'" style="color:'.$fg.';" class="menu">';
        }
        // echo '<font color="'.$fg.'">';
            $short_name = $this->nav_array["$site"]["short_name"] ? $this->nav_array["$site"]["short_name"] : $this->nav_array["$site"]["link_name"];
        echo $short_name.' ';
        // echo '</font>';
        echo '</a></td>'."\n";

        // for( $ii=0; $ii<($max_depth-$depth); $ii++ ) { echo "<td>&nbsp;</td>"; }

        echo '</tr>'."\n";
    }

    function insert_menu_link_list($link_array, $depth, $selected_path) {
        // echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            // echo "$site<br>";
            if( ! isset($this->nav_array["$site"]) ) {
                // the navigation structure seems to be invalid
                echo "Problem with $site<br>";
            } else {
                // insert this
                $this->insert_menu_link_line($site, $depth, $selected_path);
                // echo count($this->nav_array["$site"]["child_sites"]).$site."-".$selected_path[$depth+1]."<br>";
                if( count($this->nav_array["$site"]["child_sites"])> 0 && 
                    ! strcmp($site, $selected_path[$depth+1]) ) {
                    $this->insert_menu_link_list($this->nav_array["$site"]["child_sites"], 
                                                 $depth+1, 
                                                 $selected_path);
                }
            }
        }
    }

    function insert_menu_navigation() {
        echo '<table cellpadding="4" cellspacing="3" border="0" summary="" width="100%">'."\n";
        $this->insert_menu_link_list($this->nav_array["top_array"], 0, $this->get_parent_path($this->this_site));
        echo '</table>';
    }

    //--------------------------------------------------------------------
    // function to insert the navigation path
    // [not used at the moment]
    //--------------------------------------------------------------------
    function insert_navigation_path_entry($site) {
        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
        //   echo '<td>';
        //   echo '<table border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
        //   $this->decoration_top_line();
        //   $this->decoration_left_cell();
        echo '<td bgcolor="'.$this->style_array["windowlist_bg"].'">';
        echo '<a href="'.$target.'">';
        echo '<font size="2" color="'.$this->style_array["windowlist_fg"].'">';
        echo $this->nav_array["$site"]["link_name"];
        echo '</font>';
        echo '</a>';
        echo '</td>'."\n";
        //   $this->decoration_right_cell();
        //   $this->decoration_bottom_line();
        //   echo '</table>';
        //   echo '</td>';
    }

    // navigation path wrapper
    function insert_navigation_path() {
        if( ! strcmp($this->nav_array["top_array"][0], $this->this_site) ) return;
        //   $this->push_decoration_path("decorations/border_grey_flat");
        //
        //   echo '<table border="1" cellspacing="0" cellpadding="3" frame="void" summary="">'."\n";
        //   echo "<tr>\n";
        $parent_path = $this->get_parent_path($this->this_site);
        //   $this->insert_navigation_path_entry($this->nav_array["top_array"][0]);
        reset($parent_path);
        while(list($key, $site) = each($parent_path) ) {
            echo " &gt;&gt; ".$site;
            // $this->insert_navigation_path_entry($site);
        }
        //   echo '</tr>';
        //   echo '</table>';
        //   $this->pop_decoration_path();

    }

    //--------------------------------------------------------------------
    // interface function to insert valid links to sub pages
    //--------------------------------------------------------------------
    function insert_quick_jump_list($quick_jump_array, $col_num = 2, $width = "60%") {
        // check which sites exist
        reset($quick_jump_array);
        while(list($key, $jump) = each($quick_jump_array) ) {
            if( ! is_array($jump) ) {
                // check it this site exists
                if( strlen($this->nav_array["$jump"]["file"]) == 0 ) {
                    // if the site does not exists remove from quick jump list
                    unset($quick_jump_array[$key]);
                }
            }
        }

        $is_special = 1;
        if ($col_num < 0) {
            $col_num *= -1;
            $is_special = 0;
        }
        $cell_width = floor(100/$col_num);

        reset($quick_jump_array);
        $count = count($quick_jump_array);
        echo '<center><table align="center" ';
        if (strlen($width) > 0) echo 'width="'.$width.'" ';
        echo 'border="0" cellpadding="5" cellspacing="0" summary="" style="padding-left:10%; ">'."\n";
        for($ii=0; $ii<ceil($count/$col_num); $ii++) {
            echo "<tr>\n";
            for($jj=0; $jj<$col_num; $jj++) {
                $real_cell_width = $cell_width;
                if ($is_special) {
                    if ($jj == 0) $real_cell_width += 25;
                    if ($jj == $col_num - 1) $real_cell_width -= 25;
                }

                if( list($key, $jump) = each($quick_jump_array) ) {
                    if( ! is_array($jump) ) {
                        if( file_exists($this->rel_path.'/'.$this->nav_array["$jump"]["link_pic"]."_mini.gif") ) {
                            $img = $this->rel_path.'/'.$this->nav_array["$jump"]["link_pic"]."_mini.gif";
                        } else {
                            $img = $this->rel_path.'/pictures/icons/default_mini.gif';
                        }
                        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$jump"]["file"]);
                        // mini icon and text
                        echo '<td align="left" valign="bottom" nowrap="nowrap" width="'.$real_cell_width.'%">';
                        echo '<img src="'.$this->rel_path.'/pictures/item_dot_blue.gif" border="0" alt="*" hspace="0" vspace="4" align="top"> ';
                        echo '<a href="'.$target.'">';
                        //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
                        echo $this->nav_array["$jump"]["link_name"];
                        echo '</a>';
                        echo '</td>'."\n";
                    }
                    // links outside of this domain
                    else {
                        if( file_exists($this->rel_path.'/pictures/icons/'.$jump[2]."_mini.gif") ) {
                            $img = $this->rel_path.'/pictures/icons/'.$jump[2]."_mini.gif";
                        } else {
                            $img = $this->rel_path.'/pictures/icons/default_mini.gif';
                        }
                        // mini icon and text
                        echo '<td align="left" valign="bottom" nowrap="nowrap">';
                        echo '<img src="'.$this->rel_path.'/pictures/item_dot_blue.gif" border="0" alt="*" hspace="0" vspace="4" align="top"> ';
                        echo '<a href="'.$jump[1].'">';
                        //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
                        echo $jump[0];
                        echo '</a>';
                        echo '</td>'."\n";
                    }
                }
            }
            echo "</tr>\n";
        }
        echo "</table></center>\n";
    }

    function insert_css_definitions() {
        return;  
    }

}

?>

