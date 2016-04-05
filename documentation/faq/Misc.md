Miscellaneous
=============

#### What exactly is the difference between a DESK, a PAGE, and the SCREEN?

  Our naming convention is sometimes a source of confusion, and when
  discussing problems and the like it's good to maintain a consistent
  meaning.  To illustrate how features of fvwm should be referred to
  - fvwm has multiple disjoint DESKTOPS, each of which is comprised
  of M by N PAGES, which are each the size of the physical SCREEN.
  The physical SCREEN acts as a viewport over one of the PAGES of the
  current DESK.  Here's a picture to clarify (also, take a look at
  the FvwmPager module):

               Desk 0                     Desk 1
       +----------+----------+    +----------+----------+
       |          |          |    |          |          |
       | Page 0 0 | Page 1 0 |    |          |          |
       |          |          |    |          |          |
       |          |          |    |          |          |
       +----------+----------+    +----------+----------+
       |+--------+|          |    |          |          |
       ||Page 0 1|| Page 1 1 |    |          |          |
       ||        ||          |    |          |          |
       |+--------+|          |    |          |          |
       +----------+----------+    +----------+----------+

  It shows two 2 x 2 DESKTOPS.  If the current DESK were number 0,
  and the current PAGE were 0 1, the SCREEN would show only the
  windows located there, plus any sticky ones.

  Desktops are numbered consecutively, beginning with 0.  The user is
  not responsible for creating new desktops, those details are
  handled inside fvwm.  To display the different desktops, the user
  can configure key bindings that determine which desktop is
  displayed.  For example, to have the combinations Meta-1 to Meta-4
  display desktop numbers 0 to 3, one would add this to her config:

     Key 1 A M GotoDesk 0
     Key 2 A M GotoDesk 1
     Key 3 A M GotoDesk 2
     Key 4 A M GotoDesk 3

  The same can be done for pages.  For example, if each desktop has
  a size of 2 by to pages you could bind Meta-F1 to Meta-F4 to
  flip pages:

     DeskTopSize 2x2
     Key F1 A M GotoPage 0 0
     Key F2 A M GotoPage 1 0
     Key F3 A M GotoPage 0 1
     Key F4 A M GotoPage 1 1

  It is also a good idea to create a pager that displays several
  desktops, side by side.  This command displays the first 4
  desktops:

     Module FvwmPager 0 3

  Or if you prefer to see only the current desktop in the pager:

     Module FvwmPager * *

#### I'd really like {OpenWindows, NeXT, Win95, Mac, etc} look and feel.Are you going to support that?

  This is not our primary mission, but we think fvwm does a pretty
  good job of producing these appearances.

  You may want to take a look at the

        http://fvwm-themes.sourceforge.net/

#### Where can I get more XPMs for icons?

  If you want more color icons, grab the ones out of the ctwm
  distribution (also at ftp.x.org) which has a lot of nice ones.  You
  can also find more in other distributions at ftp.x.org, and at
  http://www.sct.gu.edu.au/~anthony/icons/ (which has a lot, I
  believe).

  Icons used to be distributed along with fvwm.  Now there is a basic
  set of icons available at the fvwm web site.  You might find some
  links at the fvwm web site to other sources of icons.

  You may want to take a look at the

        http://wm-icons.sourceforge.net/
#### Linux XF86 virtual screen size & fvwm interaction...

  Turn off the Linux Virtual Screen stuff in your XF86Config file if
  you don't like it.  The XFree86 virtual screen feature and hardware
  panning support in certain video cards is a pretty useless kludge
  when you're using a window manager that implements virtual
  desktops.

#### I know this question doesn't have to do with fvwm, but what happened to to rxvt and rclock which Rob Nation used to support? Where can I find them now?

  The official home for rxvt is:

     http://www.rxvt.org/

  and rclock can be found in that rxvt distribution as well.

