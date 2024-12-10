<?php
class Auth extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        redirect('welcome');
    }

    public function register()
    {
        if ($this->isLoggedIn()) {
            redirect('courses');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nettoyage des données reçues
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'preferences' => isset($_POST['preferences']) ? $_POST['preferences'] : [],
                'name_err' => '',
                'email_err' => '',
                'date_of_birth_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'preferences_err' => ''
            ];

            // Validation des champs
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name !';
            } else {
                if ($this->userModel->findUserByName($data['name'])) {
                    $data['email_err'] = 'Name already taken !';
                }
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email !';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already taken !';
                }
            }

            if (empty($data['date_of_birth'])) {
                $data['date_of_birth_err'] = 'Please fill your date of birth !';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password !';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must have at least 6 characters !';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password !';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match !';
                }
            }

            if (empty($data['preferences'])) {
                $data['preference_err'] = 'Please select at least one preference.';
            }
            

            // Vérification des erreurs
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['preference_err'])) {
                // Hachage du mot de passe
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Enregistrement de l'utilisateur
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Registration successfully you can now login !');
                    redirect('auth/login');
                } else {
                    die('Error occured');
                }
            } else {
                // Charger la vue avec les erreurs
                $this->view('auth/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'date_of_birth' => '',
                'password' => '',
                'confirm_password' => '',
                'preferences' => '',
                'name_err' => '',
                'email_err' => '',
                'date_of_birth_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'preferences_err' => ''
            ];

            // Charger la vue
            $this->view('auth/register', $data);
        }
    }

    public function login()
    {
        if ($this->isLoggedIn()) {
            redirect('courses');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nettoyage des données
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validation des champs
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email !';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password !';
            }

            // Vérification des erreurs avant d'aller plus loin
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Vérifier si l'utilisateur existe
                if ($this->userModel->findUserByEmail($data['email'])) {
                    // Utilisateur trouvé, on tente de le connecter
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    // Ajout d'un test ici pour vérifier ce que `login` retourne
                    if ($loggedInUser) {
                        // Vérification du mot de passe réussie
                        // Créer la session utilisateur
                        $this->createUserSession($loggedInUser);
                    } else {
                        // Si le mot de passe est incorrect
                        $data['password_err'] = 'Password incorrect.';
                        error_log("Password incorrect for email: " . $data['email']); // Log pour vérifier l'erreur
                    }
                } else {
                    // Si l'email n'existe pas
                    $data['email_err'] = 'This email is not registered!';
                    error_log("Email not registered: " . $data['email']); // Log pour vérifier l'erreur
                }
            }

            // Si des erreurs existent
            if (!empty($data['email_err']) || !empty($data['password_err'])) {
                $this->view('auth/login', $data);
            }
        } else {
            // Initialisation des champs si la requête n'est pas POST
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Charger la vue
            $this->view('auth/login', $data);
        }
    }

    public function profile()
    {
        // Vérifier si l'utilisateur est connecté
        if (!$this->isLoggedIn()) {
            redirect('auth/login');
        }

        // Récupérer l'utilisateur connecté depuis la session
        $user = $this->userModel->getUserById($_SESSION['user_id']);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            redirect('pages/page_not_found');
        }

        // Passer les données à la vue
        $data = [
            'user' => $user
        ];

        // Charger la vue du profil
        $this->view('auth/profile', $data);
    }



    // Create Session With User Info
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('courses');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}
