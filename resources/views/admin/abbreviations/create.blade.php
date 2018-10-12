@extends('layouts.admin')
@section('title', 'Farmties | Create Abbreviation')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header">
	            <h4 class="title">Create New Abbreviation</h4>
	        </div>
	        <div class="content">
	        	<form action="{{ route('abbreviations.store') }}" method="POST">
	        		@csrf

	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
	        					<label for="commodity_id">Commodities</label>
	        					<select name="commodity_id" class="form-control">
	        						<option value="">Select a Commodity</option>
	        						@foreach($commodities as $commodity)
	        							<option value="{{ $commodity->id }}">
	        								{{ $commodity->name }}
	        							</option>
	        						@endforeach
	        					</select>
	        				</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
	        					<label for="region_id">Regions</label>
	        					<select name="region_id" class="form-control">
	        						<option value="">Select a Region</option>
	        						@foreach($regions as $region)
	        							<option value="{{ $region->id }}">
	        								{{ $region->region . ' (' . $region->abb . ')' }}
	        							</option>
	        						@endforeach
	        					</select>
	        				</div>
	        			</div>
	        		</div>

	        		<div class="row">
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="MaxP">Maximum Price</label>
			        			<input type="text" name="MaxP" class="form-control" placeholder="Enter Region Name">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="MinP">Minimum Price</label>
			        			<input type="text" name="MinP" class="form-control" placeholder="Enter Region Name">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="AveP">Average Price</label>
			        			<input type="text" name="AveP" class="form-control" placeholder="Enter Region Name">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="CHG">Change per week(%) </label>
			        			<input type="text" class="form-control" name="CHG" placeholder="Enter Short Name">
			        		</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<button type="submit" class="btn btn-fill btn-primary">
	        					Create Abbreviation
	        				</button>
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>
@stop