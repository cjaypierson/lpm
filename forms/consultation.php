<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h3 class="cnter">Request Consultation</h3>

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
    $consultationForm = new JFormer('consultationForm', array());

    $consultationForm->addJFormComponentArray(array(
        new JFormComponentHtml('
            <div style="width:339px; margin: 0 auto;">
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
            <div style="width:522px; margin: 0 auto;">
        '),
        new JFormComponentTextArea('consultationrequest', "Message:", array(
            'initialValue' => 'Please contact me so I can learn more.', 
            'width' => 'longest',
            'height' => 'mediumShort',
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
        $subject = 'Consultation Request';
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
            <h1 style="text-align:center;">Consultation Request</h1>
            <hr />
            <p>Tenant Name:<em>' . $formValues->name . '</em></p>
            <p>Contact Phone:<em>' . $formValues->phone . '</em></p>
            <p>Email Address:<em>' . $formValues->email . '</em></p>
            <p>Request:<br /><em>' . $formValues->consultationrequest . '</em></p>
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
    $consultationForm->processRequest();/*

        
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
    