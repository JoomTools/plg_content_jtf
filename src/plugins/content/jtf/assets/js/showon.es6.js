/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2019 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 **/

domIsReady(() => {
	const setNovalidate = (elm) => {
			if (!elm.classList.contains('novalidate')) {
				elm.classList.add('novalidate');
				elm.setAttribute('disabled', 'disabled');
			}
		},
		removeNovalidate = (elm) => {
			if (elm.classList.contains('novalidate')) {
				elm.classList.remove('novalidate');
				elm.removeAttribute('disabled');
			}
		},
		toggleNovalidate = (elm, isActive) => {
			if (isActive) {
				removeNovalidate(elm);
			} else {
				setNovalidate(elm);
			}
		};

	let showonElements = document.querySelectorAll('[data-showon]');
	Array.prototype.forEach.call(showonElements, function (elm) {
		let isActive = false,
			formFields = elm.querySelectorAll('input, select, textarea, fieldset');

		if (elm.style.display !== 'none') {
			isActive = true;
		}

		Array.prototype.forEach.call(formFields, function (elm) {
			toggleNovalidate(elm, isActive);
		});

		const showonObserverConfig = {
				attributes: true,
				childList: false,
				characterData: false
			},
			showonObserver = new MutationObserver(function () {
				isActive = false;

				if (elm.style.display !== 'none') {
					isActive = true;
				}

				Array.prototype.forEach.call(formFields, function (elm) {
					toggleNovalidate(elm, isActive);
				});
			});

		showonObserver.observe(elm, showonObserverConfig);
	});
});
