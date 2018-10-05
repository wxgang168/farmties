<div class="modal-header">
	<h5 class="modal-title" id="commodityModalTitle">{{ $commodity->name }}</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-4">
			<img src="{{ asset('images/commodities/'.$commodity->path) }}" alt="" class="img-fluid">
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
						<td><span id="price" data-value="{{ nairafy($commodity->prices->last()->price) }}">-</span></td>
					</tr>
					<tr>
						<td>Transaction Fee</td>
						<td><span id="trans" data-value="1000">-</span></td>
					</tr>
					<tr>
						<td>Storage Fee / Monthly Charge</td>
						<td><span id="storageP" data-value="500">-</span></td>
					</tr>
					<tr>
						<td>Handling Fee/MT</td>
						<td><span id="handling">-</span></td>
					</tr>
					<tr>
						<td>Select No. of MT</td>
						<td>
							<input type="number" id="qty" data-value="{{ $commodity->id }}" class="form-control" min="1" name="qty" placeholder="1" onchange="updateSub()">
						</td>
					</tr>
					<tr>
						<td>Farmties Charges</td>
						<td><span id="farmCharges">-</span></td>
					</tr>
					<tr>
						<td><strong>SUBTOTAL:</strong></td>
						<td><strong><span id="subtotalDisplay">-</span></strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" onclick="stockAdd();" class="btn btn-primary">Add to Basket</button>
</div>