<?php
/**
 * Bootstrap Helper
 *
 * Input Form manipulations: ...
 *
 */
App::uses('AppHelper', 'View/Helper');
App::uses('Sanitize', 'Utility');
App::uses('Hash', 'Utility');

/**
 * Bootstrap helper library.
 *
 * Text manipulations: Highlight, excerpt, truncate, strip of links, convert email addresses to mailto: links...
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/text.html
 * @see String
 */
class BsHelper extends AppHelper {

/**
 * helpers
 *
 * @var array
 */
public $helpers = array('Html', 'Form', 'Session', 'Time', 'Paginator', 'Number', 'AssetCompress.AssetCompress');

/**
 * String utility instance
 *
 * @var stdClass
 */
protected $_engine;


/**
 * Form input options default settings
 *
 * @var array
 */
protected $_inputDefaults = array();

/**
 * Form option defaults
 *
 * @var array
 */
protected $_formDefaults = array();

/**
 *
 *
 * @var array
 */
public $options = array();

/**
 * Constructor
 *
 * ### Settings:
 *
 * - `engine` Class name to use to replace String functionality.
 *            The class needs to be placed in the `Utility` directory.
 *
 * @param View $View the view object the helper is attached to.
 * @param array $settings Settings array Settings array
 * @throws CakeException when the engine class could not be found.
 */
public function __construct(View $View, $settings = array()) {
	$settings = Hash::merge(array('engine' => 'StringData'), $settings);
	parent::__construct($View, $settings);
	list($plugin, $engineClass) = pluginSplit($settings['engine'], true);
	App::uses($engineClass, $plugin . 'Utility');
	if (class_exists($engineClass)) {
		$this->_engine = new $engineClass($settings);
	} else {
		throw new CakeException(__d('cake_dev', '%s could not be found', $engineClass));
	}

	$this->modalTarget = '#myModal';
	if ($this->request->is('ajax')) {
		$this->modalTarget = '#myModalAjax';
	}
}

/**
 * Call methods from String utility class
 */
public function __call($method, $params) {
	return call_user_func_array(array($this->_engine, $method), $params);
}

/**
 * Create Form
 * works with inputDefaults($inputOptions = array())
 *
 * @param $model String
 * @param $options Array
 */
public function create($model = null, $options = array()) {
	if(!empty($options)) {
			//$options = array_merge($options, array('role'=>'form'));
	}
	echo $this->Form->create($model, $options);
	$this->_formDefaults = $options;
	if(empty($options['inputDefaults'])) {
		$this->inputDefaults();
	} else {
		$this->inputDefaults($options['inputDefaults']);
	}
}

/**
 * Create Form inputs
 *
 * @param $inputOptions Array
 */
public function inputDefaults($inputOptions = array(), $formClass = null) {
	if($formClass) {
		$this->_formDefaults['class'] = $formClass;
	}

	$this->_inputDefaults = array(
		'div' => array('class'=>'form-group'),
		'class' => 'form-control',
		'format' => array('label', 'between', 'before', 'input', 'after', 'error'),
		'label' => '',
		'between' => '',
		'before' => '',
		'after' => '',
		'error' => array('attributes' => array('wrap' => 'label', 'class' => 'text-error')) ,
		);

	$this->_inputDefaults = array_merge($this->_inputDefaults, $inputOptions);

	if(empty($inputOptions)) {
            // If form has class = "form-horizontal" set the below as defaults
		if(preg_match("/\bform-horizontal\b/i", $this->_formDefaults['class'])) {
			$this->_inputDefaults['label'] = array('class'=>'control-label col-md-3 col-lg-2');
			$this->_inputDefaults['between'] = '<div class="col-md-9 col-lg-10">';
			$this->_inputDefaults['after'] = '</div>';
		}

		if(preg_match("/\bform-vertical\b/i", $this->_formDefaults['class'])) {
			$this->_inputDefaults['label'] = array('class'=>'control-label');
			$this->_inputDefaults['between'] = '';
			$this->_inputDefaults['after'] = '';
		}
	}

	$this->Form->inputDefaults($this->_inputDefaults);
}
/**
 * Ends Form Tag. Works with resetInputDefaults
 *
 * @param $options Array
 * @return ending Form Tag
 * @see FormHelper::end($options = null, $secureAttributes = array())
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
public function end($options = null) {
	return $this->Form->end($options);
	$this->resetInputDefaults();
}

/**
 * Create Form Submit Button
 *
 * @param $htmlContent String
 * @return html div creation in Bootstrap
 * @see HtmlHelper::div(string $class, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function formEnd($htmlContent){

	$divOptions = array('class'=>'form-actions');
	if($this->params['isAjax']) {
		$htmlContent[] = ' <button type="button" class="btn btn-grey" data-dismiss="modal">'.$this->icon('times').' Close</button>';
		$divOptions = $this->addClass($divOptions, 'text-right');
		$htmlContent = array_reverse($htmlContent);
	}
	$htmlContent = implode('&nbsp;&nbsp;', $htmlContent);
	$html = $this->Html->tag('div',
		/*$this->Html->div('col-md-3 col-lg-2',
			$this->Html->div('progress progress-striped active hide',
				$this->Html->div('progress-bar',
					$this->Html->tag('span', '0% Complete', array('class'=>'sr-only'))
					, array('role'=>"progressbar", 'aria-valuenow'=>"0", 'aria-valuemin'=>"0", 'aria-valuemax'=>"100", 'style'=>"width: 0%"))
				, array())
			).*/
		$this->Html->div('col-md-12 col-lg-12', $htmlContent)
		, $divOptions);

	$html .= $this->end();

	return $html;
}

/**
 * Reset inputs to default
 */
public function resetInputDefaults() {
	$this->Form->inputDefaults(array(
		'div' => null,
		'class' => null,
		'format' => array('label', 'between', 'before', 'input', 'after', 'error'),
		'label' => null,
		'between' => null,
		'before' => null,
		'error' => array('attributes' => array('wrap' => 'label', 'class' => 'text-danger')) ,
		'after' => null
		)
	);
}

