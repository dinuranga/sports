<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    
<?php include './components/navbar.php'; ?>
    <form>
        <div class="container-fluid col-md-6 offset-md-3 col-lg-4 offset-lg-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Log In</h3>
                </div>

                <div class="card-body">
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username" required>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                    </div>

                    <!-- Submit button -->
                    <div class="form-outline">
                        <button type="submit" class="btn btn-primary col-md-12">Sign In</button>
                    </div>
                    
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked>
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="./register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
