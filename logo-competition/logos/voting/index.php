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

$theme = "voting2";
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
include_once(sec_filename("voting_functions2.inc"));
?>

<?php 
$id = trim(get_user_setting("id"));
if( $email = id_is_registered($id) || 1) :
?>

<h1>Welcome to the second stage of fvwm logo voting</h1>

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
  <li> <b>PLEASE VOTE FOR ALL LOGOS YOU LIKE.</b> </li>
  <li> If possible, please take your time to view the large
    versions of the logos on the author pages (click on the logo 
    of the link "Author page" to get there). Some of the large
    logos may not look as you expect. </li>
  <li> You can vote any of the logos - there is no limit to the
    number of votes. </li>
  <li> To vote for a logo or logo group check the box left beside
    the logo. Your vote counts only for the logo shown, not for
    all the other logos on the author's page. </li>
  <li>  Your are only allowed to vote once. Please hit the voting
    button at the bottom of this page when you are sure you have
    checked ALL logos you want to vote for. </li>
  <li> Once you have submitted your votes, you can not change them
    anymore. </li>
  <li> During the voting period, no results are announced. </li>
  <li> You can vote until and including December 31 2003. </li>
</ul>

<h2>Notes</h2>

<ul>
  <li> If you have JavaScript enabled you may change the background
    color of this page to get an impression how this logo looks
    on different background. This is done by clicking on the
    grey tone images below the logos. </li>
  <li> The order of logos at this page is incidental and changes
    each time you reload this page. </li>
  <li> All logos that got at least 10% of the votes in the first
    stage made it to the second stage. </li>
</ul>

<hr>

<form action="vote2.php" method="GET">

<?php
//--------------------------------------------------------------------
//- insert logos 
//--------------------------------------------------------------------
$logo_list = "logo_list.inc";

$stage2logos = array (
     142, // place  1,  67 voices [29.8%] Krzysztof_Bartczak
      91, // place  1,  67 voices [29.8%] Felix_E_Klee
     176, // place  3,  49 voices [21.8%] Phil_Harper
     119, // place  4,  46 voices [20.5%] Ian_Remmler
      99, // place  4,  46 voices [20.5%] Felix_E_Klee
      40, // place  6,  42 voices [18.7%] Christopher_Culp
     173, // place  7,  41 voices [18.3%] Phil_Harper
      12, // place  8,  39 voices [17.4%] Alex_Wallis
      42, // place  9,  38 voices [16.9%] Coji_Morishita
      53, // place 10,  36 voices [16.0%] Colin_May
     122, // place 10,  36 voices [16.0%] Ian_Remmler
     188, // place 12,  35 voices [15.6%] Scott_Smedley
      79, // place 13,  33 voices [14.7%] David_Drummond
     191, // place 14,  32 voices [14.3%] Slava_Finkelsteyn
     165, // place 15,  31 voices [13.8%] Phil_Harper
      86, // place 15,  31 voices [13.8%] Ester_Wilson
     123, // place 17,  30 voices [13.4%] Ian_Remmler
      82, // place 17,  30 voices [13.4%] Ester_Wilson
      98, // place 19,  28 voices [12.5%] Felix_E_Klee
     125, // place 19,  28 voices [12.5%] Julien_Guertault
     153, // place 19,  28 voices [12.5%] Michael_Gorniak
     150, // place 22,  26 voices [11.6%] Michael_Gorniak
      37, // place 23,  25 voices [11.2%] Branko_Collin
     168, // place 24,  24 voices [10.7%] Phil_Harper
      11, // place 25,  23 voices [10.3%] Alex_Wallis
     154, // place 25,  23 voices [10.3%] Michael_Gorniak
      33, // place 25,  23 voices [10.3%] Aric_Campling
      71, // place 25,  23 voices [10.3%] Daniel_Gadziemski
);

// read logo list
$logo_array = array();
include(sec_filename($logo_list));

uasort($logo_array, "random_sort");
$num_of_logos = 0;

foreach( $logo_array as $number => $logos ) {
    if( in_array("$number", $stage2logos) ) {
        echo '<input type="checkbox" name="logo'.$number.'" value="'.$number.'"';
        if( $_GET["logo".$number] ) {
            echo " checked";
        }
        echo '>&nbsp;Vote&nbsp;&nbsp;';
        // echo $number;
        foreach( $logos as $logo ) {
            // $logo_preview = preg_replace('/...$/', "png", $logo);
            echo '<a href="../'.$logo.'" target="newwindow">';
            echo '<img src="previews/'.$logo.'" border="0" align="middle" vspace="3" hspace="3">';
            echo '</a>';
        }
        echo '<a href="../'.dirname($logo).'?theme=voting" target="newwindow">Author page</a>';
        echo "<br>\n";
        insert_color_list();
        echo '<hr size="1" width="100%" noshade>'."\n";
        $num_of_logos++;
    }
}

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