/**
 * Create Form Label
 *
 * @param $field String
 * @param $text String
 * @param $options Array
 * @return label
 * @see FormHelper::input()
 * @link book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
public function label($field, $text = null, $options = array()) {
	$options = array_merge($this->_inputDefaults['label'], $options);
	return $this->Form->label($field, $text, $options);
}

/**
 * @see String::input()
 *
 * @param string $field String as field name.
 * @param array $options An array of html attributes and options.
 * @return string Form input with bootstrap form Control
 * @see FormHelper::input()
 * @link book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
public function input($field, $options = array()) {
	$this->returnOp = array('prepend'=>'', 'append'=>'', 'appendAfter'=>'', 'class'=>'');
	$this->options = $options;
	$this->field = $field;

		// Input field wrapper
	$inputWrapStart = $inputWrapEnd = array();

	if(!empty($this->_inputDefaults['class'])) {
		$this->options = $this->addClass($this->options, $this->_inputDefaults['class']);
	}

	if(!empty($this->options['col'])) {
		array_push($inputWrapStart, "<div class='col-md-".$this->options['col']."'>");
		array_push($inputWrapEnd, '</div>');

		unset($this->options['col']);
	}

	if(isset($this->options['div'])) {
		if($this->options['div'] == false) {
			$this->options['between'] = '';
			$this->options['after'] = '';
		} else {
			if(isset($this->options['div']['class'])) {
				$this->options['div'] = $this->addClass($this->options['div'], $this->_inputDefaults['div']['class']);
			}
		}
	}
	if(isset($this->options['label'])) {
		if(!empty($this->options['label'])) {
			if(!is_array($this->options['label'])) {
				$text = $this->options['label'];
				unset($this->options['label']);
				$this->options['label']['text'] = $text;
				if(isset($this->options['label'])){
					$this->options['label'] = $this->addClass($this->options['label'], $this->_inputDefaults['label']['class']);
				}
			}
		}

		if($this->options['label'] == false && !empty($this->options['placeholder'])) {
			unset($this->options['label']);
			$this->options['label'] = array('class' => 'control-label visible-ie8 visible-ie9');
		}
	}

	if(isset($this->options['options'])) {
		if(!empty($this->options['text2value'])) {
			$this->options['options'] = array_combine($this->options['options'], $this->options['options']);
			unset($this->options['text2value']);
		}
	}

	if(isset($this->options['type'])) {
		switch($this->options['type']) {
			case 'hidden':
			$inputWrapStart = $inputWrapEnd = array();
			$this->inputCounter = 1;
			break;

			case 'file': case 'fileImage':
			$this->originalField = $field;

					if(preg_match('/^(\w+).(\w+)$/', $field, $matches)) { // 'Model.Field' => 'UserDetail.image_file'
					list($dummy, $this->inpModel, $this->field) = $matches;
					} else if(preg_match('/^(\w+).([0-9]).(\w+)$/', $field, $matches)) { // 'Model.Index.Field' => 'UserDetail.0.image_file'
					list($dummy, $this->inpModel, $this->fieldIndex, $this->field) = $matches;
				}
				$this->file();
				break;
				case 'radio':
				$this->radio();
				$this->options['class'] = str_replace('form-control', '', $this->options['class']);
				break;

				case 'checkbox':
				$this->checkbox();
				$this->options['class'] = str_replace('form-control', '', $this->options['class']);
				break;

				case 'select':
				if(isset($this->options['multiple'])) {
					if(in_array($this->options['multiple'], array('checkbox'))) {
						$this->checkbox();
					}
				}
				break;

				case 'timezone':
				$this->options['type'] = 'select';
				$this->options['empty'] = 'Select';
				$filter = array();
				if(isset($this->options['filter'])) {
					$filter = $this->options['filter'];
				}
				$this->options['options'] = $this->Timezone->options($filter);
				break;
			}
		}
		if(isset($options['prepend'])) {
			$this->_inputAppPre('prepend');
		}
		if(isset($options['append'])) {
			$this->_inputAppPre('append');
		}
		if(isset($options['appendAfter'])) {
			$this->_inputAppPre('appendAfter');
		}

		if(isset($this->options['prepend']) || isset($this->options['append']) || isset($this->options['appendAfter'])) {
			unset($this->options['prepend'], $this->options['append'], $this->options['appendAfter']);

			if(isset($this->options['type'])) {
				if(in_array($this->options['type'], array('file', 'fileImage') )) {
					$this->options['between'] = $this->_inputDefaults['between'].'<div class="imageUpload">';
					$this->options['before'] .= ''.$this->returnOp['prepend'] ;
					$this->options['after'] = $this->options['after'].$this->_inputDefaults['after'].''.$this->returnOp['append'];
				}
			}

			$appendOpts = [
			'between' => $this->_inputDefaults['between'],
			'after' => $this->returnOp['appendAfter'].$this->_inputDefaults['after']
			];

			if(isset($this->returnOp['prepend']) || isset($this->returnOp['append'])) {
				$appendOpts['between'] .= '<div class="'.$this->returnOp['class'].'">';
				$appendOpts['before'] = $this->returnOp['prepend'];
				$appendOpts['after'] = $this->returnOp['append'].'</div>'.$appendOpts['after'];
			}

			$this->options = array_merge($appendOpts, $this->options);
		}
		if(!empty($this->options['data-mask'])) {
			$this->options['placeholder'] = str_replace(array('9', 'a', '?', '*'), '_', $this->options['data-mask']);
		}
		if(!empty($this->options['static'])) {
			$dataVariable = Hash::get($this->request->data, $field);
			$this->options['class'] = 'hide';
			$this->options['after'] = $this->Html->tag('p', $dataVariable, array('class'=>'form-control-static')).$this->_inputDefaults['after'];
		}

		return implode('', $inputWrapStart).$this->Form->input($field, $this->options).implode('', $inputWrapEnd);
	}

/**
 * Prepend new input type
 * works with addClass(), _prependAppendFormat()
 * @param $type String
 */
public function _inputAppPre($type) {
//		$this->returnOp['class'] .= ' input-'.$type;
	$this->returnOp = $this->addClass($this->returnOp, 'input-group');
	$this->options = $this->addClass($this->options, 'appendPrepend');

	foreach($this->options[$type] as $formatType=>$formatTypeValue) {
		if(is_array($formatTypeValue)) {
			foreach($formatTypeValue as $value) {
				$this->returnOp[$type] .= $this->_prependAppendFormat($formatType, $value);
			}
		} else {
			$this->returnOp[$type] .= $this->_prependAppendFormat($formatType, $formatTypeValue);
		}
	}
}

/**
 * Add new option in Form Dropdownlist
 *
 * @param $type String value text|button|icon|icon-button|help-icon|help-icon-tooltip|help-inline|help-inline-text|help-block|help-block-text|help-inline-popover|help-icon-popover|html|rawhtml
 * @param $value String
 * @return span tag in Bootstrap Format
 */
