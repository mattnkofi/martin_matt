<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model
{

    /**
     * Table associated with the model.
     * @var string
     */
    protected $table = 'user';

    /**
     * Primary key of the table.
     * @var string
     */
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function greet()
    {
        echo "Hello";
    }

    public function seed_users(array $users)
    {
        var_dump($this->db);
        return $this->db->table('user')->bulk_insert($users);
    }

    public function create($fName, $lName, $email, $username)
    {
        $data = array(
            'firstName' => $fName,
            'lastName' => $lName,
            'email' => $email,
            'username' => $username
        );

        return $this->UserModel->insert($data);
    }
}
