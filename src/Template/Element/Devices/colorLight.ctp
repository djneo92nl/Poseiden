<div class="col-sm-6 col-md-6 col-lg-3 end">
    <!--Panel with Footer-->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading" data-device-id="<?=$device->id; ?>">
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

            <style type="text/css">
                .color-block {
                    width: 100% !important;
                    height: 60% !important;
                    box-sizing: border-box;
                    margin-left: auto;
                }

                .jQWCP-wWheel{
                    float: right !important;
                }
                .jQWCP-wWidget {
                    z-index: 0 !important;
                }
            </style>

            <div class="row">
                <p class="mar-top">
                    <input id="colorPicker<?=$device->id; ?>" type="text" value="#eeee0" data-wheelcolorpicker="" data-wcp-layout="block" data-wcp-sliders="hwsvp" data-wcp-cssclass="color-block col-sm-12" >
                </p>
            </div>


            <div class="mar-top" id="sliderBrightness<?=$device->id; ?>">
                <input class="bar" max='254' type="range" id="sliderBrightness<?=$device->id; ?>" value="0"/>
            </div>

            <script>
                var deviceIntervall<?=$device->id; ?>allowed =  true;

                $('#colorPicker<?=$device->id; ?>').on('sliderdown', function() {
                    deviceIntervall<?=$device->id; ?>allowed =  false;
                    setTimeout(function () {
                        deviceIntervall<?=$device->id; ?>allowed =  true;
                    }, 1000);
                });

                $('#colorPicker<?=$device->id; ?>').on('sliderup', function() {
                    var colorHex = $(this).val();
                    $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'setColor'] )?>/' + colorHex);
                    deviceIntervall<?=$device->id; ?>allowed =  false;
                    setTimeout(function () {
                        deviceIntervall<?=$device->id; ?>allowed =  true;
                    }, 1000);
                });

                
                $("input#sliderBrightness<?=$device->id; ?>").on('change', function () {
                    $.ajax('<?= $this->Url->Build(['controller' => 'Devices', 'action' => 'runDeviceCommand', $device->id, 'setBrightness' ] )?>/' + this.value);
                    deviceIntervall<?=$device->id; ?>allowed =  false;
                    setTimeout(function () {
                        deviceIntervall<?=$device->id; ?>allowed =  true;
                    }, 1000);
                });

                $("#Power<?=$device->id; ?>").change(function() {
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
                                    $("#colorPicker<?=$device->id; ?>").wheelColorPicker('setValue', data.data.color.slice(1));
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

