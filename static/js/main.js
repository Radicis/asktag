$(function(){
	$('#id_tags').keyup(function(){
		this.value=this.value.replace(/,/g, "");
		this.value=this.value.replace(/\s{2,}/g, ' ');
	});
});




$(document).ready(function(){

	$('.delete').click(function(){
		var checkStr = confirm('Are you sure you want to delete this?');
		if(checkStr == true){
			
		}
	});
	
	//$('#id_tags').val($('#id_tags').val().replace(/\W/g, ''));

	//$('#id_tags').val($('#id_tags').val().replace(/[^A-Za-z0-9 ]/, ''));
	
	$('#post-container').pajinate({items_per_page : 4});			
	
	$("#nav-toggle").click(function(){
	  $("#main-nav").slideToggle();
	  this.classList.toggle("active");
	}); 
	
	$(".show-comment-2").click(function(){
	  $(this).next(".comment-form-2").slideToggle();
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
