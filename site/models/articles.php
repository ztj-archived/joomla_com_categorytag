<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_categorytag
 *
 * @copyright   Phpsj.com All rights reserved.
 * @license     GNU General Public License version 2 or later;
 */

defined('_JEXEC') or die;
use Joomla\Registry\Registry;
JLoader::register('ContentModelArticles',JPATH_ROOT.'/components/com_content/models/articles.php');
class CategoryTagModelArticles extends ContentModelArticles {
    protected function getListQuery() {
        $db = $this->getDbo();
        $query = parent::getListQuery();
        $tagId = $this->getState('filter.tag');
        if(is_numeric($tagId)) {
            $query->where($db->quoteName('tagmap.tag_id').' = '.(int)$tagId)->join('LEFT',$db->quoteName('#__contentitem_tag_map','tagmap').' ON '.$db->quoteName('tagmap.content_item_id').
                ' = '.$db->quoteName('a.id').' AND '.$db->quoteName('tagmap.type_alias').' = '.$db->quote('com_content.article'));
        }
        return $query;
    }
}

?>