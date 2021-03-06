<?php
/**
 * PDFresourceLink
 *
 * Copyright 2015 by Thomas Jakobi <thomas.jakobi@partout.info>
 *
 * @package pdfresource
 * @subpackage snippet
 *
 * Output filter to create a link to the PDF generated by the given resource id
 */

$output = '';

if ($input) {
    if ($input == $modx->resource->get('id')) {
        $resource = &$modx->resource;
    } else {
        $resource = $modx->getObject('modResource', $input);
    }
    if ($resource) {
        $pdfPath = $modx->getOption('pdfresource.pdf_url', null, $modx->getOption('assets_url') . 'pdf/');
        $aliasPath = $resource->get('parent') ? preg_replace('#(\.[^./]*)$#', '/', $modx->makeUrl($modx->resource->get('parent'))) : '';
        $output = $pdfPath . $aliasPath . $resource->get('alias') . '.pdf';
    }
}

return $output;