<div id="page-title">
    <h1 class="page-header text-overflow col-sm-9"><?= __('Devices') ?></h1>
    <div class="col-sm-3 text-lg-right">
		<?= $this->Html->link(__('New Device'), ['action' => 'add'], [ 'class' => 'btn btn-primary btn-labeled fa fa-plus' ]) ?>
        <?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add'], [ 'class' => 'btn btn-primary btn-labeled fa fa-plus' ]) ?>
    </div>
</div>
<div id="page-content">
    <div class="row">
        <div class="eq-height">
			<?php foreach ($devices as $device): ?>
				<?= $this->element('Devices/dimmableLight',['device' => $device,'cache' => true]) ?>
			<?php endforeach; ?>
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