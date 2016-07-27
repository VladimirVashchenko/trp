<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="latestnews">
    <?php foreach ($list as $item) : ?>
        <li itemscope itemtype="https://schema.org/Article">
            <a href="<?php echo $item->link; ?>" itemprop="url">
			<span itemprop="name">
				<?php echo $item->title; ?>
			</span>
            </a>
            <p><?php $date_time = explode(' ', $item->publish_up);
                $date = explode('-', $date_time[0]);
                echo $date[2] . '.' . $date[1] . '.' . $date[0];
                ?></p>
        </li>
    <?php endforeach; ?>
</ul>
