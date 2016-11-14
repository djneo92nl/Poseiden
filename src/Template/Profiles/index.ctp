<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">

	<div id="page-title">
		<h1 class="page-header text-overflow"><?= __('Profiles') ?></h1>
	</div>

	<div id="page-content">
		<div class="row">
			<div class="eq-height">
				<?php foreach ($profiles as $profile): ?>
					<div class="col-sm-4 col-lg-3">
						<!--Panel with Footer-->
						<!--===================================================-->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">
									<?= h($profile->firstname) ?> <?= h($profile->lastname) ?>
								</h3>
							</div>
							<div class="panel-body">
							</div>
							<div class="panel-footer">
								<?= $this->Html->link(__('View'), ['action' => 'view', $profile->id]) ?>
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id]) ?>
								<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
							</div>
						</div>
						<!--===================================================-->
						<!--End Panel with Footer-->
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
