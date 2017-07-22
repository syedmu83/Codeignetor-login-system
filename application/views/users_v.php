<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
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
           .table {}
    </style>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <?php //print_r($this->session->flashdata());?>    
    <div class="container">
       
        <div class="row">
            <div class="col-md-12">
               <?php if($this->session->flashdata('edit_success')) : ?>
                    <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('edit_success');?>
                    </div>
               <?php endif; ?>
               <?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                          <?php echo $this->session->flashdata('error');?>
                </div>
               <?php endif; ?>
                <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Users</div>
                  <?php 
                    echo form_open('users_c/delete_multi');  
                  ?>
                  <!-- Table -->
                  <table class="table">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($users as $user){  
                            $id = $user['id']; 
                        ?>
                        <tr>
                            <td><?php echo form_checkbox('ids[]',$user['id']);?></td>
                            <td><?php echo $user['id']?></td>
                            <td><?php echo $user['name']?></td>
                            <td><?php echo $user['email']?></td>
                            <td><?php echo $user['phone']?></td>
                            <td><?php echo anchor('users_c/edit/'.$id,'<i class="glyphicon glyphicon-pencil"></i>');?></td>
                            <td><?php echo anchor('users_c/delete/'.$id,'<i class="glyphicon glyphicon-remove"></i>');?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <th colspan="7">
                            <?php 
                                $btn_attr = array('name'=> 'submit', 'content'=>'Delete Selected', 'class' => 'btn btn-sm btn-primary' , 'type' => 'submit' );
                                echo form_button($btn_attr); 
                            ?>
                        </th>
                    </tfoot>
                  </table>
                  <?php echo form_close();?>
                </div>
                
            </div>
        </div>
        
    </div> <!-- /container -->

</body>
</html>


