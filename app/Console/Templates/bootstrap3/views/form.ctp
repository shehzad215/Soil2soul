<?php
	$appendUrl = (in_array($action, array('edit', 'admin_edit'))) ? ", \$this->Form->value('{$modelClass}.{$primaryKey}')" : "";

	echo "<?php \n\techo \$this->start('breadcrumb');\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('{$pluralHumanName}'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('".Inflector::humanize($action)." {$singularHumanName}'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'{$action}'{$appendUrl}), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );\n";
	echo "\techo \$this->end();\n?>\n";
?>
<div class="row <?php echo $pluralVar; ?> form">
<div class="col-md-12">
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
            <?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?> <?php echo "<?php echo \$this->Bs->loader(); ?>"; ?>
        </div>
		
		<div class="actions">
<?php
	echo "\t\t<?php\n";
	echo "\t\t\t\$dropdownMenuLink = array();\n";
	echo "\t\t\t\$dropdownMenu = array(\n";
	$done = array();
	if(!empty($associations)) :
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t\t\t\t\$this->Bs->menuLink(__('" . Inflector::humanize($details['controller']) . "'), array('controller'=>'{$details['controller']}', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),\n";
				$done[] = $details['controller'];
			}
		}
	}
	endif;
	echo "\t\t\t);\n\n";

if (strpos($action, 'add') === false): 
	echo "\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('View'), array('action'=>'view', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('icon'=>'search', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));\n";
	echo "\t\t\tif(\$isLoggedIn && \$userRole['delete']) : \n";
	echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('Delete'), array('action'=>'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('icon'=>'trash-o', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));\n";
	echo "\t\t\tendif;\n";;
endif;

	echo "\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('" . $pluralHumanName . "'), array('action' => 'index'), array('icon'=>'list', 'class'=>'btn white btn-sm btn-outline', 'data-toggle'=>'modal-manager'));\n";
	echo "\t\t\techo \$this->Bs->dropdown(\$dropdownMenuLink, \$dropdownMenu, array('type'=>'split', 'dropdownBtnClass'=>'btn-info btn-sm', 'dropdownBtnClass'=>'white btn-outline', 'ul'=>array('class'=>'pull-right')));\n";
	echo "\t\t?>\n";
?>
		</div>
	</div>
	<div class="portlet-body form">
<?php echo "\t\t<?php echo \$this->Bs->create('{$modelClass}', array('class'=>'form-vertical','type'=>'file'));?>\n"; ?>
        <div class="form-body">
<?php
		echo "\t\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				if(strpos($field, '_id')) {
					if(in_array($field, array('user_id', 'organization_id') )) {
						list($model, $dummy) = explode('_', $field);
						echo "\t\t\t// Has {$field}\n";
		//				echo "\t\t\techo \$this->Bs->input('{$field}', array('type'=>'hidden', 'class'=>'addNew".Inflector::camelize($field)."', 'value'=>\$this->Session->read('Auth.".(($model == 'user') ? ucwords($model) : 'User.'.ucwords($model)).".id') ));\n";
					} else {
						echo "\t\t\techo \$this->Bs->input('{$field}', array('empty'=>'Select', 'class'=>'addNew".Inflector::camelize($field)."', 'append'=>array('button'=>'Add New')));\n";
					}
					continue;
				}
				if(strpos($field, '_file')) {
					echo "\t\t\t echo \$this->Bs->input('{$modelClass}.{$field}', array('type'=>'file') );\n";
					continue;
				}
				if(strpos($field, '_image')) {
					echo "\t\t\t echo \$this->Bs->input('{$modelClass}.{$field}', array('type'=>'fileImage', 'fileImage'=>array('width'=>'', 'height'=>'')) );\n";
					continue;
				}
				if(strpos($field, '_date')) {
					echo "\t\t\techo \$this->Bs->input('{$field}', array('type'=>'text', 'class'=>'date', 'data-min-date'=>'', 'data-max-date'=>'', 'placeholder'=>'YYYY-MM-DD', 'append'=>array('icon'=>'calendar')));\n";
					continue;
				}
				echo "\t\t\techo \$this->Bs->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\t\techo \$this->Bs->input('{$assocName}');\n";
			}
		}
		echo "\t\t?>\n";
?>
        </div>
<?php
		echo "\t\t<?php\n";
		echo "\t\t\techo \$this->Bs->formEnd(array(
				\$this->Form->button('<i class=\"fa fa-check\"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm btn-info')),
				\$this->Form->button('<i class=\"fa fa-refresh\"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm btn-warning'))
			));\n";
		echo "\t\t?>\n";
?>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
$(function() {
<?php echo "<?php \$this->start('appScript'); ?>"; ?>
	
<?php echo "<?php \$this->end(); ?>\n"; ?>
});
</script>