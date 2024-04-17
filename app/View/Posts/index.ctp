<?php
    $dataName = 'Blogs';
    if(!(strpos($_SERVER['SERVER_NAME'], 'localhost') === false)){
        $dataImage = $this->Bs->image('blogcollage.jpg', '', array('class'=>'img-responsive', 'width'=>'1340', 'height'=>'auto', 'urlOnly'=>true));
    }else{
        $dataImage = $this->Bs->image(Router::fullbaseUrl().'/img/blogcollage.jpg', '', array('class'=>'img-responsive', 'width'=>'1340', 'height'=>'auto', 'urlOnly'=>true));
    }

    $this->start('title');
    echo 'Blogs';
    $this->end();

    echo $this->start('page-cover-title');
    echo $dataName;
    echo $this->end();

    echo $this->start('page-cover-image');
    echo $dataImage;
    echo $this->end();

    echo $this->start('header-content'); 
    echo $this->end();
?>
<div class="container">
    <div class="contentarea">
    <?php if(!empty($posts)) {?>
        <div class="row">
            <div class="col-md-3">
                <?php  echo $this->element('Blogs/search_filter');  ?>
            </div>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
                <div class="innerheadingbg">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo __("Blogs"); ?>
                        </div>
                    </div>
                </div>
                <?php 
                    foreach($posts as $post) {
                ?>
                    <p class="lead">
                        <?php 
                            echo $this->Bs->link(
                                    $post['Post']['title'],
                                    ['controller' => 'posts', 'action' => 'view', $post['Post']['slug'], 'admin' => false, 'user' => false, 'supplier' => false, 'agent' => false],
                                    ['title' => $post['Post']['title']]
                                  );
                        ?>
                    </p>
                    <hr>
                    <p>
                        <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $this->Time->format($post['Post']['created'], '%A, %d %b %Y')?> 
                        <span style="float: right;">
                            <?php  
                               echo  $this->Bs->link(__($post['Post']['totalUserComments'].' Comments'), array('controller'=>'posts', 'action'=>'view', $post['Post']['slug'],  'admin' => false, 'user' => false, 'supplier' => false, 'agent' => false), array('icon'=>'comment'));
                            ?>
                        </span>
                    </p>
                    <hr>
                    <?php echo $this->Text->truncate(strip_tags($post['Post']['body']),600,array('ellipsis' => '...','exact' => false));?>
                    <br><br>
                <?php 
                    }
                    echo $this->Bs->paginationRow();
                ?> 
            </div>
        </div>
    <?php }else{ echo "<p>No data found.</p>";}?>
    </div>
</div>
