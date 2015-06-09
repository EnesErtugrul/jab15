<?php defined('_JEXEC') or die;
/**
 * @package        FitFramework - Optimum Theme
 * @author         Optimum Theme - http://www.optimumtheme.com
 * @copyright      Copyright (C) 2013 - 2014 Optimum Theme. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * @license        ConstructFramework - http://construct-framework.com
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <![endif]-->
<!--[if IE 10]>   <html class="no-js ie10" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <![endif]-->
<!--[if gt IE 10]> <!--> <html class="no-js" lang="<?php echo substr($this->language, 0, 2) ?>" dir="<?php echo $this->direction ?>"> <!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<jdoc:include type="head" />
<link rel="shortcut icon" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/favicon.ico" /> 
</head>

<body id="page-top" class="<?php
if ($articleId) {
	echo ' article-' . $articleId;
}
if ($itemId) {
	echo ' item-' . $itemId;
}
if ($catId) {
	echo ' category-' . $catId;
}
if ($default) {
	echo ' default';
}
if ($component) {
	echo ' '. $component;
}
if ($lang) {
	echo ' '. $language;
}
if ($pageClass) {
	echo ' ' . $pageClass;
} ?>">


<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

<?php include_once $blocks . '/nav.php'; ?>
<?php include_once $blocks . '/slideshow.php'; ?>
<?php include_once $blocks . '/top-a.php'; ?>
<?php include_once $blocks . '/top-b.php'; ?>
<?php include_once $blocks . '/top-c.php'; ?>
<?php if(!$output) : ?>
<?php include_once $blocks . '/main.php'; ?>
<?php endif; ?>
<?php include_once $blocks . '/bottom-a.php'; ?>
<?php include_once $blocks . '/bottom-b.php'; ?>

</div>


</body>
</html>