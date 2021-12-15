
<html >
	<head>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<title>Create Faculty</title>
		  <link href='css/bootstrap.css' rel='stylesheet' />
		  <link href='css/Admin_Detail_Button.css' rel= 'stylesheet'>
		<style type="text/css">
		.input-size{
		width : 10em;
		}
		
		</style>
	</head>
	
<body>
<?php 

					
					function validatedPersonalAdd(){
						if(isset($_POST["personaladd"])){
							
							include 'DBConnection.php';
	
						
							$name = trim($_POST["name"]);
							$gender = trim($_POST["gender"]);
							$department = trim($_POST["department"]);
							$nationality = trim($_POST["nationality"]);
							$nrc = trim($_POST["NRC"]);
							$dob = trim($_POST["dob"]);;
							$phone = trim($_POST["phone"]);
							$email = trim($_POST["email"]);
							$personaladdress = trim($_POST["address"]);
							$city = trim($_POST["city"]);
							$state = trim($_POST["state"]);
							$country = trim($_POST["country"]);
							$address = trim($_POST["address"]);
							$dob = date('Y-m-d',strtotime($dob));
							
							$NRCMatch = preg_match("/^([1|2|3|4|5|6|7|8|9]{1}|[1]{1}[0|1|2|3|4]{1})\/[a-zA-Z]{3,7}\([N]\)[0-9]{6}$/",$nrc);
							if(!$NRCMatch){
								displayForm(array(), "nrcNM");
							}
							else{
							
						$sqlPersonalNRC = "SELECT nrc from staff WHERE nrc=\"$nrc\"";
							$resultsqlPersonalNRC = $conn->query($sqlPersonalNRC);
							
							
						if($resultsqlPersonalNRC->num_rows > 0){
							
							displayForm(array(),"nrc");	
				
							}
						else
						{
							
								$sqlPersonal = "INSERT INTO staff(name,gender,nationality,nrc,date_of_birth,phone,email,city,address,state,country) VALUES(\"$name\",\"$gender\",\"$\",\"$\",\"$\",\"$nationality\",\"$\",\"$nrc\",\"$dob\",\"$phone\",\"$email\",\"$city\",\"$address\",\"$state\",
												\"$country\");";
							
								$resultsqlPersonal = $conn->query($sqlPersonal);
						 
							  $personalid = $conn->insert_id;

							
						$sqlPersonalUserType = "SELECT user_type_id from user_type WHERE user_type_nrc=\"$nrc\"";
							$resultsqlPersonalUserType = $conn->query($sqlPersonalUserType);
							if($resultsqlPersonalUserType->num_rows >0){
									
								while($row = $resultsqlPersonalUserType->fetch_assoc()){
									 $user_id = $row["user_type_id"];

									//$sqlPersonalID = "INSERT INTO staff(user_type_id) VALUES($user_id) WHERE staff_id=$personalid";
									$sqlPersonalID = "UPDATE staff SET user_type_id=$user_id WHERE staff_id=$personalid;";
									$resultsqlPersonalID = $conn->query($sqlPersonalID);
										}
								
							}
									
							
						$sqlPersonalDepartment = "SELECT department_id from department WHERE department_name=\"$department\"";
							$resultsqlPersonalDepartment = $conn->query($sqlPersonalDepartment);
							
								if($resultsqlPersonalDepartment->num_rows >0){
									
										while($row = $resultsqlPersonalDepartment->fetch_assoc()){
									 			$d_id = $row["department_id"];
												//$sqlDP = "INSERT INTO staff(department_id) VALUES($department_id) WHERE staff_id=$personalid";
												$sqlDP = "UPDATE staff SET department_id=$d_id WHERE staff_id=$personalid;";
												$resultsqlDP = $conn->query($sqlDP);
									
												}
					}
					
					
						if(getimagesize($_FILES['imageUpload']['tmp_name']) == FALSE){
								displayForm(array(), "image");
								}
							else{
							$image = addslashes($_FILES['imageUpload']['tmp_name']);
								$name = addslashes($_FILES['imageUpload']['name']);
								$image = file_get_contents($image);
								$image = base64_encode($image);
								
								$sqlImage = "INSERT INTO image(image_data,image_name) VALUES ('$image','$name')";
								$resultsqlImage = $conn->query($sqlImage);
	
								$imageID = $conn->insert_id;
							
							$sqlDisplayImage = "SELECT * FROM image WHERE image_id=$imageID";
									$resultsqlDisplayImage = $conn->query($sqlDisplayImage);
										if($resultsqlDisplayImage->num_rows > 0){
												while($rowImage = $resultsqlDisplayImage->fetch_assoc()){
													$img =$rowImage["image_data"];
													echo "<div class=\"container\">";
													echo "<br><br><br><br>";
													echo '<img ="200" width="200" src = "data:image;base64,'.$img.'">';
													echo "</div>";
					}
					}
								
						}
					
					
						
						$sqlImageUpload = "UPDATE staff SET image_id=$imageID WHERE staff_id=$personalid";
						$resultsqlImageUpload = $conn->query($sqlImageUpload);

						}
					 displayForm(array(),"");
						}
					}
					
					}		

 if(isset($_POST["personaladd"])){
	
	processPersonal();
	
}
else if(isset($_POST["eduadd"])){
	//displayForm(array(), "education");
	processEducation();
}

