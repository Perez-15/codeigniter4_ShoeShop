<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminUserModel;
use App\Models\UserModel;

class AuthController extends Controller
{
    // Display the login form
    public function login()
    {
        return view('auth/login'); // View for login
    }

    // Handle the login form submission
    public function doLogin()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation', $validation);
        }

        // Validation passed — proceed with authentication
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // First check in admin table
        $model = new AdminUserModel();
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set the user's login
            session()->set([
                'is_logged_in' => true,
                'user_id'      => $user['id'], 
                'role'        => $user['role']
            ]);
            // Redirect for admin
            return redirect()->to('/products'); // Redirect for admin
        } else {
            // Now check in users table
            $model = new UserModel();
            $user = $model->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set the user's login
                session()->set([
                    'is_logged_in' => true,
                    'user_id'      => $user['id'], 
                    'role'        => $user['role']
                ]);
                // Redirect for normal users
                return redirect()->to('/shoes'); // Redirect for normal users
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid credentials');
            }
        }
    }

    // Display the registration form
        public function signup()
    {
        return view('auth/signup'); // Signup view
    }

    // Handle the registration form submission
public function doSignup()
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'username'     => 'required|is_unique[user.username]',
        'email'        => 'required|valid_email|is_unique[user.email]',
        'password'     => 'required|min_length[6]',
        'confirm_pass' => 'matches[password]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $validation);
    }

    // Proceed with saving
    $model = new UserModel();

    $userData = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => 'user'
    ];

    $model->save($userData);

   
    $userId = $model->getInsertID();

    session()->set([
        'is_logged_in' => true,
        'user_id'      => $userId,
        'role'         => 'user'
    ]);

    return redirect('shoes')->with('msg', 'Account successfully created and logged in.');
}

    public function logout()
    {
        // destroy the current user's sessions
        session()->destroy();

        return redirect('login'); // Redirect back to login after logging out
    }
}
