<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Registration Page</title>
</head>

<body>

    <?php include './components/navbar.php'; ?>

    <form>
        <div class="container-fluid col-md-6 offset-md-3 col-lg-4 offset-lg-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- First Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-control" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Last Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="form-control" placeholder="Last Name" />
                            </div>
                        </div>
                    </div>

                    <!-- Role selection -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="role">Role</label>
                        <select id="role" class="form-control">
                            <option value="student">Student</option>
                            <option value="coach">Coach</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="Username">Username</label>
                        <input type="text" id="Username" class="form-control" placeholder="Username" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" />
                    </div>

                    <div class="form-outline">
                        <button type="submit" class="btn btn-primary col-md-12">Sign Up</button>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked />
                                <label class="form-check-label" for="rememberMe"> Remember me </label>
                            </div>
                        </div>
                    </div>

                    <!-- Login link -->
                    <div class="text-center">
                        <p>Already a member? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
    </form>
</body>

</html>