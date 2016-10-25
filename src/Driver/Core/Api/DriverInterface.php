<?php
namespace App\Driver\Core\Api;

/**
 * A Device Driver works together with the Device Interface, A Device Driver contains functions to control the device,
 * 'change value's, give commands'. the Device Interface connects to the device and handels communication between poseiden
 * and the device
 *
 * The usable functions for a device must be specified in the yaml file, these functions are static, as these shall not
 * be cached or parsed
 *
 * The configuration yaml will be parsed to a usable object, during an driver install, all defined functions will be checked if there callable
 *
 *
 * Example:
 *
 * For phillips hue, there are device Drivers for RGBW. RGB and Regulare dimible lights
 * the driver file contains the command change luminosity this will create the command to change its brightness, the
 * device interface mantains the connection between poseiden and the Hue Bridge
 *
 * A device Driver is free to use its own implentations for functions, however a global state is required and some functions defined in this interface
 * For some devices we request you use a template for its functionality provided by the core system
 * We provide tempaletes for
 *  - Simple On Off Devices
 *  - RGB Lights
 *  - RGBW Lights
 *  - Dimmable Lights (default resolution is 256 steps, or 1024)
 *  These are now designed for lights or simple devices, but we plan on moving sensors and other smart devices to this (Nest, Toon)
 *
 *
 * Interface DriverInterface
 *
 * @package App\Driver\Core\Api
 */
interface DriverInterface
{
	//Create function for device driver, can have a install utility or be created with context
	public static function create();
}