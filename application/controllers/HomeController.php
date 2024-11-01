<?php

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
        $this->load->model('Student_model'); // Load the Student model
    }

    public function login()
    {
        // Check if the form has been submitted
        if ($this->input->post()) {
            // Get the username and password from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Query the database for the user
            $query = $this->db->get_where('users', ['username' => $username]);
            $user = $query->row();

            // Check if the user exists and verify the password
            if ($user && password_verify($password, $user->password)) {
                // Successful login
                // Set session data for username
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('username', $user->username); // Store the username
                redirect('HomeController/welcome'); // Redirect to the welcome page
            } else {
                // Login failed
                $data['error'] = 'Invalid username or password';
                $this->load->view('user/login', $data);
            }
        } else {
            // Load the login view
            $this->load->view('user/login');
        }
    }

    public function welcome()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('HomeController/login'); // Redirect to login if not logged in
        }

        // Retrieve students from the Student model
        $data['students'] = $this->Student_model->get_students();
        $data['username'] = $this->session->userdata('username'); // Retrieve the username

        // Load your custom welcome view with students data
        $this->load->view('user/welcome', $data);
    }

    public function add_student()
    {
        // Check if the form has been submitted
        if ($this->input->post()) {
            // Prepare data to be inserted into the database
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'student_number' => $this->input->post('student_number'),
                'strand' => $this->input->post('strand')
            );

            // Add the student using the Student model
            $this->Student_model->add_student($data);

            // Redirect back to the welcome page
            redirect('HomeController/welcome');
        }

        // Load the add student view
        $this->load->view('user/add_student');
    }

    public function logout()
    {
        // Destroy the session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username'); // Remove username from session
        redirect('HomeController/login'); // Redirect to the login page
    }

    public function edit_student($id)
    {
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('HomeController/login'); // Redirect to login if not logged in
        }

        // Retrieve the student data based on ID
        $data['student'] = $this->Student_model->get_student($id);

        // Check if the form has been submitted
        if ($this->input->post()) {
            // Prepare data to be updated in the database
            $update_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'student_number' => $this->input->post('student_number'),
                'strand' => $this->input->post('strand')
            );

            // Update the student using the Student model
            $this->Student_model->update_student($id, $update_data);

            // Redirect back to the welcome page
            redirect('HomeController/welcome');
        }

        // Load the edit student view with student data
        $this->load->view('user/edit_student', $data);
    }

    public function delete_student($id)
    {
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('HomeController/login'); // Redirect to login if not logged in
        }

        // Delete the student using the Student model
        $this->Student_model->delete_student($id);

        // Redirect back to the welcome page
        redirect('HomeController/welcome');
    }

    public function register()
{
    // Check if the form has been submitted
    if ($this->input->post()) {
        // Get the username and password from the form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare data to be inserted into the database
        $data = array(
            'username' => $username,
            'password' => $hashed_password
        );

        // Insert the user into the database
        $this->db->insert('users', $data);

        // Redirect to the login page with a success message
        redirect('HomeController/login'); // Or to a confirmation page
    }

    // Load the registration view
    $this->load->view('user/register');
}

}
