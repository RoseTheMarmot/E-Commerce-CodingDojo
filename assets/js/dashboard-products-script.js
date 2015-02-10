(function($){
	var jsonData = "{}";

	var productsSearch 	= $(	'#products-search-form'	);
	var addProduct 		= $(	'#add-product-button'	);
	var productsPages 	= $(	'#products-pagination'	);
	var productsTable	= $(	'#products-table'		);

	//results per page
	var perPage = 2;

	//load table
	get_products(0);

	//Pagination listeners
	$(document).on('click', '#products-pagination .page', function(){
		fill_table(($(this).text()-1)*perPage);
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.next', productsPages).click(function(){
		page_next($('.active', productsPages).text());		
	});
	$('.previous', productsPages).click(function(){
		page_prev($('.active', productsPages).text());
	});

	//search bar listener
	$('input', productsSearch).keyup(function(){
		productsSearch.submit();
	});
	//search bar handler
	productsSearch.submit(function(){
		get_products_by_filter(0, productsSearch);
		return false;
	});

	/* ----------------------------
	 * Gets JSON data for products, displaying n (n = perPage) products,
	 * starting from the index, start.
	 */
	function get_products(start){
		$('tbody', productsTable).append('<tr> loading ... </tr>');
		$.get(
			'/dashboard/get_products', 
			function(data){
				console.log(data);
				jsonData = data;
				fill_table(start);
				load_pagination(jsonData.products.length);
			}, 
			'json');
	}

	/* ----------------------------
	 * Gets JSON data for products filtered with input from the 
	 * products search menu. Displays n (n = perPage) products,
	 * starting from the index, start.
	 */
	function get_products_by_filter(start, filter_form){
		$.post(
			filter_form.attr('action'), 
			filter_form.serialize(), 
			function(output){
				//console.log(output);
				jsonData = output;
				fill_table(0);
				load_pagination(jsonData.products.length);
			}, 
			'json'
		);
	}

	/* ----------------------------
	 * Fills tables with existing JSON data, (jsonData). 
	 * n (n = perPage) products are displayed, starting from 
	 * the index, start. 
	 */
	function fill_table(start){
		$('tbody', productsTable).empty();
		var i = 0;
		while(start + i < jsonData.products.length && i < perPage){
			$('tbody', productsTable).append(row(
					jsonData.products[start + i].id,
					jsonData.products[start + i].name,
					jsonData.products[start + i].inventory,
					jsonData.products[start + i].sold
				));
			i++;
		}
	}

	/* ----------------------------
	 * Loads products pagination, given the length of the JSON array
	 * returned
	 */
	 function load_pagination(length){
	 	var paginationID = productsPages;
	 	$('.page', paginationID).remove();
	 	length = Math.ceil(length/perPage);
	 	if(length > 0){
	 		$('.next', paginationID).before('<li class="page active"><a href="#">1</a></li>');
	 	}
	 	for(var i = 2; i <= length; i++){
	 		$('.next', paginationID).before('<li class="page"><a href="#">'+i+'</a></li>');
	 	}
	 }

	 /* ----------------------------
	 * Advances pagination, given the current page
	 */
	 function page_next(current){
	 	var paginationID = productsPages;
	 	var start = current*perPage; //don't need to add 1, because of 0 based indexing
	 	//check for end of pagination
		if($('.active', paginationID).nextAll().length > 1){ 
			//if not at the end, move over
			$('.active', paginationID).removeClass('active').next().addClass('active');
			fill_table(start);
		}
	 }

	 /* ----------------------------
	 * Decrements pagination, given the current page
	 */
	 function page_prev(current){
	 	var paginationID = productsPages;
	 	var start = (current - 2)*perPage; // need to subtract 2, because of 0 based indexing
	 	console.log(start);
	 	//check for end of pagination
	 	console.log($('.active', paginationID).prevAll().length);
		if($('.active', paginationID).prevAll().length > 1){
			//if not at the end, move over
			$('.active', paginationID).removeClass('active').prev().addClass('active');
			fill_table(start);
		}
	 }

	/* -------------------------------------------------------------------------------------------------
	 * Returns HTML string for an product row in the products table
	 */
	function row(id, name, inventory, sold){
		return '<tr><td>X</td><td>'+id+'</td><td>'+name+'</td><td>'+inventory+'</td><td>'+sold+'</td><td><a href="/dashboard/edit_product/'+id+'">edit</a> <a href="/dashboard/delete_product/'+id+'">delete</a></td></tr>';
	}

})(jQuery);