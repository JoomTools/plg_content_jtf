<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    Copyright 2020 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

namespace Jtf\Framework;

defined('_JEXEC') or die('Restricted access');

/**
 * Class FrameworkBs3 set basic css for used framework
 *
 * Pattern for basic field classes
 *
 * Define basic classes for field type 'muster'
 *              $classes['class']['muster'] = array(
 *
 *                  Set a default class for the field, addition to the manifest attribute 'class'.
 *                  For fields such as radio or checkboxes, the class is set to the enclosing tag.
 *                  'field' => array('defaultclass'),
 *
 *                  Set this to define defaults for options for fields such as radio or checkboxes
 *                  'options' => array(
 *                      'labelclass' => array('labelclass'),
 *                      'class'      => array('optionclass'),
 *                  ),
 *
 *                  Set this to define defaults for the button of fields such as calendar
 *                  'buttons' => array(
 *                      'class' => 'uk-button uk-button-small',
 *                      'icon'  => 'uk-icon-calendar',
 *                   ),
 *              );
 *
 * @since 3.0
 **/
class Bs3
{
	public static $name = 'Bootstrap v3';

	private $classes;

	public function __construct($orientation = null)
	{
		$inline         = false;
		$classes        = array();
		$classes['css'] = '.jtf .form-stacked fieldset:not(.form-horizontal) .control-label {text-align: left;}';
		$classes['css'] .= '.jtf fieldset.radio {padding-top: 0;}';
		$classes['css'] .= '.jtf .radio label.radio {display: block;}';
		$classes['css'] .= '.jtf .radio label.radio-inline {display: inline-block;}';
		$classes['css'] .= '.jtf .checkboxes label.checkbox {display: block;}';
		$classes['css'] .= '.jtf .checkboxes label.checkbox-inline {display: inline-block;}';

		$classes['class']['form'][] = 'form-validate';

		switch ($orientation)
		{
			case 'inline':
				$inline                     = true;
				$classes['class']['form'][] = 'form-inline';
				break;

			case 'horizontal':
				$classes['class']['form'][] = 'form-horizontal';
				$classes['class']['gridgroup'][] = 'row';
				break;

			case 'stacked':
			default:
			$classes['class']['form'][] = 'form-stacked';
				break;
		}

		$classes['class']['default'][]        = 'form-control';
		$classes['class']['gridgroup'][]      = 'form-group';
		$classes['class']['gridlabel'][]      = 'control-label';
		$classes['class']['descriptionclass'] = array(
			'form-text',
			'text-muted',
		);

		$classes['class']['note'] = array(
			'buttonclass' => array('close'),
			'buttonicon'  => array('&times;'),
		);

		if ($orientation == 'horizontal')
		{
			$classes['class']['note']['gridfield'][] = 'col-sm-12';
		}

		$classes['class']['calendar'] = array(
//			'class'       => array('form-control'),
			'buttonclass' => array('btn btn-secondary'),
			'buttonicon'  => array('glyphicon glyphicon-calendar'),
		);

		$classes['class']['checkbox'] = array(
			'class' => array('checkbox'),
		);

		$classes['class']['checkboxes'] = array(
			'options' => array(
				'labelclass' => array('checkbox'),
			),
		);

		$classes['class']['radio'] = array(
			'options' => array(
				'labelclass' => array('radio'),
			),
		);

		$classes['class']['textarea'] = array(
			'class' => array('form-control'),
		);

		$classes['class']['file'] = array(
			'uploadicon'  => array('glyphicon glyphicon-upload'),
			'buttonclass' => array('btn btn-success'),
			'buttonicon'  => array('glyphicon glyphicon-copy'),
		);

		$classes['class']['submit'] = array(
			'buttonclass' => array(
				'btn',
				'btn-primary',
			),
		);

		if ($inline)
		{
			$classes['class']['checkboxes']['class'] = array('checkbox-inline');
			$classes['class']['radio']['class']      = array('radio-inline');
		}

		$this->classes = $classes;
	}

	public function getClasses()
	{
		return $this->classes['class'];
	}

	public function getCss()
	{
		return $this->classes['css'];
	}
}
