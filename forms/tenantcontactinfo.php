<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h3 class="cnter">Update Contact Information</h3>
<hr />
<?php
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $toAddress = 'cjaypetter@gmail.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $_POST["tname-firstName"];
        $subject = 'Owner Inormation from';
        $message = $_POST["tname-lastName"];

        // Use the PHP mail function
        mail($toAddress, $subject, $message, 'From: '.$fromAddress."\n");
        echo "Thank you for contacting us.  We will get back to you shortly.";
        echo $_POST["jFormer"];
    }*/
    $tenantinfoForm = new JFormer('tenantinfoForm', array());

    $tenantinfoForm->addJFormComponentArray(array(
        new JFormComponentSingleLineText('tpropertyaddress', 'Property Address:', array(
            'validationOptions' => array('required'),
            'width' => '30em',
        )),
        new JFormComponentSingleLineText('tleasestart', 'Lease Start Date:', array(
            'validationOptions' => array('required'),
            'width' => '30em',
        )),
        new JFormComponentName('tname', 'Tenant Name:', array(
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('thomephone', "Home Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('tworkphone', "Work Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('tcellphone', "Cell Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('temail', "Email Address:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('trentersinsurance', "Renter's Insurance Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('trenterspolicy', "Renter's Insurance Policy Number:", array(
            'width' => 'longest',
        )),

        // Emergency Contact

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Emergency Contact</h4><hr />
        '),
        new JFormComponentName('tename', 'Name:', array(
            
        )),
        new JFormComponentSingleLineText('terelationship', "Relationship:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('tehomephone', "Home Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('tecellphone', "Cell Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('teemail', "Email Address:", array(
            'width' => 'long',
        )),

    ));




    // Set the function for a successful form submission
    function onSubmit($formValues) {

        if(!empty($formValues->tname->middleInitial)) {
            $name = $formValues->tname->firstName.' '.$formValues->tname->middleInitial.' '.$formValues->tname->lastName;
        }
        else {
            $name = $formValues->tname->firstName.' '.$formValues->tname->lastName;
        }
    

        // Prepare the variables for sending the mail   

        $toAddress = 'cjaypetter@gmail.com, lpm@leepropmgt.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $name;
        $subject = 'Tenant Information Update';
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
            <h1 style="text-align:center;">Update Tenant Contact Information</h1>
            <hr />
            <p>Tenant Name:<em>' . $name . '</em></p>
            <p>Property Address:<em>' . $formValues->tpropertyaddress . '</em><strong>Lease Start Date:</strong><em>' . $formValues->tleasestart . '</em></p>
            <p>Home Phone:<em>' . $formValues->thomephone . '</em><strong>Work phone:</strong><em>' . $formValues->tworkphone . '</em></p>
            <p>Cell Phone:<em>' . $formValues->tcellphone . '</em><strong>Email Address:</strong><em>' . $formValues->temail . '</em></p>
            <p>Renter\'s Insurance Company:<em>' . $formValues->trentersinsurance . '</em><strong>Renter\'s Insurance Policy:</strong><em>' . $formValues->trenterspolicy . '</em></p>
            <h2>Emergency Contact Info</h2>
            <hr />
            <p>Emergency Contact Name:<em>' . $formValues->tename->firstName.' '.$formValues->tename->middleInitial.' '.$formValues->tename->lastName . '</em></p>
            <p>Relationship:<em>' . $formValues->terelationship . '</em></p>
            <p>Home Phone:<em>' . $formValues->tehomephone . '</em><strong>Cell phone:</strong><em>' . $formValues->tecellphone . '</em></p>
            <p>Email Address:<em>' . $formValues->teemail . '</em></p>
        </div>    

        ';

                
                // Use the PHP mail function
                $mail = mail($toAddress, $subject, $message, $headers);

                // Send the message
                if($mail) {
                    $response['successPageHtml'] = '
                        <h2 class="cnter">Thanks for Updating Your Info!</h2>
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
    $tenantinfoForm->processRequest();/*

        
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
    