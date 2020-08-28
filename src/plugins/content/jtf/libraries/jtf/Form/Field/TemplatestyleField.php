<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    Copyright 2020 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Form\Field;

defined('JPATH_PLATFORM') or die;

use Jtf\Form\FormFieldExtension;

/**
 * Supports a select grouped list of template styles
 *
 * @since  1.6
 */
class TemplatestyleField extends \Joomla\CMS\Form\Field\TemplatestyleField
{
	use FormFieldExtension;
}
