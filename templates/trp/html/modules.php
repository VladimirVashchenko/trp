<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * beezDivision chrome.
 *
 * @since   3.0
 */
function modChrome_footerLink($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
            <div class="footer-link">
                <?php echo $module->content; ?>
            </div>
    <?php endif;
}

function modChrome_allNews($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="all-news">
            <?php echo $module->content; ?>
        </div>
    <?php endif;
}