<?php include 'header.php'; ?>
<?php
    include 'conn.php';
    $name = $email = $mobile = $password ="";
    $nameErr = $emailErr = $mobileErr = $passwordErr ="";
    session_start();
    if(isset($_POST['submit'])){
      function input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return($data);
      }
      if(empty($_POST['name'])){
        $nameErr = "Enter your name";
      }else{
        $name = input($_POST['name']);
      }
      if(empty($_POST['email'])){
        $emailErr = "Enter your email";
      }else{
        $email = input($_POST['email']);
      }
      if(empty($_POST['mobile'])){
        $mobileErr = "Enter your mobile number";
      }else{
        $mobile = input($_POST['mobile']);
      }
      if(empty($_POST['password'])){
        $passwordErr = "Enter your password";
      }else{
        $password = input($_POST['password']);

      }
      $sql = "SELECT * FROM seller WHERE email = '$email'";
      $fetch = $conn->query($sql);
       if($fetch->num_rows>0){
        $validErr = $email ." is already exist.";
       }
      if(isset($nameErr)&&($emailErr)){
        echo " ";
      } elseif(isset($validErr)){
        echo " ";
      }
      else{
      $_SESSION['sellerEmail'] = $email;
      echo $_SESSION['sellerName'] = $name;
      $query = "INSERT INTO seller VALUES(NULL,'$name','$email','$mobile','$password')";
      $result = mysqli_query($conn,$query);
      
      }
      
    }
    
 ?>

<style type="text/css">
  .reg{
  position: relative;
    width: 50%;
    margin: 0 auto;
    margin-top: 7%;
    background: #fff;
    padding: 40px;
    border-radius: 3px;
    box-shadow: 0px 0px 50px 2px rgb(0 0 0 / 51%);
} 
@media screen and (max-width: 600px){
  .reg{
    width: 75%;
  }
}
</style>
<div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
<div class="container mt-3" style="background: #28a1a785;">
	<h2>DEALER REGISTRATION</h2>
 <div class="reg"> 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" placeholder="name" name="name">
      <p class="text-danger"><?php echo "$nameErr"; ?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control"  placeholder="Email" name="email">
      <p class="text-danger">
        <?php if(isset($validErr)){
          echo "$validErr";
      }else{
        echo "$emailErr";
      } ?>
        
      </p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile</label>
      <input type="" class="form-control"  placeholder="Mobile" name="mobile">
      <p class="text-danger"><?php echo "$mobileErr"; ?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password">
      <p class="text-danger"><?php echo $passwordErr; ?></p>
    </div>
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
</div>
<script>

<?php include 'footer.php'; ?>