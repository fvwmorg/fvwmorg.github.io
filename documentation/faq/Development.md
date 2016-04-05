Development, known problems & bug reports
=========================================

#### I'd really like to see neat feature XYZ in fvwm. Wouldn't that be cool?  I even have a patch.  When can it be added?

  If you plan to write a patch, *please*, first of all fetch the
  latest development release from our web site or better yet use CVS
  as described in http://fvwm.org/documentation/dev_cvs.php.  It is
  also a good idea to contact the fvwm-workers list.  At times,
  patches for older releases may prove completely worthless, e.g.
  because the fix has already been integrated, a feature already
  added or removed or simply because the code is very different to
  the code you patches.  You will do yourself and us a great favor.
  Otherwise all your hard work may be wasted.

  People are always requesting or suggesting new features (many of
  which are great ideas and where a lot of the current features came
  from).  One of the more common ones for example is Windows 95 look
  and feel (although since this was first written, that particular
  feature has actually been indirectly implemented via several
  appearance-affecting features).

  I'd like to make a statement about this.  fvwm is supposed to be
  small, fast, powerful, and flexible, and sometimes tradeoffs have
  to be made here.  The module interface helps here, as a lot of
  features that not everyone wants or needs don't have to be in the
  main module consuming resources for those people that don't want or
  need them.

  So if you have a suggestion (or a patch), please think of a way to
  make it as small and generic as possible if you feel it belongs in
  the main module.

  If you plan to make a patch, please contact the fvwm-workers
  mailing list first.  From time to time we are changing the code in
  a very disruptive way and if you create a patch to a version before
  such changes were made we will all have a hard time to integrate
  the patch.  Most of the time we will ask you to update the patch
  for the current code anyway.

  Bear in mind that we make no guarantees that we'll add any
  requested feature or apply any submitted patches to the official
  version, but please don't let this dissuade you from submitting
  them.  We like to get new ideas and we're always curious to see how
  someone would implement a given feature, even if we never plan to
  put it in fvwm. Also, we may choose to re-implement any patches
  submitted, which may change the syntax, functionality, etc.  Please
  don't take offense from that, as we mean no offense and we
  generally have a good reason (at least by our way of thinking) for
  our actions...

#### How do I create/submit/apply patches?

  First of all, please read the first section of the answer to Q5.1!

  Please add proper entries to the ChangeLog file(s) and possibly to
  NEWS and AUTHORS files whenever you submit a patch.  The ChangeLog
  lists *all* changed files and functions along with a useful
  explanation of the change details.  The NEWS file mentions all
  user-visible changes, including bug fixes.  Also, do not forget to
  write a section for the man page if the patch includes new
  features.

  You can find more detailed instructions for working with the
  fvwm sources in the files doc/DEVELOPERS and doc/CONVENTIONS in
  CVS or the tarballs.

  Creating a patch against CVS sources (preferable) -

    1. Execute "cvs update -AdP" to ensure there are no conflicts
       with the most recent sources.
    2. Don't forget to update the ChangeLog file (see below) and
       all manual pages if needed.
    3. In the base cvs directory run: cvs diff -u >myfeature.patch

  Creating a patch against released sources -

    1. Copy the original file(s) to the same name with the
       additional extension of .orig (or something like that).
    2. Update the ChangeLog file.  If you use (x)emacs, move the
       cursor into the function you changed and hit <ctrl>-x 4 a.
       This will generate an empty ChangeLog entry in the right
       file (there are several ChangeLogs).  Add a description of
       what you did.  Do this each time you change a function or
       file (for changes outside of functions).  You should update
       the AUTHORS and NEWS files too if appropriate.
       Please take the time to add the ChangeLog entries, it makes
       our work a lot easier.
    3. Run diff with either the -c (context) or -u (unified)
       switch on the sets of files, with the .orig file FIRST.  I
       prefer unified diff's because they are smaller, but
       sometimes they aren't as readable (and some diff versions
       don't support unified diffs), so either context or unified
       diffs are fine (but please, no "plain" diffs).

        ex: cp fvwm.c fvwm.c.orig ; <edit> ; diff -u fvwm.c.orig fvwm.c

  Submitting a patch -

        Mail it to the fvwm-workers mailing list
        <fvwm-workers@fvwm.org>.

        If your patch is large you should compress it (preferably with
        gzip).  Should it still be larger than 25k you might want to
        to place it on a web page and email the URL to the mailing
        list or ask on the fvwm-workers list first.

        Be sure to read the answer to Q5.1.

        Don't forget the ChangeLog and the documentation.

   Applying a patch -

        Get a copy of the program 'patch' from your favorite source,
        such as ftp://ftp.gnu.org/gnu/patch/, compile it, and then
        follow its directions (generally just cd into the appropriate
        directory and run 'patch < patchfile').

