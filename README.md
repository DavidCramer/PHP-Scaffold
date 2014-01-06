PHP Scaffold Layout Engine

```php

$layout = new calderaLayout();
$layout->setLayout('6:6|12|4:4:4');
$layout->html('<h1>html in a column</h1>', '1:1');
echo $layout->renderLayout();

```