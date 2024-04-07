---
title: Fvwm History
showtitle: 1
description: |
  Here is a conversation that took place around 2005 about the history of Fvwm.

---
<style type="text/css">
  .historydominik { color:#aaaa00; width: 100%; }
  .historychuck   { color:#00aaaa; width: 100%; }
  .historyrobert  { color:#aa77aa; width: 100%; }
</style>


## Fvwm Timeline

+ Fvwm was created by Robert Nation as a fork of
  [TWM](https://en.wikipedia.org/wiki/Twm) and
  the first version 0.5 was bundled with [Rxvt](
  https://en.wikipedia.org/wiki/Rxvt) and released
  June 1st, 1993. This version was maintained until
  [Fvwm-0.91](https://github.com/fvwmorg/fvwm-0.91).
+ In the fall of 1993 Fvwm became an independent
  package and Fvwm-1.0 was released. This branch ended
  with the final release of [Fvwm-1.24r](
  https://github.com/fvwmorg/fvwm1).
+ In 1995 development of Fvwm2 was started
  and about that time Charles (Chuck) Hines took over
  and maintained Fvwm2 during the 2.0.x pre-release.
+ Fvwm switches to a version system that 2.even are
  stable releases while 2.odd are development releases.
  Starting with the development version 2.1.beta,
  Fvwm uses [CVS](
  https://en.wikipedia.org/wiki/Concurrent_Versions_System)
  to track the releases, and all releases from Fvwm 2.1.beta
  onward can be seen in the [Fvwm2 release history](
  https://github.com/fvwmorg/fvwm/releases).
+ Between spring and fall 1998 Charles Hines
  passes maintenance of Fvwm to Brady Montz who
  then passes it to Dominik Vogt.
+ Dominik Vogt transitions Fvwm from a single
  maintainer to a community model, and through
  a group of Fvwm-workers releases Fvwm
  2.2.x in February of 1999. With the release
  of 2.2.x, the development version 2.3.x starts.
+ At this time the list of [Fvwm authors](
  {{ site.baseurl }}/Archive/Authors/) gets
  quite large and there is no longer a single
  maintainer. From this point onward the
  Fvwm-workers community has continued to support
  and develop Fvwm.
+ On February 25, 2001, Version 2.2.5 is released.
  This is the last version of Fvwm with its
  original license before it switched to GPL-2
  in version 2.4.x. Due to this license change, OpenBSD
  still ships 2.2.5 in its base operating system
  to keep Fvwm with its original license.
+ Version 2.4.x is released July 3, 2001
  and the new development branch 2.5.x is started.
  This releases changes the license to GPL-2.
  The final release of this branch
  is 2.4.20 on December 9th, 2006.
+ Development of Fvwm slows to a crawl but the
  development branch 2.5.x slowly gets bug fixes
  and new features. Eventually this branch
  gets turned into the next stable release.
+ On August 15, 2011, version 2.6.x is released.
  During this release the development branch
  is deprecated and no longer used. Fvwm
  development slows to mostly bug fixes, but
  a few features are added to 2.6.x.
+ In March 2016 Fvwm moves from CVS
  to [GitHub](https://github.com/fvwmorg/fvwm),
  where the sources currently live.
+ In early 2017 Fvwm 2.6.x version freezes and
  is put in maintenance only development.
  [Fvwm3](https://github.com/fvwmorg/fvwm3)
  is created as a fork of Fvwm2 for any future
  development with the intent to break
  compatibility with Fvwm2 to allow major changes.
+ In 2019 Thomas Adam has started work
  on Fvwm 3.x, the next major Fvwm version,
  which is currently in the alpha stage.


## History Conversation

Here is a conversation that took place around 2005 about the history of Fvwm.
The conversation is between various authors of Fvwm including Dominik Vogt
(<code class="historydominik">DV</code>),
Charles (Chuck) Hines (<code class="historydominik">CH</code>), and Robert Nation
(<code class="historyrobert">RN</code>):


{% capture fvwmtxt %}
<pre class="historydominik">DV&gt; ((Chuck, are you still lurking?  Can you fill in the gaps before 1998?))</pre>
{% endcapture %}
{% include fvwmwindow.html id="dv1"
title="Dominik Vogt"
content=fvwmtxt color="yellow" %}


<p></p>



{% capture fvwmtxt %}
<pre class="historychuck">CH&gt; I am still lurking, yes, but not sure how much I can fill in as my memory is
CH&gt; getting a little fuzzy in my old age...I'll see what I can do... :)

CH&gt; I apologize for leaving all of the cited text in here.  I normally would trim
CH&gt; out most of it but for filling in a history it seemed appropriate to leave it
CH&gt; in.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="ch1"
title="Chuck Hines"
content=fvwmtxt color="alpine" %}


<p></P>


{% capture fvwmtxt %}
<pre class="historydominik">DV&gt; Robert Nation started it back in 1993.  The first time anything
DV&gt; was heard about it in public was on the 1st of June in 1993, when
DV&gt; Rob bundled a development version (0.5.something) with an rxvt
DV&gt; release (a still popular terminal program).  In the next few
DV&gt; months, fvwm became an independent package and fvwm-1.0 was
DV&gt; released in fall, still 1993.  Originally, the "F" in fvwm stood
DV&gt; for "feeble".  But then, Rob seems to have forgotten this at some
DV&gt; point in time and thus the famouse FAQ question 1.1 was born.  But
DV&gt; although there is strong evidence on the meaning of the "F" in old
DV&gt; new group archives, we nowadays prefer the "mysterious F"
DV&gt; interpretation ;-)
</pre>
{% endcapture %}
{% include fvwmwindow.html id="dv2"
title="Dominik Vogt"
content=fvwmtxt color="yellow" %}


<p></p>


{% capture fvwmtxt %}
<pre class="historychuck">CH&gt; I never agreed with "feeble" myself, even early on.  That was one of the
CH&gt; reasons I came up with that list in the FAQ, to provide alternate
CH&gt; possibilities, hopefully mostly positive.  Many of them were suggested in
CH&gt; emails on the mailing list, if I remember correctly.  Of course, I added the
CH&gt; explicitives to that list because they were what I most often used while
CH&gt; trying to figure out bugs. :)
</pre>
{% endcapture %}
{% include fvwmwindow.html id="ch2"
title="Chuck Hines"
content=fvwmtxt color="alpine" %}

<p></p>

{% capture fvwmtxt %}
<pre class="historyrobert">RN&gt; There were two or three reasons for starting FVWM and RXVT. First, I had
RN&gt; a need 33 MHZ 486 laptop PC with only 4 MB of RAM, and I thought linux and X11 were
RN&gt; way better than the windows versions of the day. X11 with TWM and xterm would run on
RN&gt; my PC, but just barely. Second, I had a need at work to analyze spectrograms which
RN&gt; were about 4000 x 200 pixels when displayed at full resolution (analyzing acoustic
RN&gt; signatures for the DOD) - twm couldn't display
RN&gt; that, although some other window managers could (they used more memory though!). Finally,
RN&gt; I thought it would be nice to learn a few GUI software skills.

RN&gt; I think I did rxvt first. The source code fro xterm was pretty hard to understand,
RN&gt; so I found xvt on the net somewhere. I cleaned it up a bit and improved its vt-100
RN&gt; compatibility in a few areas. Next, I tore apart twm to find out why it was so big, and
RN&gt; generated a very simple, low memory, low-flexibility version of a window manager. I added
RN&gt; the virtual desktop stuff and started using it at work too, since it could display my
RN&gt; spectrograms very nicely.

RN&gt; After I put the these things on the net, it was fun and educational for a while, as
RN&gt; the programs became more capable. But as my kids got a little older and needed more
RN&gt; attention from me), and the maintenance function got to be mostly integrating patches
RN&gt; from various people (and the patches had little or no utility to me), the fun went
RN&gt; away, and Chuck Hines stepped up to take over.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="rn1"
title="Robert Nation"
content=fvwmtxt color="crimson" %}


<p></p>


{% capture fvwmtxt %}
<pre class="historydominik">DV&gt; I know litte about what happened between 1993 and 1996.  Rob
DV&gt; stopped maintaining fvwm and Charles Hines took over the project
DV&gt; for several years(?).  When Chuck resigned, Brady Montz became
DV&gt; the new maintainer for a couple of months, I believe in late 1997
DV&gt; or early 1998.  Anyway, it took almost 8 month between the 2.0.45
DV&gt; release (22nd of January, 1997) and 2.0.46 (20th of August, 1997).
DV&gt; I can only guess why, but probably this was a foresign of Chuck's
DV&gt; approaching retirement.  At this time I had been using fvwm-2.0.x
DV&gt; for about two years at home and wanted to implement some of the
DV&gt; features I liked in CDE to fvwm.  In December 1997 I sent Brady my
DV&gt; patches and never got an answer.  I tried again half a year later,
DV&gt; and contacted the mailing list, but fvwm development was as dead
DV&gt; as it could be.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="dv3"
title="Dominik Vogt"
content=fvwmtxt color="yellow" %}


<p>
</p>


{% capture fvwmtxt %}
<pre class="historychuck">CH&gt; I believe that I maintained fvwm from Aug 95 through May of 98.

CH&gt; I had been using it actively from an early point (probably right around the
CH&gt; 1.0 version, but I can't be sure, I have some saved emails about fvwm from
CH&gt; early in 1994 and I know I had been using it for a while before then).  I was
CH&gt; working at IBM and the machines we had at the time while fairly powerful were
CH&gt; still brought to their virtual knees by mwm, so I believe I searched USENET
CH&gt; (comp.windows.x.apps) for a good replacement.  Found fvwm and never looked
CH&gt; back... :)

CH&gt; I kept a close eye on fvwm after discovering it (I believe there was a mailing
CH&gt; list at "fvwm@shrug.org", and stuff on comp.windows.x.apps of course).  I
CH&gt; contributed a couple of minor patches to fvwm in those earlier days, like to
CH&gt; get it to compile nicely under AIX and some stuff with colormap behavior (I'm
CH&gt; so happy to not have an 8bit display any more).  By the way, if anyone has (or
CH&gt; can track down) any archives of that earlier mailing list, it'd probably be
CH&gt; pretty cool to resurrect them...
CH&gt;
CH&gt; Then one day Rob had sent out a message (on the mailing list, I believe) that
CH&gt; stated something to the effect that he didn't want to work on fvwm any more,
CH&gt; and was looking for someone else to maintain it.  I wanted to offer to take it
CH&gt; over (as an X11 learning experience - I had dealt with X at the toolkits level
CH&gt; but was curious about the more low level stuff) but didn't feel I had the time
CH&gt; to properly devote to it so I didn't say anything at first.
CH&gt;
CH&gt; Then after about 2 weeks of watching people say "I'd love to, but I can't
CH&gt; program" I figured I'd better make that offer after all, qualifying it with
CH&gt; something like "I don't know if I have time to do this right, but I'm willing
CH&gt; to make an attempt".  Rob remembered my previous contributions and figured I'd
CH&gt; be able to make a go at it, so he turned it over to me.  That was version
CH&gt; "pre-2.0-patchlevel-33" if I remember correctly.
CH&gt;
CH&gt; Then I worked on it sporadically over the next couple of years.  At first I
CH&gt; wasn't too bad about getting releases out, but the length of time between each
CH&gt; one got longer as "real life" invaded.  Another part of the problem was
CH&gt; because I did use it as a learning experience, I would often rewrite patches
CH&gt; that were submitted to me so I really understood what was happening and with
CH&gt; an eye towards making things "easier" in the future (which I'm sure pissed off
CH&gt; a couple of people, but at the time I thought I had good reasons for doing
CH&gt; things that way).
CH&gt;
CH&gt; Finially I had to admit that I just didn't have the time to properly devote to
CH&gt; it any more.  So it May of 1998 (I believe) I sent some email privately to
CH&gt; Brady Montz, as I felt that the stuff he contributed showed him to have the
CH&gt; most promise for taking it over at the time, and he (reluctantly?) agreed to
CH&gt; give it a shot.
CH&gt;
CH&gt; And you know the rest of the story from there...  I wish I could have done
CH&gt; (and learned) more, but I'm happy to have done my part.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="ch3"
title="Chuck Hines"
content=fvwmtxt color="alpine" %}


<p></p>


{% capture fvwmtxt %}
<pre class="historydominik">DV&gt; Then - I believe it was in September or October (I have to look
DV&gt; this up in the mailing list archive) - Brady resigned and
DV&gt; everybody on the mailing list thought this would finally be the
DV&gt; end of fvwm development.  Seeing this and not willing to give up
DV&gt; fvwm this easily, I took over the job as fvwm maintainer for the
DV&gt; moment.  After a lot of discussion we agreed that we should try to
DV&gt; make a first stable release in the 2.x series as soon as possible.
DV&gt; With a great team effort we were able to resolve the most pressing
DV&gt; issues and managed to get the stable 2.2.0 release out the door
DV&gt; in February 1999.  (I want to thank all the people who helped to
DV&gt; make it possible back then).

DV&gt; My memory of the sequence of events is a bit foggy.  Some time in
DV&gt; late 1998 or early 1999 we decided that having a single maintainer
DV&gt; as the master over the code wasn't such a hot idea.  In the past,
DV&gt; people had been eager to work on fvwm but had been hindered by the
DV&gt; maintainer, or more precisely:  by the absence of a maintainer.
DV&gt; As a result, almost no work had been done in fvwm for over one and
DV&gt; a half years.  So I gave up my role as the maintainer and the
DV&gt; responsibilities were since taken over by the people on the
DV&gt; fvwm-workers list.  Unfortunatly I'm still stuck with most of the
DV&gt; project organizing work.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="dv4"
title="Dominik Vogt"
content=fvwmtxt color="yellow" %}


<p></p>

{% capture fvwmtxt %}
<pre class="historychuck">CH&gt; I have to admit that at the time I didn't think the "rule by committee" stuff
CH&gt; was going to work with fvwm, but all in all it seems to have worked out pretty
CH&gt; well.  I think that a lot of that has to do with the fact that you were there
CH&gt; to steer it's course.  Having some other pretty sharp individuals contributing
CH&gt; helps too, of course. :)
</pre>
{% endcapture %}
{% include fvwmwindow.html id="ch4"
title="Chuck Hines"
content=fvwmtxt color="alpine" %}


<p></p>


{% capture fvwmtxt %}
<pre class="historydominik">DV&gt; Anyway, since that day in October 1998 when a complete X newbie
DV&gt; couldn't keep his mouth shut fvwm development is as active as it
DV&gt; will ever be.  Some of the people that helped to make 2.2 possible
DV&gt; left and some became less active, but we still have an excellent
DV&gt; team here (with a weakness in writing documentation).  Although
DV&gt; I'd rather not single out anyone, I have to mention Olivier
DV&gt; Chapuis and Mikhael Goikhman who are doing an excellent job in
DV&gt; providing some framework (configure, fvwm-themes,
DV&gt; internationalization, not to mention all the nifty features in the
DV&gt; fvwm core they have written).  Although at times it might appear
DV&gt; as if I am the one that keeps fvwm alive, fvwm wouldn't be half as
DV&gt; good without the help of the many people on the mailing lists, be
DV&gt; it by writing bug reports, complaining about missing features,
DV&gt; answering questions of other users or simply encouraging us to
DV&gt; continue our work.

DV&gt; What about the future?  Well, the work for the next stable series
DV&gt; (2.6.x) is proceeding very well.  Fvwm will go into feature freeze
DV&gt; again near the end of the year so that 2.6 is ready before fvwm's
DV&gt; tenth birthday on 1st of June, 2003.  I have vague plans for a
DV&gt; big event on that day to remind people that fvwm is still there
DV&gt; and that it can easily compete with any other window manager.
DV&gt; After that there are plans for a version 3.0 that would change a
DV&gt; lot of the syntax and introduce fantastic new features, but that's
DV&gt; too far from now.
</pre>
{% endcapture %}
{% include fvwmwindow.html id="dv5"
title="Dominik Vogt"
content=fvwmtxt color="yellow" %}


<p></p>


{% capture fvwmtxt %}
<pre class="historychuck">CH&gt; Ah the future...scary and exciting... :)
</pre>

<pre class="historychuck">&gt;&gt; Perhaps it'd be worthy of a page on the FVWM website too?
</pre>

<pre class="historydominik">DV&gt; That is definitely going to be done for fvwm's birthday.
</pre>

<pre class="historychuck">CH&gt; Cool.

CH&gt; Hope my feedback helped fill in some more of the blanks.

CH&gt; Later,
CH&gt; Chuck
</pre>
{% endcapture %}
{% include fvwmwindow.html id="end"
title="Farewell"
content=fvwmtxt color="arizona" %}


