<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
    }

    public function get_all()
    {
        var_dump($this->StudentsModel->all());
    }


    function create()
    {
        $data = array(
            'last_name' => 'Martin',
            'first_name' => 'Matt',
            'email' => 'mattmartin.@gmail.com'
        );
 
        $this->StudentsModel->insert($data);
    }

    function update()
    {
        $data = array(
            'last_name' => 'Martin',
            'first_name' => 'Matthew',
            'email' => 'husdatmadapaka@gmail.com'
        );
        $this->StudentsModel->update(3, $data);
    }

    function delete()
    {
        $this->StudentsModel->delete(3);
    }
}
