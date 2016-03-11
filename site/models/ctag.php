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
JLoader::register('ContentModelCategory',JPATH_ROOT.'/components/com_content/models/category.php');
JLoader::register('ContentHelperQuery',JPATH_ROOT.'/components/com_content/helpers/query.php');
JLoader::register('ContentHelperRoute',JPATH_ROOT.'/components/com_content/helpers/route.php');
class CategoryTagModelCtag extends ContentModelCategory {
    public function getItems() {
        $limit = $this->getState('list.limit');
        if($this->_articles === null && $category = $this->getCategory()) {
            $model = JModelLegacy::getInstance('Articles','CategoryTagModel',array('ignore_request' => true));
            $model->setState('params',JFactory::getApplication()->getParams());
            $model->setState('filter.category_id',$category->id);
            $model->setState('filter.published',$this->getState('filter.published'));
            $model->setState('filter.access',$this->getState('filter.access'));
            $model->setState('filter.language',$this->getState('filter.language'));
            $model->setState('filter.featured',$this->getState('filter.featured'));
            $model->setState('list.ordering',$this->_buildContentOrderBy());
            $model->setState('list.start',$this->getState('list.start'));
            $model->setState('list.limit',$limit);
            $model->setState('list.direction',$this->getState('list.direction'));
            $model->setState('list.filter',$this->getState('list.filter'));
            $model->setState('filter.subcategories',$this->getState('filter.subcategories'));
            $model->setState('filter.max_category_levels',$this->getState('filter.max_category_levels'));
            $model->setState('list.links',$this->getState('list.links'));

            $app = JFactory::getApplication('site');
            $tid = $app->input->getInt('tid');
            $model->setState('filter.tag',$tid);

            if($limit >= 0) {
                $this->_articles = $model->getItems();

                if($this->_articles === false) {
                    $this->setError($model->getError());
                }
            } else {
                $this->_articles = array();
            }

            $this->_pagination = $model->getPagination();
        }
        return $this->_articles;
    }
}
