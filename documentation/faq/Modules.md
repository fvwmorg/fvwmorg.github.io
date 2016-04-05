Modules
=======

#### I'm using FvwmButtons (or GoodStuff in 1.xx), and sometimes the buttons stay depressed, and other times they don't. Why is that?

  From the FvwmButtons man page:

       If command is an fvwm Exec command, then the button
       will remain pushed in until a window whose name or
       class matches the quoted portion of the command is
       encountered.  This is intended to provide visual
       feedback to the user that the action he has requested
       will be performed.  If the quoted portion contains no
       characters, then the button will pop out immediately.
       Note that users can continue pressing the button, and
       re-executing the command, even when it looks "pressed
       in."

#### When having FvwmButtons swallow an app, is it possible to have button presses assigned to actions as well?  For instance, I'd like to swallow xload and have a button press pop up an xterm, or swallow xbiff and have a button press bring up the list of messages.

  Yes, with the alpha release 2.5.0 or any later release.  For older
  releases, read on.

  The button presses normally get passed through to the swallowed
  application, but if you put a title on the button, you can
  assign actions to that. Here's an example that someone sent to
  the mailing list once:

    *FvwmButtons(1x4,       \
      Title           'System Info', \
      Swallow         "xload" 'Exec xload', \
      Action(Mouse 1) 'Exec xosview -cua0 -net 200 -ul -l -geometry 325x325', \
      Action(Mouse 2) 'Exec xcpustate -interval 1 -bg "#a4978e" -fg black', \
      Action(Mouse 3) 'Exec rxvt -fg "khaki" -bg "dark olive green" \
                           -fat -n top -T Top -7 -e top' )

  And you could come up with something similar for xbiff (untested):

    *FvwmButtons(1x2, \
      Title 'Check Mail' Swallow "xbiff" 'Exec xbiff', \
      Action(Mouse 1) 'Exec from | xmessage -file -' )

  plus you could bind another button (say Mouse 3) to run your
  mail program.

  Sometime in the future I'll probably try and fix it so that you can
  actually assign a button press over the application itself...

#### I'm seeing odd things when trying to preprocess files with the FvwmM4/Cpp module...

  Yup, I imagine that you might be.  Things like the InitFunction not
  being called or windows that were running before fvwm started not
  getting their Borders & Style options set, etc.

  The reason for all this is because of the fact that FvwmM4 is a
  module.  Fvwm won't be looking at the commands coming back from
  the module until after it hits the main loop of the code, AFTER the
  startup is all done and it has already tried to execute the
  InitFunction.

  To force synchronous execution of FvwmM4/Cpp use:

     ModuleSynchronous FvwmM4/Cpp -lock filename

  See the man page for more details.

#### I heard about this FvwmFileMgr module.  Where can I find it?

 The FvwmFileMgr module disappeared because a file manager doesn't
 need to be integrated with a window manager and something like xfm
 does a much better job.  I recommend you pick that up instead (from
 ftp.x.org or your favorite mirror).

#### I used to use GoodStuff in fvwm 1.xx, but it's not in the 2.xx distribution. What do I use now?

  GoodStuff was renamed to FvwmButtons.  Same module, new name (that
  fits in with the other modules naming convention).

#### I want to have the sub panels in FvwmButtons not at their default position near the button but somewhere else on the screen. Is this possible?

  Yes, but not with the current implementation of the panels.  Please
  read question 7.12 for instructions.

#### How can I open a sub panel or push buttons in FvwmButtons with a keyboard shortcut?

  FvwmButtons does not support keyboard shortcuts itself.  Since
  fvwm version 2.3.24 the FakeClick command can be used to
  simulate a click in the FvwmButtons window:

    fvwm-2.3.24 or later:

    DestroyFunc press_fvwmbuttons
    AddToFunc press_fvwmbuttons
    + I Next (FvwmButtons, CirculateHit) WarpToWindow $1 $2
    + I FakeClick depth 2 press $0 release $0

  fvwm-2.5.1 or later (moves the pointer back to the original position):

    DestroyFunc press_fvwmbuttons
    AddToFunc press_fvwmbuttons
    + I SetEnv pointer_x $[pointer.x]
    + I SetEnv pointer_y $[pointer.y]
    + I Next (FvwmButtons, CirculateHit) WarpToWindow $1 $2
    + I FakeClick depth 2 press $0 release $0
    + I WindowId root WarpToWindow $[pointer_x]p $[pointer_y]p

  With this function, you can warp the pointer to the desired
  button to press and simulate a click.  Call it with

     press_fvwmbuttons btn xoff yoff
                         ^    ^    ^
                         |    |    |___ y offset of the button
                         |    |________ x offset of the button
                         |_____________ button to press

  For example, if the button of a panel is at 30% of FvwmButtons'
  width and 10% of its height and you want to simulate mouse
  button 1, issue

    press_fvwmbuttons 1 30 10

  You can bind this to a key.  For example:

     Key f1 a n press_fvwmbuttons 1 30 10

  Note that this solution does not work well if the mouse is moved at
  the same time.

  With fvwm-2.5.24 or later (using SendToModule) a much better
  solution is:

      SendToModule buttons-alias PressButton A 1

  This would send the FvwmButtons instance "button-alias" a command
  to invoke the action that button "A" has as though the button were
  clicked with mouse button 1.  For instance:

      *button-alias: (Id A, Title "My Button", Action (Mouse 1) \
         `Exec exec xcalc`)

