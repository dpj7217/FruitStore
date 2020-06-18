<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/FruitStore/index.php">FruitStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/FruitStore/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a id="login" class="nav-link" href="/FruitStore/presentation/loginRegister.php">Login or Register</a>
        <a id="logout" class="nav-link" href="/FruitStore/business/logoutHandler.php">Logout</a>
      </li>
      <li>
      	<a id="userDetails" class="nav-link" href="/FruitStore/presentation/userDetails.php">My Account</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/FruitStore/presentation/users.php">All Users</a>
          <a class="dropdown-item" href="/FruitStore/presentation/addUser.php">Add User</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/FruitStore/presentation/products.php">All Products</a>
          <a class="dropdown-item" href="/FruitStore/presentation/addProduct.php">Add Product</a>
        </div>
      </li>
      
    </ul>
    <ul class="nav navbar-nav " style="margin-right: 10px;">
      <li style="float: right;">
      	<a id="cart" class="nav-link" href="/FruitStore/presentation/cart.php">
      		<img src="/FruitStore/presentation/images/cart_image3.jpg" id=cartimg alt="My Cart" width=40 height=40 style="background-color: rgb(52, 58, 64);">
      	</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/FruitStore/business/getSearchResults.php" method="GET">
      <input class="form-control mr-sm-2" id="q" name="q" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
