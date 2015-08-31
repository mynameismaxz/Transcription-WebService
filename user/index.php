<?php 
    require("config.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        $query = " 
            SELECT 
                id, 
                username, 
                password,  
                email 
            FROM Member 
            WHERE 
                username = :username 
        "; 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
			$check_password = $_POST['password'];
            //$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            //for($round = 0; $round < 65536; $round++){
            //    $check_password = hash('sha256', $check_password . $row['salt']);
            //} 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 
 
        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $row;  
            header("Location: select_time.php"); 
            die("Redirecting to: select_time.php"); 
        } 
        else{ 
            print("Login Failed."); 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?>  
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Transcription Service : Main Menu</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(assets/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand">Transcription Service : Main</a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a href="new_register/">Register</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Log In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <form action="index.php" method="post"> 
                    Username:<br /> 
                    <input type="text" name="username" value="<?php echo $submitted_username; ?>" /> 
                    <br /><br /> 
                    Password:<br /> 
                    <input type="password" name="password" value="" /> 
                    <br /><br /> 
                    <input type="submit" class="btn btn-info" value="Login" /> 
                </form> 
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Welcome to Transcription Service</h2>
	<p>Welcome to Intelligent transcription system for hearing impaired. There are instructions as follows:</p>
    <p>
    <li>
    Broadcaster must <a href="new_register">Register</a> on right-hand side of the website. The information required to be shown in the figure below.</li>
    <p align="center"><img src="images/pic01.png"></p>
    <li>
    After that, Broadcaster can Login upper right corner by login from username and password that made from the first step.</li>
    <p align="center"><img src="images/pic02.png"></p>
    <li>
    When you Login successfully, The system will take to the page for booking time to use this service, which required the topic imformation, start time and end time.</li>
    <p align="center"><img src="images/pic03.png"></p>
    <li>
    If the time has already been booked. The system will alert to broadcaster to using "Auto Speech Recognition(ASR)" and then will show how to use the system.</li>
    </p>
    <!-- <p>But you can't access it just yet! You'll need to log in first. Use Bootstrap's nifty navbar dropdown to access the form.</p>
    <h2>There are 2 ways you can log in:</h2>
    <ul>
        <li>Try out your own user + password with the <strong>Register</strong> button in the navbar.</li>
        <li>Use the default credentials to save time:<br />
            <strong>user:</strong> admin<br />
            <strong>pass:</strong> password<br /></li>
    </ul> -->
</div>

<p align="center">Copyright(C) - Co'DIA Labs KMUTT, CB4 Building, 9th-10th Floor, 126 Pracha-Uthit Road, Bang Mod, Thung Khru, Bangkok 10140</p>
</body>
</html>