<?php
//--------------------------------------------------------------------
//-  File          : plain_class.inc
//-  Project       : Fvwm Home page
//--------------------------------------------------------------------

require_once(class_file("base_class.inc"));

class Plain_Theme extends Base_Theme {

    function Plain_Theme() {
        $this->theme_name = "plain";
        $this->init();
    }

    function get_parent_path($site) {
        // first we should check if the array is consistent
        if( strlen($this->nav_array["$site"]["parent_site"]) < 1 ) {
            // the actual site is not in the navigation array
            // we return the first entry of $this->nav_array["top_array"] here
            return array($this->nav_array["top_array"][0]);
        }
        // check if this site is a parent - if not return the parent
        // of its parent; -)
        if( ! strcmp( $this->nav_array["$site"]["parent_site"], "top") ) {
            return array($site);
        } else {
            $parent_path = $this->get_parent_path($this->nav_array["$site"]["parent_site"]);
            $parent_path[] = $site;
            return $parent_path;
        }
    }

    function insert_navigation() {
        $parent_path = $this->get_parent_path($this->this_site);
        $array_array = array($this->nav_array["top_array"]);
        for($ii=0; $ii<count($parent_path); $ii++) {
            if( count($this->nav_array[$parent_path[$ii]]["child_sites"]) > 0 )
                $array_array[] = $this->nav_array[$parent_path[$ii]]["child_sites"];
        }

        foreach( $array_array as $link_array ) {
            foreach( $link_array as $site ) {
                $target = $this->conv_link_target($this->rel_path."/".$this->nav_array["$site"]["file"]);
                echo ' :';
                if( strcmp($site, $this->this_site)) 
                    echo '<a href="'.$target.'">';
                else
                    echo '<b>';
                echo $this->nav_array["$site"]["link_name"];
                if( strcmp($site, $this->this_site)) 
                    echo '</a>';
                else
                    echo '</b>';
                echo ":&nbsp; \n";      
            }
            echo "<hr>\n";
        }
    }

    function decoration_window_start($string="", $width="", $height="", $padding="") {}

    function decoration_window_end() {}

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
