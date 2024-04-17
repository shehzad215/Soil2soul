// tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
		
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading").removeClass("d_active");
	  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
	  
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    $(".tab_container").css("min-height", function(){ 
      return $(".tabs").outerHeight() + 50;
    });
	/* if in drawer mode */
	$(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();	  
	  $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");	  
	  $("ul.tabs li").removeClass("active");
	  $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
	
	
	/* Extra class "tab_last" 
	   to add border to bottom side
	   of last tab 
	$('ul.tabs li').last().addClass("tab_last");*/
	
	
	
	// tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content2").hide();
    $(".tab_content2:first").show();

  /* if in tab mode */
    $("ul.tabs2 li").click(function() {
		
      $(".tab_content2").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs2 li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading2").removeClass("d_active2");
	  $(".tab_drawer_heading2[rel^='"+activeTab+"']").addClass("d_active2");
	  
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    $(".tab_container2").css("min-height", function(){ 
      return $(".tabs2").outerHeight() + 50;
    });
	/* if in drawer mode */
	$(".tab_drawer_heading2").click(function() {
      
      $(".tab_content2").hide();
      var d_active2Tab = $(this).attr("rel"); 
      $("#"+d_active2Tab).fadeIn();
	  
	  $(".tab_drawer_heading2").removeClass("d_active2");
      $(this).addClass("d_active2");
	  
	  $("ul.tabs2 li").removeClass("active");
	  $("ul.tabs2 li[rel^='"+d_active2Tab+"']").addClass("active");
    });
	

	
	
	
	// tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content3").hide();
    $(".tab_content3:first").show();

  /* if in tab mode */
    $("ul.tabs3 li").click(function() {
		
      $(".tab_content3").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs3 li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading3").removeClass("d_active3");
	  $(".tab_drawer_heading3[rel^='"+activeTab+"']").addClass("d_active3");
	  
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    $(".tab_container3").css("min-height", function(){ 
      return $(".tabs3").outerHeight() + 50;
    });
	/* if in drawer mode */
	$(".tab_drawer_heading3").click(function() {
      
      $(".tab_content3").hide();
      var d_active3Tab = $(this).attr("rel"); 
      $("#"+d_active3Tab).fadeIn();
	  
	  $(".tab_drawer_heading3").removeClass("d_active3");
      $(this).addClass("d_active3");
	  
	  $("ul.tabs3 li").removeClass("active");
	  $("ul.tabs3 li[rel^='"+d_active3Tab+"']").addClass("active");
    });
	
	
	
	
	// tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content4").hide();
    $(".tab_content4:first").show();

  /* if in tab mode */
    $("ul.tabs4 li").click(function() {
		
      $(".tab_content4").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs4 li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading4").removeClass("d_active4");
	  $(".tab_drawer_heading4[rel^='"+activeTab+"']").addClass("d_active4");
	  
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    /*$(".tab_container4").css("min-height", function(){ 
      return $(".tabs4").outerHeight() + 50;
    });*/
	/* if in drawer mode */
	$(".tab_drawer_heading4").click(function() {
      
      $(".tab_content4").hide();
      var d_active4Tab = $(this).attr("rel"); 
      $("#"+d_active4Tab).fadeIn();
	  
	  $(".tab_drawer_heading4").removeClass("d_active4");
      $(this).addClass("d_active4");
	  
	  $("ul.tabs4 li").removeClass("active");
	  $("ul.tabs4 li[rel^='"+d_active4Tab+"']").addClass("active");
    });









// tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content5").hide();
    $(".tab_content5:first").show();

  /* if in tab mode */
    $("ul.tabs5 li").click(function() {
		
      $(".tab_content5").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs5 li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading5").removeClass("d_active5");
	  $(".tab_drawer_heading5[rel^='"+activeTab+"']").addClass("d_active5");
	  
    /*$(".tabs").css("margin-top", function(){ 
       return ($(".tab_container").outerHeight() - $(".tabs").outerHeight() ) / 2;
    });*/
    });
    /*$(".tab_container4").css("min-height", function(){ 
      return $(".tabs4").outerHeight() + 50;
    });*/
	/* if in drawer mode */
	$(".tab_drawer_heading5").click(function() {
      
      $(".tab_content5").hide();
      var d_active5Tab = $(this).attr("rel"); 
      $("#"+d_active5Tab).fadeIn();
	  
	  $(".tab_drawer_heading5").removeClass("d_active5");
      $(this).addClass("d_active5");
	  
	  $("ul.tabs5 li").removeClass("active");
	  $("ul.tabs5 li[rel^='"+d_active5Tab+"']").addClass("active");
    });


	