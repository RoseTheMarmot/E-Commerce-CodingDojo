(function($){
	var jsonData = "{}";

	var ordersSearch 	= $(	'#orders-search-form'	); 
	var ordersFilter 	= $(	'#orders-filter-form'	); 
	var ordersPages 	= $(	'#orders-pagination'	);
	var ordersTable		= $(	'#orders-table'			);

	//results per page
	var perPage = 10;

	//load table
	get_orders(0);

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

	//filter orders listener
	$('select', ordersFilter).change(function(){
		if($(this).val() == "show all"){
			get_orders(0);
		}else{
			ordersFilter.submit();
		}	
	});
	//filter orders handler
	ordersFilter.submit(function(){
		get_orders_by_filter(0, ordersFilter);
		return false;
	});

	//search bar listener
	$('input', ordersSearch).keyup(function(){
		ordersSearch.submit();
	});
	//search bar handler
	ordersSearch.submit(function(){
		get_orders_by_filter(0, ordersSearch);
		return false;
	});

	//table form listener
	$(document).on('change', '#orders-table form select', function(){
		$(this).parent().submit();
	});
	$(document).on('submit', '#orders-table form', function(){
		//console.log($(this).attr('action'));
		//console.log($(this).serialize);
		$.post(
			$(this).attr('action'), 
			$(this).serialize(), 
			function(output){}, 
			'json'
		);
		return false;
	});

	/* ----------------------------
	 * Gets JSON data for orders, displaying n (n = perPage) orders,
	 * starting from the index, start.
	 */
	function get_orders(start){
		$('tbody', ordersTable).append('<tr> loading ... </tr>');
		$.get(
			'/dashboard/get_orders', 
			function(data){
				jsonData = data;
				fill_table(start);
				load_pagination(data.orders.length);
			}, 
			'json');
	}

	/* ----------------------------
	 * Gets JSON data for orders filtered with input from the 
	 * orders filter menu. Displays n (n = perPage) orders,
	 * starting from the index, start.
	 */
	function get_orders_by_filter(start, filter_form){;
		$.post(
			filter_form.attr('action'), 
			filter_form.serialize(), 
			function(output){
				jsonData = output;
				fill_table(0);
				load_pagination(jsonData.orders.length);
			}, 
			'json'
		);
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
			$('tbody', ordersTable).append(row(
					jsonData.orders[start+i].id,
					jsonData.orders[start+i].first_name,
					jsonData.orders[start+i].last_name,
					jsonData.orders[start+i].created_at,
					jsonData.orders[start+i].address,
					jsonData.orders[start+i].address2,
					jsonData.orders[start+i].city,
					jsonData.orders[start+i].state,
					jsonData.orders[start+i].zipcode,
					jsonData.orders[start+i].total,
					jsonData.orders[start+i].status
				));
			i++;
		}
	}
	//post version, doesn't work as well
	/*
	function fill_table(start){
		$('tbody', ordersTable).empty();
		var i = 0;
		while(start + i < jsonData.orders.length && i < perPage){
			$('tbody', ordersTable).append('<tr id="row-'+i+'"></tr>');
			i++;
		}
		var j = 0;
		while(start + j < jsonData.orders.length && j < perPage){ 
			//console.log(j);
			var rowReplace = $('#row-'+j, ordersTable);
			//console.log(rowReplace);
			$.post(
				'/dashboard/order_rows', 
				jsonData.orders[start + j], 
				function(output){
					var id = $(output).attr('id');
					var toReplace = $("#"+id, ordersTable);
					$("#"+id, ordersTable).replaceWith(output);
				}, 
				'html'
			);
			j++;
		}
	}	
	*/

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

	 /* ----------------------------
	 * Returns and html row for the table
	 */
	 function row(id, first_name, last_name, created_at, address, address2, city, state, zipcode, total, status){
	 	$.get(
	 		'/dashboard/order_status_select/'+status+'/'+id, 
	 		function(data){
	 			$('#row-'+id+' .status').append(data);
	 		}, 
	 		'html');
	 	return '<tr id="row-'+id+'"><td><a href="/orders/show/'+id+'">'+id+'</a></td><td>'+first_name+' '+last_name+'</td><td>'+created_at+'</td><td>'+address+' '+address2+' '+city+', '+state+' '+zipcode+'</td><td>'+total+'</td><td class="status"></td></tr>';
	 }

})(jQuery);



