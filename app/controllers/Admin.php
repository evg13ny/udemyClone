<?php

// Admin class

class Admin extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            message("Please log in");
            redirect('login');
        }

        $data['title'] = "Dashboard";
        $this->view('admin/dashboard', $data);
    }

    public function profile($id = null)
    {
        if (!Auth::logged_in()) {
            message("Please log in");
            redirect('login');
        }

        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);

        $data['title'] = "Profile";
        $this->view('admin/profile', $data);
    }
}
