<div id="page-title">
    <h1 class="page-header text-overflow col-sm-7"><?= __('Devices') ?></h1>
    <div class="col-sm-5 text-lg-right">
		<?= $this->Html->link(__('New Device'), ['action' => 'add'], [ 'class' => 'btn btn-primary btn-labeled fa fa-plus' ]) ?>
        <?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add'], [ 'class' => 'btn btn-primary btn-labeled fa fa-plus' ]) ?>
    </div>
</div>
<div id="page-content">
    <?php foreach ($controllers as $controller): ?>
        <h4 class="text-thin"><?= $controller['driver']->name ?></h4>
        <hr class="mar-no">
        <br>
        <div class="row">

                <?php foreach ($controller['devices'] as $device): ?>
                    <?= $this->element('Devices/' . (str_replace(' ', '', $device->device_type)),['device' => $device,'cache' => true]) ?>
                <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <div class="paginator">
        <ul class="pagination">
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>