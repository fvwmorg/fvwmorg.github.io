<?php
//--------------------------------------------------------------------
//-  File          : default_class.inc
//-  Project       : FVWM Home page
//--------------------------------------------------------------------

require_once(class_file("base_class.inc"));

class Default_Theme extends Base_Theme {

    // member variables
    var $rel_path;
    var $style_array;
    var $nav_array;
    var $user_settings_array;
    var $decoration_path_stack;
    var $requested_file;
    var $this_site;
    var $navigation_file;

    function Default_Theme() {
        $this->init();
    }

    function init() {
        // set member variables from the environment
        $this->globals2internals();

        // set navigation array and top array
        include(sec_filename($this->navigation_file));

        $this->style_array = array(
            "theme"            => "default",
            "decoration_path"  => $this->rel_path."/pictures/decorations/window_deco_simple_steelblue",
            "window_border_bg" => "#c5cecd",
            "window_border_fg" => "#ffffff",
            "window_bg"        => "#003c3c",
            "window_fg"        => "#ffffff",
            "body_bg"          => "#000000",
            "body_fg"          => "#ffffff",
            "body_bg_image"    => $this->rel_path."/pictures/backgrounds/default_small.jpg",
            "menu_bg"          => "#c5cecd",
            "menu_fg"          => "#000000",
            "windowlist_bg"    => "#c5cecd",
            "windowlist_fg"    => "#000000",
            "pager_bg"         => "#fafaf8",
            "pager_fg"         => "#000000",
            "hilight_bg"       => "#1a6e99",
            "hilight_fg"       => "#ffffff",
            "layout"           => ""
            );
        $this->decoration_path_stack = array();
    }

    function globals2internals() {
        global $navigation_file, $requested_file, $rel_path, $this_site;
        if( strlen($navigation_file) < 1 )
            die("<span class=\"error\">No navigation file specified</span><br>");
        $this->navigation_file = $navigation_file;
        $this->requested_file  = $requested_file;
        $this->rel_path        = $rel_path;
        $this->this_site       = $this_site;
    }

    function set_user_settings() {
        $this->user_settings_array = array();
        foreach( $this->style_array as $key => $default ) {
            if( $setting = my_get_global($key, "GET") ) {
                $this->user_settings_array[$key] = str_replace("#", "%23", $setting);
            }
        }
    }


