#!/bin/sh 

template=$FVWM_WEB"/pictures/icons/template_pager_text.gif"
font="-*-courier-medium-r-*-*-10-*-*-*-*-*-*-*"

pic=$2"_pager_text.gif"
bg="grey80"
fg="black"

if [ "$3" ]; then 
    pic=$2"_pager_text_hi.gif"
    bg="dodgerblue"
    fg="white"
fi

if [ ! -f $template ]; then 
    echo "$template does not exist. Please set FVWM_WEB"
    exit 1;
fi

if [ -z "$2" ]; then
    echo "usage: $0 text imagename"
    exit 1;
fi

text=$1

echo "creating button $pic"
convert -scale 59x37 -mattecolor $bg -fill $bg -draw 'rectangle 0,0 200,200' \
        -frame 2x2+2 template_pager_text.gif temp.gif
convert -font "$font" -region 45x32+3+3 \
	-gravity NorthWest -fill $fg -draw 'text 0,9 "'"$text"'"' \
	temp.gif "$pic"
