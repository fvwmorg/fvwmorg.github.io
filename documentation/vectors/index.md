---
layout : default
title : FVWM Vector Buttons Viewer
inner-title : Vector Buttons Viewer
---

<html>
  <head>
	<title>A Simple FVWM Vector Buttons Viewer</title>
	<script type="text/javascript" src="fvwm-vector.js"></script>
	<style type="text/css">
	  .error {
	    background: red;
	    color: white;
	    padding: 6px;
	    font-family: sans-serif;
	  }
	  #result_src {
	    background: #e3e3e3;
	    border: 1px solid black;
	    font-family: monospace;
	    padding: 3px;
	  }
	  canvas {
	    vertical-align: top;
	    border: 1px solid blue;
	  }
	</style>
  </head>

  <body>
	<noscript><p>Sorry guys, but this page works in
		JavaScript-enabled browser only.</p></noscript>

	<strong>A Simple FVWM Vector Buttons Viewer</strong>
	
	<script type="text/javascript">
	  //<![CDATA[
	  var fvwm = new Fvwm();
	  fvwm.populate();
      //]]>
	</script>  
  </body>
</html>
