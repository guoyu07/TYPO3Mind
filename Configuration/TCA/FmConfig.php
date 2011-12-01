<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_freemind2_domain_model_fmconfig'] = array(
	'ctrl' => $TCA['tx_freemind2_domain_model_fmconfig']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, page_uid, recursive, font_face, font_color, font_size, font_bold, font_italic, cloud_is, cloud_color, node_color, node_folded, node_position, node_style, node_icon, node_user_icon, edge_color, edge_style, edge_width',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, recursive, page_uid, --div--;LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tabs.font, font_face, font_color, font_size, font_bold, font_italic, --div--;LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tabs.cloud, cloud_is, cloud_color, --div--;LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tabs.node,node_color, node_folded, node_position, node_style, node_icon, --div--;LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tabs.nodeui, node_user_icon, --div--;LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tabs.edge,edge_color, edge_style, edge_width,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_freemind2_domain_model_fmconfig',
				'foreign_table_where' => 'AND tx_freemind2_domain_model_fmconfig.pid=###CURRENT_PID### AND tx_freemind2_domain_model_fmconfig.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'page_uid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.page_uid',
			'config' => array(
				'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
			),
		),
		'recursive' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.recursive',
			'config' => array(
				'type' => 'check',
				'default' => 0,
				'eval' => 'int',
			),
		),
		'font_face' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.font_face',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'fontFace',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'trim',
			),
		),
		'font_color' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.font_color',
			'config' => array(
				'type' => 'input',
				'size' => '7',
				'max' => '7',
				'wizards' => Array(
					'_PADDING' => 2,
					'color' => Array(
						'title' => 'Color:',
						'type' => 'colorbox',
						'dim' => '12x12',
						'tableStyle' => 'border:solid 1px black;margin-left:20px;',
						'script' => 'wizard_colorpicker.php',
						'JSopenParams' => 'height=550,width=380,status=0,menubar=0,scrollbars=0',
						'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
					),
				),
				'eval' => 'trim,nospace',
			),
		),
		'font_size' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.font_size',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'fontSize',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'int',
			),
		),
		'font_bold' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.font_bold',
			'config' => array(
				'type' => 'check',
				'default' => 0,
				'eval' => 'int',
			),
		),
		'font_italic' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.font_italic',
			'config' => array(
				'type' => 'check',
				'default' => 0,
				'eval' => 'int',
			),
		),
		'cloud_is' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.cloud_is',
			'config' => array(
				'type' => 'check',
				'default' => 0,
				'eval' => 'int',
			),
		),
		'cloud_color' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.cloud_color',
			'config' => array(
				'type' => 'input',
				'size' => '7',
				'max' => '7',
				'wizards' => Array(
					'_PADDING' => 2,
					'color' => Array(
						'title' => 'Color:',
						'type' => 'colorbox',
						'dim' => '12x12',
						'tableStyle' => 'border:solid 1px black;margin-left:20px;',
						'script' => 'wizard_colorpicker.php',
						'JSopenParams' => 'height=550,width=380,status=0,menubar=0,scrollbars=0',
						'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
					),
				),
				'eval' => 'trim,nospace',
			),
		),
		'node_color' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_color',
			'config' => array(
				'type' => 'input',
				'size' => '7',
				'max' => '7',
				'wizards' => Array(
					'_PADDING' => 2,
					'color' => Array(
						'title' => 'Color:',
						'type' => 'colorbox',
						'dim' => '12x12',
						'tableStyle' => 'border:solid 1px black;margin-left:20px;',
						'script' => 'wizard_colorpicker.php',
						'JSopenParams' => 'height=550,width=380,status=0,menubar=0,scrollbars=0',
						'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
					),
				),
				'eval' => 'trim,nospace',
			),
		),
		'node_folded' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_folded',
			'config' => array(
				'type' => 'check',
				'default' => 0,
				'eval' => 'int',
			),
		),
		'node_position' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_position',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'nodePositions',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'alpha',
			),
		),
		'node_style' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_style',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'nodeStyles',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'alpha',
			),
		),
		'node_icon' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_icon',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'type' => 'folder',
					'tsKey' => 'iconsPath',
				),
				'minitems' => 0,
				'maxitems' => 10,
				'renderMode'=>'checkbox',

			),
		),
		'node_user_icon' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.node_user_icon',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'type' => 'folder',
					'tsKey' => 'userIconsPath',
				),
				'minitems' => 0,
				'maxitems' => 10,
				'renderMode'=>'checkbox',
			),
		),
		'edge_color' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.edge_color',
			'config' => array(
				'type' => 'input',
				'size' => '7',
				'max' => '7',
				'wizards' => Array(
					'_PADDING' => 2,
					'color' => Array(
						'title' => 'Color:',
						'type' => 'colorbox',
						'dim' => '12x12',
						'tableStyle' => 'border:solid 1px black;margin-left:20px;',
						'script' => 'wizard_colorpicker.php',
						'JSopenParams' => 'height=550,width=380,status=0,menubar=0,scrollbars=0',
						'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
					),
				),
				'eval' => 'trim,nospace',
			),
		),
		'edge_style' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.edge_style',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'edgeStyles',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'alphanum_x',
			),
		),
		'edge_width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:freemind2/Resources/Private/Language/locallang_db.xml:tx_freemind2_domain_model_fmconfig.edge_width',
			'config' => array(
				'type' => 'select',
				'items' => array(),
				'itemsProcFunc'=>'tx_fmItemsProcFunc->getFromTS',
				'itemsProcFunc_config' => array(
					'tsKey' => 'edgeWidths',
				),
				'minitems' => 0,
				'maxitems' => 1,
				'eval' => 'alphanum',
			),
		),
	),
);
