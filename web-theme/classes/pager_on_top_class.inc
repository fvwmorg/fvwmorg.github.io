<?php
//--------------------------------------------------------------------
//-  File          : pager_on_top_class.inc
//-  Project       : FVWM Home page
//--------------------------------------------------------------------

require_once(class_file("default_class.inc"));

class Pager_On_Top_Theme extends Default_Theme {
    
    function Pager_On_Top_Theme () {
        $this->theme_name = "pager_on_top";
        $this->init();
    }

    // inserts a table row <tr>... </tr> which contains the window
    // buttons like the window decoration of a window manager
    function decoration_title_bar_back($string="") {
        $def_file = $this->style_array["decoration_path"]."/deco_definitions.inc";
        if( file_exists($def_file) ) include(sec_filename($def_file));
        if( isset($title_height) ) {
            $dimension      ='width="'.$title_height.'" height="'.$title_height.'"';
            $dimension_deco ='width="'.($title_height*2).'" height="'.$title_height.'"';
        }
        if( file_exists($this->decoration_pic("button_1"))) {
            echo '<tr>'."\n";
            $this->decoration_left_cell();
            echo '<td>';
//            if( strlen($title_background) == 0 ) $title_background=$this->style_array["hilight_bg"];
            if (strlen($title_background) == 0) $title_background = "#65abca";
            echo '<table border="0" cellspacing="0" cellpadding="0" summary="" width="100%" bgcolor="'.$title_background.'">'."\n";
            echo '<tr>'."\n";
            $td_opts = 'width="1"';
            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_1").'); ">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td width="99%" style="background-image:url('.$this->decoration_pic("title").'); "';
            echo ' align="center" nowrap bgcolor="'.$title_background.'">';
            if( strlen($string) > 0 )
                echo '<b><font size="3" color="'.$this->style_array["window_border_fg"].'">&nbsp;'.$string.'</font></b></td>'."\n";
            else
                echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt=""></td>'."\n";

            echo '<td '.$td_opts.' style="background-image:url('.$this->decoration_pic("button_2").'); ">';
            echo '<a href="./'.$this->requested_file.'?theme=default" class="nohilight">';
            echo '<img src="'.$this->decoration_pic("transparent").'" border="0" '.$dimension.' alt="plain theme" title="window theme"></a></td>';

            echo '</tr>'."\n";
            echo '</table>'."\n";
            echo '</td>';
            $this->decoration_right_cell();
            echo '</tr>'."\n";
        }
    }

    function decoration_window_start($string="", $width="100%", $height="400", $padding="5") {
        // echo "<h2>".$string."</h2>";
    }

    function decoration_window_end() {}

    function insert_heading() {
        global $heading;
        $width = "100%";
        $padding = "5";
        Default_Theme::decoration_window_start("Official FVWM Home Page","100%","","5"); 
        echo "<center><h1> $heading </h1></center>\n";
        Default_Theme::decoration_window_end();
    }

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
        $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" width="40" class="pager"';

