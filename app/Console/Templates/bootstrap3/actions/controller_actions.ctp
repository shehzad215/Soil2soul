<?php
/**
 * Bake Template for Controller action generation.
 */
?>
/*
* beforeFilter method
*/
<?php if (empty($admin)): ?>
 	function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', true);
//		$this->Auth->allow('');
	}
<?php endif; ?>

/**
 * <?php echo $admin ?>index method
 *
 * @return void
 */
	public function <?php echo $admin ?>index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this-><?php echo $currentModelName ?>->recursive = 0;
		$this->paginate = $options;
		$this->set('<?php echo $pluralName ?>', $this->paginate('<?php echo $currentModelName ?>'));
		$this->set('_serialize', array('<?php echo $pluralName ?>'));
	}

/**
 * <?php echo $admin ?>lists method
 *
 * @return void
 */
	public function <?php echo $admin ?>lists() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$<?php echo $pluralName ?> = $this-><?php echo $currentModelName ?>->find('list', $options);
		$this->set('<?php echo $pluralName ?>', $<?php echo $pluralName ?>);
		$this->set('_serialize', array('<?php echo $pluralName ?>'));
	}

/**
 * <?php echo $admin ?>view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin ?>view($id = null) {
		if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		$conditions = array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->find('first', $options));
        $this->set('_serialize', array('<?php echo $singularName; ?>'));
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>add method
 *
 * @return void
 */
	public function <?php echo $admin ?>add() {
		if ($this->request->is('post')) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->flash = array('message'=>'The <?php echo strtolower($singularHumanName); ?> has been saved', 'class'=>'success');
				$this->redirect = true;
<?php else: ?>
				$this->flash(__('<?php echo ucfirst(strtolower($currentModelName)); ?> saved.'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->flash = array('message'=>'The <?php echo strtolower($singularHumanName); ?> could not be saved. Please, try again.', 'class'=>'danger');
<?php endif; ?>
			}
		}
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
	endif;
?>
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>edit($id = null) {
<?php if ($currentModelName == 'User'): ?>
		$id = $this->Auth->user('id');
<?php endif; ?>
		if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->flash = array('message'=>__('The <?php echo strtolower($singularHumanName); ?> has been saved'), 'class'=>'success');
				$this->redirect = true;
<?php else: ?>
				$this->flash(__('The <?php echo strtolower($singularHumanName); ?> has been saved.'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->flash = array('message'=>__('The <?php echo strtolower($singularHumanName); ?> could not be saved. Please, try again.'), 'class'=>'danger');
<?php endif; ?>
			}
		} else {
			$conditions = array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this-><?php echo $currentModelName; ?>->find('first', $options);
		}
<?php
		foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
			foreach ($modelObj->{$assoc} as $associationName => $relation):
				if (!empty($associationName)):
					$otherModelName = $this->_modelName($associationName);
					$otherPluralName = $this->_pluralName($associationName);
					echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
					$compact[] = "'{$otherPluralName}'";
				endif;
			endforeach;
		endforeach;
		if (!empty($compact)):
			echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		endif;
	?>
	}

/**
 * <?php echo $admin ?>delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>delete($id = null, $confirm = null) {
		parent::delete($id, $confirm);
	}
	
<?php if ($currentModelName == 'User'): ?>
	public function <?php echo $admin; ?>login() {
		$this->set('enableAjax', false);
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				
				$this->User->resetRoles();
				
				// updating last_login field.
				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('last_login', date('Y-m-d H:i:s') );
				
				$this->flash = array('message'=>'You have successfully logged in', 'class'=>'success');
				$this->redirect = $this->Auth->redirect();
			} else {
				$this->flash = array('message'=>'Invalid username or password, try again', 'class'=>'danger');
			}
		}
	}
	
	public function <?php echo $admin; ?>logout() {
		$this->flash = array('message'=>'You have succesfully logged out', 'class'=>'success');
	    $this->redirect($this->Auth->logout());
	}
    
<?php endif; ?>

