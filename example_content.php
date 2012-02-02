<?php
include_once "libs/phpscaffold.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP-Scaffold Layout Engine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .box{
        text-align: justify;
      }

    </style>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/debug.css" rel="stylesheet">

  </head>

  <body>

      <div class="container">
      <?php

        // Create the Primary Page Layout Structure
        $page = new Layout();
        // 2 Rows 3 columns in total
        $page->setLayout('12|4:8');
        // Send content to the first column
        $page->html('<h1>Responsive Grid Example with Content</h1><p class="lead">An example of grid based
            layouts with content arranged in columns with nested within nested
            layouts.</p>',1);

        $page->append('<ul class="breadcrumb">
    <li>
    <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
    <a href="#">Library</a> <span class="divider">/</span>
    </li>
    <li class="active">
    <a href="#">Data</a>
    </li>
    </ul>', 1);


        // Send content to the second column
        $page->html('<h2>Left Column Title</h2><p>Vivamus odio ante, auctor in facilisis
            et, aliquet vitae eros. Etiam sed elit vitae dolor vehicula auctor
            nec a tellus. Sed imperdiet tempor iaculis. Suspendisse nec turpis
            at leo semper sodales. Cum sociis natoque penatibus et magnis dis
            parturient montes, nascetur ridiculus mus. Quisque at diam nisi, sit
            amet tristique ipsum. Donec id nibh cursus tortor venenatis tempus
            at euismod magna. Sed dapibus felis vel elit porta id lacinia urna
            aliquam. Praesent tempor neque vitae quam iaculis sed euismod turpis
            dictum. Quisque vel enim libero.</p><p>In volutpat euismod fringilla.
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
            laoreet. </p>', 2);
        //send content to the 3rd column
        $page->html('<h2>Right Column Title <small>Title spans across the nested columns
            </small></h2>', 3);
        
        //set teh 2st columns css class
        $page->setColumnClass('box', 1);
        
        
            // Create the nested layout whic hwill go into column 3.
            $nest = new Layout();
            // Set the nested structure. it will be nested in an 8 column span
            $nest->setLayout('4:4');
            // set conent for the 1st nested column
            $nest->html('<p>Morbi interdum, metus non gravida faucibus, ligula lorem
                egestas tellus, quis dapibus lectus nisl et tortor. Aenean sit amet
                lorem velit, sed posuere sapien. Ut lacinia arcu condimentum metus
                elementum facilisis.</p>  ', 1);
            // set conent for the 2nd nested column
            $nest->html('<p>Vivamus odio ante, auctor in facilisis
                et, aliquet vitae eros. Etiam sed elit vitae dolor vehicula auctor
                nec a tellus. Sed imperdiet tempor iaculis. Suspendisse nec turpis
                at leo semper sodales. Cum sociis natoque penatibus et magnis dis
                parturient montes, nascetur ridiculus mus. Quisque at diam nisi, sit
                amet tristique ipsum. Donec id nibh cursus tortor venenatis tempus
                at euismod magna. Sed dapibus felis vel elit porta id lacinia urna
                aliquam. Praesent tempor neque vitae quam iaculis sed euismod turpis
                dictum. Quisque vel enim libero.</p><p>In volutpat euismod fringilla.
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
                laoreet.</p>', 2);

            // set the 1st nested columns css class
            $nest->setColumnClass('box', 1);
            // set the 2nd nested columns css class
            $nest->setColumnClass('box', 2);
            // append another class name to the second  column
            $nest->prependColumnClass('red-text', 2);

                // create a 2nd nested object which well nest in the first nested object
                $slip = new Layout();

                // set the layout to 2 rows, the first a single 4 span column and the
                // seccond a 2 column row each column spanning 2 columns as it will be
                // nested in a 4 span column.
                $slip->setLayout('4|2:2');

                // set the content for the first column
                $slip->html('<hr /><h3>Inner nested item <small>The inception layout</small></h3>', 1);

                // set the content for the 3rd column
                $slip->html('<p>Aenean sit amet lorem velit, sed posuere sapien. Ut
                    lacinia arcu condimentum metus elementum facilisis. Morbi interdum,
                    metus non gravida faucibus, ligula lorem egestas tellus, Morbi
                    interdum, metus non gravida faucibus, ligula lorem egestas tellus,
                    quis dapibus lectus nisl et tortor.</p><p>Aenean sit amet
                    lorem velit, sed posuere sapien.</p>', 3);

                // set the content for the 2nd column
                $slip->html('
                    <img src="https://secure.gravatar.com/avatar/9d783f6c19a2ad1de9c2fe7573f050c9?s=500" />
                    ', 2);

                // append more content to the 2nd column
                $slip->append('<p>Morbi interdum, metus non gravida faucibus, ligula
                    lorem egestas tellus.</p>', 2);

            // enable debugging to see the columns and get column numbers.
            if(isset($_GET['debug'])){
                $nest->debug();
                $slip->debug();
                $page->debug();
            }

            // append the slip nested layout to the first nested layout
            $nest->append($slip->renderLayout(), 1);

        // append the first nested layout to the main page layout
        $page->append($nest->renderLayout(), 3);

        // add in a footer row to the main page spanning all 12 columns
        $page->appendRow('12');

        $page->html('<hr />&copy; '.date('Y').', some company - all rights reserved', 4);

        //render the final layout
        echo $page->renderLayout();

        


      ?>

      </div>
  </body>
</html>