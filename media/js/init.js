/**
 * @package CG modules switcher Module
 * @version 2.0.0 : 2018 March
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2018 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 * 01.03.00 : get options thru ajax if not found (Joomla caching problem)
 */
jQuery( document ).ready(function() {
	if (typeof Joomla === 'undefined' || typeof Joomla.getOptions === 'undefined') {
		console.error('Joomla.getOptions not found!\nThe Joomla core.js file is not being loaded.');
		return false;
	}
	var options = Joomla.getOptions('cg_isotope_switcher');
	if (typeof options === 'undefined' ) {
		request = {
			'option' : 'com_ajax',
			'module' : 'cg_isotope_switcher',
			'data'   : 'param',
			'format' : 'raw'
			};
			jQuery.ajax({
				type   : 'POST',
				data   : request,
				success: function (response) {
					options = JSON.parse(response);
				}
			});
	}
	jQuery(".cg-modules").css("height","0");	
	jQuery('.cg-mod-sw-btn').on( 'click', function() {
		$module = jQuery(this).attr('data');
		jQuery(".cg-isotope-switcher").find('.is-checked').removeClass('is-checked');
		jQuery( this ).addClass('is-checked');
		jQuery(".cg-modules").css({"display":"none","height":0,"opacity":0});	
		jQuery(".cg-module-"+$module).css({"height":"100%","display":"block"});
		jQuery('.isotope-div').trigger('refresh');
		cgisotope[$module].iso.arrange();
		var animateOptions = {
			delay: 100,
			duration:800};
		jQuery('.cg-module-'+$module).velocity('transition.'+options.effect,animateOptions);
	});
});
