<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2018 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form\Field;

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Provides a horizontal scroll bar to specify a value in a range.
 *
 * @link    http://www.w3.org/TR/html-markup/input.text.html#input.text
 * @since   3.0.0
 */
class RangeField extends NumberField
{
	/**
	 * The form field type.
	 *
	 * @var     string
	 * @since   3.0.0
	 */
	protected $type = 'Range';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var     string
	 * @since   3.0.0
	 */
	protected $layout = 'joomla.form.field.range';

	/**
	 * Method to get the field input markup.
	 *
	 * @return   string  The field input markup.
	 * @since    3.0.0
	 */
	protected function getInput()
	{
		return $this->getRenderer($this->layout)->render($this->getLayoutData());
	}

	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return   array
	 * @since    3.0.0
	 */
	protected function getLayoutData()
	{
		$data = parent::getLayoutData();

		// Initialize some field attributes.
		$extraData = array(
			'max'  => $this->max,
			'min'  => $this->min,
			'step' => $this->step,
		);

		return array_merge($data, $extraData);
	}
}
