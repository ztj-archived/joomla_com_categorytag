<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_categorytag
 *
 * @copyright   Phpsj.com All rights reserved.
 * @license     GNU General Public License version 2 or later;
 */

defined('_JEXEC') or die;
JLoader::register('ContentViewCategory',JPATH_ROOT.'/components/com_content/views/category/view.html.php');
class CategoryTagViewCtag extends ContentViewCategory {
    protected function prepareDocument() {
    }
}