#### How do I set the background with fvwm?

  Setting the background image is not really part of the window
  manager.  If you are using one of the Linux distributions, most
  likely, some part of the distribution is setting the background for
  you.

  There is a program shipped with fvwm (fvwm-root, previously known
  as xpmroot) that you can use to set the background to an XPM or PNG
  image.  Other programs like "xv", "xli", "xloadimage", "display",
  "feh" and "Esetroot", may be used too, they support some image
  formats that fvwm-root does not.

  If you just want a static image on your background, you might
  invoke one of these programs from your .xsession or .xinitrc file.
  You can also invoke one of these programs from the StartFunction in
  your config.

  The fvwm module FvwmBacker can be used to change the background
  depending on the desk you are currently on by calling an external
  program.  One big disadvantage of external programs is that
  changing the background on the fly can be pretty slow.  FvwmBacker
  can use the image defined in a colorset and cached by fvwm for fast
  background changing.  For example:

     Colorset 10 TiledPixmap foo.xpm
     Colorset 11 Pixmap bar.png
     FvwmBacker: Command (Desk *, Page * 0) Colorset 10
     FvwmBacker: Command (Desk *, Page * 1) Colorset 11

  However, fvwm can handle only xpm, xbm and png images.  Other
  formats must be converted before they can be used in fvwm.

  If you want to set a different background per screen (i.e., you're
  using Xinerama), then the program "Nitrogen" can be used to do
  that.  See:  http://projects.l3ib.org/nitrogen/

#### When I use Fvwm, my XYZ isn't the right color.  Whats wrong?

  Under this heading we've had questions about FvwmForm being all
  white, icons not displaying and messages about being unable to
  allocate colors.

  Older hardware uses something called 8 bit color.  You can also
  mis-configure newer hardware so that it's only using 8 bit color.
  When you use 8 bit color, your display can only have 256 colors on
  it at once.

  This is explained in excruciating detail in the

        http://www.sunhelp.org/faq/FrameBuffer.html

  If your display can support more than 256 colors, that's the way to
  go.  Look up the documentation for your X server.  You may want to
  start with "man X".

  If you are stuck with 8 bit color, fvwm can help.  In the 2.2.x
  releases, you can use the "ColorLimit" command to reduce the number
  of colors Fvwm uses in icons.  In the 2.3.x releases and later,
  ColorLimiting is automatic, but you still might want to use this
  command to further reduce color use.

  Other things you may want to do:
    + Always run Netscape with the "-install" argument.
    + If you use an image on your screen background, reduce the number
      of colors it uses.  For xv add the "-nc nn" argument.  For
      xli use the "-colors nn" argument.
    + Don't use color gradients.
    + Some applications are color hungry.  Beware of anything TK based,
      and FrameMaker in its default setting.

  If you still have problems after this, try the fvwm mailing list.

#### I just got a mouse with 57 buttons. How do I make Fvwm use them?

  Okay, we know you don't have 57 buttons, but we've seen reports
  of up to 7 so far.  Starting with Fvwm 2.4.0 Fvwm supports all
  five mouse buttons that X officially supports, and since
  2.5.11, up to 9 buttons are supported by default.

  2.5.11 and later:

    To use more than 9 buttons (up to 31), modify the file
    libs/defaults.h.  Replace

       #define NUMBER_OF_EXTENDED_MOUSE_BUTTONS      9

     with

       #define NUMBER_OF_EXTENDED_MOUSE_BUTTONS      15

#### Why does fvwm change my X Cursor theme?

  It doesn't.  There is a standard set of cursors that should
  always be available to applications, such as crosshair, left_ptr,
  arrow, pencil, and so on.  Your theme should provide each of these
  cursors, but some don't.  When something (for example, an
  application or fvwm) requests a cursor that your theme does not
  provide, X falls back to the default.  If you are seeing fvwm
  using cursors that do not match your theme, you should use
  CursorStyle to change to a cursor that is available, or find a
  more complete theme.  Note that fvwm does not control what cursors
  your applications request.


