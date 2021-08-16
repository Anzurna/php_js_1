<div id="crud-users" id="crud-users">
  <div class="container-fluid">
    <div  class="col-md-4">
      <h2>Create or Update User</h2>
      <div class="form-group">
        <label for="inputLogin">Login</label>
        <input type="text" class="form-control" id="inputLogin" placeholder="Enter user's login">
      </div>
      <div class="form-group">
        <label for="inputFirstName">First name</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter user's first name">
      </div>
      <div class="form-group">
        <label for="inputLastName">Last name</label>
        <input type="text" class="form-control" id="inputLastName" placeholder="Enter user's last name">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Enter user's email">
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Enter user's password">
      </div>
      <button type="submit" id="create_user" class="btn btn-primary">Create</button>
      <button type="submit" id="update_user" class="btn btn-primary">Update</button>
    </div>

    <div class="col-md-4">
      <h2>Find or Delete User</h2>
      <div class="form-group">
        <label for="inputEmailFindDelete">User login</label>
        <input type="text" class="form-control" id="inputEmailFindDelete" placeholder="Enter user's email">
      </div>
      <button type="submit" id="find_user" class="btn btn-primary">Find</button>
      <button type="button" id="find_update_user" class="btn btn-primary">Find and Update</button>
    </div> 
    
    <div class="col-md-4" style="height: 500px;overflow: auto">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">login</th>
          <th scope="col">first name</th>
          <th scope="col">last name</th>
          <th scope="col">email</th>
        </tr>
      </thead>
      <tbody id="userTable">

    
      </tbody>
      </table>
    </div>
  </div>
</div>

<script type="module" src="/src/js/crud_users.js"></script>  