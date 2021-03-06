<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	  $this->load->helper('url','form');
        $this->load->library("pagination");
	
	//load Model
	$this->load->model('Datacrud');


	
	}
	public function index()
	{      
		/*$data['allrecord'] = $this->Datacrud->fetch_record();
		$this->load->view('inc/header');
		$this->load->view('fetch_data', $data);
		$this->load->view('inc/footer');*/

        $data['allrecord'] = $this->Datacrud->fetch_record();
		$row= count($data['allrecord']);
		$per_page=4;
		
		$config = array();
        $config["base_url"] = base_url() . "Crud/index";
        $config["total_rows"] = $row;
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        /* pagination design*/
        $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';



    $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';


    $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
        /* pagination end design*/



        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();

        $data['allrecord'] = $this->Datacrud->paginate($config["per_page"], $page);

        /*$this->load->view('pagination', $data);*/

       /* $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['allrecord'] = $this->Datacrud->pagination($config["per_page"], $page);*/

		$this->load->view('inc/header');
		$this->load->view('fetch_data', $data);
		$this->load->view('inc/footer');
		

      /*  $this->load->library("pagination");
        $row = count($this->Datacrud->fetch_record());*/
		
		/*print_r($row); die();*/
		
/*		$config = array();
        $config["base_url"] = base_url('/index');
        $config["total_rows"] = $row;
        $config["per_page"] = 3;
        $config["uri_segment"] = 2;*/
  /* $config['use_page_numbers'] = TRUE;
   $config['num_links'] = $row;
   $config['cur_tag_open'] = '&nbsp;<a class="current">';
   $config['cur_tag_close'] = '</a>';
   $config['next_link'] = 'Next';
   $config['prev_link'] = 'Previous';*/


/*        $this->pagination->initialize($config);

          if($this->uri->segment(2)){
     $page = ($this->uri->segment(2)) ;
  }
  else{
    $page = 1;
 }
     
*/
        
    /*    $data['allrecord'] = $this->Datacrud->pagination($config["per_page"], $page);
   

		$this->load->view('inc/header');
		$this->load->view('fetch_data', $data);
		$this->load->view('inc/footer');*/
		
	}
	 

		public function add_data()
	{
		$this->load->view('inc/header');
		$this->load->view('add_data');
		$this->load->view('inc/footer');
		
	}
		public function submit_record()
	{  

		//print_r($this->input->post('show-hide', TRUE)); die();

		      $config['upload_path']   = './assets/uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4'; 
        /* $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768; */ 
         $this->load->library('upload', $config);	
         if ( ! $this->upload->do_upload('file_name')) {
            $error = array('error' => $this->upload->display_errors()); 

		print_r($error); die();
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $image_name= $data['upload_data']['file_name'];             
         } 
            
		$data = array(
		'name' => $this->input->post('name', TRUE),
		'email' => $this->input->post('email', TRUE),
		'password' => md5($this->input->post('password', TRUE)),
		'job_profile' => $this->input->post('job_profile', TRUE),
		'job_description' => $this->input->post('job_description', TRUE),
		'image'=> $image_name,
		'display_status'=>$this->input->post('show-hide', TRUE)

	       );
		
           
		$this->Datacrud->add_record($data);	
		redirect(base_url());

         
   }

        public function editrecord()
	    {  
		  	
         if ($this->input->get('edit_id')) {
		      $id= $this->input->get('edit_id');
		     $data['editdata']= $this->Datacrud->edit_record($id);
		     $this->load->view('inc/header');
		     $this->load->view('edit_record', $data);
		     $this->load->view('inc/footer');

		}
   }

        public function updaterecord()
	    {  
         if ($this->input->post('hidden_id')) {
         	//print_r($this->input->post('show-hide', TRUE)); die;
		      $id= $this->input->post('hidden_id');
		     $config['upload_path']   = './assets/uploads/'; 
             $config['allowed_types'] = 'gif|jpg|png|jpeg|mp4'; 
        /* $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768; */ 
         $this->load->library('upload', $config);	
         if ( ! $this->upload->do_upload('file_name')) {
            $error = array('error' => $this->upload->display_errors()); 

		print_r($error); die();
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $image_name= $data['upload_data']['file_name'];             
         } 
		$data = array(
		'name' => $this->input->post('name', TRUE),
		'email' => $this->input->post('email', TRUE),
		'password' => md5($this->input->post('password', TRUE)),
		'job_profile' => $this->input->post('job_profile', TRUE),
		'job_description' => $this->input->post('job_description', TRUE),
		'image'=> $image_name,
		'display_status'=>$this->input->post('show-hide', TRUE)

	       );
		$this->Datacrud->update_record($id,$data);	
		redirect(base_url());
		
        }
        } 
    public function deleterecord()
	   {  
		  	
         if ($this->input->get('del_id')) {
		      $id= $this->input->get('del_id');
		     $this->Datacrud->delete_record($id);
		     redirect(base_url());
		   /*  $this->load->view('inc/header');
		     $this->load->view('edit_record', $data);
		     $this->load->view('inc/footer');*/

		}
   }

   function deletebycheckbox(){
     if(isset($_POST['save'])){
     	$allckeckid= array();
       $allckeckid= $_POST['allcheck'];
    if(!empty($allckeckid)) {   
       $this->Datacrud->deleteby_checkbox($allckeckid);
       redirect(base_url()); 	
    }
    else
    {
    	?>
    	<!-- <script type="text/javascript"> alert('please select check');</script> -->
    	<?php 
    	redirect(base_url());  

    }
   
   }
   else
   {
      redirect(base_url());
   }
}
   public function login(){
   	        $this->load->view('inc/header');
		     $this->load->view('admin/login');
		     $this->load->view('inc/footer');

   	
   }
    public function logindata(){

    	$this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  

           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('main_model');  
                if($this->Datacrud->fetch_record_single_row($username,$password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'main/enter');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'crud/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }
           }  


           function enter(){  
           if($this->session->userdata('username') != '')  
           {  
                echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';  
                echo '<label><a href="'.base_url

().'main/logout">Logout</a></label>';  
           }  
           else  
           {  
                redirect(base_url() . 'main/login');  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'main/login');  
      }  
 }  

/*   	$email = $this->input->post('email', TRUE);
	$password = $this->input->post('password', TRUE);


     $data= $this->Datacrud->fetch_record_single_row($email,$password);

     if ($email== $data[0]->email &&  $password==  $data[0]->password) {
     	$newdata = array(
                   'username'  => $data[0]->name,
                   'email'     => $data[0]->email,
                   'logged_in' => TRUE
               );

       $this->session->set_userdata($newdata);

      $this->load->view('inc/header');
		$this->load->view('welcome_message');
		$this->load->view('inc/footer');
       }
 
     else
     {
        echo "invalid username and password";
     }
   	
   }
  
  
}*/


