#!/bin/bash

combine="combine"

start_x=5
start_y=5
x_text_offset=70
y_text_offset=20
x_step=250
y_step=52
map_width=150
map_height=16
font='-adobe-courier-medium-r-normal-*-14-*-*-*-*-*-*-*'
font='-*-fixed-medium-r-*-*-14-*-*-*-*-*-*-*'
font='-*-lucidatypewriter-bold-r-*-*-12-*-*-*-*-*-*-*'
shadow_color=black
text_color=white

ext=png
ext_final=png

echo "Creating overview.${ext} ..."
convert transparent_750x1400.png overview.${ext}

echo '<map name="iconmap">' > image_map.html

echo "Converting $# images ..."
num=0
x=$start_x
y=$start_y

for image in $@; do

    if [ -f "$image" ]; then

    size=`convert -verbose $image test.gif 2> /dev/null | sed '1!d' | awk '{print $3}'`

    width=`echo $size | awk -Fx '{print $1}'`
    height=`echo $size | awk -Fx '{print $2}'`
    
    echo "$image -> $size -> $width x $height" 

    # if [ $width -gt 10 ] && [ $width -lt 20 ] && [ $height -gt 10 ] && [ $height -lt 20 ] ; then
    if [ $width -gt 19 ] && [ $width -lt 70 ] && [ $height -gt 19 ] && [ $height -lt 50 ] ; then

	echo "Adding $image at +${x}+${y}..."

	let sh_text_x=$x+$x_text_offset+1
	let sh_text_y=$y+$y_text_offset+1
	echo "Shadow text at +${sh_text_x}+${sh_text_y} ..."

	let text_x=$x+$x_text_offset
	let text_y=$y+$y_text_offset
	echo "Text at +${text_x}+${text_y} ..."

	let blur_width=$x_step-$x_text_offset
	let blur_height=$y_step
	
	#-------------------------------------------------------------
	#- convert call
	#-------------------------------------------------------------
	convert \
	    -draw 'image Over '"${x},${y} ${width},${height} ${image}" \
	    -font "$font" -gravity NorthWest -fill $shadow_color \
	    -draw 'text '"+${sh_text_x}+${sh_text_y}"' "'"$image (${width}x${height})"'"' \
	    -font "$font" -gravity NorthWest -fill $text_color \
	    -draw 'text '"+${text_x}+${text_y}"' "'"$image (${width}x${height})"'"' \
    		overview.${ext} overview_tmp.${ext}

	mv overview_tmp.${ext} overview.${ext}
		
	let left_x=$x+$map_width
	let lower_y=$y+$map_height
		
	echo '<area shape="rect" coords="'"${x},${y},${left_x},${lower_y}"'" href="'$image'" alt="'$image'" title="'$image'">' >> image_map.html
	let x=$x+$x_step
	# let y=$y+$y_step

	let num=$num+1

	if [ $num -eq 3 ]; then
	    echo "Starting new line ..."
            num=0
	    x=$start_x
	    y_step=$height+2
	    let y=$y+$y_step
	fi
    fi

    fi
    
done

echo '</map>' >> image_map.html

if [ "$ext" != "$ext_final" ] ; then
    echo "Creating final image ..."
    convert overview.${ext} overview.${ext_final}
fi
    
echo '<img src="../icons/overview.'${ext_final}'" border="0" alt="Icon Map" usemap="#iconmap">' >> image_map.html

## eof 