<?php
  session_start();
  if(isset($_SESSION['sellerEmail'])){ 
    $sellerId = $_SESSION['sellerEmail'];
    include 'header.php'; 
  ?>
<?php
//====><=====//
$type1 = $type2 = $state = $city = $price = $address= $mainImg = $description = "";
$type1Err = $type2Err = $stateErr = $cityErr = $priceErr =$addressErr = $mainImgErr = $descriptionErr = "";

if(isset($_POST['submit'])){
  function input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return($data);
      } 
      if(empty($_POST['type1'])){
        $type1Err = "Please Select Property Type.";
      }else{
       echo $type1 = input($_POST['type1']);
      }
      if(empty($_POST['type2'])){
        $type2Err = "Please Choose anyone.";
      }else{
        echo $type2 = input($_POST['type2']);
      }
      if(empty($_POST['state'])){
        $stateErr = "Please Select State.";
      }else{
       echo $state = input($_POST['state']);
      }
      if(empty($_POST['city'])){
        $cityErr = "Please Select State.";
      }else{
       echo  $city = input($_POST['city']);
      }
      if(empty($_POST['price'])){
        $priceErr = "Please Select State.";
      }else{
        $price = input($_POST['price']);
      }
      if(empty($_POST['address1'])){
        $addressErr = "Please Select State.";
      }else{
        $address = input($_POST['state']);
      }
      if(empty($mainImg)){
        $mainImgErr ="Please Choose image";
      }else{
        $mainImg ;
      }
      if(empty($description)){
        $descriptionErr = $_POST['description'];
      }
      $address1 = $_POST['address1'];
      $regularPrice = $_POST['regularPrice'];
      include '../conn.php';
       
      
//=====>image<=====//
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  // if($check !== false) {
  //   echo "File is an image - " . $check["mime"] . ".";
  //   $uploadOk = 1;
  // } else {
  //   echo "File is not an image.";
  //   $uploadOk = 0;
  // }

// Check if file already exists
if (file_exists($target_file)) {
  $mainImgErr = "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  $mainImgErr ="Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $mainImgErr ="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $mainImgErr ="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo $mainImg = $_FILES["fileToUpload"]["name"];
  } else {
    $mainImgErr = "Sorry, there was an error uploading your file.";
  }
}
if(isset($mainImg)){
  $query = "INSERT INTO properties VALUES(NULL,'$type1','$type2','$state','$city','$address','$address1','$regularPrice','$price','$mainImg','$sellerId')";
      $result = mysqli_query($conn,$query);


  }


}
?>
 
 <div class="d-flex flex-row-reverse text-light"><p class="m-1  bg-success seller p-2 border-right-0 border-light rounded-left">Hii! <?php echo ucfirst( $_SESSION['sellerName']); ?>, <a href="#">
  <button class="text-danger bg-light"><strong >Logout</strong></button>
</a></p>
</div>
	<div class="container">

			<h2>List Your Prperties</h2>
			<form method="post" enctype="multipart/form-data" action="" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Property Type</label>
      <select class="form-control" name="type1">
        <option value="Resident">RESIDENT</option>
        <option value="Villa">Villa</option>
        <option value="Flat">Flat</option>
        <option value="Hotel">Hotel</option>
      </select>
    </div>
    <div class="form-group col-md-6 mt-4">
      <input type="radio" name="type2" value="On Rent">
      <label for="rent">On Rent</label>
      <input type="radio" name="type2" value="On Sale">
      <label for="sale" >On Sale</label>
      <input type="radio" name="type2" value="On Lease">
      <label for="sale">On Lease</label>
      
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state">
        <option value="uttar pradesh">uttar pradesh</option>
        <option value="delhi">delhi</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <select id="inputState" class="form-control" name="city">
        <option value="noida">noida</option>
        <option value="Ncr"> Ncr delhi</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputAddress2">Pincode</label>
    <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "number"
        maxlength = "6" minlength="6" class="form-control" id="inputAddress2" placeholder="Pincode" name="address1">

    </div>
    
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea placeholder="Enter about your Property..." class="form-control" name="description"></textarea>
    
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">₹ Regular Price</label>
      <input type="text" class="form-control" id="inputCity" name="regularPrice">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Price</label>
      <input type="text" class="form-control" id="inputCity" name="price">
    </div>
  </div>
  <div class="form-group">
    <input type="file" name="fileToUpload" id="fileToUpload"> 
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
</form>
</div>

<?php include 'footer.php';}else{
  header('location:login.php');
} ?>