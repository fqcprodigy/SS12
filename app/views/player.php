<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //echo Session::get('player');
        foreach ($player as $key=> $value) {
    echo $key.$value;
}
        // put your code here
        ?>
    </body>
</html>
