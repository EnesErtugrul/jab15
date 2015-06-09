<?php
/**
 * uikit.php
 *
 * php version 5
 *
 * @category Joomla
 * @package Joomla.Site
 * @subpackage mod_menu
 * @author Folcomedia
 * @copyright 2014 Folcomedia
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link http://www.folcomedia.fr
 */

defined('_JEXEC') or die;


/////////////// Menu PC / Tablette

echo '<ul class="uk-navbar-nav uk-hidden-small"';
if ($params->get('tag_id') != null) {
 $tag = $params->get('tag_id').'';
 echo ' id="'.$tag.'"';
}
echo '>';

foreach ($list as $i => &$item) {
 $class = 'item-'.$item->id;

 if (in_array($item->id, $path)) {
 $class .= ' uk-active';
 }
 elseif ($item->type == 'alias') {
 $aliasToId = $item->params->get('aliasoptions');
 if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
 $class .= ' uk-active';
 }
 }

 if ($item->parent) {
 $class .= ' uk-parent';
 }

 if ($item->shallower) {
 $class .= ' last';
 }

 if (!empty($class)) {
 $class = ' class="'.trim($class) .'"';
 }

 // Autres attributs
 $attr = '';
 if (strpos($class, 'uk-parent') !== FALSE) {
 $attr = ' data-uk-dropdown';
 }

 echo '<li'.$class.$attr.'>';

 // Render the menu item.
 switch ($item->type) :
 case 'separator':
 case 'url':
 case 'component':
 case 'heading':
 require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
 break;

 default:
 require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
 break;
 endswitch;

 // The next item is deeper.
 if ($item->deeper) {
 echo '<div class="uk-dropdown">';
 echo '<ul class="uk-nav uk-nav-dropdown">';
 }
 // The next item is shallower.
 elseif ($item->shallower) {
 echo '</li>';
 echo str_repeat('</ul></div></li>', $item->level_diff);
 }
 // The next item is on the same level.
 else {
 echo '</li>';
 }
}

echo '</ul>';
echo '<a href="#uikid-'.$module->id.'" class="uk-visible-small uk-button uk-button-outline" data-uk-offcanvas>';
echo '<i class="fa fa-bars"></i> ';
echo '</a>';



/////////////// Menu Mobile

echo '<div id="uikid-'.$module->id.'" class="uk-offcanvas">';
echo '<div class="uk-offcanvas-bar">';
echo '<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{multiple:true}">';

foreach ($list as $i => &$item) {
 $class = 'item-'.$item->id;

 if (in_array($item->id, $path)) {
 $class .= ' uk-active';
 }
 elseif ($item->type == 'alias') {
 $aliasToId = $item->params->get('aliasoptions');
 if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
 $class .= ' uk-active';
 }
 }

 if ($item->parent) {
 $class .= ' uk-parent';
 }

 if ($item->shallower) {
 $class .= ' last';
 }

 if (!empty($class)) {
 $class = ' class="'.trim($class) .'"';
 }

 // Autres attributs
 $attr = '';
 if (strpos($class, 'uk-parent') !== FALSE) {
 $item->link = $item->flink = '#';
 $attr = ' data-uk-nav';
 }

 echo '<li'.$class.$attr.'>';

 // Render the menu item.
 switch ($item->type) :
 case 'separator':
 case 'url':
 case 'component':
 case 'heading':
 require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
 break;

 default:
 require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
 break;
 endswitch;

 // The next item is deeper.
 if ($item->deeper) {
 echo '<ul class="uk-nav-sub">';
 }
 // The next item is shallower.
 elseif ($item->shallower) {
 echo '</li>';
 echo str_repeat('</ul></li>', $item->level_diff);
 }
 // The next item is on the same level.
 else {
 echo '</li>';
 }
}

echo '</ul>';
echo '</div>';
echo '</div>';