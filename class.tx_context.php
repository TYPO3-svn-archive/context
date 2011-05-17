<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Francois Suter (typo3@cobweb.ch)
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
 * This class provides the functionality for the tx_cachecleaner_cache module of the lowlevel_cleaner
 *
 * @author		Francois Suter <typo3@cobweb.ch>
 * @package		TYPO3
 * @subpackage	tx_context
 *
 *  $Id$
 */
class tx_context {
	protected $extKey = 'context';	// The extension key

	/**
	 * This method responds to the configArrayPostProc hook of tslib_fe
	 * It takes the context information from the template and calls on handlers
	 * to load the data where ever necessary
	 *
	 * @param array $params Single entry array containing the "config" part of the template (not used)
	 * @param tslib_fe $parentObject back-reference to the calling object
	 *
	 * @return	void
	 */
	public function loadContext($params, tslib_fe $parentObject) {
		$context = array();
		$tsKey = 'tx_' . $this->extKey . '.';
			// Check for existing context information
		if (isset($params['config'][$tsKey])) {
			$contextSetup = $params['config'][$tsKey];
				// Parse the context to make it into a simple hash table
			if (count($contextSetup) > 0) {
				foreach ($contextSetup as $key => $value) {
					$contextValue = $value;
						// If the value contains a colon (:), it means it has a syntax like:
						//		tablename:uid
						// In this case, keep only the uid part
					if (strpos($value, ':') !== FALSE) {
						$valueParts = t3lib_div::trimExplode(':', $value, TRUE);
						if (isset($valueParts[1])) {
							$contextValue = $valueParts[1];
						}
					}
					$context[$key] = $contextValue;
				}

					// Load the context setup into the expression parser's extra data
				tx_expressions_parser::setExtraData($context);
					// Call additional context storing handlers to make the context setup available
					// where ever else it may be needed
				if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['contextStorage'])) {
					foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['contextStorage'] as $className) {
						$contextStorage = t3lib_div::getUserObj($className);
						if ($contextStorage instanceof tx_context_ContextStorage) {
							$contextStorage->storeContext($context);
						}
					}
				}
			}
		}
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/context/class.tx_context.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/context/class.tx_context.php']);
}
?>