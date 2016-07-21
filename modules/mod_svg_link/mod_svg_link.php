<?php
/**
 * @package     A main package name
 * @subpackage  mod_svgLinks
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

defined('_JEXEC') or die('Restricted area');

$doc = JFactory::getDocument();

require_once __DIR__ . '/helper.php';

$list = ModSvgLinkHelper::getList($params);

$linktitle = $list->linktitle;
$linktitle_size = $list->linktitle_size;
$svgpath = $list->svgpath;
$svgcolor = $list->svgcolor;
$viewportwidth = $list->viewportwidth;
$viewportheight = $list->viewportheight;
$viewboxwidth = $list->viewboxwidth;
$viewboxheight = $list->viewboxheight;
$show_title = $list->show_title;

if($list->home && $list->home == 1) {
    $link ='index.php';
} else if ($list->type && $list->type == 'component'){
    $link = 'index.php/' . $list->alias;
} else {
    $link = '';
}

// loading template
require JModuleHelper::getLayoutPath('mod_svg_link', $params->get('layout', 'default'));

?>