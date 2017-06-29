<hr>
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
                <h3 class="panel-title"><?= h($device->name) ?></h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">

                <div id="config-tabs-box-1" class="tab-pane fade in active">
                    <dl class="dl-horizontal">
                        <dt><?= __('Device Controller') ?></dt>
                        <dd><?= $device->has('device_controller') ? $this->Html->link($device->device_controller->name, ['controller' => 'DeviceControllers', 'action' => 'view', $device->device_controller->id]) : '' ?></dd>
                        <dt><?= __('Name') ?></dt>
                        <dd><?= h($device->name) ?></dd>
                        <dt><?= __('Device Type') ?></dt>
                        <dd><?= h($device->device_type) ?></dd>
                        <dt><?= __('Id') ?></dt>
                        <dd><?= $this->Number->format($device->id) ?></dd>
                        <dt><?= __('Created') ?></dt>
                        <dd><?= h($device->created) ?></dd>
                        <dt><?= __('Modified') ?></dt>
                        <dd><?= h($device->modified) ?></dd>
                    </dl>
                    <div class="row">
                        <h4><?= __('Device Template') ?></h4>
                        <pre><?= $this->Text->autoParagraph(h($device->device_template)); ?></pre>
                    </div>

                    <div class="row">
                        <h4><?= __('Device Template') ?></h4>
                        <pre><?= $this->Text->autoParagraph(h(implode(' , ',$allowedDeviceActions))); ?></pre>
                    </div>
                    <li class="list-group-item">
                        <div class="pull-right">
                            <input id="Power" class="js-switch" type="checkbox">
                            <label for="Power"></label>
                        </div>
                        Power
                    </li>



                    <script>
                        jQuery("#Power").change(function() {
                            if(this.checked) {
                                $.ajax('<?= $this->Url->Build(['action' => 'runDeviceCommand', $device->id, 'setOn' ] )?>');
                            }
                            if (!this.checked) {
                                $.ajax('<?= $this->Url->Build(['action' => 'runDeviceCommand', $device->id, 'setOff' ] )?>');
                            }
                        });
                    </script>

                </div>
                <div id="config-tabs-box-2" class="tab-pane fade">

                    <h4 class="text-thin"><?= __('Actions') ?></h4>
                    <ul class="side-nav">
                        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
                        <li><?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?> </li>
                        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Device Controllers'), ['controller' => 'DeviceControllers', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
