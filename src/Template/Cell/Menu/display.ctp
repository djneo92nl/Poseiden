<nav id="mainnav-container">
	<div id="mainnav">

		<!--Shortcut buttons-->
		<!--================================-->
<!--		<div id="mainnav-shortcut">-->
<!--			<ul class="list-unstyled">-->
<!--				<li class="col-xs-4" data-content="Additional Sidebar" data-original-title="" title="">-->
<!--					<a id="demo-toggle-aside" class="shortcut-grid" href="#">-->
<!--						<i class="fa fa-magic"></i>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="col-xs-4" data-content="Notification" data-original-title="" title="">-->
<!--					<a id="demo-alert" class="shortcut-grid" href="#">-->
<!--						<i class="fa fa-bullhorn"></i>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="col-xs-4" data-content="Page Alerts" data-original-title="" title="">-->
<!--					<a id="demo-page-alert" class="shortcut-grid" href="#">-->
<!--						<i class="fa fa-bell"></i>-->
<!--					</a>-->
<!--				</li>-->
<!--			</ul>-->
<!--		</div>-->
		<!--================================-->
		<!--End shortcut buttons-->


		<!--Menu-->
		<!--================================-->
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content" tabindex="0">
					<ul id="mainnav-menu" class="list-group">
						<!--Category name-->
						<li class="list-header">Navigation</li>

						<?php foreach ($menu as $menuItem): ?>
                            <?php
							$icon = $menuItem->icon;
                                if (empty($icon)) {
                                    $icon = 'fa-dashboard';
                                }
                            ?>
							<li class="link">
								<a href="<?= $this->Url->build([
									"controller" => $menuItem->controller,
									"action" => $menuItem->action], [
									'fullBase' => true ]);?>">
									<i class="fa <?=$icon;?>"></i>
			                    <span class="menu-title">
									<strong><?= h($menuItem->name) ?></strong>
								</span>
								</a>
							</li>
						<?php endforeach ?>



						<!--Menu list item-->
						<li>
							<a href="#">
								<i class="fa fa-envelope"></i>
								<span class="menu-title">Email</span>
								<i class="arrow"></i>
							</a>

							<!--Submenu-->
							<ul class="collapse">
								<li><a href="mailbox.html">Inbox</a></li>
								<li><a href="mailbox-message.html">View Message</a></li>
								<li><a href="mailbox-compose.html">Compose Message</a></li>

							</ul>
						</li>
					</ul>


					<!--Widget-->
					<!--================================-->
					<div class="mainnav-widget">

						<!-- Show the button on collapsed navigation -->
						<div class="show-small">
							<a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
								<i class="fa fa-desktop"></i>
							</a>
						</div>

						<!-- Hide the content on collapsed navigation -->
						<div id="demo-wg-server" class="hide-small mainnav-widget-content">
							<ul class="list-group">
								<li class="list-header pad-no pad-ver">Server Status</li>
								<li class="mar-btm">
                                    <?php
                                    $provider = \Probe\ProviderFactory::create();
                                    $memory =  abs(number_format($provider->getFreeMem() / $provider->getTotalMem() * 100) - 100 );
                                    $diskSpace =  abs(number_format(disk_free_space('/') / disk_total_space('/')  * 100) - 100 );
                                    ?>

									<span class="label label-primary pull-right"><?=$memory;?>%</span>
									<p>Memory Usage</p>
									<div class="progress progress-sm">
										<div class="progress-bar progress-bar-primary" style="width: <?=$memory;?>%;">
											<span class="sr-only"><?=$memory;?>%</span>
										</div>
									</div>
								</li>
								<li class="mar-btm">
									<span class="label label-purple pull-right"><?=$diskSpace;?>%</span>
									<p>Disk Usage</p>
									<div class="progress progress-sm">
										<div class="progress-bar progress-bar-purple" style="width: <?=$diskSpace;?>%;">
											<span class="sr-only"><?=$diskSpace;?>%</span>
										</div>
									</div>
								</li>
								<li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
							</ul>
						</div>
					</div>
					<!--================================-->
					<!--End widget-->

				</div>
				<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>
		</div>
		<!--================================-->
		<!--End menu-->

	</div>
</nav>
