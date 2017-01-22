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
							<li class="link">
								<a href="<?php echo $this->Url->build([
									"controller" => $menuItem->controller,
									"action" => $menuItem->action], [
									'fullBase' => true ]);?>">
									<i class="fa fa-dashboard"></i>
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
									<span class="label label-primary pull-right">10%</span>
									<p>CPU Usage</p>
									<div class="progress progress-sm">
										<div class="progress-bar progress-bar-primary" style="width: <?=rand(0, 100)?>%;">
											<span class="sr-only">10%</span>
										</div>
									</div>
								</li>
								<li class="mar-btm">
									<span class="label label-purple pull-right">75%</span>
									<p>Bandwidth</p>
									<div class="progress progress-sm">
										<div class="progress-bar progress-bar-purple" style="width: 75%;">
											<span class="sr-only">75%</span>
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
