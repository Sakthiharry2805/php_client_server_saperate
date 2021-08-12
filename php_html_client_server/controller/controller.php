<!-- document.writeln('<script src="../css/jquery-3.6.0.min.js" type="text/javascript"></script>'); -->
<script src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js"></script>
<script>
  $(document).on("click", ".delete-btn", function() {
    // e.preventDefault();
    var customer_id = $(this).attr("id");
    if (confirm("Are you sure delete this ?" + customer_id)) {
      var element = this;
      $.ajax({
        url: "<?php echo $base_url; ?>server/delete.php",
        type: "POST",
        cache: false,
        data: {
          "customer_id": customer_id
        },
        success: function(data) {
          alert("User record deleted successfully");
        }
      });
    }
  });
  $(document).on("click", ".edit-btn", function() {
    // e.preventDefault();
    var customer_id = $(this).attr("id");
    if (confirm("Are you sure delete this ?" + customer_id)) {
      var element = this;
      $.ajax({
        url: "<?php echo $base_url; ?>Client/edit.php",
        type: "POST",
        cache: false,
        data: {
          "customer_id": customer_id
        },
        success: function(data) {
          $(location).attr('href', '<?php echo $base_url; ?>Client/edituser.php');
        }
      });
    }
  });

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
  $(function() {
    $('form').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?php echo $base_url; ?>Server/update.php',
        data: $('form').serialize(),
        success: function() {
          alert('form was updated');
          $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
        }
      });
    });
  });

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

  $(function() {

    $('form').on('submit', function(e) {
      // 
      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '<?php echo $base_url; ?>Server/add.php',
        data: $('form').serialize(),
        success: function() {
          alert('form was submitted');
          $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
        }
      });

    });

  });
</script>