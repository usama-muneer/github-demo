<?php
  class Location_model extends CI_Model
  {
    function __construct(){
      parent::__construct();
    }

    // Insert Location data code start
    function insert_location($data){
      $this->db->insert('locations', $data);
      $insert_id = $this->db->insert_id();

      return  $insert_id;
    }
    //Insert Location data code end

    // Insert Location Address data code start
    function insert_locAddress($data){
      $this->db->insert('locationaddress', $data);
      return true;
    }
    //Insert Location Address  data code end

    // Insert Location Links data code start
    function insert_locLinks($data){
      $this->db->insert('locationlinks', $data);
      return true;
    }
    //Insert Location Links data code end

    // Insert Location Images data code start
    function insert_locImages($data){
      $this->db->insert('locationimages', $data);
      return true;
    }
    //Insert Location Images data code end

    // Insert Location Availability data code start
    function insert_locAvailability($data){
      $this->db->insert('locationavailability', $data);
      return true;
    }
    //Insert Location Availability data code end

    // Delete Location data code start
    function delete_locAvailability($loc_id = null){
      if($loc_id){
        $this->db->where('loc_id',$loc_id);
        $this->db->delete('locationavailability');
      }
    }

    function delete_locImages($loc_id = null){
      if($loc_id){
        $this->db->where('loc_id',$loc_id);
        $this->db->delete('locationimages');
      }
    }

    function delete_locLinks($loc_id = null){
      if($loc_id){
        $this->db->where('loc_id',$loc_id);
        $this->db->delete('locationlinks');
      }
    }

    function delete_locAddress($loc_id = null){
      if($loc_id){
        $this->db->where('loc_id',$loc_id);
        $this->db->delete('locationaddress');
      }
    }

    function delete_location($loc_id = null){
      if($loc_id){
        $this->db->where('loc_id',$loc_id);
        $this->db->delete('locations');
      }
    }
    //Delete Location data code end

    //Update Location data code start
    function update_location($data){
      $this->db->replace('locations', $data);
    }
    function update_locAddress($data){
      $this->db->replace('locationaddress', $data);
    }
    //Update Location data code start

    //Fetch Location data code start
    function get_allLocation(){
      $sql = "SELECT * FROM locations";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function get_allLocAddress(){
      $sql = "SELECT * FROM locationaddress group by 'loc_id'";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function get_allLocImages(){
      $sql = "SELECT * FROM locationimages group by 'loc_id'";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function get_images(){
      $sql = "SELECT * FROM locationimages";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }
    //Fetch Location data code end


    //Fetch Messsage data code start
    function get_allMessages(){
      $sql = "SELECT * FROM messages";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }
    //Fetch Messsage data code end
  }
?>
