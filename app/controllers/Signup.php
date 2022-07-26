<?php

// Signup class

class Signup extends Controller
{
    public function index()
    {
        show($_POST);

        $user = new User();
        if ($user->validate($_POST)) {
            $_POST['date'] = date("Y-m-d H:i:s");
            $user->insert($_POST);
        }

        show($user->errors);

        $data['title'] = "Signup";
        $this->view('signup', $data);
    }
}
