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
        $data['row'] = $row = $user->first(['id' => $id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $allowed = ['image/jpeg', 'image/png'];
            $folder = "uploads/images/";
            
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                file_put_contents($folder . "index.php", "Access denied");
                file_put_contents("uploads/index.php", "Access denied");
            }

            if (!empty($_FILES['image']['name'])) {
                if ($_FILES['image']['error'] == 0) {
                    if (in_array($_FILES['image']['type'], $allowed)) {
                        $destination = $folder . time() . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $_POST['image'] = $destination;
                    } else {
                        $user->errors['image'] = "This file type is not allowed";
                    }
                } else {
                    $user->errors['image'] = "This file could not be submitted";
                }
            }

            $user->update($id, $_POST);
            redirect('admin/profile/' . $id);
        }

        $data['title'] = "Profile";
        $this->view('admin/profile', $data);
    }
}
