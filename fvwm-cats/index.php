<?php
//--------------------------------------------------------------------
//-  File          : fvwm_cats/index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "The Official FelineVWM Home Page - Cats";
$link_name      = "Cats";
$link_picture   = "pictures/icons/fvwm_cats";
$parent_site    = "home";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "fvwm_cats";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

  <?php decoration_window_start(""); ?>
  <p class="cats">
    FVWM would not have been possible without  the  tails,  ears  and  the
    little  paws  of  the  coziest  beings  in  the world: our cats. Well,
    perhaps we could have done without the paws. If your pet  ever  walked
    straight  over  your  keyboard, chased your mouse pointer (yes, I know
    cats are supposed to catch mice, but still...) or fell asleep on  your
    trackball you know what I mean. ^_^ 
  </p>

  <h2 class="cats">Dominik's cats:</h2>
  <h4 class="cats">Kassandra</h4>
  <h5 class="cats">female, * 1989, + on 23rd of June in 2000 (bitten to death by a dog)</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('kassandra.php');?>"><img src="small_kassandra.jpg" border="1" alt=""></a>
      Kassandra was my favourite before I got Niniel, Luthien and Tilion. I had
      to leave her behind when I moved to Southern Germany. I loved her very much
      and I did not want to force her to move with me. We got them at the age of
      1 and a half years and it took three month before she came down from the
      heating pipes in our cellar.
  </p>
  
  <h4 class="cats">Luthien</h4>
  <h5 class="cats">female, * 13th of September 1998, + run over by a car on 18th of March 1999)</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('luthien.php');?>"><img src="small_luthien.jpg" border="1" alt=""></a>
      Was the most beautiful kitten I've ever seen. She was my favourite cat the
      instant I saw her (she was hiding in the attic and hissed when I came too
      close). Had the strongest character and the largest eyes of the three. I
      miss her so much!
  </p>

  <h4 class="cats">Niniel</h4>
  <h5 class="cats">(full name: Niniel Nienor), female, * 13th of September 1998</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('niniel.php');?>"><img src="small_niniel.jpg" border="1" alt=""></a>
      The smallest and cutest of my three cats. A saucy little whirlwind that loves
      piddling on my bed and sofa. I have to find a better photograph.
  </p>
  
  <h4 class="cats">Tilion</h4>
  <h5 class="cats">(male, * 13th of September 1998, ran away October 2002)</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('tilion.php');?>"><img src="small_tilion.jpg" border="1" alt=""></a>
      The biggest of my three cats. Hobbies: feeding and squawking. Once we tested
      when Tilion would stop feeding, but had to break off the experiment when
      we ran out of cat food.
  </p>

  <h4 class="cats">Geoffrey and Pepper</h4>
  <h5 class="cats">male, * 1988, Pepper missing for years now (picture of Geoffrey below), Geoffrey
    was put to sleep on 26th of November 2001</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('geoffrey.php');?>"><img src="small_geoffrey.jpg" border="1" alt=""></a>
      Two big black tomcats with a few white patches on the belly. Most of the
      time when not feeding or sleeping they stray around the neighbourhood. Geoffrey
      was the terror of the cats in the area. I had to leave him behind when I
      moved to Althengstett.
  </p>

  <h4 class="cats">Blacky and Tiger</h4>
  <h5 class="cats">female and male, * 1980, Tiger was given away when he was one and a half
    years old, Blacky was shot by a forest warden in 1987.</h5>
  <p class="cats">
    <a href="<?php echo conv_link_target('blacky-tiger.php');?>"><img src="small_blacky-tiger.jpg" border="1" alt=""></a>
      I can hardly remember those two. Tiger was given away because he slobbered
      in the lap of our visitors (we never forgave our parents). Have you seen his
      ears? Perhaps we had better called him 'Radar'. Blacky was a great hunter
      and the most undemanding cat we had. She suffered terribly when she was shot
      before the doctor put her to sleep.
  </p>

  <h2 class="cats">Dan's cat:</h2>
  <h4 class="cats">Angel</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('angel_resting.php');?>"><img src="small_angel_resting.jpg" border="1" alt=""></a>
    Rescued from the front window of a deli, Angel leads an indoor cats life.
    To save our furniture Angel's front claws are removed. I believe, as a direct
    consequence, she's one of the most dangerous cats I've encountered. Thats
    right, watch out for this cat, she bites, hard.
  </p>

  <h2 class="cats">Hippo's cats:</h2>
  <h4 class="cats">Corky</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('corky.php');?>"><img src="small_corky.jpg" border="1" alt=""></a>
    Champion rat catcher. Proper name Corkscrew because he spent the first five
    minutes of his life going around in circles until he discovered that he had
    hind legs.
  </p>

  <h4 class="cats">Scotty</h4>
  <p class="cats">
      <a href="<?php echo conv_link_target('scott.php');?>"><img src="small_scott.jpg" border="1" alt=""></a>
    A Garfield fan. Originally named after Robert Falcon Scott the famous (if
    you're British) polar explorer as she was the first kitten to make it to
    the top the curtains and the only cat I know of to have gone up the inside
    of a pair of trousers hanging in a wardrobe. She has since lost the travel
    bug and spends her time testing the sofa for long term comfort.
  </p>
  
  <h4 class="cats">Sir Boris II</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('boris.php');?>"><img src="small_boris.jpg" border="1" alt=""></a>
    A strange looking cat with a taste for grass, carrots, bananas and blackcurrant
    juice.
  </p>

  <h2 class="cats">Bob's cat:</h2>
  <h4 class="cats">Tiny</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('tiny01b.php');?>"><img src="small_tiny01b.jpg" border="1" alt=""></a>
      A playful lynx-point Siamese, she probably understands more about the FVWM
      code than I do by now.
      The only problem is getting her to stop typing while
      I'm trying to type. (Like I said, she's <i>playful.</i>)
      One of these days, I'll try to get a picture of her in a debugging session,
      and a picture of her sister.
  </p>

  <h2 class="cats">Mikhael's cats:</h2>
  <h4 class="cats">Murzilka</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('murzilka.php');?>"><img src="small_murzilka.jpg" border="1" alt=""></a>
    (short name: Murzya), a lovely kitty, from May 1999. When she was smaller,
    she loved to play with a mouse pointer and watch dynamic screensavers. Loves
    sleeping on the monitor with the tail falling onto the display. Can't bear
    washing.
  </p>

  <h4 class="cats">Cassy</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('cassy.php');?>"><img src="small_cassy.jpg" border="1" alt=""></a>
    (full name: Cassandra), from Oct 2000. Sometimes a full opposite to Murzilka,
    dominating, highly sociable, lap cat, fearless, loves to stay on two back
    legs and play non-stop with toys.<br>
  </p>

  <h2 class="cats">Olivier's cat:</h2>
  <h4 class="cats">Lili</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('lili.php');?>"><img src="small_lili.jpg" border="1" alt=""></a>
    A sweet and emotional cat, from September 1992. She does not like especially
    computers except when she wants her diner!
    She likes mouses but I have a touch pad ...
  </p>

  <h2 class="cats">Brad's cat:</h2>
  <h4 class="cats">Blaise</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('blaise.php');?>"><img src="small_blaise.jpg" border="1" alt=""></a>
    You guessed it Blaise after Blaise Pascal, what else would you expect from
    a programmer, and a math loving wife. Blaise is in her usual spot waiting
    for dinner, she is good at telling time her clock is just an hour fast.
  </p>

  <h2 class="cats">Jason's "cat":</h2>
  <h4 class="cats">Grendel</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('grendel.php');?>"><img src="small_grendel.jpg" border="1" alt=""></a>
    OK, in this page he's more like "bait".  Grendel is a prairie dog, about
    18 months old in this picture.
  </p>

  <h2 class="cats">Alex' cat:</h2>
  <h4 class="cats">Bob</h4>
  <p class="cats">
    <a href="<?php echo conv_link_target('bobcat.php');?>"><img src="small_bobcat.jpg" border="1" alt=""></a>
    My cat Bob is a very affectionate and totally loyal friend who's just had
    his 7th birthday. He eats too much, sleeps too much, and demands a lot of
    attention, often doing somersaults in my lap while I'm trying to work on
    my computer. I think he's jealous of it. Bob is fully trained and very obedient
    and does all sorts of tricks like "beg" and "roll over".
  </p>

  <h3 class="cats">What we love about our cats:</h3>

  <ul class="cats">
    <li>Their ears, tails and paws. And don't forget the whiskers.</li>
    <li>Each one is a unique character.</li>
    <li>Purring and cuddling.</li>
    <li>Sleeping next to the keyboard.</li>
  </ul>

  <h3 class="cats">What we don't:</h3>
  <ul class="cats">
    <li>Piddling on the bed.</li>
    <li>Screeching for food.</li>
    <li>Sleeping <i>on</i> the keyboard.</li>
  </ul>

  <h3 class="cats">Quotes and trivia:</h3>
  <ul class="cats">
    <li>"Cats are like people: the females are the prickly ones and the males
      are good-natured idiots."</li>
    <li>"Will he ever stop feeding?"</li>
    <li>"Ta-tadi, tatatatataaaa! Dies sind die Abenteuer des Raumschiffs Katerschweif."
      (Sorry, can't translate this to English.)</li>
    <li>Did you ever try to find the 'Pussy Versand' in the internet? You may
      get a lot of hits with carelessly chosen search words. [German: Versand =
      English: mail order firm].</li>
    <li>Did you know that cats sleep about 16 hours a day?</li>
    <li>54lopbg2qw^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ "Tilion! Down from
      my keyboard, NOW!"</li>
    <li>"Mrkgnaow!" - Tiny (who read a lot of James Joyce as an undergraduate)</li>
    <li>"I hate cats!"</li>
    <li>"Weehaa!" - Grendel</li>
  </ul>
  <?php decoration_window_end(); ?>
