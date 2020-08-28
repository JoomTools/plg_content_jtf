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
 * A textarea field for content creation
 *
 * @see     Editor
 * @since   3.0.0
 */
class EditorField extends \Joomla\CMS\Form\Field\EditorField
{
	use FormFieldExtension;
}
