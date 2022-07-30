<?php 
include 'header.php'; 
session_start();
$sellerId = $_SESSION['sellerEmail'];
?>
<div class="d-flex flex-row-reverse text-light"><p class="m-1  bg-success seller p-2 border-right-0 border-light rounded-left">Hii! <?php echo ucfirst( $_SESSION['sellerName']); ?>, <a href="#">
  <button class="text-danger bg-light"><strong >Logout</strong></button>
</a></p>
</div>
<h1 class="text-center">Edit and Update</h1>
<table class="table table-bordered">
  <thead>
    <th>Sno.</th>
    <th>TYPE</th>
    <th>City</th>
    <th>Pincode</th>
    <th>Price</th>
    <th>Image</th>
    <th colspan="2" class="text-center">Action</th>
  </thead>
  <tbody>
    <?php
    include '../conn.php';
     $query = "SELECT * FROM properties WHERE sellerId = '$sellerId'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){


    while($row = mysqli_fetch_assoc($result)){  ?>
     
     <tr>
      <td>1.</td>
      <td><?php echo $row['type1']." ,".$row['type2']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['pincode']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><img src="uploads/<?php echo $row['mainImage']; ?>" width="150px"></td>
      <td class="text-secondary">Edit</td>
      <td class="text-danger">Delete</td>
    </tr>

     <?php 
   } } else{
    echo "No item found.";
   }?>
      

   

      
       
    
  </tbody>
</table>

<?php include 'footer.php'; ?>