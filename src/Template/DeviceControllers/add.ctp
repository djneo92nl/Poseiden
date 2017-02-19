<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Device Controllers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceControllers form large-9 medium-8 columns content">
    <?= $this->Form->create($deviceController) ?>
    <fieldset>
        <legend><?= __('Add Device Controller') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('device_controller_type', ['options' => $poseidenInstalledDrivers]);
            echo $this->Form->input('device_controller_data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
