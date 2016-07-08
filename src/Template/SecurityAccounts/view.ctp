<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Security Account'), ['action' => 'edit', $securityAccount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Security Account'), ['action' => 'delete', $securityAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $securityAccount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Security Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Security Account'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="securityAccounts view large-9 medium-8 columns content">
    <h3><?= h($securityAccount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($securityAccount->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($securityAccount->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($securityAccount->id) ?></td>
        </tr>
        <tr>
            <th><?= __('UserId') ?></th>
            <td><?= $this->Number->format($securityAccount->userId) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($securityAccount->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($securityAccount->modified) ?></td>
        </tr>
    </table>
</div>
