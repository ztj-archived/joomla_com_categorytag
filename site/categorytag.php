<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_categorytag
 *
 * @copyright   Phpsj.com All rights reserved.
 * @license     GNU General Public License version 2 or later;
 */

defined('_JEXEC') or die;
$controller = JControllerLegacy::getInstance('CategoryTag');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
