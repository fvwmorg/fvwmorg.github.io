#!/bin/gawk -f
#-*-shell-script-*-
#---------------------------------------------------------------------
#-  File          : news2html.awk
#-  Project       : FVWM Home Page
#-  Date          : Tue Apr  1 20:48:44 2003
#-  Programmer    : Uwe Pross
#-  Last modified : <07.04.2003 09:38:37 uwp>
#---------------------------------------------------------------------

## stack functions

function output(s) {
    output_array[out_nr++] = s;
}

function text2html(t) {
    # convert a special link
    gsub("^[ \t]*.*_A HREF=\"","         ",t);
    gsub("\"_-_.*_-_ *$","",t); 
    # html specials
    gsub("&","\\&amp;",t);
    gsub(">","\\&gt;",t);
    gsub("<","\\&lt;",t);
    gsub("\"","\\&quot;",t);
    # underline text
    gsub("\\*[a-zA-Z][a-zA-Z 0-9]*\\*","<u>\&</u>",t);
    gsub("<u>\\*","<u>",t);
    gsub("\\*</u>","</u>",t);
    # make urls to links
    gsub("(ftp|http)://[^ ]*","<a href=\"\&\">\&</a>",t);
    # make mail addresses to links
    gsub("[a-zA-Z_][0-9a-zA-Z\\-_\\.]*@[0-9a-zA-Z\\-_\\.][0-9a-zA-Z\\-_\\.]*\\.[a-zA-Z][a-zA-Z][a-zA-Z]?","<a href=\"mailto:\&\">\&</a>",t);    
    return t;
}

function register_link(target,number) {
    link_array[target] = number;
}

BEGIN {
    link_nr=0;
    out_nr=0;
    chapter=-1;
    section=-1;
    found_contents_start=0;
    found_contents_end=0;
}

#---------------------------------------------------------------------
#- Contents section
#---------------------------------------------------------------------
/^Contents/ && ! found_contents_start {
    output("<h2>FAQ Contents</h2>");
    output("<pre style=\"margin-left:5%;\">");
    found_contents_start=1;
    getline;
    while( match($0,"^[\t ]*$") ) getline;
}

! found_contents_start {
next;
}

# toc entry
/^ *[0-9][0-9]*\.([0-9][0-9]*)? / && ! found_contents_end {
    line = text2html($0);
    gsub($1,"<a href=\"#\&\">\&</a>",line);
    output("<a name=\"toc_" $1 "\"></a>" line);
    next;
}

/^=======================*/ && found_contents_start && ! found_contents_end { 
    found_contents_end = 1;
}

# /^----------------------------------------------/ { next; }

# chapter
/^     *[0-9][0-9]* - / && found_contents_end {
    line = text2html($0);
    gsub($1,"<a href=\"#toc_\&.\">\&</a>",line);
    output("<a name=\"" $1 ".\"></a>" line);    
    next;
}

# section
/^[0-9][0-9]*\.[0-9][0-9]* / && found_contents_end {
    line = text2html($0);
    gsub($1,"<a href=\"#toc_\&\">\&</a>",line);
    output("<a name=\"" $1 "\"></a>" line);    
    next;
}


#---------------------------------------------------------------------
#- default rule - simple 
#---------------------------------------------------------------------
{
    output(text2html($0));
}


END {

    ## export first part of php file
    while ( (getline < "faq_template.php_") > 0 && ! match($0,"@FAQ@") ) {
	print;
    }

    # print "<pre style=\"margin-left:5%;\">\n";
    for(i=0; i<out_nr; i++) {
	print output_array[i];
    }
    print "</pre>\n";

    while ( (getline < "faq_template.php_") > 0 ) {
	print;
    }
}

## end of file
