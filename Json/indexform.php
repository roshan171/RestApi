<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Submit form data in json file</h2>
<form action="saveform.php" method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">Id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" 
    placeholder="id">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
    placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="city" name="city">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email">
  </div>
  <button type="submit" class="btn btn-primary" name="submit ">Submit</button>
</form>

    
</body>
</html>