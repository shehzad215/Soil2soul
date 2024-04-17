<?php
/**
 * Model template file.
 *
 * Used by bake to create new Model files.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.classes
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

echo "<?php\n";
echo "App::uses('{$plugin}AppModel', '{$pluginPath}Model');\n";
?>
/**
 * <?php echo $name ?> Model
 *
<?php
foreach (array('hasOne', 'belongsTo', 'hasMany', 'hasAndBelongsToMany') as $assocType) {
	if (!empty($associations[$assocType])) {
		foreach ($associations[$assocType] as $relation) {
			echo " * @property {$relation['className']} \${$relation['alias']}\n";
		}
	}
}
?>
 */
class <?php echo $name ?> extends <?php echo $plugin; ?>AppModel {

	public $actsAs = array('Containable');
<?php if ($useDbConfig !== 'default'): ?>
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = '<?php echo $useDbConfig; ?>';

<?php endif;

if ($useTable && $useTable !== Inflector::tableize($name)):
	$table = "'$useTable'";
	echo "/**\n * Use table\n *\n * @var mixed False or table name\n */\n";
	echo "\tpublic \$useTable = $table;\n\n";
endif;

if ($primaryKey !== 'id'): ?>
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = '<?php echo $primaryKey; ?>';

<?php endif;

if ($displayField): ?>
/**
 * Display field
 *
 * @var string
 */
	public $displayField = '<?php echo $displayField; ?>';

<?php endif;

if (!empty($actsAs)): ?>
/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(<?php echo "\n\t"; foreach ($actsAs as $behavior): echo "\t"; var_export($behavior); echo ",\n\t"; endforeach; ?>);

<?php endif; ?>
<?php
$orderRule = 'array()';
if (!empty($validate)):
	if(isset($validate['name'])) {
		$orderRule = 'array("'.$name.'.name"=>"ASC")';
	} else if(isset($validate['title'])) {
		$orderRule = 'array("'.$name.'.title"=>"ASC")';
	} else {
		$orderRule = 'array("'.$name.'.id"=>"ASC")';
	}
endif;
?>
/**
 * Order rule
 *
 * @var array
 */
	public $order = <?php echo $orderRule; ?>;
	
<?php
if (!empty($validate)):
	echo "/**\n * Validation rules\n *\n * @var array\n */\n";
	echo "\tpublic \$validate = array(\n";
	foreach ($validate as $field => $validations):
		echo "\t\t'$field' => array(\n";
		foreach ($validations as $key => $validator):
			echo "\t\t\t'$key' => array(\n";
			echo "\t\t\t\t'rule' => array('$validator'),\n";
			$pattern = '/_id$/';
			if(preg_match($pattern, $field)) {
				$message = "Please select a valid ".Inflector::humanize(preg_replace('/_id$/', '', $field));
			} else {
				$message = "Please enter a valid ".Inflector::humanize($field);
			}
			echo "\t\t\t\t'message' => '$message',\n";
			echo "\t\t\t\t//'allowEmpty' => false,\n";
			echo "\t\t\t\t//'required' => false,\n";
			echo "\t\t\t\t//'last' => false, // Stop validation after this rule\n";
			echo "\t\t\t\t//'on' => 'create', // Limit validation to 'create' or 'update' operations\n";
			echo "\t\t\t),\n";
		endforeach;
		echo "\t\t),\n";
	endforeach;
	echo "\t);\n";
endif;

foreach ($associations as $assoc):
	if (!empty($assoc)):
?>

