</body>
</html>
<script type="text/javascript">
   /*$(function(){
    $('.hovereffect').tooltip();
   });*/
    $('#selectall').click(function() {
   if($('#selectall').is(':checked')){ 
       $('.hovereffect').removeAttr( "title" );
    }
    else
    {
        $('.hovereffect').attr( "title" );
    }
});
   

</script>
<script type="text/javascript">
$('#selectall').click(function() {

  // all check
    if ($(this).is(':checked')) {
        $('div #selectsinglecheck').attr('checked', true);
    } else {
        $('div #selectsinglecheck').attr('checked', false);
    }
});
    // button hover
     $('.hover-hide').hide();
  $(".hovereffect").mouseover(function(){
   $('.hover-hide').show();
});
  $(".hovereffect").mouseout(function(){
   $('.hover-hide').hide();
});

  /*
}*/



    //image code start for diplay time upload
$("#fileUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "mp4") {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                    if(extn!="mp4") {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image"
                     }).appendTo(image_holder);
                 } else {

                     $("<video />", {
                         "src": e.target.result,
                             "class": "thumb-image"
                     }).appendTo(image_holder);
                 }
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
/*//image code end for diplay time upload*/
</script>
