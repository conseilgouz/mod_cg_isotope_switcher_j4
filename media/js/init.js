/**
 * @package CG modules switcher Module
 * @version 2.1.0
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @copyright (c) 2023 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 */
var animate_effects = []; 
animate_effects["fadeIn"] = "fadeIn";
animate_effects["roolIn"] = "slideInUp";
animate_effects["flipXIn"] = "flipInX";
animate_effects["flipYIn"] = "flipInY";
animate_effects["swoopIn"] = "slideInUp";
animate_effects["whirlIn"] ="rotateIn";
animate_effects["slideUpIn"] ="slideInUp";
animate_effects["slideUpBigIn"] = "slideInUp";
animate_effects["slideDownBigIn"] ="slideInDown";
animate_effects["slideLeftBigIn"] = "slideInLeft";
animate_effects["slideRightBigIn"] ="slideInRight"
animate_effects["perspectiveUpIn"] ="fadeInUpBig";
animate_effects["perspectiveDownIn"] = "fadeInDownBig";
animate_effects["perspectiveLeftIn"] ="fadeInLeftBig";
animate_effects["perspectiveRightIn"] = "fadeInRightBig";

document.addEventListener('DOMContentLoaded', function() {

	if (typeof Joomla === 'undefined' || typeof Joomla.getOptions === 'undefined') {
		console.error('Joomla.getOptions not found!\nThe Joomla core.js file is not being loaded.');
		return false;
	}
	var isoswitchoptions = Joomla.getOptions('cg_isotope_switcher');
	cgmodules = document.querySelectorAll(".cg-modules");
	for(var i=0; i< cgmodules.length; i++) {
		cgmodules[i].style.height = "0";	
	}
	cgbuttons = document.querySelectorAll('.cg-mod-sw-btn');
	for(var i=0; i< cgbuttons.length; i++) {
		cgbuttons[i].addEventListener( 'click', function(e) {
			$module = e.srcElement.getAttribute('data');
			for(var z=0; z< cgbuttons.length; z++) {
				cgbuttons[z].classList.remove('is-checked');
			}
			e.srcElement.classList.add('is-checked');
			for(var z=0; z< cgmodules.length; z++) {
				cgmodules[z].style.display = "none";
				cgmodules[z].style.height = 0;
				cgmodules[z].style.opacity = 0;	
				cgmodules[z].classList.remove('animate__animated', 'animate__'+animate_effects[isoswitchoptions.effect]);	
			}
			cgmodule = document.querySelector(".cg-module-"+$module);
			cgmodule.style.height = "100%";
			cgmodule.style.display = "block";
			cgmodule.style.opacity = 1;
// @todo	==> 	jQuery('.isotope-div').trigger('refresh');
			cgisotope[$module].iso.arrange();
			cgmodule.classList.add('animate__animated', 'animate__'+animate_effects[isoswitchoptions.effect]);
		});
	}
});
