#!/bin/sh 

if [ "$3" = "" ]; then
    echo "usage: $0 {template} {icon picture} {outfile}"
    exit 1
fi

# echo "converting $1 -> $3 ..."
# convert -colors 256 "$1" tmp1.gif 

echo "creating $3 ..."
composite -geometry +3+2 -gravity NorthWest -compose over "$2" "$1" "$3"

# rm -f tmp1.gif tmp2.gif

## end of file