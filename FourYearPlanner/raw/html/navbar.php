<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">4 Year Planner</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
<?php
//Check if logged in
if($_SESSION['loggedin']){
?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="create.php">Create Plan</a>
	</li>
	
	<!--<li class='nav-item'>
		<a class="nav-link active" aria-current="page" href="myplans.php">My Plans</a>
	</li>-->
        <li class='nav-item'><a class='nav-link active' href="profile.php">Profile</a></li>
        <li class='nav-item'><a class='nav-link active' href="majorForm.php">Change Program</a></li>
            <li class='nav-item'><a class='nav-link active' href="about.php">About Us</a></li>
	    <li class='nav-item'><a class="nav-link active" href="logout.php">Logout</a></li>

<!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $username ?></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

	    <li><a class='dropdown-item' href="profile.php">Profile</a></li>
	    <li><a class='dropdown-item' href="majorForm.php">Change Program</a></li>
            <li><a class='dropdown-item' href="about.php">About Us</a></li>
            <li><hr class="dropdown-divider"></li>
	    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
-->
<?php
}
else{
?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Create Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
<?php
}
?>
		<style>
		ul {
		background-color:#101010;
		}

		nav {
		background-color:#101010;
		}

		button {
		background-color: #e9692c;
		}

		a{
		color: #e9692c;
		}
		
		a:hover{
		color: #e9692c;
		}
		</style>	
	
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
