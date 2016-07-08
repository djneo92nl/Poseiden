<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $securityAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $securityAccount->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Security Accounts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="securityAccounts form large-9 medium-8 columns content">
    <?= $this->Form->create($securityAccount) ?>
    <fieldset>
        <legend><?= __('Edit Security Account') ?></legend>
        <?php
            echo $this->Form->input('userId');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
