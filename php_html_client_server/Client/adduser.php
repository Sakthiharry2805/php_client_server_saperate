<script type="text/javascript">
  // function validate(str) {
  //   if (str.length == 0) {
  //     document.getElementById("txtHint").innerHTML = "";
  //     return;
  //   } else {
  //     var xmlhttp = new XMLHttpRequest();
  //     xmlhttp.onreadystatechange = function() {
  //       if (this.readyState == 4 && this.status == 200) {
  //         resp = JSON.parse(this.responseText);
  //         status = resp.status;
  //         if (status == 0) {
  //           $('#submitbtn').removeAttr('disabled');
  //         } else if (status == 1) {
  //           $('#submitbtn').attr('disabled', 'disabled');
  //         }
  //         message = resp.message;
  //         //console.log(resp.status);
  //         document.getElementById("txtHint").innerHTML = message;
  //         document.getElementById("")
  //       }
  //     }
  //     xmlhttp.open("GET", "<?php echo $base_url; ?>validation/validation.php?customer_email=" + str, true);
  //     xmlhttp.send();
  //   }
  // }
</script>

<div class="container">
  <div class="row">

    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <h4>Add New User</h4>
        <form id="form-add" action="<?php echo $base_url; ?>Server/add.php" 
        action1="<?php echo $base_url; ?>/Client/viewuser.php" 
        actionval="<?php echo $base_url; ?>validation/validation.php?customer_email=" method="POST">

          <label>Name:</label>
          <input type="text" name="name" value="" placeholder="Enter your name" class="form-control" autofocus required><br>

          <label>Age:</label>
          <input type="number" name="age" value="" placeholder="Enter your age" class="form-control" required><br>

          <label>Email:</label>
          <input id="emailcheck" type="email" name="email" value="" placeholder="Enter your email" class="form-control" onchange="validate(this.value)" required>
          <p><span id="txtHint"></span></p><br>

          <label>Gender:</label>
          <label class="form-control">
            <input type="radio" name="gender" value="Male" checked>
            <label>Male</label>
            <input type="radio" name="gender" value="Female">
            <label>Female</label>
            <input type="radio" name="gender" value="Other">
            <label>Other</label>
          </label>
          <br>

          <label>Date Of Birth:</label>
          <input type="date" name="dob" value="" class="form-control" required><br>


          <label for="Address">Address:</label>
          <input type="textarea" name="address" value="" placeholder="Enter your address" class="form-control" required><br>

          <!-- <input type="submit" value="Submit" name="submit" class="btn btn-success" > -->
          <input id="submitbtn" type="submit" name="addnew" class="btn btn-success" value="Submit">

        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js" ></script>
<script type="text/javascript" src="<?php echo $base_url; ?>controller/control.js"></script>
<?php
require '../header_footer/indexfooter.php'
?>