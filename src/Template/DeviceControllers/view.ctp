<hr>
<div id="page-content">
    <div class="lg-9">
        <div class="panel panel-primary">
            <!--Panel heading-->
            <div class="panel-heading">
                <div class="panel-control">

                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#config-tabs-box-1">First Tab</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#config-tabs-box-2">
                                <i class="fa fa-gear fa-lg"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <h3 class="panel-title"><?= h($deviceController->name) ?></h3>
            </div>

            <!--Panel body-->
            <div class="panel-body">

                <!--Tabs content-->
                <div class="tab-content">
                    <div id="config-tabs-box-1" class="tab-pane fade in active">
                        <dl class="dl-horizontal">
                            <dt><?= __('Name') ?></dt>
                            <dd><?= h($deviceController->name) ?></dd>
                            <dt><?= __('Created') ?></dt>
                            <dd><?= h($deviceController->created) ?></dd>
                            <dt><?= __('Modified') ?></dt>
                            <dd><?= h($deviceController->modified) ?></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <?php foreach ($driverData as $label => $value) { ?>
                                <dt><?= h($label) ?></dt>
                                <dd><?= h($value) ?></dd>
                            <?php } ?>
                        </dl>
                        <hr>
                        <h4><?= __('Device Controller Data') ?></h4>
                        <?= $this->Text->autoParagraph(h($deviceController->device_controller_data)); ?>
                        <hr>
                        <div class="related">
                            <h4><?= __('Related Devices') ?></h4>
                            <?php if (!empty($deviceController->devices)): ?>
                                <div class="table-responsive">
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th scope="col"><?= __('Id') ?></th>
                                            <th scope="col"><?= __('Device Controller Id') ?></th>
                                            <th scope="col"><?= __('Name') ?></th>
                                            <th scope="col"><?= __('Device Type') ?></th>
                                            <th scope="col"><?= __('Device Template') ?></th>
                                            <th scope="col"><?= __('Created') ?></th>
                                            <th scope="col"><?= __('Modified') ?></th>
                                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php foreach ($deviceController->devices as $devices): ?>
                                            <tr>
                                                <td><?= h($devices->id) ?></td>
                                                <td><?= h($devices->device_controller_id) ?></td>
                                                <td><?= h($devices->name) ?></td>
                                                <td><?= h($devices->device_type) ?></td>
                                                <td><?= h($devices->device_template) ?></td>
                                                <td><?= h($devices->created) ?></td>
                                                <td><?= h($devices->modified) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'),
                                                        ['controller' => 'Devices', 'action' => 'view', $devices->id]
                                                    ) ?>
                                                    <?= $this->Html->link(__('Edit'),
                                                        ['controller' => 'Devices', 'action' => 'edit', $devices->id]
                                                    ) ?>
                                                    <?= $this->Form->postLink(__('Delete'),
                                                        ['controller' => 'Devices', 'action' => 'delete', $devices->id],
                                                        ['confirm' => __('Are you sure you want to delete # {0}?',
                                                            $devices->id
                                                        )]
                                                    ) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div id="config-tabs-box-2" class="tab-pane fade">
                        <h4 class="text-thin"><?= __('Actions') ?></h4>
                        <ul class="side-nav">
                            <li><?= $this->Html->link(__('Edit Device Controller'),
                                    ['action' => 'edit', $deviceController->id]
                                ) ?> </li>
                            <li><?= $this->Form->postLink(__('Delete Device Controller'),
                                    ['action' => 'delete', $deviceController->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $deviceController->id)]
                                ) ?> </li>
                            <li><?= $this->Html->link(__('List Device Controllers'), ['action' => 'index']) ?> </li>
                            <li><?= $this->Html->link(__('New Device Controller'), ['action' => 'add']) ?> </li>
                            <li><?= $this->Html->link(__('List Devices'),
                                    ['controller' => 'Devices', 'action' => 'index']
                                ) ?> </li>
                            <li><?= $this->Html->link(__('New Device'),
                                    ['controller' => 'Devices', 'action' => 'add']
                                ) ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

