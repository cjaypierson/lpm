<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<div class="row-fluid">
	<div class="span6 cnter">
	<h2>Contact Information</h2>
		<h4>Phone</h4>
			<p><strong>Message Center:</strong> (757) 886-3022</p>
			<p><strong>Office:</strong> 757-265-1525</p>
		<h4>Fax</h4>
			<p>(480) 393-4327</p>
		<h4>Address</h4>
			<p>104 Industry Dr.<br /> Suite 211<br /> Yorktown, VA, 23693</p>
		<h4>E-mail</h4>
			<p>lpm@leeppropmgt.com</p>
		<em style="font-size:1.1em;">*If you would like to contact a specific employee<br /> please refer to our <a href="about">About Us</a> page</em>
	</div>

	<div class="span6 cnter">
		<h2>Send Us A Message</h2>
		<?php
			$contactform = new JFormer('contactform', array());

		    $contactform->addJFormComponentArray(array(
		        new JFormComponentHtml('
           			 <div style="width:317px; margin: 0 auto;">
        		'),
		        new JFormComponentSingleLineText('name', 'Name:', array(
		            'validationOptions' => array('required'),
		            'width' => 'longest',
		        )),
		        new JFormComponentSingleLineText('email', "Email Address:", array(
		            'width' => 'longest',
		        )),
		        new JFormComponentSingleLineText('phone', "Phone Number:", array(
		            'validationOptions' => array('required'),
		            'width' => 'longest',
		        )),
		        new JFormComponentHtml('
           		 	</div>
            		<div style="width:394px; margin: 0 auto;">
        		'),
		        new JFormComponentTextArea('contactmessage', "Message:", array(
		            'initialValue' => 'Please contact me so I can learn more.', 
		            'width' => 'long',
		            'height' => 'short',
		        )),
		        new JFormComponentHtml('
            		</div>
        		'),
		    ));


		    // Set the function for a successful form submission
		    function onSubmit($formValues) {
		    

		        // Prepare the variables for sending the mail   

		        $toAddress = 'cjaypetter@gmail.com, lpm@leepropmgt.com';
		        $fromAddress = $formValues->email;
		        $fromName = $formValues->name;
		        $subject = 'Contact Request';
		        $headers = "From: " . $fromAddress . "\r\n";
		        $headers .= "MIME-Version: 1.0\r\n";
		        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		        $message = '
		        <style>
		            .form-content p {width: 100%; font-weight: bold;}
		            p em {font-style: normal; text-decoration: none; font-weight: normal;}
		            p em:after {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
		            p em:before {content: "\00a0 \00a0 \00a0"}
		            p strong:before {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
		            .l50 {width: 48%; float: left; text-align: left; padding-right: 2%;}
		            .r50 {width: 48%; float: left; text-align: right; padding-right: 2%;}
		            .c50 {width: 48%; float: left; text-align: center; padding-right: 2%;}
		            h2 {text-align: center;}
		        </style>

		        <div class="form-content">
		            <h1 style="text-align:center;">Contact Request</h1>
		            <hr />
		            <p>Tenant Name:<em>' . $formValues->name . '</em></p>
		            <p>Contact Phone:<em>' . $formValues->phone . '</em></p>
		            <p>Email Address:<em>' . $formValues->email . '</em></p>
		            <p>Request:<br /><em>' . $formValues->contactmessage . '</em></p>
		        </div>    

		        ';

		                
		                // Use the PHP mail function
		                $mail = mail($toAddress, $subject, $message, $headers);

		                // Send the message
		                if($mail) {
		                    $response['successPageHtml'] = '
		                        <h2 class="cnter">Thank You for sending your request.</h2>
		                        <p class="cnter">Your form has been successfully sent.</p>
		                    ';
		                }
		                else {
		                    $response['failureNoticeHtml'] = '
		                        There was a problem sending your message.
		                    ';
		                }

		                return $response;
		        }

		    // Process any request to the form
		    $contactform->processRequest();/*

		        
		        // the return array returns to jformer and tells it how to how to handle the response
		        if(!$mail->Send()) {
		            $return = array('status' => 'failure', 'response' => $mail->ErrorInfo);
		            $return['failureNoticeHtml'] = 'There was a problem sending your e-mail.'; // failureNoticeHtml returns and html error message
		        }
		        else {
		            $return = array('status' => 'success', 'response' => 'Message successfully sent.');
		        // successPageHtml returns html for a success page. this can be any html.
		            $return['successPageHtml'] = '<h1 style="margin-bottom: .5em;">Thanks for Contacting Us</h1><p>Your message has been successfully sent. We will respond as soon as possible.</p>'; 
		        }

		        return $return;
		    }
		    */

		?>
	</div>

	<hr />
	
</div>