<?php

//--------------------------------------------------------------------
// find the best link to the failed request
//--------------------------------------------------------------------
if( strpos($request,"creating_rpms") )             $file = "/documentation/dev_creating_rpms.php";
elseif( strpos($request,"cvs") )                   $file = "/documentation/dev_cvs.php";
elseif( strpos($request,"developers") )            $file = "/documentation/developers.php";
elseif( strpos($request,"manpages") )              $file = "/documentation/manpages/index.php";
elseif( strpos($request,"downloadbugs") )          $file = "/documentation/dev_downloadbugs.php";
elseif( strpos($request,"download") )              $file = "/download/index.php";
elseif( strpos($request,"features") )              $file = "/features.php";
elseif( strpos($request,"ftp") )                   $file = "/contact/index.php";
elseif( strpos($request,"fvwm-cats/index") )       $file = "/fvwm-cats/index.php";
elseif( strpos($request,"generated/AUTHORS") )     $file = "/authors/index.php";
elseif( strpos($request,"generated/FAQ") )         $file = "/documentation/faq/index.php";
elseif( strpos($request,"generated/NEWS") )        $file = "/latest_news/index.php";
elseif( strpos($request,"perllib") )               $file = "/documentation/perllib/index.php";
elseif( strpos($request,"icons") )                 $file = "/download/icons.php";
elseif( strpos($request,"links") )                 $file = "/links.php";
elseif( strpos($request,"mailinglist") )           $file = "/contact/index.php";
elseif( strpos($request,"mod_changes") )           $file = "/documentation/dev_modules.php";
elseif( strpos($request,"mod_concept") )           $file = "/documentation/dev_modules.php";
elseif( strpos($request,"mod_f2m_communication") ) $file = "/documentation/dev_modules.php";
elseif( strpos($request,"mod_initialization") )    $file = "/documentation/dev_modules.php";
elseif( strpos($request,"mod_m2f_communication") ) $file = "/documentation/dev_modules.php";
elseif( strpos($request,"mod_security") )          $file = "/documentation/dev_modules.php";
elseif( strpos($request,"modules") )               $file = "/documentation/dev_modules.php";
elseif( strpos($request,"sample-menus/index") )    $file = "/screenshots/menus/index.php";
elseif( strpos($request,"screenshots") )           $file = "/screenshots/index.php";
elseif( strpos($request,"vector-buttons") )        $file = "/screenshots/windowdecors/index.php";
elseif( strpos($request,"documentation/faq.php") ) $file = "/documentation/faq/index.php";
else $file = "/index.php";

if( ! file_exists("..$file") ) {
  $file = "/index.php";
}
$file = str_replace("index.php", "", $file);
$url = "http://".$_SERVER['HTTP_HOST']."$file";

//--------------------------------------------------------------------
//- Set http header to error 404
//--------------------------------------------------------------------
header("HTTP/1.0 404 Not Found");

?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
  <head>
    <meta http-equiv="refresh" content="5; URL=<?php echo $url;?>">
    <title>Document is not on this server - Error 404</title>
  </head>

  <body>
    <h1>The document you requested is not (longer) on this server - Error 404</h1>

    <p>
      You request for document 
      <b><?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?></b>
      could be not fulfilled.
    </p>

    <p>
      Please update your bookmarks to <a href="<?php echo $url;?>"><?php echo $url;?></a>
    </p>
    
    <p>
      You will be redirected after 5 seconds.
    </p>
  </body>
</html>
