<?php defined('_JEXEC') or die;
/**
 * @package        Test template - Optimum Theme
 * @author         Optimum Theme - http://www.optimumtheme.com
 * @copyright      Copyright (C) 2013 - 2015 Optimum Theme. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// Call the Fit Framework Helper Class
if (JFile::exists(dirname(__FILE__) . '/helper.php')) {
	include dirname(__FILE__) . '/helper.php';
}

// To get an application object
$app = JFactory::getApplication();
// Returns a reference to the global document object
$doc = JFactory::getDocument();
// Returns a reference to JInput
$jinput = $app->input;
// Returns a reference to the global language object
$lang = JFactory::getLanguage();
$language = $lang->getTag();
// Returns a reference to the menu object
$menu = $app->getMenu();
// Checks for any system messages
$messageQueue = $app->getMessageQueue();
// Define relative path to the  current template directory
$template = 'templates/' . $this->template;
// Define absolute path to the template directory
$templateDir = JPATH_THEMES . '/' . $this->template;
// Get the current URL
$url = clone(JURI::getInstance());
// To access the current user object
$user = JFactory::getUser();
// Get the current view
$view = $jinput->get('view');
// Get the current component (option)
$component = $jinput->get('option');
// The default menu item
$default = $menu->getActive() == $menu->getDefault($lang->getTag());
// Template Layout Directory
$tpls = $template . '/tpls';
// Blocks Directory
$blocks = $tpls . '/blocks';


// *********************
// Template Parameters
// *********************

// Get Template Layout option
$layout = $this->params->get('layout');
// Whether to display component area on home page option
$output 				 = (!$this->params->get("output",true)==false && $default);
// Whether to load remote Bootstrap Framework option
$bootstrap         		 = $this->params->get('bootstrap');
// Whether to load Remote FontAwesome option
$fontAwesome			 = $this->params->get('fontAwesome');
// Get custom meta generator text
$setGeneratorTag         = htmlspecialchars($this->params->get('setGeneratorTag'));
// Whether to disable Joomla's own UI option
$loadJui				 = $this->params->get('loadJui');



if ($loadJui) {
// Load core Bootstrap CSS and Bootstrap bugfixes using class loader method. See http://docs.joomla.org/JHtml::_/11.1
	JHtmlBootstrap::loadCss($includeMaincss = TRUE, $this->direction);
	// Load JUI jQuery and Bootstrap JS, including jQuery noConflict
	JHtml::_('bootstrap.framework');
}

// Change generator tag
$this->setGenerator($setGeneratorTag);

// Load UIkit CSS
	$doc->addStyleSheet($template . '/css/uikit.min.css', 'text/css', 'screen');

// Load core template CSS
	$doc->addStyleSheet($template.'/css/custom.css');


// Load UIkit JS
	$doc->addScript($template . '/js/uikit.min.js');
// Load template JS
	$doc->addScript($template . '/js/script.js');	

// Load Remote Bootstrap Framework
if ($bootstrap) {
	
	// Load Bootstrap 3 CSS
	$doc->addStyleSheet('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
	// Load Bootstrap JS
	$doc->addScript('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
}
if ($fontAwesome) {
	$doc->addStyleSheet('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet');
}

#-------------------------------- Item ID ---------------------------------#

$itemId = $jinput->get('Itemid');

#------------------------------- Article ID -------------------------------#

if ($view == 'article') {
	$articleId = $jinput->get('id', '', 'INT');
} else {
	($articleId = NULL);
}

#------------------------------ Category ID -------------------------------#

function getCategory($id) {
	$app      = JFactory::getApplication();
	$database = JFactory::getDBO();
	$jinput   = $app->input;
	if (($jinput->get('view') == "category") || ($jinput->get('view') == "categories")) {
		return $id;
	} elseif ($jinput->get('view') == "article") {
		$sql  = "SELECT catid FROM #__content WHERE id = " . $id;
		$database->setQuery($sql);

		return $database->loadResult();
	}
}

$catId = getCategory($jinput->get('id', '', 'INT'));



#--------------------------------- Alias ----------------------------------#

if ($itemId) {
	$currentAlias = $app->getMenu()->getActive()->alias;
}

#------------------------------- Page Class -------------------------------#

$pageClass = $menu->getParams($itemId)->get('pageclass_sfx');




#-------------------Extended Template Layout Overrides-----------------------#

$layoutOverride = new FitFrameworkHelper ();

$layoutOverride->includeFile = array();
$layoutOverride->includeFile[] = $tpls . '/' . $layout . '.php';