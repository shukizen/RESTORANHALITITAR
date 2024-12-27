<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2>Manajemen Restoran</h2>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php echo form_open('login', ['class' => 'login-form']); ?>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text"
                    class="form-control"
                    name="username"
                    placeholder="Username"
                    value="<?php echo set_value('username'); ?>"
                    required>
            </div>
            <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                    required>
            </div>
            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>

            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                <select name="role" class="form-select" required>
                    <option value="">Pilih Role</option>
                    <option value="admin" <?php echo set_select('role', 'admin'); ?>>Admin</option>
                    <option value="kasir" <?php echo set_select('role', 'kasir'); ?>>Kasir</option>
                </select>
            </div>
            <?php echo form_error('role', '<small class="text-danger">', '</small>'); ?>

            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
            <?php echo form_close(); ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>