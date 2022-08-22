<?php
require 'ViewComponent/Base.php';
require 'ViewComponent/Item1.php';
require 'ViewComponent/BoxWrapper1.php';

use ViewComponent\Item1;
use ViewComponent\BoxWrapper1;

$items = [[
    'title' => 'Başlık 1',
    'src' => 'https://images.unsplash.com/photo-1660420235034-4ea60f41f809?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80'
],[
    'title' => 'Başlık 2',
    'src' => 'https://images.unsplash.com/photo-1660704978699-ed53dd160e2e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80'
],[
    'title' => 'Başlık 3',
    'src' => 'https://images.unsplash.com/photo-1657299143474-c456e8388ee2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=701&q=80'
]];
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style rel="stylesheet">
        body{ margin: 0; }
    </style>
</head>
<body>
<?php

BoxWrapper1::new()->data('Resimlerim')->put(function() use ($items){
    foreach($items as $item){
        Item1::new()->data($item)->put();
    }
});

BoxWrapper1::new()->data('Deneme')->style('{margin-top:20px;}')->put();

?>
</body>
</html>