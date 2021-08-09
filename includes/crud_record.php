<div id="crud-user" id="crud-record">
  <div class="container-fluid">
    <div  class="col-md-4">
    <h2>Create or Update Record</h2>
    <div class="form-group">
        <label for="inputTitle">Title</label>
        <input type="text" class="form-control" id="inputTitle" placeholder="Enter record's title">
      </div>
      <div class="form-group">
        <label for="inputFirstName">Content</label>
        <textarea class="form-control" id="exampleContentArea" rows="10" charswidth="23" style="resize:vertical"></textarea>
      </div>
      <button type="submit" id="create_user" class="btn btn-primary">Create</button>
      <button type="submit" id="update_user" class="btn btn-primary">Update</button>
  </div>

    <div  class="col-md-4">
      <h2>Find or Delete Record</h2>
      <div class="form-group">
        <label for="inputRecordFindDelete">Record title</label>
        <input type="text" class="form-control" id="inputRecordFindDelete" placeholder="Enter records's title">
      </div>
      <button type="submit" id="findRecord" class="btn btn-primary">Find</button>
      <button type="button" id="findUpdateRecord" class="btn btn-primary">Find and Update</button>
      <button type="submit" id="deleteRecord" class="btn btn-danger">Delete</button>
    </div> 
  </div>
</div>

<script src="/src/js/crud_records.js"></script>  