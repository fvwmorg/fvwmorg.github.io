<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path."/definitions.inc");

$theme = "voting";
$theme_file = theme_file($theme."_theme.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Voting Page";
$heading        = "FVWM - Logo Competition - Voting Page";
$link_name      = "Logo Competition Voting Page";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($theme_file));
	exit();
}
?>

<script language="JavaScript">
function change_bg_color(color) {
    document.bgColor = color;
    document.body.style.backgroundColor = color;
}
</script>

<map name="colormap">
  <area shape="rect" coords="0,0,19,19"  href="javascript:change_bg_color('#ffffff');" alt="white background" title="white background">
  <area shape="rect" coords="20,0,39,19" href="javascript:change_bg_color('#d0d0d0');" alt="lite grey background" title="lite grey background">
  <area shape="rect" coords="40,0,59,19" href="javascript:change_bg_color('#808080');" alt="grey background" title="grey background">
  <area shape="rect" coords="60,0,79,19" href="javascript:change_bg_color('#505050');" alt="dark grey background" title="dark grey background">
  <area shape="rect" coords="80,0,99,19" href="javascript:change_bg_color('#000000');" alt="black background" title="black background">
</map>


<!-- <h1><blink>This is a draft page!!! Voting is not possible yet</blink></h1> -->

<?php 

include_once(sec_filename("voting_functions.inc"));

?>

<?php 
$id = trim(get_user_setting("id"));
if( $email = id_is_registered( $id ) ) :
?>

<h1>Welcome to fvwm logo voting</h1>

<p>
You have been validated having email address <b>&lt;<?php echo $email; ?>&gt;</b>
</p>

<p>
Using this web site you can vote for logos taking part on the fvwm logo competition.
</p>

<!-- -------------------------------------------------------------------- -->
<!-- Rules                                                                -->
<!-- -------------------------------------------------------------------- -->
<h3>Voting rules</h3>
<p>
You can vote for one or more logos. To vote for a logo or a logo group check the box left beside the logo. 
</p>

<form action="vote.php" method="GET">

<?php
//--------------------------------------------------------------------
//- insert logos 
//--------------------------------------------------------------------
$logo_list = "logo_list.inc";

// read logo list
$logo_array = array();
include(sec_filename($logo_list));

uasort($logo_array, "random_sort");
$num_of_logos = 0;

foreach( $logo_array as $number => $logos ) {
    echo '<input type="checkbox" name="logo'.$number.'" value="'.$number.'"';
    if( $stimme[$number] ) {
        echo " checked";
    }
    echo '>&nbsp;Vote&nbsp;&nbsp;';
    // echo $number;
    foreach( $logos as $logo ) {
        $logo_preview = preg_replace('/...$/', "png", $logo);
        echo '<a href="../'.dirname($logo).'" target="newwindow">';
        echo '<img src="previews/'.$logo_preview.'" border="0" align="middle" vspace="3" hspace="3">';
        echo '</a>';
    }
    echo '<a href="../'.dirname($logo).'" target="newwindow">Author page</a>';
    echo "<br>\n";
    insert_color_list();
    echo '<hr size="1" width="100%" noshade>'."\n";
    $num_of_logos++;
}
    echo "Total $num_of_logos logos\n";
?>
    <center>
      <input name="id" value="<?php if(get_user_setting('id')) { echo get_user_setting('id'); } ?>" type="hidden">
      <input value="Submit your voting" type="submit">
    </center>
    
</form>


<?php
    else:
?>

<?php 
    if( get_user_setting("id") ) {
        echo "<h1>Your id is not valid. Please insert your email address!!</h1>";
    } else {
        echo "<h1>You must be registered before you can vote!!</h1>";
    }
?>

<p>
  Please enter your email address in the text field. 
  A generated id will be sent to you which allows you 
  to take part at the logo competition.
</p>
<p>
  Your mail address is only used to send you a authorization
  key to avoid voting multiple times.
</p>

<form action="login.php" method="GET">
  <table cellpadding="2" border="0">
    <tr>
      <td>
	Email Address:
      </td>
    </tr>
    <tr>
      <td>
	<input type="text" 
	       name="email" 
	       size="30" 
	       maxlength="100" 
	       value="<?php if(get_user_setting('email')) { echo get_user_setting('email'); } ?>">
      </td>
      <td>
	<input value="Register" type="submit">
      </td>
    </tr>
  </table>
  <input name="register" value="1" type="hidden">  
</form>

<form action="index.php" method="GET">    
  <table cellpadding="2" border="0">
    <tr>
      <td colspan="2" wrap>
       If you have been registered already <br> you may insert you authorization code here:
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" 
               name="id" 
               size="30" 
               maxlength="100" 
               value="<?php if(get_user_setting('id')) { echo get_user_setting('id'); } ?>">
      </td>
      <td>
        <input value="Login" type="submit">
      </td>
    </tr>
  </table>
</form>


<?php
    endif;
?>

