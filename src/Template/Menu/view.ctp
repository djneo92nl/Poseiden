<?php


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
<li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
<li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($menu->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($menu->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Controller') ?></td>
            <td><?= h($menu->controller) ?></td>
        </tr>
        <tr>
            <td><?= __('Action') ?></td>
            <td><?= h($menu->action) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
        <tr>
            <td><?= __('ParentId') ?></td>
            <td><?= $this->Number->format($menu->parentId) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($menu->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($menu->modified) ?></td>
        </tr>
    </table>
</div>

