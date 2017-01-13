<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Device Controller'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceControllers index large-9 medium-8 columns content">
    <h3><?= __('Device Controllers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_controller_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deviceControllers as $deviceController): ?>
            <tr>
                <td><?= $this->Number->format($deviceController->id) ?></td>
                <td><?= h($deviceController->name) ?></td>
                <td><?= h($deviceController->device_controller_type) ?></td>
                <td><?= h($deviceController->created) ?></td>
                <td><?= h($deviceController->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deviceController->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deviceController->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deviceController->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceController->id)]) ?>
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
