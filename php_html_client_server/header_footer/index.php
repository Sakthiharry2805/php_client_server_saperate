<?php
require 'baseurl.php';
?>
<html>

<head>
    <title>Customer Details</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script type="text/javascript" src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/bootstrap.min.css">
    
        <script>
        $(document).ready(function(){
        $("#add").click(function(){
            $("#file").load("<?php echo $base_url; ?>Client/adduser.php");
        });
        $("#view").click(function(){
            $("#file").load("<?php echo $base_url; ?>Client/viewuser.php");
        });
        });
        </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <button class="button"><a href="<?php echo $base_url; ?>Client/adduser.php">Add user</a></button>
                        <button class="button1"><a href="<?php echo $base_url; ?>Client/viewuser.php">View users</a></button>
                        <!-- <button id="add">Add user</button>
                        <button id="view">View users</button> -->
                        <!-- <button class="button1"><a href="<?php echo $base_url; ?>Server/viewtablepage.php">View page users</a></button> -->
                    </ul>

                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <div id="file"></div>
    </div>
</body>

</html>