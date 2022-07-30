<?php include 'header.php'; ?>
<style type="text/css">
  .login {
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
<div class="container mt-3 login">
	<h2>DEALER LOGIN</h2>
<form action="" method="post">
  <div class="form d-block">
    <div class="form-group">
      <label for="inputEmail4">Email ID</label>
      <input type="email" class="form-control"  placeholder="Email Id" name="email">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password">
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
  <button type="submit" class="btn btn-primary" name="login">Log in</button>

</form>
<?php
  if(isset($_POST['login'])){
    $email =$_POST['email'];
    $password = $_POST['password'];
    include 'conn.php';
    $query = "SELECT * FROM seller WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($result)) {
      if(count($row)>0){
        session_start();
       $_SESSION['sellerEmail'] = $row['email'];
      $_SESSION['sellerName'] = $row['name'];
        header('location:provider/list.php');
        }
        else{
      echo "Please enter correct detaiuls";
    }
    }
    

  }
  ?>
</div>

<?php include 'footer.php'; ?>