<div id="<?php echo $pluralVar; ?>Ajax">
<?php
	echo "<?php \n\techo \$this->start('breadcrumb');\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('{$pluralHumanName}'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );\n";
	echo "\techo \$this->Html->tag('li', \$this->Html->link(__('Index'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );\n";
	echo "\techo \$this->end();\n?>\n";
?>
<?php
	echo "<?php \n";
	echo "\techo \$this->start('indexSearch');\n";
	echo "\t\$arraySearch = array(";
	foreach ($fields as $field):
		$isKey = false;
		if (!empty($associations['belongsTo'])) {
			foreach ($associations['belongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
					$isKey = true;
					echo "'{$alias}.{$details['displayField']}'=>__('".Inflector::humanize(str_replace('_id','', $field))."'), ";
					continue;
				}
			}
		}
		if ($isKey !== true) {
			echo "'{$field}'=>__('".Inflector::humanize($field)."'), ";
		}
	endforeach;
	echo ");\n";
	echo "\techo \$this->Bs->search(\$arraySearch, '{$pluralVar}Table');\n";
	echo "\techo \$this->end();\n?>\n";
?>
<?php echo "<?php \$this->Paginator->options(array('update' => '#{$pluralVar}Ajax'));?>\n"; ?>
<div class="<?php echo $pluralVar; ?> index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?> <?php echo "<?php echo \$this->Bs->loader(); ?>"; ?></div>
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
        
        echo "\t\t\tif(\$isLoggedIn && \$userRole['add']) :\n";
        echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('New " . $singularHumanName . "'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));\n";
        echo "\t\t\telse : \n";
        echo "\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));\n";
        echo "\t\t\tendif;\n";
        
        echo "\t\t\techo \$this->Bs->dropdown(\$dropdownMenuLink, \$dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));\n";
        echo "\t\t?>\n";
    ?>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?="<?php echo \$this->fetch('indexSearch'); ?>\n"?>
                <?php echo "<?php echo \$this->Bs->toggleColumns(";
                    echo "array(), '{$pluralVar}Table'); ?>\n";
                ?>
            </div>
            <div id="<?="{$pluralVar}Table"?>" class="tableData">
            <div class="table-responsive">
                <?php echo "<?php echo \$this->Session->flash('search')?>\n" ?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                <?php
                    foreach ($fields as $field): 
                        $isKey = false;
                        $class = '';
                        
                        switch($field) {
                            case 'id' : $class .= 'hide id col-md-1';	break;
                            case 'organization_id' : case 'user_id' : $class .= 'hide'; break;
                            case 'name' : case 'username' : case 'email' : $class .= 'col-md-3 col-lg-2'; break;
                            case 'title' : $class .= 'col-md-4'; break;
                            case 'created' : case 'modified' : $class .= 'col-md-2 col-lg-1'; break;
                        }
                        
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
                                    $sortField = $alias.'.'.$details['displayField'];
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            $sortField = $field;
                        }
                ?>
        <th class="<?=$class?>"><?php echo "<?php echo \$this->Paginator->sort('{$sortField}', __('".Inflector::humanize(str_replace('_id','', $field))."')); ?>";?></th>
                <?php endforeach; ?>
        <th class="actions col-md-1"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                echo "\t\t\t\t<tr>\n";
                foreach ($fields as $field) {
                    $isKey = false;
                    $class = '';
                    
                    switch($field) {
                        case 'id' : $class .= 'hide';	break;
                        case 'organization_id' : case 'user_id' : $class .= 'hide'; break;
                        case 'name' : case 'username' : case 'email' : $class .= ''; break;
                        case 'title' : $class .= ''; break;
                        case 'created' : case 'modified' : $class .= ''; break;
                    }
                    
                    if (!empty($associations['belongsTo'])) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                echo "\t\t\t\t\t<td class='$class'><?php echo h(\${$singularVar}['{$alias}']['{$details['displayField']}']); ?>&nbsp;</td>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        
                        // Check for image field
                        if (preg_match("/_image/i", $field)) {
                            echo "\t\t\t\t\t<td class='$class'><?php echo \$this->Bs->timthumb(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
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
                }
                
                echo "\t\t\t\t\t<td class=\"actions\">\n";
    
        echo "\t\t\t\t\t<?php\n";
        echo "\t\t\t\t\t\t\$dropdownMenuLink = array();\n";
        echo "\t\t\t\t\t\t\$dropdownMenu = array();\n";
    
        echo "\t\t\t\t\t\tif(\$isLoggedIn) : \n";
        echo "\t\t\t\t\t\t\tif(\$userRole['edit']) : \n";
        echo "\t\t\t\t\t\t\t\t\$dropdownMenu[] = \$this->Bs->menuLink(__('Edit'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));\n";
        echo "\t\t\t\t\t\t\tendif;\n";
        echo "\t\t\t\t\t\t\tif(\$userRole['delete']) :\n";
        echo "\t\t\t\t\t\t\t\t\$dropdownMenu[] = \$this->Bs->menuLink(__('Delete'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );\n";
        echo "\t\t\t\t\t\t\tendif;\n";
        echo "\t\t\t\t\t\tendif;\n";
        
        echo "\t\t\t\t\t\t\$dropdownMenuLink[] = \$this->Bs->link(__('View'), array('controller'=>'".Inflector::underscore($pluralVar)."', 'action'=>'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );\n";
        echo "\t\t\t\t\t\techo \$this->Bs->dropdown(\$dropdownMenuLink, \$dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));\n";
        echo "\t\t\t\t\t?>\n";			
            
                echo "\t\t\t\t\t</td>\n";
                echo "\t\t\t\t</tr>\n";
                echo "\t\t\t<?php endforeach; ?>\n";
                ?>
                </tbody>
                </table>
            </div>
            
            <?php echo "<?php echo \$this->Bs->paginationRow(); ?>\n"?>
            <?php echo "<?php echo \$this->Js->writeBuffer(); ?>\n"?>
            </div>
        </div>
    </div>
</div>
</div>
</div>