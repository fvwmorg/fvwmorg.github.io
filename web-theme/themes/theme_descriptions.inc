<?php
//--------------------------------------------------------------------
//-  File          : theme_descriptions.inc                           
//-  Project       : Fvwm Home Page                                   
//-  Date          : Fri May  2 21:39:18 2003                         
//--------------------------------------------------------------------

// descriptions of themes which are available 
// via the customize_theme page 
$this->theme_descriptions = array(
  "default" => array(
     "name"   => "Default Theme",
     "style"  => array(
         "decoration_path"  => array(
            "type"    => "directory",                      
            "default" => $this->rel_path."/pictures/decorations/window_deco_simple_steelblue",
            "option1" => $this->rel_path."/pictures/decorations/window_deco_simple_firebrick",
            "option2" => $this->rel_path."/pictures/decorations/window_deco_ice",
            ),
         "window_border_bg" => array(
            "type"    => "color",
            "default" => "#c5cecd",
            ),
         "window_border_fg" => array(
            "type"    => "color",
            "default" => "#ffffff",
            ),
         "window_bg"        => array(
            "type"    => "color",
            "default" => "#003c3c",
            ),
         "window_fg"        => array(
            "type"    => "color",
            "default" => "#ffffff",
            ),
         "body_bg"          => array(
            "type"    => "color",
            "default" => "#000000",
            ),
         "body_fg"          => array(
            "type"    => "color",
            "default" => "#ffffff",
            ),
         "body_bg_image"    => array(
            "type"    => "file",
            "default" => $this->rel_path."/pictures/backgrounds/default_small.jpg",
            ),
         "pager_bg"         => array(
            "type"    => "color",
            "default" => "#fafae8",
            ),
         "pager_fg"         => array(
            "type"    => "color",
            "default" => "#000000",
            ),
         "hilight_bg"       => array(
            "type"    => "color",
            "default" => "#1a6e99",
            ),
         "hilight_fg"       => array(
            "type"    => "color",
            "default" => "#ffffff",
            ),
         ),
  ),
  
  "plain"   => array(
     "name"   => "Fast Plain Theme",
     "style"  => array(),
     ),
);

?>