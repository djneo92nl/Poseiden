<div class="col-sm-6 col-md-6 col-lg-3 end">
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
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="Power<?=$device->id; ?>">
                        <label class="onoffswitch-label" for="Power<?=$device->id; ?>">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
                Power
            </li>


            <div class="mar-top" id="sliderBrightness<?=$device->id; ?>">
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

                var gettingDataForDevice<?=$device->id; ?> = false;

                window.setInterval(function(){
                    if (deviceIntervall<?=$device->id; ?>allowed) {
                        if (!gettingDataForDevice<?=$device->id; ?>){
                            gettingDataForDevice<?=$device->id; ?> = true;
                            $.ajax({
                                url: '<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'getState' ] )?>'

                            }).done(function(data){
                                if (deviceIntervall<?=$device->id; ?>allowed) {
                                    gettingDataForDevice<?=$device->id; ?> = false;
                                    $('#Power<?=$device->id; ?>').prop('checked', data.data.state);
                                    $("input#sliderBrightness<?=$device->id; ?>").val(data.data.brightness);
                                }
                            }).fail(function() {
                                gettingDataForDevice<?=$device->id; ?> = false;
                            })
                        }
                    }
                }, 5000);

			</script>

		</div>
		<div class="panel-footer text-lg-right">
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id], [ 'class' => 'btn btn-mint btn-rounded btn-labeled fa fa-pencil-square-o', 'aria-hidden' => 'true', 'escape' => false ]) ?>

		</div>
	</div>
	<!--===================================================-->
	<!--End Panel with Footer-->
</div>