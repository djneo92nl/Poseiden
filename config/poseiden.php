<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' =>  true,
		        'class' => 'App\Utility\Devices\PhilipsHue\DeviceConnector\BridgeConnector'
	        ],
            'SimpleMQTTConnector' => [
                'name' => 'Simple MQTT Connector',
                'brand' => 'Poseiden',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' => false,
                'class' => 'App\Utility\Devices\Poseiden\DeviceConnector\SimpleMqttConnector'
            ],
            'YeeLightConnector' => [
                'name' => 'YeeLight Connector',
                'brand' => 'Xiaomi',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' => true,
                'class' => 'App\Utility\Devices\Poseiden\DeviceConnector\YeeLightConnector'
            ]
        ],
        'devices' => [
            'H801RGBBeta' => [
                'name' => 'H801 RGB MQTT',
                'brand' => 'Poseiden',
                'version' => '0.0.1',
                'type' => 'colorLight',
                'deviceConnector' => 'simpleMQTTConnector',
                'class' => 'App\Utility\Devices\Poseiden\DeviceDriver\H801RGBBeta'
            ],
            'YeeLightText' => [
                'name' => 'Yee Test Light',
               'brand' => 'Poseiden',
               'version' => '0.0.1',
               'type' => 'dimmableDevice',
               'deviceConnector' => 'YeeLightConnector',
               'class' => 'App\Utility\Devices\Poseiden\DeviceDriver\YeeColorLight'
            ],
            'Huedimmablelight' => [
                'name' => 'Hue Dimmable Light',
                'brand' => 'Philips',
                'version' => '0.0.1',
                'type' => 'dimmableDevice',
                'deviceConnector' => 'PhilipsHueBridge',
                'class' => 'App\Utility\Devices\PhilipsHue\DeviceDriver\DimmableLight'
            ],
            'HueColorlight' => [
	            'name' => 'Hue Color Light',
	            'brand' => 'Philips',
	            'version' => '0.0.1',
	            'type' => 'colorLight',
	            'deviceConnector' => 'PhilipsHueBridge',
	            'class' => 'App\Utility\Devices\PhilipsHue\DeviceDriver\ColorLight'
            ]
        ],
        'deviceTypes' => [
            'simpleDevice' => [
                'name' => 'Simple on off device',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'SimpleDevice'
            ],
            'dimmableDevice' => [
                'name' => 'Dimmable Device',
                'description' => 'dimmable Device or light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn', 'setBrightness', 'getBrightness'
                ],
                'interfaceName' => 'DimmableDevice'
            ],
            'colorLight' => [
                'name' => 'Color Light',
                'description' => 'Colored Light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn', 'setBrightness', 'getBrightness', 'setColor', 'getColor'
                ],
                'interfaceName' => 'ColorLight'
            ]
        ]
    ],

];
