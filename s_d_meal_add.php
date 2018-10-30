<?php
  /* 
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	*/
	
?>

<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<?php include_once 'headers/header.php'; ?>
		
	    <!-- css to the relevant page  -->
    	<style>	</style>
    </head>

 	<body class="w3-white" >
        <!-- Page header -->
		<header>
			<?php
			if($_SESSION['utype']=='2') {
				include_once './navigations/nav3.php';

			}else if($_SESSION['utype']=='3'){
				include_once './navigations/nav4.php';
			}
			?>	
		</header>
		
<!--*************************************************************************************content***********************************************************************************-->
		<div class="site-main container" style="margin-bottom:40px">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Meals</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-10 col-lg-offset-1">
                        <hr>
                        <h1>THE TENTH HOTEL
                        <span>ELLA , SRI LANKA</span>
                        </h1>
				    </div>		
				</div> 
			</div>	
			<!--****************************************************************my content here*****************************************************************************-->
					
			<div class="section-page-content row">
				<div class="col-lg-10 col-lg-offset-1 w3-white">
				<div class="w3-card-4 w3-col s12 w3-margin">
					<div class="w3-margin">			
						<div class="w3-container w3-padding ">
							<a href="Meals.php"><i style="font-size:24px" class="w3-button w3-margin w3-display-topright fa">&#xf00d;</i></a>
							
							<div class="row w3-margin w3-xxxlarge "><img src="assets/img/dinning/admin/food1.png" style="width:21%">&nbsp;</i>Enter Meal </div>
						</div>
						<div class="w3-container w3-col s7">
							<form   id="add_meal" method="post" action="config/system_user.php" enctype="multipart/form-data">
								<div class="w3-half w3-padding">      
									<input class="w3-input w3-border" name="meal_id" type="text" placeholder="Meal ID"  id="meal_id" value=""></div>
								<div class="w3-half w3-padding">      
									<input class="w3-input w3-border" name="meal_name" type="text" placeholder="Meal Name"  id="meal_name"></div>
								<div class="w3-padding">
									<textarea class="w3-select w3-border" name="meal_desc" type="text" placeholder=" Meal Description"  id="meal_desc" rows="6" cols="40"  > </textarea></div>
								<div class="w3-padding">
									<select class="w3-select w3-border" name="eType" data-validation="required" data-validation-error-msg="Please Select a Category" id="eType">
										<option value=""  selected>---Select establishment type---</option>
                                        <?php
											$myrow =$obj ->viewDetails("establishment_type");
											foreach($myrow as $row){
											echo "<option value='". $row['e_id'] ."'>" . $row['e_type'] . "</option>";
											}
										?>
										</select></div>
								<div class="w3-padding">
									<input class="w3-input w3-border" name="price_per_meal" type="text" placeholder="Price per meal"  id="price_per_meal"></div>
								<div class="w3-padding">
									<select class="w3-select w3-border" name="cType" data-validation="required" data-validation-error-msg="Please Select a Category" id="cType">
										<option value=""  selected>---Select Cuisine---</option>
                                        <?php
											$myrow =$obj ->viewDetails("cuisine");
											foreach($myrow as $row){
											echo "<option value='". $row['cuisine_id'] ."'>" . $row['c_name'] . "</option>";
											}
										?>
                                    </select></div>
						</div>
								<div class="w3-border w3-col s4   w3-center"style="margin-top:8px;">
									<div class="w3-padding ">
										<h2>Upload a photo</h2><hr/>
										<div id="imageVal" style="width:100%;height:100%"><img id="myImg" src="assets/img/dinning/admin/meal5.png" alt="meal image" class="w3-image" style="width:68%;height:80%"/>
										</div>
										<br>		
									<!--	<input type="file" name="fileToUpload" id="fileToUpload" class="w3-btn w3-block w3-black w3-padding-large">-->
										<input type="file" name="file" id="file" class="w3-btn w3-block w3-black w3-padding-large">
										
										<div class="w3-padding ">
											
											<span id="uploaded_image"></span>
										</div>
									</div>
								</div>
								<div class="w3-row-padding w3-margin-bottom">	
									<div class="w3-half">
										<input type="submit" class="w3-btn w3-green w3-block " name="meal_add" value="Add Meal">
									</div> 
									<div class="w3-half">
										<input type="reset" class="w3-btn w3-red w3-block " name="meal-cancel" value="Cancel">
									</div>								
								</div>
																
							</form>
							<div id="result"></div>
																				
					</div> 
				</div> 
			</div> 
		</div> 		
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
		    <?php
				if($_SESSION['utype']=='2') {
					include_once './footers/footer3.php';

				}else if($_SESSION['utype']=='3'){
					include_once './footers/footer4.php';
				}
			?>	
		</footer>
   		
        <!--java script-->
        <script>
			
			
			//open home page
			function openIndexWin() {
				window.location='index.php';
			}

			//fuction for sub drop down
			$(document).ready(function(){
				$('.dropdown-submenu a.test').on("click", function(e){
				$(this).next('ul').toggle();
				e.stopPropagation();
				e.preventDefault();
				});
			});
	
			//validation to upload image 
			$(document).ready(function(){
			$(document).on('change', '#file', function(){
			var name = document.getElementById("file").files[0].name;
			var form_data = new FormData();
			var ext = name.split('.').pop().toLowerCase();
				if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
				{
					$("#file").val('');  
					$('#uploaded_image').html("<label class='text-danger'>Invalid Image File</label>");
					return false;  
				
				}
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("file").files[0]);
			var f = document.getElementById("file").files[0];
			var fsize = f.size||f.fileSize;
			if(fsize > 2000000)
			{
				$('#uploaded_image').html("<label class='text-danger'>Image File Size is very big</label>");
				return false;   
			}
			else
			{
			form_data.append("file", document.getElementById('file').files[0]);
			$.ajax({
				url:"upload.php",
				method:"POST",
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend:function(){
				$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
				},   
				success:function(data)
				{
				$('#imageVal').html(data);
				}
			});
			}
			});
			});
			
        </script>
	</body>
</html>
