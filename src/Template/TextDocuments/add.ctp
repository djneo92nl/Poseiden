<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Text Documents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="textDocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($textDocument) ?>
    <fieldset>
        <legend><?= __('Add Text Document') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('text');
            echo $this->Form->input('creator');
            echo $this->Form->input('creationDate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
