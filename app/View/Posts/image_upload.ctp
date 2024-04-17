<script language="javascript" type="text/javascript">
	window.parent.window.jbImagesDialog.uploadFinish({
		filename: '<?php echo $this->Html->url('/'.$file_name); ?>',
		result: '<?php echo $result; ?>',
		resultCode: '<?php echo $resultcode; ?>'
	});
</script>

Result: <?php echo $result; ?>