#### How do I submit a bug report?

  Please do not report any 'bugs' related to XMMS to the fvwm mailing
  lists but send them to the XMMS developers instead.

  Please write a DETAILED description of your problem.  By detailed we
  mean more than just "my window isn't behaving right" or
  "I found a bug":

    + If you want a template for a bug report, see the "fvwm-bug"
      shell script that comes with fvwm.
    + Describe the problem as best you can, preferably with
      suggestions on how to reproduce it easily
    + If applicable, include information from:
      xwininfo (preferably w/ the -all option)

                xprop
                FvwmIdent
                xdpyinfo (maybe)

    + What exact version of fvwm you are running.
    + What OS & version you are running under
    + What version of X11 are you running under, and is it an MIT
      server or a vendor specific server (e.g. the OpenWindow X
      server under SunOS)
    + How was fvwm compiled (compiler & version, options, etc)
    + What settings do you have in your config file that may be
      pertinent.

  This should be sent to the fvwm-workers mailing list.

#### I have a window that is behaving unexpectedly under fvwm, but just fine under (whatever other window manager), or I have just some random bug. What do I do?

  First, check your rc file and your .Xdefaults to make sure that
  something blatantly obvious in there isn't causing the problem.
  Second, *PLEASE PLEASE PLEASE* check the FAQ, BUGS, TODO, and man
  pages.  Finally, check the official WWW page and the mailing list
  archives (which have a search facility) stored there.

  If you still can't figure it out, report your problem as a bug
  (see Q5.3).

#### Why do NumLock, CapsLock and ScrollLock interfere with ClickToFocus and/or my mouse bindings?

  Because they are treated as modifiers.  You can use the
  IgnoreModifiers command to turn individual modifiers off for
  bindings.  With XFree86 and fvwm version 2.4.0 or above, the
  right command is

     IgnoreModifiers L25

  If you changed your modifiers manually or are using a different
  X server use the 'xmodmap' command to find out which modifiers
  correspond to the keys you want to switch off.

  This command creates a lot of extra network traffic, depending
  on your CPU, network connection, the number of Key, Mouse or
  PointerKey commands in your configuration file and the number
  of modifiers you want to ignore.  If you do not have a
  lightning fast machine or very few bindings you should not
  ignore more than two modifiers.  So do not ignore scroll-lock
  if you have no problem with it.

  A better way to solve this problem is to modify the keyboard
  mapping of your X server.  The commands

     xmodmap -e "clear Lock"
     xmodmap -e "clear Mod2"
     xmodmap -e "clear Mod5"

  remove the CapsLock, NumLock and ScrollLock from the keyboard
  map.  Pressing these keys has no effect then.  To re-add them
  try this:

     xmodmap -e "add Lock = Caps_Lock"
     xmodmap -e "add Mod2 = Num_Lock"
     xmodmap -e "add Mod5 = Scroll_Lock"

  Fvwm has to be restarted to use the changes made by
  xmodmap.  Please refer to the man page of the xmodmap command
  for further details.  If you disable the CapsLock key in your
  keyboard map in this way, you can speed up fvwm a bit by
  removing the Lock modifier from the list of ignored modifiers:

     IgnoreModifiers

  Since we all occasionally press NumLock or ScrollLock, it makes
  sense to redefine some main bindings to work with any modifiers.
  I.e. consider to replace something like this in your configuration:

     Mouse 1 R N Menu MenuFvwmRoot

  with this:

     Mouse 1 R A Menu MenuFvwmRoot

