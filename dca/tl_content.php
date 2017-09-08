<?php
/**
 * Vuetao Charts
 *
 * Copyright (c) 2017 Andreas Fieger
 *
 * @license MIT
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['vuetaochart'] = '{type_legend},type,headline;{chart_legend:hide},svgwidth,svgheight,template;{data_legend},json_data;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['svgwidth'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['svgwidth'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['rgxp' => 'natural', 'mandatory' => true, 'tl_class' => 'w50'],
    'sql'       => "int(10) unsigned NOT NULL default '100'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['svgheight'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['svgheight'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['rgxp' => 'natural', 'mandatory' => true, 'tl_class' => 'w50'],
    'sql'       => "int(10) unsigned NOT NULL default '100'",
];


$GLOBALS['TL_DCA']['tl_content']['fields']['json_data'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['json_data'],
    'exclude'   => true,
    'inputType' => 'jsonWidget',
    'eval'      => ['mandatory' => true, 'tl_class' => 'long'],
    'sql'       => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['template'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['template'],
    'exclude'   => true,
    'inputType' => 'select',
    'eval'      => ['mandatory' => true, 'tl_class' => 'w50'],
    // TODO 'options_callback' der allet Templates liefert, die mit ce_vtc beginnen.
    'options_callback' => function() {
        return Backend::getTemplateGroup('ce_vtc');
    },
    // 'options'   => ['ce_vtcdonut','ce_vtcbars'],
    'sql'       => "varchar(64) NOT NULL default ''",
];


