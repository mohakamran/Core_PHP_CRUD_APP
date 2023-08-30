<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }
  
  .login-container {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 300px;
    padding: 20px;
    box-sizing: border-box;
  }

  .login-container h2 {
    margin-top: 0;
    font-size: 1.5rem;
    text-align: center;
  }

  .login-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
  }

  .login-form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
  }

  .login-form button:hover {
    background-color: #0056b3;
  }
</style>
<title>Login Form Example</title>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form class="login-form" action="#">
      <input type="text" placeholder="Username" required>
      <input type="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
