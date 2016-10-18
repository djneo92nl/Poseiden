<?php

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($menu); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Menu']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('controller');
    echo $this->Form->input('action');
    echo $this->Form->input('parentId');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
