<nav class="navbar navbar-inverse navbar_recolored">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand active" href="/">SmolCRM</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="nav-link nav-menu-element <?php if ($CURRENT_PAGE == "administration") {?>active<?php } ?>"><a href="/p/administration.php">Administration</a></li>
              <li class="nav-link nav-menu-element <?php if ($CURRENT_PAGE == "records") {?>active<?php } ?>"><a href="/p/records.php">Records</a></li>
              <li class="nav-link nav-menu-element <?php if ($CURRENT_PAGE == "user") {?>active<?php } ?>"><a href="/p/user.php">User</a></li>
            </ul>
        
          </div>
        </div>
</nav>