(function($){
	$('#merch-search-button').click(function(){
		var filter = $('#merch-search').val();
		$.get(
			'/main/get_merch_filter/'+filter, 
			function(data){
				console.log(data);
				$('#content').empty();
				for(var i=0; i<data.values.length; i++)
				{
					$('#content').append('<a href="view/merch/'+data.values[i].id+'" class=" '+data.values[i].category+' "><div class="merch col-md-3"><p>'+data.values[i].name+'</p><img src="/assets/images/'+data.values[i].image+'" alt="..." class="img-thumbnail"><p>'+data.values[i].price+'</p></div></a>');
				}
			}, 
			'json');
	});
})(jQuery);