<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2021 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form\Rule;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Form\FormRule;
use Joomla\Registry\Registry;
use Jtf\Form\Form;

/**
 * Form Rule class for the Joomla Platform.
 *
 * @since  __DEPLOY_VERSION__
 */
class PlzRule extends FormRule
{
	/**
	 * The regular expression to use in testing a form field value.
	 *
	 * @var   string
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	protected $regex = '^\d{5}$';

	/**
	 * Method to test the value.
	 *
	 * @param   \SimpleXMLElement  $element  The SimpleXMLElement object representing the `<field>` tag for the form field object.
	 * @param   mixed              $value    The form field value to validate.
	 * @param   string             $group    The field name group control value. This acts as as an array container for the field.
	 *                                       For example if the field has name="foo" and the group value is set to "bar" then the
	 *                                       full field name would end up being "bar[foo]".
	 * @param   Registry|null      $input    An optional Registry object with the entire data set to validate against the entire form.
	 * @param   Form|null          $form     The form object for which the field is being tested.
	 *
	 * @return  boolean  True if the value is valid, false otherwise.
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	public function test(\SimpleXMLElement $element, $value, $group = null, Registry $input = null, Form $form = null): bool
	{
		// If the field is empty and not required, the field is valid.
		$required = ((string) $element['required'] == 'true' || (string) $element['required'] == 'required');

		if (!$required && empty($value))
		{
			return true;
		}

		// Test the value against the regular expression.
		return parent::test($element, $value, $group, $input, $form);
	}
}
