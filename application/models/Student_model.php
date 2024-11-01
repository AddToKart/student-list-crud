<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct(); // Call the CI_Model constructor
    }

    public function get_students()
    {
        $query = $this->db->get('students');
        return $query->result();
    }

    public function add_student($data)
    {
        $this->db->insert('students', $data);
    }

    public function get_student($id)
    {
        $query = $this->db->get_where('students', ['id' => $id]);
        return $query->row();
    }

    public function update_student($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('students', $data);
    }

    public function delete_student($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('students');
    }
}
