<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">

    <form action="{{ route('commodities.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add a Commodity</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Commodity Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name here" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="path">Upload Image</label>
                <input type="file" name="path" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="price">Price/Metric Tone</label>
                <input type="number" name="price" class="form-control" required min="1000">
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        
      </div>

    </form>

  </div>
</div>