<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "context".
 *
 * Auto generated 01-04-2013 12:49
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

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
	'version' => '1.3.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.0.99',
			'expressions' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:12:{s:9:"ChangeLog";s:4:"5786";s:20:"class.tx_context.php";s:4:"ffab";s:16:"ext_autoload.php";s:4:"2f54";s:12:"ext_icon.gif";s:4:"b6d8";s:17:"ext_localconf.php";s:4:"0bf1";s:16:"locallang_db.xml";s:4:"0445";s:10:"README.txt";s:4:"c12b";s:14:"doc/manual.pdf";s:4:"815d";s:14:"doc/manual.sxw";s:4:"cb36";s:14:"doc/manual.txt";s:4:"ec0e";s:50:"interfaces/interface.tx_context_contextstorage.php";s:4:"0c4a";s:25:"tests/tx_context_Test.php";s:4:"1810";}',
	'suggests' => array(
	),
);

?>