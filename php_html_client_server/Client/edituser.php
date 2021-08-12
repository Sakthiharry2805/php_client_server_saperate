<?php
// require '../header_footer/baseurl.php';
require '../header_footer/index.php';
require '../Server/edit.php';
?>
<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script>
  function validate(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          resp = JSON.parse(this.responseText);
          status = resp.status;
          if (status == 0) {
            $('#submitbtn').removeAttr('disabled');
          } else if (status == 1) {
            $('#submitbtn').attr('disabled', 'disabled');
          }
          message = resp.message;
          //console.log(resp.status);
          document.getElementById("txtHint").innerHTML = message;
          document.getElementById("")
        }
      }
      xmlhttp.open("GET", "<?php echo $base_url; ?>validation/validation.php?customer_email=" + str, true);
      xmlhttp.send();
    }
  }
</script>
<script>
  // $(function() {
  //   $('form').on('submit', function(e) {
  //     e.preventDefault();
  //     $.ajax({
  //       type: 'post',
  //       url: '<?php echo $base_url; ?>Server/update.php',
  //       data: $('form').serialize(),
  //       success: function() {
  //         alert('form was updated');
  //         // $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
  //         $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php?page=<?php echo $page ?>');
  //       }
  //     });
  //   });
  // });
</script>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <h4>Update User</h4>
        <?php $row = mysqli_fetch_assoc($result); ?>
        <form id="form-update" actionup="<?php echo $base_url; ?>Server/update.php" 
        actionup1="<?php echo $base_url; ?>/Client/viewuser.php?page=<?php echo $page ?>"
        actionvalup="<?php echo $base_url; ?>validation/validation.php?customer_email=" method="POST" >
          <input type="hidden" value="<?php echo $row['customer_id']; ?>" name="customer_id">

          <label>Name:</label>
          <input type="text" name="name" value="<?php echo $row['customer_name']; ?>" class="form-control" autofocus required><br>

          <label>Age:</label>
          <input type="number" name="age" value="<?php echo $row['customer_age']; ?>" class="form-control" required><br>

          <label>Email:</label>
          <input id="emailcheckup" type="email" name="email" value="<?php echo $row['customer_email']; ?>" class="form-control" onchange="validate(this.value)" required>
          <p><span id="txtHint"></span></p><br>

          <label>Gender:</label>
          <label class="form-control">
            <input type="radio" name="gender" value="Male" <?php if ($row['customer_gender'] == "Male") echo "checked"; ?>>
            <label>Male</label>
            <input type="radio" name="gender" value="Female" <?php if ($row['customer_gender'] == "Female") echo "checked"; ?>>
            <label>Female</label>
            <input type="radio" name="gender" value="Other" <?php if ($row['customer_gender'] == "Other") echo "checked"; ?>>
            <label>Other</label>
          </label><br>

          <label>Date Of Birth:</label>
          <input type="date" name="dob" value="<?php echo $row['customer_dob']; ?>" class="form-control" required><br>

          <label for="Address">Address:</label>
          <input type="textarea" name="address" value="<?php echo $row['customer_address']; ?>" class="form-control" required><br>

          <!-- <input type="submit" name="update" class="btn btn-success" value="Update"> -->
          <input id="submitbtn" type="submit" name="addnew" class="btn btn-success" value="Update">
          <!-- <script>
                    function update(){
                        window.location('viewuser.php');

                    }
                </script> -->
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js" ></script>
<script type="text/javascript" src="<?php echo $base_url; ?>controller/control.js"></script>
<?php
require_once '../header_footer/indexfooter.php';
?>