  <nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white">
      <div class="container">
        <h1 class="mb-0 h5 py-1 mr-3">
          <a class="navbar-brand">
            <img
              src="img/logo.jfif"
              width="30"
              height="30"
              class="d-inline-block align-top"
              alt=""
            />
            Electronic Booking System </a
          >
        </h1>
       
       
        <?php if(isset($_GET['auth']) &&  $_GET['auth'] == 'admin'){
            echo ' <a
            href="login.php?auth=admin"
            class="btn btn-outline-light py-1 ml-auto mx-sm-0 order-0 order-sm-last"
          >Admin Login</a>';
        }else{
          echo ' <a
          href="login.php"
          class="btn btn-outline-light py-1 ml-auto mx-sm-0 order-0 order-sm-last"
        >Login</a>';
        }
          ?>
        
        <button
          class="navbar-toggler ml-3"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php 
            if(isset($_SESSION["login"])){ 
              include("include/sub-header.php"); 
            } 
              
            ?>
          
          </ul>
        </div>
      </div>
    </nav>

    <script>
      
      //get current filename
var fileName = window.location.pathname.split('/').pop();
console.log(fileName);

//get the href that is = active 
var link = document.querySelector('a[href="' +fileName + '"]');
// var link = document.querySelector(`a[href="${fileName}"]`);


// add active class to it
link.classList.add('active')
    </script>