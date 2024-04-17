<?php
	$controller = $this->request->params['controller'];
?>
<div class="delete-container">
<div class="text-error" style="text-align: center;">
    Are you sure you want to delete <?php echo $modelName ?> #<?php echo $id?>? &nbsp;&nbsp; 
    <?php 
        echo $this->Bs->link($this->Bs->icon('trash').' '.__('Yes, Delete!'), array('action'=>'delete', $id, 'true'), array('class'=>'btn red btn-sm postDeleteLink', 'escape'=>false));
        echo $this->Bs->link($this->Bs->icon('reload').' '.__('No'), array(), array('class'=>'btn btn-sm btn-info', 'data-dismiss'=>'modal', 'escape'=>false, 'style'=>'width: 50px;margin-left: 10px;' ));
    ?>
</div>
</div>
<script type='text/javascript'>
<?php $this->start('appScript'); ?>	
    $('.postDeleteLink').click(function(e){
        e.preventDefault();
        
        var delete_body = $('.delete-container');
    
        var url = $(this).attr('href');
        
        $(this).button('loading');
        
        $.post(url).done(function(data) {
            try {
                var json = $.parseJSON(data);
                var html = json.html;
            } catch (e) {
                // not json
                var html = data;
            }
        
            if(isNumber(<?php echo $id; ?>)) {
                var row = $('.<?php echo Inflector::variable($controller);?>.index').find('.tr_<?php echo $id;?>');
                
                if(empty(row.length)) {
                    row = $('[data-delete-row-id="<?php echo $id?>"]').closest('tr, div');
                }
                
                if(!empty(row.length)) {
                    row.addClass('animated slideOutRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() { 
                        $(this).remove();
                    });
                } else {
//                    setTimeout(function(){ location.reload(); }, 3000);
                    var url = '<?php echo $this->Html->url(['controller'=>$this->request->params['controller'], 'action'=>'index']); ?>';
                    setTimeout(function(){ window.location.href = url; }, 3000);
                }
            } else {
                $('#<?php echo Inflector::variable($controller);?>Ajax').load('<?php echo $this->Html->url(array_merge(array('action'=>'index'), $this->request->params['named']));?>', function() {
                    $(this).children(':first').unwrap();
                });
            }
            delete_body.html(html);
        }).error(function() {
            alert("Error");
        })
        return false;
    });
<?php $this->end(); ?>
</script>