// $.getScript('php_html_client_server/css/jquery-3.6.0.min.js', function() {
//     // script is now loaded and executed.
//     // put your dependent JS here.

// });
// document.write('<script src="../css/jquery-3.6.0.min.js" type="text/javascript"></script>'); { /* <script  src="../css/jquery-3.6.0.min.js" type="text/javascript" ></script> */ }
// $(document).ready(function() {
//     $("#form-add").submit(function() {
//         var action = $('#form-add').attr("action");
//         // var form_data = {
//         //     fsp_email: $('#fsp_email').val(),
//         //     fsp_password: $('#fsp_password').val(),
//         //     is_ajax: 1
//         // }; 
//         $.ajax({
//             type: 'post',
//             url: action,
//             data: $('#form-add').serialize(),
//             // contentType: "application/x-www-form-urlencoded; charset=UTF-8",
//             success: function() {
//                 alert('form was submitted');
//                 window.location.href = '<?php echo $base_url; ?>/Client/viewuser.php';
//                 // $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
//             }
//         });
//     });
// });
$(document).ready(function() {
    $('#form-add').on('submit', function(e) {
        var action = $('#form-add').attr('action');
        var action1 = $('#form-add').attr('action1');

        e.preventDefault();
        $.ajax({
            type: 'post',
            url: action,
            data: $('form').serialize(),
            success: function(response) {
                // if (response == 'success') {
                alert('form was submitted');
                $(location).attr('href', action1);

                // }
            }
        });
    });
    $('#form-update').on('submit', function(e) {
        var actionup = $('#form-update').attr('actionup');
        var actionup1 = $('#form-update').attr('actionup1');

        e.preventDefault();
        $.ajax({
            type: 'post',
            url: actionup,
            data: $('form').serialize(),
            success: function(response) {
                // if (response == 'success') {

                alert('form was updated');
                // $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
                $(location).attr('href', actionup1);

                // }

            }
        });
    });
});
$(document).on("click", ".delete-btn", function() {
    // e.preventDefault();
    var customer_id = $(this).attr("id");
    if (confirm("Are you sure delete this ?" + customer_id)) {
        var element = this;
        var actiondel = $('#form-view').attr('actiondel');
        var actiondel1 = $('#form-view').attr('actiondel1');
        $.ajax({
            url: actiondel,
            type: "POST",
            cache: false,
            data: {
                "customer_id": customer_id
            },
            success: function(response) {
                // if (response == 'success') {
                alert("User record deleted successfully");
                $(location).attr('href', actiondel1);

                // }
            }
        });
    }
});
// $(document).ready(function() {

//     $('#emailcheck').onchange({
//         errorLabelContainer: "#cs-error-note",
//         wrapper: "li",
//         rules: {
//             email: {
//                 required: true,
//                 email: true,
//                 remote: {
//                     url: "validation.php",
//                     type: "post"
//                 }
//             }
//         },
//         messages: {
//             email: {
//                 required: "Please enter your email address.",
//                 email: "Please enter a valid email address.",
//                 remote: "Email already in use!"
//             }
//         },
//     });

// });
$(document).ready(function() {
    $('#emailcheck').on('change', function(e) {
        var str = $('#emailcheck').attr('value');
        // var actionup1 = $('#form-update').attr('actionup1');

        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'http://localhost:1001/validation/validation.php',
            data: { "customer_email": str },

            success: function(response) {
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
                        // xmlhttp.open("GET", (actionval + str), true);
                        // xmlhttp.send();
                        // resp = JSON.parse(this.responseText);
                        // status = resp.status;
                        // alert(status);
                        // if (response == 0) {
                        //     $('#submitbtn').removeAttr('disabled');
                        // } else if (response == 1) {
                        //     $('#submitbtn').attr('disabled', 'disabled');
                        // }
                }
            }
        });
    });
});
// $(document).ready(function() {
//     $('form').on('submit', function(e) {
//         var actionup = $('#form-update').attr('actionup');
//         var actionup1 = $('#form-update').attr('actionup1');

//         e.preventDefault();
//         $.ajax({
//             type: 'post',
//             url: actionup,
//             data: $('form').serialize(),
//             success: function(response) {
//                 // if (response == 'success') {

//                 alert('form was updated');
//                 // $(location).attr('href', '<?php echo $base_url; ?>/Client/viewuser.php');
//                 $(location).attr('href', actionup1);

//                 // }

//             }
//         });
//     });
// });
// $(document).on("change", "#emailcheck", function() {
//     alert("enter into email validation");
//     var actionval = $('#form-add').attr('actionval');
//     var str = $('#emailcheck').attr('onchange');

//     if (str.length == 0) {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 resp = JSON.parse(this.responseText);
//                 status = resp.status;
//                 if (status == 0) {
//                     $('#submitbtn').removeAttr('disabled');
//                 } else if (status == 1) {
//                     $('#submitbtn').attr('disabled', 'disabled');
//                 }
//                 message = resp.message;
//                 //console.log(resp.status);
//                 document.getElementById("txtHint").innerHTML = message;
//                 document.getElementById("")
//             }
//         }
//         xmlhttp.open("GET", (actionval + str), true);
//         xmlhttp.send();
//     }
// });
// $(document).on("change", "#emailcheckup", function validate(str) {
//     var actionval = $('#form-update').attr('actionvalup');

//     if (str.length == 0) {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 resp = JSON.parse(this.responseText);
//                 status = resp.status;
//                 if (status == 0) {
//                     $('#submitbtn').removeAttr('disabled');
//                 } else if (status == 1) {
//                     $('#submitbtn').attr('disabled', 'disabled');
//                 }
//                 message = resp.message;
//                 //console.log(resp.status);
//                 document.getElementById("txtHint").innerHTML = message;
//                 document.getElementById("")
//             }
//         }
//         xmlhttp.open("GET", (actionvalup + str), true);
//         xmlhttp.send();
//     }
// });