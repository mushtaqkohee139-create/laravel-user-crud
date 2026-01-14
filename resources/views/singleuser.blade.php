<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Card -->
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">User Details</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Name</h6>
                        <p class="fs-5 fw-semibold">{{ $singleuser->name }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Email</h6>
                        <p class="fs-5 fw-semibold">{{ $singleuser->email }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Age</h6>
                        <p class="fs-5 fw-semibold">{{ $singleuser->age }}</p>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                        ← Back to Users
                    </a>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
</body>
</html>
