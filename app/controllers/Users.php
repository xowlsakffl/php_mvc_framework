<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $users = $this->userModel->getUsers();

        $data = [
            'title' => 'Home Page',
            'users' => $users,
        ];

        $this->view('users/index', $data);
    }
}