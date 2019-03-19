<?php include('include/header.php') ?>
<?php include('admin/global/db.php'); ?>
<?php
$db = new db();
$msj="";
$record=array();
$table='feedback';

//update the user
/*print_r($_POST);
die;*/
if(isset($_POST['email']))
{
    $record["email"] = $db->Safe($_POST['email']);
    $record["user_name"] = $db->Safe($_POST['user_name']);
    $record["user_phone"] = $db->Safe($_POST['user_phone']);
    $record["massege"] = $db->Safe($_POST['massege']);


        if($db->insert($table,$record))
        {
            $msj.= "Feedback successfully submitted";
        }

}

?>
<body>

<div class="super_container">
	
	<!-- Header -->

    <?php include('include/top-nav.php') ?>

	<!-- Contact Info -->

	<div class="contact_info">
		<div class="container">
			<div class="row">
              <?php  if(!empty($msj)){ ?>

                <div class="alert alert-success" >
                    <strong> <?php echo $msj; ?></strong>
                </div>

                <?php } ?>
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">+0304 5890802</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">sabamcs12@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Address</div>
								<div class="contact_info_text">Joher Town, Lahore, PK</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Get in Touch</div>

						<form action="contact.php" method="post" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="user_name" id="user_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
								<input type="email" name="email" id="email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
								<input type="text" name="user_phone" id="user_phone" class="contact_form_phone input_field" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea id="massege" class="text_field contact_form_message" name="massege" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Send Message</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>


    <?php include('include/footer.php') ?>
</body>

</html>