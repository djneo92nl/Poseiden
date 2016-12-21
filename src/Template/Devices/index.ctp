<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['controller' => 'DeviceControllers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="devices index large-9 medium-8 columns content">
    <h3><?= __('Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_controller_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devices as $device): ?>
            <tr>
                <td><?= $this->Number->format($device->id) ?></td>
                <td><?= $device->has('device_controller') ? $this->Html->link($device->device_controller->name, ['controller' => 'DeviceControllers', 'action' => 'view', $device->device_controller->id]) : '' ?></td>
                <td><?= h($device->name) ?></td>
                <td><?= h($device->device_type) ?></td>
                <td><?= h($device->created) ?></td>
                <td><?= h($device->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $device->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
