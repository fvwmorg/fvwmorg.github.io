<?php

function get_vote_array($filename) {
    $index = 0;
    if( file_exists($filename) ) {
        if( $handle = fopen ($filename, "r") ) {
            while(!feof($handle)) {
                $line = trim(fgets($handle, 4096));
                if( strlen($line) > 10 ) {
                    $voter_array = preg_split("/ /", $line, -1);
                    // print_r( $voter_array );
                    $vote_array[$index]["id"]   = $voter_array[0];
                    $vote_array[$index]["mail"] = $voter_array[1];
                    for($ii=2; strlen($voter_array[$ii])>0; $ii++) {
                        $vote_array[$index]["votes"][] = $voter_array[$ii];
                    }
                    $index++;
                }
            }
            fclose ($handle);
        }
    } else {
        echo "Sorry, cannot find the voting file. This is going to be fixed soon.\n";
    }
    return $vote_array;
}

function get_votes_for_logo($number, $vote_array) {
    $num = 0;
    foreach( $vote_array as $voter_array ) {
        $found = 0;
        foreach( $voter_array["votes"] as $vote ) {
            if($vote==$number) {
                $num++;
                if($found) { 
                    echo "<h5>WARNING: ".$voter_array["mail"]." may have cheated!!</h5>";
                }
                $found=1;
            }
        }
    }
    return $num;
}

function get_voters_for_logo($number, $vote_array) {
    $ret = array();
    foreach( $vote_array as $voter_array ) {
        $found = 0;
        foreach( $voter_array["votes"] as $vote ) {
            if($vote==$number) {
                $ret[] = str_replace("@", "_at_", $voter_array["mail"]);
                if($found) { 
                    echo "<h5>WARNING: ".$voter_array["mail"]." may have cheated!!</h5>";
                }
                $found=1;
            }
        }
    }
    asort($ret);
    return $ret;
}

function get_result($vote_array, $logo_array) {
    $results = array();
    foreach( $logo_array as $number => $logos ) {
        $results[$number] = get_votes_for_logo($number, $vote_array);
    }
    return $results;
} 

?>