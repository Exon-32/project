<?php
session_start();
require_once 'db_config.php';
require_once 'admin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    

    body {
      display: flex;
      justify-content: center;
      position: relative;
    height: 100vh;
    width: 100%;
      font-family: "Poppins", sans-serif;
      font-size: 1.7rem;
      background-image: url("image/b2.jpg");
      background-size: cover;
    background-position: center;
    margin: 0;

    }

    main {
      max-width: 350px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .intro {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 100%;
      margin-bottom: 3rem;
    }

    .title {
      padding: 1rem;
      font-size: 1.75rem;
    }

    .sign-up {
      width: 100%;
    }

    .sign-up-para {
      padding: 1rem 5rem;
      margin-bottom: 1.75rem;
      border-radius: 0.8rem;
      font-size: 1.5rem;
      box-shadow: 0 8px 0px rgba(113, 112, 110, 0.15);
      background-color: #8951e3;
      text-align: center;
    }

    .sign-up-form {
      width: auto;
      height: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 1.2rem;
      border-radius: 0.8rem;
      box-shadow: 0 8px 0px rgba(0 0 0/0.15);
      color: #b9b6d3;
      background-color: white;
    }

    .form-input {
      width: 100%;
      margin-bottom: 0;
      position: relative;

    }

    .form-input span {
      position: absolute;
      top: 10%;
      right: 0;
      padding: 0 0.65em;
      border-radius: 50%;
      background-color: #ff7a7a;
      color: white;
      display: none;
    }


    .form-input input {
      width: calc(100% - 20px);
      padding: 10px;
      border: 2px solid rgba(185, 182, 211, 0.25);
      border-radius: 0.5em;
      font-weight: 600;
      color: #3e3c49;
      margin-top: 40px;
      margin-bottom: auto;
    }

    .form-input input:focus {
      outline: none;
      border: 2px solid rgb(93, 93, 94);
    }

    .form-input.warning input {
      border: 2px solid #ff7a7a;
    }

    .form-input p {
      display: none;
      font-size: 0.75rem;
      text-align: right;
      font-style: italic;
      color: #ff7a7a;
    }


    .submit-btn {
      cursor: pointer;
      width: 100%;
      padding: 1.2em;
      margin-top: 3em;
      margin-bottom: 0;
      border: none;
      border-radius: 0.5em;
      background-color: #38cc8c;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
    }

    .submit-btn:hover {
      background-color: #059858;
    }

    .form-term {
      margin-bottom: 0;
      font-size: 0.8rem;
      text-align: center;
    }

      span {
      margin-top: 0.4rem;
      margin-bottom: 3.5rem;
      font-weight: 550;
      font-size: 1rem;
      color: #f84242;
    }
    
 
      body {
        align-items: center;
        min-height: 100vh;
        min-width: 768px;
      }

      main {
        max-width: 100vw;
        flex-direction: row;
        justify-content: center;
      }

      .intro {
        align-items: flex-start;
        text-align: left;
        width: 45%;
        margin-right: 1rem;
      }

      .title {
        padding: 0;
        margin-bottom: 0;
        font-size: 3rem;
        line-height: 1.25em;
      }

      .sign-up {
        width: 45%;
      }

      .sign-up-form {
        padding: 2rem;
      }

      .sign-up-form input {
        padding-left: 1rem;
        height: 30px;
      }
  #register{
    display: flex;
    margin-top: 0.5rem;
    padding: 0;
    font-size: .80rem;
    font-style: italic;
    margin-bottom: 0;
    }
  </style>
</head>

<body>
  <main>
    <!-- intro section -->
    <section class="intro">
      <h1 class="title">Parking  Management System</h1>
      <p>Welcome to the Login Page</p>
    </section>

    <!-- sign-up section -->
    <section class="sign-up">
      <p class="sign-up-para">Enter your Email and Password</p>
      <?php
       
       if (isset($_GET['error'])) {
          if ($_GET['error'] === 'invalid_username') {
              echo '<script>alert("Invalid username. Please try again.")</script>';
          } elseif ($_GET['error'] === 'invalid_password') {
              echo '<script>alert("Invalid password. Please try again.")</script>';
          }
      }
      // if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
      //     echo '<script>alert("Invalid username or password. Please try again.")</script>';
      // }
      ?>
      <!-- the form itself -->
        <form class="sign-up-form" method="POST" action="login_proc.php">
          <div class="form-input">
            <input type="text" name="username" id="username" placeholder="username" required>
          </div>
          <div class="form-input">
            <input type="password" name="password" id="password" placeholder="Password" required>
          </div>

        <button class="submit-btn"type="submit" name="login" value="Login">Log in</button>
        <a href="register.php" id="register" value="register">Register</a>
        <p class="form-term">By clicking the button, you are going to be authenticated in our database </p>

      </form>
    </section>
  </main>
</body>

</html>