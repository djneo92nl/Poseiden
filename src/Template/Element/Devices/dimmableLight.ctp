<div class="col-sm-4 col-lg-3">
	<!--Panel with Footer-->
	<!--===================================================-->
	<div class="panel">
		<div class="panel-heading">
			<a href="<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'view', $device->id] )?>">
				<h3 class="panel-title">
					<?= h($device->name) ?>
				</h3>
			</a>
		</div>
		<div class="panel-body">
			<li class="list-group-item">
				<div class="pull-right">
					<input id="Power<?=$device->id; ?>" class="js-switch" type="checkbox" >
					<label for="Power<?=$device->id; ?>"></label>
				</div>
				Power
			</li>

            <div id="sliderBrightness<?=$device->id; ?>">
                <input class="bar" max='254' type="range" id="sliderBrightness<?=$device->id; ?>" value="0"/>
            </div>

			<script>

                var deviceIntervall<?=$device->id; ?>allowed =  true;

                $("input#sliderBrightness<?=$device->id; ?>").on('change', function () {
                    $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'setBrightness' ] )?>/' + this.value);
                    deviceIntervall<?=$device->id; ?>allowed =  false;
                    setTimeout(function () {
                        deviceIntervall<?=$device->id; ?>allowed =  true;
                    }, 1000);
                });

                jQuery("#Power<?=$device->id; ?>").change(function() {
                    if(this.checked) {
                        $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'setOn' ] )?>');
                    }
                    if (!this.checked) {
                        $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'setOff' ] )?>');
                    }
                    deviceIntervall<?=$device->id; ?>allowed =  false;
                    setTimeout(function () {
                        deviceIntervall<?=$device->id; ?>allowed =  true;
                    }, 1000);


                });

                window.setInterval(function(){
                    if (deviceIntervall<?=$device->id; ?>allowed) {
                        $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'getState' ] )?>').done(function (data) {
                            toggleSwitch($('#Power<?=$device->id; ?>'),  data.data.state);
                            $("input#sliderBrightness<?=$device->id; ?>").val(data.data.brightness);

                            //$('#Power<?=$device->id; ?>').prop("checked", data.data.state)
                        })
                    }
                }, 4000);
			</script>

		</div>
		<div class="panel-footer text-lg-right">
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id], [ 'class' => 'btn btn-mint btn-rounded btn-labeled fa fa-pencil-square-o', 'aria-hidden' => 'true', 'escape' => false ]) ?>

		</div>
	</div>
	<!--===================================================-->
	<!--End Panel with Footer-->
</div>