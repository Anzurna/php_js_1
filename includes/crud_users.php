<!-- <div id="crud-user" id="crud-user">
  <div class="container-fluid">
    <form method="POST"  class="col-md-4">
    <h2>Create User</h2>
    <div class="form-group">
        <label for="inputLogin">Login</label>
        <input type="text" class="form-control" id="inputLogin" placeholder="Enter user login">
      </div>
      <div class="form-group">
        <label for="inputFirstName">First name</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter user first name">
      </div>
      <div class="form-group">
        <label for="inputLastName">Last name</label>
        <input type="text" class="form-control" id="inputLastName" placeholder="Enter user last name">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Enter user's email">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <form method="POST"  class="col-md-4">
      <h2>Find User</h2>
      <div class="form-group">
        <label for="inputFirstName">User login</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter your first name">
      </div>
      <button type="submit" class="btn btn-primary">Find</button>
    </form>

    <form method="POST"  class="col-md-4">
      <div class="form-group">
        <h2>Delete User</h2>
        <label for="inputFirstName">User Login</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter user login">
      </div>
      <button type="submit" class="btn btn-primary">Delete</button>
    </form>

    <form method="POST"  class="col-md-4">
      <div class="form-group">
        <label for="inputFirstName">First name</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="Enter your first name">
      </div>
      <div class="form-group">
        <label for="inputLastName">Last name</label>
        <input type="text" class="form-control" id="inputLastName" placeholder="Enter your last name">
      </div>
      <button type="submit" class="btn btn-primary">Add user</button>
    </form>
  </div>
</div> -->

<div id="crud-user" id="crud-user">
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
      <button type="submit" id="create_user" class="btn btn-primary">Create</button>
      <button type="submit" id="update_user" class="btn btn-primary">Update</button>
  </div>

    <div  class="col-md-4">
      <h2>Find or Delete User</h2>
      <div class="form-group">
        <label for="inputLoginFindDelete">User login</label>
        <input type="text" class="form-control" id="inputLoginFindDelete" placeholder="Enter user's login">
      </div>
      <button type="submit" id="find_user" class="btn btn-primary">Find</button>
      <button type="button" id="find_update_user" class="btn btn-primary">Find and Update</button>
      <button type="submit" id="delete_user" class="btn btn-danger">Delete</button>
    </div> 
  </div>
</div>

<script type="module" src="/src/js/crud_users.js"></script>  