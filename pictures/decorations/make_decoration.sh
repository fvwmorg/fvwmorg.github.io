#!/bin/sh

convert="convert"
#convert="echo"
convert_opts=""
extension="gif"
transparent_pic="../transparent.gif"

if [ -z "$1" ] || [ -z "$2" ] || [ -z "$3" ] || [ -z "$4" ]; then
    echo "Usage: $0 {filename} {border_width} {destination directory name} {titlebar_height}"
    exit 1
fi

if [ ! -r "$1" ]; then
    echo "File $1 does not exists or is not readable"
    exit
fi

if [ -r "$3" ] && [ "$5" != "-f" ]; then
    echo "The file/directory $3 exists already. Please use -f"
    exit 1;
else
    directory="$3"
fi

if mkdir -p "$directory"; then
    echo "Created directory $directory"
else
    echo "Failed to create directory $directory"
    exit 1;
fi

index=`expr index "$2" "x"` >& /dev/null
#echo $index ".."
if expr "$index" ">" 0 > /dev/null; then
    width=`expr substr "$2" 1 \( $index - 1 \)`
    height=`expr substr "$2" \( $index + 1 \) \( length "$2" \)`
    #echo "$width  $height"
else
    width="$2"
    height="$2"
fi

title_width="$4"
title_height="$4"

echo "Croping image using width ${width} x height ${height}"

"$convert" $convert_opts -gravity NorthWest -crop "${width}x${height}+0+0"   "$1" "${directory}/top_left.${extension}" \
    && echo "${directory}/top_left.${extension}"
"$convert" $convert_opts -gravity NorthWest -crop "${width}x${height}+${width}+0"  "$1" "${directory}/top.${extension}"      \
    && echo "${directory}/top.${extension}"
"$convert" $convert_opts -gravity NorthEast -crop "${width}x${height}+0+0"   "$1" "${directory}/top_right.${extension}" \
    && echo "${directory}/top_right.${extension}"
"$convert" $convert_opts -gravity NorthEast -crop "${width}x${height}+0+${height}"  "$1" "${directory}/right.${extension}"     \
    && echo "${directory}/right.${extension}"
"$convert" $convert_opts -gravity SouthEast -crop "${width}x${height}+0+0"   "$1" "${directory}/bottom_right.${extension}" \
    && echo "${directory}/bottom_right.${extension}"
"$convert" $convert_opts -gravity SouthWest -crop "${width}x${height}+${width}+0"  "$1" "${directory}/bottom.${extension}"       \
    && echo "${directory}/bottom.${extension}"
"$convert" $convert_opts -gravity SouthWest -crop "${width}x${height}+0+0"   "$1" "${directory}/bottom_left.${extension}"  \
    && echo "${directory}/bottom_left.${extension}"
"$convert" $convert_opts -gravity NorthWest -crop "${width}x${height}+0+${height}"  "$1" "${directory}/left.${extension}"         \
    && echo "${directory}/left.${extension}"
"$convert" $convert_opts -gravity NorthWest -crop "${width}x${height}+${width}+${height}" "$1" "${directory}/middle.${extension}"       \
    && echo "${directory}/middle.${extension}"

echo "Converting transparent picture ...."
"$convert" -scale "${width}x${height}" "$transparent_pic" "${directory}/transparent.${extension}" \
    && echo "${directory}/transparent.${extension}"

if [ "${title_width}" ]; then

"$convert" -gravity NorthWest -crop "${title_width}x${title_height}+${width}+${height}" "$1" "${directory}/button_1.${extension}" && echo "${directory}/button_1.${extension}"
								                      
"$convert" -gravity NorthEast -crop "${title_width}x${title_height}+${width}+${height}" "$1" "${directory}/button_2.${extension}" && echo "${directory}/button_2.${extension}"

#echo expr ${width} + ${title_height}
x_pos=`expr ${width} + ${title_height}`

"$convert" -gravity NorthWest -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_3.${extension}" && echo "${directory}/button_3.${extension}"
									     
"$convert" -gravity NorthEast -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_4.${extension}" && echo "${directory}/button_4.${extension}"

x_pos=`expr ${x_pos} + ${title_height}`

"$convert" -gravity NorthWest -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_5.${extension}" && echo "${directory}/button_5.${extension}"
									     
"$convert" -gravity NorthEast -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_6.${extension}" && echo "${directory}/button_6.${extension}"

x_pos=`expr ${x_pos} + ${title_height}`

"$convert" -gravity NorthWest -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_7.${extension}" && echo "${directory}/button_7.${extension}"
									     
"$convert" -gravity NorthEast -crop "${title_width}x${title_height}+${x_pos}+${height}" "$1" "${directory}/button_8.${extension}" && echo "${directory}/button_8.${extension}"

"$convert" -gravity North -crop "${title_width}x${title_height}+0+${height}" "$1" "${directory}/title.${extension}" && echo "${directory}/title.${extension}"

fi

echo "<?php" > "${directory}/deco_definitions.inc"
echo '  $border_height = '${height}';' >> "${directory}/deco_definitions.inc"
echo '  $border_width  = '${width}';' >> "${directory}/deco_definitions.inc"
echo '  $title_height  = '${title_height}';' >> "${directory}/deco_definitions.inc"
echo '?>' >> "${directory}/deco_definitions.inc"

echo "done"
