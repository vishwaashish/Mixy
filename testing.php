<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row">
 <form method="post" action="">
  <div class="col-md-6">
    <input type="text" class="form-control" name="image_path" placeholder="Enter Image URL">
  </div>
  <div class="col-md-6">
    <input type="submit" class="btn btn-primary" name="post_image" value="Submit">
  </div>
 </form>
</div>
</body>
</html>
<?php
if(isset($_POST['post_image']))
{
 $image_url=$_POST['image_path'];
 $data = file_get_contents($image_url);
 $new = 'assets/img/postimage/'.time().'.jpg';
 $upload =file_put_contents($new, $data);
 if($upload) {
     echo "<img src='assets/img/studysoln-logo.jpg'>";
 }else{
    echo "Please upload only image files";
 } 
}
?>