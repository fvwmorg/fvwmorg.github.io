<?php
//--------------------------------------------------------------------
//-  File          : public_html/web-theme/classes/navigate_class.inc 
//--------------------------------------------------------------------
 
require_once(class_file("base_class.inc"));

class Navigate_Theme extends Base_Theme {

    function Navigate_Theme($name="navigate") {
        $this->theme_name = $name;
        $this->init();
    }

        function insert_link($site, $depth, $selected_path) {

            $target = $this->conv_link_target($this->rel_path.'/'.$this->nav_array["$site"]["file"]);
            $max_depth = count($selected_path);
            if( count($this->nav_array["$this->this_site"]["child_sites"]) == 0 ) $max_depth--;
                        
            echo '<a href="'.$target.'" class="'; 
            if( !strcmp($site, $this->this_site) ) {
                echo "sellink";
            } else {
                echo "link";
            }
            $short_name = $this->nav_array["$site"]["short_name"] ? $this->nav_array["$site"]["short_name"] : $this->nav_array["$site"]["link_name"];
            echo '">'.str_replace(" ", "&nbsp;", $short_name);
            // if($depth) echo "....";
            for( $ii=0; $ii<($depth); $ii++ ) {
                echo "&nbsp;&nbsp;&nbsp;:";
            }
            echo '</a><br>'."\n";
    }

    function insert_link_list($link_array, $depth, $selected_path) {
        // echo "$depth - ".count($selected_path)." - ".count($link_array)."<br>";
        while( list($key, $site) = each($link_array) ) {
            // echo "$site<br>";
            if( ! isset($this->nav_array["$site"]) ) {
                // the navigation structure seems to be invalid
                echo "Problem with $site<br>";
            } else {
                // insert this
                $this->insert_link($site, $depth, $selected_path);
                // echo count($this->nav_array["$site"]["child_sites"]).$site."-".$selected_path[$depth+1]."<br>";
                if( count($this->nav_array["$site"]["child_sites"])> 0 && 
                    ! strcmp($site, $selected_path[$depth+1]) ) {
                    $this->insert_link_list($this->nav_array["$site"]["child_sites"], 
                                            $depth+1, 
                                            $selected_path);
                }
            }
        }
    }

    function insert_navigation() {
        $this->insert_link_list($this->nav_array["top_array"], 0, $this->get_parent_path($this->this_site));        
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


    function insert_css_definitions() {
    }

    function insert_quick_jump_list($quick_jump_array, $col_num = 2, $width = "60%")
    {
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
        echo '<table align="center" ';
        //echo '<table ';
        if (strlen($width) > 0) echo 'width="'.$width.'" ';
        echo 'border="0" cellpadding="5" cellspacing="0" summary="" style="padding-left:10%;">'."\n";
        for($ii=0; $ii<ceil($count/$col_num); $ii++) {
            echo "<tr>\n";
            for($jj=0; $jj<$col_num; $jj++) {
                if( list($key, $jump) = each($quick_jump_array) ) {
                    if( ! is_array($jump) ) {
                        $target = conv_link_target($this->rel_path.'/'.$this->nav_array["$jump"]["file"]);
                        // mini icon and text
                        echo '<td align="left" valign="bottom" nowrap="nowrap" width="'.$cell_width.'%">';
                        echo '<a href="'.$target.'">';
                        //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
                        echo str_replace(" ", "&nbsp;", $this->nav_array["$jump"]["link_name"]);
                        echo '</a>';
                        echo '</td>'."\n";
                    }
                    // links outside of this domain
                    else {
                        // mini icon and text
                        echo '<td align="left" valign="bottom" nowrap="nowrap">';
                        echo '<a href="'.$jump[1].'">';
                        //echo '<img src="'.$img.'" border="0" alt="" hspace="5" vspace="0" align="top">';
                        echo str_replace(" ", "&nbsp;", $jump[0]);
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

