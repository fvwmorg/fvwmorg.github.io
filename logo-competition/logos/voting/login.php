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

decoration_window_start("FVWM Login for voting", "100%", "");

include_once(sec_filename("voting_functions.inc"));

$email = $_GET["email"];

if( ereg("[^\ @]*@[^\ @]*",$email) && strlen($email) > 6 ): ?>

<?php

if( ! ( $id = mail_is_registered($email) ) ) {
    $id = generate_id();
    register_mail_and_id( $email, $id );
}

send_mail_to_voter( $email, $id );

?>

<h2>A generated id has been sent to your email address.</h2>
<p>Please check your mail and follow the instructions to get access to the voting page.</p>
  <form action="index.php" method="GET">    
    <table cellpadding="5" border="0">
      <tr>
        <td>
          Insert the id which was sent to you:
        </td>
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
<?php else: ?>

<p>
  Your email seems to be not valid. 
  This happens if your mail is shorter than 
  7 characters or has not the usual email format: <tt>[^\ @]+@[^\ @]+</tt>
</p>

<p>
  If this is really your email address. 
  Please contact &lt;fvwm@fvwm.org&gt; to get access to the voting page. 
  Otherwise insert your email address in the form.
</p>

<?php endif; ?>
  
  
<?php decoration_window_end();?>


