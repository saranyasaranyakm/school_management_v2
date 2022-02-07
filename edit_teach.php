<!DOCTYPE html>
<html lang="en">


                <?php
                  include __DIR__.'/conn.php';
  // die("hai");
              
                 $teach_id=$_REQUEST["teach_id"];

                 if ($teach_id=="") {
                 	die("error");
                 }

                 echo "<script>alert()</script>";

            
// Subsjects
                $teach="SELECT  `teach_reg` .* , `subject`.`sub_name`    FROM   `teach_reg` LEFT JOIN `subject` ON `teach_reg`.`subject` =`subject`.`sub_id` WHERE `teach_id`= '$teach_id'  ";
                     $result = $conn->query($teach);

                  if($result)
                  {
                    if($result->num_rows>0)
                    {
                  while($sub_rows = $result->fetch_assoc())
                          {
                      $teach_id = $sub_rows["teach_id"];

                     $first_name= $sub_rows["first_name"];
                     $last_name= $sub_rows["last_name"];
                     $subject= $sub_rows["subject"];
                     $subj_current_name=$sub_rows["sub_name"];

                           }
                   }

                 }else{
                    echo mysqli_error($conn);
                  }

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
									        <h3 class="main_question"><strong></strong>TeachersRegistration</h3>
									            <div class="form-group"><label>FirstName</label>
										          <input type="text" name="first_name" value="<?php  echo $first_name; ?>" class="form-control required" >
									            </div>
									            <div class="form-group"><label>LastName</label>
									           	<input type="text" name="last_name" value="<?php  echo $first_name; ?>" class="form-control required" >
									            </div>
									            <div class="form-group"><label>Subject</label>
										           <select id="subject" name='subject'>
									             <option value="<?php echo $subject; ?>"  selected >
                                         <?php echo $subj_current_name;  ?>
                                         </option>
        

									                 	<?php
                                         require __DIR__ . '/conn.php';
// Subsjects
                               $sub="SELECT `sub_id`,`sub_name`  FROM `subject`";
                                $result = $conn->query($sub);
                                   if($result)
                                   {
                                      if($result->num_rows>0)
                                      {
                                          while($sub_rows = $result->fetch_assoc())
                                          {
                                          $sub_id = $sub_rows["sub_id"];
                                          $sub_name= $sub_rows["sub_name"];

                                      echo "<option value='$sub_id'>$sub_name</option>";

                                          }
                                      }

                                     }else{
                                          echo mysqli_error($conn);
                                           }


                                 ?>
                                 </select>
								 
                                 <br>
									               <div class="form-group">
									               <input type="text" hidden="" value="<?php  echo  $teach_id?>" name="teach_id">
									              <input type="submit" value="submit" class="btn btn-danger" name="submit">
                                </div>

								             <?php
                                       include __DIR__.'/conn.php';
                                        
                                    

                                          if (isset($_REQUEST["submit"]))
                                         {  
                                        
                                         	$teach_id=$_REQUEST['teach_id'];

                                           $first_name=$_REQUEST['first_name'];

	                                        $last_name=$_REQUEST['last_name'];
	                                         $subject=$_REQUEST['subject'];
	                                        
                                            
	                                       $sql=(" UPDATE `teach_reg` set `first_name`='$first_name',`last_name`='$last_name',`subject`='$subject' WHERE `teach_id`=$teach_id");
                                          
    
                                             $result=$conn->query($sql);
                                            
                                             if ($result==true)

                                              {
                                                echo "<script>alert()</script>";
                                        	     header("Location: teacher_registration.php");
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