        if( strlen($site) == 0 ) {
            echo '<td '.$td_opt.'>';
            echo '<img src="'.$this->rel_path.'/pictures/icons/pager_empty.gif"';
            echo ' border="0" alt="" hspace="0" vspace="0">';
            echo '</td>';
            return;
        }

        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);

        if( file_exists($this->rel_path.'/'.$this->nav_array["$site"]["link_picture"]."_pager.gif") ) {
            $img = $this->rel_path.'/'.$this->nav_array["$site"]["link_picture"]."_pager.gif";
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

    function insert_pager_desk($site, $pages_per_desk=4) {
        $bg = $this->style_array["pager_bg"];
        $fg = $this->style_array["pager_fg"];
        
        $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
        $td_opt = 'valign="middle" align="center" nowrap="nowrap" bgcolor="'.$bg.'" class="pager"';
        
        // correct pages per desk
        $pages_per_desk += $pages_per_desk%2;

        // desk label = link name
        $desk_name = $this->nav_array["$site"]["link_name"];
        // shorten string if needed
        $max_desk_name_len = 13;
        $desk_name = substr($desk_name, 0, $max_desk_name_len);
        echo '<tr>'."\n";
        echo '<td '.$td_opt.' colspan="'.floor(($pages_per_desk+1)/2).'">';
        echo '<a href="'.$target.'" style="font-weight:normal; " class="nohilight">';
        echo '<font size="2" color="'.$fg.'">'.$desk_name.'</font></a>';
        echo '</td>'."\n";
        echo '</tr>'."\n";

        // page 0 0 - the site itself
        echo '<tr>'."\n";
        $child_sites = $this->nav_array["$site"]["child_sites"];
        // for the moment the following is strait forward
        if(count($this->nav_array["$site"]["child_sites"])==$pages_per_desk) {
            for( $ii=0; $ii<$pages_per_desk-1; $ii+=2)
                $this->insert_pager_page($child_sites[$ii]);
            echo '</tr>'."\n";
        
            echo '<tr>'."\n";
            for( $ii=1; $ii<$pages_per_desk; $ii+=2) 
                $this->insert_pager_page($child_sites[$ii]);
            echo '</tr>'."\n";            
        } else {
            $this->insert_pager_page($site);
            // first subsite
            for( $ii=1; $ii<$pages_per_desk-2; $ii+=2)
                $this->insert_pager_page($child_sites[$ii]);
            echo '</tr>'."\n";
        
            echo '<tr>'."\n";
            for( $ii=0; $ii<$pages_per_desk-1; $ii+=2) 
                $this->insert_pager_page($child_sites[$ii]);
            echo '</tr>'."\n";
        }
    }

    // pre function to build the pager
    function insert_pager_link_list($link_array, $pages_per_desk=4) {
        $is_first = 1;
        echo "<tr>";
        //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            echo '<td><table cellpadding="2" cellspacing="1" summary="">';
            $this->insert_pager_desk($site, $pages_per_desk);
            echo "</table></td>";
        }
        echo "</tr>";
    }

    // pager wrapper function
    function insert_pager_navigation() {
        $pages_per_desk = 4;
        // table for the border
        echo '<table width="80" border="0" cellspacing="0" cellpadding="0" summary="">'."\n";
        $this->decoration_top_line();
        echo "<tr>\n";
        $this->decoration_left_cell();
        echo '<td bgcolor="'.$this->style_array["pager_fg"].'" width="80" class="pagerwrap">';
        // table for the pages
        echo '<table cellpadding="0" cellspacing="1" border="0" width="100%" summary="">'."\n";
        $parent_path = $this->get_parent_path($this->this_site);
        $count = count($parent_path);
        $parent_site = $this->nav_array["$this->this_site"]["parent_site"];

        // check if we are on a top site which has no child sites
        if( $count < 2 || ( ! strcmp($this->nav_array["$parent_site"]["parent_site"], "top")  &&
                            count($this->nav_array["$this->this_site"]["child_sites"]) == 0 &&
                            count($this->nav_array["$parent_site"]["child_sites"]) <= $pages_per_desk )
            || ( $count == 2 &&
                 count($this->nav_array["$this->this_site"]["child_sites"]) <= $pages_per_desk )) {
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
            if( $pages_per_desk < count($sub_sites) ) {
                $pages_per_desk = count($sub_sites) + 1;
            }
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

    function insert_css_definitions() {
        echo "
        body {
            background-color:".$this->style_array["window_bg"].";
            background-image:url(\"".$this->style_array['body_bg_image']."\");
            color:".$this->style_array["window_fg"].";
            margin-right:15pt;
            margin-left:15pt;
        }
        .windowcontents {
        	color:".$this->style_array["window_fg"]."; 
            background-image:url(\"".$this->style_array['body_bg_image']."\");
        } 
        a:link, a:visited, a:active, a:hover {
        	color:".$this->style_array["link_fg"].";
        }
        a:visited {
        	color:".$this->style_array["link_visited_fg"].";
        }
        a:focus, a:hover {
        	background-color:".$this->style_array["link_fg"].";
        	color:".$this->style_array["window_bg"].";
        }
        h2, h3, h4, h5 {
        	color:".$this->style_array["heading_fg"].";
        }
        table.screenshots {
        	border-color:".$this->style_array["link_fg"].";
        }
        p.cmdline {
        	border-color: black;
        	color:".$this->style_array["code_fg"].";
        	background:".$this->style_array["code_bg"].";
        }
        pre.cvs, pre.doc, pre.linebreak {
        	border-color: black;
        	background:".$this->style_array["code_bg"].";
        	color:".$this->style_array["code_fg"].";
        }
";  
    }

}
