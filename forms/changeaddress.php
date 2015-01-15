<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h3 class="cnter">Change of Address</h3>
<hr />
<?php
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $toAddress = 'cjaypetter@gmail.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $_POST["oname-firstname"];
        $subject = 'Owner Inormation from';
        $message = $_POST["oname-lastname"];

        // Use the PHP mail function
        mail($toAddress, $subject, $message, 'From: '.$fromAddress."\n");
        echo "Thank you for contacting us.  We will get back to you shortly.";
        echo $_POST["jFormer"];
    }*/
    $changeaddressForm = new JFormer('changeaddressForm', array());

    $changeaddressForm->addJFormComponentArray(array(
        new JFormComponentname('oname', 'Owner Name(s):', array(
            'validationOptions' => array('required'),
        )),
        new JFormComponentname('oname2', '', array(
            
        )),
        new JFormComponentSingleLineText('oldaddress', 'Previous Address:', array(
            'width' => '30em',
        )),
        new JFormComponentSingleLineText('newaddress', 'New Address:', array(
            'width' => '30em',
        )),
        new JFormComponentHtml('
            <hr /><h4 class="cnter">Please update the following contact information if anything has changed:</h4><hr />
        '),
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentSingleLineText('newhomephone', "Home Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('newworkphone', "Work Phone:", array(
            'width' => 'medium',
        )),
         new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentSingleLineText('newcellphone', "Cell Phone:", array(
            'width' => 'medium',
        )),
        new JFormComponentSingleLineText('newemail', "Email Address:", array(
            'width' => 'medium',
        )),
         new JFormComponentHtml('
            </div>
            </div>
        '),

    ));




    // Set the function for a successful form submission
    function onSubmit($formValues) {

        if(!empty($formValues->oname->middleInitial)) {
            $name = $formValues->oname->firstName.' '.$formValues->oname->middleInitial.' '.$formValues->oname->lastName;
        }
        else {
            $name = $formValues->oname->firstName.' '.$formValues->oname->lastName;
        }
    

        // Prepare the variables for sending the mail   

        $toAddress = 'cjaypetter@gmail.com, lpm@leepropmgt.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $name;
        $subject = 'Owner Address Change';
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
            <h1 style="text-align:center;">Owner Change of Address</h1>
            <hr />
            <p>Owner Name:<em>' . $name . '</em><strong>Owner Name:</strong><em>' . $formValues->oname2->firstName . ' ' . $formValues->oname2->middleInitial . ' ' . $formValues->oname2->lastName . '</em></p>
            <p>Previous Address:<em>' . $formValues->oldaddress . '</em></p>
            <p>New Address:<em>' . $formValues->newaddress . '</em></p>
            <p>New Home Phone:<em>' . $formValues->newhomephone . '</em><strong>New Work phone:</strong><em>' . $formValues->newworkphone . '</em></p>
            <p>New Cell Phone:<em>' . $formValues->newcellphone . '</em><strong>New Email Address:</strong><em>' . $formValues->newemail . '</em></p>
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
    $changeaddressForm->processRequest();/*

        
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
    