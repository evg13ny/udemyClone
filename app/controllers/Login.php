<?php

// Login class

class Login extends Controller
{
    public function index()
    {
        $data['title'] = "Login";
        $data['errors'] = [];

        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // validate
            $row = $user->first(['email' => $_POST['email']]);

            if ($row) {
                if ($row->password === $_POST['password']) {
                    // authenticate
                    Auth::authenticate($row);
                    redirect('home');
                }
            }

            $data['errors']['email'] = "Wrong email or password!";
        }

        $this->view('login', $data);
    }
}
