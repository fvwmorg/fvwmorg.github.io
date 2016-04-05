Installation
============

#### I want to use fvwm, but I don't have root access on my machine. Can I still install and run it?

  Very easily, using the '--prefix' flag at configure time.

  Suppose your home directory is /home/sam.  After unpacking the
  fvwm sources, do "./configure --prefix=/home/sam [other options as
  needed]'.  Now, after building ("make") and installing ("make
  install"), you will find the binaries in /home/sam/bin, the
  man pages in /home/sam/man, etc.  The modules will be in
  /home/sam/libexec, and fvwm binary will have this module path
  built in.

#### I'm trying to use fvwm under CDE/COSE, but encountering difficulties. Any suggestions?

  __OLD__

  Sure - here's one from Graeme McCaffery:

     Finally I have found out how to run fvwm properly from CDE 8-))
     (thanks to Lars Sodergren).

     First set your home session in Dtwm.  That usually is an empty
     session, though you could have the CDE session manager remember
     what your desktop was like instead of FvwmSaveDesk etc..

     Then you have to set two resources in .Xdefaults:

       Dtsession*wmStartupCommand: /home/orion/spxgm/bin/Fvwm
       Dtsession*waitWmTimeout: 1

     In this case I run fvwm from a shell script so that library
     variables etc are set properly for everyone.  The waitWmTimeout
     tells the session manager how long to wait until it starts the
     window manager.  I've set it to 1 second.  By default it's 60
     seconds.

     Finally you have to quit with

       /usr/dt/bin/dtaction ExitSession (or whatever your path is for dtaction)

     Now you can happily use CDE programs and fvwm.
   -----

  On the other hand, here is a link to a web page that describes
  how to add multiple window managers to the CDE login menu:

        http://twirl.mcc.ac.uk/~zzassgl/wm.html

#### I'm trying to compile fvwm under SunOS using cc, but the compiler is having lots of problems. What gives?

  __OLD__

  cc under SunOS is not an ANSI C compiler.  Try using acc or gcc
  instead.

#### I want colored icons, but they won't work. Why not? When I run configure, it reports "no" to "Have XPM support?" How can I get XPM support?

  __OLD__

  Fvwm uses the XPM (X PixMap) library to provide support for colored
  and shaped icons.  XPM doesn't ship with the basic X distribution
  as provided by The Open Group or XFree86.  However, many vendors
  will bundle it as a standard component anyway.  If not, you can get
  a copy of the source from ftp://ftp.x.org/contrib/libraries/ and
  build it yourself.

  If you have XPM on your system, there are a number of ways
  configure could still decide not to use it.

  First, if you've installed XPM in a non-standard place (not in the
  normal system or X11 directories--say in /opt/xpm or /usr/local or
  similar) then you need to tell configure where to look.  Use the
  --with-xpm-library and --with-xpm-includes options (see
  INSTALL.fvwm).  Typically configure will say "Xpm library or header
  not found" if this is the problem.

  Second, your version of XPM may be too old.  Fvwm requires XPM 3.4g
  or better.  Typically configure will say "Xpm library version is
  too old!" if this is the problem.  In that case, you'll need to
  install a newer version.

  Third, XPM may be mis-installed on your system.  If configure says
  " Xpm library version and header file version don't match!" then
  this may be the problem.  Either use the --with-xpm-library and
  --with-xpm-includes options to specify more precisely what you
  want, or try re-installing XPM.

  Last, there could be a linker error.  This is especially common on
  systems where XPM may be built as a shared library and installed in
  a non-standard directory (Solaris is a good example).  There are
  some notes about building using shared libraries in the
  INSTALL.fvwm file.

  If you can't figure it out, contact the fvwm mailing list.  Please
  be sure to provide the type of hardware and operating system you're
  using, how you invoked configure, and extract the lines dealing
  with XPM from the config.log file and include that.

#### I'm a sysadmin, and if I wanted to force fvwm to read a system rc file and then the user's rc file, how would I do that?

  Well, you could probably do something like this.  Have the first
  line of everyone's ~/.fvwm/config or ~/.fvwm/.fvwm2rc files be
  'Read global.config' and have global.config reside in
  "$datadir"/fvwm (the value of $datadir is set on ./configure step).

#### I'm a sysadmin, and if I wanted fvwm to look for all of its rc files in a hidden directory, say ~/.fvwm, much like CDE does, how could I do that?

  Fvwm now supports ~/.fvwm search directory by default.

  This could be probably done similarly to Q2.5 above.  The system rc
  "$datadir"/fvwm/config (or system.fvwm2rc) could do something like:

        Read Init      quiet
        Read Decors    quiet
        Read Styles    quiet
        Read Functions quiet
        Read Menus     quiet
        Read Keys      quiet
        Read Modules   quiet

  or whatever breakdown you deemed appropriate, and you would have
  default versions of these in "$datadir"/fvwm/ that it could find
  in case the user was missing one of them and you wanted to supply
  defaults.

#### How can I use fvwm with GNOME version >= 2 or KDE version >= 2?

  __OLD__

  Most standard applications work as any other application with
  fvwm. However, some features and special applications such as
  panels, pagers, taskbars and desktops need a special
  support. Interaction between the window manager, the desktop
  environment and applications is standardized in the Extended Window
  Manager Hints specification. fvwm supports this specification since
  the 2.5.x series (GNOME, GTK, KDE and QT since their version
  2). See the "Extended Window Manager Hints" section of the fvwm
  manual page and the commands and styles which start with "EWMH" for
  more details.

  You can use fvwm as the GNOME window manager. For this, start GNOME
  (gnome-session). The game is to replace the running window manager
  (sawfish or metacity by default) by fvwm. You may try to type "fvwm
  --replace&" in a terminal. If this does not work kill fvwm and open
  the session properties dialog (run "gnome-session-properties&" in a
  terminal) and change, in the second tab, the metacity (or sawfish)
  Style value from "Restart" to "Normal" (do not forget to "Apply"
  this change), so that gnome-session won't restart it when you kill
  it. Then, run "killall metacity; sleep 1; fvwm &" in a
  terminal. After you have succeeded starting fvwm you just have to
  save your session (say via GNOME session logout). The next time you
  start gnome-session, fvwm will be used (and you do not need to save
  the session again at logout). Note that if you use gnome-smproxy,
  and run an FvwmButtons which swallows some applications which use
  the old session protocol these applications are restarted by
  gnome-session and FvwmButtons at session restart which can cause
  trouble.

  You can also use fvwm as the KDE window manager.  KDE is started by
  a shell script called "startkde". This script starts ksmserver
  which starts the window manager (kwin by default). To start fvwm
  you should add the option "-w fvwm" to the ksmserver command line
  (close to the end of the script). You may copy startkde to
  startkde_fvwm somewhere in your path, edit startkde_fvwm and
  finally replace startkde by startkde_fvwm in your X startup script
  (e.g., ~/.xinitrc, ~/.Xclients or ~/.xsession). Note that ksmserver
  does not support the fvwm Restart command. You should use "Restart
  fvwm" for restarting fvwm. But if you do that it is a bad idea to
  save the session later.

