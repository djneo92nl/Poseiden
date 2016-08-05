<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $textDocument->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $textDocument->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Text Documents'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">



<div class="textDocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($textDocument) ?>
    <fieldset>
        <legend><?= __('Edit Text Document');
                        echo $this->Form->input('name'); ?></legend>
        <?php
            echo $this->Form->textarea('text', array('class' => 'editable'));
            echo $this->Form->input('creator');
            echo $this->Form->input('creationDate');
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <script>
        var elements = document.querySelectorAll('.editable'),
            editor = new MediumEditor('.editable');
    </script>

</div>
