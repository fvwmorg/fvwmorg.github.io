<?php 
if( strlen("$navigation_check") > 0 ) return; 
// stores a cookie for quite a while
// setcookie ("TestCookie", "Dass ist ein Testcookie",9999999999);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>php info</title>
  </head>

  <body>
    <h1>php info</h1>

<?php 
echo "Cookie: $_COOKIE\n<hr>";
reset($_COOKIE);
while(list($key,$value) = each($_COOKIE) ) echo "$key => $value <br>";
echo "<hr>\n";
phpinfo(); 
?>

  </body>
</html>
