<div id="crud-user" id="crud-record">
  <div class="container-fluid">
    <div  class="col-md-4">
    <h2>Create or Update Record</h2>
    <div class="form-group">
        <label for="inputTitle">Title</label>
        <input type="text" class="form-control" id="recordInputTitle" placeholder="Enter record's title">
      </div>
      <div class="form-group">
        <label for="recordInputContent">Content</label>
        <textarea class="form-control" id="recordInputContent" rows="10" charswidth="23" style="resize:vertical"></textarea>
      </div>
      <button type="submit" id="createRecord" class="btn btn-primary">Create</button>
      <button type="submit" id="updateRecord" class="btn btn-primary">Update</button>
  </div>

    <div  class="col-md-4">
      <h2>Find or Delete Record</h2>
      <div class="form-group">
        <label for="recordFindDeleteTitle">Record Id</label>
        <input type="text" class="form-control" id="recordFindDeleteTitle" placeholder="Enter records's title">
      </div>
      <button type="submit" id="findRecord" class="btn btn-primary">Find</button>
      <button type="button" id="findUpdateRecord" class="btn btn-primary">Find and Update</button>
      <button type="submit" id="deleteRecord" class="btn btn-danger">Delete</button>
    </div> 
    <div class="col-md-4">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">title</th>
          <th scope="col">content</th>
        </tr>
      </thead>
      <tbody id="recordTable">

    
      </tbody>
      </table>
    </div>
  </div>
</div>

<script type="module" src="/src/js/crud_records.js"></script>  