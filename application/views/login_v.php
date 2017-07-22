<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
       <style>
        body {
            background-color: #eee;
            padding-bottom: 40px;
            padding-top: 40px;
            color: #333;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857;
        }
        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
.form-signin .form-signin-heading, .form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <?php //print_r($this->session->flashdata());?>    
    <div class="container">
       <div class="row">
           <?php if($this->session->flashdata('logout_success')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('logout_success');?>
                    </div>
                </div>
           <?php endif; ?>
       </div>
        <?php
         
            if($this->session->flashdata('error')){
                echo $this->session->flashdata('error');
            }
            $form_attr = array('class' => "form-signin" ,  'id' => "form-signin");
            echo form_open('login_c/process', $form_attr);
        ?>  
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php 
            echo form_label('Email Address', 'inputEmail' , array ( 'class' => "sr-only"));
            $email_attr = array('name'=> 'email','value' => set_value('email',''), 'class'=>'form-control', 'placeholder' => 'Email address', 'id' => 'inputEmail', 'type' => 'email');
            echo form_input($email_attr);

            echo form_label('Password', 'inputPassword' , array ( 'class' => "sr-only"));
            $pass_attr = array('name'=> 'password', 'class'=>'form-control', 'placeholder' => 'Password' , 'id' => 'inputPassword');
            echo form_password($pass_attr); 

            $btn_attr = array('name'=> 'submit', 'content'=>'Sign in', 'class' => 'btn btn-lg btn-primary btn-block' , 'type' => 'submit' );
            echo form_button($btn_attr);

            echo form_close();
        ?>
        
    </div> <!-- /container -->

</body>
</html>