<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <?php 
 $session_name = $this->session->userdata('username');
 $session_email = $this->session->userdata('email');
 ?>
<div class="container">
  <h2>Welcome</h2>
  <h3><?php echo $session_name; ?></h3>

  <h3> Email: <?php echo $session_email; ?></h3>
 
</div>

