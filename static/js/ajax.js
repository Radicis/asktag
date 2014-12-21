$(function(){

	$('#search').keyup(function(){
	
		$.ajax({
			type: "POST",
			url: "/search/",
			data: {
				'search_text' : $('#search').val(),
				'csrfmiddlewaretoken' : $('input[name=csrfmiddlewaretoken]').val()
			},
			success: searchSuccess,
			datatype: 'html'
		});
	});
});
/* auto suggest tags
on submit form strip non alphanumeric chars from input box befoe submit
$(function(){

	$('#input-tags').keyup(function(){
	
		$.ajax({
			type: "POST",
			url: "/input_tags/",
			data: {
				'tags' : $('#input-tags').val(),
				'csrfmiddlewaretoken' : $('input[name=csrfmiddlewaretoken]').val()
			},
			success: searchSuccess,
			datatype: 'html'
		});
	});
});
*/
function searchSuccess(data, textStatus, jqXHR)
{
	$('#search-results').html(data);
}

