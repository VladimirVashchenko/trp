<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Create some shortcuts.
$params = &$this->item->params;
$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

// Check for at least one editable article
$isEditable = false;

if (!empty($this->items)) {
    foreach ($this->items as $article) {
        if ($article->params->get('access-edit')) {
            $isEditable = true;
            break;
        }
    }
}
?>

<?php if (empty($this->items)) : ?>

    <?php if ($this->params->get('show_no_articles', 1)) : ?>
        <p xmlns="http://www.w3.org/1999/html"><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
    <?php endif; ?>

<?php else : ?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm"
      id="adminForm" class="form-inline">
    <?php
    $headerTitle = '';
    $headerDate = '';
    ?>
    <?php if ($this->params->get('show_headings')) : ?>
        <?php
        $headerTitle = 'headers="categorylist_header_title"';
        $headerDate = 'headers="categorylist_header_date"';
        ?>
    <?php endif; ?>

    <?php foreach ($this->items as $i => $article) : ?>
        <p>
            <?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
                    <?php echo $this->escape($article->title); ?>
                </a>

            <?php else:

                echo $this->escape($article->title) . ' : ';
                $menu = JFactory::getApplication()->getMenu();
                $active = $menu->getActive();
                $itemId = $active->id;
                $link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
                $link->setVar('return', base64_encode(JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language), false)));
                ?>

                <a href="<?php echo $link; ?>" class="register" style="word-wrap: break-word;">
                    <?php echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?>
                </a>
            <?php endif; ?>

            <?php if ($this->params->get('list_show_date')) : ?>
                <span style="display: block;">
            <?php echo JHtml::_('date', $article->displayDate, $this->escape($this->params->get('date_format', JText::_('DATE_FORMAT_LC3')))); ?>
        </span>
            <?php endif; ?>
        </p>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php // Add pagination links ?>
    <?php if (!empty($this->items)) : ?>
    <?php if (($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
        <div class="pagination">

            <?php if ($this->params->def('show_pagination_results', 1)) : ?>
                <p class="counter pull-right">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </p>
            <?php endif; ?>

            <?php echo $this->pagination->getPagesLinks(); ?>
        </div>
    <?php endif; ?>
</form>
<?php endif; ?>
