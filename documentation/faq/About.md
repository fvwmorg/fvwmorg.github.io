About Fvwm
==========

####  What does fvwm stand for?

  "Fill_in_the_blank_with_whatever_f_word_you_like_at_the_time
  Virtual Window Manager".  Rob Nation (the original Author of fvwm)
  doesn't really remember what the F stood for originally, so we
  have several potential answers:

     Feeble, Fabulous, Famous, Fast, Foobar, Fantastic, Flexible,
     F!@#$%, Flashy, fvwm (the GNU recursive approach), Free, Final,
     Funky, Fred's (who the heck is Fred?), Freakin', Flawed,
     Father-of-all, Feivel (the mouse from "An American Tail"),
     Frungy (hey, where does that come from?), Floppy, Foxy,
     Frenzied, Funny, Fumbling etc.

  Just pick your Favorite (hey, there's another one!), which will of
  course change depending on your mood and whether or not you've run
  across any bugs recently.  I prefer Fabulous or Fantastic myself,
  although I often use F!@#$% or Freakin' while debugging...

  Recently 'Feline' is becoming popular.  Perhaps this has something
  to do with the discovery that four of the six core developers have
  cats (averaging 1.17 cats)?  Miaow.

  Know what? I found another one while stroking my cats: FEEDING :-)

  Check this link: http://fvwm.org/fvwm-cats/

#### Where do I find the current version of fvwm?

  The source code and releases can all be found on GitHub.

      http://github.com/fvwmorg

   Versions older than 2.6.x are no longer supported.


#### Any WWW Sites about fvwm?

  Yup.  The official site is:

        http://www.fvwm.org/

  There are links on the official site to other related fvwm sites.

#### Where do I ask questions about fvwm?

  If your local fvwm maintainer can't help you, then try the fvwm
  mailing list.  The fvwm discussion mailing list address is:

                           fvwm@fvwm.org

  And there is an announce mailing list as well:

                       fvwm-announce@fvwm.org

  They are maintained by Jason Tibbitts, and are Majordomo based
  mailing lists.  Check the support page for more details.

      http://fvwm.org/support

#### What are the differences between fvwm 1.xx and 2.xx?

  __OLD__

  A lot.  To name a few general ones:
        - Bug fixes.  1.xx is not worked on at all any more.
        - Better rc file format.  No longer order dependent.
        - More flexible and powerful.  For example, many previously
          global options now operate on a per window group level
          instead.
        - More and better modules.
        - M4 preprocessing is no longer part of the fvwm exec, but
          rather has been moved to a module.  There is also a module
          to use cpp too.  See the FvwmM4 and FvwmCpp man pages.

#### What's the relative memory usage for the various window managers out there?

  __OLD__

  Here's a little table comparing some of them.  It was done on an
  AIX based IBM RS6000 model 355 using the same number of windows (3)
  and XSession to switch between the window managers, and I used
  'top' to show the values:

      SIZE   RES
      545K  652K fvwm2 (fvwm 2.0.35)
      457K  528K fvwm  (fvwm 1.24rb)
      856K  960K ctwm  (ctwm 3.2p1)
     1004K 1156K mwm   (mwm 1.2)
      543K  632K twm   (???)
      263K  328K aixwm (a simple ugly window manager included w/ aix)

   Note: This information is terribly outdated.

#### Why the rename of the various files (config, fvwm2, .fvwm2rc, fvwm2.man)?

  Some people find this annoying, but it was done for several reasons:

        - so both 1.xx and 2.xx can be installed for use, in case some
          people at the same site would rather stay at 1.xx
        - the syntax of the rc files is pretty different and
          completely incompatible
        - when people ask questions, if they explicitly mention their
          .fvwm2rc file I know that they are running one of the 2.xx
          versions, since they rarely mention exactly what version
          they are running.

  Note, starting from 2.5.1, the executable fvwm2 became fvwm again.
  Also, starting from 2.5.11, the default config file is either
  personal ~/.fvwm/config or system wide $datadir/fvwm/config.
  So, we completely returned to the "fvwm" name.

#### When will fvwm release X.Y.Z be ready?

  This is always a difficult question to answer.  We work on fvwm on
  a volunteer basis.  Things get done when we have the time.

  Joining the fvwm-workers mailing list might prove instructive.


