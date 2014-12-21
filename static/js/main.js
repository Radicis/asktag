
	/* ----  AXAJ call to get randomuser.me JSON object */
$.ajax({
	 //Request 5 results
	  url: 'http://api.randomuser.me/?results=7',
	  dataType: 'json',	 
	  success: function(data){			
		//Iterate through the JSON objects contained in the array data.results
		for(var i=0;i<data.results.length;i++){
			//Target the i+n nthchild and put in img src
			$(".post-list li:nth-child(" + (i+1) + ") img").attr("src",data.results[i].user.picture.thumbnail);			
		}
	  }
});

$(document).ready(function(){

	//$('#page_container').pajinate({items_per_page : 6});			
	
	$("#nav-toggle").click(function(){
	  $("#main-nav").slideToggle();
	  this.classList.toggle("active");
	}); 
	
	$(".show-comment-2").click(function(){
	  $(".comment-form-2").slideToggle();
	});
	
	$(".show-comment-main").click(function(){
	  $(".comment-form-main").slideToggle();
	});

	
	$('#main-content').profanityFilter({
    replaceWith: ['fun', 'stuff'],
    customSwears: ['ass'],
    externalSwears: '/static/js/vendor/swearWords.json'
	});
	
	$('#search-results').profanityFilter({
    replaceWith: ['fun', 'stuff'],
    customSwears: ['ass'],
    externalSwears: '/static/js/vendor/swearWords.json'
	});
	
	$('#side-content').profanityFilter({
    replaceWith: ['fun', 'stuff'],
    customSwears: ['ass'],
    externalSwears: '/static/js/vendor/swearWords.json'
	});

});
