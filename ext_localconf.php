<?php
	// Register context load with tslib_fe hook
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['configArrayPostProc']['tx_context'] = 'EXT:context/class.tx_context.php:&tx_context->loadContext';
?>