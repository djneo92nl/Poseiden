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
	<div id="container" class="cls-container">

		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img demo-my-bg"></div>


		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="index.html">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title">Poseiden <span class="text-thin">Admin</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->


		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Sign In to your account</p>
					<?= $this->Flash->render() ?>

                    <?= $this->Form->create() ?>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<?= $this->Form->input('username', array('class' => 'form-control', 'label'=> false,
									'placeholder' => 'username','div'=> false )) ?>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<?= $this->Form->input('password', array('class' => 'form-control', 'label'=> false,
									'placeholder' => 'password','div'=> false )) ?>
							</div>
						</div>
                        <div class="form-group">
							<div class="input-group">
                                <div class="checkbox">
                                    <label>
										<?php echo $this->Form->checkbox('remember_me', array('hiddenField' => false, 'value' => '1')); ?> Remember me
                                    </label>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8 text-left checkbox">
							</div>
							<div class="col-xs-4">
								<div class="form-group text-right">
									<?= $this->Form->button('Login', array('class' => 'btn btn-success text-uppercase')) ?>
								</div>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>

		</div>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->



	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<?php $this->Html->css("jquery-2.1.1.min.js");?>
	<?php $this->Html->css("bootstrap.min.js");?>
	<?php $this->Html->css("fastclick.min.js");?>
	<?php $this->Html->css("nifty.min.js");?>



	</body>
</html>