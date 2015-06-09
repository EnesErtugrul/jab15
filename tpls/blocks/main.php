<jdoc:include type="message" />

<div class="uk-grid">
<?php echo $this->countModules('right') ? '<div class="uk-width-medium-3-4">' : '<div class="uk-width-1-1">'; ?>
<jdoc:include type="component" />
</div>

<?php if ($this->countModules( 'right' )) : ?>
	<div id="right" class="right-block uk-width-medium-1-4">
		<div class="uk-panel uk-panel-box">
			<jdoc:include type="modules" name="right" style="" />
		</div>
	</div>
	<?php endif; ?>

</div>