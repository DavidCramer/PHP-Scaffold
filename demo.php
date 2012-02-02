<?php
include_once "libs/layout.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Layout engine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/grid.responsive.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
  </head>

  <body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a href="#" class="brand">Project name</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

      <div class="container">
      <?php

        $page = new Layout();
        
        // Reset the layout so we can add another row for the nav and footer
        $page->setLayout('12|12|4:4:4|12');

        $page->html('<div class="hero-unit"><h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more »</a></p></div>', 2);


        $page->html('<h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a href="#" class="btn">View details »</a></p>', 3);

        $page->html('<h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a href="#" class="btn">View details »</a></p>', 4);

        $page->html('<h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a href="#" class="btn">View details »</a></p>', 5);

        $page->html('<hr /><p>PHP Layout Engine', 6);

        //$page->debug();
        echo $page->renderLayout();




      ?>

      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $(function() {
              $().collapse()
        });

    </script>
  </body>
</html>