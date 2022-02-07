<!DOCTYPE html>
<html lang="en">
<?php 
require __DIR__ . '/conn.php';

 
if (isset($_REQUEST["Ssubmit"]))
 {
   $subject=$_REQUEST['subject'];
	 

	   $sql="INSERT INTO `subject`( `sub_name`) VALUES ('$subject')";

    // die("hai");
      $result=$conn->query($sql);
       if ($result==true) {
       	$out= "success";
       }

}

 ?>
<head>
	<?php include 'templates/head.php'; ?>
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
						<form action="#" method="POST">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong></strong>Subjects</h3>
									
									
									<div class="form-group"><label>Subject</label>
										<input type="text" name="subject"  class="form-control required" >
										
								  </div>

								  <div>

									<div class="form-group">
										<input type="submit" name="Ssubmit" class="form-control required btn btn-primary" >
										

								</div>
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
                    
                    <th>Subject</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="subject_table_tbody" >
         <?php

    
      
         include __DIR__.'/conn.php';
         
         
       
         
           if(isset( $_REQUEST["view"])){
              
              }
      
         
         
         
         $subject = " SELECT * FROM subject ";

          $result=$conn->query($subject);
          if($result){
             
           
              if ($result->num_rows>0)
               {
                  while ($sub_row=$result->fetch_assoc())
                   {

                     $class_id=$sub_row["sub_id"];
                     $class_name=$sub_row["sub_name"];
                     
 ?>
                       
                       <tr>
                       <td><?php  echo "$class_id"; ?> </td>
                       <td><?php  echo "$class_name"; ?> </td>
                       <td><button type="button" class="btn btn-warning" id="edit_customer-form_submit">Edit</button>
                       <a href="<?php  echo "?delete_id=$class_id";  ?>" class="btn btn-danger" name="delete" >Delete</a>
                       
                        

                             <?php 
                        require __DIR__ . '/conn.php';
; 

                      if (isset($_REQUEST["delete_id"])) {

                      	
                      	 $delete_id=$_REQUEST['delete_id'];

                        if (empty($errors)) {

	                        $sql="DELETE FROM  `subject` WHERE `sub_id`='$delete_id'";
	                        $delete_subject=$conn->query($sql);
	                    header("Location:subject_reg.php");
                             if($delete_subject=false)
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
                      

                        </td>
                       <tr>
                       
                   <?php  

                    }
                } 
                else
                {
      echo "mysqli_error($conn)";
                }
          }
      ?>
             </tbody>
        </table>
        
                
                
            </div>
          
            
        </div>
        <div class="row"> 
        <div class="col-3" style="display:inline-block" ;>
             <button type="button" onclick="load_table()" class="btn btn-primary">Reload</button>
              
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

 