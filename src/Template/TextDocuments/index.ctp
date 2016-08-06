<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title"><?= __('Text Documents') ?></h3>
	</div>

	<div class="panel-body">

		<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">

			<div class="table-toolbar-left">
				<?= $this->Html->link(__('New Text Document'), ['action' => 'add' ],[ 'class' => 'btn btn-primary btn-labeled fa fa-times']) ?>

			</div>
			<table class="table table-striped table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="demo-dt-delete_info" style="width: 100%;">
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
	</div>
</div>
