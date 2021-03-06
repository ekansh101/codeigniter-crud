<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<div class="container">
  <h2>Add Customer</h2>
 
  <form action="http://localhost/ci/crud/logindata" method="post" enctype='multipart/form-data'>

        <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <!--  <span class="text-danger"><?php //echo form_error('username'); ?></span>  -->
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
       <!-- <span class="text-danger"><?php ///echo form_error('password'); ?></span>  -->
    </div>
 
  <!--   <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
      <?php  
                          //echo '<label class="text-danger">'.$this->session->flashdata

/*("error").'</label>'; */ 
                     ?>  
  </form>
</div>