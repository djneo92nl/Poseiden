<div class="row">
	<div class="col-lg-9">


		<!--Panel with Tabs-->
		<!--===================================================-->
		<div class="panel panel-primary">

			<!--Panel heading-->
			<div class="panel-heading">
				<div class="panel-control">

					<button class="demo-panel-ref-btn btn btn-default" data-target="#demo-panel-ref" data-toggle="panel-overlay">
						<i class="fa fa-rotate-right fa-fw"></i> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>

					</button>
					<!--Nav tabs-->
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#demo-tabs-box-1">First Tab</a>
						</li>
						<li><a data-toggle="tab" href="#demo-tabs-box-2">Second Tab</a>
						</li>
					</ul>
				</div>
				<h3 class="panel-title"><?= h($user->profile->firstname) .' '. h($user->profile->lastname)?></h3>
			</div>

			<!--Panel body-->
			<div class="panel-body">

				<!--Tabs content-->
				<div class="tab-content">
					<div id="demo-tabs-box-1" class="tab-pane fade in active">
						<table class="table table-striped table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="demo-dt-delete_info" style="width: 100%;">
							<tr>
								<th><?= __('Username') ?></th>
								<td><?= h($user->username) ?></td>
							</tr>
							<tr>
								<th><?= __('Password') ?></th>
								<td><?= h($user->password) ?></td>
							</tr>
							<tr>
								<th><?= __('Email') ?></th>
								<td><?= h($user->profile->email) ?></td>
							</tr>
							<tr>
								<th><?= __('Id') ?></th>
								<td><?= $this->Number->format($user->id) ?></td>
							</tr>
							<tr>
								<th><?= __('UserId') ?></th>
								<td><?= $this->Number->format($user->userId) ?></td>
							</tr>
							<tr>
								<th><?= __('Created') ?></th>
								<td><?= h($user->created) ?></td>
							</tr>
							<tr>
								<th><?= __('Modified') ?></th>
								<td><?= h($user->modified) ?></td>
							</tr>
						</table>
					</div>
					<div id="demo-tabs-box-2" class="tab-pane fade">
						<ul>
							<li><?= $this->Form->postLink(__('Delete Security Account'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--===================================================-->
		<!--End of panel with tabs-->

	</div>
</div>
