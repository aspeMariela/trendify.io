<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="cred.php" class="form-area">
  <div class="mb-3">
    <label for="signInEmail" class="form-label">Email</label>
    <input type="email" name="email" id="signInEmail" class="form-control" placeholder="Email" required>
  </div>
  <div class="mb-3">
    <label for="signInPassword" class="form-label">Password</label>
    <input type="password" name="password" id="signInPassword" class="form-control" placeholder="Password" required>
  </div>
  
    <input type="submit" class="btn btn-info" value="Sign In" name="signIn" style="width: 200px; margin-top: 10px;">
</form>

</body>
</html>