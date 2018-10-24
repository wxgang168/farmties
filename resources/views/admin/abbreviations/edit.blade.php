@extends('layouts.admin')
@section('title', 'Farmties | Edit Abbreviation')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header">
	            <h4 class="title">Edit Abbreviation</h4>
	        </div>
	        <div class="content">
	        	<form action="{{ route('abbreviations.update', $abbreviation->id) }}" method="POST">
	        		@csrf
	        		@method('PATCH')

	        		<div class="row">

	        			<div class="col-md-6">
	        				<div class="form-group">
	        					<label for="commodity_id">Commodities</label>
	        					<select name="commodity_id" class="form-control">
	        						<option value="">Select a Commodity</option>
	        						@foreach($commodities as $commodity)
	        							@if($commodity->id === $abbreviation->commodity->id)
		        							<option value="{{ $commodity->id }}" selected>
		        								{{ $commodity->name }}
		        							</option>
	        							@else
		        							<option value="{{ $commodity->id }}">
		        								{{ $commodity->name }}
		        							</option>
	        							@endif
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
	        							@if($region->id === $abbreviation->region->id)
		        							<option value="{{ $region->id }}" selected>
		        								{{ $region->region . ' (' . $region->abb . ')' }}
		        							</option>
	        							@else
		        							<option value="{{ $region->id }}">
		        								{{ $region->region . ' (' . $region->abb . ')' }}
		        							</option>
	        							@endif
	        						@endforeach
	        					</select>
	        				</div>
	        			</div>
	        		</div>

	        		<div class="row">
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="MaxP">Maximum Price</label>
			        			<input type="text" name="MaxP" class="form-control" value="{{ $abbreviation->MaxP }}">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="MinP">Minimum Price</label>
			        			<input type="text" name="MinP" class="form-control" value="{{ $abbreviation->MinP }}">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="AveP">Average Price</label>
			        			<input type="text" name="AveP" class="form-control" value="{{ $abbreviation->AveP }}">
			        		</div>
	        			</div>
	        			<div class="col-md-3">
	        				<div class="form-group">
			        			<label for="CHG">Change per week(%) </label>
			        			<input type="text" class="form-control" name="CHG" value="{{ $abbreviation->CHG }}">
			        		</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-12">
	        				<button type="submit" class="btn btn-fill btn-primary">
	        					Edit Abbreviation
	        				</button>
	        			</div>
	        		</div>
	        	</form>
	        </div>
		</div>
	</div>
</div>
@stop