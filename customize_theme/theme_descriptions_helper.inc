<?php

class Theme_Descriptions_Helper {

    var $rel_path;
    var $theme_descriptions;
    var $selected_theme;
    var $propagation_method;
    var $available_propagation_methods;

    function Theme_Descriptions_Helper($theme="") {
        $this->init($theme);
    }

    function init($theme) {
        global $rel_path;
        $this->rel_path = $rel_path;
        include_once($this->rel_path."/web-theme/themes/theme_descriptions.inc");
        if( strlen($theme)>2 && array_key_exists($theme, $this->theme_descriptions) ) {
            $this->selected_theme = $theme;
        } else {
            // get the first key by default
            reset($this->theme_descriptions);
            $this->selected_theme = key($this->theme_descriptions);
        }
        $this->available_propagation_methods = array("get", "cookie");
        $this->set_propagation_method();
    }

    function set_user_settings() {
        if( strlen(my_get_global("clear_cookies", "POST")) > 0 ) {
            foreach( $_COOKIE as $cookie ) {
                setcookie($cookie, "", time()-60*60*24, "/");
            }
            // uwp: I don't know if this correct but it worked on my computer ;-)
            $_POST   = array();
            $_GET    = array();
            $_COOKIE = array();
            return;
        }

        $propagation_method = get_user_setting("propagation_method", array("GET", "POST", "SESSION", "COOKIE"));
        $style_description_array = $this->theme_descriptions[$this->selected_theme]["style"];
        // check if cookies can be used to store this values
        if( !strcmp($propagation_method, "cookie") ) {
            // set a cookie for one year - after this time the browser rejects this settings
            setcookie("propagation_method", "cookie", time()+60*60*24*365, "/");
	    
	    // store selected theme
	    setcookie("theme", $this->selected_theme, time()+60*60*24*365, "/");
        }
        // print_r($style_description_array);
        // print_r($_COOKIE);
        foreach( $style_description_array as $style => $style_settings ) {
            // override the member array settings
            if( $value = get_user_setting($style, array("GET", "POST", "SESSION", "COOKIE"))) {
                // check if this value differs from the default settings
                // following line is a little bit sick; -)
                if( strcmp($this->theme_descriptions[$this->selected_theme]["style"][$style]["value"],$value) ) {
                    $this->theme_descriptions[$this->selected_theme]["style"][$style]["value"] = $value;
                    // set a cookie if it is allowed 
                    if( !strcmp($propagation_method, "cookie") ) {
                        setcookie($style, $value, time()+60*60*24*365, "/");
                    } elseif( !strcmp($propagation_method, "get") ) {
                        $_GET[$style] = $value;
                    }
                } else {
                    // delete the cookie by setting an expiring time in the past
                    if( !strcmp($propagation_method, "cookie") ) {
                        setcookie($style, $value, time()-60*60*24, "/");
                    }
                }
            }
        }
    }

    function insert_theme_description() {
        echo "<pre>";
        print_r($this->theme_descriptions);
        echo "</pre>";
    }

    function insert_avail_theme_list() {
        echo '<select name="theme" size="1">'."\n";
        foreach( $this->theme_descriptions as $theme => $theme_name ) {
            echo '<option value="'.$theme.'"';
            if(!strcmp($theme, $this->selected_theme)) {
                echo " selected";
            }
            echo ">".$this->theme_descriptions[$theme]["name"];
            echo "</option>\n";
        }
        echo "</select>";
    }

    function set_propagation_method() {

        if( $this->propagation_method = my_get_global("propagation_method", "GET") ) {
            // use GET settings
        } elseif( $this->propagation_method = my_get_global("propagation_method", "POST") ) {
            // use POST settings
        } elseif( $this->propagation_method = my_get_global("propagation_method", "SESSION") ) {
            // use SESSION settings
        } elseif( $this->propagation_method = my_get_global("propagation_method", "COOKIE") ) {
            // use COOKIE settings
        } else {
            $this->propagation_method = "session";
        }

        $regexp = "/^(";
        foreach($this->available_propagation_methods as $method) {
            if( strcmp($regexp, "/^(") )
                $regexp = $regexp.$method;
            else
                $regexp = $regexp."|".$method;
        }
        $regexp = $regexp.")/";

        // set default if not set properly
        if(   strlen($this->propagation_method) == 0 ||
              ! preg_match($regexp, $this->propagation_method) ) {
            $this->propagation_method = "session";
        }
    }

    function insert_propagation_method_list() {
        echo '<select name="propagation_method" size="1">'."\n";

        foreach($this->available_propagation_methods as $method) {
            echo "<option value=\"$method\"";
            if( !strcmp($this->propagation_method, $method) ) echo " selected";
            echo ">$method</option>\n";
        }
        echo "</select>";
    }

    function get_selected_theme_name() {
        return $this->theme_descriptions[$this->selected_theme]["name"];
    }

    function insert_theme_option_list() {
        $style_array = $this->theme_descriptions[$this->selected_theme]["style"];
        if( ! is_array($style_array) || count($style_array) == 0 ) {
            echo '<tr><td colspan="3" class="windowcontents"><h3>This theme does not have options</h3></td></tr>';
            return;
        }

        foreach( $style_array as $option => $option_array ) {
            $this->insert_theme_option($option, $option_array);
        }

    }

    function insert_theme_option($option, $option_array) {
        if( ! is_array($option_array) ) return;
        if( strlen($option_array["type"]) == 0 ||
            strlen($option_array["name"]) == 0 ||
            strlen($option_array["value"]) == 0 ) return;

        switch($option_array["type"]) {
        case "color":
            echo "<tr>\n";
            echo '<td align="right" class="windowcontents">';
            echo $option_array["name"];
            echo ": </td>\n";
            echo '<td align="left" class="windowcontents">';
            echo '<input name="'.$option.'" type="text" size="8" maxlength="10" value="'.$option_array["value"].'" style="font-family:monospace; ">';
            echo "</td>\n";
            echo "</tr>\n";
            break;
        case "file":
        case "directory":
            echo "<tr>\n";
            echo '<td align="right" class="windowcontents">';
            echo $option_array["name"];
            echo ": </td>\n";
            echo '<td align="left" class="windowcontents">';
            echo '<select name="'.$option.'">';
            foreach( $option_array["alt"] as $alt_name => $alt_value ) {
                echo '<option value="'.$alt_value.'"';
                if( !strcmp($alt_value, $option_array["value"]) ) echo " selected";
                echo '>'.$alt_name;
                echo "</option>\n";
            }
            echo "</select>\n";
            echo "</td>\n";
            break;
        default:
            break;
        }
    }

}

?>