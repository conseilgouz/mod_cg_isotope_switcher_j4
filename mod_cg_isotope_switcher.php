<?php

/**
 * @package CG modules switcher Module
 * @version 2.1.0
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @copyright (c) 2023 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 */
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use ConseilGouz\Module\CGIsotopeSwitcher\Site\Helper\CGIsotopeSwitcherHelper;
use Joomla\CMS\Uri\Uri;

$document 		= Factory::getDocument();
$modulefield	= 'media/'.$module->module.'/';
HTMLHelper::_('bootstrap.framework');

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->addInlineStyle($params->get('css',''));
$wa->registerAndUseStyle('isotopeswticher',$modulefield.'/css/isotope_switcher.css');
$wa->registerAndUseStyle('isoanimate',$modulefield.'/css/animate.min.css');
if ((bool)Factory::getConfig()->get('debug')) { // Mode debug
	$document->addScript(''.URI::base(true).'/media/mod_cg_isotope_switcher/js/init.js'); 
} else {
	$wa->registerAndUseScript('cgisotopeswitcher', $modulefield.'/js/init.js');
}
$document->addScriptOptions('cg_isotope_switcher', 
							array('name' => $module->name,'effect' => $params->get('sp-effect','swoopIn')));

$moduleslist = CGIsotopeSwitcherHelper::getModulesList($params);
require_once(ModuleHelper::getLayoutPath($module->module));

?>