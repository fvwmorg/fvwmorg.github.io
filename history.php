<?php
//--------------------------------------------------------------------
//-  File          : history.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - History";
$link_name      = "History";
$link_picture   = "pictures/icons/history";
$parent_site    = "home";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "history";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>


<?php decoration_window_start("Read about the history of fvwm"); ?>

<pre class="historydominik">
>>>>> "DV" == Dominik Vogt <dominik.vogt@gmx.de> writes:

DV> ((Chuck, are you still lurking?  Can you fill in the gaps before
DV> 1998?))
</pre>

<pre class="historychuck">
CH> I am still lurking, yes, but not sure how much I can fill in as my memory is
CH> getting a little fuzzy in my old age...I'll see what I can do... :)

CH> I apologize for leaving all of the cited text in here.  I normally would trim
CH> out most of it but for filling in a history it seemed appropriate to leave it
CH> in.
</pre>

<pre class="historydominik">
DV> Robert Nation started it back in 1993.  The first time anything
DV> was heard about it in public was on the 1st of June in 1993, when
DV> Rob bundled a development version (0.5.something) with an rxvt
DV> release (a still popular terminal program).  In the next few
DV> months, fvwm became an independent package and fvwm-1.0 was
DV> released in fall, still 1993.  Originally, the "F" in fvwm stood
DV> for "feeble".  But then, Rob seems to have forgotten this at some
DV> point in time and thus the famouse FAQ question 1.1 was born.  But
DV> although there is strong evidence on the meaning of the "F" in old
DV> new group archives, we nowadays prefer the "mysterious F"
DV> interpretation ;-)
</pre>

<pre class="historychuck">
CH> I never agreed with "feeble" myself, even early on.  That was one of the
CH> reasons I came up with that list in the FAQ, to provide alternate
CH> possibilities, hopefully mostly positive.  Many of them were suggested in
CH> emails on the mailing list, if I remember correctly.  Of course, I added the
CH> explicitives to that list because they were what I most often used while
CH> trying to figure out bugs. :)
</pre>

<pre class="historyrobert">
RN> There were two or three reasons for starting FVWM and RXVT. First, I had
RN> a need 33 MHZ 486 laptop PC with only 4 MB of RAM, and I thought linux and X11 were 
RN> way better than the windows versions of the day. X11 with TWM and xterm would run on 
RN> my PC, but just barely. Second, I had a need at work to analyze spectrograms which
RN> were about 4000 x 200 pixels when displayed at full resolution (analyzing acoustic 
RN> signatures for the DOD) - twm couldn't display 
RN> that, although some other window managers could (they used more memory though!). Finally,
RN> I thought it would be nice to learn a few GUI software skills.

RN> I think I did rxvt first. The source code fro xterm was pretty hard to understand,
RN> so I found xvt on the net somewhere. I cleaned it up a bit and improved its vt-100 
RN> compatibility in a few areas. Next, I tore apart twm to find out why it was so big, and
RN> generated a very simple, low memory, low-flexibility version of a window manager. I added
RN> the virtual desktop stuff and started using it at work too, since it could display my
RN> spectrograms very nicely. 

RN> After I put the these things on the net, it was fun and educational for a while, as
RN> the programs became more capable. But as my kids got a little older and needed more
RN> attention from me), and the maintenance function got to be mostly integrating patches 
RN> from various people (and the patches had little or no utility to me), the fun went
RN> away, and Chuck Hines stepped up to take over.
</pre>

<pre class="historydominik">
DV> I know litte about what happened between 1993 and 1996.  Rob
DV> stopped maintaining fvwm and Charles Hines took over the project
DV> for several years(?).  When Chuck resigned, Brady Montz became
DV> the new maintainer for a couple of months, I believe in late 1997
DV> or early 1998.  Anyway, it took almost 8 month between the 2.0.45
DV> release (22nd of January, 1997) and 2.0.46 (20th of August, 1997).
DV> I can only guess why, but probably this was a foresign of Chuck's
DV> approaching retirement.  At this time I had been using fvwm-2.0.x
DV> for about two years at home and wanted to implement some of the
DV> features I liked in CDE to fvwm.  In December 1997 I sent Brady my
DV> patches and never got an answer.  I tried again half a year later,
DV> and contacted the mailing list, but fvwm development was as dead
DV> as it could be.
</pre>

<pre class="historychuck">
CH> I believe that I maintained fvwm from Aug 95 through May of 98.

CH> I had been using it actively from an early point (probably right around the
CH> 1.0 version, but I can't be sure, I have some saved emails about fvwm from
CH> early in 1994 and I know I had been using it for a while before then).  I was
CH> working at IBM and the machines we had at the time while fairly powerful were
CH> still brought to their virtual knees by mwm, so I believe I searched USENET
CH> (comp.windows.x.apps) for a good replacement.  Found fvwm and never looked
CH> back... :)

