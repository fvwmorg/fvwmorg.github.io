<?php
//--------------------------------------------------------------------
//-  File          : birthday_class.inc
//-  Project       : FVWM Home page
//--------------------------------------------------------------------

require_once(class_file("default_class.inc"));

class Birthday_Theme extends Default_Theme {

    function Birthday_Theme () {
        $this->theme_name = "birthday";
        $this->init();
        // cheating here 
        $this->style_array = array(
           "decoration_path"  => $this->rel_path."/birthday/window_decor_birthday",
           "window_border_bg" => "#c5cecd",
           "window_border_fg" => "#ffffff",
           "window_bg"        => "#001040",
           "window_fg"        => "#fffa77",
           "body_bg"          => "#001040",
           "body_fg"          => "#ffffff",
           "body_bg_image"    => $this->rel_path."/birthday/ballons7_bg.gif",
           "pager_bg"         => "#eeea67",
           "pager_fg"         => "#000000",
           "hilight_bg"       => "#b10025",
           "hilight_fg"       => "#ffffff",
           "link_fg"          => "#fafa77",
           "link_visited_fg"  => "#c0c0ff",
           "heading_fg"       => "#fffa77",
           "code_fg"          => "#ffff99",
           "code_bg"          => "#404040",
           );
        if( $bg = my_get_global("body_bg_image","GET") ) {
            $this->style_array["body_bg_image"] = $bg;
        }
//         $_GET=array();
//         $this->set_user_settings();
    }

  function insert_heading() {
      global $heading;
      $width="100%";
      echo '<table';
      if(strlen($width)> 0) echo ' width="'.$width.'"';
      echo ' border="0" cellpadding="0" cellspacing="0" summary="" class="decorated">'."\n";
      $this->decoration_top_line();
      //$this->decoration_title_bar($string);
      echo '<tr>'."\n";
      $this->decoration_left_cell();
      echo '<td bgcolor="'.$this->style_array["window_bg"].'">';
      echo '<table';
      if(strlen($padding)> 0) echo ' cellpadding="'.$padding.'"';
      echo ' summary="" width="100%">'."\n";
      echo '<tr>'."\n";
      echo '<td valign="top" align="left" bgcolor="'.$this->style_array["window_bg"].'"';
      echo ' class="windowcontents">'."\n";
      echo "<h1> $heading </h1>\n";
      echo '</td>'."\n";
      echo '</tr>'."\n";
      echo '</table>'."\n";
      echo '</td>'."\n";
      $this->decoration_right_cell();
      echo '</tr>'."\n";
      $this->decoration_bottom_line();
      echo '</table>'."\n";  
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

    // pre function to build the pager
    function insert_pager_link_list($link_array, $pages_per_desk=4) {
        $is_first = 1;
        echo "<tr>";
        //echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            echo '<td><table cellpadding="2" cellspacing="1">';
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


}
