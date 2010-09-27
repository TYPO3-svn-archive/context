<?php

########################################################################
# Extension Manager/Repository config file for ext "context".
#
# Auto generated 27-09-2010 15:33
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Context Manager',
	'description' => 'Provides a general framework to define contexts for parts of the page tree. Other extensions may use these contexts as needed.',
	'category' => 'fe',
	'author' => 'Francois Suter (Cobweb)',
	'author_email' => 'typo3@cobweb.ch',
	'shy' => '',
	'dependencies' => 'expressions',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.3.0-0.0.0',
			'expressions' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"76ff";s:10:"README.txt";s:4:"3b05";s:20:"class.tx_context.php";s:4:"0cea";s:16:"ext_autoload.php";s:4:"2f54";s:12:"ext_icon.gif";s:4:"b6d8";s:17:"ext_localconf.php";s:4:"0bf1";s:16:"locallang_db.xml";s:4:"0445";s:14:"doc/manual.pdf";s:4:"4204";s:14:"doc/manual.sxw";s:4:"5755";s:50:"interfaces/interface.tx_context_contextstorage.php";s:4:"0c4a";}',
	'suggests' => array(
	),
);

?>