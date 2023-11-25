<?php
/**
 * @package CG Isotope switcher Module
 * @version 1.0.2 : 2018 March
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2018 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 * 
 * 1.0.2 : compatiblity CSP
 */
defined('_JEXEC') or die('Restricted access'); 
use Joomla\CMS\Helper\ModuleHelper;

$displaybootstrap = $params->get('bootstrapbutton','false'); 
$button_bootstrap = "isosw_button";
if ($displaybootstrap == 'true') { 
	$button_bootstrap = "btn btn-sm ";
}
?>
<div class="cg_modsw_container">
	<div class="cg-isotope-switcher">
	<?php 
		foreach($moduleslist as $module) { ?>
			<button class="<?php echo $button_bootstrap;?>  cg-mod-sw-btn" data="<?php echo $module->id;?>"><?php echo $module->title;?></button>
		<?php } ?>
	</div>
<?php
	foreach($moduleslist as $module) {
	$mod  = ModuleHelper::getModule($module->module,$module->title);
	$attribs  = array('style' => 'well');
    $attribs['style'] = 'none';
	echo '<div class="cg-modules cg-module-'.$module->id.'" id ="cg-modules cg-module-'.$module->id.'" style="display:none;height:0 !important;opacity:0">';
	echo ModuleHelper::renderModule($mod, $attribs);
	echo '</div>';
	}
?>
</div>