CH> I kept a close eye on fvwm after discovering it (I believe there was a mailing
CH> list at "fvwm@shrug.org", and stuff on comp.windows.x.apps of course).  I
CH> contributed a couple of minor patches to fvwm in those earlier days, like to
CH> get it to compile nicely under AIX and some stuff with colormap behavior (I'm
CH> so happy to not have an 8bit display any more).  By the way, if anyone has (or
CH> can track down) any archives of that earlier mailing list, it'd probably be
CH> pretty cool to resurrect them...
CH> 
CH> Then one day Rob had sent out a message (on the mailing list, I believe) that
CH> stated something to the effect that he didn't want to work on fvwm any more,
CH> and was looking for someone else to maintain it.  I wanted to offer to take it
CH> over (as an X11 learning experience - I had dealt with X at the toolkits level
CH> but was curious about the more low level stuff) but didn't feel I had the time
CH> to properly devote to it so I didn't say anything at first.
CH> 
CH> Then after about 2 weeks of watching people say "I'd love to, but I can't
CH> program" I figured I'd better make that offer after all, qualifying it with
CH> something like "I don't know if I have time to do this right, but I'm willing
CH> to make an attempt".  Rob remembered my previous contributions and figured I'd
CH> be able to make a go at it, so he turned it over to me.  That was version
CH> "pre-2.0-patchlevel-33" if I remember correctly.
CH> 
CH> Then I worked on it sporadically over the next couple of years.  At first I
CH> wasn't too bad about getting releases out, but the length of time between each
CH> one got longer as "real life" invaded.  Another part of the problem was
CH> because I did use it as a learning experience, I would often rewrite patches
CH> that were submitted to me so I really understood what was happening and with
CH> an eye towards making things "easier" in the future (which I'm sure pissed off
CH> a couple of people, but at the time I thought I had good reasons for doing
CH> things that way).
CH> 
CH> Finially I had to admit that I just didn't have the time to properly devote to
CH> it any more.  So it May of 1998 (I believe) I sent some email privately to
CH> Brady Montz, as I felt that the stuff he contributed showed him to have the
CH> most promise for taking it over at the time, and he (reluctantly?) agreed to
CH> give it a shot.
CH> 
CH> And you know the rest of the story from there...  I wish I could have done
CH> (and learned) more, but I'm happy to have done my part.
</pre>

<pre class="historydominik">
DV> Then - I believe it was in September or October (I have to look
DV> this up in the mailing list archive) - Brady resigned and
DV> everybody on the mailing list thought this would finally be the
DV> end of fvwm development.  Seeing this and not willing to give up
DV> fvwm this easily, I took over the job as fvwm maintainer for the
DV> moment.  After a lot of discussion we agreed that we should try to
DV> make a first stable release in the 2.x series as soon as possible.
DV> With a great team effort we were able to resolve the most pressing
DV> issues and managed to get the stable 2.2.0 release out the door
DV> in February 1999.  (I want to thank all the people who helped to
DV> make it possible back then).

DV> My memory of the sequence of events is a bit foggy.  Some time in
DV> late 1998 or early 1999 we decided that having a single maintainer
DV> as the master over the code wasn't such a hot idea.  In the past,
DV> people had been eager to work on fvwm but had been hindered by the
DV> maintainer, or more precisely:  by the absence of a maintainer.
DV> As a result, almost no work had been done in fvwm for over one and
DV> a half years.  So I gave up my role as the maintainer and the
DV> responsibilities were since taken over by the people on the
DV> fvwm-workers list.  Unfortunatly I'm still stuck with most of the
DV> project organizing work.
</pre>

<pre class="historychuck">
CH> I have to admit that at the time I didn't think the "rule by committee" stuff
CH> was going to work with fvwm, but all in all it seems to have worked out pretty
CH> well.  I think that a lot of that has to do with the fact that you were there
CH> to steer it's course.  Having some other pretty sharp individuals contributing
CH> helps too, of course. :)
</pre>

<pre class="historydominik">
DV> Anyway, since that day in October 1998 when a complete X newbie
DV> couldn't keep his mouth shut fvwm development is as active as it
DV> will ever be.  Some of the people that helped to make 2.2 possible
DV> left and some became less active, but we still have an excellent
DV> team here (with a weakness in writing documentation).  Although
DV> I'd rather not single out anyone, I have to mention Olivier
DV> Chapuis and Mikhael Goikhman who are doing an excellent job in
DV> providing some framework (configure, fvwm-themes,
DV> internationalization, not to mention all the nifty features in the
DV> fvwm core they have written).  Although at times it might appear
DV> as if I am the one that keeps fvwm alive, fvwm wouldn't be half as
DV> good without the help of the many people on the mailing lists, be
DV> it by writing bug reports, complaining about missing features,
DV> answering questions of other users or simply encouraging us to
DV> continue our work.

DV> What about the future?  Well, the work for the next stable series
DV> (2.6.x) is proceeding very well.  Fvwm will go into feature freeze
DV> again near the end of the year so that 2.6 is ready before fvwm's
DV> tenth birthday on 1st of June, 2003.  I have vague plans for a
DV> big event on that day to remind people that fvwm is still there
DV> and that it can easily compete with any other window manager.
DV> After that there are plans for a version 3.0 that would change a
DV> lot of the syntax and introduce fantastic new features, but that's
DV> too far from now.
</pre>

<pre class="historychuck">
CH> Ah the future...scary and exciting... :)
</pre>

<pre>
>> Perhaps it'd be worthy of a page on the FVWM website too?
</pre>

<pre class="historydominik">
DV> That is definitely going to be done for fvwm's birthday.
</pre>

<pre class="historychuck">
CH> Cool.

CH> Hope my feedback helped fill in some more of the blanks.

CH> Later,
CH> Chuck
</pre>

<?php decoration_window_end() ?>
