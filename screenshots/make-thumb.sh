#!/bin/sh

#  Created on 01/21/01 by Dan Espen (dane):
#  - Got tired of using xv to resize these images.
#  "convert" is in the ImageMagik" package.  Its slow, but does the job.

#  If you just want to create a thumb for all files that
#  dont already have one, try:  make-thumb.sh *desk*x*.*

for infile in $* ; do
	outfile=`echo "$infile" | sed 's/-[0-9x]*[.]/-thumbnail./' \
		| sed 's/[.].*/.jpg/'`

	if [ -f "$outfile" ]; then
		echo "File $outfile already exists, skipping"
		continue
	fi

	echo "Creating *$outfile (5 files) for $infile"
	# We can't know in advance which one from 5 looks better...
	convert -filter Box -geometry 160x120! -quality 75 -contrast -contrast "$infile" "2-$outfile"
	convert -filter Box -geometry 160x120! -quality 75 -contrast "$infile" "1-$outfile"
	convert -filter Box -geometry 160x120! -quality 75 "$infile" "$outfile"
	convert -filter Box -geometry 160x120! -quality 75 +contrast "$infile" "1+$outfile"
	convert -filter Box -geometry 160x120! -quality 75 +contrast +contrast "$infile" "2+$outfile"
done
