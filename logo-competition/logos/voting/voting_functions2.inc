<?php

$register_file = "register/register.dat";
$votes_file    = "daten/stimmen2.dat";

// a length of 80 gives 6.705+142 possibilities
$id_length = 80;

function generate_id() {
    global $id_length;
    mt_srand((double)microtime()*1000000);
    $valid_char = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $id="";
    for( $ii=0; $ii<$id_length; $ii++) {
        $pos = mt_rand(1, strlen($valid_char));
        $id = $id.substr($valid_char, $pos-1, 1);
    }
    return $id;
}

function mail_is_registered($mail) {
    global $register_file;
    if( file_exists($register_file) ) {
        if( $handle = fopen ($register_file, "r") ) {
            while (!feof($handle)) {
                $line = fgets($handle, 4096);
                if( preg_match('/'.$mail.'/', $line) ) {
                    $id = preg_replace('/^.*   /', '', $line);
                    return trim($id);
                }
            }
            fclose ($handle);
        }
    }
    return 0;
}

function id_is_registered($id) {
    global $register_file, $id_length;
    if( strlen($id) != $id_length ) {
        return 0;
    }
    if( file_exists($register_file) ) {
        if( $handle = fopen ($register_file, "r") ) {
            while (!feof($handle)) {
                $line = fgets($handle, 4096);
                if( preg_match('/'.$id.'/', $line) ) {
                    $email = preg_replace('/   .*$/', '', $line);
                    return trim($email);
                }
            }
            fclose ($handle);
        }
    }
    return 0;
}

function id_has_voted_already($id) {
    global $votes_file, $id_length;
    if( strlen($id) != $id_length ) {
        return 0;
    }
    if( file_exists($votes_file) ) {
        if( $handle = fopen ($votes_file, "r") ) {
            while (!feof($handle)) {
                $line = fgets($handle, 4096);
                if( preg_match('/'.$id.'/', $line) ) {
                    return 1;
                }
            }
            fclose ($handle);
        }
    }
    return 0;
}

function register_mail_and_id( $email, $id ) {
    global $register_file;
    if( $handle = fopen ($register_file, "a") ) {
        fwrite( $handle, trim($email)."   ".trim($id)."\n");
        // fwrite( $handle, "# time        : ".date("r")."\n");
        // fwrite( $handle, "# ip          : ".$_SERVER["REMOTE_ADDR"]."\n");
        // fwrite( $handle, "# remote host : ".$_SERVER["REMOTE_HOST"]."\n");
        // fwrite( $handle, "# host name   : ".$_SERVER["HTTP_HOST"]."\n");
        // fwrite( $handle, "# language    : ".$_SERVER["HTTP_ACCEPT_LANGUAGE"]."\n");
        // fwrite( $handle, "# user agent  : ".$_SERVER["HTTP_USER_AGENT"]."\n");
        // fwrite( $handle, "# char set    : ".$_SERVER["HTTP_ACCEPT_CHARSET"]."\n");
        // fwrite( $handle, "# referer     : ".$_SERVER["HTTP_REFERER"]."\n");
        fclose ($handle);
    } else {
        echo "<h1>Error: Failed to register your email address. Please try again later</h1>";
        mail("keinFruehstuecksfleisch@gmx.net",
             "[fvwm voting] email register failed", 
             "Failed to register \n\n$email\n\n$id");
    }
}

function send_mail_to_voter($email, $id) {
    $base_url = "www.tu-chemnitz.de/~uwp";
    // $base_url = "http://localhost";
    mail(
         $email, 
         "[FVWM] Fvwm logo competition voting", 
         "Please take part in the first stage of fvwm logo competition voting.

All users which are either subscribed to one of the fvwm mailing lists
or have submitted a logo for the competition are allowed to vote for a
new logo for fvwm.

Here is your personal id for participation in the voting:

$id

Please enter this id into the web form at:

$base_url/fvwm-web/logo-competition/logos/voting/index.php

Or access the personal voting page directly using this link:

$base_url/fvwm-web/logo-competition/logos/voting/index.php?id=$id

If you have problems access the voting page please reply to this mail.
",
         "From: FVWM Workers <fvwm-workers@fvwm.org>
Reply-To: FVWM Voting <fvwm-logo@lists.sf.net>");
}

function insert_color_list() {
    echo 'Change background color:&nbsp;<img src="colors.gif" align="middle" border="1" usemap="#colormap">';
}

function init_voting($id) {
    global $stimme;
    if( ! is_array( $stimme[$id] )) { 
        return 0; 
    } else { 
        
        return 1;
    }
}

function save_voting() {
    global $votes_file;
    $id = trim(get_user_setting("id"));
    $email = id_is_registered($id);
    if( ! id_is_registered($id) ) {
        echo "<h1>Your id is not registered. Please register first</h1>";
        return 0;
    }
    if( id_has_voted_already($id) ) {
        echo "<h1>You have voted already. Voting twice is not possible.</h1>";
        return 0;
    }
    $votes = get_voting();
    if( $votes[0] >= 1 ) {
        if( $handle = fopen ($votes_file, "a") ) {
            fwrite( $handle, trim($id)." ".trim($email)." ".trim($votes[1])."\n");
            fclose ($handle);
            echo "<h1>Your vote has been counted.</h1>
<h1>Thank you for taking part in the fvwm logo competition voting.</h1>";
            return 1;
        } else {
            echo "<h1>Error: Failed to save your votings. Please try again later</h1>";
            mail("keinFruehstuecksfleisch@gmx.net",
                 "[fvwm voting] voting save failed", 
                 "Failed to register \n\n$id\n\n".trim($votes[1])."\n");
            return 0;
        }    
    } else {
        echo "<h2>You have not voted for a logo.</h2>";
        echo "<h1>Please vote for 1 logo at least.</h1>\n";
        echo '<h1><a href="index.php?'.$_SERVER["QUERY_STRING"].'">Vote again.</a></h1>';
    }
}

function get_voting() {
    $voting = "";
    $votes_num = 0;
    foreach( $_GET as $get ) {
        if( is_string($get) ) {
            // echo "$get <br>";
            if( preg_match('/^[0-9][0-9]*$/', $get) ) {
                $voting = $voting." ".$get;
                $votes_num++;
            }
        }
    }
    return array(0 => $votes_num, 1 => trim($voting));
}

function random_sort( $aa, $bb ) {
    mt_srand((double)microtime()*1000000);
    return mt_rand(-1,1);
}

?>