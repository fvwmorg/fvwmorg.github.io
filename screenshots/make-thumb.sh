#!/bin/sh

#  Modification History

#  Created on 01/21/01 by Dan Espen (dane):
#  - Got tired of using xv to resize these images.
#  "convert" is in the ImageMagik" package.  Its slow, but does the job.

#  If you just want to create a thumb for all files that
#  dont already have one, try:  make-thumb.sh *desk*x*.gif
#  But watch out for Windoze95-desk-thumb.gif which is mis-named.

for i in $* ; do
  new_name=`echo $i | sed -e's/[0-9]*x[0-9]*[.]gif/thumbnail.gif/'`
  if [ -f $new_name ] ; then
    echo "$i: File $new_name already exists, skipping"
    continue
  fi
  echo "$i:  Convert to $i"
  convert -geometry 160x120 $i $new_name
done
