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
function change_bg_color(color, fg) {
    document.bgColor = color;
    document.body.style.backgroundColor = color;
    document.fgColor = fg;
    document.body.style.color = fg;
}
</script>

<map name="colormap">
  <area shape="rect" coords="0,0,19,19"  href="javascript:change_bg_color('#ffffff', '#020202');" alt="white background" title="white background">
  <area shape="rect" coords="20,0,39,19" href="javascript:change_bg_color('#d0d0d0', '#000000');" alt="lite grey background" title="lite grey background">
  <area shape="rect" coords="40,0,59,19" href="javascript:change_bg_color('#808080', '#ffff00');" alt="grey background" title="grey background">
  <area shape="rect" coords="60,0,79,19" href="javascript:change_bg_color('#505050', '#ffffff');" alt="dark grey background" title="dark grey background">
  <area shape="rect" coords="80,0,99,19" href="javascript:change_bg_color('#000000', '#e0e0e0');" alt="black background" title="black background">
  <area shape="rect" coords="100,0,119,19" href="javascript:change_bg_color('#305050', '#e0e0e0');" alt="black background" title="black background">
</map>

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
Using this web site you can vote for logos taking part in the fvwm logo competition.
</p>

<!-- -------------------------------------------------------------------- -->
<!-- Rules                                                                -->
<!-- -------------------------------------------------------------------- -->
<h2>Voting Rules</h2>

<ul>
  <li>You can vote for any number of logos - there is no limit to the
    number of votes.<br><b>PLEASE VOTE FOR ALL LOGOS YOU LIKE.</b></li>
  <li>
    
  </li>
  <li>To vote for a logo or a logo group check the box left beside the logo. </li>
  <li>Your are only allowed to vote once.
    <br><b>Please hit the voting
	  button at the bottom of this page after your are sure you have checked
	  ALL logos you want to vote for</b>.<br>Changing your opinion
    after submitting your voting is not possible.</li>
  <li>Click on the logo or the link "Author page" to get to a page
    where all logos of the logo's author are displayed</li>
  <li>If you have JavaScript enabled you may change the background
    color of this page to get an impression how this logo looks on
    different background. This is done by clicking on the grey tone
    images below the logos.</li>
  <li>The order of logos at this page is incidental and will change
    each time you reload this page.</li>
  <li>During voting time there won't be announced any voting results.</li>
</ul>
<hr>

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
        echo '<a href="../'.dirname($logo).'?theme=voting" target="newwindow">';
        echo '<img src="previews/'.$logo_preview.'" border="0" align="middle" vspace="3" hspace="3">';
        echo '</a>';
    }
    echo '<a href="../'.dirname($logo).'?theme=voting" target="newwindow">Author page</a>';
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
        echo "<h1>Please enter your voting id.</h1>";
    }
?>

<form action="index.php" method="GET">    
  <table cellpadding="2" border="0">
    <tr>
      <td>
        <input type="text" 
               name="id" 
               size="80" 
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