public function _prependAppendFormat($type, $value) {
	$return = '';

	switch($type) :
	case 'text' :
	$return .= '<span class="input-group-addon '.Inflector::variable(Sanitize::html($value, array('remove' => true))).'Text '.Inflector::variable(Sanitize::html($value.'_'.$this->field, array('remove' => true))).'Text">'.$value.'</span>';
	break;
	case 'button' :
	$options = array('class'=>'input-group-addon btn btn-grey '.Inflector::variable(strip_tags($value)).'Btn '.Inflector::variable(strip_tags($value).'_'.$this->field).'Btn');
	if($value == 'Add New') {
		if(!$this->Session->check('Auth.User.id')) {
			//continue;
		}
		if(!empty($this->options['data-target-model'])) {
			$model = $this->options['data-target-model'];
			unset($this->options['data-target-model']);
		} else {
			$field = explode('.', $this->field);
			$model = str_replace('_id', '', end($field));
		}
		$options['data-toggle'] = 'modal-manager';


		$value = $this->icon('plus').' ';
		$classes = explode(' ', $this->options['class']);
		$urlOpts = array('controller'=>Inflector::tableize($model), 'action'=>'add', 'format'=>'json', 'target'=>$classes[0]);
		if(!empty($this->options['data-url-named'])) {
			$urlOpts = array_merge($urlOpts, json_decode($this->options['data-url-named'], true));
		}
		$href = $this->Html->url($urlOpts);
		$options['href'] = $options['data-original-href'] = $href;
		$options['data-model'] = Inflector::classify($model);
	}
	$return .= $this->Html->tag('a', $value, $options);
	break;
	case 'icon' :
	$this->returnOp = $this->addClass($this->returnOp, 'icon');
	$return .= '<span class="input-group-addon iconAddon '.Inflector::variable($value).'Icon '.Inflector::slug($value.'_'.$this->field).'Icon">'.$this->icon($value).'</span>';
	break;
	case 'icon-button' :
	$options = array('class'=>'input-group-addon btn btn-grey '.Inflector::variable($value).'IconBtn '.Inflector::slug($value.'_'.$this->field).'IconBtn');
	$return .= $this->Html->tag('a', $this->icon($value), $options);
	break;
	case 'help-icon' :
	case 'help-icon-tooltip' :
	$return .= '<span class="input-group-addon '.Inflector::variable($value).'Icon '.Inflector::slug($value.'_'.$this->field).'Icon"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$value.'"></i></span>';
	break;

	case 'help-block' :
	case 'help-block-text' :
	$return .= '<span class="help-block '.Inflector::variable($this->field).'HelpBlock">'.$value.'</span>';
	break;
	case 'help-inline' :
	case 'help-inline-text' :
	$return .= '<span class="help-inline '.Inflector::variable($this->field).'HelpBlock">'.$value.'</span>';
	break;
	case 'help-inline-tooltip' :
	$return .= '<span class="help-inline '.Inflector::variable($this->field).'HelpInline"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$value.'"></i></span>';
	break;
	case 'help-inline-popover' :
	case 'help-icon-popover' :
	if(strrpos($value, '|')) {
		list($title, $titleContent) = explode('|', $value);
		$attributes = 'data-original-title="'.$title.'" data-content="'.$titleContent.'"';
	} else {
		$titleContent = $value;
		$attributes = 'data-content="'.$titleContent.'"';
	}
	$return .= '<span class="help-inline '.Inflector::variable($this->field).'HelpInline"><i class="fa fa-question-sign" data-toggle="popover" data-placement="left" data-trigger="hover" '.$attributes.' title=""></i>';
	break;
	case 'html' :
	$return .= '<span class="input-group-addon">'.$value.'</span>';
	break;
	case 'rawhtml' :
	$return .= $value;
	break;
	endswitch;

	return $return;
}

/**
 * Creates Radio input in Bootstrap Format
 * Makes use of options(), _inputDefaults
 *
 */
protected function radio() {
	$arr = explode('.', $this->field);

	$labelOptions = [];
	if(isset($this->options['label'])) {
		if(isset($this->options['label']['text'])) {
			$this->options['labelText'] = $this->options['label']['text'];
		}
		unset($this->options['label']['text']);
		$labelOptions = $this->options['label'];
	}

	if(isset($this->_inputDefaults['label'])) {
		if(is_array($labelOptions) && is_array($this->_inputDefaults['label'])) {
			$labelOptions = array_merge($this->_inputDefaults['label'], $labelOptions);
		} else if($this->_inputDefaults['label'] === false) {
			$labelOptions = false;
		}
	}

	if(!empty($this->options['labelText'])) {
		$labelText = $this->options['labelText'];
		unset($this->options['labelText']);
	} else {
		$labelText = Inflector::humanize(preg_replace('/_id/', '', end($arr)));
	}

	$additionalRadioClass = '';
	if(!empty($this->options['class'])) {
		$this->options['class'] = str_replace('form-control', '', $this->options['class']);
		if(preg_match('/radio-inline/', $this->options['class'])) {
			$additionalRadioClass = 'radio-inline';
			$this->options['class'] = str_replace('radio-inline', '', $this->options['class']);
		}
	}

	$this->options['label'] = false;
	$this->options['legend'] = false;
	$this->options['before'] = '';

	if($labelOptions !== false) {
		$this->options['before'] .= $this->Html->tag('label', $labelText, $labelOptions);
	}
	$this->options['before'] .= $this->_inputDefaults['between'].'<div class="radio-list"><label class="'.$additionalRadioClass.'">';

	$this->options['separator'] = '</label><label class="'.$additionalRadioClass.'">';
	$this->options['after'] = '</label></div></div>';

	if(isset($this->_formDefaults['class']) && ($this->_formDefaults['class'] != 'form-vertical')) {
			// $this->options['before'] = $this->options['before'];
	} else {
		$this->options['before'] = '<div>'.$this->options['before'];
	}
}

/**
 * Creates input type Checkbox in Bootstrap Format
 *
 * makes use of addClass() method
 */
protected function checkbox() {
	$additionalCheckBoxClass = '';

	$this->options = $this->addClass($this->options, 'checkbox');

	if(!empty($this->options['class'])) {
		$this->options['class'] = str_replace('span10', '', $this->options['class']);
		//	if(preg_match('/line/', $this->options['class'])) {
		//		$additionalCheckBoxClass = 'line';
		//		$this->options['class'] = str_replace('line', '', $this->options['class']);
		//	}
	}
}

/**
 * File upload
 *
 *
 * @return html
 */
