<?php 
if(isset($navigation_check)) return; 
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

<pre>
<?php echo print_r($_SERVER);?>
</pre>

<?php phpinfo();  ?>

  </body>
</html>
