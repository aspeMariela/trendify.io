<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trendify</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  <style>
        .cd {
            height: 350px;
            border-radius: 5px;
            margin: 40px 20px;
            padding: 30px 50px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .1);
        }
        .rounded-circle {
            width: 150px;
            height: 150px;
        }
        .img-container {
            height: 600px;
            margin-top: 0px;
        }
        #shownow {
            padding-top: 0px;
        }
        #about {
        padding-top: 70px;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <h2 style="color: white;">Trendify</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#shownow" style="color: white;">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#team" style="color: white;">Team</a></li>
        <li class="nav-item"><a class="nav-link" href="#about" style="color: white;">Sign Up</a></li>

      </ul>
    </div>
  </div>
</nav>

  <div class="container" id="shownow">
    <div class="row m-0">
      <div class="col-12 col-xl-6 p-5">
        <h2 class="fs-1 text-capitalize">Explore Our Collection</h2>
        <p class="fs-5 py-5">Discover our wide selection of jackets. From casual everyday wear to statement pieces for special occasions, you'll find the perfect jacket to complement your wardrobe. Visit our shop page to browse our latest arrivals and bestsellers.
        <br><br>At Trendify, we specialize in providing high-quality jackets that blend style, comfort, and functionality. Our mission is to offer a diverse range of jackets that cater to every individual's unique taste and lifestyle. Whether you're looking for a sleek leather jacket, a cozy winter parka, or a versatile bomber jacket, we have something for everyone.
        </p>
        <a href="#about"><button type="button" class="btn btn-info btn-lg">Learn more</button></a>
      </div>
      <div class="col-12 col-xl-6 p-10 d-flex justify-content-center">
        <img src="image/img1.png" alt="image" class="img-fluid w-75 shadow" style="height: 600px;">
      </div>
    </div>
  </div>

  <div class="py-5" id="team"></div>
  <div class="container">
    <h2 class="text-capitalize text-center fs-1 mb-5">Our team</h2>
    <p class="w-50 m-auto text-center">Our team leverages diverse skill sets ranging from web development and graphic design to project management and marketing. Each member brings a unique perspective and expertise, ensuring that we deliver a website that is not only functional and user-friendly but also visually appealing and engaging.</p>
    <div class="row g-4 py-5 justify-content-center">

    <div class="col-lg-2 mb-3 mb-sm-0">
        <div class="card shadow text-center bg-dark text-light d-flex align-items-center">
          <img src="image/aspe.jpg" class="rounded-circle m-3" alt="image" style="width: 150px; height: 150px;">
          <div class="card-body p-4">
            <h5 class="card-title">Aspe Mariela</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-2 mb-3 mb-sm-0">
        <div class="card shadow text-center bg-dark text-light d-flex align-items-center">
          <img src="image/hadji.jpg" class="rounded-circle m-3" alt="image" style="width: 150px; height: 150px;">
          <div class="card-body p-4">
            <h5 class="card-title">San Hadji</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-2 mb-3 mb-sm-0">
        <div class="card shadow text-center bg-dark text-light d-flex align-items-center">
          <img src="image/denzell.jpg" class="rounded-circle m-3" alt="image" style="width: 150px; height: 150px;">
          <div class="card-body p-4">
            <h5 class="card-title">Denzell Alvarez</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-2 mb-3 mb-sm-0">
        <div class="card shadow text-center bg-dark text-light d-flex align-items-center">
          <img src="image/alwin.jpg" class="rounded-circle m-3" alt="image" style="width: 150px; height: 150px;">
          <div class="card-body p-4">
            <h5 class="card-title">Alwin Loterte</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-2 mb-3 mb-sm-0">
        <div class="card shadow text-center bg-dark text-light d-flex align-items-center">
          <img src="image/hanna.jpg" class="rounded-circle m-3" alt="image" style="width: 150px; height: 150px;">
          <div class="card-body p-4">
            <h6 class="card-title">Hanna Somblingo</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-light py-5" >
  <div class="container" id="about">
    <div class="row m-0">
      <div class="col-lg-6 col-md-6">
        <div class="cd">
          <h1 class="form-title text-center">Register</h1>
          <form method="post" action="user_register.php" class="form-area">
            <div class="mb-3">
              <label for="registerEmail" class="form-label">Email</label>
              <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Password</label>
              <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-flex justify-content-center">
              <input type="submit" class="btn btn-info" value="Register" name="register" style="width: 200px;">
            </div>
          </form>
        </div>
      </div>



      <div class="col-12 col-xl-6 p-5">
          <h2 class="fs-1 text-capitalize mb-5">Start Shopping for Your Favorite Jackets!</h2>
          <p class="fs-4">
            Join Trendify today and discover a world of stylish and premium jackets tailored just for you. Log in to access exclusive collections, special offers, and a seamless shopping experience. Don't miss out on the latest trends and must-have jackets—start shopping now!
          </p>
        </div>
       
    </div>
  </div>
  </div>

</body>
</html>
