<div id="postsAjax">
<?php
echo $this->start('breadcrumb');
echo $this->Html->tag('li', $this->Html->link(__('Settings'), array('controller'=>'settings', 'action'=>'index'), array('admin'=>true)), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
echo $this->end();
?>
<h3 class="page-title">
    <?php echo __('Preferences'); ?>
</h3>
<div class="settings index">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <?php echo __('Defaults'); ?> <?php echo $this->Bs->loader(); ?>
            </div>
        </div>
        <div class="portlet-body form">
            <?php   
                echo $this->Bs->create('Setting', array('class'=>'form-vertical'));
            ?>
            <div class="form-body">
            <?php
                echo $this->Html->div('tab-box',
                    $this->Html->div('row',
                        $this->Bs->input('9.Setting.id', ['type'=>'hidden', 'value'=>'9']).
                        $this->Bs->input('9.Setting.value', array(
                            'empty'=>'Select', 'class'=>'required', 'label'=>__('Default Currency'), 'options' => $currencies,'col'=>'3'
                        )).
                        $this->Bs->input('3.Setting.id', ['type'=>'hidden', 'value'=>'3']).
                        $this->Bs->input('3.Setting.value', array(
                            'label'=>__('Call'), 'type'=>'text', 'class'=>'required','col'=>'3'
                        )).
                        $this->Bs->input('4.Setting.id' ,['type'=>'hidden', 'value'=>'4']).
                        $this->Bs->input('4.Setting.value', array(
                            'label'=>__('Enquiry EmailId'), 'type'=>'text', 'class'=>'required','col'=>'3'
                        )).
                        $this->Bs->input('10.Setting.id' ,['type'=>'hidden', 'value'=>'10']). 
                        $this->Bs->input('10.Setting.value', array(
                            'label'=>__('Order Placed EmailId'), 'type'=>'text', 'class'=>'required','col'=>'3'
                        ))
                    )
                );
                echo $this->Html->div('tab-box',
                    $this->Html->div('row',
                        $this->Bs->input('6.Setting.id' ,['type'=>'hidden', 'value'=>'6']). 
                        $this->Bs->input('6.Setting.type' ,['type'=>'hidden', 'value'=>'homepage_slider_speed']). 
                        $this->Bs->input('6.Setting.value', array(
                            'label'=>__('Homepage Slider Speed (ms)'), 'type'=>'number','col'=>'3','class'=>'required', 'placeholder'=>'2000',
                            'append'=>['text'=>'millisecond']
                        )).
                        $this->Bs->input('11.Setting.id' ,['type'=>'hidden', 'value'=>'11']). 
                        $this->Bs->input('11.Setting.value', array(
                            'label'=>__('Show Review On Frontend'),'type'=>'radio','col'=>'3','class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0
                        )).
                        $this->Bs->input('12.Setting.id' ,['type'=>'hidden', 'value'=>'12']). 
                        $this->Bs->input('12.Setting.value', array(
                            'label'=>__('Allow user to write review on Attraction'),'type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0,'col'=>'3'
                        )).
                        $this->Bs->input('13.Setting.id' ,['type'=>'hidden', 'value'=>'13']).
                        $this->Bs->input('13.Setting.value', array(
                            'label'=>__('Display Coupon Code'),'type'=>'radio', 'class'=>'radio-inline', 'options'=>['No', 'Yes'], 'default' => 0,'col'=>'3'
                        ))
                    )
                );    
            ?>
            </div>
            <?php
                echo $this->Bs->formEnd(array(
                    $this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm green')),
                    $this->Form->button('<i class="fa fa-refresh"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm yellow'))
                ));
            ?>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <?php echo __('Footer Text'); ?> <?php echo $this->Bs->loader(); ?>
            </div>
        </div>
        <div class="portlet-body form">
            <?php   
                echo $this->Bs->create('Setting', array('class'=>'form-vertical'));
            ?>
            <div class="form-body">
            <?php
                echo $this->html->div('tab-box',
                    $this->Html->div('row',
                        $this->Bs->input('1.Setting.id', array('type'=>'hidden', 'default'=>'1')).
                        $this->Bs->input('1.Setting.value', ['label'=>false, 'class'=>'rich-editor','col'=>'12'])
                    )
                ) 
            ?>
            </div>
            <?php
                echo $this->Bs->formEnd(array(
                    $this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm green')),
                    $this->Form->button('<i class="fa fa-refresh"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm yellow'))
                ));
            ?>
        </div>
    </div>

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <?php echo __('Service Band'); ?> <?php echo $this->Bs->loader(); ?>
            </div>
        </div>
        <div class="portlet-body form">
            <?php   
                echo $this->Bs->create('Setting', array('class'=>'form-vertical'));
            ?>
            <div class="form-body">
            <?php                 
                echo $this->html->div('tab-box',
                    $this->Html->div('row', 
                        $this->Bs->input('5.Setting.id', array('type'=>'hidden', 'default'=>'5')).
                         $this->Bs->input('5.Setting.value', ['label'=>false, 'class'=>'rich-editor','col'=>'12'])
                     )
                )
            ?>
            </div>
            <?php
                echo $this->Bs->formEnd(array(
                    $this->Form->button('<i class="fa fa-check"></i> '.__('Save'), array('type'=>'submit', 'class'=>'btn btn-sm green')),
                    $this->Form->button('<i class="fa fa-refresh"></i> '.__('Reset'), array('type'=>'reset', 'class'=>'btn btn-sm yellow'))
                ));
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        <?php $this->start('appScript'); ?>
        <?php $this->end(); ?>
    });
</script>