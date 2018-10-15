<!-- Modal -->
<div class="modal fade" id="Modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" data-toogle="validator">
          @csrf {{ method_field('POST') }}
          <div class="form-group">
              <input type="hidden" name="id" id="id">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="name">
            
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email </label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Religion</label>
            <select class="form-control" id="religion" name="religion">
              <option value="Select">--Select--</option>
              <option value="Sikh">Sikh</option>
              <option value="Christian">Christian</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddhism">Buddhism</option>
              <option value="Others">Others</option>
            </select>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="insertbutton"></button>
      </div>
    </form>
    </div>
  </div>
</div>