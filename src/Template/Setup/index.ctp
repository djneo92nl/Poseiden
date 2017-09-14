<?php
$this->layout = false;
$cakeDescription = 'Poseiden: Setup';

?>

<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>
        </title>


        <!--STYLESHEET-->
        <!--=================================================-->

        <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('main.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <style>
            .demo-my-bg{
                background-image : url("<?= $this->Url->image('balloon.jpg' );?>");
            }
        </style>

    </head>
    <body>
    <h1>Install, Setup</h1>

    </body
</html>
