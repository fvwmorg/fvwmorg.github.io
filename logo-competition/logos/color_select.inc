<?php 
// allow color selection only for birthday theme
// if( ! preg_match("/birthday/", $theme_file) ) return;
if( $t = get_user_setting("theme", array("GET", "POST")) ) {
    $theme_opt = "&theme=".$t;
    $theme_opt_default = "?theme=".$t;
} else {
    $theme_opt = "";
    $theme_opt_default = $requested_file;
}
?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" summary="" class="decorated">
    <?php $theme_object->decoration_top_line(); ?>
    <tr>
      <?php $theme_object->decoration_left_cell(); ?>
	<td>
	<table cellpadding="5" summary="" width="100%">
	  <tr>
	    <td valign="top" 
		align="center" 
		class="windowcontents">
	      You can change the background color to see transparent logos on different backgrounds.<br>
	      <a href="?window_bg=%23ffffff&window_fg=%23000000<?php echo $theme_opt; ?>">white</a>&nbsp;
	      <a href="?window_bg=%23cccccc&window_fg=%23000000<?php echo $theme_opt; ?>">grey80</a>&nbsp;
	      <a href="?window_bg=%237f7f7f&window_fg=%23000000<?php echo $theme_opt; ?>">grey50</a>&nbsp;
	      <a href="?window_bg=%234d4d4d&window_fg=%23ffffff<?php echo $theme_opt; ?>">grey30</a>&nbsp;
	      <a href="?window_bg=%23000000&window_fg=%23ffffff<?php echo $theme_opt; ?>">black</a>&nbsp;
	      <a href="?window_bg=%23ff0000&window_fg=%23000000<?php echo $theme_opt; ?>">red</a>&nbsp;
	      <a href="?window_bg=%2300ff00&window_fg=%23000000<?php echo $theme_opt; ?>">green</a>&nbsp;
	      <a href="?window_bg=%230000ff&window_fg=%23000000<?php echo $theme_opt; ?>">blue</a>&nbsp;
	      <a href="?window_bg=%23ffff00&window_fg=%23000000<?php echo $theme_opt; ?>">yellow</a>&nbsp;
	      <a href="?window_bg=%23ff00ff&window_fg=%23000000<?php echo $theme_opt; ?>">magenta</a>&nbsp;
	      <a href="?window_bg=%2300ffff&window_fg=%23000000<?php echo $theme_opt; ?>">cyan</a>&nbsp;
	      <a href="<?php echo $theme_opt_default; ?>">default</a>&nbsp;
	    </td>
	  </tr>
	</table>
      </td>
      <?php $theme_object->decoration_right_cell(); ?>
   </tr>
   <?php $theme_object->decoration_bottom_line(); ?>
  </table>
<br>
