<?php

include("../../navgen_write/navigation.inc");


function export_site_array($array) {
  reset($array);
  while(list($key,$site)=each($array)) {
    global $$site;
    if( count(${$site}["child_sites"]) > 0 ) 
      export_site_array(${$site}["child_sites"]);
    echo "../../temporary/helpers/create_pager_text_icon.sh ";
    echo '"'.${$site}["link_name"].'" '.$site."<br>\n";
  }
}

export_site_array($top_array);
echo "<br><br>";

?>