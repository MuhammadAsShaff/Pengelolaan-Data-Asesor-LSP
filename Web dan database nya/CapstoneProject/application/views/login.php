<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengelolaan Data Asesor</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #4e73df;
    }

    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-form {
      width: 400px;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      color: #4e73df;
    }

    .login-form .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-form .logo img {
      max-width: 200px;
    }

    .login-form .form-group {
      margin-bottom: 20px;
    }

    .login-form .form-group label {
      font-weight: bold;
    }

    .login-form .form-control {
      border-radius: 5px;
    }

    .login-form .btn-login {
      background-color: #4e73df;
      border-color: #4e73df;
      color: #ffffff;
    }

    .login-form .btn-login:hover {
      background-color: #224abe;
      border-color: #224abe;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-form">
      <div class="logo">
        <img src="<?php echo base_url('Assets/img/logolsp.png') ?>" alt="Logo">
      </div>
      <form action="<?php echo base_url('login/checking') ?>" class="user" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email...">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
        </div>
        <button type="submit" class="btn btn-primary btn-login btn-block">Login</button>
      </form>
    </div>
  </div>

  <script src="<?php echo base_url('Assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('Assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>