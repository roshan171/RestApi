<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="">

    </div>

    <div id="load-data">
    <table id="load-table" border="1" cellspadding="10px" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Image</th>

        </tr>

    </table>
    </div>
    




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

    $.ajax({
      url: "fetchjson.php",
       type:"post",
       dataType:"json",
    success:function(data){
        //  console.log(data);
        $.each(data,function(key,value){
            $("#load-table").append("<tr><td>"
            +value.id + "</td><td>" + value.name+"</td><td>"+value.email+"</td><td>"+value.gender+"</td><td>"+value.status+"</td><td>"+value.image+"</td></tr>")
        })
    }
    });


    </script>
</body>
</html>