#!/bin/ksh
#  Modification History

#  Changed on 01/12/00 by Dan Espen (dane):
#  - Split banner into banner and banner2.
#  The image wouldn't fit on one screen.

#  Created on 09/11/99 by DanEspen (dje):
#  - Using xbmbrowser, create screenshots of the icons.
#  (Another approach would be to have the web page load each image
#  into a table.  I think this would be really slow.)

#  INSTRUCTIONS:
#
#  This shell is part of the manual process of dealing with the icon
#  package.  If you add, change or remove an icon, you want to run this
#  shell for the categories of icons you have changed.  For example, if
#  you add a banner, you want to run this shell with the argument
#  "banner".  You then need to run an image grabber, for example "xv",
#  grab the xbmbrowser window, and crop the result to the part of the window
#  that has the images.  Then save that in gif format in:
#  ../generated/icon_shots/banner.gif  (check that directory for the correct
#  file name.
#
#  Then, as if you haven't done enough, you need to update the download
#  tar.gz file that contains all the images, if you have gnutar:
#
#    gtar zvcf - *.xpm > ../generated/icon_download/fvwm_icons.tgz

function make_display {
  type=$1
  geom=$2
  shift
  shift
  dir=/tmp/$type$$
  mkdir $dir
  cp $* $dir
  # Figure out how to put this into the background some day, (including "rm")
  xbmbrowser -label -iconsonly -geometry $geom\
    -name $type\
    -xrm "XbmBrowser.icon_foreground:white"\
    -xrm "XbmBrowser.icon_transparent:#555555"\
    -xrm "XbmBrowser.solid_background:#555555"\
    -xrm 'XbmBrowser*font:6x13bold'\
    $dir
  rm -r $dir
}

# Had to split mini's into 2 pieces, none of the dump programs seem
# to handle off-screen data.

case $1 in
  test)				# small number of icons for testing...
    make_display test 660x560 mini.window*;;
  side)
    make_display side 750x430 side[.]*;;
  mini1)
    make_display mini  750x700 mini[.][a-i]* button*;;
  mini2)
    make_display mini  750x800 mini[.][j-z]*;;
  icons)
    make_display icons 750x800 !(mini[.]*|button*|side[.]*|fvwm[23]*|READ*|ChangeLog|Icon_Screen*|banner[.]*);;
  banner)
    # Note, this is so big, it needed to be split:
    make_display banner 750x800 fvwm[23]*;;
  banner2)
    make_display banner  886x1120 banner[.]*;;
  *)
    echo "Unknown option, , use 'side', 'mini1', mini2', 'icons' or 'banner'. Exiting!"
    exit 1;;
esac
