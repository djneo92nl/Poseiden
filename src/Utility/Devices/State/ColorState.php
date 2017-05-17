<?php
namespace App\Utility\Devices\State;

use Primal\Color;

class ColorState extends DimmableState
{

	public $color;


	public function __construct ($state = self::OFF, $brightness = self::EMPTY_VALUE)
	{

		$this->color = 'ffffff';
		parent::__construct($state);
	}

	/**
	 * @return integer
	 */
	public function getColor ()
	{
		return $this->brightness;
	}

	/**
	 * @param integer $value
	 */
	public function setColor ($color)
	{
		$this->color = $color;
	}

	public function hexToRgb($hex)
	{
		list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
		return ['r' => $r, 'g' => $g, 'b' => $b];
	}


	public function RgbToHsV ($R, $G, $B)  // RGB Values:Number 0-255
	{                                 // HSV Results:Number 0-1
		// Convert the RGB byte-values to percentages
		$R = ($R / 255);
		$G = ($G / 255);
		$B = ($B / 255);

		// Calculate a few basic values, the maximum value of R,G,B, the
		//   minimum value, and the difference of the two (chroma).
		$maxRGB = max($R, $G, $B);
		$minRGB = min($R, $G, $B);
		$chroma = $maxRGB - $minRGB;

		// Value (also called Brightness) is the easiest component to calculate,
		//   and is simply the highest value among the R,G,B components.
		// We multiply by 100 to turn the decimal into a readable percent value.
		$computedV = 100 * $maxRGB;

		// Special case if hueless (equal parts RGB make black, white, or grays)
		// Note that Hue is technically undefined when chroma is zero, as
		//   attempting to calculate it would cause division by zero (see
		//   below), so most applications simply substitute a Hue of zero.
		// Saturation will always be zero in this case, see below for details.
		if ($chroma == 0)
			return array(0, 0, $computedV);

		// Saturation is also simple to compute, and is simply the chroma
		//   over the Value (or Brightness)
		// Again, multiplied by 100 to get a percentage.
		$computedS = 100 * ($chroma / $maxRGB);

		// Calculate Hue component
		// Hue is calculated on the "chromacity plane", which is represented
		//   as a 2D hexagon, divided into six 60-degree sectors. We calculate
		//   the bisecting angle as a value 0 <= x < 6, that represents which
		//   portion of which sector the line falls on.
		if ($R == $minRGB)
			$h = 3 - (($G - $B) / $chroma);
		elseif ($B == $minRGB)
			$h = 1 - (($R - $G) / $chroma);
		else // $G == $minRGB
			$h = 5 - (($B - $R) / $chroma);

		// After we have the sector position, we multiply it by the size of
		//   each sector's arc (60 degrees) to obtain the angle in degrees.
		$computedH = 60 * $h;

		return array($computedH, $computedS, $computedV);
	}
}