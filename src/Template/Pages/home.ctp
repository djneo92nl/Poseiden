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
?>


<?php

if (is_null($this->request->session()->read('Auth.User.username'))) {

	echo "....logged out";
	var_dump($this->request->session());

} else {

	echo "You are Logged in As " . $this->request->session()->read('Auth.User.username');

}

?>

<div id="page-title">
    <h1 class="page-header text-overflow col-sm-7"><?= __('Dashboard') ?></h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="panel media middle">
                <div class="media-left bg-primary pad-all">
                    <canvas id="demo-weather-xs-icon-1" width="48" height="48"></canvas>
                </div>
                <div class="media-body pad-lft">
                    <p class="text-2x mar-no text-thin"><span id="temphere">25</span>°</p>
                    <p class="text-muted mar-no">Sunny</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

</div>
