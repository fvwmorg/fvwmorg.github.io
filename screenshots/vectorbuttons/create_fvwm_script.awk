#!/usr/bin/awk -f

BEGIN {
    "pwd" | getline
    pwd = $0
    print "Exec rm -f " pwd "/vectorbuttonlist.inc" 
    print "Exec rm -f " pwd "/vectorbutton*gif" 
    print ""
    print "setenv READFILE " pwd "/decor_demo.fvwmrc"
    print "setenv DIR " pwd
    print ""
    i = 0
}

# skip empty lines
/^[ \t]*$/{ next; }

{
    i++
    print "setenv DECORNAME decor" i
    print "setenv SHOTNAME \"vectorbutton" i ".gif\""
    print "setenv VECTOR \"" $0 "\""
    print "Read $[READFILE]"
    print ""
}

END {
    print "# All (decor*) Close"
    print "" 
}

# end of file