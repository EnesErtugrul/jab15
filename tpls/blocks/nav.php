<nav class="uk-navbar uk-margin-large-bottom">
    <a class="uk-navbar-brand uk-hidden-small" href="<?php echo $this->baseurl; ?>">My Template</a>
    <?php if ($this->countModules( 'menu' )) : ?>
		<jdoc:include type="modules" name="menu" style="" />
	<?php endif; ?>
	<?php if ($this->countModules( 'offcanvas' )) : ?>
	    <a href="#offcanvas" class="uk-navbar-toggle uk-float-right" data-uk-offcanvas=""></a>
    <?php endif; ?>
    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">My Template</div>
</nav>

<?php if ($this->countModules( 'offcanvas' )) : ?>
<!-- This is the off-canvas sidebar -->
<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
	    <div class="uk-panel uk-panel-box">
		    <jdoc:include type="modules" name="offcanvas" style="" />
	    </div>
    </div>
</div>
<?php endif; ?>