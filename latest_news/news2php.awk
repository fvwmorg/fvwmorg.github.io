#!/bin/gawk -f
#-*-shell-script-*-
#---------------------------------------------------------------------
#-  File          : news2html.awk
#-  Project       : FVWM Home Page
#-  Date          : Tue Apr  1 20:48:44 2003
#-  Programmer    : Uwe Pross
#---------------------------------------------------------------------

## stack functions
function push(value) {
    stack[stack_elements++] = value;
}

function pop() {
    if( stack_elements > 0 ) {
	return stack[stack_elements--];
    } else {
	return 0;
    }
}

function stack_value() { 
    return stack[stack_elements]; 
}

function output(s) {
    output_array[out_nr++] = s;
}

function text2html(t) {
    gsub("&","\\&amp;",t);
    gsub(">","\\&gt;",t);
    gsub("<","\\&lt;",t);
    gsub("\"","\\&quot;",t);
    return t;
}

function register_release(r) {
    release_array[release_nr++] = r;
}

BEGIN {
    release_nr=0;
    out_nr=0;
    found_first=0;
}

#---------------------------------------------------------------------
#- heading
#---------------------------------------------------------------------
/^Changes/{
    for(i=1; i<=NF; i++) {
	if( match($i,"[2-9]\.[0-9]\.[0-9][0-9]*") > 0 ) {
	   # release = gsub("\\.","_",$i);
	   release = $i;
	   # print release;
	}
    }
    register_release(release);
    if( found_first ) {
	if( open_item )    output("</li>\n");
	if( started_list ) output("</ul>\n\n\n");
    }
    output("<a name=\"" release "\"></a>\n");
    output("<h4>" text2html($0) " <a href=\"#top\">[top]</a></h4>\n");
    found_first = 1;
    open_item = 0;
    started_list = 0;
    next;
}

#---------------------------------------------------------------------
#- list item
#---------------------------------------------------------------------
/^ *[\*\-] /{
    if( ! started_list ) {
        output("<ul>\n");
	started_list = 1;
    }
    if( open_item ) {
	output("</li>\n");
    }
    output("  <li>");
    open_item = 1;
    $1 = "";
    output(text2html($0));
    next;
}

/^  */ {
    if( open_item ) {
	output(text2html($0));
    }
}

END {
    if( open_item )    output("</li>\n");
    if( started_list ) output("</ul>\n\n\n");

    while ( (getline < "news_template.php_" ) > 0 ) print $0;

    print "<h4>Selection by release:</h4>";

    print "<center>";
    print "<table border=\"0\" width=\"100%\" cellspacing=\"2\" summary=\"\">";

    for(i=0; i<release_nr;) {
	print "<tr>";
	for(j=0; j<=8 && i<release_nr; j++) {
	    i++;
	    print "<td><a href=\"#" release_array[i] "\" style=\"font-weight:normal;\">&nbsp;" release_array[i] "&nbsp;</a></td>";
	}
	print "</tr>";
    }

    print "</table>";
    print "</center>";

    for(i=0; i<out_nr; i++) {
	printf output_array[i];
    }

    print "<?php decoration_window_end(); ?>";

}

## end of file