protected function file() {
	$this->options = $this->addClass($this->options, 'fileImage');
	$dataVariable = Hash::get($this->request->data, $this->originalField);
	$imageModelName = '';
	$ids = '';
	$last = '';
	if(!empty($dataVariable)) {
		$class = 'fileinput-exists';
	} else {
		$class = 'fileinput-new';
	}

	if($this->options['type'] == 'fileImage') {
		$this->options['type'] = "file";

		$width = !empty($this->options['fileImage']['width']) ? $this->options['fileImage']['width'] : '200';
		$height = !empty($this->options['fileImage']['height']) ? $this->options['fileImage']['height'] : '200';

		$imageDefault = '<img data-src="holder.js/'.str_replace(array('px', 'pt', '%'), '', $width).'x'.str_replace(array('px', 'pt', '%'), '', $height).'" alt="Image" src="data:image/png;base64,">';

		if(!empty($dataVariable)) {
			$image = '<div>'.$this->image($this->originalField, $this->request->data, array('width'=>$width, 'height'=>$height)).'</div>';
			$getCurrentModelName = Inflector::classify( $this->params['controller']);
			$explode = explode(".", $this->originalField);
			$imageModelName = Inflector::tableize($explode[0]);
			$last = end($explode);
			if(count($explode) < 3){
				$ids = Hash::get($this->request->data[$explode[0]], 'id');
			}else{
				$ids = Hash::get($this->request->data[$explode[0]][$explode[1]], 'id');
			}
		} else {
			$image = $imageDefault;
		}

		$this->options['before'] = '
		<div class="fileinput '.$class.'" data-provides="fileinput">
			<div class="fileinput-new thumbnail" data-trigger="fileinput" style="width: '.$width.'; height: '.$height.';">
				'.$imageDefault.'
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="max-width: '.$width.'; max-height: '.$height.';">'.$image.'</div>

			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new">'.$this->icon('picture-o').' Select image</span>
					<span class="fileinput-exists">'.$this->icon('pencil-square-o').' Change</span>';

					if($ids) {
						$disabled = 'hide';
						$disabledStatus = false;
					} else {
						$disabled = '';
						$disabledStatus = true;
					}

					$this->options['after'] = '
				</span>'.
				$this->Html->link($this->icon('times').' Delete Image', array('controller'=>$imageModelName, 'action'=>'updateimage', $last, $ids), array('escape'=>false, 'class'=>'btn btn-default fileinput-exists', 'title'=>__('Delete Image'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$ids, 'disabled' => $disabledStatus, 'data-dismiss'=>'removeButton') )
				.'<a href="#" class="btn btn-default fileinput-exists '.$disabled.'" data-dismiss="fileinput" data-remove="showRemove">'.$this->icon('times').' Remove</a>'.
				'</div>
			</div>'.
			(($this->_formDefaults['class'] == 'form-horizontal') ? '</div>' : '</div>');

			unset($this->options['fileImage']);
			return;
		}

		if($this->options['type'] == 'file') {
			$fileName = '';
			if(!empty($dataVariable)) {
				$fileName = $dataVariable;
				$getCurrentModelName = Inflector::classify( $this->params['controller']);
				$explode = explode(".", $this->originalField);
				$imageModelName = Inflector::tableize($explode[0]);
				$last = end($explode);
				if(count($explode) < 3){
					$ids = Hash::get($this->request->data[$explode[0]], 'id');
				}else{
					$ids = Hash::get($this->request->data[$explode[0]][$explode[1]], 'id');
				}
			}

			// Pass empty class to input file tag
			$this->options['class'] = '';

			$this->options['before'] = '
			<div class="fileinput '.$class.'" data-provides="fileinput">
				<div class="input-group">
					<div class="form-control uneditable-input" data-trigger="fileinput">
						'.$this->icon('file-o').' <span class="fileinput-filename">'.$fileName.'</span>
					</div>'.
					'<span class="input-group-addon btn btn-default btn-file">'.
					'<span class="fileinput-new">'.$this->icon('file').'</span><span class="fileinput-exists">'.$this->icon('edit').'</span>';
					if($ids) {
						$disabled = 'hide';
						$disabledStatus = false;
					} else {
						$disabled = '';
						$disabledStatus = true;
					}


			// $this->options['after'] = '
			// 		</span>'.
			// 		$this->Html->link($this->icon('times'), array('controller'=>$imageModelName, 'action'=>'updateimage', $last, $ids), array('escape'=>false, 'class'=>'input-group-addon btn btn-default fileinput-exists', 'title'=>__('Delete File'), 'data-toggle'=>'modal-manager tooltip', 'data-delete-row-id'=>$ids, 'disabled' => $disabledStatus, 'data-dismiss'=>'removeButton') )
			// 		.
			// 		'</div>
			// </div>'.(($this->_formDefaults['class'] == 'form-horizontal') ? '</div>' : '');



			// $this->options['after'] = ''.
			// 		'</span>'.
			// 		'<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">'.$this->icon('times').'</a>'.
			// 	'</div>'.
			// '</div>'.(($this->_formDefaults['class'] == 'form-horizontal') ? '</div>' : '');
					return;
				}
			}

/**
 * indexSearch creation
 *
 * @param $fields String|Array
 * @param $target String
 * @return html
 */
public function search($fields = array(), $target) {
	$named = am($this->request->params['named'], ['dummy']);
	$url = $this->Html->url(array_merge(array('action'=>$this->request->params['action']), $named));
	$url = str_replace('/dummy', '', $url);
		//debug($url);
	$url = preg_replace('/[\/]page:[0-9]/', '', $url);
		//debug($url);
	$html = '<div class="indexSearch col-xs-8 col-md-8 col-lg-6" data-toggle="list-search" data-target="'.$target.'" data-url="'.$url.'">
	<div class="">
		<div class="input-group">
			<div class="input-group-btn">';

				$html .= $this->Form->input('field', array('type'=>'select', 'id'=>$target.'Field', 'options'=>$fields, 'class'=>$target.'Field form-control noSelect2', 'default'=>array('title', 'name'), 'label'=>false, 'div'=>false));
				$html .= '	</div>
				<input type="text" class="'.$target.'Query list-search-input indexSearchInput form-control">
				<div class="input-group-btn">
					<button type="button" class="btn btn-success btn-icon list-search-submit" data-toggle="tooltip" title="Search">'.$this->icon('search').' </button>
					<button type="button" class="btn btn-info btn-icon list-search-reset" data-toggle="tooltip" title="Reset">&times </button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			var timeout;
			$(".'.$target.'Query").typeahead({ajaxdelay: 2000,
				source: function (query, process) {
					if (timeout) {
						clearTimeout(timeout);
					}
					timeout = setTimeout(function() {
						return $.get("'.$this->Html->url(array('action'=>'typeahead', '')).'/"+$("#'.$target.'Field").val()+"/"+query+"/", function (data) {
							return process(JSON.parse(data).options);
						});
					}, 300);
				}
			});
		});
	</script>';
	return $html;
}

/**
 * Anchor Link creation
 *
 * @param $title String
 * @param $url String
 * @param $options String|Array e.g."class"=>"xyz"
 * @return html
 * @see CakeTime::niceShort($dateString = NULL, $timezone = NULL)
 * @link http://book.cakephp.org/2.0/en/core-utility-libraries/time.html
 */
public function link($title, $url, $options = null) {
	if($this->Html->url($url) == $this->request->here) {
		$options = $this->addClass($options, 'active');
	}

	if(!empty($options['icon'])) {
		$options['escape'] = false;
		$title = $this->icon($options['icon']).' <span class="title">'.$title.'</span>';
		unset($options['icon']);
	}

	if (preg_match("/New|Edit|Delete/i", $title) && is_array($url)) {
		$url = array_merge($url, $this->request->params['named']);
	}

	$html = $this->Html->link($title, $url, $options);
	return $html;
}

/**
 * Datetime Format
 *
 * @param $dateTime Any Datetime Format
 * @param $options String|Array
 * @return String Date
 * @see CakeTime::niceShort($dateString = NULL, $timezone = NULL)
 * @link http://book.cakephp.org/2.0/en/core-utility-libraries/time.html
 */
public function niceShortDate($date, $timezone = null){
	if(empty($date)) {
		return '-';
	}

	if(!empty($date)) {
		return '<span data-toggle="tooltip" title="'.$this->Time->format('D, d F Y', $date, false, $timezone).'">'.$this->Time->format('d-M-y', $date, false, $timezone).'</span>';;
	} else {
		return '-';
	}
}

/**
 * Datetime Format
 *
 * @param $dateTime Any Datetime Format
 * @param $options String|Array
 * @return String Date
 * @see CakeTime::niceShort($dateString = NULL, $timezone = NULL)
 * @link http://book.cakephp.org/2.0/en/core-utility-libraries/time.html
 */
