<script type="text/javascript">
// Initialize organization level defaults
var isLoggedIn = "<?php echo $isLoggedIn ? 'true' : 'false'?>";
var appRootUrl = '<?php echo $this->Html->url('/') ?>';
var notificationsUrl = "<?php echo $this->Html->url(array('controller'=>'notifications', 'action'=>'feedview')) ?>";

var storedDimensions = <?php echo json_encode($this->Session->read('responsive.image')); ?>;
var registerDimensionsUrl = "<?php echo $this->Html->url(['action' => 'register_dimensions']); ?>";

<?php echo $this->fetch('jsDef'); ?>

$(function() {
	<?php if(!$this->request->is('ajax')) : ?>
		core.init();
		hetuApp.init();

		<?php 
        // Initialize JS Libs based on the requirements
        if(isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') :
	    ?>
			Metronic.init();
	        Layout.init();        
		<?php else : ?>

		<?php endif; ?>
	
	<?php else : ?>
		core.ajaxInit();
		hetuApp.ajaxInit();
	<?php endif; ?>
	
	<?php echo $this->fetch('appScript'); ?>
	
	// Common script for entire application
	$('.hideIt').addClass('hide');
});
</script>