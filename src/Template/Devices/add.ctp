<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['controller' => 'DeviceControllers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device Controller'), ['controller' => 'DeviceControllers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="devices form large-9 medium-8 columns content">
    <?= $this->Form->create($device) ?>
    <fieldset>
        <legend><?= __('Add Device') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('device_controller_id', ['options' => $deviceControllers]);
            echo $this->Form->input('device_type',['options' => $deviceTypes]);
            echo $this->Form->input('device_template');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