public function niceShort($dateTime, $timezone = null, $custom = false){
	if(empty($dateTime)) {
		return '-';
	}

	if($this->Time->isToday($dateTime, $timezone) || $this->Time->wasYesterday($dateTime, $timezone)) {
		if($this->Time->wasWithinLast('6 hours', $dateTime)) {
			$timeString = str_replace(array('on ', 'hour', 'minute', 'second'), array('', 'hr', 'min', 'sec'), $this->Time->timeAgoInWords($dateTime, array('format'=>'d-M-y G:i', 'end'=>'+6 hour', 'timezone'=>$timezone)));
		} else {
			$timeString = $this->Time->niceShort($dateTime, $timezone);
		}
	} else if($this->Time->isThisMonth($dateTime, $timezone) || $this->Time->wasWithinLast('15 days', $dateTime)) {
		$timeString = str_replace(array('on ', 'hour', 'minute', 'second'), array('', 'hr', 'min', 'sec'), $this->Time->timeAgoInWords($dateTime, array('format'=>'M d, G:i', 'end'=>'6 hour', 'timezone'=>$timezone)));
	} else if(!$this->Time->isThisYear($dateTime, $timezone)) {
		$timeString = $this->Time->format('M d \'y G:i', $dateTime);
	} else {
		$timeString = $this->Time->niceShort($dateTime, $timezone);
	}

	if(!preg_match('/^01-Jan-70/i', $timeString)) {
		$dateTime = $this->Time->nice($dateTime, $timezone, '%a, %b %eS %Y %I:%M %p');
		if($custom){
			return $dateTime;
		}else{
			return '<span data-toggle="tooltip" title="'.$dateTime.'">'.$timeString.'</span>';
		}

	} else {
		return '-';
	}
}

/**
 * Dynamic Creation of Drop list inside Table
 *
 * @param $columns String|Array
 * @param $target String
 * @return String link path
 */
public function dropdown($firstOpt = array(), $options = null, $dropdownOptions = array('type'=>'single') ) {

	$optionsHtml = '';

	$firstOpt = is_array($firstOpt) ? implode('', $firstOpt) : $firstOpt;


	if($dropdownOptions['type'] == 'split') {
		$dropdownClass = empty($dropdownOptions['dropdownBtnClass']) ? 'btn-default' : $dropdownOptions['dropdownBtnClass'];
		if(!empty($options)) {
			$firstOpt = $firstOpt.'<button type="button" class="btn '.$dropdownClass.' dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>';
		}
	}

	foreach($options as $option) {
		if($option == 'divider') {
			$optionsHtml .= '<li class="divider"></li>';
		} else {
			$optionsHtml .= $option;
		}
	}

	$ulOptions = array('class'=>"dropdown-menu", 'role'=>"menu");
	if(isset($dropdownOptions['ul'])) {
		if(!empty($dropdownOptions['ul']['class'])) {
			$ulOptions = $this->addClass($ulOptions, $dropdownOptions['ul']['class']);
			unset($dropdownOptions['ul']['class']);
		}
		$ulOptions = array_merge($ulOptions, $dropdownOptions['ul']);
	}


	$optionsHtml = !empty($options) ? $this->Html->tag('ul', $optionsHtml, $ulOptions) : "";

	$groupClass = empty($dropdownOptions['groupClass']) ? '' : $dropdownOptions['groupClass'];
	return $this->Html->div('btn-group '.$groupClass,
		$firstOpt.$optionsHtml
		);
}
/**
 * Creating Drop list with checkbox
 *
 * @param $columns String|Array
 * @param $target String
 * @return String link path
 */
public function toggleColumns($columns = array(), $target = null) {
	$dropDownClass = (count($columns) < 2) ? 'disabled' : '';

	$html = '<div class="col-xs-4 col-md-4 col-lg-6"><div id="'.$target.'ToggleColumns" class="dropdown pull-right">
	<button class="btn btn-grey '.$dropDownClass.'" href="#" data-toggle="dropdown">Columns '.$this->icon('angle-down').'</button>
	<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right" data-table="'.$target.'">';
		foreach($columns as $position=>$column) {
			$html .= "<label><input type=\"checkbox\" checked>{$column}</label>";
		}

		$html .= '</div></div>
	</div>';

	return $html;
}

