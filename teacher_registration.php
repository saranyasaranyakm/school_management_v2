<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/head.php'; ?>
</head>
<?php 
require __DIR__ . '/conn.php';

 
if (isset($_REQUEST["Tsubmit"]))
 {
    
   $first_name=$_REQUEST['first_name'];

	 $last_name=$_REQUEST['last_name'];
	  $subject=$_REQUEST['subject'];
	 

	   $sql="INSERT INTO `teach_reg`( `first_name`, `last_name`,`subject`) VALUES ('$first_name','$last_name','$subject')";

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
									<h3 class="main_question"><strong></strong>TeachersRegistration</h3>
									<div class="form-group"><label>FirstName</label>
										<input type="text" name="first_name" placeholder="FirstName" class="form-control required" >
									</div>
									<div class="form-group"><label>LastName</label>
										<input type="text" name="last_name" placeholder="LasrrstName" class="form-control required" >
									</div>
									<div class="form-group"><label>Subject</label>
										<select name="subject"    class="form-control required" >
    										<?php 
                                            require __DIR__ . '/conn.php';

                                        $subjects="SELECT `sub_id`, `sub_name` FROM `subject` ";
                                       $result=$conn->query($subjects);
                                        if ($result) {
                                           if ($result->num_rows>0) {
                                       while ($sub_row=$result->fetch_assoc()) {
                                             $sub_id=$sub_row["sub_id"];
                                          $sub_name=$sub_row["sub_name"];
                                         echo "<option value='$sub_id'>$sub_name</option>";

                                    }
                                   }
                                }else{
                            echo "mysqli_error($conn";
                             }
                            ?>
								  </div>
								  <div>
                                 <br>
									<div class="form-group">
										<input type="submit" name="Tsubmit" class="form-control required btn btn-primary" >
										

								</div>
								<br>
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
				
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /table view -->
	 <div class="row">
            
            <div class="col-12" >
                       <table class="table table-bordered table-hover" id="customer_table">
    
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subject</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="customer_table_tbody" >

<?php

    
      
         include __DIR__.'/conn.php';
         
         
       
         
           if(isset( $_REQUEST["view"])){
              
        }
      
         
         
         
         $teachers = " SELECT * FROM teach_reg
                     LEFT OUTER JOIN subject ON teach_reg.subject=subject.sub_id";

          $result=$conn->query($teachers);
         if($result){
             
           
           if ($result->num_rows>0) {
        while ($sub_row=$result->fetch_assoc()) {

          $teach_id=$sub_row["teach_id"];
            $first_name=$sub_row["first_name"];
            $last_name=$sub_row["last_name"];
             $subject= $sub_row["sub_name"];
          ?>  <tr>
                         <td><?php  echo "$teach_id"; ?> </td>
                       <td><?php  echo "$first_name"; ?></td>
                       <td><?php  echo "$last_name"; ?></td>
                       <td><?php  echo "$subject"; ?></td>
                       <td>
                       <a href="<?php  echo "edit_teach.php?teach_id=$teach_id";  ?>" class="btn btn-info" name="edit" id="delete_customer-form_submit">edit
                        </a>


                       <a href="<?php  echo "?delete_id=$teach_id";  ?>" class="btn btn-danger" name="delete" >Delete</a>
                       
                        <?php 
                        require __DIR__ . '/conn.php';
; 

                      if (isset($_REQUEST["delete_id"])) {

                      	
                      	 $delete_id=$_REQUEST['delete_id'];

                        if (empty($errors)) {

	                        $sql="DELETE FROM  `teach_reg` WHERE `teach_id`='$delete_id'";
	                        $delete_teacher=$conn->query($sql);

	                       header("Location: teacher_registration.php");
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
      }
    }else{
      // echo "mysqli_error($conn)";
    }
 ?>



             </tbody>
        </table>
        
                
                
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





