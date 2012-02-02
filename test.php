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
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .box{
        text-align: justify;
      }
      .red-text{
          color: #ff0011;
      }
    </style>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/debug.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">

  </head>

  <body>

      <div class="container">
      <?php

        $page = new Layout();
        $page->appendRow('12');
        $page->appendRow('1:1:1:1:1:1:1:1:1:1:1:1');
        $page->appendRow('2:2:2:2:2:2');
        $page->appendRow('4:4:4');
        $page->appendRow('6:6');
        $page->appendRow('6');
        $page->appendRow('12');
        $page->appendRow('6');
        $page->offset(25, 6);
        $page->appendRow('6:6');
        $page->appendRow('4:4:4');
        $page->appendRow('2:2:2:2:2:2');
        $page->appendRow('1:1:1:1:1:1:1:1:1:1:1:1');
        $page->appendRow('12');
        
        $page->debug();

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