/**
 * Creating File path
 *
 * @param $fieldName String
 * @param $data Array|string
 * @param $options array|string eg. "class"=>"className"
 * @return String link path
 * @see HtmlHelper::link(string $title, mixed $url = null, array $options = array())
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function filePath($fieldName, $data, $isPDF = '') {
	$pathArr = explode('.', $fieldName);
	switch(count($pathArr)) {
		case 2;
		list($model, $field) = $pathArr;
		$idFieldPath = implode('.', [$model, 'id']);
		break;
		case 3;
		list($model, $index, $field) = $pathArr;
		$idFieldPath = implode('.', [$model, $index, 'id']);
		break;
	}

	$modelUnderScored = Inflector::underscore($model);

	if(Hash::check($data, $idFieldPath)) {
		$id = Hash::get($data, $idFieldPath);
		$filename = trim(Hash::get($data, $fieldName));
	} else {
		$id = Hash::get($data, "id");
		$filename = trim(Hash::get($data, $field));
	}

	$filePathFresh = strval(str_replace("\0", "", "files/{$modelUnderScored}/{$field}/{$id}/$filename"));

	if($isPDF){
		return $filePathFresh;
		exit;
	}

	$fileObject = new File($filePathFresh);
	if($fileObject->exists() === false) {
		return false;
	}

	$fileUrl = strval(str_replace("\0", "", "files/{$modelUnderScored}/{$field}/{$id}/".rawurlencode($filename)));

	$op = array_merge($fileObject->info($filePathFresh), array(
		'file_name'=>$filename,
		'file_base_url'=>'/'.$fileUrl,
		'file_url'=>$this->Html->url('/'.$fileUrl, true)
		));
	return $op;
}

/**
 * Dynamic File Link
 *
 * @param $fieldName String
 * @param $data Array|string
 * @param $options array|string eg. "class"=>"className"
 * @return String link path
 * @see HtmlHelper::link(string $title, mixed $url = null, array $options = array())
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function fileLink($fieldName, $data, $options = array()) {
	$options['target'] = '_blank';

	$options['escape'] = false;

	$fileInfo = $this->filePath($fieldName, $data);

	if(empty($options['data-toggle'])) {
		$options = array_merge($options, array(
			'data-title'=>$fileInfo['file_name'],
			'data-content'=>'<small>File Size : '.$this->Number->toReadableSize($fileInfo['filesize']).'</small>',
			'data-toggle'=>'popove r', 'data-trigger'=>'hover', 'data-delay'=>'1000', 'data-html'=>'true'
			));
	}
	if(empty($options['text'])) {
		$text = $fileInfo['file_name'];
	} else {
		$text = $options['text'];
		unset($options['text']);
	}
	return $this->Html->link($text, $fileInfo['file_url'], $options);
}

/**
 * Dynamic image path
 *
 * @param $path String
 * @param $data Array with image name
 * @param $options array|string eg. "width"=>"400"
 * @return String image path
 * @see HtmlHelper::image(string $path, array $options = array())
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function image($path, $data = array(), $options = array()) {
	$opt['timthumb'] = (isset($options['timthumb']) ? (bool) $options['timthumb'] : true);

	if(Hash::check($options, 'responsive')) {
		if($this->Session->check('responsive.image.screen_size')) {
			$screen_size = $this->Session->read('responsive.image.screen_size');

			$responsiveOptions = Hash::get($options, 'responsive');
				// debug($responsiveOptions);
			$responsiveScreenSize = Hash::get($responsiveOptions, $screen_size);
			if($responsiveScreenSize) {
				$options = am($options, $responsiveScreenSize);
			}
		}

		$dataOptions = [];
		foreach ($responsiveOptions as $screenSize => $dims) {
			foreach ($dims as $attr => $value) {
				if(isset($dataOptions['data-'.$screenSize])) {
					$dataOptions['data-'.$screenSize] .= $value.$attr[0];
				} else {
					$dataOptions['data-'.$screenSize] = $value.$attr[0];
				}
			}
		}
		$options = am($options, $dataOptions);

			// Remove responsive array
		$options = Hash::remove($options, 'responsive');
	}

	if(!empty($data)) {
		$fieldName = $path;
		$fileInfo = $this->filePath($fieldName, $data);
		if($fileInfo !== false) {
			if(in_array($fileInfo['extension'], array('bmp')) || !$opt['timthumb']) {
				if(empty($options['urlOnly'])) {
					$output = $this->Html->image($fileInfo['file_base_url'], $options);
				} else {
					$output = $this->Html->url(rawurlencode($fileInfo['file_base_url']), true);
				}
			} else {
				$output = $this->timthumb($fileInfo['file_base_url'], $options);
			}
		} else {
			$output = $this->timthumb('/files/no-image.png', $options);
		}
	} else {
		$output = $this->timthumb($path, $options);
	}

	return $output;
}

/**
 * Dynamically Resizing image
 *
 * @param $path String
 * @param $options array|string eg. "width"=>"400"
 * @param $timthumbPath String
 * @return String image path
 * @see HtmlHelper::image(string $path, array $options = array())
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function timthumb($path, $options = array(), $timthumbPath = '/files') {
	if(!empty($path)) {
		$options['style'] = '';
		$timthumbOptions = [];
		$friendlyPathParts = [];

		foreach ($options as $key => $value) {
			switch ($key) {
				case 'width':
				if(!preg_match('/\%|auto/', $options['width'])) {
							// $options['style'] .= 'width:'.$options['width'].'px;';
					$timthumbOptions['w'] = $options['width'];
					$friendlyPathParts[1] = $options['width'].'w';
				}
				break;

				case 'height':
				if(!preg_match('/\%|auto/', $options['height'])) {
							// $options['style'] .= 'height:'.$options['height'].'px;';
					$timthumbOptions['h'] = $options['height'];
					$friendlyPathParts[2] = $options['height'].'h';
				}
				break;

				case 'zc':
				case 'q':
				$timthumbOptions[$key] = $options[$key];
				break;
			}
		}

		$timthumbQueryParams = '&'.http_build_query($timthumbOptions);
		$options = array_filter($options);

		ksort($friendlyPathParts);
		$friendlyPath = str_replace('/files', '/files/'.implode('', $friendlyPathParts), $path);

		if(empty($options['urlOnly'])) {
			if($_SERVER['SERVER_NAME'] == 'localhost') {
				return $this->Html->image($path, $options);
			} else {
				return $this->Html->image($friendlyPath, $options);
					// return $this->Html->image($timthumbPath.'/timthumb.php?src=../'.urlencode($path).$timthumbQueryParams, $options);
			}
		} else {
			if($_SERVER['SERVER_NAME'] == 'localhost') {
				if(preg_match('/files\//', $path)) {
					$path = $path;
				} else {
					$path = '/img/'.$path;
				}
				return $this->Html->url($path, true);
			} else {
				return str_replace('&amp;', '&', $this->Html->url($friendlyPath, true));
				    // return str_replace('&amp;', '&', $this->Html->url($timthumbPath.'/timthumb.php?src=../'.urlencode($path).$timthumbQueryParams, true));
			}
		}
	} else {
		return '';
	}
}

/**
 * icon tag with bootstrap class
 *
 * @param $iconName String
 * @param $options array|string eg. "class"=>"className"
 * @return String Html i tag
 * @see HtmlHelper::tag(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function icon($iconName, $options = array()) {
	$options = $this->addClass($options, 'fa fa-'.$iconName);
	return $this->Html->tag('i', '', $options );
}


/**
 * Nifyicon tag with bootstrap class
 *
 * @param $iconName String
 * @param $options array|string eg. "class"=>"className"
 * @return String Html i tag
 * @see HtmlHelper::tag(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function Nifyiconicon($iconName, $options = array()) {
	$options = $this->addClass($options, 'demo-pli-'.$iconName);
	return $this->Html->tag('i', '', $options );
}

/**
 * Span tag with label
 *
 * @param $text String
 * @param $options array|string eg. "class"=>"className"
 * @return String Html span tag
 * @see HtmlHelper::tag(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function labels($text, $options = array()) {
	$labelClass = 'label label-';
	if(empty($options['class']))
		$options['class'] = $labelClass.'default';
	else
		$options['class'] = $labelClass.$options['class'];

	;
	return $this->Html->tag('span', $text, $options);
}
/**
 * Bootstrap Pagination view
 *
 * @return [type] [description]
 */
public function paginationRow() {
	$html = $this->Html->div("row pagination-row",
		$this->Html->div("col-sm-4 col-md-5 col-sm-12",
			$this->Html->div("pagination-info",
				$this->Html->tag("span",
					$this->Paginator->counter(array('format' => __('Page {:page} of {:pages}')))
					).
				$this->Html->tag("span",
					$this->Paginator->counter(array('format' => __(', Showing {:start} to {:end} of {:count} entries')))
					, array('class'=>"hidden-sm hidden-xs")
					)
				)
			).
		$this->Html->div("col-sm-8 col-md-7 col-sm-12",
			$this->Html->tag("ul",
				$this->Paginator->prev('&laquo;', array('escape'=>false, 'tag'=>'li'), '<span>&laquo;</span>', array('escape'=>false, 'class' => 'prev disabled', 'tag'=>'li')).
				$this->Paginator->numbers(array('separator' => '', 'tag'=>'li', 'currentClass'=>'active', 'currentTag'=>'span')).
				$this->Paginator->next('&raquo;', array('escape'=>false, 'tag'=>'li'), '<span>&raquo;</span>', array('escape'=>false, 'class' => 'next disabled', 'tag'=>'li'))
				, array('class'=>"pagination pull-right")
				)
			)
		);
	return $html;
}

/**
 * Add a Indian Currency Format to the Number helper. Makes reusing of Rupee Symbol
 * currency format easier.
 *
 * ``` $this->Number->addFormat('INR', array('before' => '₹ ', 'thousands' => ',', 'decimals' => '.')); ```
 *
 * You can now use `INR` as a shortform when formatting Indian currency amounts.
 *
 * ``` $this->Number->addFormat('INR', array('before' => '₹ ', 'thousands' => ',', 'decimals' => '.')); ```
 * ``` $this->Number->currency($amount, $currency); ```
 *
 * Added formats are merged with the defaults defined in Cake\Utility\Number::$_currencyDefaults
 * See Cake\Utility\Number::currency() for more information on the various options and their function.
 *
 * @param string $amount Int|Float value in terms of Currency.
 * @param array $currency Currency format.
 * @return void
 * @see CakeNumber::addFormat(), CakeNumber::currency()
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/number.html#NumberHelper::addFormat, http://book.cakephp.org/2.0/en/core-libraries/helpers/number.html#NumberHelper::currency
 */
