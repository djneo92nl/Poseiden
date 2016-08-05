<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Text Document'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="textDocuments index large-9 medium-8 columns content">
    <h3><?= __('Text Documents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('creator') ?></th>
                <th><?= $this->Paginator->sort('creationDate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($textDocuments as $textDocument): ?>
            <tr>
                <td><?= $this->Number->format($textDocument->id) ?></td>
                <td><?= h($textDocument->name) ?></td>
                <td><?= h($textDocument->creator) ?></td>
                <td><?= h($textDocument->creationDate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $textDocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $textDocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $textDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $textDocument->id)]) ?>
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
