const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'NGN',
  minimumFractionDigits: 2
});

$(document).ready(function() {

	$('.view_commodity').click(function() {
		var commodity_id = $(this).attr('id');

		$.ajax({
			url : url,
			data : { 
				commodity_id : commodity_id,
				_token : token 
			},
			method : 'POST',
			success : function(data) {
				$('#contentDisplay').html(data);
				$('#dataShow').modal('show');
			},
			error : function(data) {
				console.log(data);
			}
		});
	});

	$('.view_sale').click(function() {
		var stock_id = $(this).attr('id');

		$.ajax({
			url : url,
			data : { 
				stock_id : stock_id,
				_token : token 
			},
			method : 'POST',
			success : function(data) {
				$('#saleDisplay').html(data);
				$('#saleData').modal('show');
			},
			error : function(data) {
				console.log(data);
			}
		});
	});

});

function stockAdd() {
	var qty = $("#qty").val();
	var comid = $('#qty').attr('data-value');
	$.ajax({
		url : cart,
		data : { 
			comid : comid,
			qty	: qty,
			_token : token 
		},
		method : 'POST',
		success : function(data) {
			if ( data.status === 'success' ) {
                swal("Good Job!", data.data, "success");
                setInterval(function() {
                	//$('#dataShow').modal('hide');
                    //window.location.reload();
                    window.location.href = basket;
                }, 1000);
            }
		},
		error : function(data) {
			console.log(data);
		}
	});
}

function removeRow(value)
{

	var rowUrl = "cart/remove/commodities/"+value;

	$.ajax({

		url : rowUrl,
        method : 'POST',
        dataType : 'json',
        data : { 
            commodity 	: value, 
            _token 		: token 
        },
        success : function(data) {
            if ( data.status === 'success' ) {
                swal("Good Job!", data.data, "success");
                setInterval(function() {
                    window.location.reload();
                }, 1000);
            }
        },
        error : function(data) {
            if ( data.status === 422 ) {
                swal("Oops!", data.data, "error");
            }
        }
	});



}

function updateSub() {
	var comm_id = $('#qty').attr('data-value');
	var qty = $('#qty').val();

	$.ajax({
		url : cartUrl,
		data : { 
			comm_id : comm_id,
			_token : token,
			qty : qty 
		},
		method : 'POST',
		success : function(data) {
		var result = data;
			$('#handling').html(formatter.format(result.data[0]));
			$('#subtotalDisplay').html(formatter.format(result.data[1]));
			$('#trans').html(formatter.format(result.data[2]));
			$('#farmCharges').html(formatter.format(result.data[3]));
			$('#price').html(formatter.format(result.data[4]));
		},
		error : function(data) {
			console.log(data);
		}
	});
}

function updateSale() {
	var stock = $('#saleQty').attr('data-value');
	var qty = $('#saleQty').val();

	$.ajax({
		url : saleUrl,
		data : { 
			stock : stock,
			_token : token,
			qty : qty 
		},
		method : 'POST',
		success : function(data) {
			var result = data;
			$('#subtotal').html(formatter.format(result.data[0]));
			$('#saleTrans').html(formatter.format(result.data[1]));
			$('#charges').html(formatter.format(result.data[2]));
			$('#salePrice').html(formatter.format(result.data[3]));
			$('#storage').html(formatter.format(result.data[4]));
		},
		error : function(data) {
			console.log(data);
		}
	});
}