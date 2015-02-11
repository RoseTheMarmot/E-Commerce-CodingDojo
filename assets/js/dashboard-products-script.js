(function($){
	var jsonData = "{}";

	var productsSearch 	= $(	'#products-search-form'	);
	var addProduct 		= $(	'#add-product-button'	);
	var productsPages 	= $(	'#products-pagination'	);
	var productsTable	= $(	'#products-table'		);
	var lightbox 		= $(	'#lightbox'				);

	//results per page
	var perPage = 10;

	//load table
	get_products(0);


	/* ----------------------------
	 * Page listers and handlers
	 */

	// --- pagination ---
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

	// ---- search bar ----
	$('input', productsSearch).keyup(function(){
		productsSearch.submit();
	});
	productsSearch.submit(function(){
		get_products_by_filter(0, productsSearch);
		return false;
	});

	// --- add product button --->
	$('#add-product-button').click(function(){
		lightbox.show();
		$.get(
			'/dashboard/add_product', 
			function(data){
				$('#content', lightbox).append(data);
			}, 
			'html');
		return false;
	});

	//--- delete product ----
	productsTable.on('click', '.delete-product', function(){
		console.log($(this).attr('href'));
		$.get(
			$(this).attr('href'), 
			function(data){}, 
			'json');
		$(this).parent().parent().remove();
		return false;
	});

	// --- lightbox product edit/add box ---
	$(document).on('click', '.open-lightbox', function(){
		lightbox.show();
		$.get(
			$(this).attr('href'), 
			function(data){
				$('#content', lightbox).append(data);
			}, 
			'html');
		return false;
	});
	$(".close", lightbox).click(function(){
		closeLightbox();
	});

	// --- lightbox cancel button ----
	lightbox.on('click', '#cancel-edit-product', function(){
		closeLightbox();
		return false;
	});

	// --- lightbox preview button ----
	lightbox.on('click', '#preview-edit-product', function(){
		return false;
	});

	// --- lightbox update button ----
	lightbox.on('click', '#update-edit-product', function(){
		$('form', lightbox).submit();
	});
	/* Needs some edits in order to upload files via Ajax. 
	lightbox.on('submit', 'form', function(){
		$.post(
			$(this).attr('action'), 
			$(this).serialize(), 
			function(output){
				closeLightbox();
				get_products(0);
			}, 
			'json');
		return false;
	});
	*/

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
					jsonData.products[start + i].image,
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

	 /* ----------------------------
	 * Closes the lightbox
	 */
	 function closeLightbox(){
	 	lightbox.hide();
		$('#content', lightbox).empty();
	 }

	/* -------------------------------------------------------------------------------------------------
	 * Returns HTML string for an product row in the products table
	 */
	function row(id, image, name, inventory, sold){
		if(sold == null){
			sold = 0;
		}
		if(inventory == null){
			inventory = 0;
		}
		return '<tr><td><img src="/assets/images/'+image+'" alt="'+image+'"></td><td>'+id+'</td><td>'+name+'</td><td>'+inventory+'</td><td>'+sold+'</td><td><a class="open-lightbox" href="/dashboard/edit_product/'+id+'">edit</a> <a class="delete-product" href="/dashboard/delete_product/'+id+'">delete</a></td></tr>';
	}

})(jQuery);