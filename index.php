<?php 
$msg = '';
$color='';
if(filter_has_var(INPUT_POST,'submit')){
   
    $name =htmlspecialchars( $_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['msg']);
    if(!empty($name) && !empty($email) && !empty($message)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            $msg='Input valid Email';
            $color='alert-danger';
            
        }
        else{
            //validate
            $toreciever = 'emmanuelfubelem@gmail.com';
            $subject = 'contact request from ' .$name;
            $body = "<h2>Contact Request</h2>
            <h3> Name</h3><p>' .$name'</p>
            <h3> Email</h3><p>' .$email'</p>
            <h3> Message</h3><p>' .$msg'</p> 
            ";

            //header infos

            $header = "MIME version 1.0" ."\r\n";
            $header .="content type:text/html;charset=UTF-8" ."\r\n";
            $header .= "from : " .$name ."<" .$email .">" ."\r\n";
            if(mail($toreciever,$subject,$body,$header)){
                $msg='message sent';
                $color='alert-success';
                
            }
            else{
                $msg='message not sent';
                $color='alert-danger';
                
            }
        }
   

    }
    else{
       $msg='please fill the form';
       $color='alert-danger';
      
    }


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
       <h1 class="logo">Phenom</h1>
      </form>
    </div>
  </div>
</nav>
<!--end of navigation bar -->
<br><br>
<div class="container">
    <!--to show alert if form is empty -->
    <?php if($msg !=''):?>
        <div class="alert <?php echo $color;?>"> <?php  echo $msg;?></div>
    <?php endif ?>
    <!--end of alert -->
<form method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="mb-3">
    <label for="" class="form-label">Your name</label>
    <input type="text" class="form-control" value="<?php echo isset($_POST['name'])? $name:'';?>" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" value="<?php echo isset($_POST['email'])? $email:'';?>" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Your message</label>
    <input type="text" class="form-control" value="<?php echo isset($_POST['msg'])? $message:'';?>" name="msg">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
    
</body>
</html>