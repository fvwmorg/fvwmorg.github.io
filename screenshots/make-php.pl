#!/usr/bin/perl

# ##########################################################################
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
# ##########################################################################

# Use this script after adding an image to desktops.php.
# This script goes thru desktops.php and finds the lines with the
# format:

# <a href="X.phpY

# it then looks for an image ending in .jpg, .gif, or .png
# with the X part of the name above.

# Then it builds an php page containing the image

# This next part isn't working right now: dje May 2003:

# and next and  previous links.
# This way, if you select an image for viewing,
# you can easily navigate forward and backward thru all the full
# size images.

# To avoid timestamp corruption, only php pages that change are
# replaced.

#  Modification History

#  Created on 12/29/02 by Dan Espen (dane):
#  - Create pages to show full size screenshots, doubly link each page,
#  - make a modified version for new fvwm site

use strict;

my $body_prev_image='';
my $count=0;
my $found_count=0;
my $prev_image;
my $prev_height;
my $prev_width;

# Mainline
open (INPUT, "< desktops.php");
LINE: while (<INPUT>) {
  if (/<a href=.*(desk|panelup|paneldown).*php/) { # Find reference to desktop image wrapper
    &create_php($_);
    ++$found_count;
  }
  ++$count;
}
print STDERR "Done, $count lines in desktops.php, $found_count image references checked.\n";
exit 0;


# An image line has been found
sub create_php {
  my $image = $_;
  chomp $image;
  $image =~ s/.*a href=\".*'(.*).php'.*/$1/; # Pull out image base name
  my $name = $image;
  if ( ! -f "$image.jpg" ) {	# Look for jpg image
    if ( ! -f "$image.gif" ) {	# or gif
      if ( ! -f "$image.png" ) {	# or png
	die "$0: Image $image(.jpg|.gif|.png) $image.png not found, giving up.\n";
      }
      $image="$image.png";
    } else {
      $image="$image.gif";
    }
  } else {
    $image="$image.jpg";
  }
  # Logic check, remove me when debugged: dje
  if ( ! -f $image ) {	# Look for jpg image
    die "$0: Image $image not found, giving up.\n";
  }
  open( php , "> $name.php~") || die "Could not write to $name.php.";
  open( template, "< desktop_shot_template.php_") || die "Could not open template file.";
  my $line;
  while( $line = <template> ) {
    $line =~ s/_NAME_/$name/g;
    $line =~ s/_IMAGE_/$image/g;
    print php $line;
  }
  close(php);
  close(template);
  # See if the php page is already there and unchanged...
  if ( -f "$name.php" ) {
    my $debuger = `diff "$name.php" "$name.php~" 2>&1`;
    if ( $? == 0 ) {
      print STDERR "Existing file $name.php unchanged.\n";
      unlink "$name.php~";
    } else {
      print STDERR "Existing file $name.php changed, replaced.\n";
      unlink "$name.php";
      rename "$name.php~","$name.php";
    }
  } else {
    rename "$name.php~","$name.php";
    print STDERR "New file $name.php created.\n";
  }

}

