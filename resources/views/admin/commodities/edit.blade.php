@extends('layouts.admin')
@section('title', 'Farmties | Edit Commodity')
@section('content')

<div class="row">
    <form action="{{ route('commodities.update', $commodity->id) }}" method="POST" enctype="multipart/form-data">

      @method('PATCH')
      @csrf

      <div class="editsection">
        <div class="edit-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Commodity Name</label>
                <input type="text" name="name" class="form-control" value="{{ $commodity->name }}" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="price">Price/Metric Tone</label>
                <input type="number" name="price" class="form-control" required min="1000" value="{{ $commodity->prices->last()->price }}">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="path">New Image Upload (optional)</label>
                <input type="file" name="path" id="path" class="form-control">
              </div>
            </div>
          </div>
        </div>

        <div class="editfooter">
          <a href="{{ route('commodities.index') }}" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        
      </div>

    </form>
</div>
@stop