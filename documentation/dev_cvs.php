<?php
//--------------------------------------------------------------------
//-  File          : dev_cvs.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - CVS";
$heading        = "FVWM - CVS Information";
$link_name      = "CVS Information";
$link_picture   = "pictures/icons/doc_cvs";
$parent_site    = "developers";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php","","$requested_file");

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("CVS Information");
?>


<p>
FVWM development uses a CVS server.

  <p>
    <b>Note:</b> the state of code in the CVS repository fluctuates
    wildly.  It will contain bugs, maybe ones that crash the program.  It
    may not even compile for you.  Consider it alpha-quality code.
    You have been warned.
  </p>

  <h3>Contents</h3>
  <ul>
    <li> <a href="#before">Before You Begin</a></li>
    <li> <a href="#initial">Initial Setup</a></li>
    <li> <a href="#checkout">Checking Out Source Code</a></li>
    <li> <a href="#build">Building The Tree</a></li>
    <li> <a href="#update">Code Updates</a></li>
    <li> <a href="#newproj">Starting a Project</a></li>
    <li> <a href="#hacking">Hacking the Code</a></li>
    <li> <a href="#conflicts">Conflicts</a></li>
    <li> <a href="#access">Getting Commit Access</a></li>
    <li> <a href="#commits">Committing Changes</a></li>
    <li> <a href="#adding">Adding Directories and Files</a></li>
    <li> <a href="#removing">Deleting Directories and Files</a></li>
    <li> <a href="#renaming">Renaming/Moving Files</a></li>
    <li> <a href="#branching">Creating New Branches</a></li>
    <li> <a href="#trees">Creating New Source Trees</a></li>
    <li> <a href="#fvwm-web">Working on the fvwm-web Source Tree</a></li>
  </ul>

  <a name="before"></a>
  <h3>Before You Begin <a href="#top">[top]</a></h3>
  <p>
    To know what is going in with the source tree you should be reading
    mail on the Fvwm Workers List.  See the 
    <a href="mailinglist.html">Mailing List Info</a> page for more
    information.
  </p>

  <p>
    To build FVWM from the CVS sources, you <strong>must</strong> have
    several <a href="http://www.gnu.org/">GNU</a> tools:
  </p>

  <ul>
    <li>the <a href="http://www.gnu.org/software/cvs/cvs.html">CVS</a> 
      client version 1.9 or better,</li>
    <li><a href="http://www.gnu.org/software/gcc/gcc.html">GCC</a>,</li>
    <li><a href="http://www.gnu.org/software/make/make.html">GNU make</a>,</li>
    <li><a href="http://www.gnu.org/software/autoconf/autoconf.html">autoconf</a>,
      version 2.13 or better, and</li>
    <li><a href="http://www.gnu.org/software/automake/automake.html">automake</a>, 
      version 1.4 or better.</li>
  </ul>

  <p> 
    Without these tools, you won't be able to build out of the CVS
    source tree.  But don't despair: download one of the 
    <a href="ftp://ftp.fvwm.org/pub/fvwm/devel/snapshots/">daily snapshots</a> 
    instead!
  </p>


  <a name="initial"></a>
  <h3>Initial Setup <a href="#top">[top]</a></h3>

  <p> 
    To make life easier on yourself, create the file
    `<code>~/.cvsrc</code>', and insert the following lines.  These set
    useful default options for the three most used CVS commands.  Do this
    now before going any further.
  </p>

<pre class="cvs">
diff -u
checkout -P
update -d -P
cvs -q
</pre>

  <p>
    The last line makes cvs operations quieter, but you still get full
    error messages.
  </p>

  <p>
    Also, if you are on a slow net link (like a dialup), you'll also want a
    line containing `<code>cvs -z3</code>' in this file.  This turns on a
    useful compression level for all cvs commands.  Setting it higher will
    only waste your CPU time.
  </p>

  <p> 
    Before you can download development source code for the first time,
    you must login to the server:
  </p>

  <p class="cmdline">
    cvs -d :pserver:anonymous@cvs.fvwm.org:/home/cvs/fvwm login
  </p>

  <p>
    The password is `<code>guest</code>'.  The command outputs nothing if it
    works, and an error message if it failed.  You only need to log in once;
    all subsequent CVS commands read the password stored in the file
    `<code>~/.cvspass</code>'.
  </p>

  <a name="checkout"></a>
  <h3>Checking Out Source Code <a href="#top">[top]</a></h3>

  <p>
    Next, you checkout the source code.  First you must decide what
    version you're interested in.  The structure of the CVS tree is as
    follows:
  </p>

  <ul>
    <li> The latest code is on branch-2_6.</li>

    <li> All branches are labeled as <code>branch-ver</code>.
      So, for example, as development of the 2.3.x (latest) code continues on
      the main branch, a branch <code>branch-2_2</code> has been created for
      changes that would go into a 2.2.1 or future release.</li>

    <li> At various points we decide to checkpoint the code with a version
      number change; there is always a label associated with every version
      number as well.  The label will have the format
      <code>version-ver</code>; for example,
      <code>version-2_1_13</code> or <code>version-2_2_1</code>.</li>
  </ul>

  <p> 
    Given these rules, you should be able to translate the version of
    you want to retrieve to a label for use with the checkout command below
    (or other CVS commands which might need them).
  </p>
  
  <p> 
    You use the CVS <code>checkout</code> (or <code>co</code>) command
    to retrieve an initial copy of the code.  The simplest form of this
    command, for retrieving the latest code, doesn't require any label:
  </p>

  <p class="cmdline">
    cvs -d :pserver:anonymous@cvs.fvwm.org:/home/cvs/fvwm checkout -r branch-2_6 fvwm
  </p>

  <p> 
    If you want to see a particular version of the sources you
    can use a version label instead of a branch label on the checkout
    command:
  </p>

  <p class="cmdline">
    cvs -d :pserver:anonymous@cvs.fvwm.org:/home/cvs/fvwm co -r version-2_1_10 -d fvwm-2.1.10 fvwm
  </p>
  
  <p> 
    Please note that if you check out a specific <em>version</em>, the
    update command will be useless in that copy: after all, the code for
    that version hasn't changed so there's nothing to update...
  </p>

  <p> 
    The version and branch labels "stick" to your copy of the tree, so
    that if you check out a branch, all update commands will be handled with
    respect to that branch.  These are called "sticky tags"; please see the
    CVS documentation for more details on these and how they work, or how to
    "un-stick" a checked out version if you need to.
  </p>

  <p>
    Note that when you are inside the working directory, you no longer
    need the "<code>-d :pserver:...</code>" argument when issuing CVS
    commands.
  </p>

  <p>
    CVS commands work from <em>anywhere</em> inside the source tree, and
    recurse downwards.  So if you happen to issue an update from inside the
    `<code>docs</code>' subdirectory it will work fine, but only update the
    docs.  In all of the following command examples, we assume that you have
    <em>cd</em>'d to the top of the source tree.
  </p>

  <a name="build"></a> 
  <h3>Building the Tree <a href="#top">[top]</a></h3>

  <p> 
    So, you now have a copy of the code.  Get in there and get to work!
  </p>

  <p> 
    The first thing you need to do is create a <code>configure</code>
    script.  The <code>configure</code> script will also need the
    <code>Makefile.in</code> files in order to generate the
    <code>Makefile</code>s.  The <code>autoconf</code> and
    <code>automake</code> tools do this for you (you <em>did</em> remember
    to install autoconf and automake, right?)
  </p>

  <p> 
    So, when you have a newly checked-out source tree the first thing to
    do is:
  </p>
  
  <p class="cmdline">
    cd fvwm<br>
    aclocal<br>
    autoheader<br>
    automake --add-missing<br>
    autoreconf
  </p>

  <p>
    The last command is <code>auto<b>re</b>conf</code>,
    not <code>autoconf</code>.
    You will get some warning messages from <code>autoreconf</code> and
    possibly from <code>automake</code>.  As long as you end up with a
    working configure script, you should ignore them.
  </p>

  <p>To automate this step we include a shell script</p>

  <p class="cmdline">
    utils/configure_dev.sh
  </p>

  <p>
    in the cvs tree, it may be run with usual
    <code>./configure</code> arguments instead of all <i>auto</i> commands above.
  </p>
  
  <p>
    Once that's done, you can proceed to build the code as discussed in
    the <code>INSTALL.fvwm</code> and <code>INSTALL</code> files:
  </p>

  <p class="cmdline">
    ./configure<br>
    make<br>
    make install
  </p>

  <p>
    with appropriate options and arguments, as you like.
  </p>


  <a name="update"></a> 
  <h3>Code Updates <a href="#top">[top]</a></h3>

  <p>
    From time to time, the dedicated FVWM Workers will make changes to the
    CVS repository.  Announcements of this are automatically sent to the
    <code>fvwm-workers</code> list.  You will want to be subscribed to this
    list!
  </p>

  <p>
    You can update your copy of the sources to match the master
    repository with the <code>update</code> command.  Note it's not
    necessary to check out a new copy!  Using <code>update</code> is
    significantly faster and simpler, as it will download only patches
    instead of entire files, only update files that have changed since your
    last update, and it will automatically merge any changes in the CVS
    repository with any local changes you may have made.
  </p>

  <p class="cmdline">
    cvs update
  </p>

  <p>
    If you didn't use a tag when you checked out, this will update your
    sources to the latest version on the main branch.  If you used a branch
    tag, it will update to the latest version on that branch.  If you used a
    version tag, it won't do anything (see above).
  </p>

  <p>
    After updating the local source directory, it is usually enough to
    issue <code>make</code> to rebuild everything.  It is safe to manually
    run <code>aclocal</code>, <code>automake</code> and <code>autoconf</code>
    if you think something should be rebuilt, but this sould be run
    automatically on <code>make</code>.
  </p>

  <a name="newproj"></a>
  <h3>Starting a Project <a href="#top">[top]</a></h3>

  <p>
    Discuss your ideas on the workers list before you start.  Someone may
    be working on the same thing you have in mind.  Or they may have good
    ideas about how to go about it.
  </p>

  <p>
    If you just have a small patch you want to make, you may just
    commit it to the main branch.  If the change is large, and lots of
    other work is going on, you may want to do your changes on a "side
    branch" which will get merged into the main branch later on.  Before
    creating a branch, you discuss the matter with the other workers.  If
    you are new to CVS, you should read the CVS documentation several
    times, and ask for help.  The documentation is sufficiently large and
    confusing that it is rather difficult to get right the first few
    times.
  </p>


  <a name="hacking"></a>
  <h3>Hacking the Code <a href="#top">[top]</a></h3>

  <p>
    So you've found a bug you want to fix?  Want to implement a feature
    from the Jitterbug list?  Got a new feature to implement?  Hacking the code
    couldn't be easier.  Just edit your copy of the sources.  No need to copy
    files to `.orig' or anything; CVS has copies of the originals.
  </p>

  <p>
    When you have the code in a working state, generate a patch against
    the <em>current</em> sources in the CVS repository.
  </p>

  <p class="cmdline">
    cvs update<br>
    cvs diff -u &gt; patchfile
  </p>

  <p>
    Mail the patch to the fvwm-workers list with a description of what you
    did.  But read the FAQ file about ChangeLog entries before doing so.
  </p>


  <a name="conflicts"></a>
  <h3>Conflicts <a href="#top">[top]</a></h3>

  <p>
    If someone else has been working on the same files as you have, you may
    find that you have made conflicting modifications.  You'll discover this
    when you try to update your sources.
  </p>    

<pre class="cvs">
$ cvs update
RCS file: /home/cvs/fvwm/fvwm/fvwm/icons.c,v
retrieving revision 1.5
retrieving revision 1.6
Merging differences between 1.5 and 1.6 into icons.c
rcsmerge: warning: conflicts during merge
cvs server: conflicts found in fvwm/icons.c
C fvwm/icons.c
</pre>

  <p>
    <b>Don't Panic!</b> Your working file, as it
    existed before the update, is saved under the filename
    `.#icons.c.1.5'; hence you can always recover it, should things go
    horribly wrong.  The file named `icons.c' now contains <b>both</b> the
    old (i.e. your) version and new version of lines that conflicted.  You
    simply edit the file and resolve each conflict by deleting the
    unwanted version of the lines involved.
  </p>

<pre class="cvs">
&lt;&lt;&lt;&lt;&lt;&lt;&lt; icons.c
XpmImage    my_image = {0};  /* testing */
=======
&gt;&gt;&gt;&gt;&gt;&gt;&gt; 1.6
</pre>
  
  <p>
    Don't forget to delete the lines with all the "&lt;", "=", and "&gt;"
    symbols.
  </p>


  <a name="access"></a> 
  <h3>Getting Commit Access <a href="#top">[top]</a></h3>

  <p>
    Using the procedures described above, and being on the workers list
    are a prerequisite to gaining update access.  We expect to have heard
    from you more than once on the fvwm-workers list so that we have some
    idea who you are.
  </p>

  <p>
    Doing some testing, submitting some patches, and getting involved
    in the discussions will help us know about you.
  </p>

  <p>
    After you have been involved for a while, if we don't suggest it,
    then ask.  The FVWM development team is not a closed environment, we
    welcome new members.  There are no required duties, all work is strictly
    voluntary.
  </p>

  <p>
    If there is agreement on the list that you should be given update
    access, you will need to choose a CVS user ID and provide an encrypted
    password.  The latter can be obtained with the following Perl snippet:
  </p>

  <p class="cmdline">
    perl -e 'print crypt("yourpass", join("", ((a..z, A..Z, 0..9)[rand(62), rand(62)]))), "\n"'
  </p>

  <p>
    Change <code>yourpass</code> to whatever you want your password to be.
    Send the encrypted password to Jason Tibbitts, (tibbs@math.uh.edu).
    Jason is the list maintainer, and provides our CVS repository.
  </p>

  <p>
    Once you have update access, re-do the <code>login</code> command
    above using your CVS user ID in place of <code>anonymous</code> and your
    password in place of <code>guest</code>, and you are on your way.
  </p>

  <a name="commits"></a>
  <h3>Committing Changes <a href="#top">[top]</a></h3>

  <p>
    Now that you have write permissions and have logged in with your
    CVS username, you can commit changes.  This is done (surprise!) with the
    CVS <code>commit</code> command.
  </p>

  <p>
    Note it's usually a good idea to run a <code>cvs update</code> just
    before you commit, to make sure you've got the latest code.  If you try
    to commit changes to a file that someone else has changed since you last
    updated, CVS will complain and not allow the commit.  But, changes to
    other files could indirectly affect your new code, as well.  In general
    if you're doing development it really pays to follow the old(?) adage,
    "Update early and often".
  </p>

  <p>
    To commit all the modified files in your workspace, use:
  </p>

  <p class="cmdline">
    cvs commit
  </p>

  <p>
    CVS will pop up your favorite editor to allow you to enter comments
    about what changes you've made.  These comments will appear in the email
    sent to <code>fvwm-workers</code>, so please write something useful.
  </p>
  
  <p>
    Also, you will see a complete list of files that CVS thinks you have
    changed.  Please sanity-check this list!  Make sure there's nothing you
    don't expect there, and everything you do expect.
  </p>

  <p>
    If you don't like the all-or-nothing approach, you can specify only
    certain files to be committed:
  </p>

  <p class="cmdline">
    cvs commit fvwm/fvwm.1 modules/FvwmAuto/FvwmAuto.1
  </p>

  <p>
    Again, please sanity-check the list to be sure you have everything.
  </p>

  <a name="adding"></a>
  <h3>Adding Directories and Files <a href="#top">[top]</a></h3>

  <p>
    First create the new directories and files locally.  Then, assuming
    the new directory is named `<code>newdir</code>' and the new file is
    `<code>newmod.c</code>':
  </p>

  <pre class="cvs">
    cvs add -m "New directory for ..." newdir<br>
    cd newdir<br>
    cvs add -m "File newmod.c is a module that ..." newmod.c
  </pre>

  <p>
    When adding new directories and files, please be sure to take a look
    at the relevant <code>Makefile.am</code> files and modify them as
    appropriate!  See the <code>DEVELOPERS</code> file for more details on
    this.
  </p>

  <a name="removing"></a> 
  <h3>Deleting Directories and Files <a href="#top">[top]</a></h3>

  <p>
    You don't directly delete directories, you delete all the files in a
    directory and the directory goes away during an `<code>update
      -dP</code>'.  To delete one or more files:
  </p>

  <p class="cmdline">
    cvs remove filename...<br>
    cvs commit -m 'deleted files because' filename...
  </p>

  <p>
    Again, when removing directories or files please be sure to update
    the appropriate <code>Makefile.am</code> files.  See <code>DEVELOPERS</code>.
  </p>

  <a name="renaming"></a>
  <h3>Renaming/Moving Files <a href="#top">[top]</a></h3>

  <p>
    There is no perfect way to rename or move files in CVS.  There are a few
    different methods, each with good and bad points.  For FVWM, we've
    chosen the most straightforward method: remove the old file and add a
    new file.  In order to preserve some kind of link, please include a
    pointer to the old file in the comments of the new file (and vice
    versa).
  </p>

  <p>
    Again, when renaming or moving files please be sure to update
    the appropriate <code>Makefile.am</code> files.  See <code>DEVELOPERS</code>.
  </p>

  <a name="branching"></a>
  <h3>Creating New Branches <a href="#top">[top]</a></h3>

  <p>
    Please contact the <code>fvwm-workers</code> list and discuss any new
    branch you'd like to create, just so we have an idea about what and why.
  </p>

  <p>
    When creating a branch it's best to base it off of a
    previously-existing, labeled checkpoint.  Here we'll use the example of
    creating a new branch for 2.2.x development after the 2.2 release was
    made.  Because of our rules, we know that the new branch name should be
    <code>branch-2_2</code>, but if you're creating a branch for a new
    feature you can use any valid label.
  </p>

  <p>
    Once you know where you want to branch from and what you want to call
    the new branch, use the <code>cvs rtag</code> command to create the
    branch (be sure you're in the root of your checkout):
  </p>

  <p class="cmdline">
    cvs rtag -b -r version-2_2_0 branch-2_2 .
  </p>

  <p>
    The first thing you'll probably want to do on the new branch is edit
    the <code>configure.in</code> file to change the version number, so
    people know it's different.  See the <code>DEVELOPERS</code> file for
    information on this.
  </p>

  <a name="trees"></a> 
  <h3>Creating New Source Trees <a href="#top">[top]</a></h3>

  <p>
    Please contact the <code>fvwm-workers</code> list and discuss any new
    source trees you'd like to create, just so we have an idea about what and why.
  </p>

  <p>
    The source code for Fvwm is in the "fvwm" source tree.
    Source code for the Fvwm web site is in the "fvwm-web" source tree.    
  </p>
  
  <p>
    If you have update access to "fvwm", you can also update the other
    source trees and create new source trees.
  </p>

  <a name="fvwm-web"></a>
  <h3>Working on the fvwm-web Source Tree <a href="#top">[top]</a></h3>

  <p>
    Its important to remember anything checked into the fvwm-web branch
    will automatically appear on the fvwm web pages.  Be careful to check
    your work before you commit a change.
  </p>

  <p>
    <!--
    You can check to see what your changes will look like before a commit,
    by using a "file:" URL to look at your changes with your browser.  If you
    have the fvwm-web source in <code>/home/my/fvwm-web</code>, your browser
    should be able to view the source with the URL
    <code>file:/home/my/fvwm-web</code>.
    (This is one of the reasons you want to use relative URLs to link
    one page to another.)
    -->
    Since Fvwm web pages are PHP based, you need a web server supporting
    PHP to test your changes before doing a commit.
    If you can't do that, check the Fvwm web site after commits in
    a timely manner.  (Don't go on vacation before checking.)
  </p>

  <p>
    Some of the sub-directories in the fvwm-web branch can take a long
    time to checkout or commit due to their large size.  This is especially
    true over dial-up connections.  All of the CVS commands can be convinced
    to only work on one directory or sub-directory by using the <code>-l</code>
    argument.
  </p>
    For example, to do an initial checkout of the root:
<pre class="cvs">
    cvs -d :pserver:anonymous@cvs.fvwm.org:/home/cvs/fvwm checkout  fvwm-web
</pre>
  <p>
    Some parts of the fvwm-web tree are generated from
    fvwm tree source files.
    The generated files are in the directories:

<pre class="cvs">
fvwm-web/authors/
fvwm-web/news/
fvwm-web/documentation/faq/
fvwm-web/documentation/manpages/
fvwm-web/documentation/perllib/
</pre>

  <p>
    Each directory has a script generating one or more php files.
    You would normally run these scripts (at least in the first 3 directories)
    whenever you made a change to <i>fvwm/NEWS</i>, <i>fvwm/docs/FAQ</i> or
    <i>fvwm/AUTHORS</i> that you want to appear on the fvwm web site.
    Instructions are in the scripts.
  </p>

<?php decoration_window_end(); ?>
