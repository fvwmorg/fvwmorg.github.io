#!/bin/sh 

if [ "$5" = "" ]; then
    echo "usage: {icon picture} {template} {out picture} {text} {text color}"
    exit 1
fi

echo "converting $1 -> $3 ..."
convert -colors 256 "$1" tmp1.gif 

combine -geometry +0+0 -gravity North -compose over "$2" tmp1.gif tmp2.gif

convert -colors 256 -gravity South -fill "$5" -font '-*-helvetica-bold-r-*-*-14-*-*-*-*-*-*-*' -draw 'text +0+8 '"$4" tmp2.gif "$3"

# rm -f tmp1.gif tmp2.gif

## end of file