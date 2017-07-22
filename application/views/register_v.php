<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
#inputName {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
#inputEmail, #inputPassword, #inputConPassword {
    border-radius: 0;
    margin-bottom: -1px;
}
#inputPhone {
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
           <?php if($this->session->flashdata('register_success')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('register_success');?>
                    </div>
                </div>
           <?php endif; ?>
       </div>
        <?php
         
            if($this->session->flashdata('error')){
                echo $this->session->flashdata('error');
            }
            $form_attr = array('class' => "form-signin" ,  'id' => "form-register");
            echo form_open('register/process', $form_attr);
        ?>  
        <h2 class="form-signin-heading">Register Here!</h2>
        <?php 
            echo form_label('Full Name', 'inputName' , array ( 'class' => "sr-only"));
            $name_attr = array('name'=> 'name', 'class'=>'form-control', 'placeholder' => 'Full Name', 'id' => 'inputName', 'type' => 'text');
            echo form_input($name_attr);
        
            echo form_label('Email Address', 'inputEmail' , array ( 'class' => "sr-only"));
            $email_attr = array('name'=> 'email', 'class'=>'form-control', 'placeholder' => 'Email address', 'id' => 'inputEmail', 'type' => 'text');
            echo form_input($email_attr);

            echo form_label('Password', 'inputPassword' , array ( 'class' => "sr-only"));
            $pass_attr = array('name'=> 'password', 'class'=>'form-control', 'placeholder' => 'Password' , 'id' => 'inputPassword');
            echo form_password($pass_attr); 
        
            echo form_label('Confirm Password', 'inputConPassword' , array ( 'class' => "sr-only"));
            $con_pass_attr = array('name'=> 'con_password', 'class'=>'form-control', 'placeholder' => 'Confirm Password' , 'id' => 'inputConPassword');
            echo form_password($con_pass_attr); 
        
            echo form_label('Phone', 'inputPhone' , array ( 'class' => "sr-only"));
            $email_attr = array('name'=> 'phone', 'class'=>'form-control', 'placeholder' => 'Phone', 'id' => 'inputPhone', 'type' => 'tel');
            echo form_input($email_attr);
        
            echo '<br>';
        
            $btn_attr = array('name'=> 'submit', 'content'=>'Register', 'class' => 'btn btn-lg btn-primary btn-block' , 'type' => 'submit' );
            echo form_button($btn_attr);

            echo form_close();
        ?>
        
    </div> <!-- /container -->

</body>
</html>