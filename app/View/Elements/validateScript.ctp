<?php
    if($this->response->statusCode() !== 200) {
        $enableAjax = false;
    }
?>
<script type="text/javascript">
$(function() {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    
    var validator = [];
    $('form:not(.noValidator)').each(function(index, element) {
        var formId = $(this).attr('id');
        var thisForm = $(this);
        validator[index] = $(this).validate({
            ignore: ':hidden',
            errorClass: 'help-inline',
            success: function(label) {
                label
                    .addClass('valid') //.addClass('fa fa-check') // mark the current input as valid and display OK icon
                    .closest('.form-group, td').removeClass('has-error').addClass('has-success'); // set success class to the control group     
            },
            highlight: function (element) { // hightlight error inputs
            //  $(element).next('.help-inline').removeClass('fa fa-check'); // remove OK icon
                $(element).closest('.form-group, td').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group, td').removeClass('has-error'); // set error class to the control group
            },
            errorPlacement: function(error, element) {
                if (element.is("[type=radio]")){
                    error.appendTo(element.closest('.radio-list'));
                } else if (element.is("[type=checkbox]")){
                    error.appendTo(element.closest('.controls'));
                } else if (element.hasClass("appendPrepend") || element.hasClass("touch-spin")){
                    error.appendTo( element.parent().parent().append());
                } else if (element.attr('type') == 'file' ){
                    error.appendTo( element.parent().parent().parent().append());
                } else {
                    error.insertAfter( element );
                }
            },
            submitHandler: function(form, event) {
                var formSubmitBtn = $('#'+formId+' [type=submit]');
                formSubmitBtn.button('loading');
                
                if(tinymce.editors.length > 0) {
                    tinyMCE.triggerSave();
                }
                
                var progressBar = $('#'+formId+' .progress');
                var progressBarPercent = $('#'+formId+' .progress-bar');
                
            <?php if($enableAjax) :  // If enableAjax is set to TRUE in controller  ?>
                $(form).ajaxSubmit({
                    type: 'POST',
                    beforeSend: function() {
                        var percentVal = '0%';
                        progressBar.removeClass('hide');
                        progressBarPercent.width(percentVal);
                        formSubmitBtn.data('loading-text', percentVal+' Sending').button('loading');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        progressBarPercent.width(percentVal);
                        formSubmitBtn.data('loading-text', percentVal+' Sending').button('loading');

                        if(percentVal == '100%') {
                            formSubmitBtn.data('loading-text', 'Processing').button('loading');
                        }
                    },
                    complete: function(xhr) {
                        progressBar.addClass('hide');
                    //  status.html(xhr.responseText);
                    },
                    success: function (data) {
                        var html = '';
    
                <?php echo $this->fetch('ajaxSubmitSuccess'); ?>
    
                        try {
                            var json = $.parseJSON(data);
                            html = json.html;
                        } catch (e) {
                            // not json
                            html = data;
                        }
                        var percentVal = '0%';
                        progressBarPercent.width(percentVal);
                        formSubmitBtn.data('loading-text', 'Sent').button('loading');
                        
                        
                        var modal = '#myModal1';
                        $('.modal:visible').each(function(index, element) {
                            modal = '#'+$(this).attr('id');
                        });
                        $(modal+' .modal-body').html(html);
                        $(modal).modal('show');
                        
                <?php if($this->layout == 'ajax') { ?>
                    <?php if(!empty($this->params['named']['format'])) {  // ?> 
                        var url = '<?php echo $this->Html->url(array('controller'=>$this->params['controller'], 'action'=>'lists', 'ext'=>'json'))?>';
                        core.updateDropDown('select.<?php echo $this->params['named']['target']?>', url, '<?php echo Inflector::variable($this->params['controller'])?>');
                    <?php
                        } else { 
                            $namedParams = array('sort'=>'modified', 'direction'=>'desc');

                            $urlExtended = implode('/', array_map(
                                function ($v, $k) { return sprintf("%s:%s", $k, $v); },
                                $namedParams,
                                array_keys($namedParams)
                            ));

                            $url = $this->request->referer();

                            $refererParts = explode('/', $this->request->referer());
                            $lastPartOfUrl = end($refererParts);

                            $controllersListUnderscore = array();
                            $controllersList = str_replace('Controller', '', App::objects('Controller'));
                            foreach($controllersList as $k=>$value) {
                                if($value == 'App') continue;
                                
                                $valueTableize = Inflector::tableize($value);
                                $controllersListUnderscore[$valueTableize] = Inflector::underscore($valueTableize);
                            }

                            if(in_array($lastPartOfUrl, $controllersListUnderscore)) {
                                $url .= '/index';
                            }

                            $url .= '/'.$urlExtended;
                    ?>
                        $.get("<?php echo $this->Html->url($url)?>", function(dataHtml) {
                            $('#<?php echo Inflector::variable($this->params['controller'])?>Ajax').replaceWith(dataHtml);
                        });
                    <?php } ?>
                <?php } ?>
                        $('#'+formId+' .tempDisabled').removeAttr('disabled').removeClass('tempDisabled');
                        formSubmitBtn.button('reset');
                        
                        if(json.status == 'success') {
                        <?php if(!in_array($this->request->params['action'], ['edit', 'admin_edit'])) { ?>
                            $('#'+formId+' [type="reset"]').trigger('click');
                        <?php } ?>
                        }
                        if(json.status == 'error') {
                            // Do Something 
                        }
                    }
                })
            <?php else : // If enableAjax is set to FALSE in controller ?>
                form.submit();
            <?php endif; ?>
            }
        });
        
        $("[type=reset]", this).click(function() {
            var formObj = $(this).closest('form');
            validator[index].resetForm();
            if($().select2) {
                formObj.find('select').select2();
            }
            formObj.find('[type=submit]').button('reset');
            formObj.find('.form-group').removeClass('has-error').removeClass('has-success');
            formObj.find('.tempDisabled').removeAttr('disabled').removeClass('tempDisabled');
        });
    });
    
<?php echo $this->fetch('validateRules'); ?>
});
</script>