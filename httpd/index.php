<?php

// We may place a map function here 
// e.g. download.html -> download/index.php

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
   <meta http-equiv="refresh" content="5; URL=http://<?php echo $_SERVER['HTTP_HOST'];?>">
  <head>
    <title>Document is not on this server</title>
  </head>

  <body>
    <h1>The document you requested is not (longer) on this server</h1>

    <p>
      Please update your bookmarks to <a href="../index.php"><?php echo $_SERVER["HTTP_HOST"];?></a>
    </p>
    
    <p>
      You will be redirected after 5 seconds.
    </p>
  </body>
</html>
