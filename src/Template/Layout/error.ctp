<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
    </title>


    <!--STYLESHEET-->
    <!--=================================================-->
	<?= $this->Html->css('bootstrap.css') ?>
	<?= $this->Html->css('main.css') ?>

	<?= $this->Html->css('font-awesome.min.css') ?>

    <!--Font Awesome [ OPTIONAL ]-->


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container" class="cls-container">

    <!-- HEADER -->
    <!--===================================================-->
    <div class="cls-header">
        <div class="cls-brand">
            <a class="box-inline" href="index.html">
                <!-- <img alt="Nifty Admin" src="images/logo.png" class="brand-icon"> -->
                <span class="brand-title">Poseiden <span class="text-thin">O.o </span></span>
            </a>
        </div>
    </div>

    <!-- CONTENT -->
    <!--===================================================-->
    <div class="cls-content">
        <div id="content">
		    <?= $this->Flash->render() ?>

		    <?= $this->fetch('content') ?>
        </div>
    </div>


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->



<!--JAVASCRIPT-->
<!--=================================================-->

<?= $this->Html->script("bootstrap.min.js"); ?>
<?= $this->Html->script("fastclick.min.js"); ?>
<?= $this->Html->script("nifty.min.js"); ?>


<!--

REQUIRED
You must include this in your project.

RECOMMENDED
This category must be included but you may modify which plugins or components which should be included in your project.

OPTIONAL
Optional plugins. You may choose whether to include it in your project or not.

DEMONSTRATION
This is to be removed, used for demonstration purposes only. This category must not be included in your project.

SAMPLE
Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


Detailed information and more samples can be found in the document.

-->


</body>
</html>