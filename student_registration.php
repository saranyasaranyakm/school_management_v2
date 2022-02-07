<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/head.php'; ?>
</head>
<?php 
require __DIR__ . '/conn.php';

 
if (isset($_REQUEST["Ssubmit"]))
 { 
   $first_name=$_REQUEST['first_name'];
	 $last_name=$_REQUEST['last_name'];
	  $class=$_REQUEST['class'];
	   $age=$_REQUEST['age'];

	   $sql="INSERT INTO `stud_reg`( `first_name`, `last_name`,`class`,`age`) VALUES ('$first_name','$last_name','$class','$age')";

    // die("hai");
      $result=$conn->query($sql);
       if ($result==true) {
       	echo "success";
       }else{
       	echo "enter your details";
       }

}

 ?>

	<!-- /menu -->

				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form action="#" method="POST">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong></strong>Student Registration</h3>
                                     <div class="form-group"><label>FirstName</label>
										<input type="text" name="first_name" placeholder="FirstName" class="form-control required" >
									</div>
									<div class="form-group"><label>LastName</label>
										<input type="text" name="last_name" placeholder="LastName" class="form-control required" >
									</div>
									<div class="form-group"><label>class</label>
									<input type="text" name="class" placeholder="class" class="form-control required" >
									</div>
									<div class="form-group"><label>Age</label>
									<input type="text" name="age" placeholder="age" class="form-control required" >
									</div>
										
								  </div>
								  <div>

									<div class="form-group">
										<input type="submit" name="Ssubmit" class="form-control required btn btn-primary" >
										

								</div>

									<!-- </div> -->
									<!-- <div class="form-group">
								
								
		
			<!-- /content-right-->
		<!-- </div> -->
		<!-- /row-->
	<!-- </div> -->
	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<!--  -->
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	 <div class="row">
            
            <div class="col-12" >
                       <table class="table table-bordered table-hover" id="customer_table">
    
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                     <th>Class</th>
                    <th>age</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="customer_table_tbody" >

           <?php

    
      
         include __DIR__.'/conn.php';
         
         
       
         
          
         
         
         
         $students = "SELECT * FROM stud_reg LEFT JOIN class ON stud_reg.class = class.class_id";

          $result=$conn->query($students);
         
             
           
              if ($result->num_rows>0)
               {
                  while ($sub_row=$result->fetch_assoc())
                   {

                     $stud_id=$sub_row["stud_id"];
                     $first_name=$sub_row["first_name"];
                     $last_name=$sub_row["last_name"];
                     $age= $sub_row["age"];
                     $class= $sub_row["class_name"];
 ?>
                       
                       <tr>
                       <td><?php  echo "$stud_id"; ?> </td>
                       <td><?php  echo "$first_name"; ?> </td>
                       <td><?php  echo "$last_name"; ?></td>
                       <td><?php  echo "$age"; ?></td>
                       <td><?php  echo "$class"; ?></td>
                        <td>
                        <a href="<?php  echo "edit_stud.php?stud_id=$stud_id";  ?>" class="btn btn-info" name="delete" id="delete_customer-form_submit">edit
                        </a>
                         <a href="<?php  echo "?delete_id=$stud_id";  ?>" class="btn btn-danger" name="delete" >Delete</a>
                       
                        <?php 
                        require __DIR__ . '/conn.php';


                      if (isset($_REQUEST["delete_id"])) 
                      {

                      	
                      	 $delete_id=$_REQUEST['delete_id'];

                        if (empty($errors)) {

	                        $sql="DELETE FROM  `stud_reg` WHERE `stud_id`='$delete_id'";
	                        $delete_teacher=$conn->query($sql);

	                       header("Location: student_registration.php");
                             if($delete_teacher==false)
    	                          {
    		                         $errors[]="error".mysqli_error($conn);
    	                          }
                             $response["status"]="ok";  
                            $response["message"]="Customer Deleted";  
    
    
                            }
                              else{
    
                                 $response["status"]="error";
                                $response["message"]="Couldn't Fetch Customer ID";
                                      }
                   }
                        ?>
                      

                        
                     <tr>
                      
<?php
        }
      
    }else{
      // echo "mysqli_error($conn)";
    }
 ?>



             </tbody>
                
            </div>
          
            
        </div>
        
        </div>
       
          
          
      </div>
      <div class="modal-footer">
             </div>
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/review_func.js"></script>

</body>
</html>