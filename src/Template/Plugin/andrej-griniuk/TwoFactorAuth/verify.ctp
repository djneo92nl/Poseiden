<?php
$this->layout = false;
$cakeDescription = 'Poseiden: Please login';

?>
	<!DOCTYPE html>
	<html>
<head>
<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $cakeDescription ?>
	</title>

	<!--STYLESHEET-->
	<!--=================================================-->

	<?= $this->Html->css('bootstrap.css') ?>
	<?= $this->Html->css('main.css') ?>
	<?= $this->Html->css('font-awesome.min.css') ?>
	<!-- Create your own class to load custum image [ SAMPLE ]-->
	<style>
		.demo-my-bg{
			background-image : url("<?= $this->Url->image('balloon.jpg' );?>");
		}
	</style>

</head>


	<body>

<?php
/**
 * @var \Cake\View\View $this
 * @var array $loginAction
 * @var bool $remember
 */
echo $this->Flash->render('two-factor-auth');
echo $this->Form->create(null, ['url' => $loginAction]);
echo $this->Form->control('code', ['label' => __('Verification code')]);
if ($remember) {
    echo $this->Form->control('remember', ['type' => 'checkbox', 'label' => __('Trust this device for the next 30 days')]);
}
echo $this->Form->button(__('Verify'));
echo $this->Form->end();
