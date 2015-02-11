(function($){
	$('.merch_link').click(function(){
		$('#body h1').text($(this).text());
		$('#content').empty();
		$(this).text();
		$.get("/main/get_merch/" +$(this).text(),
			function(data){
				for(var i=0; i<data.values.length; i++)
				{
					$('#content').append('<a href="view/merch/'+data.values[i].id+'" class=" '+data.values[i].category+' "><div class="merch col-md-3"><p>'+data.values[i].name+'</p><img src="/assets/'+data.values[i].image+'" alt="..." class="img-thumbnail"><p>'+data.values[i].price+'</p></div></a>');
				}
				console.log(data);
			},
			"json");

		return false;
	});
})(jQuery);