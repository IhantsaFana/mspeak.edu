<?php require APPROOT . '/views/inc/header_form.php'; ?>
<style>
    /* Body and General Styling */
    body {
        background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
        font-family: 'Poppins', sans-serif;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    /* Navbar Styling */
    nav {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        border-bottom: 2px solid #1a73e8;
    }

    .navbar-brand {
        color: #00ffcc;
        font-weight: bold;
        font-size: 1.8rem;
        text-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc;
    }

    .btn-primary {
        background: linear-gradient(45deg, #ff00ff, #00ffff);
        border: none;
        color: #fff;
        border-radius: 30px;
        padding: 10px 20px;
        box-shadow: 0 0 10px #00ffff, 0 0 20px #ff00ff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px #00ffff, 0 0 40px #ff00ff;
    }

    /* Sidebar Styling */
    .sidebar {
        background-color: rgba(44, 44, 44, 0.9);
        padding: 20px;
        border-radius: 15px;
        min-height: 100vh;
    }

    .sidebar h5 {
        font-size: 1.5rem;
        color: #ff00ff;
        text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff;
    }

    .sidebar a {
        text-decoration: none;
        color: #00ffff;
        padding: 10px 0;
        display: block;
        font-size: 1rem;
        transition: color 0.3s, text-shadow 0.3s;
    }

    .sidebar a:hover {
        color: #ff00ff;
        text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff;
    }

    /* Course Cards */
    .course-card {
        margin-bottom: 30px;
        border: 2px solid transparent;
        border-image: linear-gradient(45deg, #ff00ff, #00ffff) 1;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        overflow: hidden;
    }

    .course-card img {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .course-card img:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px #ff00ff, 0 0 40px #00ffff;
    }

    .course-card .card-body {
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .course-card .btn {
        background: linear-gradient(45deg, #ff00ff, #00ffff);
        border: none;
        color: #fff;
        border-radius: 20px;
        padding: 5px 15px;
        box-shadow: 0 0 10px #00ffff, 0 0 20px #ff00ff;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .course-card .btn:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px #00ffff, 0 0 40px #ff00ff;
    }

    /* Footer */
    footer {
        background-color: #000;
        padding: 20px 0;
        text-align: center;
        color: #fff;
        box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.5);
    }

    footer a {
        color: #00ffff;
        text-decoration: underline;
        transition: color 0.3s, text-shadow 0.3s;
    }

    footer a:hover {
        color: #ff00ff;
        text-shadow: 0 0 10px #ff00ff, 0 0 20px #00ffff;
    }
</style>

<h4 class="mt-4">Featured Courses</h4>
<div class="row mt-3">
    <div class="col-md-4 course-card">
    <?php foreach($data['courses'] as $course) : ?>
        <div class="card">
            <video src="<?php echo $course->file; ?>" controls></video>
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $course->title; ?></h5>
                <p class="card-text"><?php echo $course->description; ?></p>
                <button class="btn mb-3">Enroll Now</button>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>