public function currency($amount, $currency = 'INR') {
	if($currency == 'INR') {
		$this->Number->addFormat('INR', array('before' => '₹ ', 'thousands' => ',', 'decimals' => '.'));
	}
	return $this->Number->currency($amount, $currency);
}

/**
 * Retrieve Only key's Value from array
 *
 * @param $value String
 * @param $default : default return character needed if no value is returned
 * @return String value
 */
public function getValue($value, $default = '-') {
	if(isset($value) && $value != '') {
		return h($value);
	} else {
		return $default;
	}
}

/**
 * Retrieve Only key's Value from array
 *
 * @param $data array|String
 * @param $path : key value needed to be retrieved.
 * @param $default : default return character needed if no value is returned
 * @return String|Array value
 * @see Cake\Utility\Hash::get(array $data, $path)
 * @link http://book.cakephp.org/3.0/en/core-libraries/hash.html
 */
public function getValueByPath($data, $path, $default = '-') {
	$value = Hash::get($data, $path);

	return $this->getValue($value, $default);
}

/**
 * Retrieve Boolean Value
 *
 * @param $value string
 * @param $trueLabel true label value
 * @param $falseLabel false label value
 * @return String value
 * @see HtmlHelper::nestedList(array $list, array $options =, []array $itemOptions =[])
 * @link http://book.cakephp.org/3.0/en/views/helpers/html.html#creating-nested-lists
 */
public function getBooleanValue($value, $trueLabel = null, $falseLabel = null) {
	if(!$falseLabel) $falseLabel = __('No');
	if(!$trueLabel) $trueLabel = __('Yes');

	if(isset($value))
		return ($value) ? $trueLabel : $falseLabel;
	else
		return '-';
}

/**
 * Nested List
 *
 * @param $title string
 * @param $delimiter special character in which you want to explode string
 * @return String The Nested List
 * @see HtmlHelper::nestedList(array $list, array $options =, []array $itemOptions =[])
 * @link http://book.cakephp.org/3.0/en/views/helpers/html.html#creating-nested-lists
 */
public function stringToList($string, $delimiter = ',') {
	if(empty($string)) return '-';

	return $this->Html->nestedList(array_filter(explode($delimiter, $string)));
}

/**
 * Menu Builder
 *
 * @param $title string
 * @param $url string
 * @param $options array
 * @return Menus
 */
public function menuLink($title, $url, $options = null) {
	$isUser = false;
	if(isset($options['isUser']) && !empty($options['isUser'])) {
		$isUser = true;
		$options['active-class'] = '';
	}
	if(!empty($options['role-data'])) {
		$userRole = $options['role-data'];
		$checkPass = false;

		foreach($options['role-check'] as $role) {
			if(!empty($userRole[$role])) {
				$checkPass = true;
			}
		}
		if(!$checkPass)
			return '';
	}

	if(empty($options['active-class']) && !$isUser) {
		$options['active-class'] = 'active-sub active';
	}

	if(empty($options['li'])) {
		$liOptions = array();
	} else {
		$liOptions = $options['li'];
		unset($options['li']);
	};

	if($this->Html->url($url) == $this->request->here) {
		$liOptions = $this->addClass($liOptions, $options['active-class']);
	}
	unset($options['active-class']);

	if(!empty($options['icon'])) {
		$options['escape'] = false;
		$title = $this->icon($options['icon']).' <span class="menu-title">'.$title.'</span>';
		unset($options['icon']);
	}

	if (preg_match("/New|Edit|Delete/i", $title) && is_array($url)) {
		$url = array_merge($this->request->params['named'], $url);
	}

	$html = $this->Html->tag('li', $this->Html->link($title, $url, $options), $liOptions);
	return $html;
}

/**
 * Menu creation
 *
 * @param $title string
 * @param $subMenuControllers array
 * @param $options array
 * @param $menuOptions array
 * @return Menus
 * @see Hash::check(), array_merge(). Hash::extract()
 * @link http://book.cakephp.org/3.0/en/core-libraries/hash.html, http://book.cakephp.org/3.0/en/orm/behaviors/tree.html
 */
public function sideMenuTopLevelLink($title, $subMenuLinks, $options = null, $menuOptions = null) {
	$subMenu = '';
	$liOptions = array();
	$titleOptions = array('class'=>'');

	if(!empty($menuOptions['parentLiClass'])) {
		$liOptions = $this->addClass($liOptions, $menuOptions['parentLiClass']);
	}

	if(empty($subMenuLinks['controller'])) {
		$topLevelLink = '#';

		$titleOptions = array('class'=>'arrow');
		if(in_array($this->request->here, $subMenuLinks)) {
			$titleOptions = $this->addClass($titleOptions, 'open');
			$liOptions = $this->addClass($liOptions, 'active-sub active');
		}
	} else {
		$topLevelLink = $subMenuLinks;
	}

	$options['escape'] = false;
	if(!empty($options['icon'])) {
			$options['escape'] = false;
		$title = $this->icon($options['icon']).'<span class="menu-title">'.$title.'</span>';
		unset($options['icon']);
	}
	if(!empty($options['sub-menu'])) {
		if(is_array($options['sub-menu'])) {
			$subMenuHtml = implode(' ', $options['sub-menu']);
		} else {
			$subMenuHtml = $options['sub-menu'];
		}
		$subMenu =  $this->Html->tag('ul', $subMenuHtml, array('class'=>'sub-menu'));
		unset($options['sub-menu']);
	}

	$title .= $this->Html->tag('span', '', $titleOptions);


	$html = $this->Html->tag('li', $this->Html->link($title, $topLevelLink, $options).$subMenu, $liOptions);
	return $html;
}

/**
 * Retrieve url from String
 *
 * @param string $string
 * @return url
 */
public function getUrl($string) {
	$menuLinkUrl = json_decode($string, true);
	return is_array($menuLinkUrl) ? $menuLinkUrl : $string;
}

/**
 * Lists of links
 *
 * @param $links array
 * @return Unique links
 */
public function getSubLinks($links) {
	$returnLinks = array();
	foreach($links as $link) {
		$linkUrl = $this->getUrl($link);

		if(is_array($linkUrl)) {
			$returnLinks[] = Router::url($linkUrl);
		}
	}
	return array_unique($returnLinks);
}

/**
 * Menu creation
 *
 * @param $menuLinks array
 * @param $menuOptions array
 * @return Menus
 * @see Hash::check(), array_merge(). Hash::extract()
 * @link http://book.cakephp.org/3.0/en/core-libraries/hash.html, http://book.cakephp.org/3.0/en/orm/behaviors/tree.html
 */
