
<?php 

 ?>
<div class="container">
  <h2>EMP Data</h2>     
    <form method="post" action="crud/deletebycheckbox">
  <p><a href="<?php echo base_url().'add-data'; ?>"><button type="button" class="btn btn-save">Add Data</button></a>
  <input type="submit" class="hovereffect btn btn-danger form-check-input" name="save" value="Delete" title="please select one before delete">
 <!--  <div class="hover-hide">please select one before delete</div> alternate text with footer js use as tooltip-->
  </p>         
    <!-- <form method="post" action=""> -->
  <table class="table">
    <thead>
      <tr>
        <th><input type="checkbox" name="selectall" id="selectall"></th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Job Title</th>
        <th>Job Descirption</th>
        <th>Image</th> 
        <th>Display</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php 

        if (isset($allrecord)) {
        $display="";
    	foreach ($allrecord as $key => $value) { 
         $src= base_url().'assets/uploads/'.$value->image;
        $extension = explode('.', $value->image);
        /*print_r($extension); die();*/

         $srcdemo= base_url().'assets/uploads/unnamed.jpg';
         ($value->display_status !=0)? ($display_tr_class="color:red"):($display_tr_class="$display:block");
         ($value->display_status !=0)? ($display_img_class="image_overlay"):($display_img_class="");
    	  ?>
      <tr style="<?php echo $display_tr_class; ?>">
        <td><input type="checkbox" name="allcheck[]" id="selectsinglecheck" class="form-check-input" value="<?php echo $value->id; ?>"></td>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><?php echo $value->job_profile; ?></td>
        <td><?php echo $value->job_description; ?></td>
        <td>
          <?php if($extension[1]!='mp4') {  ?>
          <img src="<?php if(!empty($value->image!='')) { echo $src; } else { echo $srcdemo; }   ?>" class="<?php echo $display_img_class; ?>" >
        <?php } else {  ?> 
        <video width="150" height="150" class="<?php echo $display_img_class; ?>" controls>
        <source src="$src" type="video/mp4">
        </video>
      <?php } ?>
        </td>
        <td>
          <div class="form-group">

          <?php ($value->display_status == 0)? ($display='Show') : ($display='Hide') ?>
          <?php echo $display; ?>
    </div>
        </td>
        <td>
         <a href="http://localhost/ci/crud/editrecord?edit_id=<?php echo $value->id; ?>"> <button type="button" class="btn btn-info" name="edit" id="edit"  value="<?php echo $value->id; ?>">Edit</button></a>
         <a href="http://localhost/ci/crud/deleterecord?del_id=<?php echo $value->id; ?>"> <button type="button" class="btn btn-warning" name="delete" id="delete" value="<?php echo $value->id; ?>">Delete</button></a>
      </tr>
       <?php  }   } ?>
    </tbody>
  </table>
   
  </form>
        <p><?php echo $links; ?></p>
  <p><?php //echo  $this->pagination->create_links(); ?></p>
</div>
<script type="text/javascript">
 
</script>

