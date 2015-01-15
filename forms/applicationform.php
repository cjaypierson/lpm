<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h2 class="cnter">Application for Housing</h2>
<p class="cnter">NTN SUBSCRIBER ACCESS # HA 1438</p>
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
    $housingApplication = new JFormer('housingApplication', array());

    $housingApplication->addJFormComponentArray(array(
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span12">
        '),
        new JFormComponentSingleLineText('desiredaddress', 'Desired Address:', array(
            'width' => '30em',
            'validationOptions' => array('required'),
        )),
        new JFormComponentHtml('
            </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentname('name', 'Name:', array(
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('ssn1', "SSN:", array(
            'validationOptions' => array('required'),
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('dob1', "DOB:", array(
            'validationOptions' => array('required'),
            'width' => 'short',
            'style' => 'display:inline; float:left;',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentname('spouse', 'Spouse/Other:', array(
    
        )),
        new JFormComponentSingleLineText('ssn2', "SSN:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('dob2', "DOB:", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),
        new JFormComponentTextArea('otheroccupants', "Other Occupants: (Include ages of minor children)", array(
            'width' => 'longest',
            'height' => 'short',
        )),

        // Residency

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Residency</h4><hr />
        '),
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentSingleLineText('currentaddress', 'Current Address:', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('landlord1', "Landlord:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('lphone1', "Landlord Phone:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('rent1', "Rent Amount:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentSingleLineText('previousaddress', 'Previous Address:', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('landlord2', "Landlord:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('lphone2', "Landlord Phone:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('rent2', "Rent Amount:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong2', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),

        // Employment

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Employment</h4><hr />
        '),
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentSingleLineText('employer1', 'Current Employer:', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('position1', "Position/Rank:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('supervisor1', "Supervisor:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('income1', "Monthly Income:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong3', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),

        // Previous Employer

        new JFormComponentSingleLineText('employer2', "Previous Employer:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('position2', "Position/Rank:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('supervisor2', "Supervisor:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('income2', "Monthly Income:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong4', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),

        // Spouse Employment

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Spouse/Other\'s Employment</h4><hr />
        '),
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentSingleLineText('employer3', 'Spouse/Other\'s Current Employer:', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('position3', "Position/Rank:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('supervisor3', "Supervisor:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('income3', "Monthly Income:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong5', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),

        // Spouse Previous Employer

        new JFormComponentSingleLineText('employer4', "Spouse/Other's Previous Employer:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('position4', "Position/Rank:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('supervisor4', "Supervisor:", array(
            'width' => 'long',
        )),
        new JFormComponentSingleLineText('income4', "Monthly Income:", array(
            'width' => 'short',
        )),
        new JFormComponentSingleLineText('howlong6', "How long?", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),

        // Additional Income Sources

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Additional Income</h4><hr />
        '), 
        new JFormComponentTextArea('additionalincome', 'Please list additional sources of income with amounts:', array(
            'width' => 'longest',
            'height' => 'short',
        )),

        // Pets/Smoking

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Pets/Smoking</h4><hr />
        '),    
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentMultipleChoice('pets', 'Do you have any pets?',
            array(
                array(
                    'value' => 'Yes',
                    'label' => 'Yes'
                ),
                array(
                    'value' => 'No',
                    'label' => 'No'
                ),
            ),
            array(
                'multipleChoiceType' => 'radio',
            )
        ),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentSingleLineText('pettype', "Please list type (breed if dog), weight and age:", array(
            'width' => 'longest',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),
        new JFormComponentMultipleChoice('smoker', 'Any smokers?',
            array(
                array(
                    'value' => 'Yes',
                    'label' => 'Yes'
                ),
                array(
                    'value' => 'No',
                    'label' => 'No'
                ),
            ),
            array(
                'multipleChoiceType' => 'radio',
            )
        ),

        // Credit/Rental History

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Credit & Rental History</h4><hr />
        '),
        new JFormComponentLikert('credithistory', 'Have you or your spouse/other ever:',
            array(
                array('value' => 'Yes', 'label' => 'Yes'),
                array('value' => 'No', 'label' => 'No'),
            ),
            array(
                array(
                    'name' => 'evicted',
                    'statement' => 'Been evicted or asked to move out?',
                    'validationOptions' => array('required'),
                ),
                array(
                    'name' => 'brokecontract',
                    'statement' => 'Broken a rental agreement or lease contract?',
                    'validationOptions' => array('required'),
                ),
                array(
                    'name' => 'latepayment',
                    'statement' => 'Been late with rent payments or sued for non-payment of rent?',
                    'validationOptions' => array('required'),
                ),
                array(
                    'name' => 'damages',
                    'statement' => 'Been sued for damages to a rental property?',
                    'validationOptions' => array('required'),
                ),
                array(
                    'name' => 'bankruptcy',
                    'statement' => 'Declared bankruptcy?',
                    'validationOptions' => array('required'),
                ),
                array(
                    'name' => 'judgments',
                    'statement' => 'Any outstanding judgments?',
                    'validationOptions' => array('required'),
                ),
            ),
            array(
                'validationOptions' =>array('required'),
            )
        ),
        new JFormComponentTextArea('historyexplain', "If Yes to any of the above, please explain", array(
            'width' => 'longest',
            'height' => 'short',
        )),

        // Disclosure and Signatures

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Signatures and Submission</h4><hr />
            <p>I certify that the above information is correct and complete and hereby authorize you to make any inquiries you feel necessary to evaluate my tenant, credit, and/or criminal history. If I rent the unit, I understand the information contained on this form and rental agreement may be maintained in a tenant database for up to six years after I vacate the premises.</p>
        '),
        new JFormComponentHtml('
            <div class="row-fluid">
                <div class="span6">
        '),
        new JFormComponentSingleLineText('signature1', "Applicant's Signature:", array(
            'width' => 'longest',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentSingleLineText('date1', "Date:", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
            <div class="row-fluid">
            <div class="span6">
        '),
        new JFormComponentSingleLineText('signature2', "Applicant's Signature:", array(
            'width' => 'longest',
        )),
        new JFormComponentHtml('
            </div>
            <div class="span6">
        '),
        new JFormComponentSingleLineText('date2', "Date:", array(
            'width' => 'short',
        )),
        new JFormComponentHtml('
            </div>
            </div>
        '),

        // Disclosure of Brokerage Relationship

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Disclosure Of Brokerage Relationship</h4><hr />
            <p class="cnter"><Strong>Lee Property Management represents the Landlord in real estate transactions</strong></p>
            <div class="row-fluid">
                <div class="span6">
                    <p class="cnter">Carol Miller<br />
                    Broker & Business Owner<br />
                    Licensed in the State of Virginia</p>
                </div>
                <div class="span6">
                    <p class="cnter">Lee Property Management<br />
                    128 Rockmor Lane<br />
                    Yorktown, VA 23693, 757-886-3022</p>
                </div>
            </div>
        '),

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
                $fromAddress = 'rentalapp@campierson.com';
                $fromName = $name;
                $subject = 'Housing Application';

                $headers = "From: " . $fromAddress . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                $message = '
                            <style>
                                .form-content p {width: 100%; font-weight: bold; font-size: 1.1em}
                                p em {font-style: normal; text-decoration: underline; font-weight: normal;}
                                p em:after {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
                                p em:before {content: "\00a0 \00a0 \00a0"}
                                p strong:before {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
                                .l50 {width: 50%; float: left; text-align: left;}
                                .r50 {width: 50%; float: left; text-align: right;}
                                .c50 {width: 50%; float: left; text-align: center;}
                            </style>

                            <h1 style="text-align:center;">Lee Property Management</h1>
                            <p style="text-align:center;">Office: 757-265-1525</p>
                            <div class="l50">
                                <h2>APPLICATION FOR HOUSING</h2>
                                <p>Lee Property Management FAX 1(480) 393-4327</p>
                            </div>
                            <div class="r50">
                                <p>NTN SUBSCRIBER ACCESS # HA 1438</p>
                                <p>lpm@leepropmgmt.com</p>
                            </div>
                            <div class="form-content">
                            <p style="visibility:hidden;"> . </p>
                            <br />
                            <h2 style="text-align:center;">Personal Information</h2>
                            <hr />
                            <p>Desired Address:<em>' . $formValues->desiredaddress . '</em></p>
                            <p>Name:<em>' . $name . '</em><strong>SSN:</strong><em>' . $formValues->ssn1 . '</em><strong> DOB:</strong><em>' . $formValues->dob1 . '</em></p>
                            <p>Name:<em>' . $formValues->spouse->firstName.' '.$formValues->spouse->middleInitial.' '.$formValues->spouse->lastName. 
                            '</em><strong>SSN:</strong><em>' . $formValues->ssn2 . '</em><strong>DOB:</strong><em>' . $formValues->dob2 . '</em></p>
                            <p>Other Occupants: (Include ages of minor children)</strong><em>' . $formValues->otheroccupants . '</em></p>
                            <br />
                            <h2 style="text-align:center;">Residency</h2>
                            <hr />
                            <p>Address:<em>' . $formValues->currentaddress . '</em></p>
                            <p>Landlord:<em>' . $formValues->landlord1 . '</em><strong>Phone #</strong><em>' . $formValues->lphone1 . '</em><strong>Rent Amount:</strong><em>' . $formValues->rent1 . '</em><strong>How Long:</strong><em>' . $formValues->howlong . '</em></p>
                            <p>Previous Address:<em>' . $formValues->previousaddress . '</em></p>
                            <p>Previous Landlord:<em>' . $formValues->landlord2 . '</em><strong>Phone #</strong><em>' . $formValues->lphone2 . '</em><strong>Rent Amount:</strong><em>' . $formValues->rent2 . '</em><strong>How Long:</strong><em>' . $formValues->howlong2 . '</em></p>
                            <br />
                            <h2 style="text-align:center;">Employment</h2>
                            <hr />
                            <p>Employer:<em>' . $formValues->employer1 . '</em><strong>Position/Rank:</strong><em>' . $formValues->position1 . '</em><strong>Supervisor:</strong><em>' . $formValues->supervisor1 . '</em></p>
                            <p>Monthly Income:<em>' . $formValues->income1 . '</em><strong>How Long?</strong><em>' . $formValues->howlong3 . '</em></p>
                            <p>Previous Employer:<em>' . $formValues->employer2 . '</em><strong>Position/Rank:</strong><em>' . $formValues->position2 . '</em><strong>Supervisor:</strong><em>' . $formValues->supervisor2 . '</em></p>
                            <p>Monthly Income:<em>' . $formValues->income2 . '</em><strong>How Long:</strong><em>' . $formValues->howlong4 . '</em></p>
                            <br />
                            <p>Spouse/Other\'s Employer:<em>' . $formValues->employer3 . '</em><strong>Position/Rank:</strong><em>' . $formValues->position3 . '</em><strong>Supervisor:</strong><em>' . $formValues->supervisor3 . '</em></p>
                            <p>Monthly Income:<em>' . $formValues->income3 . '</em><strong>How Long?</strong><em>' . $formValues->howlong5 . '</em></p>
                            <p>Previous Employer:<em>' . $formValues->employer2 . '</em><strong>Position/Rank:</strong><em>' . $formValues->position4 . '</em><strong>Supervisor:</strong><em>' . $formValues->supervisor4 . '</em></p>
                            <p>Monthly Income:<em>' . $formValues->income4 . '</em><strong>How Long:</strong><em>' . $formValues->howlong6 . '</em></p>
                            <br />
                            <p>Additional Sources of Income:<em>' . $formValues->additionalincome . '</em></p>
                            <br />
                            <h2 style="text-align:center;">Pets/Smoking</h2>
                            <hr />
                            <p>Any Pets?<em>' . $formValues->pets . '</em><strong>Please list type (breed if dog), weight, and age:</strong><em>' . $formValues->pettype . '</em></p>
                            <p>Any Smokers?<em>' . $formValues->smoker . '</em></p>
                            <br />
                            <h2 style="text-align:center;">Credit & Rental History</h2>
                            <hr />
                            <p>Have you or your spouse/other ever:</p>
                                <p><strong>Been Evicted or asked to move out?</strong><em>' . $formValues->credithistory->evicted . '</em></p>
                                <p><strong>Broken a rental agreement or lease contract?</strong><em>' . $formValues->credithistory->brokecontract . '</em></p>
                                <p><strong>Been late with rent payments or sued for non-payment of rent?</strong><em>' . $formValues->credithistory->latepayment . '</em></p>
                                <p><strong>Been sued for damages to a rental property?</strong><em>' . $formValues->credithistory->damages . '</em></p>
                                <p><strong>Declared bankruptcy?</strong><em>' . $formValues->credithistory->bankruptcy . '</em></p>
                                <p><strong>Any outstanding judgments?</strong><em>' . $formValues->credithistory->judgments . '</em></p>
                            <p>If "Yes" to any of the above please explain:<em>' . $formValues->historyexplain . '</em></p>
                            <br />
                            <h2 style="text-align:center;">Signatures</h2>
                            <hr />
                            <p style="text-align:center; font-weight: normal">I certify that the above information is correct and complete and hereby authorize you to make any inquiries you feel necessary to evaluate my tenant, credit, and/or criminal history. If I rent the unit, I understand the information contained on this form and rental agreement may be maintained in a tenant database for up to six years after I vacate the premises.</p>
                            <br />
                            <p>Applicant\'s Signature:<em>' . $formValues->signature1 . '</em><strong>Date:</strong><em>' . $formValues->date1 . '</em></p>
                            <p>Applicant\'s Signature:<em>' . $formValues->signature2 . '</em><strong>Date:</strong><em>' . $formValues->date2 . '</em></p>
                            <br />
                            <p>Application Fee $20/person who will be signing the lease: ____________________</p>
                            <p>Picture ID check: ____________________</p>
                            <br />
                            </div>
                            <h2 style="text-align:center;">Disclosure of Brokerage Relationship</h2>
                            <hr />
                            <p style="text-align:center; font-weight: bold;">Lee Property Management represents the Landlord in real estate transactions</p>
                            <div class="c50">
                                <p>Carol Miller</p>
                                <p>Broker & Business Owner</p>
                                <p>Licensed in the State of Virginia</p>
                            </div>
                            <div class="c50">
                                <p>Lee Property Management</p>
                                <p>128 Rockmor Lane</p>
                                <p>Yorktown, VA 23693,  757-886-3022</p>
                            </div>
                            
                ';


                // Use the PHP mail function
                $mail = mail($toAddress, $subject, $message, $headers);

                // Send the message
                if($mail) {
                    $response['successPageHtml'] = '
                        <h2 class="cnter">Thank You for sending your application.</h2>
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
    $housingApplication->processRequest();/*

        
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
    