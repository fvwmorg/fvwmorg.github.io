#!/bin/ksh
#  Modification History

#  Created on 09/11/99 by DanEspen (dje):
#  - Using xbmbrowser, create screenshots of the icons.
#  (Another approach would be to have the web page load each image
#  into a table.  I think this would be really slow.)

# Couldn't get xbmbrowser to accept "-xrm" type arguments,
# too bad this changes xbmbrowser behavior outside this script:
xrdb -merge <<EOF
XbmBrowser.icon_foreground: white
XbmBrowser.icon_transparent: #555555
XbmBrowser.solid_background: #555555
XbmBrowser*font: 6x13bold
EOF

function make_display {
  type=$1
  geom=$2
  shift
  shift
  dir=/tmp/$type$$
  mkdir $dir
  cp $* $dir
  xbmbrowser -label -iconsonly -geometry $geom $dir; rm -r $dir
}

# Had to split mini's into 2 pieces, none of the dump programs seem
# to handle off-screen data.

case $1 in
  side)
    make_display side 750x400 side[.]*;;
  mini1)
    make_display mini  750x700 mini[.][a-i]* button*;;
  mini2)
    make_display mini  750x800 mini[.][j-z]*;;
  icons)
    make_display icons 750x800 !(mini[.]*|button*|side[.]*|fvwm[23]*|READ*|ChangeLog|Icon_Screen*);;
  banner)
    make_display banner  750x800 fvwm[23]*;;
  *)
    echo "Unknown option, exiting!"
    exit 1;;
esac
