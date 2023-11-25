<?php

/**
 * @package CG modules switcher Module
 * @version 2.0.1
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @copyright (c) 2023 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 */
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use ConseilGouz\Module\CGIsotopeSwitcher\Site\Helper\CGIsotopeSwitcherHelper;

$document 		= Factory::getDocument();
$modulefield	= ''.JURI::base(true).'/media/'.$module->module.'/';
$document->addStyleSheet($modulefield.'css/isotope_switcher.css');
$document->addStyleDeclaration($params->get('css','')); 
HTMLHelper::_('bootstrap.framework');
HTMLHelper::_('jquery.framework');
$document->addScript($modulefield.'js/velocity.min.js');
$document->addScript($modulefield.'js/velocity.ui.min.js');
$document->addScript($modulefield.'js/init.js');
$document->addScriptOptions('cg_isotope_switcher', 
							array('name' => $module->name,'effect' => $params->get('sp-effect','swoopIn')));

$moduleslist = CGIsotopeSwitcherHelper::getModulesList($params);
require_once(ModuleHelper::getLayoutPath($module->module));

?>