<?php defined('_JEXEC') or die;
/**
 * @package        Test template - Optimum Theme
 * @author         Optimum Theme - http://www.optimumtheme.com
 * @copyright      Copyright (C) 2013 - 2015 Optimum Theme. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// Joomla filesystem package
jimport('joomla.filesystem.file');

// Template Config
$config = JPATH_THEMES . '/' . $this->template . '/config/config.php';
if (JFile::exists($config)) {
	include $config;
}

// Layout override - by construct-framework.com
$results = $layoutOverride->getIncludeFile();

if ($results) {
	$altLayout = $results;
	include_once $altLayout;
} 