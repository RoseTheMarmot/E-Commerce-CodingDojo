(function($){
	var jsonData = "{}";

	var ordersSearch 	= $(	'#orders-search-from'	);
	var ordersFilter 	= $(	'#orders-filter-from'	);
	var ordersPages 	= $(	'#orders-pagination'	);
	var ordersTable		= $(	'#orders-table'			);

	var perPage = 10;

	get_orders_json(0);

	$(document).on('click', '#orders-pagination .page', function(){
		fill_table(($(this).text()-1)*perPage);
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
	 	$('.page', ordersPages).remove();
	 	for(var i = 1; i <= length/perPage; i++){
	 		$('.next', ordersPages).before('<li class="page"><a href="#">'+i+'</a></li>');
	 	}
	 }


	/* -------------------------------------------------------------------------------------------------
	 * Returns HTML string for an order row in the orders table
	 */
	function order_row(id, firstName, lastName, createdAt, address, address2, city, state, total, status){
		return '<tr><td>'+id+'</td><td>'+firstName+' '+lastName+'</td><td>'+createdAt+'</td><td>'+address+' '+address2+' '+city+', '+state+'</td><td>'+total+'</td><td>'+status+'</td></tr>';
	}


})(jQuery);