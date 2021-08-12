<?php
require 'view.php';

$count = 1;
while ($row = mysqli_fetch_assoc($result)) {
     $id = $row['customer_id'];
     $name = $row['customer_name'];
     $age = $row['customer_age'];
     $email = $row['customer_email'];
     $gender = $row['customer_gender'];
     $dob = $row['customer_dob'];
     $address = $row['customer_address'];
?>
     <form id="form-view" actiondel="<?php echo $base_url; ?>Server/delete.php" actiondel1="<?php echo $base_url; ?>Client/viewuser.php?page=<?php echo $page ?>" method="POST">
          <tr>
               <td><?= $id; ?></td>
               <td><?= $name; ?></td>
               <td><?= $age; ?></td>
               <td><?= $email; ?></td>
               <td><?= $gender; ?></td>
               <td><?= $dob; ?></td>
               <td><?= $address; ?></td>

               <td><button class='btn btn-danger btn-sm delete-btn' id="<?= $id; ?>">Delete</button></td>

               <td> <a href='<?php echo $base_url; ?>Client/edituser.php?customer_id="<?= $id; ?>"&page=<?= $page; ?>' class='btn btn-info'>Edit</a></td>
          </tr>
     <?php
     $count++;
     }
     ?>
     </form>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
     <script>
          // $(document).on("click", ".delete-btn", function() {
          //      // e.preventDefault();
          //      var customer_id = $(this).attr("id");
          //      if (confirm("Are you sure delete this ?" + customer_id)) {
          //           var element = this;
          //           $.ajax({
          //                url: "<?php echo $base_url; ?>server/delete.php",
          //                type: "POST",
          //                cache: false,
          //                data: {
          //                     "customer_id": customer_id
          //                },
          //                success: function(data) {
          //                     alert("User record deleted successfully");
          //                     $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php?page=<?php echo $page ?>');
          //                }
          //           });
          //      }
          // });
     </script>
     <script type="text/javascript" src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js" ></script>
<script type="text/javascript" src="<?php echo $base_url; ?>controller/control.js"></script>