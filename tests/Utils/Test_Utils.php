<?php

declare(strict_types=1);

/**
 * Tests for the Objects helper class
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @since 1.0.0
 * @package Gin0115/WPUnit_Helpers
 */

namespace Gin0115\WPUnit_Helpers\Utils;

use Generator;
use PHPUnit\Framework\TestCase;
use Gin0115\WPUnit_Helpers\Utils;

class Test_Utils extends TestCase {

	/** @testdox Can map array with key, value and any passed variables. */
	public function test_map_with_from_array(): void {
		$array   = array(
			'key1' => 'value1',
			'key2' => 'value2',
			'key3' => 'value3',
		);
		$static1 = 'Arr Static 1';
		$static2 = 'Arr Static 2';

		$result = Utils::array_map_with(
			function( $key, $value, $static1, $static2 ): string {
				return \sprintf( '%s -> %s | %s | %s', $key, $value, $static1, $static2 );
			},
			$array,
			$static1,
			$static2
		);

		$this->assertCount( 3, $result );
		$this->assertEquals( "key1 -> value1 | {$static1} | {$static2}", $result[0] );
		$this->assertEquals( "key2 -> value2 | {$static1} | {$static2}", $result[1] );
		$this->assertEquals( "key3 -> value3 | {$static1} | {$static2}", $result[2] );
	}

	/** @testdox Can map iterable/generator with key, value and any passed variables. */
	public function test_map_with_from_generator(): void {
		
        // Create generator.
        $gernator = function(): Generator {
			yield 'key1' => 'value1';
			yield 'key2' => 'value2';
			yield 'key3' => 'value3';
		};
		
        $static1  = 'Itr Static 1';
		$static2  = 'Itr Static 2';

		$result = Utils::array_map_with(
			function( $key, $value, $static1, $static2 ): string {
				return \sprintf( '%s -> %s | %s | %s', $key, $value, $static1, $static2 );
			},
			$gernator(),
			$static1,
			$static2
		);

		$this->assertCount( 3, $result );
		$this->assertEquals( "key1 -> value1 | {$static1} | {$static2}", $result[0] );
		$this->assertEquals( "key2 -> value2 | {$static1} | {$static2}", $result[1] );
		$this->assertEquals( "key3 -> value3 | {$static1} | {$static2}", $result[2] );
	}

	/** @testdox Can map without any statics, just give key & value in callback. */
    public function test_map_with_no_static_properties()
    {
        $gernator = function(): Generator {
			yield 'key1' => 'value1';
			yield 'key2' => 'value2';
			yield 'key3' => 'value3';
		};
		

		$result = Utils::array_map_with(
			function( $key, $value ): string {
				return \sprintf( '%s -> %s ', $key, $value );
			},
			$gernator()
		);

		$this->assertCount( 3, $result );
		$this->assertEquals( "key1 -> value1 ", $result[0] );
		$this->assertEquals( "key2 -> value2 ", $result[1] );
		$this->assertEquals( "key3 -> value3 ", $result[2] );
    }
}
