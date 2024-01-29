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

    <div id="loaddata">

    </div>
    




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

$(document).ready(function(){
    $.ajax({
    url:"https://jsonplaceholder.typicode.com/posts",
    type:"GET",
    success:function(data){
console.log(data);
    },
    });

});
    </script>
</body>
</html>