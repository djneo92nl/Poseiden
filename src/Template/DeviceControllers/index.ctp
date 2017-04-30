<div id="page-title">
    <h1 class="page-header text-overflow col-sm-9"><?= __('Device Controllers') ?></h1>
    <div class="col-sm-3 text-lg-right">
        <?= $this->Html->link(__('New Device Controller'), ['action' => 'add'], [ 'class' => 'btn btn-primary btn-labeled fa fa-plus' ]) ?>
    </div>
</div>

<div id="page-content">
    <div class="row">
        <div class="eq-height">
            <?php foreach ($deviceControllers as $deviceController): ?>
                <div class="col-sm-4 col-lg-3">
                    <!--Panel with Footer-->
                    <!--===================================================-->
                    <div class="panel">
                        <a href="<?= $this->Url->Build(['action' => 'view', $deviceController->id] )?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?= h($deviceController->name) ?>
                                </h3>
                            </div>
                        </a>
                        <div class="panel-body">
                            <?= h($deviceController->device_controller_type); ?>
                        </div>
                        <div class="panel-footer text-lg-right">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deviceController->id], [ 'class' => 'btn btn-mint btn-rounded btn-labeled fa fa-pencil-square-o', 'aria-hidden' => 'true', 'escape' => false ]) ?>

                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End Panel with Footer-->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

