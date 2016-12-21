<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device Controller'), ['action' => 'edit', $deviceController->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device Controller'), ['action' => 'delete', $deviceController->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceController->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device Controller'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deviceControllers view large-9 medium-8 columns content">
    <h3><?= h($deviceController->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($deviceController->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller Device Type') ?></th>
            <td><?= h($deviceController->controller_device_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deviceController->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deviceController->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deviceController->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Controller Data') ?></h4>
        <?= $this->Text->autoParagraph(h($deviceController->controller_data)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Devices') ?></h4>
        <?php if (!empty($deviceController->devices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Device Controller Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Device Type') ?></th>
                <th scope="col"><?= __('Device Template') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deviceController->devices as $devices): ?>
            <tr>
                <td><?= h($devices->id) ?></td>
                <td><?= h($devices->device_controller_id) ?></td>
                <td><?= h($devices->name) ?></td>
                <td><?= h($devices->device_type) ?></td>
                <td><?= h($devices->device_template) ?></td>
                <td><?= h($devices->created) ?></td>
                <td><?= h($devices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
