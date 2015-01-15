<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h3 class="cnter">Maintenance Request</h3>
<hr />
<?php
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $toAddress = 'cjaypetter@gmail.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $_POST["name-firstname"];
        $subject = 'Owner Inormation from';
        $message = $_POST["name-lastname"];

        // Use the PHP mail function
        mail($toAddress, $subject, $message, 'From: '.$fromAddress."\n");
        echo "Thank you for contacting us.  We will get back to you shortly.";
        echo $_POST["jFormer"];
    }*/
    $maintenancerequestForm = new JFormer('maintenancerequestForm', array());

    $maintenancerequestForm->addJFormComponentArray(array(
        new JFormComponentname('name', 'Tenant Name:', array(
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('address', 'Property Address:', array(
            'validationOptions' => array('required'),
            'width' => '30em',
        )),
        new JFormComponentSingleLineText('phone1', "Contact Phone Number(s):", array(
            'validationOptions' => array('required'),
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('phone2', "", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('email', "Email Address:", array(
            'width' => 'long',
        )),
        new JFormComponentTextArea('maintenancerequest', "Please describe your maintenance request:", array(
            'width' => 'longest',
            'height' => 'mediumShort',
        )),

    ));




    // Set the function for a successful form submission
    function onSubmit($formValues) {

        if(!empty($formValues->name->middleInitial)) {
            $name = $formValues->name->firstName.' '.$formValues->name->middleInitial.' '.$formValues->name->lastName;
        }
        else {
            $name = $formValues->name->firstName.' '.$formValues->name->lastName;
        }
    

        // Prepare the variables for sending the mail   

        $toAddress = 'cjaypetter@gmail.com, lpm@leepropmgt.com';
        $fromAddress = $formValues->email;
        $fromName = $name;
        $subject = 'Maintenance Request';
                                
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
            <h1 style="text-align:center;">Maintenance Request</h1>
            <hr />
            <p>Tenant Name:<em>' . $name . '</em></p>
            <p>Property Address:<em>' . $formValues->address . '</em></p>
            <p>Contact Number(s):<em>' . $formValues->phone1 . ' ' . $formValues->phone2 . '</em></p>
            <p>Email Address:<em>' . $formValues->email . '</em></p>
            <p>Request:<br /><em>' . $formValues->maintenancerequest . '</em></p>
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
    $maintenancerequestForm->processRequest();/*

        
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
    