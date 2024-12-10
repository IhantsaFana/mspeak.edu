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

    .preferences-columns .form-check-label {
        font-size: 18px;
        font-weight: 500;
    }

    .preferences-columns {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .preferences-columns .form-check {
        width: 48%;
        margin-bottom: 10px;
    }

    .text-danger {
        font-size: 0.9rem;
        color: #dc3545;
        margin-top: 5px;
    }

    .submit {
        width: 15rem;
    }
</style>

<section class="formulaire">
    <div class="form-container">
        <h1 class="text-center">Register</h1>
        <form action="<?php echo URLROOT; ?>/auth/register" method="post">
            <div class="form-group">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>

            <div class="form-group">
                <label class="form-label">Email:</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label class="form-label">Date of birth : <sup>(Optional)</sup></label>
                <input type="date" name="date_of_birth" class="form-control <?php echo (!empty($data['date_of_birth_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date_of_birth']; ?>">
                <span class="invalid-feedback"><?php echo $data['date_of_birth_err']; ?></span>
            </div>

            <div class="form-group">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <label class="form-label">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            </div>

            <div>
                <input type="checkbox" name="preferences[]" value="reading"
                    <?php echo (is_array($data['preferences']) && in_array('reading', $data['preferences'])) ? 'checked' : ''; ?>>
                Reading
            </div>
            <div>
                <input type="checkbox" name="preferences[]" value="traveling"
                    <?php echo (is_array($data['preferences']) && in_array('traveling', $data['preferences'])) ? 'checked' : ''; ?>>
                Traveling
            </div>
            <div>
                <input type="checkbox" name="preferences[]" value="music"
                    <?php echo (is_array($data['preferences']) && in_array('music', $data['preferences'])) ? 'checked' : ''; ?>>
                Music
            </div>



            <div class="form-group">
                <div class="form-group d-flex justify-content-between align-items-center">
                    <div>
                        <button type="submit" class="btn-primary submit">Register</button>
                    </div>

                    <a href="<?php echo URLROOT; ?>/auth/login" class="text-decoration-none">Do you have an account ?
                        <span class="font-weight-bold">Login</span>
                    </a>
                </div>
            </div>

        </form>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>