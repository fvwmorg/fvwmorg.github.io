<?php

class Theme_Descriptions_Helper {

    var $rel_path;
    var $theme_descriptions;
    var $selected_theme;

    function Theme_Descriptions_Helper($theme="") {
        $this->init($theme);
    }

    function init($theme) {
        global $rel_path;
        $this->rel_path = $rel_path;
        include_once($this->rel_path."/web-theme/themes/theme_descriptions.inc");
        if( strlen($theme)>2 && array_key_exists($theme,$this->theme_descriptions) ) {
            $this->selected_theme = $theme;
        } else {
            // get the first key by default
            reset($this->theme_descriptions);
            $this->selected_theme = key($this->theme_descriptions);
        }
    }

    function insert_theme_description() {
        echo "<pre>";
        print_r($this->theme_descriptions);
        echo "</pre>";
    }

    function insert_avail_theme_list() {
        foreach( $this->theme_descriptions as $theme => $theme_name ) {
            echo "<option value=\"$theme\"";
            if(!strcmp($theme,$this->selected_theme)) {
                echo " selected";
            }
            echo ">".$this->theme_descriptions[$theme]["name"];
            echo "</option>\n";
        }
    }

}

?>