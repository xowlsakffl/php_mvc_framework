<?php
class Pages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home Page',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $this->view('pages/about');
    }
}