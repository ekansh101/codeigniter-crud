<div class="container">
  <h2>Edit EMP</h2>
  <?php 
       if (isset($editdata)) {
      
  foreach ($editdata as $key => $value) {  
    $src= base_url().'assets/uploads/'.$value->image;
     $extension = explode('.', $value->image);
   /* echo "<pre>";print_r($extension); die();*/
    ?>
    
 
  <form action="updaterecord" method="post" enctype='multipart/form-data'>
    <input type="hidden" class="form-control" id="hidden_id" placeholder="Enter hidden" name="hidden_id" value="<?php echo $value->id; ?>">
        <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $value->name; ?>">
    </div>
        <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  value="<?php echo $value->email; ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"  value="<?php echo $value->password; ?>">
    </div>
       <div class="form-group">
      <label for="password">Job profile:</label>
      <textarea cols="3" rows="5" name="job_profile"><?php echo $value->job_profile; ?></textarea>
    </div>
        <div class="form-group">
      <label for="password">Job Description:</label>
      <textarea cols="3" rows="5" name="job_description"><?php echo $value->job_description; ?></textarea>
    </div>
    <div class="form-group">
      <label for="file">Image:</label>
      <input type="file" class="form-control" id="fileUpload" placeholder="Enter password" name="file_name">
      <div id="image-holder"></div>
      <!-- <input type="hidden" name="image_hidden_id" value="<?php //echo $value->id; ?>"> -->
     <!--  <a href="<?php //echo base_url(); ?>deletesingleimage"><button name="deleteimg">delete</button></a> -->
     <?php if($extension[1]!='mp4') {  ?>
      <img src="<?php echo $src; ?>" height="200px" width="200px">
        <?php } else {  ?> 
        <video width="150" height="150" class="" controls>
        <source src="<?php echo $src; ?>" type="video/mp4">
        </video>
      <?php } ?>
    </div>
     <div class="form-group">
      <label for="file">show/Hide:</label>
      <select name="show-hide" id="show-hide" class="show-hide">
        <option value="0">select</option>
         <option value="0" <?php if($value->display_status == 0) {echo"selected"; } else { echo"";} ?>>Show</option>
          <option value="1"<?php if($value->display_status == 1) {echo"selected"; } else { echo ""; } ?>>Hide</option>
      </select>
    </div>

    <?php 
     }    
       } ?>
  <!--   <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
  </form>
</div>

<script>
                        CKEDITOR.replace( 'job_profile' );
                         CKEDITOR.replace( 'job_description' );
                </script>