<html>  
    <head>  
        <title>Pesan Masuk</title>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
            <div class="container">
                <br />
                
                <h3 align="center">Pesan Masuk</a></h3><br />
                <br />
                
                <div class="table-responsive">
                    <h4 align="center">Online User</h4>
                    <p align="right">Hi - <?php echo $user['nama']; ?></p>
                </div>
            </div>
    </body>  

    <!-- <script src="http://localhost/projectTubesRekweb/assets/js/chat.js"></script> -->
</html>  

<script>
$(document).ready(function(){

fetch_user();

function fetch_user()
{
    $.ajax({
        url: 'fetch_user',
        method:"POST",
        success:function(data){
        $('#user_details').html(data);
        }
    })
}

});  
</script>