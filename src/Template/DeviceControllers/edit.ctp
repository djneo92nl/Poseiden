<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deviceController->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deviceController->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceControllers form large-9 medium-8 columns content">
    <?= $this->Form->create($deviceController) ?>
    <fieldset>
        <legend><?= __('Edit Device Controller') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('device_controller_type');
            echo $this->Form->input('device_controller_data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
