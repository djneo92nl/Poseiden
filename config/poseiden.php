<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
		        'class' => 'App\Utility\PhilipsHue\DeviceInterface\BridgeConnector'
	        ]
        ],
	    'devices' => [
            ''
	    ],
        'deviceTypes' => [
            'simpleDevice' => [
                'name' => 'Simple on off device',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'simpleDevice'
            ],
            'dimmableDevice' => [
                'name' => 'dimmable Device',
                'description' => 'dimmable Device or light',
                'dimStep' => '256',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'dimmableDevice'
            ]
        ]
    ],

];
