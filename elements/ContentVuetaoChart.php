<?php

/**
 * Vuetao Charts
 *
 * Copyright (c) 2017 Andreas Fieger
 *
 * @license MIT
 */

/**
 * Content element "Vuetao Charts Donut".
 *
 * @author Andreas Fieger <https://github.com/fiedsch>
 */
class ContentVuetaoChart extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_vtcdefault';


	/**
	 * Return if the data file does not exist
	 * @return string
	 */
	public function generate()
	{
        if (TL_MODE === 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '###' .utf8_strtoupper($GLOBALS['TL_LANG']['tl_content']['vuetaochart'][0]) .'###';
            $objTemplate->title = $this->headline;
            return $objTemplate->parse();
        }

        $this->strTemplate = $this->template;

		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile()
	{

        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/vuetaocharts/assets/vue.js|static';
        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/vuetaocharts/assets/vuetaocharts.js|static';
        $GLOBALS['TL_CSS'][] = 'system/modules/vuetaocharts/assets/vuetaocharts.css|static';

        // Use the ID of the content element to create a unique ID for the Vue app
        $this->Template->appid = $this->id;

        // the data for the chart the supplied by the Backend User as JSON-Data.
        $this->Template->data = $this->json_data;
	}

}
