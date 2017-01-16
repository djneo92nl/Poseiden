<?php
return [
    'Poseiden' => [
        'interfaces' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
		        'class' => 'App\Utility\PhilipsHue\DeviceInterface\BridgeConnector'
	        ]
        ],
	    'devices' => [

	    ]
    ],

];
