<?php
//--------------------------------------------------------------------
//-  File          : birthday_class.inc
//-  Project       : FVWM Home page
//--------------------------------------------------------------------

require_once(class_file("default_class.inc"));

class Birthday_Theme extends Default_Theme {

  function Birthday_Theme () {
      $this->theme_name = "default";
      $this->init();
      // cheating here 
      $this->style_array = array(
	  "decoration_path"  => $this->rel_path."/birthday/window_decor_birthday",
	  "window_border_bg" => "#c5cecd",
	  "window_border_fg" => "#ffffff",
	  "window_bg"        => "#006eb6",
	  // "window_bg"        => "#4500a3",
	  "window_fg"        => "#ffba00",
	  "body_bg"          => "#4500a3",
	  // "body_bg"          => "#006eb6",
	  "body_fg"          => "#ffffff",
	  "body_bg_image"    => $this->rel_path."/birthday/ballons7_bg.gif",
	  "pager_bg"         => "#ffba00",
	  "pager_fg"         => "#000000",
	  "hilight_bg"       => "#1a6e99",
	  "hilight_fg"       => "#ffffff",
	  "link_fg"          => "#fafa77",
	  "link_visited_fg"  => "#c0c0ff",
	  "heading_fg"       => "#ffba00",
	  "code_fg"          => "#ffff99",
	  "code_bg"          => "#404040",
	  );
      if( $bg = my_get_global("body_bg_image","GET") ) {
	$this->style_array["body_bg_image"] = $bg;
      }
      $_GET=array();
      $this->set_user_settings();
  }

}
