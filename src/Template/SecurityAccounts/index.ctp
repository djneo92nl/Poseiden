<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Security Account'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="securityAccounts index large-9 medium-8 columns content">
    <h3><?= __('Security Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('userId') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($securityAccounts as $securityAccount): ?>
            <tr>
                <td><?= $this->Number->format($securityAccount->id) ?></td>
                <td><?= $this->Number->format($securityAccount->userId) ?></td>
                <td><?= h($securityAccount->username) ?></td>
                <td><?= h($securityAccount->created) ?></td>
                <td><?= h($securityAccount->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $securityAccount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $securityAccount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $securityAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $securityAccount->id)]) ?>
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
