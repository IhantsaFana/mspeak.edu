<?php require APPROOT . '/views/inc/header_form.php'; ?>
<style>
    .formulaire {
        min-height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url(<?php echo URLROOT; ?>/assets/img/hero-bg-light.webp) no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .form-container {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 600px;
        text-align: left;
    }

    .form-container h1 {
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #333;
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 6px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 1rem;
        width: 100%;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-label {
        font-size: 1.3rem;
        font-weight: 500;
    }

    .btn-primary {
        width: 100%;
        padding: 12px;
        font-size: 1.2rem;
        border-radius: 6px;
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .text-danger {
        font-size: 0.9rem;
        color: #dc3545;
        margin-top: 5px;
    }
</style>

<section class="formulaire">
    <div class="form-container">
        <h1 class="text-center">Login</h1>
        <div class="text-center"><?php flash('register_success'); ?></div>
        <form action="<?php echo URLROOT; ?>/auth/login" method="post">
            <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>

            <div class="form-group">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>

            <div class="form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>

                <a href="<?php echo URLROOT; ?>/auth/register" class="text-decoration-none">Don't have an account?
                    <span class="font-weight-bold">Register</span>
                </a>
            </div>


            <input type="hidden" name="_target_path" value="<?php echo URLROOT; ?>/course/index">

            <div class="form-group">
                <button type="submit" class="btn-primary">Login</button>
            </div>
        </form>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>