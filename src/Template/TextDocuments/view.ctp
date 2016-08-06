<div class="row">
	<div class="col-lg-3">
	<li class="heading"><?= __('Actions') ?></li>
	<li><?= $this->Html->link(__('Edit Text Document'), ['action' => 'edit', $textDocument->id]) ?> </li>
	<li><?= $this->Form->postLink(__('Delete Text Document'), ['action' => 'delete', $textDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $textDocument->id)]) ?> </li>
	<li><?= $this->Html->link(__('List Text Documents'), ['action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('New Text Document'), ['action' => 'add']) ?> </li>
	</div>
	<div class="col-lg-9">

		<div class="panel">

			<div class="panel-heading">
				<h3 class="panel-title"><?= h($textDocument->name) ?></h3>
			</div>

			<div class="panel-body">

				<h4><?= __('Text') ?></h4>
				<?= $this->Text->autoParagraph(html_entity_decode($textDocument->text)); ?>


			</div>

				<nav class="large-3 medium-4 columns" id="actions-sidebar">
			    <ul class="side-nav">

			    </ul>
			</nav>
			<div class="textDocuments view large-9 medium-8 columns content">
			    <h3><?= h($textDocument->name) ?></h3>
			    <table class="vertical-table">
			        <tr>
			            <th><?= __('Name') ?></th>
			            <td><?= h($textDocument->name) ?></td>
			        </tr>
			        <tr>
			            <th><?= __('Creator') ?></th>
			            <td><?= h($textDocument->creator) ?></td>
			        </tr>
			        <tr>
			            <th><?= __('Id') ?></th>
			            <td><?= $this->Number->format($textDocument->id) ?></td>
			        </tr>
			        <tr>
			            <th><?= __('CreationDate') ?></th>
			            <td><?= h($textDocument->creationDate) ?></td>
			        </tr>
			    </table>
			    <div class="row">

			    </div>
			</div>
		</div>
	</div>
</div>
