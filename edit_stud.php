<!DOCTYPE html>
<html lang="en">


                <?php
                  include __DIR__.'/conn.php';
  
              
                 $stud_id=$_REQUEST["stud_id"];

                 if ($stud_id=="") {
                 	die("error");
                 }

            $stud="SELECT * FROM `stud_reg` WHERE `stud_id`=$stud_id";


             $GET_QRY = mysqli_fetch_assoc(mysqli_query($conn, $stud));
 


                 $stud_id=$GET_QRY["stud_id"];
                $first_name= $GET_QRY["first_name"];
                  $last_name= $GET_QRY["last_name"];
                  $class= $GET_QRY["class"];
                   $age= $GET_QRY["age"];
               //
      ?>
   <head>
	<?php include 'templates/head.php';
	 ?>
</head>

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
						<form action="" method="GET">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong></strong>Edit Student </h3>
                                     <div class="form-group"><label>FirstName</label>
										<input type="text" value="<?php  echo $first_name; ?>" name="first_name"class="form-control required" >
									</div>
									<div class="form-group"><label>LastName</label>
									<input type="text" value="<?php  echo $last_name; ?>" name="last_name" class="form-control required" >
										
							   </div>
									<div class="form-group"><label>class</label>
									<input type="text" value="<?php  echo $class; ?>" name="class" class="form-control required" >
									
									</div>
									<div class="form-group"><label>Age</label>
									<input type="text" value="<?php  echo $age;  ?>" name="age" 
									 class="form-control required" >
									</div>
										
								  </div>
								  <div>

									<div class="form-group">
									<input type="text" hidden="" value="<?php  echo  $stud_id?>" name="stud_id">
									<input type="submit" value="submit" class="btn btn-danger" name="submit">
                         
                                   <?php
                                       include __DIR__.'/conn.php';
                                        
                                    

                                          if (isset($_REQUEST["submit"]))
                                         {  
                                        
                                         	$stud_id=$_REQUEST['stud_id'];

                                           $first_name=$_REQUEST['first_name'];

	                                        $last_name=$_REQUEST['last_name'];
	                                         $class=$_REQUEST['class'];
	                                        $age=$_REQUEST['age'];
                                            
	                                       $sql=(" UPDATE `stud_reg` set `first_name`='$first_name',`last_name`='$last_name',`class`='$class',`age`='$age' WHERE `stud_id`=$stud_id");
                                          
    
                                             $result=$conn->query($sql);
                                            
                                             if ($result==true)
                                              {
                                        	     header("Location: student_registration.php");
                                              } 
                                              else{
                                     	      echo "enter your details";
                                                  }
                                             
                                        }

                                   ?>



								</div>

									<!-- </div> -->
									<!-- <div class="form-group">
								
								
		
			<!/content-right-->
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

