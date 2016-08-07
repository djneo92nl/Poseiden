
<script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">

<div class="row">
	<div class="col-lg-3">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $textDocument->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $textDocument->id)]
			)
			?></li>
		<li><?= $this->Html->link(__('List Text Documents'), ['action' => 'index']) ?> </li>
	</div>
	<div class="col-lg-9">

		<div class="panel">
			<?= $this->Form->create($textDocument) ?>

			<div class="panel-heading">
				<h3 class="panel-title"><?= __('Edit Text Document'); ?></h3>
			</div>

			<div class="panel-body">
				<? echo $this->Form->input('name'); ?>

				<h4><?= __('Text') ?></h4>
				<?= $this->Form->textarea('text', array('class' => 'editable')); ?>


				<?= $this->Form->button(__('Submit')) ?>
				<?= $this->Form->end() ?>
				<script>
					var elements = document.querySelectorAll('.editable'),
						editor = new MediumEditor('.editable');
				</script>
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

