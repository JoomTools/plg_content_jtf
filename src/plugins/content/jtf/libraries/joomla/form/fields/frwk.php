<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2017 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

defined('JPATH_PLATFORM') or die;

JLoader::registerNamespace('Jtf', JPATH_PLUGINS . '/content/jtf/libraries/jtf', false, false, 'psr4');
JLoader::discover('Jtf\Frameworks\Framework',JPATH_PLUGINS . '/content/jtf/libraries/jtf/Frameworks');
JFormHelper::loadFieldClass('list');

/**
 * Form Field class for the Joomla Platform.
 * Supports a generic list of options.
 *
 * @since  11.1
 */
class JFormFieldFrwk extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Frwk';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   3.7.0
	 */
	protected function getOptions()
	{
		$frwkPath = JPATH_PLUGINS . '/content/jtf/libraries/jtf/Frameworks';
		$frwk = JFolder::files($frwkPath);

		$options = array();

		foreach ($frwk as $file)
		{
			$fileName = JFile::stripExt($file);

			if ($fileName == 'Helper')
			{
				continue;
			}

			$framework = 'Jtf\\Frameworks\\Framework' . ucfirst($fileName);
			$fileRealName = $framework::$name;

			$tmp = array(
				'value'      => strtolower($fileName),
				'text'       => $fileRealName,
			);

			// Add the option object to the result set.
			$options[] = (object) $tmp;

		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
