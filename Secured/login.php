<!DOCTYPE html>
<html>
<head>
  <title>Administrator Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #000080;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    label {
      font-size: 16px;
      color: #000080;
    }
    input[type="text"],
    input[type="password"] {
      width: 95%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #000080;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    #error-message {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Administrator Login</h1>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
      echo '<div id="error-message">Invalid username or password. Please try again.</div>';
    }
    ?>
    <form action="authenticate.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
