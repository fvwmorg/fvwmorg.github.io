#!/bin/sh 

template=$FVWM_WEB"/temporary/page_template.php"

if [ ! -f $template ]; then 
    echo "please set FVWM_WEB"
    exit 1;
fi

if [ -z "$3" ]; then
    echo "usage: $0 filename parent_site rel_path"
    exit 1;
fi

filename=`basename $1`
parent_site="$2"

echo -n "creating $1 ... "
cat $template | sed "s/@FILENAME@/$filename/g;s/@PARENT_SITE@/$parent_site/g;s+@REL_PATH@+$3+" > $1 
echo "done"


## eof