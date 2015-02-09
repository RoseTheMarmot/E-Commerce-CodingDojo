(function($){
	var jsonData = "{}";

	var ordersSearch 	= $(	'#orders-search-from'	); 
	var ordersFilter 	= $(	'#orders-filter-from'	); 
	var ordersPages 	= $(	'#orders-pagination'	);
	var ordersTable		= $(	'#orders-table'			);

	//results pre page
	var perPage = 3;

	//load table
	get_orders_json(0);

	//Pagination listeners
	$(document).on('click', '#orders-pagination .page', function(){
		fill_table(($(this).text()-1)*perPage);
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.next', ordersPages).click(function(){
		page_next($('.active', ordersPages).text());		
	});
	$('.previous', ordersPages).click(function(){
		page_prev($('.active', ordersPages).text());
	});

	/* ----------------------------
	 * Gets JSON data for orders, displaying n (n = perPage) orders,
	 * starting from the index, start.
	 */
	function get_orders_json(start){
		$('tbody', ordersTable).append('<tr> loading ... </tr>');
		$.get(
			'/dashboard/get_orders', 
			function(data){
				console.log(data);
				jsonData = data;
				fill_table(start);
				load_pagination(data.orders.length);
			}, 
			'json');
	}

	/* ----------------------------
	 * Fills tables with existing JSON data, (jsonData). 
	 * n (n = perPage) orders are displayed, starting from 
	 * the index, start. 
	 */
	function fill_table(start){
		$('tbody', ordersTable).empty();
		var i = 0;
		while(start + i < jsonData.orders.length && i < perPage){
			$('tbody', ordersTable).append(order_row(
					jsonData.orders[start + i].id,
					jsonData.orders[start + i].first_name,
					jsonData.orders[start + i].last_name,
					jsonData.orders[start + i].created_at,
					jsonData.orders[start + i].address,
					jsonData.orders[start + i].address2,
					jsonData.orders[start + i].city,
					jsonData.orders[start + i].state,
					jsonData.orders[start + i].total,
					jsonData.orders[start + i].status
				));
			i++;
		}
	}

	/* ----------------------------
	 * Loads orders pagination, given the length of the JSON array
	 * returned
	 */
	 function load_pagination(length){
	 	var paginationID = ordersPages;
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
	 	var paginationID = ordersPages;
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
	 	var paginationID = ordersPages;
	 	var start = (current - 2)*perPage; // need to subtract 2, because of 0 based indexing
	 	//check for end of pagination
		if($('.active', paginationID).prevAll().length > 1){
			//if not at the end, move over
			$('.active', paginationID).removeClass('active').prev().addClass('active');
			fill_table(start);
		}
	 }

	/* -------------------------------------------------------------------------------------------------
	 * Returns HTML string for an order row in the orders table
	 */
	function order_row(id, firstName, lastName, createdAt, address, address2, city, state, total, status){
		return '<tr><td>'+id+'</td><td>'+firstName+' '+lastName+'</td><td>'+createdAt+'</td><td>'+address+' '+address2+' '+city+', '+state+'</td><td>'+total+'</td><td>'+status+'</td></tr>';
	}

})(jQuery);