	//The Associations below have been created with all possible keys, those that are not needed can be removed
<?php
		break;
	endif;
endforeach;

foreach (array('hasOne', 'belongsTo') as $assocType):
	if (!empty($associations[$assocType])):
		$typeCount = count($associations[$assocType]);
		echo "\n/**\n * $assocType associations\n *\n * @var array\n */";
		echo "\n\tpublic \$$assocType = array(";
		foreach ($associations[$assocType] as $i => $relation):
			$out = "\n\t\t'{$relation['alias']}' => array(\n";
			$out .= "\t\t\t'className' => '{$relation['className']}',\n";
			$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
			$out .= "\t\t\t'conditions' => '',\n";
			$out .= "\t\t\t'fields' => '',\n";
			$out .= "\t\t\t'order' => ''\n";
			$out .= "\t\t)";
			if ($i + 1 < $typeCount) {
				$out .= ",";
			}
			echo $out;
		endforeach;
		echo "\n\t);\n";
	endif;
endforeach;

if (!empty($associations['hasMany'])):
	$belongsToCount = count($associations['hasMany']);
	echo "\n/**\n * hasMany associations\n *\n * @var array\n */";
	echo "\n\tpublic \$hasMany = array(";
	foreach ($associations['hasMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'dependent' => false,\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'exclusive' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t\t'counterQuery' => ''\n";
		$out .= "\t\t)";
		if ($i + 1 < $belongsToCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;

if (!empty($associations['hasAndBelongsToMany'])):
	$habtmCount = count($associations['hasAndBelongsToMany']);
	echo "\n/**\n * hasAndBelongsToMany associations\n *\n * @var array\n */";
	echo "\n\tpublic \$hasAndBelongsToMany = array(";
	foreach ($associations['hasAndBelongsToMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'joinTable' => '{$relation['joinTable']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'associationForeignKey' => '{$relation['associationForeignKey']}',\n";
		$out .= "\t\t\t'unique' => 'keepExisting',\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t)";
		if ($i + 1 < $habtmCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;
?>

<?php if($name == 'User') : ?>
	public function beforeFind($query) {
		$this->params = Router::getParams();
		if(AuthComponent::user("Role.super_config") === false) {
			// Disallow non super_config roles to see other organizations details
			
			$fieldName = $this->alias.'.organization_id';
			$query['conditions'][$fieldName] = AuthComponent::user("organization_id");
			
			if(AuthComponent::user("Role.config") === false) {
				// Disallow non super_config & config role users to modify other user details
				$fieldName = $this->alias.'.id';
				
				switch($this->params['action']) {
					case 'index': case 'view': case 'add': case 'edit': case 'delete':
						$query['conditions'][$fieldName] = AuthComponent::user("id");
					break;
				}
			}
		}
		return $query;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		if(!empty($this->validate['organization_id'])) {
			if(empty($this->data[$this->alias]['organization_id'])) {
				$this->data[$this->alias]['organization_id'] = AuthComponent::user("organization_id");
			}
		}
		return true;
	}
	
	public function afterSave($created, $options = array()) {
		if(!$created) {
			if(AuthComponent::user('id') == $this->data['User']['id']) {
				$userTemp = $this->find('first', array('contain'=>array('Organization', 'Role'), 'conditions' => array('User.id' => $this->data['User']['id'])));
				unset($userTemp['User']['password']);
				$user = $userTemp['User'];
				$user['Organization'] = $userTemp['Organization'];
				$user['Role'] = $userTemp['Role'];
				
				CakeSession::write('Auth.User', $user);
				$this->resetRoles();
			}
		}
		parent::afterSave($created, $options = array());
	}
	
	public function resetRoles() {
		// Users role management and initialization
		$userRole = AuthComponent::user('Role');

		$checkAccesses = array('add'=>false, 'edit'=>false, 'delete'=>false);
		
		foreach($checkAccesses as $role=>$roleValue) {
			foreach($userRole as $field=>$value) {
				if (preg_match("/_$role/", $field)) {
					if(!empty($value)) {
						$checkAccesses[$role] = true;
					}
				}
			}
		}
		CakeSession::write('Auth.User.Role', array_merge(AuthComponent::user('Role'), $checkAccesses));
	}
	
	public function generateRandString($length) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars),0,$length);
	}
<?php endif; ?>

<?php if($name == 'Organization') : ?>
	public function beforeFind($query) {
		$this->params = Router::getParams(); 
		
		if(AuthComponent::user("Role.super_config") === false) {
			// Disallow non super_config roles to see other organizations details
			$fieldName = $this->alias.'.id';
			
			switch($this->params['action']) {
				case 'index': case 'view': case 'edit': case 'delete':
					$query['conditions'][$fieldName] = AuthComponent::user("organization_id");
				break;
			}
		}
		return $query;
	}
	
	public function afterSave($created, $options = array()) {
		if(!$created) {
			if(AuthComponent::user('organization_id') == $this->data['Organization']['id']) {
				$data = $this->find('first', array('contain'=>false, 'conditions'=>array('Organization.id'=>$this->data['Organization']['id'])));
				CakeSession::write('Auth.User.Organization', $data['Organization']);
			}
		}
		parent::afterSave($created, $options = array());
	}
<?php endif; ?>
}
