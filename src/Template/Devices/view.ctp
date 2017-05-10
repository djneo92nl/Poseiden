<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['controller' => 'DeviceControllers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="devices view large-9 medium-8 columns content">
    <h3><?= h($device->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Device Controller') ?></th>
            <td><?= $device->has('device_controller') ? $this->Html->link($device->device_controller->name, ['controller' => 'DeviceControllers', 'action' => 'view', $device->device_controller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($device->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device Type') ?></th>
            <td><?= h($device->device_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($device->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($device->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Device Template') ?></h4>
        <?= $this->Text->autoParagraph(h($device->device_template)); ?>
    </div>

    <li class="list-group-item">
        <div class="pull-right">
            <input id="Power" class="toggle-switch" type="checkbox">
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
