<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Francois Suter <typo3@cobweb.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Testcase for the context parser
 *
 * @author		Francois Suter <typo3@cobweb.ch>
 * @package		TYPO3
 * @subpackage	tx_dataquery
 *
 * $Id$
 */
class tx_context_Test extends tx_phpunit_testcase {

		/**
		 * Provides values to parse and the expected result
		 *
		 * @return array
		 */
		public function valuesProvider() {
			$values = array(
					// Value should be unchanged
				'simple value' => array(
					'value' => 'foo',
					'result' => 'foo'
				),
					// Value should be stripped of the "foo:" prefix
				'value with table' => array(
					'value' => 'foo:bar',
					'result' => 'bar'
				),
					// An array of value should remain an array, with prefixed values cleaned up
				'array of values' => array(
					'value' => array(
						'foo' => 'bar',
						'baz' => array(
							'say' => 'hello:world'
						)
					),
					'result' => array(
						'foo' => 'bar',
						'baz' => array(
							'say' => 'world'
						)
					)
				)
			);
			return $values;
		}

		/**
		 * Test a simple value. It should be unchanged
		 *
		 * @param mixed $value Value to test
		 * @param mixed $result Expected result
		 * @test
		 * @dataProvider valuesProvider
		 */
		public function simpleValue($value, $result) {
			/**
			 * @var tx_context	$parser
			 */
			$parser = t3lib_div::makeInstance('tx_context');
			$actualResult = $parser->cleanUpValues($value);
			$this->assertEquals($result, $actualResult);
		}
}
?>