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
        
        $page->setLayout('8:8');

        $nest = new Layout();


        $page->html('<h2>Left Column</h2>Vivamus odio ante, auctor in facilisis
            et, aliquet vitae eros. Etiam sed elit vitae dolor vehicula auctor
            nec a tellus. Sed imperdiet tempor iaculis. Suspendisse nec turpis
            at leo semper sodales. Cum sociis natoque penatibus et magnis dis
            parturient montes, nascetur ridiculus mus. Quisque at diam nisi, sit
            amet tristique ipsum. Donec id nibh cursus tortor venenatis tempus
            at euismod magna. Sed dapibus felis vel elit porta id lacinia urna
            aliquam. Praesent tempor neque vitae quam iaculis sed euismod turpis
            dictum. Quisque vel enim libero. In volutpat euismod fringilla.
            Etiam vel arcu id nisl auctor iaculis nec quis lorem. Praesent
            posuere velit non justo elementum vel malesuada dui euismod.
            Donec euismod sem vel nulla pharetra ullamcorper. Etiam placerat,
            ligula eu tempor fermentum, quam erat luctus nisi, vitae ultricies
            quam justo a odio. Vivamus commodo dictum leo ac suscipit.
            Nunc convallis porta ipsum, sit amet lacinia nisi faucibus et.
            Nunc tristique orci eu mauris semper tristique. In iaculis lectus 
            at quam adipiscing consequat. In egestas odio eget augue imperdiet
            at molestie enim facilisis. Suspendisse metus nisi, suscipit non
            feugiat non, molestie a magna. Nam non ante quis sapien hendrerit
            laoreet. ', 1);

        $page->html('<h2>Nested Title <small>Title spans accros nested columns
            </small></h2>', 2);

        $nest->setLayout('4:4');

        $nest->html('Morbi interdum, metus non gravida faucibus, ligula lorem
            egestas tellus, quis dapibus lectus nisl et tortor. Aenean sit amet
            lorem velit, sed posuere sapien. Ut lacinia arcu condimentum metus
            elementum facilisis.  ', 1);
        $nest->html('Morbi interdum, metus non gravida faucibus, ligula lorem
            egestas tellus, quis dapibus lectus nisl et tortor. Aenean sit amet
            lorem velit, sed posuere sapien. Ut lacinia arcu condimentum metus
            elementum facilisis. Donec viverra pretium orci, nec iaculis risus
            imperdiet et. Phasellus scelerisque nisl dui. Phasellus elementum
            iaculis justo dapibus lobortis. Vestibulum suscipit sagittis velit
            sit amet consequat. Donec convallis imperdiet dignissim. ', 2);

        $page->setColumnClass('box', 1);
        $nest->setColumnClass('box', 1);
        $nest->setColumnClass('box', 2);
        $nest->prependColumnClass('red-text', 2);


        $slip = new Layout();
        $slip->setLayout('4|2:2');

        $slip->html('<h3>Innser time <small>Nested nested</small></h3>', 1);
        $slip->html('ligula lorem egestas tellus, quis dapibus lectus nisl et
            tortor.', 2);
        $slip->html('Aenean sit amet lorem velit, sed posuere sapien. Ut 
            lacinia arcu condimentum metus elementum facilisis. Morbi interdum,
            metus non gravida faucibus, ligula lorem egestas tellus,', 3);
        $slip->setColumnClass('red-text', 2);

        $slip->html('<img width="95" height="95" src="https://secure.gravatar.com/avatar/9d783f6c19a2ad1de9c2fe7573f050c9?s=140" />', 2);
        $slip->append('<hr />Morbi interdum, metus non gravida faucibus, ligula
            lorem egestas tellus.', 2);
        if(isset($_GET['debug'])){
            $nest->debug();
            $slip->debug();
            $page->debug();
        }

        $nest->append($slip->renderLayout(), 1);

        $page->append($nest->renderLayout(), 2);




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