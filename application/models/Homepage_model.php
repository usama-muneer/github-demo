<?php
  class Homepage_model extends CI_Model
  {
    function __construct(){
      parent::__construct();
    }

    // Insert User data code start
    function insert_user($data){
      $this->db->insert('users', $data);
    }
    //Insert User data code end

    // Insert Subscription data code start
    function insert_subscription($data){
      $this->db->insert('subscriptions', $data);
    }
    //Insert Subscription  data code end

    //Insert Messages code start
    function insert_message($data){
      $this->db->insert('messages', $data);
    }
    //Insert Messages code end

    //check email available code start
    function is_email_available($email){
      $this->db->where('email', $email);
      $query = $this->db->get('subscriptions');
      if($query->num_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
    //check email available code end

    //check email available code start
    function is_user_email_available($email){
      $this->db->where('email', $email);
      $query = $this->db->get('users');
      if($query->num_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
    //check email available code end

        //admin validate code start
    function admin_validate($username, $password){
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $query = $this->db->get('admin');
      if($query->num_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
    //admin validate code end

  }
?>