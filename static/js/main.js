$(function(){

	$('#id_tags').keyup(function(){
		this.value=this.value.replace(/,/g, "");
		this.value=this.value.replace(/\s{2,}/g, ' ');
	});
});


$(document).ready(function(){

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
