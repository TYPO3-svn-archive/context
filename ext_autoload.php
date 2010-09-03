<?php
/* 
 * Register necessary class names with autoloader
 *
 * $Id$
 */
$extensionPath = t3lib_extMgm::extPath('context');
return array(
	'tx_context' => $extensionPath . 'class.tx_context.php',
	'tx_context_contextstorage' => $extensionPath . 'interfaces/interface.tx_context_contextstorage.php',
);
?>
