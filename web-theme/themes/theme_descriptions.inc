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
     "name"   => "Window",
     "style"  => array(
         "decoration_path"  => array(
            "type"    => "directory",                      
            "name"    => "Window Decoration Name",
            "value"   => "@REL_PATH@/pictures/decorations/window_deco_simple_steelblue",
            "alt"     => array(
                "SteelBlue" => "@REL_PATH@/pictures/decorations/window_deco_simple_steelblue",
                "Simple Blue" => "@REL_PATH@/pictures/decorations/window_deco_simple_blue",
                "Aqua"       => "@REL_PATH@/pictures/decorations/window_deco_aqua",
                "NanoGUI"    => "@REL_PATH@/pictures/decorations/window_deco_nanogui",
                "FireBrick"  => "@REL_PATH@/pictures/decorations/window_deco_simple_firebrick",
                "Ice"        => "@REL_PATH@/pictures/decorations/window_deco_ice",
                "After Step" => "@REL_PATH@/pictures/decorations/window_deco_as",
                "Ugly"       => "@REL_PATH@/pictures/decorations/window_deco_xp",
                ),
            ),
         "window_border_bg" => array(
            "type"    => "color",
            "value"   => "#36648b",
            "name"    => "Window Border Background",
            ),
         "window_border_fg" => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Window Border Foreground",
            ),
         "window_bg"        => array(
            "type"    => "color",
            "value"   => "#003c3c",
            "name"    => "Window Background",
            ),
         "window_fg"        => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Window Foreground",
            ),
         "body_bg"          => array(
            "type"    => "color",
            "value"   => "#000000",
            "name"    => "Background",
            ),
         "body_fg"          => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Foreground",
            ),
         "body_bg_image"    => array(
            "type"    => "file",
            "value"   => "@REL_PATH@/pictures/backgrounds/default_small.jpg",
            "alt"     => array(
                "Swirl"  => "@REL_PATH@/pictures/backgrounds/default_small.jpg",
                "Paper"  => "@REL_PATH@/pictures/backgrounds/paper01.jpg",
                "Clouds" => "@REL_PATH@/pictures/backgrounds/clouds01.jpg",
                "Stars"  => "@REL_PATH@/pictures/backgrounds/stars01.jpg",
		"None"   => "none"
                 ),
            "name"    => "Background Image",
            ),
         "pager_bg"         => array(
            "type"    => "color",
            "value"   => "#fafae8",
            "name"    => "Pager Background",
            ),
         "pager_fg"         => array(
            "type"    => "color",
            "value"   => "#000000",
            "name"    => "Pager Foreground",
            ),
         "hilight_bg"       => array(
            "type"    => "color",
            "value"   => "#1a6e99",
            "name"    => "Hilight Background",
            ),
         "hilight_fg"       => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Highlight Foreground",
            ),
         "link_fg"       => array(
            "type"    => "color",
            "value"   => "#fafa77",
            "name"    => "Link Color",
            ),
         "link_visited_fg" => array(
            "type"    => "color",
            "value"   => "#c0c0ff",
            "name"    => "Visited Link Color",
            ),
         "heading_fg" => array(
            "type"    => "color",
            "value"   => "#41a1ee",
            "name"    => "Heading Color",
            ),
         "code_fg" => array(
            "type"    => "color",
            "value"   => "#ffff99",
            "name"    => "Source Text Foreground Color",
            ),
         "code_bg" => array(
            "type"    => "color",
            "value"   => "#404040",
            "name"    => "Source Text Background Color",
            ),
         ),
     ),

  "pager_on_top" => array(
     "name"   => "Desktop",
     "style"  => array(
         "decoration_path"  => array(
            "type"    => "directory",                      
            "name"    => "Window Decoration Name",
            "value"   => "@REL_PATH@/pictures/decorations/window_deco_simple_steelblue",
            "alt"     => array(
                "FireBrick"   => "@REL_PATH@/pictures/decorations/window_deco_simple_firebrick",
                "Simple Blue" => "@REL_PATH@/pictures/decorations/window_deco_simple_blue",
                "SteelBlue" => "@REL_PATH@/pictures/decorations/window_deco_simple_steelblue",
                "Aqua"       => "@REL_PATH@/pictures/decorations/window_deco_aqua",
                "NanoGUI"    => "@REL_PATH@/pictures/decorations/window_deco_nanogui",
                "Ice"        => "@REL_PATH@/pictures/decorations/window_deco_ice",
                "After Step" => "@REL_PATH@/pictures/decorations/window_deco_as",
                "Ugly"       => "@REL_PATH@/pictures/decorations/window_deco_xp",
                ),
            ),
         "window_border_bg" => array(
            "type"    => "color",
            "value"   => "#36648b",
            "name"    => "Window Border Background",
            ),
         "window_border_fg" => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Window Border Foreground",
            ),
         "window_bg"        => array(
            "type"    => "color",
            "value"   => "#003c3c",
            "name"    => "Window Background",
            ),
         "window_fg"        => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Window Foreground",
            ),
         "body_bg"          => array(
            "type"    => "color",
            "value"   => "#000000",
            "name"    => "Background",
            ),
         "body_fg"          => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Foreground",
            ),
         "body_bg_image"    => array(
            "type"    => "file",
            "value"   => "none",
            "alt"     => array(
                "None"   => "none",
                "Swirl"  => "@REL_PATH@/pictures/backgrounds/default_small.jpg",
                "Clouds" => "@REL_PATH@/pictures/backgrounds/clouds01.jpg",
                "Stars"  => "@REL_PATH@/pictures/backgrounds/stars01.jpg",
                ),
            "name"    => "Background Image",
            ),
         "pager_bg"         => array(
            "type"    => "color",
            "value"   => "#bdbebd",
            "name"    => "Pager Background",
            ),
         "pager_fg"         => array(
            "type"    => "color",
            "value"   => "#000000",
            "name"    => "Pager Foreground",
            ),
         "hilight_bg"       => array(
            "type"    => "color",
            "value"   => "#1a6e99",
            "name"    => "Hilight Background",
            ),
         "hilight_fg"       => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Highlight Foreground",
            ),
         "link_fg"       => array(
            "type"    => "color",
            "value"   => "#fafaca",
            "name"    => "Link Color",
            ),
         "link_visited_fg" => array(
            "type"    => "color",
            "value"   => "#61c1ff",
            "name"    => "Visited Link Color",
            ),
         "heading_fg" => array(
            "type"    => "color",
            "value"   => "#41a1ee",
            "name"    => "Heading Color",
            ),
         "code_fg" => array(
            "type"    => "color",
            "value"   => "#ffff99",
            "name"    => "Source Text Foreground Color",
            ),
         "code_bg" => array(
            "type"    => "color",
            "value"   => "#404040",
            "name"    => "Source Text Background Color",
            ),
         "table1" => array(
            "type"    => "color",
            "value"   => "#404040",
            "name"    => "Color for table background",
            ),
         "table2" => array(
            "type"    => "color",
            "value"   => "#606060",
            "name"    => "Color for table background",
            ),
         ),
     ),
   
  "plain"   => array(
     "name"   => "Clean",
     "style"  => array(),
     ),
  
  "birthday"   => array(
     "name"   => "Birthday",
     "style"  => array(         
         "window_bg"  => array(
            "type"    => "color",
            "value"   => "#003c3c",
            "name"    => "Window Background",
            ),
         "window_fg"        => array(
            "type"    => "color",
            "value"   => "#ffffff",
            "name"    => "Window Foreground",
            ),
         ),
     ),

  "blue" => array(
     "name"   => "Blue Theme",
     "style"  => array(),
     ),

  "navigate" => array(
     "name"   => "Navigation",
     "style"  => array(),
     ),

  );

?>