else if(isset($_POST["serviceadd"])){
	processService();
}

else if(isset($_POST["bondadd"])){
	processBond();
}

else {
	//echo "</br></br></br>";
  displayForm(array(),"");
}


////////////////////////////////////////////////////////////////////  Validation

function validateField( $fieldName, $missingFields ) {
if ( in_array( $fieldName, $missingFields ) ) {
		echo 'has-error';
	
}
}

function setValue( $fieldName ) {

if ( isset( $_POST[$fieldName] ) ) {
echo $_POST[$fieldName];
}
	
if($fieldName == "NRC"){
	if(isset( $_POST[$fieldName] )){
		$nrc = trim($_POST[$fieldName]);
		$NRCMatch = preg_match("/^([1|2|3|4|5|6|7|8|9]{1}|[1]{1}[0|1|2|3|4]{1})\/[a-zA-Z]{3,6}\([N]\)[0-9]{6}$/",$nrc);
	if(!$NRCMatch){
		echo "";
	}
	}
	}
}

function setChecked( $fieldName, $fieldValue ) {
if ( isset( $_POST[$fieldName] ) and $_POST[$fieldName] == $fieldValue ) {
	
echo 'checked="checked"';
}
}

function setSelected( $fieldName, $fieldValue ) {
if ( isset( $_POST[$fieldName] ) and $_POST[$fieldName] == $fieldValue ) {
echo 'selected="selected"';
}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////// IMAGE SECTION





///////////////////////////////////////////////////////////////////////////////////////////////////    IMAGE

function processPersonal(){
$requiredFields = array("name","gender","department"
 						,"nationality","NRC","dob","phone","email","address","city","state","country");
 
}

function processEducation(){
$requiredFields = array("edugrade","edulocation","edustartdate","eduenddate");
 
}


function processService(){
$requiredFields = array("servicename","servicepayscale","servicestartdate","serviceenddate","serviceheaddepartment","servicesubdepartment","servicedepartment");
 
}




function processBond(){
$requiredFields = array("bondtitle","bondtype","bondregisterdate","bondperiod","bondamount");
}




function displayForm($missingFields,$a) {
	
	
	
 
	
	
	 if($a=="nrc"){?>
	</br></br></br>
	<div class="alert alert-danger alert-dismissable" role="role">You have already created account for this faculty.<a href="Admin_CreateFaculty.php" data-dismiss="alert" class="close">&times;</a></div>
	<?php }
	if($a=="nrcNM"){?>
	</br></br></br>
	<div class="alert alert-danger alert-dismissable" role="role">The NRC Number is not in a correct format.<a href="Admin_CreateFaculty.php" data-dismiss="alert" class="close">&times;</a></div>
	<?php }?>
		
	
	<div class='navbar navbar-default navbar-fixed-top'>
		<div class='container'>
	
			<a href='/' class='navbar-brand text-left title'>Faculty Management System</a>
			<ul class='nav navbar-nav navbar-right subtitle '>
			
				
				<li><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_HomePage2.php">Main Menu</a></li>
				<li><a href="Logout.php">Sign out</a></li>
			</ul>
		
		</div>
	</div>
	

	
	
	<div class='container'>
		
		<form action="Admin_CreateFaculty.php" method="post" enctype="multipart/form-data" class="form-horizontal">
			
				<div class="form-group">
				</br></br></br></br></br>
				<input type="file" name="imageUpload" /><br/>
				
				
				</div>
			
		

		
		
		<!--          PERSONAL DETAIL                                      -->
		
		<legend><strong>Personal Detail</strong></legend>
	<!-- 	<form action="Admin_CreateFaculty.php" method="post" > 	  -->
			
				<div class = "form-group">
					<div class = 'row'>
						
						<div class= 'col-md-2 text-left <?php validateField("name",$missingFields)?>'>
						<label for = "name" >Name</label>
						</div>
						<div class= 'col-md-4 <?php validateField("name",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="name" value="<?php setValue("name")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("phone",$missingFields)?>'>
						<label for = "phone" >Phone Number</label>
						</div>
						<div class='col-md-4 <?php validateField("phone",$missingFields)?>'>
						<input type = "number" class="form-control input-sm" name="phone" value="<?php setValue("phone")?>"/>
						</div>
					</div>
				</div>
				
				
				
				<div class = "form-group">
					<div class = 'row'>
	
						
						<div class='col-md-2 text-left <?php validateField("gender",$missingFields)?>'>
						<label for = "gender" >Gender</label>
						</div>
						<div class='col-md-4 <?php validateField("gender",$missingFields)?>'>
						<input type="radio" name="gender" value="Male" <?php setChecked( "gender","Male" )?>/>Male
						<input type="radio" name="gender" value="Female" <?php setChecked( "gender","Female" )?>/>Female
						</div>
						<div class= 'col-md-2 text-right <?php validateField("email",$missingFields)?>'>
						<label for = "email" >Email</label>
						</div>
						<div class= 'col-md-4 <?php validateField("email",$missingFields)?>'>
						<input type = "email" class="form-control input-sm" name="email" value="<?php setValue("email")?>"/>
						</div>
					</div>
				
				
			</div>
			
			
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left'>
						<label for = "" > </label>
						</div>
						<div class='col-md-4'>
						<input type="radio" name="" value="single" <?php setChecked( "","single" )?> />Single
						<input type="radio" name="" value="married" <?php setChecked( "","married" )?>/>Married
						</div>
						<div class= 'col-md-2 text-right <?php validateField("address",$missingFields)?>'>
						<label for = "address" >Address</label>
						</div>
						<div class= 'col-md-4 <?php validateField("address",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="address" value="<?php setValue("address")?>"/>
						</div>
					</div>
				</div>
				
				
				
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("department",$missingFields)?>'>
						<label for = "department" >Department</label>
						</div>
						<div class='col-md-4 <?php validateField("department",$missingFields)?>'>
						<select name="department" class="form-control">
							<option value="Python">Python</option>			
							<option value="Information System">Information System</option>
							<option value="Software Engineering">Software Engineering</option>
							<option value="MariaDB">MariaDB</option>
							<option value="Java">Java</option>
							<option value="Computer Networks">Computer Networks</option>
	  					</select>
						</div>
						<div class= 'col-md-2 text-right <?php validateField("city",$missingFields)?>'>
						<label for = "city" >City</label>
						</div>
						<div class= 'col-md-4 <?php validateField("city",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="city" value="<?php setValue("city")?>"/>
						</div>
					</div>
				</div>
				
				
				

				
			
			
			
				<div class = "form-group">
					<div class = 'row'>
						<div class= 'col-md-2 text-left <?php validateField("country",$missingFields)?>'>
						<label for = "country" >Country</label>
						</div>
						<div class= 'col-md-4 <?php validateField("country",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="country" value="<?php setValue("country")?>"/>
						</div>
					</div>
				</div>
		
			
			
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("nationality",$missingFields)?>'>
						<label for = "nationality" >Nationality</label>
						</div>
						<div class='col-md-4 <?php validateField("nationality",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="nationality" value="<?php setValue("nationality")?>"/>
						</div>					
						<div class= 'col-md-1 text-right col-md-offset-1'>
						<label for = "" ></label>
						</div>
  						
						</div>
				</div>
			
		
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("NRC",$missingFields)?>'>
						<label for = "NRC"  pattern="/^([1|2|3|4|5|6|7|8|9]{1}|[1]{1}[0|1|2|3|4]{1})\/[a-zA-Z]{3,7}\([N]\)[0-9]{6}$/">NRC</label>
						</div>
						<div class='col-md-4 <?php validateField("NRC",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="NRC" value="<?php setValue("NRC")?>"/>
						</div>

					</div>
				</div>
		
			
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("dob",$missingFields)?>'>
						<label for = "dob" >Date of Birth</label>
						</div>
						<div class='col-md-4 <?php validateField("dob",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="dob" value="<?php setValue("dob")?>"/>
						</div>
					</div>
				</div>
			
			
			
		
			
			
			
				<div class = "form-group">
					<div class = 'row'>
	
						
						<div class='col-md-2 text-left <?php validateField("",$missingFields)?>'>
						<label for = "" >Native Town</label>
						</div>
						<div class='col-md-4 <?php validateField("",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="" value="<?php setValue("")?>" />
						</div>
						</div>
						</div>
						
						
			
		
				
		
			
			<div class="form-group">
					<button type="submit" class="btn btn-info center-block" name="personaladd" >Add</button>
				</div>
				
			<br><br>
				
				
				
		<legend><strong>Education Qualification</strong></legend>
		
			
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("edugrade",$missingFields)?>'>
						<label for = "edugrade" >Grade</label>
						</div>
						<div class='col-md-4 <?php validateField("edugrade",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="edugrade" value="<?php setValue("edugrade")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("edulocation",$missingFields)?>'>
						<label for = "edulocation" >Location</label>
						</div>
						<div class='col-md-4 <?php validateField("edulocation",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="edulocation" value="<?php setValue("edulocation")?>"/>
						</div>
					</div>
				</div>
				
				
				
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("edustartdate",$missingFields)?>'>
						<label for = "edustartdate" >Start Date</label>
						</div>
						<div class='col-md-4 <?php validateField("edustartdate",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="edustartdate" value="<?php setValue("edustartdate")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("eduenddate",$missingFields)?>'>
						<label for = "eduenddate" >End Date</label>
						</div>
						<div class='col-md-4 <?php validateField("eduenddate",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="eduenddate" value="<?php setValue("eduenddate")?>"/>
						</div>
					</div>
				</div>
				
				
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm" name="eduadd">Add</button>
				</div>
				
				<div class='row'>
				<div class='col-md-12'>
					<table class='table table-bordered table-striped table-hover'>
					<thead>
						<tr class='education_table'>
							<td ><strong>Grade</strong></td>
							<td ><strong>Start Date</strong></td> 
							<td ><strong>End Date</strong></td>
							<td ><strong>Location</strong></td>
							<td ><strong>Action</strong></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					
			if($a=="education"){
						if(isset($_POST["eduadd"])){
							
							include 'DBConnection.php';
							$edugrade = trim($_POST["edugrade"]);
							$edustartdate = trim($_POST["edustartdate"]);
							$eduenddate = trim($_POST["eduenddate"]);
							$edulocation = trim($_POST["edulocation"]);
							
							$edustartdate = date('Y-m-d',strtotime($edustartdate));
							$eduenddate = date('Y-m-d',strtotime($eduenddate));
							
							
							$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
							
							
							$sqlEdu = "INSERT INTO education(grade,start_date,end_date,location,staff_id)
									  VALUES(\"$edugrade\",\"$edustartdate\",\"$eduenddate\",\"$edulocation\",$lastID);";
							$resultsqlEdu = $conn->query($sqlEdu);
						
						$sqlEduSelect = "SELECT edu_id,grade,start_date,end_date,location FROM education WHERE staff_id=$lastID;";
						$resultsqlEduSelect = $conn->query($sqlEduSelect);
						
						if($resultsqlEduSelect->num_rows>0){
									
							while($row = $resultsqlEduSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["grade"]."</td>";
									echo "<td>".$row["start_date"]."</td>";
									echo "<td>".$row["end_date"]."</td>";
									echo "<td>".$row["location"]."</td>";
									
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?edudelete=<?php echo $row["edu_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="eduDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
					}
			}
					
						if(isset($_GET["edudelete"])){
							
							include 'DBConnection.php';
							$id = (int)$_GET["edudelete"];
							$sqlEduDelete = "DELETE FROM education WHERE edu_id=$id";
							$resultsqlEduDelete = $conn->query($sqlEduDelete);
							
						$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
						
						$sqlEduSelect = "SELECT edu_id,grade,start_date,end_date,location FROM education WHERE staff_id=$lastID;";
						$resultsqlEduSelect = $conn->query($sqlEduSelect);
						
						if($resultsqlEduSelect->num_rows>0){
									
							while($row = $resultsqlEduSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["grade"]."</td>";
									echo "<td>".$row["start_date"]."</td>";
									echo "<td>".$row["end_date"]."</td>";
									echo "<td>".$row["location"]."</td>";
									
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?edudelete=<?php echo $row["edu_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="eduDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
							
						}
			 
					
					?>
					
					</tbody>
				</table>
			</div>
		</div>
		</form>		
		<br><br>
		
		
			<legend><strong>Service Record</strong></legend>
		<form action ="" method="post">
			<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("servicename",$missingFields)?>'>
						<label for = "servicename" >Rank Name</label>
						</div>
						<div class='col-md-4 <?php validateField("servicename",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="servicename" value="<?php setValue("servicename")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("servicepayscale",$missingFields)?>'>
						<label for = "servicepayscale" >Pay Scale</label>
						</div>
						<div class='col-md-4 <?php validateField("servicepayscale",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="servicepayscale" value="<?php setValue("servicepayscale")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("servicestartdate",$missingFields)?>'>
						<label for = "servicestartdate" >Start Date</label>
						</div>
						<div class='col-md-4 <?php validateField("servicestartdate",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="servicestartdate" value="<?php setValue("servicestartdate")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("serviceenddate",$missingFields)?>'>
						<label for = "serviceenddate" >End Date</label>
						</div>
						<div class='col-md-4 <?php validateField("serviceenddate",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="serviceenddate" value="<?php setValue("serviceenddate")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("serviceheaddepartment",$missingFields)?>'>
						<label for = "serviceheaddepartment" >Head Department</label>
						</div>
						<div class='col-md-4 <?php validateField("serviceheaddepartment",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="serviceheaddepartment" value="<?php setValue("serviceheaddepartment")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("servicesubdepartment",$missingFields)?>'>
						<label for = "servicesubdepartment" >Sub Department</label>
						</div>
						<div class='col-md-4 <?php validateField("servicesubdepartment",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="servicesubdepartment" value="<?php setValue("servicesubdepartment")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("servicedepartment",$missingFields)?>'>
						<label for = "servicedepartment" >Department</label>
						</div>
						<div class='col-md-4 <?php validateField("servicedepartment",$missingFields)?>'>
						<select name="servicedepartment">
							<option value="Python" selected="selected">Python</option>
							<option value="myanmr">Myanmar</option>
							<option value="informationsystem">Information System</option>
							<option value="computationalmathematic">Software Engineering</option>
							<option value="software">Software</option>
							<option value="Java">Java</option>
							<option value="Computer Networks">Computer Networks</option>
	  					</select>
	  					</div>
						<div class='col-md-2 text-right'>
						<label for = "service" ></label>
						</div>
						<div class='col-md-4'>
						<input type = "text" class="form-control input-sm" name="service" value="<?php setValue("service")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm" name="serviceadd">Add</button>
				</div>
				
				<div class='row'>
				<div class='col-md-12'>
					<table class='table table-bordered table-striped table-hover'>
					<thead>
						<tr class='education_table'>
							<td ><strong>Rank Name</strong></td>
							<td ><strong>Pay Scale</strong></td>
							<td ><strong>Start Date</strong></td> 
							<td ><strong>End Date</strong></td>
							<td ><strong>Head Department</strong></td>
							<td ><strong>Sub Department</strong></td>
							<td ><strong>Department</strong></td>
							<td ><strong></strong></td>
							<td ><strong>Action</strong></td>
							
						</tr>
					</thead>
					<tbody>
					<?php 
						if($a=="service"){
						if(isset($_POST["serviceadd"])){
							include 'DBConnection.php';
							
							$servicename = trim($_POST["servicename"]);
							$servicepayscale = trim($_POST["servicepayscale"]);
							$servicestartdate = trim($_POST["servicestartdate"]);
							$serviceenddate = trim($_POST["serviceenddate"]);
							$serviceheaddepartment = trim($_POST["serviceheaddepartment"]);
							$servicesubdepartment = trim($_POST["servicesubdepartment"]);
							$servicedepartment = trim($_POST["servicedepartment"]);
							$service = trim($_POST["service"]);
							
							
							
							$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);  
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
							$department_id = 0;
							$sqlServiceDepartment = "SELECT department_id from department WHERE department_name=\"$servicedepartment\"";
							$resultsqlServiceDepartment = $conn->query($sqlServiceDepartment);
							if($resultsqlServiceDepartment->num_rows >0){
									
								while($rowD = $resultsqlServiceDepartment->fetch_assoc()){
									 $department_id = $rowD["department_id"];
									$GLOBALS['department_id'] = $rowD["department_id"];
										}
								
							}
							$servicestartdate = date('Y-m-d',strtotime($servicestartdate));
							$serviceenddate = date('Y-m-d',strtotime($serviceenddate));
							
							$sqlRank = "INSERT INTO rank(rank_scale,rank_name) VALUES(\"$servicepayscale\",\"$servicename\");";
							$resultsqlRank = $conn->query($sqlRank);
							
							$fk_rank = $conn->insert_id;
							
							$sqlServiceRecord = "INSERT INTO service_record(start_date,end_date,head_department,sub_department,,department_id,staff_id)
												 VALUES(\"$servicestartdate\",\"$serviceenddate\",\"$serviceheaddepartment\",\"$servicesubdepartment\",\"$service\",$department_id,$lastID);";
							
							$resultsqlServiceRecord =  $conn->query($sqlServiceRecord);
							
							
							
							$fk_service_record = $conn->insert_id;
							
							$sqlServiceRank = "INSERT INTO service_rank VALUES($fk_service_record,$fk_rank);";
							$resultsqlServiceRank = $conn->query($sqlServiceRank);
							
							$sqlSelect = "SELECT DISTINCT r.rank_id,s.s_id,r.rank_name,r.rank_scale,s.start_date,s.end_date,s.head_department,s.sub_department,s.,s.department_id FROM service_record s, rank r, service_rank a
										  WHERE s.s_id=a.s_id AND r.rank_id = a.rank_id AND s.staff_id=$lastID";
							$resultsqlSelect = $conn->query($sqlSelect);
						
							if($resultsqlSelect->num_rows>0){
									
							while($row = $resultsqlSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["rank_name"]."</td>";
									echo "<td>".$row["rank_scale"]."</td>";
									echo "<td>".$row["start_date"]."</td>";
									echo "<td>".$row["end_date"]."</td>";
									echo "<td>".$row["head_department"]."</td>";
									echo "<td>".$row["sub_department"]."</td>";
									echo "<td>".$row["department_id"]."</td>";
									echo "<td>".$row[""]."</td>";
									
									
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?servicedelete1=<?php echo $row["s_id"]?>&rankdelete2=<?php echo $row["rank_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="serviceDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
					}
						}
					
					
						if((isset($_GET["servicedelete1"])) && (isset($_GET["rankdelete2"])) ){
							
							
							include 'DBConnection.php';
								
							$sid1 = (int)$_GET["servicedelete1"];
							$rid2 = (int)$_GET["rankdelete2"];
							
							
							$sqlServiceRankDelete = "DELETE FROM service_rank WHERE s_id=$sid1 AND rank_id=$rid2";
							$resultsqlServiceRankDelete = $conn->query($sqlServiceRankDelete);
							
							$sqlServiceRecordDelete = "DELETE FROM service_record WHERE s_id=$sid1";
							$resultsqlServiceRecordDelete = $conn->query($sqlServiceRecordDelete);
							
							$sqlRankDelete= "DELETE FROM rank WHERE rank_id=$rid2";
							$resultsqlRankDelete = $conn->query($sqlRankDelete);
							
							$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
						
						$sqlSelect = "SELECT DISTINCT r.rank_name,r.rank_scale,s.start_date,s.end_date,s.head_department,s.sub_department,s.,s.department_id FROM service_record s, rank r, service_rank a
										  WHERE s.s_id=a.s_id AND r.rank_id = a.rank_id AND s.staff_id=$lastID";
							$resultsqlSelect = $conn->query($sqlSelect);
						
							if($resultsqlSelect->num_rows>0){
									
							while($row = $resultsqlSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["rank_name"]."</td>";
									echo "<td>".$row["rank_scale"]."</td>";
									echo "<td>".$row["start_date"]."</td>";
									echo "<td>".$row["end_date"]."</td>";
									echo "<td>".$row["head_department"]."</td>";
									echo "<td>".$row["sub_department"]."</td>";
									echo "<td>".$row["department_id"]."</td>";
									echo "<td>".$row[""]."</td>";
									
						
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?servicedelete1=<?php echo $row["s_id"]?>&rankdelete2=<?php echo $row["rank_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="serviceDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
							
						}
				
					
					?>
					
					
					</tbody>
				</table>
			</div>
		</div>
		</form>	
		
			
		
		<legend><strong>Bond</strong></legend>
		<form action ="" method="post">
			<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("bondtitle",$missingFields)?>'>
						<label for = "bondtitle" >Title</label>
						</div>
						<div class='col-md-4 <?php validateField("bondtitle",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="bondtitle" value="<?php setValue("bondtitle")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("bondtype",$missingFields)?>'>
						<label for = "bondtype" >Type</label>
						</div>
						<div class='col-md-4 <?php validateField("bondtype",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="bondtype" value="<?php setValue("bondtype")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("bondregisterdate",$missingFields)?>'>
						<label for = "bondregisterdate" >Register Date</label>
						</div>
						<div class='col-md-4 <?php validateField("bondregisterdate",$missingFields)?>'>
						<input type = "date" class="form-control input-sm" name="bondregisterdate" value="<?php setValue("bondregisterdate")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				<div class="form-horizontal">
				<div class = "form-group">
					<div class = 'row'>
	
						<div class='col-md-2 text-left <?php validateField("bondperiod",$missingFields)?>'>
						<label for = "bondperiod" >Period</label>
						</div>
						<div class='col-md-4 <?php validateField("bondperiod",$missingFields)?>'>
						<input type = "text" class="form-control input-sm" name="bondperiod" value="<?php setValue("bondperiod")?>"/>
						</div>
						<div class='col-md-2 text-right <?php validateField("bondamount",$missingFields)?>'>
						<label for = "bondamount" >Amount</label>
						</div>
						<div class='col-md-4 <?php validateField("bondamount",$missingFields)?>'>
						<input type = "number" class="form-control input-sm" name="bondamount" value="<?php setValue("bondamount")?>"/>
						</div>
					</div>
				</div>
				</div>
				
				
				
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm" name="bondadd">Add</button>
				</div>
				
				<div class='row'>
				<div class='col-md-12'>
					<table class='table table-bordered table-striped table-hover'>
					<thead>
						<tr class='education_table'>
							<td ><strong>Title</strong></td>
							<td ><strong>Type</strong></td> 
							<td ><strong>Register Date</strong></td>
							<td ><strong>Period</strong></td>
							<td ><strong>Amount</strong></td>
							<td ><strong>Action</strong></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if($a == "bond"){
						if(isset($_POST["bondadd"])){
							include 'DBConnection.php';
							
							$bondtitle = trim($_POST["bondtitle"]);
							$bondtype = trim($_POST["bondtype"]);
							$bondperiod = trim($_POST["bondperiod"]);
							$bondregisterdate = trim($_POST["bondregisterdate"]);
							$bondamount = trim($_POST["bondamount"]);
						
							
							
							$bondregisterdate = date('Y-m-d',strtotime($bondregisterdate));
							
							$lastID = 0;
							$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
							$sqlBond = "INSERT INTO bond(bond_title,bond_type,register_date,period,amount,staff_id)
									  VALUES(\"$bondtitle\",\"$bondtype\",\"$bondregisterdate\",\"$bondperiod\",\"$bondamount\",$lastID);";
							$resultsqlBond = $conn->query($sqlBond);
						
						$sqlBondSelect = "SELECT bond_id,bond_title,bond_type,register_date,period,amount FROM bond WHERE staff_id=$lastID;";
						$resultsqlBondSelect = $conn->query($sqlBondSelect);
						
						if($resultsqlBondSelect->num_rows>0){
									
							while($row = $resultsqlBondSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["bond_title"]."</td>";
									echo "<td>".$row["bond_type"]."</td>";
									echo "<td>".$row["register_date"]."</td>";
									echo "<td>".$row["period"]."</td>";
									echo "<td>".$row["amount"]."</td>";
									
									
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?bonddelete=<?php echo $row["bond_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="bondDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
					}
					}
					
						if(isset($_GET["bonddelete"])){
							
							include 'DBConnection.php';
							$id = (int)$_GET["bonddelete"];
							$sqlBondDelete = "DELETE FROM bond WHERE bond_id=$id";
							$resultsqlBondDelete = $conn->query($sqlBondDelete);
							
						$sqlLastID = "SELECT MAX(staff_id) as lastID FROM staff;";
							$resultsqlLastID = $conn->query($sqlLastID);
							 
							if($resultsqlLastID->num_rows > 0){
										
									while($row=$resultsqlLastID->fetch_assoc()){
											
										$lastID = $row["lastID"];
									}
							}
							
						
						$sqlBondSelect = "SELECT bond_id,bond_title,bond_type,register_date,period,amount FROM bond WHERE staff_id=$lastID;";
						$resultsqlBondSelect = $conn->query($sqlBondSelect);
						
						if($resultsqlBondSelect->num_rows>0){
									
							while($row = $resultsqlBondSelect->fetch_assoc()){

									echo "<tr>";
									echo "<td>".$row["bond_title"]."</td>";
									echo "<td>".$row["bond_type"]."</td>";
									echo "<td>".$row["register_date"]."</td>";
									echo "<td>".$row["period"]."</td>";
									echo "<td>".$row["amount"]."</td>";
									
									
								?>
									
									<td><a href="http://localhost/Faculty Management System/Faculty Management System/Admin_CreateFaculty.php?bonddelete=<?php echo $row["bond_id"]?>" 
												  class="btn btn-info btn-sm" role="button" name="bondDelete" >Delete</a></td>
								<?php 
								
									echo "</tr>";
							}
					
						}
							
						}
				
					?>
					
					</tbody>
				</table>
			</div>
		</div>
		</form>	
		<br><br>
		
		
		
		</div>
		


<?php }

?>

<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src = 'js/bootstrap.js'></script>

</body>
</html>
