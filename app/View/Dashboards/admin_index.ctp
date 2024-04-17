<?php //debug($master_user_type_id);exit;?>
<style>
    .links{
        display: flex;
        justify-content: space-between;
        
    }
    .dashboard-stat .details .number
    {
        padding-top: 10px;
    }
</style>    
<?php 
    echo $this->Html->css(array('daterangepicker-bs3'));
    echo $this->start('breadcrumb');
    echo $this->Html->tag('li', $this->Html->link(__("Dashboards"), array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
    echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller' => 'dashboards', 'action' => 'index', 'admin'=>true)), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
    echo $this->end();
    echo $this->Html->script(['amcharts', 'serial', 'light', 'pie']);
?>
<div id="dashboardBoxes">
    <div class="dashboard_body" >
         <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <?php echo $this->Bs->icon('list-ol'); ?>
                    </div>
                    <div class="details">
                        <div class="number ">
                        <span class="count">
                            <?php echo ($blogsCount); ?> </span></div>
                            <div class="desc">No of Blogs</div>

                         <div class="links">
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'index','active'=>1));?>" class="more"> Active : <?php echo $activeBlog;?></a></div>
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'index','active'=>0));?>" class="more"> Inactive : <?php echo $inactiveBlog;?></a></div>
                          </div> 

                    </div>
                        <a href="<?php echo $this->Html->url(array('controller'=>'blogs', 'action'=>'index'));?>" class="more">View more <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-jungle">
                    <div class="visual">
                        <?php echo $this->Bs->icon('list-ol'); ?>
                    </div>
                    <div class="details">
                        <div class="number ">
                        <span class="count">
                            <?php echo ($packageCount); ?> </span></div>
                            <div class="desc">No of Packages</div>

                         <div class="links">
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'packages', 'action'=>'index','active'=>1));?>" class="more"> Active : <?php echo $activePackage;?></a></div>
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'packages', 'action'=>'index','active'=>0));?>" class="more"> Inactive : <?php echo $inactivePackage;?></a></div>
                          </div> 

                    </div>
                        <a href="<?php echo $this->Html->url(array('controller'=>'packages', 'action'=>'index'));?>" class="more">View more <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <?php echo $this->Bs->icon('list-ol'); ?>
                    </div>
                    <div class="details">
                        <div class="number ">
                        <span class="count">
                            <?php echo ($journeyCount); ?> </span></div>
                            <div class="desc">Journies</div>

                         <div class="links">
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'our_journies', 'action'=>'index','active'=>1));?>" class="more"> Active : <?php echo $activeJourney;?></a></div>
                            <div><a href="<?php echo $this->Html->url(array('controller'=>'our_journies', 'action'=>'index','active'=>0));?>" class="more"> Inactive : <?php echo $inactiveJourney;?></a></div>
                          </div> 
                    </div>
                        <a href="<?php echo $this->Html->url(array('controller'=>'our_journies', 'action'=>'index'));?>" class="more">View more <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <?php echo $this->Bs->icon('list-ol'); ?>
                    </div>
                    <div class="details">
                        <div class="number ">
                        <span class="count">
                            <?php echo ($enqCount); ?> </span></div>
                            <div class="desc">Enquiries</div>
                    </div>
                        <a href="<?php echo $this->Html->url(array('controller'=>'enquiries', 'action'=>'index'));?>" class="more">View more <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            </div>
                        
            <!-- <div class="row">
             
       </div> -->
    </div>
 </div> 

<script type="text/javascript">
$(function() {
<?php $this->start('appScript'); ?>
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 800,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
<?php $this->end(); ?>
});
</script>
