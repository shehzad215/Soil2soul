<!-- start navigation -->
<?php
if(!empty($dataArr['pagination'])){
if (count($dataArr['pagination']) > 0) {
$pagination = $dataArr['pagination'];
$currentPage = $pagination['currentpage'];
$recordsPerPage = $pagination['recordsperpage'];
$numberOfRecords = $pagination['totalrecords'];
$totalpages = $pagination['totalpages'];
$itemName = $pagination['itemName'];
$pageData = isset($pagination['pagaData']) ? $pagination['pagaData'] : '';
$minValue = $currentPage - 5;
?>

        <script type="text/javascript">
//                function callPage(urlName,urlData) {
//                    $('#notification').html('Loading...').fadeIn(100);
//                    App.blockUICenter();
//                    $.get(urlName,urlData, function(resp) {
//                        App.unblockUICenter();
//                        $('#box_content').html(resp);
//                        $('#notification').hide();
//                    });
//                }
        </script>
        <nav>
            <form name="frmGoToPage" method="GET" action="{$filename}">
                <ul class="pagination m-y-0">
                    <?php if ($currentPage > 1) { ?>
                            <li><a href="<?php echo $pagination['scripturl'].'&page='.$pagination['firstpage'];?>" class="prev">First</a></li>
                            <li><a href="<?php echo $pagination['scripturl'].'&page='.$pagination['previouspage'];?>" class="prev"><<</a></li>
                    <?php }
                    $num_pages = ceil($numberOfRecords / $recordsPerPage);
                    $pager_num = 2; // How many page number you wish to display to the left and right sides of the current page
                    $offset = $currentPage * $recordsPerPage;
                    $index_start = ($currentPage - $pager_num) <= 0 ? 1 : $currentPage - $pager_num;
                    $page_start_record = ((($currentPage - 1) * $recordsPerPage) + 1);
                    $index_finish = ($currentPage + $pager_num) >= $num_pages ? $num_pages : $currentPage + $pager_num;

                    for ($i = $index_start; $i <= $index_finish; $i++) { ?>
                        <?php if ($currentPage == $i) { ?>
                            <li class="active"><a><?php echo $i ?></a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo $pagination['scripturl'].'&page='.$i;?>"><?php echo $i ?></a></li>
                        <?php } ?>
                    <?php } ?>
                    <input type="hidden" id="page_number" value="<?php echo $currentPage; ?>"/>
                    <input type="hidden" id="scripturl" value="<?php echo $pagination['scripturl']; ?>"/>
                    <?php
                    if ($pagination['lastpage'] != $currentPage) { ?>
                        <li><a href="<?php echo $pagination['scripturl'].'&page='.$pagination['nextpage'];?>" class="prev">>></a></li>
                        <li><a href="<?php echo $pagination['scripturl'].'&page='.$pagination['lastpage'];?>" class="prev">Last</a></li>
                    <?php } ?>
                </ul>
                <div class="help-block">
                    <?php echo 'Displaying records '.$page_start_record.' to ';
                            if($offset > $numberOfRecords){
                                echo $numberOfRecords;
                            }else{
                                echo $offset;
                            }
                        echo' out of '.$numberOfRecords;
                    ?>
                </div>
            </form>
        </nav>

<?php }} ?>
<!-- end navigation -->