<?php
	echo "<?php \n\techo \$this->start('breadcrumb');\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('{$pluralHumanName}'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('View'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );\n";
	echo "\techo \$this->end();\n?>\n";
?>
<div class="<?php echo $pluralVar; ?>Ajax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></div>
            
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
    
    echo "\t\t\tif(\$isLoggedIn && \$userRole['edit']) : \n";
    echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('Edit'), array('action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));\n";
    echo "\t\t\tendif;\n";;
    echo "\t\t\tif(\$isLoggedIn && \$userRole['delete']) : \n";
    echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('Delete'), array('action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));\n";
    echo "\t\t\tendif;\n";;
    
    echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('" . $pluralHumanName . "'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));\n";
    
    echo "\t\t\techo \$this->Bs->dropdown(\$dropdownMenuLink, \$dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));\n";
    echo "\t\t?>\n";
    ?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
        <?php
                foreach ($fields as $field) {
                    $isKey = false;
                    $class = '';
                    switch($field) {
                        case 'id' : $class .= 'hide id';	break;
                        case 'organization_id' : $class .= 'hide'; break;
                        case 'name' : case 'username' : case 'email' : $class .= ''; break;
                        case 'title' : $class .= ''; break;
                        case 'created' : case 'modified' : $class .= ''; break;
                    }
                    
                    echo "\t\t\t\t<tr>\n";
                    if (!empty($associations['belongsTo'])) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                echo "\t\t\t\t\t<th class='$class col-md-2'><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></th>\n";
                                echo "\t\t\t\t\t<td class='$class'>\n\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller'=>'{$details['controller']}', 'action'=>'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>&nbsp;\n\t\t\t\t\t</td>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        echo "\t\t\t\t\t<th class='$class col-md-2'><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                        
                        // Check for file field
                        if (preg_match("/_file/i", $field)) {
                            echo "\t\t\t\t\t<td class='$class'><?php echo \$this->Bs->fileLink('{$modelClass}.{$field}', \${$singularVar}, array('class'=>'')); ?>&nbsp;</td>\n";
                            continue;
                        }
                        // Check for image field
                        if (preg_match("/_image/i", $field)) {
                            echo "\t\t\t\t\t<td class='$class'><?php echo \$this->Bs->image('{$modelClass}.{$field}', \${$singularVar}, array('class'=>'img-responsive', 'width'=>'', 'height'=>'')); ?>&nbsp;</td>\n";
                            continue;
                        }
                        // Check for date field
                        if (preg_match("/_date/i", $field)) {
                            echo "\t\t\t\t\t<td class='$class'><?php echo \$this->Bs->niceShortDate(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                            continue;
                        }
                        // Check for created, modified date fields
                        if(in_array($field, array('created', 'modified') )) {
                            echo "\t\t\t\t\t<td class='$class'><?php echo \$this->Bs->niceShort(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                            continue;
                        } 
                        
                         /*For Active Check*/
                        if(in_array($field, array('active') )) {
                           echo "\t\t\t\t\t<td class='$class'><p>
                                   <?php echo \$this->Bs->getBooleanValue(\${$singularVar}['{$modelClass}']['{$field}'],\$this->Html->tag('span', \$this->Bs->icon('check'), array('class'=>'text-success')),\$this->Html->tag('span', \$this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>\n";
                           continue;
                         }
                         
                        // General Field
                        echo "\t\t\t\t\t<td class='$class'><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                    }
                    
                    echo "\t\t\t\t</tr>\n";
                }
                ?>	
                    </tbody>
                </table>
            </div>
<?php 
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n"; ?>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
			</ul>
		</div>
	</div>
	<?php
	endforeach;
endif;
?>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<?php
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = $associations['hasMany'];

foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralVar = Inflector::pluralize(Inflector::variable($alias));
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
	
	<div id="related<?php echo Inflector::camelize($otherPluralHumanName); ?>" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo "<?php echo \$this->Html->url(array('controller'=>'{$details['controller']}', 'action'=>'index', '{$details['foreignKey']}'=>\${$singularVar}['{$modelClass}']['id']));?>"?>">
	
	</div>
<?php endforeach; ?>

<?php
$relations = $associations['hasAndBelongsToMany'];

foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralVar = Inflector::pluralize(Inflector::variable($alias));
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
	<div class='portlet box blue-hoki'>
		<div class="portlet-title">
			<div class="caption"><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></div>
			<div class="actions">
				<div class="btn-group btn-group-sm">
	<?php echo "<?php if(\$isLoggedIn && \$userRole['add']) : ?>\n"; ?>
		<?php echo "<?php echo \$this->Bs->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('icon'=>'plus', 'class'=>'btn default', 'data-toggle'=>'', 'data-target'=>'#myModal')); ?>"; ?>
	<?php echo "<?php endif ?>\n"; ?>
				</div>
			</div>
			<div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
			</div>
		</div>
		<div class="portlet-body">
			<div class="tableToolbar row">
				<?php 
					echo "<?php\n";
					echo "//\t\t\t\t\t\$this->Bs->search(array(";
					foreach ($details['fields'] as $k=>$field):
						echo "'{$field}'=>'".Inflector::humanize($field)."', ";
					endforeach;
					echo "), '{$pluralVar}{$alias}Table');\n";
					
					echo "//\t\t\t\t\techo \$this->Bs->toggleColumns(";
					echo "array(";
					foreach ($details['fields'] as $k=>$field):
						echo "'".Inflector::humanize($field)."', ";
					endforeach;
					echo "), '{$pluralVar}{$alias}Table');\n";
					echo "\t\t\t\t?>\n";
				?>
			</div>

			<div id="<?php echo "{$pluralVar}{$alias}Table"?>" class="tableData">
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
				<thead>
					<tr>
<?php
		foreach ($details['fields'] as $k=>$field) {
			$class = '';
			switch($field) {
				case 'id' : $class = 'hide col-md-1';	break;
				case 'organization_id' : case 'user_id' : $class .= 'hide'; break;
				case 'name' : case 'username' : case 'email' : $class = 'col-md-3 col-lg-2'; break;
				case 'title' : $class = 'col-md-4'; break;
				case 'created' : case 'modified' : $class = 'col-md-2 col-lg-1'; break;
			}
			if($k > 7) {
				$class .= ' hide';
			}
		
			echo "\t\t\t\t\t\t<th class='{$class}'><?php echo __('" . Inflector::humanize(str_replace('_id', '', $field)) . "'); ?></th>\n";
		}
?>
						<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
					</tr>
				</thead>
				<tbody data-link="row" class="rowlink">
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<?php
		echo "\t<?php
				\$i = 0;
				foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
				echo "\t\t\t\t<tr>\n";
				foreach ($details['fields'] as $k=>$field) {
					$class = '';
					switch($field) {
						case 'id' : $class .= 'hide';	break;
						case 'organization_id' : case 'user_id' : $class .= 'hide'; break;
						case 'name' : case 'username' : case 'email' : $class .= ''; break;
						case 'title' : $class .= ''; break;
						case 'created' : case 'modified' : $class .= ''; break;
					}
					if($k > 7) {
						$class = 'hide';
					}
					if (preg_match("/_date/i", $field)) {
						echo "\t\t\t\t\t<td class='{$class}'><?php echo \$this->Bs->niceShortDate(\${$otherSingularVar}['{$field}']); ?>&nbsp;</td>\n";
						continue;
					}
					if(in_array($field, array('created', 'modified') )) {
						echo "\t\t\t\t\t<td class='{$class}'><?php echo \$this->Bs->niceShort(\${$otherSingularVar}['{$field}']); ?>&nbsp;</td>\n";
						continue;
					}
					echo "\t\t\t\t\t<td class='{$class}'><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
				}
				
				echo "\t\t\t\t\t<td class=\"actions\">\n";
			
				echo "\t\t\t\t\t<?php\n";
				echo "\t\t\t\t\t\$dropdownMenuLink = array();\n";
				echo "\t\t\t\t\t\t\$dropdownMenu = array();\n";
			
				echo "\t\t\t\t\t\tif(\$isLoggedIn) : \n";
				echo "\t\t\t\t\t\t\tif(\$userRole['edit']) : \n";
				echo "\t\t\t\t\t\t\t\t\$dropdownMenu[] = \$this->Bs->menuLink(__('Edit'), '/{$details['controller']}/edit/'.\${$otherSingularVar}['{$details['primaryKey']}'], array('icon'=>'pencil-square-o', 'data-toggle'=>'moda-manager'));\n";
				echo "\t\t\t\t\t\t\tendif;\n";
				echo "\t\t\t\t\t\t\tif(\$userRole['delete']) :\n";
				echo "\t\t\t\t\t\t\t\t\$dropdownMenu[] = \$this->Bs->menuLink(__('Delete'), '/{$details['controller']}/delete/'.\${$otherSingularVar}['{$details['primaryKey']}'], array('icon'=>'trash-o', 'data-toggle'=>'moda-manager') );\n";
				echo "\t\t\t\t\t\t\tendif;\n";
				echo "\t\t\t\t\t\tendif;\n";
				
				echo "\t\t\t\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('View'), '/{$details['controller']}/view/'.\${$otherSingularVar}['{$details['primaryKey']}'], array('icon'=>'search', 'class'=>'btn btn-default linkrow', 'data-toggle'=>'moda-manager') );\n";
				echo "\t\t\t\t\t\techo \$this->Bs->dropdown(\$dropdownMenuLink, \$dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'ul'=>array('class'=>'pull-right')));\n";
				echo "\t\t\t\t\t?>\n";			
				echo "\t\t\t\t\t</td>\n";
				echo "\t\t\t\t</tr>\n";
		echo "\t<?php endforeach; ?>\n";
		?>
<?php echo "<?php endif; ?>\n\n"; ?>
				</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
</div>