<?php
/**
 * @package CG Isotope switcher Module
 * @version 2.0.0
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2018 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 **/
namespace ConseilGouz\Module\CGIsotopeSwitcher\Site\Helper;
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\Registry\Registry;
use Joomla\CMS\Helper\ModuleHelper;

class CGIsotopeSwitcherHelper
{
	static function getModulesList($params)
	{
		$list = $params->get("modules",array());

		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__modules ')
			->where('id in ('.implode(",",$list).')')
			;
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	public static function getAjax() {
		$module = ModuleHelper::getModule('cg_isotope_switcher');
		$params = new Registry($module->params);  		
        $input = Factory::getApplication()->input;
        $output = '';
		if ($input->get('data') == "param") {
			return '{"name":"'.$module->name.'","effect":"'.$params->get('sp-effect','swoopIn').'"}';
		}
		return false;
	}
}

?>