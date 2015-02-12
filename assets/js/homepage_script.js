(function($){

	//number of merch divs per page
	var perPage = 8;
	
	//laod page
	var jsonData = "{}";
	$.get("/main/get_all_merch/",
		function(data){
			jsonData = data;
			fillContent(0);
			load_pagination(jsonData.values.length);
		},
		"json");

	//filtering
	$('.merch_link').click(function(){
		$('#body h1').text($(this).text());
		$(this).text();
		$.get("/main/get_merch/" +$(this).text(),
			function(data){
				$('#content').empty();
				jsonData = data;
				fillContent(0);
				load_pagination(jsonData.values.length);
			},
			"json");

		return false;
	});

	//searching
	$('#merch-search-button').click(function(){
		var filter = $('#merch-search').val();
		console.log('filter');
		$.get(
			'/main/get_merch_filter/'+filter, 
			function(data){
				$('#content').empty();
				jsonData = data;
				fillContent(0);
				load_pagination(jsonData.values.length);
			}, 
			'json');
	});

	//fills the content area given the startng index
	function fillContent(start){
		var i = 0; 
		$('#content').empty();
		while(i+start < jsonData.values.length && i < perPage){
			$('#content').append('<a href="view/merch/'+jsonData.values[start+i].id+'" class=" '+jsonData.values[start+i].category+' "><div class="merch merch-div col-md-3"><p>'+jsonData.values[start+i].name+'</p><img src="/assets/images/'+jsonData.values[start+i].image+'" alt="..." class="img-thumbnail"><p>$'+jsonData.values[start+i].price+'</p></div></a>');
			i++;
		}
	}

	// --- pagination ---
	$(document).on('click', '.page', function(){
		fillContent((parseInt($(this).text())-1)*perPage);
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.next').click(function(){
		page_next($('.active').text());		
	});
	$('.previous').click(function(){
		page_prev($('.active').text());
	});

	/* ----------------------------
	 * Loads products pagination, given the length of the JSON array
	 * returned
	 */
	 function load_pagination(length){
	 	$('.page').remove();
	 	length = Math.ceil(length/perPage);
	 	if(length > 0){
	 		$('.next').before('<li class="page active"><a href="#">1</a></li>');
	 	}
	 	for(var i = 2; i <= length; i++){
	 		$('.next').before('<li class="page"><a href="#">'+i+'</a></li>');
	 	}
	 }

	 /* ----------------------------
	 * Advances pagination, given the current page
	 */
	 function page_next(current){
	 	var start = current*perPage; //don't need to add 1, because of 0 based indexing
	 	//check for end of pagination
		if($('.active').nextAll().length > 1){ 
			//if not at the end, move over
			$('.active').removeClass('active').next().addClass('active');
			fillContent(start);
		}
	 }

	 /* ----------------------------
	 * Decrements pagination, given the current page
	 */
	 function page_prev(current){
	 	var start = (current - 2)*perPage; // need to subtract 2, because of 0 based indexing
	 	//check for end of pagination
		if($('.active').prevAll().length > 1){
			//if not at the end, move over
			$('.active').removeClass('active').prev().addClass('active');
			fillContent(start);
		}
	 }

})(jQuery);