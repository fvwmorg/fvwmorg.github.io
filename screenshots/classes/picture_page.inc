<?php
//--------------------------------------------------------------------
//-  File          : fvwm-web/screenshots/classes/picture_page.inc                                 
//-  Project       : FVMW web page                                    
//-  Author        : Uwe Pross
//-  Date          : 2003                                        
//--------------------------------------------------------------------

class Picture_Page {

    var $item_singular;
    var $item_plural;
    var $start;
    var $num_per_page;
    var $max;
    var $user_theme;
    var $theme;

    function Picture_Page( $singular="screenshot", $plural="screenshots", $start=0, $num=5, $max=10, $theme="", $user_theme=0) {
        $this->item_singular = $singular;
        $this->item_plural   = $plural;
        $this->start         = $start;
        $this->num_per_page  = $num;
        $this->max           = $max;
        $this->theme         = $theme;
        $this->user_theme    = $user_theme;
    }

    function show_start($fg="#ffffff", $bg="#777777") {
        $this->insert_navigation();
        if( ! $bg ) $bg = "#777777";
        if( ! $fg ) $fg = "#ffffff";
        $td_opts = ' nowrap style="color:'.$fg.'; background-color:'.$bg.'; "';
        echo '<table border="0" width="100%" cellspacing="2" cellpadding="5" summary="">';
        echo "<tr>\n";
        echo "<th".$td_opts.">Preview</th>\n";
        echo "<th".$td_opts.">Date/Size</th>\n";
        echo "<th".$td_opts." width=\"99%\">Description</th>\n";
        echo "</tr>\n";
    }

    function show_end() {
        echo '</table>';
        $this->insert_navigation();
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
        $adds        = $entry["additions"];
        $td_opts = '';
        echo '<tr style="border-bottom:1pt '.$bg.' solid;">'."\n";
        echo "<td".$td_opts.' valign="top">';
        echo $ii.'<a href="'.$screenshot.'"><img src="'.$preview.'" border="1" alt="Preview"></a>';
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

    function insert_prev_next_list() {
        $num_of_links = 5;
        if( $this->num_per_page <= 0 ) $this->num_per_page = 5;
        if( $this->start - floor($num_of_links*$this->num_per_page/2) < 0 ) {
            // start link list from 0
            $display_start = 0;
            $display_end   = ($num_of_links*$this->num_per_page);
        }
        elseif( $this->start + floor($num_of_links*$this->num_per_page/2) < $this->max ) {
            // link list is between
            $display_start = ($this->start-(floor($num_of_links/2)*$this->num_per_page));
            $display_end   = ($this->start+(ceil($num_of_links/2)*$this->num_per_page));
        }
        else {
            // link list is at last
            $display_start = ( (floor($this->max/$this->num_per_page)*$this->num_per_page) 
                               - ($num_of_links*($this->num_per_page-1)));
            $display_end   = $this->max;
        }

        if( $this->start > 0 ) {
            mylink( $requested_file, 
                    "&lt;&lt; Prev $this->num_per_page", "", 
                    array("start" => $this->start-$this->num_per_page, "num" => $this->num_per_page) );
            echo "&nbsp; &nbsp; &nbsp; ";
        }
        for( $ii=$display_start; $ii<$display_end && $ii<$this->max; $ii+=$this->num_per_page) {
            $this->insert_link($ii, $ii+$this->num_per_page);
        }
        if( $this->start+$this->num_per_page  < $this->max ) {
            mylink( $requested_file, 
                    "Next $this->num_per_page &gt;&gt;", "", 
                    array("start" => $this->start+$this->num_per_page, "num" => $this->num_per_page) );
        }
    }

    function insert_link($from, $to) {
        // echo "[$from,$to]";
        $num = $this->num_per_page;
        if( $this->max < $to ) $to = $this->max;
        if( $num > 1 ) {
            $pic_range = "".($from+1)."-".$to."";
        } else {
            $num = 1;
            $pic_range = "".$from."";
        }
        if( $this->start == $from ) {
            echo "<b>".$pic_range."</b>";
        } else {
            mylink( $requested_file, $pic_range, "", array("start" => $from, "num" => $num));
        }
        echo "&nbsp; &nbsp; &nbsp; ";
    }

    function insert_navigation() {
        echo '<form action="'.$this->requested_file.'" method="GET">';
        echo '<table border="0" cellpadding="0" width="100%" summary="">';
        echo '<tr>';
        echo '<td>';
        echo 'Total number of '.$this->item_plural.': '.$this->max;
        echo '</td>';
        echo '<td>';
        $this->insert_prev_next_list();
        echo '</td>';
        echo '<td align="right">';
        echo 'Number of pics per page:';

        echo '<select name="num" size="1" onChange="submit();">';
        foreach( array(2,5,10,20,50,100) as $ii ) {
            echo "<option";
            if( $ii == $this->num_per_page ) echo " selected";
            echo ">$ii</option>\n";
        }
        echo '</select>';
        if( $this->user_theme ) {
            echo '<input type="hidden" name="theme" value="'.$this->theme.'">';
        }
        echo '&nbsp;<input type="submit" value="go">';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</form>';
    }
}

?>