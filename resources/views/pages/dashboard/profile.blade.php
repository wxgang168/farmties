@extends('layouts.dashboard')
@section('title', 'Farmties | Profile')
@section('header')
	<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">Account Profile</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('user.dashboard') }}">Dashboard</a>
					</li>
					<li class="breadcrumb-item active">
						Account Profile
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
	<div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="{{ route('user.dashboard') }}">Trade Commodities</a></div>
	</div>
@stop
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <!-- User Profile -->
        <section class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <form class="form-horizontal form-user-profile row mt-2" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                	@csrf

                                    <div class="col-4">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="bank" required autofocus="" name="bank">
                                            <label for="bank">Bank Name</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-4">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="account_no"required="" autofocus="" name="account_no">
                                            <label for="account_no">Account Number</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-4">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="mobile"required="" autofocus="" name="mobile">
                                            <label for="mobile">Mobile</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="address" name="address" required="" autofocus="">
                                            <label for="address">Residential Address</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="office" name="office" required="" autofocus="">
                                            <label for="office">Office Address</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-5">
                                        <fieldset class="form-label-group">
                                            <input type="file" class="form-control" id="path" name="path">
                                            <label for="path">Upload Image</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-7">
                                        <fieldset class="form-label-group">
                                            <input type="file" class="form-control" id="identity" name="identity">
                                            <label for="identity">Upload Valid ID (Int. Passport, Drivers License, Voters Card)</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn-gradient-primary my-1">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop