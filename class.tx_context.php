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

require_once(t3lib_extMgm::extPath('context', 'interfaces/interface.tx_content_contextstorage.php'));

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
//	protected $extConf = array(); // Extension configuration

	/**
	 * Constructor
	 */
	public function __construct() {
			// Load the extension configuration
//		$this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey]);
	}

	/**
	 * This method responds to the configArrayPostProc hook of tslib_fe
	 * It takes the context information from the template and calls on handlers
	 * to load the data where ever necessary
	 *
	 * @param	array		$params: Single entry array containing the "config" part of the template
	 * @param	tslib_fe	$pObj: back-reference to the calling object
	 *
	 * @return	void
	 */
	public function loadContext($params, $pObj) {
		$context = array();
		$contextSetup = array();
		$tsKey = 'tx_' . $this->extKey . '.';
			// Check for existing context information
		if (isset($pObj->tmpl->setup['plugin.'][$tsKey])) {
			$contextSetup = $pObj->tmpl->setup['plugin.'][$tsKey];
				// Parse the context to make it into a simple hash table
			if (count($contextSetup) > 0) {
				foreach ($contextSetup as $key => $value) {
					$contextValue = $value;
						// If the value contains a colon (:), it means it has a syntax like:
						//		tablename:uid
						// In this case, keep only the uid part
					if (strpos($value, ':') !== false) {
						$valueParts = t3lib_div::trimExplode(':', $value, TRUE);
						$contextValue = $valueParts[1];
					}
					$context[$key] = $contextValue;
				}
					// Call context storing handlers to store the context where ever it is needed
				if (is_array($this->TYPO3_CONF_VARS['EXTCONF']['tx_context']['contextStorage'])) {
					foreach ($this->TYPO3_CONF_VARS['EXTCONF']['tx_context']['contextStorage'] as $className) {
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



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/context/class.tx_context.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/context/class.tx_context.php']);
}
?>