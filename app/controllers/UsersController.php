<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model("UserModel");
    }

    public function index()
    {
        // Debugging only, remove in production
        var_dump($this->db);

        $this->UserModel->greet();
        var_dump($this->UserModel->all());
    }

    public function read()
    {
        $data['users'] = $this->UserModel->all();
        $this->call->view('user/index', $data);
    }

    public function show($id)
    {
        $user = $this->UserModel->filter(['id' => $id])->get();
        if (!$user) {
            set_flash_alert('danger', 'No record found for this user.');
            return redirect('/users');
        }
        return $this->call->view('user/view', ['user' => $user]);
    }

    public function insert()
    {    }

    public function add()
    {
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('fName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'First name should only contain letters, spaces, or a period.')
                ->name('lName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'Last name should only contain letters, spaces, or a period.')
                ->name('email')->required()->max_length(50)->valid_email()
                ->name('username')->required()->max_length(50);

            if ($this->form_validation->run()) {
                $fName    = $this->io->post('lName'); 
                $lName    = $this->io->post('fName'); 
                $email    = $this->io->post('email');
                $username = $this->io->post('username');

                if ($this->UserModel->create($fName, $lName, $email, $username)) {
                    set_flash_alert('success', 'New user has been saved.');
                    redirect('users/create');
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
                redirect('users/create');
            }
        }

        $this->call->view('user/create');
    }

    public function seed()
    {
        $demoUsers = [        ];

        $ok = $this->UserModel->seed_users($demoUsers);

        if ($ok) {
            set_flash_alert('success', 'Demo users inserted into the database.');
        } else {
            set_flash_alert('danger', 'Unable to insert demo users.');
        }

        return redirect('users');
    }

    public function edit($id)
    {
        $user = $this->UserModel->filter(['id' => $id])->get();
        if (!$user) {
            set_flash_alert('danger', 'We couldn’t find this user.');
            return redirect('/users');
        }

        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('fName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'First name should only contain letters, spaces, or a period.')
                ->name('lName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'Last name should only contain letters, spaces, or a period.')
                ->name('email')->required()->max_length(50)->valid_email()
                ->name('username')->required()->max_length(50);

            if ($this->form_validation->run()) {
                $updateData = [
                    'firstName' => $this->io->post('fName'),
                    'lastName'  => $this->io->post('lName'),
                    'email'     => $this->io->post('email'),
                    'username'  => $this->io->post('username'),
                ];

                $ok = $this->UserModel->filter(['id' => $id])->update($updateData);

                if ($ok) {
                    set_flash_alert('success', 'Changes saved successfully.');
                    return redirect('/users/' . $id . '/edit');
                } else {
                    set_flash_alert('danger', 'Update did not go through, please retry.');
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }
        }

        return $this->call->view('user/edit', ['user' => $user]);
    }

    public function delete($id)
    {
        $user = $this->UserModel->filter(['id' => $id])->get();
        if (!$user) {
            set_flash_alert('danger', 'User record not found.');
            return redirect('/users');
        }

        $ok = $this->UserModel->filter(['id' => $id])->delete();
        if ($ok) {
            set_flash_alert('success', 'User has been removed.');
        } else {
            set_flash_alert('danger', 'Deletion failed.');
        }
        return redirect('/users');
    }
}