public function buildMenu($menuLinks, $menuOptions = array()) {
	$op = '';
	if(!empty($menuLinks)){
		foreach($menuLinks as $menuLink) {
				// Check if Roles are set for the link & If roles are set check if the current session is in the list
			if(Hash::check($menuLink, 'Role.{n}.id') && !in_array($this->Session->read('Auth.User.role_id'), Hash::extract($menuLink, 'Role.{n}.id'))) {
				continue;
			}

			if(Hash::check($menuLink, 'User.{n}.id') && !in_array($this->Session->read('Auth.User.id'), Hash::extract($menuLink, 'User.{n}.id'))) {
				continue;
			}

			$menuLinkUrl = $this->getUrl($menuLink['MenuLink']['link']);

			$options = [];
			if(!empty($menuLink['MenuLink']['attributes'])) {
				$options = json_decode($menuLink['MenuLink']['attributes'], true);
			}

			if(!empty($menuLink['MenuLink']['icon'])) {
				$options['icon'] = $menuLink['MenuLink']['icon'];
			}

			if(empty($menuLink['children'])) {
				$op .= $this->menuLink($menuLink['MenuLink']['title'], $menuLinkUrl, $options);
			} else {
					// Has Children
				$subMenu = $this->buildMenu($menuLink['children']);
				$options = array_merge($options, array('tabindex'=>"-1", 'class'=>"dropdown-toggle", 'data-toggle'=>"dropdown", 'sub-menu'=>$subMenu));

				$subLinks = $this->getSubLinks(
					array_merge(
						Hash::extract($menuLink['children'], '{n}.MenuLink.link'),
						Hash::extract($menuLink['children'], '{n}.children.{n}.MenuLink.link')
						)
					);
				$op .= $this->sideMenuTopLevelLink($menuLink['MenuLink']['title'], $subLinks, $options, $menuOptions);
			}
		}
	}
	// debug($op)
	return $op;
}

public function bsLabel($content, $type = 'default') {
	$bsLabels = [];
		if(is_array($content)) {
			$array = $content;
			foreach($array as $ele) {
				$bsLabels[] = $this->Html->tag('div', $ele.',', array('class'=>'label label-'.$type)).' ';
			}
		} else {
			$bsLabels[] = $this->Html->tag('div', $content, array('class'=>'label label-'.$type)).' ';
		}
		
		return implode('', $bsLabels);
}

public function bsBadge($content, $type = 'default') {
	$bsLabels = [];
	if(is_array($content)) {
		$array = $content;
		foreach($array as $ele) {
			$bsLabels[] = $this->Html->tag('span', $ele, array('class'=>'badge badge-'.$type));
		}
	} else {
		$bsLabels[] = $this->Html->tag('span', $content, array('class'=>'badge badge-'.$type));
	}

	return implode('&nbsp;', $bsLabels);
}

/**
 * Creates popup modal
 *
 * @param string|int $modalId: Unique ID to be assigned to modal
 * @param $body string|text
 * @param $options string|array eg. "width"=>"auto"
 * @return Html modal
 * @see HtmlHelper::div(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function modal($modalId, $body = '', $options = []) {
	$modalOptions = ['id'=>$modalId, 'tabindex'=>'-1', 'role'=>'dialog', 'aria-labelledby'=>$modalId.'Label', 'aria-hidden'=>'true'];
	$html = $this->Html->div(
		'modal fade',
		$this->Html->div('modal-dialog modal-wide',
			$this->Html->div('modal-content',
				$this->Html->div('modal-header',
					$this->Form->button('&times;', ['class'=>'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'])
					).
				$this->Html->div('modal-body',
					$body
					)
				)
			),
		$modalOptions
		);

	return $html;
}

public function selectOption($data, $path, $id, $text, $options = array()) {
	$html = '';
	foreach($data as $node) {
		$dataAttr = array();
		foreach($options as $option) {
			$dataAttr['data-'.$option] = Hash::get($node, $path.'.'.$option);
		}
		$html .= $this->Html->tag('option',  Hash::get($node, $path.'.'.$text), array_merge(array('escape'=>true, 'value'=>Hash::get($node, $path.'.'.$id)), $dataAttr));
	}
	return $html;
}

private function isJson($string) {
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * Creates Youtube url embedded in iframe
 *
 * @param string $url: url link of youtube video
 * @param $option string|array eg. "width"=>"auto"
 * @return iframe tag with other attributes passed in $option parameter
 * @see HtmlHelper::tag(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function youtubeVideo($url, $options = array()) {
	$html = '';

	$url_string = parse_url($url, PHP_URL_QUERY);
	parse_str($url_string, $args);
	$videoId = isset($args['v']) ? $args['v'] : false;

	if(!empty($options['thumbnail-image'])) {
		$imagePath = '';
		$options = [
		'class'=>'youtube-thumbnail', 'width'=>'160', 'height'=>'120',
		];
		$html = $this->Html->link(
			$this->Html->image('http://img.youtube.com/vi/'.$videoId.'/default.jpg', $options),
			$url,
			['escape'=>false, 'target'=>'_blank']
			);
	} else {
		$playerOptions = [
		'wmode'=>'transparent', 'modestbranding'=>'1', 'rel'=>'0', 'showinfo'=>'0'
		];

		if(isset($options['playerOptions'])) {
			$playerOptions = am($playerOptions, $options['playerOptions']);
		}

		$videoUrl = 'https://www.youtube.com/embed/'.$videoId;
		$options['src'] = $videoUrl.'?'.http_build_query($playerOptions);

		$html = $this->Html->tag('iframe', '', $options);
	}



	return $html;
}

/**
 * Adds loding image
 *
 * @param string $loaderClass icon as per Font awesome
 * @param $option can be string or array eg. "width"=>"auto"
 * @return span tag with optional icon and other attributes
 * @see HtmlHelper::tag(string $tag, string $text, array $options)
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
public function loader($loaderClass = 'spinner', $options = array()) {
	$options = $this->addClass($options, 'loader hide');
	return $this->Html->tag('span', $this->icon($loaderClass.' fa-spin'), $options);
}

/**
 * Removes special characters, unwanted links from Text
 *
 * @param string $text Text Content
 * @return filter text
 * @see preg_replace();
 * @link http://bakery.cakephp.org/2012/04/20/Fixing-and-improving-the-TextHelper.html
 */
public function filterText($text) {
	return str_replace('\n', '', $text);
}

public function css($fileGroupName, $options = []) {
	$css_array = Configure::read('CSS_ARRAY');

	if(is_array($fileGroupName))  {
		return $this->Html->css($fileGroupName, $options);
	} else if (!isset($css_array[$fileGroupName])) {
		return $this->Html->css($fileGroupName, $options);
	} else {
		if(Configure::read('ASSET_COMPRESS_USAGE')) {
			return $this->AssetCompress->css($fileGroupName, $options);
		} else {
			return $this->Html->css($css_array[$fileGroupName], $options);
		}
	}
}

public function script($fileGroupName, $options = []) {
	$script_array = Configure::read('SCRIPT_ARRAY');

	if(is_array($fileGroupName))  {
		return $this->Html->script($fileGroupName, $options);
	} else if (!isset($script_array[$fileGroupName])) {
		return $this->Html->script($fileGroupName, $options);
	} else {
		if(Configure::read('ASSET_COMPRESS_USAGE')) {
			return $this->AssetCompress->script($fileGroupName, $options);
		} else {
			return $this->Html->script($script_array[$fileGroupName], $options);
		}
	}
}

public function getUserNameByCreatedModified($id=null){
	App::import('model', 'User');
	$userObj = new User();
	if (!$userObj->exists($id)) {
		return false;
	}
	$userObj->id = $id;
	return $userObj->field('name');
}

}