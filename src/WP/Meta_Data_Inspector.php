<?php

/**
 * Helper class for testing meta boxes.
 * Allows for the verifcation and invoking of meta_boxes.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @since 1.0.0
 * @package Gin0115/WPUnit_Helpers
 */

declare( strict_types=1 );

namespace Gin0115\WPUnit_Helpers\WP;

use Gin0115\WPUnit_Helpers\Utils;
use Gin0115\WPUnit_Helpers\WP\Entities\Meta_Data_Entity;
use PinkCrab\FunctionConstructors\{
	Arrays as Arr,
	Comparisons as C,
	GeneralFunctions as F
};

class Meta_Data_Inspector {
