
<form action="{{ route('make.sale', $stock->id) }}" method="POST">
	@csrf
	@method('PATCH')

	<div class="modal-header">
		<h5 class="modal-title" id="commodityModalTitle">{{ $stock->commodity->name }}</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-4">
				<img src="{{ asset('images/commodities/'.$stock->commodity->path) }}" alt="" class="img-fluid">
			</div>
			<div class="col-8">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Features</th>
							<th>Amout</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Price/MT</td>
							<td><span id="salePrice" data-value="{{ $stock->commodity->prices->last()->price }}">-</span></td>
						</tr>
						<tr>
							<td>Transaction Fee</td>
							<td><span id="saleTrans" data-value="1000">-</span></td>
						</tr>
						<tr>
							<td>Storage Fee / Monthly Charge</td>
							<td><span id="storage" data-value="500">-</span></td>
						</tr>
						<tr>
							<td>Select No. of MT</td>
							<td>
								<input type="number" id="saleQty" data-value="{{ $stock->id }}" class="form-control" min="1" name="qty" placeholder="1" onchange="updateSale()">
							</td>
						</tr>
						<tr>
							<td>Farmties Charges</td>
							<td><span id="charges">-</span></td>
						</tr>
						<tr>
							<td><strong>SUBTOTAL:</strong></td>
							<td><strong><span id="subtotal">-</span></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Sell Commodity</button>
	</div>
	
</form>