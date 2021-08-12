<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="../css/jquery-3.6.0.min.js" >
        $(function() {
            $('form').on('submit', function(e) {
                alert('form enter');
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
    </head>
</html>
