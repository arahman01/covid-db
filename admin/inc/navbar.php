<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo ROOT_URL.'index.php'?>">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
    
    <!-- <li class="nav-item active"> -->
      <li  class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL.'index.php'?>">All Tables<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL.'addpatients.php'?>">Add Patient</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL.'addtest.php'?>">Add Tests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL.'addclosecase.php'?>">Add Case Closed</a>
      </li>
      
    </ul><form class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href = "../index.php">Front End</a>
    </form>
    </div>
</nav>