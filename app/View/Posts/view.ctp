<style type="text/css">
  .showmorebtn:hover{ color: #ec682a; text-decoration: none;}
  .showmorebtn{ color: #ec682a; text-decoration: none;}
  .learnmoretbtnactivity:hover, .learnmoretbtnactivity:hover{
    color: #fff;
    text-decoration: none;
}
</style>
<?php 
    $this->start('title');
        echo (!empty($post['Post']['meta_title']))? h($post['Post']['meta_title']) : h($post['Post']['title']);
    $this->end();

    $this->start('meta');
        echo $this->Html->meta(
            'description',
            h($post['Post']['meta_description'])
        );

        echo $this->Html->meta(
            'keywords',
            h($post['Post']['meta_keyword'])
        );
    $this->end();

	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Posts'), array('controller'=>'posts', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();


    
    $dataImage = $this->Bs->image('Post.cover_image', $post, array('class'=>'img-responsive', 'width'=>'1450', 'height'=>'540', 'urlOnly'=>true, 'zc'=>1));

    $dataName = h($post['Post']['title']).' ';

    echo $this->start('page-cover-title');
    echo $dataName;
    echo $this->end();

    echo $this->start('page-cover-image');
    echo $dataImage;
    echo $this->end();
    echo $this->start('header-content');
    
?>
<?php 
    echo $this->end();
    $postCommentCount = count($post['BlogComment']);
?>

<div class="container">
    <div class="contentarea">
    	<div class="row">
            <div class="col-md-12">
                 <div class="pageheading">
                    <?php 
                        echo $this->Bs->link('Home', '/', []);
                        echo $this->Html->image("arrowhead.png");
                    ?> 
                    <span class="pagesubheading">
                        <?php echo $this->Bs->link('Blogs', ['controller' =>'posts', 'action' =>'index'], []); ?>
                    </span>
                        <?php echo $this->Html->image("arrowhead.png");?>
                    <span class="pagesubsubheading">
                        <?php echo h($post['Post']['title']); ?>
                    </span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php  echo $this->element('Blogs/search_filter');  ?>
            </div>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
                <div class="innerheadingbg">
                    <div class="row">
                        <div class="col-sm-8">
                            <?php echo $post['Post']['title']; ?>
                        </div>
                        <div class="col-sm-4" style=" text-align: right;">
                            <?php 
                            if(Hash::get($post, 'BlogComment.0.id')){
                                $totalUserComments = count(Hash::get($post, 'BlogComment'));
                            }else{
                                $totalUserComments = 0;
                            }
                            echo  $this->Bs->link(__($totalUserComments.' Comments'), 'javascript:void(0)', array('icon'=>'comment', 'style' => 'font-size: 13px;', 'class' => 'showComments')); ?>
                        </div>
                    </div>
                </div>
        		<div class="textblack13">
                    <?php echo $post['Post']['body']; ?>
                </div>

                <div class="youmaylikesec">
                    <div class="reviewbox">
                        <div class="heading clearfix">
                            <div class="textblack30head pull-left">
                            <?php echo __("Comments");?>
                            </div>
                            <span class="pull-right">
                                <?php
                                $class = '';
                                if($isLoggedIn) {
                                    $class = 'writeReview';
                                    $writeAReviewLink = 'javascript:void(0)';
                                    $writeAReviewLinkOpts = [];
                                } else {
                                    $writeAReviewLink = ['controller'=>'blog_comments', 'action'=>'addusercomment', $post['Post']['slug'], 'supplier'=>false, 'admin'=>false, 'agent' => false];
                                    $writeAReviewLinkOpts = [];
                                }
                                if($reviewDisableflag != 1){
                                    echo $this->Bs->link(
                                        $this->Bs->image(
                                                "writereviewicon.png", 
                                                '', 
                                                ['alt' => 'Comments' ,'height'=>'15', 'width'=>'15']
                                                ).'<span>&nbsp;&nbsp;Post a comments</span>',
                                            $writeAReviewLink,
                                            am(['class'=>$class, 'escape'=>false], $writeAReviewLinkOpts)
                                            );
                                    }
                                ?>
                            </span>
                        </div>
                        <div id="blogsComments" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'blog_comments', 'action'=>'index', $post['Post']['id']));?>" data-page-count="1">
                        </div>
                        <div class="blogsComments"></div>
                    </div>
                    <div style="margin-top:30px;" class="line_title <?php echo $postCommentCount <= 2 ? 'hide' : '';?>">
                        <span class="">
                            <a href="javascript:void(0)" class="load_more showmorebtn" id="load_more_button" data-target="blogsComments"><?php echo __("Show More Comments"); ?></a> &nbsp;&nbsp; 
                        </span>
                    </div>
                    <div class="writeAReviewBox" style="display: none;">
                        <p>&nbsp;</p>
                        <?php
                        echo $this->Bs->create('BlogComment', array('controller'=>'blog_comments', 'action'=>'addusercomment/'.$post['Post']['id'], 'class'=>'form-vertical'));
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo $this->Bs->input('comment', array('label'=>'Comment:', 'class'=>'form-control required', 'placeholder'=>'Enter your comment here'));
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $this->Form->button(__('Post Your Comment'), array('class'=>'learnmoretbtnactivity btn buynowbtn submitButton', 'type'=>'submit', 'id'=>'reviewButton')); ?>
                                <button class="learnmoretbtnactivity btn buynowbtn submitButton" type="button" id="reviewCancel">Cancel</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>
    


            </div>
        </div>

    </div>
</div>
</div>
<script type="text/javascript">
$(function() {
<?php $this->start('appScript'); ?>

$('body').on('click', '.writeReview', function() {
    $('.writeAReviewBox').show();
    $("html, body").animate({scrollTop: $(".writeAReviewBox").offset().top-130}, 500);
});

$('body').on('click', '.showComments', function() {
    $("html, body").animate({scrollTop: $(".youmaylikesec").offset().top-110}, 500);
});

$('body').on('click', '#reviewCancel', function() {
    $('.writeAReviewBox').hide();
    $("html, body").animate({scrollTop: $(".youmaylikesec").offset().top-150}, 500);
});

$('body').on('click', '.load_more', function() {
        var btnLoadMore = $(this);
        var target = $(this).data('target');
        var targetEle = $('#'+target);
        var dealsName = btnLoadMore.data('name');
        var url = targetEle.data('url');
        $('.'+target).show('');
        $('.'+target).html(core.progressBar('', 'frontend'));
        var pageCount = targetEle.attr('data-page-count');
        pageCount++;
        url = url+'/page:'+pageCount;
        
        $.get(url, function(html){
            $('.'+target).html('');
            targetEle.append(html);
            var blockCount = $(html).find('.block').length;
            if(blockCount < 2) {
                btnLoadMore.closest('.line-title').find('span').hide(); 
            }
        }).fail(function() {
            $('.'+target).html('');
            btnLoadMore.closest('.line_title').hide();
        });
        targetEle.attr('data-page-count', pageCount);
    });

<?php $this->end(); ?>
});
</script>