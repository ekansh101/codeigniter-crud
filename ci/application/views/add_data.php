
<div class="container">
  <h2>Add EMP</h2>
 
  <form action="crud/submit_record" method="post" enctype='multipart/form-data'>
        <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
        <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
        <div class="form-group">
      <label for="password">Job profile:</label>
      <textarea cols="3" rows="5" name="job_profile"></textarea>
    </div>
        <div class="form-group">
      <label for="password">Job Description:</label>
      <textarea cols="3" rows="5" name="job_description"></textarea>
    </div>
    <div class="form-group" style="height: 300px; width: 300px">
      <label for="file">Image:</label>
      <input type="file" class="form-control" id="fileUpload" placeholder="Enter password" name="file_name">
      <div id="image-holder"></div>
    </div>
     <div class="form-group">
      <label for="file">show/Hide:</label>
      <select name="show-hide" id="show-hide" class="show-hide">
        <option value="0">select</option>
         <option value="0">Show</option>
          <option value="1">Hide</option>
      </select>
    </div>
  <!--   <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
  </form>
</div>
<script>
                        CKEDITOR.replace( 'job_profile' );
                         CKEDITOR.replace( 'job_description' );
                </script>