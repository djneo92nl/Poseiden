<div id="page-content">
    <div class="lg-9">
        <div class="panel panel-primary">
            <!--Panel heading-->
            <div class="panel-heading">
                <div class="panel-control">

                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#config-tabs-box-1">First Tab</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#config-tabs-box-2">
                                <i class="fa fa-gear fa-lg"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <h3 class="panel-title"><?= h($deviceController->name) ?></h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">

                <!--Tabs content-->
                <div class="tab-content">
                    <div id="config-tabs-box-1" class="tab-pane fade in active">
                        <dl class="dl-horizontal">
                            <dt><?= __('Name') ?></dt>
                            <dd><?= h($deviceController->name) ?></dd>
                            <dt><?= __('Created') ?></dt>
                            <dd><?= h($deviceController->created) ?></dd>
                            <dt><?= __('Modified') ?></dt>
                            <dd><?= h($deviceController->modified) ?></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <?php foreach ($driverData as $label => $value) { ?>
                                <dt><?= h($label) ?></dt>
                                <dd><?= h($value) ?></dd>
                            <?php } ?>
                        </dl>
                        <hr>
                        <h4><?= __('Device Controller Data') ?></h4>
                        <?= $this->Text->autoParagraph(h($deviceController->device_controller_data)); ?>

                    </div>

                    <div id="config-tabs-box-2" class="tab-pane fade">
                        <h4 class="text-thin"><?= __('Actions') ?></h4>
                        <ul class="side-nav">
                            <li><?= $this->Html->link(__('Edit Device Controller'),
                                    ['action' => 'edit', $deviceController->id]
                                ) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Device Controller'),
                                    ['action' => 'delete', $deviceController->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $deviceController->id)]
                                ) ?> </li>
                            <li><?= $this->Html->link(__('List Device Controllers'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Device Controller'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Devices'),
                                    ['controller' => 'Devices', 'action' => 'index']
                                ) ?> </li>
                            <li><?= $this->Html->link(__('New Device'),
                                    ['controller' => 'Devices', 'action' => 'add']
                                ) ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	    <?php if (!empty($deviceController->devices)):?>
            <div class="row">
                <hr>
                <h3 class="page-header text-overflow col-sm-9"><?= __('Devices') ?></h3>

                <div class="eq-height">
                    <?php foreach ($deviceController->devices as $device): ?>
                        <?= $this->element('Devices/dimmableLight',['device' => $device,'cache' => true]) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

