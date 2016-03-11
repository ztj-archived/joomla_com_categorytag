<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_categorytag
 *
 * @copyright   Phpsj.com All rights reserved.
 * @license     GNU General Public License version 2 or later;
 */

defined('_JEXEC') or die;
?>
<div class="tag-category">
  <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">
	<?php //搜索区域?>
    <fieldset class="filters btn-toolbar clearfix">
      <div class="btn-group">
        <input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" placeholder="<?php echo JText::_('filters tile'); ?>" />
      </div>
      <input type="hidden" name="filter_order" value="" />
      <input type="hidden" name="filter_order_Dir" value="" />
      <input type="hidden" name="limitstart" value="" />
      <input type="hidden" name="task" value="" />
    </fieldset>
    
    <?php //列表区域?>
    <ul class="category list-striped">
      <?php foreach ($this->items as $i=>$item) : ?>
      <?php $link=JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));?>
      <li class="cat-list-row<?php echo $i % 2; ?> clearfix">
        <h3> <a href="<?php echo $link;?>"><?php echo $this->escape($item->title);?></a> </h3>
      </li>
      <?php endforeach; ?>
    </ul>
  </form>
</div>