#### Menus with gradient backgrounds flicker or are very slow.

  The flickering is caused by fvwm constantly redrawing the menus
  when a sub menu pops up or down.  One way to help this is to use
  a X server with backing storage (XFree86 has backing storage
  support, I don't know about other servers but I guess that any
  decent X server has it).  If your Xserver is started with the
  -bs option, remove it.  If not try the -wm option, for example:

     startx -- -wm

  You may have to adapt this example to your system (e.g. if you
  use xinit to start X).

  If that doesn't help, either because your X server does not have
  backing storage or because system resources are limited, make
  sure sub menus do not overlap the parent menu:

     MenuStyle <stylename> PopupOffset 1 100

  Unfortunately this does not work properly with the fvwm
  menu style.

  For the speed problem both suggestions above might help too.
  Another thing to try is to turn hilighting of the active menu
  item other than by foreground color off.  Put these lines in your
  fvwm/config after the menu styles have been defined:

     MenuStyle <stylename> Hilight3DOff, HilightBackOff
     MenuStyle <Stylename> ActiveFore <preferred color>

#### Why won't the StartIconic style work with {Netscape, etc.}?

  The application won't allow it.  This has only been observed with
  Netscape.  When Netscape starts up, fvwm starts the main window in
  the iconic state.  Netscape immediately issues another MapRequest,
  to which the window manager must respond by de-iconifying the
  window, according to the ICCCM rules.  (Netscape can be persuaded
  to start iconic, however, by invoking it with the -iconic command
  line flag.)

#### How do I capture the output (e.g. errors) of fvwm?

  Errors are reported to the standard error file.  You can redirect
  standard error to a file when fvwm is started: "fvwm 2>
  fvwm-errors". X sessions started by xdm often redirect errors to a
  file named ".xsession-errors".

  Alternatively, FvwmConsole or "FvwmForm FvwmForm-Talk" modules
  will display error messages.

#### I try to run some program under fvwm, but it dies with an X11 error like BadAccess.  The same program works just fine under MWM or OLWM.  What's going on?

  The error message usually looks something like this:

        X Error of failed request:  BadAccess (attempt to access private
        resource denied)
         Major opcode of failed request:  28 (X_GrabButton)
         Serial number of failed request:  1595
         Current serial number in output stream:  1596

  Well, this is telling you that there is a conflict in key/button
  assignments.  In your config you have bound some key/button that
  this program really wants to bind to an action, but it can't since
  fvwm has already done so (but you weren't doing it in the rc file
  for your previous window manager).  Figure out what the offending
  key binding is and remove it from your fvwm/config, or temporarily
  via "FvwmForm FvwmForm-Talk" by removing the fvwm binding (see the
  man page for the Key & Mouse commands).

####  Every time I update my install, my currently running fvwm session dies.  Why is that?

  Many OSes swap the program from memory via the image on the disk,
  and if you overwrite it, and then the current one tries to swap
  something back into memory before you restart, it'll core dump.  To
  avoid this, rename your old executables or move them to some other
  directory.  The 'mv' command preserves the inode so it won't
  core dump, but then when you restart fvwm it'll pick up the new
  copy.

#### After I restart fvwm certain windows or icons raise above all other windows and cannot be lowered by any means. One example are the shortcuts of KFM (the KDE file manager). What can I do about that?

  Some applications use so called 'override redirect' windows that
  are not (and cannot be) managed by the window manager.  By
  convention as defined in the ICCCM, such windows must only be
  displayed for a very short time.  KFM and possibly other
  applications ignore this convention and use permanent 'override
  redirect' windows, e.g. the KFM shortcuts.  Fvwm can not easily
  detect these windows when it restarts and places the windows
  managed by fvwm below them.

  However, since fvwm version 2.3.8 there is a command that will
  help you, although it might cause trouble with other applications
  using 'override redirect' windows.  We can't make any promises
  since KFM is violating the conventions and the applications may
  violate them in different ways.

  Now the command.  Put this anywhere in your config file:

     BugOpts RaiseOverUnmanaged on

