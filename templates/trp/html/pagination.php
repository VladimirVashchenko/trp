<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Pagination
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;


/**
 * Renders the pagination footer
 *
 * @param   array   $list  Array containing pagination footer
 *
 * @return  string         HTML markup for the full pagination footer
 *
 * @since   3.0
 */
function pagination_list_footer($list)
{
    $html = "<div class=\"pagination\">\n";
    $html .= $list['pageslinks'];
    $html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"" . $list['limitstart'] . "\" />";
    $html .= "\n</div>";

    return $html;
}

/**
 * Renders the pagination list
 *
 * @param   array   $list  Array containing pagination information
 *
 * @return  string         HTML markup for the full pagination object
 *
 * @since   3.0
 */
function pagination_list_render($list)
{
    // Calculate to display range of pages
    $currentPage = 1;
    $range = 1;
    $step = 5;
    foreach ($list['pages'] as $k => $page)
    {
        if (!$page['active'])
        {
            $currentPage = $k;
        }
    }
    if ($currentPage >= $step)
    {
        if ($currentPage % $step == 0)
        {
            $range = ceil($currentPage / $step) + 1;
        }
        else
        {
            $range = ceil($currentPage / $step);
        }
    }

    $html = '<ul class="pagination-list">';
    $html .= $list['start']['data'];
    $html .= $list['previous']['data'];

    foreach ($list['pages'] as $k => $page)
    {
        if (in_array($k, range($range * $step - ($step + 1), $range * $step)))
        {
            if (($k % $step == 0 || $k == $range * $step - ($step + 1)) && $k != $currentPage && $k != $range * $step - $step)
            {
                $page['data'] = preg_replace('#(<a.*?>).*?(</a>)#', '$1...$2', $page['data']);
            }
        }

        $html .= $page['data'];
    }

    $html .= $list['next']['data'];
    $html .= $list['end']['data'];

    $html .= '</ul>';
    return $html;
}

/**
 * Renders an active item in the pagination block
 *
 * @param   JPaginationObject  $item  The current pagination object
 *
 * @return  string                    HTML markup for active item
 *
 * @since   3.0
 */
function pagination_item_active(&$item)
{
    $class = '';



    // If the display object isn't set already, just render the item with its text
    if (!isset($display))
    {
        $display = $item->text;
        $class   = ' class="page-nav"';
    }

    return '<li' . $class . '><a title="' . $item->text . '" href="' . $item->link . '" class="pagenav">' . $display . '</a></li>';
}

/**
 * Renders an inactive item in the pagination block
 *
 * @param   JPaginationObject  $item  The current pagination object
 *
 * @return  string  HTML markup for inactive item
 *
 * @since   3.0
 */
function pagination_item_inactive(&$item)
{

    // Check if the item is the active page
    if (isset($item->active) && ($item->active))
    {
        return '<li class="active page-nav"><a>' . $item->text . '</a></li>';
    }

    // Doesn't match any other condition, render a normal item
    return '';
}