<?php
App::uses('AppController', 'Controller');

class DashboardsController extends AppController {

	public $components = array('Paginator');

	var $uses = array('User');

	function beforeFilter() {
		parent::beforeFilter();
		$this->set('enableAjax', false);
		$this->Auth->allow('index','view_sitemap');
	}

   /*Site Map URLS*/

   public function view_sitemap(){
     $this->loadModel('SeoModule'); 
     $this->loadModel('Blog'); 
     $this->loadModel('Video');
     $this->loadModel('Package');
     $this->loadModel('OurJourny');
     $this->loadModel('OurTeam');
     $this->loadModel('GalleryCategory');


$seoMuduleData = $blogArr = $blogCategoriesArr = $blogTagArr = $blogAuthorarr = $videoCategoriesArr = 
        $videoTagArr = $journeyArr = $ourTeamArr = $galleryArr = $packageArr = [];

    /*Seo Module Page Urls*/
    $seoModules = $this->SeoModule->find('all',['conditions'=>['SeoModule.active'=>true]]);
    // debug($seoModules);exit;
    $seocounter = 0;
    foreach ($seoModules as $key => $seoModule) {
     if(!empty($seoModule['SeoModule']['page_url'])){
      $seoMuduleData ['SeoModule'][$seocounter]['URL'] = $seoModule['SeoModule']['page_url'];
      $seoMuduleData ['SeoModule'][$seocounter]['LstModified'] = date_format(date_create($seoModule['SeoModule']['modified']),DATE_ATOM); 
     } 
     $seocounter++;
    } 

    /*For Blog URLS*/
    $blogs = $this->Blog->find('all',['conditions'=>['Blog.active'=>true],'contain'=>false]);
    // debug($blogs);  
     $blogCounter = 0;
    
    foreach ($blogs as $key => $blog) {
     if(!empty($blog['Blog']['page_url'])){
      $blogArr ['Blog'][$blogCounter]['URL'] = $blog['Blog']['page_url'];
      $blogArr ['Blog'][$blogCounter]['LstModified'] = date_format(date_create($blog['Blog']['modified']),DATE_ATOM);
     } 
     $blogCounter++;
    }

    /*For Blog Categories*/
    $blogCategories = $this->Blog->BlogCategory->find('all',['conditions'=>['BlogCategory.active'=>true],'contain'=>false]);
    $blogCatCounter = 0;
    foreach ($blogCategories as $key => $blogCategory) {
     if(!empty($blogCategory['BlogCategory']['page_url'])){
      $blogCategoriesArr ['BlogCategory'][$blogCatCounter]['URL'] = $blogCategory['BlogCategory']['page_url'];
      $blogCategoriesArr ['BlogCategory'][$blogCatCounter]['LstModified'] = date_format(date_create($blogCategory['BlogCategory']['modified']),DATE_ATOM);
     } 
     $blogCatCounter++;
    }

    /*For Blog Tags*/
    $blogtags = $this->Blog->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
    $blogTagCounter = 0;

    foreach ($blogtags as $key => $blogtag) {
     if(!empty($blogtag['BlogTag']['page_url'])){
      $blogTagArr ['BlogTag'][$blogTagCounter]['URL'] = $blogtag['BlogTag']['page_url'];
      $blogTagArr ['BlogTag'][$blogTagCounter]['LstModified'] = date_format(date_create($blogtag['BlogTag']['modified']),DATE_ATOM);
     } 
     $blogTagCounter++;
    }

    /*For Blog Author*/
    $blogauthors = $this->Blog->BlogAuthor->find('all',['conditions'=>['BlogAuthor.active'=>true],'contain'=>false]);

    $blogAuthorCounter = 0;

    foreach ($blogauthors as $key => $blogauthor) {
     if(!empty($blogauthor['BlogAuthor']['page_url'])){
      $blogAuthorarr ['BlogAuthor'][$blogAuthorCounter]['URL'] = $blogauthor['BlogAuthor']['page_url'];
      $blogAuthorarr ['BlogAuthor'][$blogAuthorCounter]['LstModified'] = date_format(date_create($blogauthor['BlogAuthor']['modified']),DATE_ATOM);
     } 
     $blogAuthorCounter++;
    }

    /*For Video Categories Urls*/
    $videoCategories = $this->Video->VideoCategory->find('all',['conditions'=>['VideoCategory.active'=>true],'contain'=>false]);

    $videoCatCounter = 0;
    foreach ($videoCategories as $key => $videoCategory) {
     if(!empty($videoCategory['VideoCategory']['page_url'])){
      $videoCategoriesArr ['VideoCategory'][$videoCatCounter]['URL'] = $videoCategory['VideoCategory']['page_url'];
      $videoCategoriesArr ['VideoCategory'][$videoCatCounter]['LstModified'] = date_format(date_create($videoCategory['VideoCategory']['modified']),DATE_ATOM);
     } 
     $videoCatCounter++;
    }

    /*For Video Tags*/
    $videotags = $this->Video->BlogTag->find('all',['conditions'=>['BlogTag.active'=>true],'contain'=>false]);
    //debug($videotags);die;
    $videoTagCounter = 0;

    foreach ($videotags as $key => $videotag) {
     if(!empty($videotag['BlogTag']['page_url'])){
      $videoTagArr ['BlogTag'][$videoTagCounter]['URL'] = $videotag['BlogTag']['page_url'];
      $videoTagArr ['BlogTag'][$videoTagCounter]['LstModified'] = date_format(date_create($videotag['BlogTag']['modified']),DATE_ATOM);
     } 
     $videoTagCounter++;
    }

    /*For Package URLS*/
    $packages = $this->Package->find('all',['conditions'=>['Package.active'=>true],'contain'=>false]);
    $packageCounter = 0;


    foreach ($packages as $key => $package) {
     if(!empty($package['Package']['page_url'])){
      $packageArr['Package'][$packageCounter]['URL'] = $package['Package']['page_url'];
      $packageArr['Package'][$packageCounter]['LstModified'] = date_format(date_create($package['Package']['modified']),DATE_ATOM);
     } 
     $packageCounter++;
    }

     /*For Journey URLS*/
    $journeys = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true],'contain'=>false]);
    $journeyCounter = 0;
    
    foreach ($journeys as $key => $journey) {
     if(!empty($journey['OurJourny']['page_url'])){
      $journeyArr['OurJourny'][$journeyCounter]['URL'] = $journey['OurJourny']['page_url'];
      $journeyArr['OurJourny'][$journeyCounter]['LstModified'] = date_format(date_create($journey['OurJourny']['modified']),DATE_ATOM);
     } 
     $journeyCounter++;
    }

    /*For Our Team URLS*/
    $ourteams = $this->OurTeam->find('all',['conditions'=>['OurTeam.active'=>true],'contain'=>false]);
    //debug($ourteams);die;
    $teamsCounter = 0;
    
    foreach ($ourteams as $key => $ourteam) {
     if(!empty($ourteam['OurTeam']['page_url'])){
        //debug($ourteam['OurTeam']['modified']);die;
      $ourTeamArr['OurTeam'][$teamsCounter]['URL'] = $ourteam['OurTeam']['page_url'];
      $ourTeamArr['OurTeam'][$teamsCounter]['LstModified'] = date_format(date_create($ourteam['OurTeam']['modified']),DATE_ATOM);
     } 
     $teamsCounter++;
    }

    /*For Gallery URLS*/                                           
    $galleries = $this->Gallery->GalleryCategory->find('all',['conditions'=>['GalleryCategory.active'=>true],'contain'=>false]); 

    /*debug($galleries);die;*/ 
    $galleryCounter = 0;
    
    foreach ($galleries as $key => $gallery) {
     if(!empty($gallery['GalleryCategory']['page_url'])){
      $galleryArr['GalleryCategory'][$galleryCounter]['URL'] = $gallery['GalleryCategory']['page_url'];
      $galleryArr['GalleryCategory'][$galleryCounter]['LstModified'] = date_format(date_create($gallery['GalleryCategory']['modified']),DATE_ATOM);
     } 
     $galleryCounter++;
    }

    /*master Array*/
    $xmlUrlData = array_merge($seoMuduleData,$blogArr,$blogCategoriesArr,$blogTagArr,$blogAuthorarr,
        $videoCategoriesArr,$videoTagArr,$journeyArr,$ourTeamArr,$galleryArr,$packageArr);

    //debug($xmlUrlData);exit;


    $myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
    <urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'  xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>";


    $this->set(compact('xmlUrlData','myXMLData'));

   }


    /**
     * index method
     *
     * @return void
     */
     public function index() {
        $this->layout = 'home';
        $this->loadModel('OurTeam');
        $this->loadModel('BookingFacility');
        $this->loadModel('Package');
        $this->loadModel('Video');
        
        $options = array();
        $conditions = array();
        $options['conditions'] = ['Package.active'=>true,'Package.display_on_homepage'=>true];
        $options['limit'] = '6';
        $options['contain'] = ['OurJourny'=>['conditions'=>['OurJourny.active'=>true],'order'=>['OurJourny.order'=>'ASC']]];
       // $options['contain'] = ['JourneyImage'=>['conditions'=>['JourneyImage.active'=>true,'JourneyImage.its_main_image'=>true],'limit'=>'1'],'TourCost'=>['conditions'=>['TourCost.active'=>true],'fields'=>['date']]];

        /*Tour Details*/
        $packages = $this->Package->find('all',$options);

        // debug($ourJournies);exit;

        /*Dashborads Blogs*/
        $blogs = $this->Blog->find('all',['conditions'=>['Blog.active'=>true,'Blog.is_display_homepage'=>true],'contain'=>['BlogCategory','BlogAuthor'],'limit'=>'4','order'=>'rand()']);    

            
        /*Our team*/    
        $ourTeams = $this->OurTeam->find('all',['conditions'=>['OurTeam.active'=>true,['OurTeam.its_scholar'=>true]],'contain'=>false]);


        $bookingFacilities = $this->BookingFacility->find('all',['conditions'=>['BookingFacility.active'=>true]]);

        $otherPosts = $this->Video->find('all',['conditions'=>['Video.active'=>true,'Video.is_display_homepage'=>true,'Video.is_external_link'=>true],'limit'=>'2','contain'=>false,'order'=>'rand()']);

        //debug($otherPosts);die;

        /*Set Compact*/
        $this->set(compact('blogs','ourTeams','packages','bookingFacilities','otherPosts'));

    }

    /*For Display Review*/
    public function admin_is_active(){
    $this->autoRender = false;

    $blogcommentid = trim($this->request->data['blogcommentid']);

    // debug($serviceId);exit;

     if (!empty($blogcommentid)){
        $action = $this->request->data['checkedid'];
        $value= ($action == "true") ? 1 : 0;
        /*debug($value);*/
        $this->BlogComment->id = $blogcommentid;

         if ($this->BlogComment->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}


 /*For Admin Panel*/
 public function admin_index(){
        $this->loadModel('OurJourny');
        $this->loadModel('Enquiry');

        /*Blogs*/
        $blogsCount = $this->Blog->find('count');

        $activeBlog = $this->Blog->find('count',['conditions'=>['Blog.active'=>true]]);
        
        $inactiveBlog = $this->Blog->find('count',['conditions'=>['Blog.active'=>false]]);

        $packageCount = $this->Package->find('count');

        $activePackage = $this->Package->find('count',['conditions'=>['Package.active'=>true]]);

        $inactivePackage = $this->Package->find('count',['conditions'=>['Package.active'=>false]]);

        $journeyCount = $this->OurJourny->find('count');

        $activeJourney = $this->OurJourny->find('count',['conditions'=>['OurJourny.active'=>true]]);

        $inactiveJourney = $this->OurJourny->find('count',['conditions'=>['OurJourny.active'=>false]]);

        $enqCount = $this->Enquiry->find('count',['conditions'=>['Enquiry.our_journy_id !='=>0]]);

        /*Set Compact*/
        $this->set(compact('blogsCount','activeBlog','inactiveBlog','packageCount','activePackage','inactivePackage','enqCount','journeyCount','activeJourney','inactiveJourney'));
 }
}