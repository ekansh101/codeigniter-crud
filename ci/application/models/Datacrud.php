<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacrud extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function add_record($data)
	{
           
		$this->db->insert('ci_user',$data);
		
	}
		public function fetch_record()
	{
          
		 $query = $this->db->get('ci_user'); 
		  
            return $query->result(); 
           

		
	}
	public function edit_record($id) {

        $query= $this->db->where('id', $id); // here is the id
        $query= $this->db->get('ci_user');
         return $query->result();  
    }
    	public function update_record($id,$data) {
          //print_r($id); die();
       $this->db->where('id', $id);
        $this->db->update('ci_user', $data); 
    }
    	public function delete_record($id) {
          //print_r($id); die();
       $this->db->where('id', $id);
        $this->db->delete('ci_user'); 
    }

    public function deleteby_checkbox($checkid)
    {
       foreach ($checkid as $key => $id) {
       	  $this->db->where('id', $id);
          $this->db->delete('ci_user');  
       }
    }


     public function paginate($limit, $start) {

	  $this->db->limit($limit, $start);
        $query = $this->db->get("ci_user");
        return $query->result();
 
		      

}

  
    public function fetch_record_single_row($email, $password){
    	$this->db->where('email', $email);

    	$query = $this->db->get('ci_user'); 
		  if ($query->num_rows() >0) {
		  	return true;
		  	# code...
		  }
		  else
		  {
		  	return false;
		  }
         /*return $query->result(); */

    }
    

}