#### The StartsOnPage style does not work for me.  Why?

  Many applications request a specific position where they want to
  appear (the so called 'program specified position').  Unless fvwm
  is told explicitly to ignore this, the program specified position
  overrides the StartsOnPage style.  Use this line in your
  configuration file:

     Style * NoPPosition

#### Some modules can not be started when I restart fvwm.

  You may see the following error message on the console:

     [fvwm][PositiveWrite]: <<ERROR>> Failed to read descriptor:
     - data available=N
     - terminate signal=N

  It means that fvwm has given up waiting for one of its modules to
  reply, and so has killed it.  The length of the timeout is a
  configuration parameter - try adding

     ModuleTimeout 10

  to your config file.  The units are in seconds and the default
  value is 5.

  This problem will only occur on slow machines or high system load
  (many open windows).


#### I'm running Rational Rose and fvwm ignores its windows.

  This problem might occur on other applications besides the one
  mentioned.

  The symptoms as reported by Raymond Toy are:

     I've been using fvwm for ages and it's always worked for me just
     fine.  However, I've started using Rational Rose for Solaris.  fvwm
     seems to get completely confused.

     o Fvwm doesn't draw any frames around the Rose window like it
       does for all other windows (except for those I explicit said
       not to).

     o The Rose window is always on top.  Nothing I do can bring
       another window above the Rose window.

     o Using fvwm's identify window module shows nothing.  No identify
       window pops up showing the window info.

     o Focus sometimes seems to be lost.  (I have focus follows
       mouse).  I have to move the mouse out of the window and back in
       to get focus. Sometimes I also have to click in the window to
       get focus.

     The annoying thing is that this all seems to work with CDE and
     dtwm. I don't want to have to switch to dtwm so any hints or
     pointers on where to look to get fvwm to understand this window
     would help me a lot.


  Heres what we found out:

  Rational Rose uses software from Mainsoft that lets MS Windows
  applications be recompiled to run on UNIX.

  There are 2 Mainsoft Knowledgebase pages that relate to UNIX
  window managers:

        http://www.mainsoft.com/kb_mainwin/kbmw0027.html
        http://dev.mainsoft.com/Default.aspx?tabid=58 [KBMW0034]

  These pages suggest that you export MWWM=allwm or MWWM=MWM before
  starting the application. The first page is missing, but can be
  found using http://web.archive.org.

  Raymond reports:

     This works just fine!   Setting MWWM=allwm, Rose  comes
     up like a normal X app where  the WM draws the borders.
     With MWWM=MWM, it works ok too except that for the main
     window,  no borders are drawn  by the WM and Rose draws
     its own  borders (I  have  fvwm respecting   MWM decor
     hints).  (This   is     correct  as mentioned by    the
     Knowledgebase pages above.)   I don't  recall what Rose
     looks like with dtwm, but I suspect it's quite close to
     all MWWM=MWM.

  Next we had Klaus Zeitler report that the Rational Rose official
  startup script is explicitly setting ALLWM to nothing.  This makes
  it more difficult for an individual user to set this variable.
  If you can, you can just modify the script, otherwise, your other
  alternative is to copy the script somewhere where you can modify it
  and run it from there.

#### Although I use the WindowListSkip style for my modules they still show up in FvwmIconMan, FvwmWinList etc.

  Make sure you have

     *FvwmIconMan: UseWinList true

  in your config file.  If that does not help, the modules you are
  using may not match the fvwm executable.  Recompile and reinstall
  everything and the problem should go away.

#### When I Maximize an application, sometimes I get gaps around the edges, and other times I don't.  What's going on?

  The ICCCM specification allows applications to specify certain
  properties the window manager should honor, such as aspect
  ratio (PAspect) or increments to be resized in (PResizeInc).  Of
  course, sometimes these properties won't perfectly match the
  size of your desktop (or ewmh struts), if that should happen,
  you will get gaps.

  In general, the application will have a good reason for doing
  this (for example, a terminal window may not want to have only
  part of a column visible), but you can make fvwm ignore the
  hints with

     Style * ResizeHintOverride