    // time stampt function to insert a statement on the site when the
    // viewing pages was changed
    function insert_timestamp($file) {
        if( file_exists($file) ) {
            echo 'Last modified on '.date('F d, Y', fileatime("$file"));
        }
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
            if( ! strcmp($site, $this->nav_array["top_array"][0]) ||
                count($this->nav_array["$site"]["child_sites"]) == 0 )
                return array($site);
            else
                return array($this->nav_array["top_array"][0], $site);
        } else {
            $parent_path = $this->get_parent_path($this->nav_array["$site"]["parent_site"]);
            $parent_path[] = $site;
            return $parent_path;
        }
    }

    // this function is used to have all link targets in the same format
    // and do some conversions here. for exampe one may convert php to
    // html here to get a html tree of this web project
    function conv_link_target($target) {

        if( count($this->user_settings_array) > 0 ) {
            reset($this->user_settings_array);
            list($key, $setting) = each($this->user_settings_array);
            $opts = "?".$key."=".$setting;
            while( list($key, $setting) = each($this->user_settings_array) ) {
                $opts = $opts."&".$key."=".$setting;
            }
        }
        // strip index.php to make link nicer
        // uwp: this discards some work navgen does and can lead to
        //      inconsitence in link description and link target
        //      currently links in the new page link to old html versions
        // migo: /index.php is bad for external urls/bookmarks. Suppose the old
        //   urls would be http://fvwm.org/index.html, everyone would get 404.
        //   I want to give an url /documentation/perllib/ and be sure
        //   it will be correct even if we move to index.cgi or no index at all
        //   (autogenerated listing from a server) in 2 years.

        // temporarily disabled until this is the only existing web design
        //$target = str_replace("index.php", "", $target);
        return $target.$opts;
    }

    // pushes the actual decoration path to a stack and set the given
    // argument as decoration path. this function is used to have
    // different window decorations on the same page
    function push_decoration_path($path) {
        $this->decoration_path_stack[] = $this->style_array["decoration_path"];
        $this->style_array["decoration_path"] = $this->rel_path."/".$path;
    }

    // pops the last value from the stack and sets it to the actual
    // decoration path. this function is used to have different window
    // decorations on the same page
    function pop_decoration_path() {
        if( count($this->decoration_path_stack) == 0 ) return;
        end($this->decoration_path_stack);
        list($key, $value) = each($this->decoration_path_stack);
        $this->style_array["decoration_path"] = $this->decoration_path_stack[$key];
        unset($this->decoration_path_stack[$key]);
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
                                   $td_options="") {
        $def_file = $this->style_array["decoration_path"]."/deco_definitions.inc";
        if( file_exists($def_file) ) include(sec_filename($def_file));
        $dimension = "";
        if( isset($border_width) ) $dimension=$dimension.'width="'.$border_width.'" ';
        if( isset($border_height) ) $dimension=$dimension.'height="'.$border_height.'"';
        $pic=$this->decoration_pic($position);
        echo '<td '.$td_options;
        if( strlen($bg_color) > 0 )
            echo ' bgcolor="'.$bg_color.'"';
        else
            echo ' bgcolor="'.$this->style_array["window_border_bg"].'"';
        echo ' style="background-image:url('.$pic.'); ';
        echo 'background-repeat:'.$bg_repeat.'; ';
        echo 'background-position:'.$bg_pos.'; '.$css.'"';
        if( ereg("(left)|(right)", "$position") ) echo ' width="1"';
        echo '>'.$string;
        echo '<img src="'.$this->decoration_pic("transparent").'" ';
        echo 'border="0" vspace="0" hspace="0" '.$dimension.' alt="">';
    }

    //--------------------------------------------------------------------
    // the next functions provide start and complete decoration cell
    // interfaces.
    //--------------------------------------------------------------------
    function decoration_top_left_cell_start($string="", $css="") {
        $this->decoration_cell_start("top_left", $string, $css, "no-repeat");
    }
    function decoration_top_left_cell($string="", $css="") {
        $this->decoration_top_left_cell_start($string, $css, "repeat-x", "bottom");
        echo  '</td>'."\n";
    }

    function decoration_top_cell_start($string="", $css="") {
        $this->decoration_cell_start("top", $string, $css, "repeat-x");
    }
    function decoration_top_cell($string="", $css="") {
        $this->decoration_top_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_top_right_cell_start($string="", $css="") {
        $this->decoration_cell_start("top_right", $string, $css, "no-repeat");
    }
    function decoration_top_right_cell($string="", $css="") {
        $this->decoration_top_right_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_left_cell_start($string="", $css="") {
        $this->decoration_cell_start("left", $string, $css, "repeat-y", "left", "align=\"left\"");
    }
    function decoration_left_cell($string="", $css="") {
        $this->decoration_left_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_middle_cell_start($string="", $css="") {
        $this->decoration_cell_start("middle", $string, $css);
    }
    function decoration_middle_cell($string="", $css="") {
        $this->decoration_middle_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_right_cell_start($string="", $css="") {
        $this->decoration_cell_start("right", $string, $css, "repeat-y");
    }
    function decoration_right_cell($string="", $css="") {
        $this->decoration_right_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_bottom_left_cell_start($string="", $css="") {
        $this->decoration_cell_start("bottom_left", $string, $css);
    }
    function decoration_bottom_left_cell($string="", $css="") {
        $this->decoration_bottom_left_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_bottom_cell_start($string="", $css="") {
        $this->decoration_cell_start("bottom", $string, $css, "repeat-x");
    }
    function decoration_bottom_cell($string="", $css="") {
        $this->decoration_bottom_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    function decoration_bottom_right_cell_start($string="", $css="") {
        $this->decoration_cell_start("bottom_right", $string, $css);
    }
    function decoration_bottom_right_cell($string="", $css="") {
        $this->decoration_bottom_right_cell_start($string, $css);
        echo  '</td>'."\n";
    }

    // inserts a whole decoration line which contains a table row which 3
    // cells each of them with one picture
    function decoration_top_line($string="", $add_css="") {
        echo "<tr>\n";
        $this->decoration_top_left_cell();
        $this->decoration_top_cell($string, $add_css);
        $this->decoration_top_right_cell();
        echo "</tr>\n";
    }

    // inserts a whole decoration line which contains a table row which 3
    // cells each of them with one picture
    function decoration_middle_line($string="", $add_css="") {
        echo "<tr>\n";
        $this->decoration_left_cell();
        $this->decoration_middle_cell($string, $add_css);
        $this->decoration_right_cell();
        echo "</tr>\n";
    }

    // inserts a whole decoration line which contains a table row which 3
    // cells each of them with one picture
    function decoration_bottom_line($string="", $add_css="") {
        echo "<tr>\n";
        $this->decoration_bottom_left_cell();
        $this->decoration_bottom_cell($string, $add_css);
        $this->decoration_bottom_right_cell();
        echo "</tr>\n";
    }

    // inserts a table row <tr>... </tr> which contains the window
    // buttons like the window decoration of a window manager
    function decoration_title_bar($string="") {
        $def_file = $this->style_array["decoration_path"]."/deco_definitions.inc";
        if( file_exists($def_file) ) include(sec_filename($def_file));
        if( isset($title_height) ) $dimension='width="'.$title_height.'" height="'.$title_height.'"';
        if( file_exists($this->decoration_pic("button_1"))) {
            echo '<tr>'."\n";
            $this->decoration_left_cell();
            echo '<td>';
            if( strlen($title_background) == 0 ) $title_background=$this->style_array["hilight_bg"];
            echo '<table border="0" cellspacing="0" cellpadding="0" summary="" width="100%" bgcolor="'.$title_background.'">'."\n";
            echo '<tr>'."\n";
            // $td_opts = 'width="1"';
            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_1").'); ">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_3").'); " >';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td style="background-image:url('.$this->decoration_pic("title").'); "';
            echo ' width="99%" bgcolor="'.$title_background.'">';
            if( strlen($string) > 0 )
                echo '<font size="3" color="'.$this->style_array["hilight_fg"].'">&nbsp;'.$string.'</font></td>'."\n";
            else
                echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_6").'); ">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_4").'); ">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_2").'); ">';
            echo '<a href="./'.$this->requested_file.'?theme=plain" class="nohilight">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt="plain theme" title="plain theme"></a></td>';

            echo '</tr>'."\n";
            echo '</table>'."\n";
            echo '</td>';
            $this->decoration_right_cell();
            echo '</tr>'."\n";
        }
    }

    // inserts the upper and left corner of the window decoration
    function decoration_window_start($string="", $width="100%", $height="400", $padding="5") {
        echo '<table';
        if(strlen($width)> 0) echo ' width="'.$width.'"';
        echo ' border="0" cellpadding="0" cellspacing="0" summary="" class="decorated">'."\n";
        $this->decoration_top_line();
        $this->decoration_title_bar($string);
        echo '<tr>'."\n";
        $this->decoration_left_cell();
        echo '<td bgcolor="'.$this->style_array["window_bg"].'">';
        echo '<table';
        if(strlen($padding)> 0) echo ' cellpadding="'.$padding.'"';
        echo ' summary="" width="100%">'."\n";
        echo '<tr>'."\n";
        echo '<td valign="top" align="left" bgcolor="'.$this->style_array["window_bg"].'"';
        if(strlen($height)> 0) echo ' height="'.$height.'"';
        echo ' class="windowcontents">';
    }

    // insert the right and lower corner of the window decoration
    function decoration_window_end() {
        echo '</td>'."\n";
        echo '</tr>'."\n";
        echo '</table>'."\n";
        echo '</td>'."\n";
        $this->decoration_right_cell();
        echo '</tr>'."\n";
        $this->decoration_bottom_line();
        echo '</table>'."\n";
        echo "<br>";
    }

    //--------------------------------------------------------------------
    // functions to draw a menu navigation in style of a fvwm menu
    // [not used at the moment]
    //--------------------------------------------------------------------

    // inserts one menu line
    function insert_menu_link_line($site, $depth, $selected_path) {
        if( !strcmp($site, $this->this_site) ) {
            $bg = $this->style_array["hilight_bg"];
            $fg = $this->style_array["hilight_fg"];
            $triangle = $this->rel_path.'/pictures/fvwm_menu_triangle.gif';
        } else {
            $bg = $this->style_array["menu_bg"];
            $fg = $this->style_array["menu_fg"];
            $triangle = $this->rel_path.'/pictures/fvwm_menu_triangle.gif';
        }

        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
        $td_opt = 'valign="middle" nowrap="nowrap" bgcolor="'.$bg.'" style="background-color:'.$bg.'; "';
        $td = '<td '.$td_opt.'>';

        echo '<tr>'."\n";

        $max_depth = count($selected_path);
        if( count($this->nav_array["$this->this_site"]["child_sites"]) == 0 ) $max_depth--;

        // echo $td.$depth." ".$max_depth."</td>";

        for( $ii=0; $ii<($depth); $ii++ ) {
            echo $td."&nbsp;";
            // echo '<img src="'.$this->rel_path.'/pictures/icons/';
            // if( $ii < ($depth-1) ) echo 'in';
            // echo 'direct_subitem_mini.gif" border="0" alt="" hspace="0" vspace="0">';
            echo "</td>";
        }

        // mini icon
        echo $td;
        echo '<a href="'.$target.'">';
        echo '<img src="'.$this->rel_path.'/'.$this->nav_array["$site"]["link_pic"];
        echo '_mini.gif" border="0" alt="" hspace="0" vspace="0"></a>';
        echo '</td>'."\n";

        // text
        echo '<td '.$td_opt.' colspan="'.($max_depth-$depth+1).'">';
        echo '<a href="'.$target.'">';
        echo '<font size="+0" color="'.$fg.'"><b>';
        echo $this->nav_array["$site"]["link_name"].'</b></font></a></td>'."\n";

        // triangle
        echo $td.'<a href="'.$target.'">';
        echo '<img src="'.$triangle.'" border="0" hspace="2" vspace="2" alt=""></a></td>'."\n";

        // $this->decoration_right_cell();
        echo '</tr>'."\n";
    }

    function insert_menu_link_list($link_array, $depth, $selected_path) {
        //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            // echo "$site<br>";
            if( ! isset($this->nav_array["$site"]) ) {
                // the navigation structure seems to be invalid
                echo "Problem with $site<br>";
            } else {
                // insert this
                $this->insert_menu_link_line($site, $depth, $selected_path);
                if( count($this->nav_array["$site"]["child_sites"])> 0 && ! strcmp($site, $selected_path[$depth]) ) {
                    $this->insert_menu_link_list($this->nav_array["$site"]["child_sites"], $depth+1, $selected_path);
                }
            }
        }
    }

    function insert_menu_navigation() {
        $this->push_decoration_path("pictures/decorations/border_grey_flat");
        echo '<table border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
        $this->decoration_top_line();
        echo "<tr>\n";
        $this->decoration_left_cell();
        echo "<td>";
        echo '<table bgcolor="'.$this->style_array["menu_bg"].'" cellpadding="3" cellspacing="0" border="0" summary="">'."\n";
        $this->insert_menu_link_list($this->nav_array["top_array"], 0, $this->get_parent_path($this->this_site));
        echo '</table>';
        echo "</td>\n";
        $this->decoration_right_cell();
        echo '</tr>'."\n";
        $this->decoration_bottom_line();
        $this->pop_decoration_path();
        echo '</table>'."\n";
    }

    //--------------------------------------------------------------------
    // functions to insert a pager navigation in style of a fvwm pager
    //--------------------------------------------------------------------

    // inserts a table cell <td>..</td> which contains one pager page
    function insert_pager_page($site, $do_hilight=1) {
        // echo "\n\n<!-- $site $this->this_site -->\n\n";
        if( !strcmp($site, $this->this_site) && $do_hilight && strlen($site) > 0 ) {
            $bg = $this->style_array["hilight_bg"];
            $fg = $this->style_array["hilight_fg"];
        } else {
            $bg = $this->style_array["pager_bg"];
            $fg = $this->style_array["pager_fg"];
        }
        $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" class="pager"';

        if( strlen($site) == 0 ) {
            echo '<td '.$td_opt.'>';
            echo '<img src="'.$this->rel_path.'/pictures/icons/pager_empty.gif"';
            echo ' border="0" alt="" hspace="0" vspace="0">';
            echo '</td>';
            return;
        }

        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);

        if( file_exists($this->rel_path.'/'.$this->nav_array["$site"]["link_pic"]."_pager.gif") ) {
            $img = $this->rel_path.'/'.$this->nav_array["$site"]["link_pic"]."_pager.gif";
        } else {
            $img = $this->rel_path.'/pictures/icons/default_pager.gif';
        }

        echo '<td '.$td_opt.'>';
        echo '<a href="'.$target.'" class="nohilight">';
        echo '<img src="'.$img.'" border="0" alt="'.$this->nav_array["$site"]["link_name"].'"';
        echo ' width="24" height="22"';
        echo ' title="'.$this->nav_array["$site"]["link_name"].'" hspace="0" vspace="0"></a>';
        echo '</td>'."\n";

    }

    // inserts a 2x desk containing the sub sites
    function insert_pager_desk($site, $pages_per_desk=4) {
        $bg = $this->style_array["pager_bg"];
        $fg = $this->style_array["pager_fg"];

        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
        $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" class="pager"';

        // desk label = link name
        $desk_name = $this->nav_array["$site"]["link_name"];
        // shorten string if needed
        $max_desk_name_len = 13;
        $desk_name = substr($desk_name, 0, $max_desk_name_len);
        echo '<tr>'."\n";
        echo '<td '.$td_opt.' colspan="2">';
        echo '<a href="'.$target.'" style="font-weight:normal; " class="nohilight">';
        echo '<font size="2" color="'.$fg.'">'.$desk_name.'</font></a>';
        echo '</td>'."\n";
        echo '</tr>'."\n";

        // page 0 0 - the site itself
        echo '<tr>'."\n";
        $this->insert_pager_page($site);
        // first subsite
        $child_sites = $this->nav_array["$site"]["child_sites"];
        $this->insert_pager_page($child_sites[0]);
        echo '</tr>'."\n";

        for( $ii=1; $ii<$pages_per_desk-1; $ii=$ii+2) {
            echo '<tr>'."\n";
            // second subsite
            $this->insert_pager_page($child_sites[$ii]);
            // third subsite
            $this->insert_pager_page($child_sites[$ii+1]);
            echo '</tr>'."\n";
        }
    }

    // pre function to build the pager
    function insert_pager_link_list($link_array, $pages_per_desk=4) {
        $is_first = 1;
        //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            if( $is_first == 1 )
                $is_first = 0;
            else {
                echo '<tr><td colspan="2" class="pagerwrap">';
                echo '<img src="'.$this->decoration_pic("transparent").'" width="1" height="1" alt="">';
                echo '</td></tr>';
            }
            $this->insert_pager_desk($site, $pages_per_desk);
        }
    }

    // pager wrapper function
    function insert_pager_navigation() {
        $pages_per_desk = 4;
        // table for the border
        echo '<table width="100" border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
        $this->decoration_top_line();
        echo "<tr>\n";
        $this->decoration_left_cell();
        echo '<td bgcolor="'.$this->style_array["pager_fg"].'" width="80" class="pagerwrap">';
        // table for the pages
        echo '<table cellpadding="1" cellspacing="1" border="0" width="100%" summary="">'."\n";
        $parent_path = $this->get_parent_path($this->this_site);
        $count = count($parent_path);
        $parent_site = $this->nav_array["$this->this_site"]["parent_site"];

        // check if we are on a top site which has no child sites
        if( $count < 2 || ( ! strcmp($this->nav_array["$parent_site"]["parent_site"], "top")  &&
                            count($this->nav_array["$this->this_site"]["child_sites"]) == 0 &&
                            count($this->nav_array["$parent_site"]["child_sites"]) <= $pages_per_desk - 1 )
            || ( $count == 2 &&
                 count($this->nav_array["$this->this_site"]["child_sites"]) <= $pages_per_desk - 1)) {
            $navigation_array = $this->nav_array["top_array"];
        } else {
            // merge $parent_path and $actual_sub_sites
            $navigation_array = array();
            reset($parent_path);
            while( list($key, $site) = each($parent_path) ) $navigation_array[] = $site;
            // check if there are further sub sites
            if( count($this->nav_array["$this->this_site"]["child_sites"]) > 0 ) {
                $sub_sites = $this->nav_array["$this->this_site"]["child_sites"];
            } else {
                // if the actual site has not childs use the childs of the
                // parent as sub sites
                $parent_site = $this->nav_array["$this->this_site"]["parent_site"];
                $sub_sites   = $this->nav_array["$parent_site"]["child_sites"];
                // the actual site is in the parent path - since it is a child of
                // its parent it is remove from the $navigation_array to not appear
                // twice
                end($navigation_array);
                unset($navigation_array[key($navigation_array)]);
            }
            if( $pages_per_desk < count($sub_sites) + 1 )
                $pages_per_desk = count($sub_sites) + 1;
            // append sub sites or sub sites of the parent to the navigation_array
            // reset($sub_sites);
            // while( list($key, $site) = each($sub_sites) ) {
            // $navigation_array[] = $site;
            // }
        }
        $this->insert_pager_link_list($navigation_array, $pages_per_desk);
        echo '</table>';
        echo "</td>\n";
        $this->decoration_right_cell();
        echo '</tr>'."\n";
        $this->decoration_bottom_line();
        echo '</table>'."\n";
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

        $cell_width = floor(100/$col_num);

        reset($quick_jump_array);
        $count = count($quick_jump_array);
        // uwp: I am not sure if I added the align="center" attribute.
        //      I don't like it that much since it is not strict html.
        //      If somebody else did it and like it please uncomment it.
        // migo: I like it centered. :)
        echo '<table align="center" ';
        //echo '<table ';
        if (strlen($width) > 0) echo 'width="'.$width.'" ';
        echo 'border="0" cellpadding="5" cellspacing="0" summary="" style="padding-left:10%; ">'."\n";
        for($ii=0; $ii<ceil($count/$col_num); $ii++) {
            echo "<tr>\n";
            for($jj=0; $jj<$col_num; $jj++) {
                if( list($key, $jump) = each($quick_jump_array) ) {
                    if( ! is_array($jump) ) {
                        if( file_exists($this->rel_path.'/'.$this->nav_array["$jump"]["link_pic"]."_mini.gif") ) {
                            $img = $this->rel_path.'/'.$this->nav_array["$jump"]["link_pic"]."_mini.gif";
                        } else {
                            $img = $this->rel_path.'/pictures/icons/default_mini.gif';
                        }
                        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$jump"]["file"]);
                        // mini icon and text
                        echo '<td align="left" valign="bottom" nowrap="nowrap" width="'.$cell_width.'%">';
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
        echo "</table>\n";
    }

}

?>

