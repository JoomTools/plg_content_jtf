<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2021 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form\Field;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Form\FormHelper;
use Jtf\Form\FormFieldExtension;

if (version_compare(JVERSION, '4', 'lt'))
{
	FormHelper::loadFieldClass('range');
}

/**
 * Form Field class for the Joomla Platform.
 * Provides a horizontal scroll bar to specify a value in a range.
 *
 * @since  __DEPLOY_VERSION__
 */
class RangeField extends \JFormFieldRange
{
	use FormFieldExtension;
}