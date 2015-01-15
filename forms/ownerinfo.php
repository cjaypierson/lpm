<?php include_once(JPATH_ROOT . "/templates/it_property2/jformer/jformer.php"); ?>
<h3 class="cnter">Owner Information</h3>
<hr />
<?php
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $toAddress = 'cjaypetter@gmail.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $_POST["name1-firstName"];
        $subject = 'Owner Inormation from';
        $message = $_POST["name1-lastName"];

        // Use the PHP mail function
        mail($toAddress, $subject, $message, 'From: '.$fromAddress."\n");
        echo "Thank you for contacting us.  We will get back to you shortly.";
        echo $_POST["jFormer"];
    }*/
    $ownerinfoForm = new JFormer('ownerinfoForm', array());

    $ownerinfoForm->addJFormComponentArray(array(
        new JFormComponentSingleLineText('propertyaddress', 'Property Address:', array(
            'validationOptions' => array('required'),
            'width' => '30em',
        )),
        new JFormComponentSingleLineText('forwardingaddress', 'Forwarding Address:', array(
            'validationOptions' => array('required'),
            'width' => '30em',
        )),
        new JFormComponentName('name1', 'Owner(s):', array(
            'validationOptions' => array('required'),
        )),
         new JFormComponentName('name2', '', array(
            
        )),
        new JFormComponentSingleLineText('email1', 'E-mail address(s):', array(
            'width' => 'long',
            'validationOptions' => array('email'), // notice the validation options
        )),
        new JFormComponentSingleLineText('email2', '', array(
            'width' => 'long',
            'validationOptions' => array('email'), // notice the validation options
        )),
        new JFormComponentSingleLineText('homephone', 'Future Home Phone:', array(
            'width' => 'mediumShort',
            'mask' => '(999) 999-9999',
        )),
        new JFormComponentSingleLineText('cellphone1', 'Phone Number (Cell or Future Home):', array(
            'width' => 'mediumShort',
            'mask' => '(999) 999-9999',
        )),
        new JFormComponentSingleLineText('cellphone2', 'Phone Number (Cell or Future Home):', array(
            'width' => 'mediumShort',
            'mask' => '(999) 999-9999',
        )),
        new JFormComponentSingleLineText('insurancecompany', "Insurance Company:", array(
            'width' => 'longest',     
        )),
        new JFormComponentSingleLineText('insurancepolicy', "Insurance Policy Number:", array(
            'width' => 'longest',    
        )),
        
        // Security System Questions

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Property Info and Service Contracts</h4><hr />
        '),
        new JFormComponentMultipleChoice('security', 'Do you have a security system?',
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
        new JFormComponentMultipleChoice('monitored', 'Is your system currently monitored?',
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

        new JFormComponentSingleLineText('securitycompany', "Security Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('securityaccount', "Security Account Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('securitycode', "What is the code?", array(
            'width' => 'longest',
        )),
        new JFormComponentMultipleChoice('securitycontinue', 'Do you want to continue paying for this service after a tenant moves in?',
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

        // Termite Policy Questions

        new JFormComponentHtml('
            <hr />
        '),
        new JFormComponentMultipleChoice('termite', 'Do you have a Termite Warranty?',
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

        new JFormComponentSingleLineText('termitecompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('termiteaccount', "Account Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentMultipleChoice('termitecontinue', 'Do you want to continue paying for this service after a tenant moves in?',
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
        
        // Pest Service Questions

        new JFormComponentHtml('
            <hr />
        '),
        new JFormComponentMultipleChoice('pest', 'Do you currently pay for Quarterly Pest Service?',
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

        new JFormComponentSingleLineText('pestcompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('pestaccount', "Account Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentMultipleChoice('pestcontinue', 'Do you want to continue paying for this service after a tenant moves in?',
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

        // Lawn Care Questions

        new JFormComponentHtml('
            <hr />
        '),
        new JFormComponentMultipleChoice('lawncare', 'Do you have a Lawn Care contract (fertilizing, weed killer, seeding, etc.)?',
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

        new JFormComponentSingleLineText('lawncarecompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('lawncareaccount', "Account Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentMultipleChoice('lawncarecontinue', 'Do you want to continue paying for this service after a tenant moves in?',
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

        // Irrigation Questions

        new JFormComponentHtml('
            <hr />
        '),
        new JFormComponentMultipleChoice('irrigation', 'Do you have an Irrigation System?',
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

        new JFormComponentSingleLineText('irrigationzones', "Number of Zones:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('irrigationcompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('irrigationaccount', "Account Number:", array(
            'width' => 'longest',
        )),

        // Preventative Maintenance HVAC Questions

         new JFormComponentHtml('
            <hr />
        '),
         new JFormComponentMultipleChoice('hvac', 'Do you have an annual preventive maintenance contract on your HVAC System?',
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

        new JFormComponentSingleLineText('hvaccompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('hvacaccount', "Account Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentMultipleChoice('hvacestimate', 'If No, do you want estimates for an annual contract?',
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


        // Home Warranty Questions

         new JFormComponentHtml('
            <hr />
        '),
         new JFormComponentMultipleChoice('homewarranty', 'Do you have a Home Warranty?',
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

        new JFormComponentSingleLineText('homewarrantycompany', "Company:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('homewarrantypolicy', "Policy Number:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('homewarrantyphone', "Service Telephone Number:", array(
            'width' => 'mediumShort',
            'mask' => '(999) 999-9999',
        )),

        // Want LPM To Pay

        new JFormComponentHtml('
            <hr />
            <h5 class="cnter">*Notify above contractors that Lee Property Management is managing your property*</h5><h5 class="cnter">Phone: 757-886-3022, Billing: 128 Rockmor Ln, Yorktown VA 23693</h5>
            <hr />
        '),
        new JFormComponentMultipleChoice('lpmpay', 'Please select any contracts mentioned above that you want LPM to pay (note, we do not charge extra for this service.)',
            array(
                array(
                    'value' => 'Security, ',
                    'label' => 'Security'
                ),
                array(
                    'value' => 'Termite, ',
                    'label' => 'Termite'
                ),
                array(
                    'value' => 'Pest, ',
                    'label' => 'Pest'
                ),
                array(
                    'value' => 'Lawn Care, ',
                    'label' => 'Lawn Care'
                ),
                array(
                    'value' => 'Irrigation, ',
                    'label' => 'Irrigation'
                ),
                array(
                    'value' => 'HVAC, ',
                    'label' => 'HVAC'
                ),
                array(
                    'value' => 'Home Warranty, ',
                    'label' => 'Home Warranty'
                ),
            ),
            array()
        ),
        new JFormComponentSingleLineText('othercontracts', "Other Contracts:", array(
            'width' => 'longest',
        )),

        // Preferred Vendors

        new JFormComponentTextArea('preferredvendors', "Please list preferred vendors (handyman, plumber, electrician, etc.) you would like us to use.  Please provide name, type of service & contact information:", array(
            'width' => 'longest',
            'height' => 'medium',
        )),

        // Other Important Information

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Other Important Information</h4><hr />
        '),
        new JFormComponentSingleLineText('woodburning', 'If you have a wood-burning fireplace/wood stove, when was it last inspected/cleaned?<h5><em>**Note that we require inspections every 2-3 years.</em></h5>', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('dryervent', 'When was your dryer vent last cleaned?<h5 class="note"><em>**Note that we require cleanings every 2-3 years.</em></h5>', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('smokedetectorstested', 'When were your smoke detectors last tested?', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('smokedetectorsage', 'How old are your current smoke detectors?<h5 class="note"><em>**Note that smoke detectors should be replaced every 10 years</em></h5>', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('garagekeycode', 'If you havea  garage keypad, please provide the current code:', array(
            'width' => 'longest',
        )),
        new JFormComponentTextArea('safetyhazards', "Are you aware of any safety hazards in your home (i.e. lead paint, carbon monoxide risk, flooding, faulty electrical wiring, etc.)?", array(
            'width' => 'longest',
            'height' => 'mediumShort',
        )),
        new JFormComponentTextArea('otheritems', 'Are there other items at your house we need to know about?<h5 class="note">Pool, Hot Tub, Fish Pond, Fountain, Humidifiers/Dehumidifiers, Sump Pump, Septic Tank, French Drains, Dry Wells, Water Well, Dampers in your HVAC system, Gutter Guards, Special Trees/Plants, Specialized wiring or sound systems, etc.</h5>', array(
            'width' => 'longest',
            'height' => 'medium',
        )),
        new JFormComponentTextArea('otherwarranties', 'Do you have any warranties that are still in effect (appliances, windows, roofs, gutter guards, HVAC system, hot water heater, etc.).  Please provide us with a list and copies of all warranties.', array(
            'width' => 'longest',
            'height' => 'medium',
        )),
        new JFormComponentFile('warrantyfile1', 'Warranty Files:', array(
            'validationOptions' => array('size' => 1024),
            'style' => 'margin-bottom:50px;'
        )),

        // Home Owner's Association

        new JFormComponentHtml('
            <hr /><h4 class="cnter">Home Owner\'s Association</h4><hr />
            <p>Copies of covenants and restrictions must be left at the property for tenants.  <strong>Please contact the association in writing to let them know we are managing your property.</strong>  All communication regarding inspections and violations should be forwarded to us for quick response.  If we are paying your fees/dues, please provide account and payment information and/or coupon books.  Some associations require special addendums or copies of leases.  Please notify us of these requirements so that we can comply.</p>
        '),
        new JFormComponentMultipleChoice('hoadues', 'Will LPM be paying your dues?',
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
        new JFormComponentSingleLineText('hoaname', "HOA Name:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('hoaaccount', 'HOA Account Number, Payment Amount, and Payment Frequency:', array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('hoaaddress', "HOA Address:", array(
            'width' => 'longest',
        )),
        new JFormComponentSingleLineText('hoaphone', "HOA Phone Number:", array(
            'width' => 'mediumShort',
            'mask' => '999-999-9999',
        )),

    ));




    // Set the function for a successful form submission
    function onSubmit($formValues) {

        if(!empty($formValues->name1->middleInitial)) {
            $name = $formValues->name1->firstName.' '.$formValues->name1->middleInitial.' '.$formValues->name1->lastName;
        }
        else {
            $name = $formValues->name1->firstName.' '.$formValues->name1->lastName;
        }
    

        // Prepare the variables for sending the mail   

        $toAddress = 'cjaypetter@gmail.com, lpm@leepropmgt.com';
        $fromAddress = 'owner_informationform@campierson.com';
        $fromName = $name;
        $subject = 'Owner Inormation Update';

        $headers = "From: " . $fromAddress . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
        $message = '
        <style>
            .form-content p {width: 100%; font-weight: bold;}
            p em {font-style: normal; text-decoration: underline; font-weight: normal;}
            p em:after {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
            p em:before {content: "\00a0 \00a0 \00a0"}
            p strong:before {content: "\00a0 \00a0 \00a0 \00a0 \00a0 \00a0 \00a0"}
            .l50 {width: 48%; float: left; text-align: left; padding-right: 2%;}
            .r50 {width: 48%; float: left; text-align: right; padding-right: 2%;}
            .c50 {width: 48%; float: left; text-align: center; padding-right: 2%;}
            h2 {text-align: center;}
        </style>
        <div class="form-content">
            <h1 style="text-align:center">Owner Information Form</h1>
            <hr />
            <div class="l50">   
                <p>Property Address:<em>' . $formValues->propertyaddress . '</em></p>
                <p>Owner Name:<em>' . $name . '</em></p>
                <p>Owner Name:<em>' . $formValues->name2->firstName . ' ' . $formValues->name2->middleInitial . ' ' . $formValues->name2->lastName . '</em></p>
            </div>
            <div class="l50">
                <p>Forwarding Address:<em>' . $formValues->forwardingaddress . '</em></p>
                <p>Email Address:<em>' . $formValues->email1 . '</em></p>
                <p>Email Address:<em>' . $formValues->email2 . '</em></p>
            </div>
            <p style="visibility:hidden;"> . </p>
            <p>Home Phone:<em>' . $formValues->homephone . '</em><strong>Cell Phone:</strong><em>' . $formValues->cellphone1 . '</em><strong>Cell Phone:</strong><em>' . $formValues->cellphone2 . '</em></p>
            <p>Insurance Compnay:<em>' . $formValues->insurancecompany . '</em><strong>Insurance Policy Number:</strong><em>' . $formValues->insurancepolicy . '</em></p>
            <br />

            <h2>Property Info and Service Contracts</h2>
            <hr />
            <p>Do you have a security system?<em>' . $formValues->security . '</em><strong>System currently monitored?</strong><em>' . $formValues->monitored . '</em></p>
            <p>Security Company:<em>' . $formValues->securitycompany . '</em></p>
            <p>Security Account Number:<em>' . $formValues->securityaccount . '</em><strong>Security Code:</strong><em>' . $formValues->securitycode . '</em></p>                
            <p>Do you want to continue paying for this service after the tenant moves in?' . $formValues->securitycontinue . '</p>
            <br />

            <p>Do you have a termite warranty?<em>' . $formValues->termite . '</em></p>
            <p>Termite Company:<em>' . $formValues->termitecompany . '</em><strong>Termite Account Number:</strong><em>' . $formValues->termiteaccount . '</em></p>
            <p>If not, do you want estimates for a policy?<em>' . $formValues->termitecontinue . '</em></p>                
            <br />

            <p>Do you currently pay for quarterly pest service?<em>' . $formValues->pest . '</em></p>
            <p>Pest Company:<em>' . $formValues->pestcompany . '</em><strong>Pest Account Number:</strong><em>' . $formValues->pestaccount . '</em></p>
            <p>Do you want to contine paying for this service after the tenant moves in?<em>' . $formValues->pestcontinue . '</em></p>
            <br />

            <p>Do you have a lawn care contract(fertilizing, weed killer, seeding, etc.)?<em>' . $formValues->lawncare . '</em></p>                
            <p>Lawn Care Company:<em>' . $formValues->lawncarecompany . '</em><strong>Lawn Care Account Number:</strong><em>' . $formValues->lawncareaccount . '</em></p>
            <p>Do you want to continue paying for this service after a tenant moves in?' . $formValues->lawncarecontinue . '</em></p>
            <br />

            <p>Do you have an irrigation system?<em>' . $formValues->irrigation . '</em><strong>Number of zones:</strong><em>' . $formValues->irrigationzones . '</em></p>
            <p>Irrigation Company:<em>' . $formValues->irrigationcompany . '</em><strong>Irrigation Account Number:</strong><em>' . $formValues->irrigationaccount . '</em></p>
            <p>**Note that LPM requires an annual open/close contract on irrigation system</p>
            <br />

            <p>Do you have an annual preventative maintenance contract on HVAC?<em>' . $formValues->hvac . '</em></p>
            <p>HVAC Company:<em>' . $formValues->hvaccompany . '</em><strong>HVAC Account Number:</strong><em>' . $formValues->hvacaccount . '</em></p>
            <p>If not, do you want estimates for an annual contract?<em>' . $formValues->hvacestimate . '</em></p>
            <br />

            <p>Do you have a home warranty?<em>' . $formValues->homewarranty . '</em><strong>Home Warranty Company:</strong><em>' . $formValues->homewarrantycompany . '</em></p>
            <p>Home Warranty Policy Number:<em>' . $formValues->homewarrantypolicy . '</em><strong>Home Warranty Service Phone Number:</strong><em>' . $formValues->homewarrantyphone . '</em></p>
            <br />
            <hr />
            <p style="text-align:center;">*Notify above contractors that Lee Property Management is managing your property*</p>
            <p style="text-align:center;">Phone: 757-886-3022, Billing: 128 Rockmor Ln, Yorktown VA 23693</p>
            <hr />
            <br />

            <p>Accounts for LPM to pay(note, we don\'t charge for this service):<em>' . $formValues->lpmpay[1] . $formValues->lpmpay[2] . $formValues->lpmpay[3] . $formValues->lpmpay[4] . $formValues->lpmpay[5] . $formValues->lpmpay[6] . '</em><strong>Other Contracts:</strong><em>' . $formValues->othercontracts . '</em></p>
            <p>Preferred Vendors (handyman, plumber, electrician, etc.) you would like us to use.  Please provide name, type of service & contact information:<em>' . $formValues->preferredvendors . '</em></p>
            <br />

            <h2>Other Important Information</h2>
            <hr />
            <p>If you have a wood-burning fireplace/stove, when was it last inspected/cleaned?<em>' . $formValues->woodburning . '</em><br />**Note that we require inspections every 2-3 years.</p>
            <p>When was your dryer vent last cleaned:<em>' . $formValues->dryervent . '</em><br />**Note that we require inspections every 2-3 years.</p>
            <p>When were your smoke detectors last tested?<em>' . $formValues->smokedetectorstested . '</em><strong>How old are your current smoke detectors?</strong><em>' . $formValues->smokedetectorsage . '</em><br />**Note that smoke detectors should be replaced every 10 years.</p>
            <p>If you have a garage keypad, please provide the current code:<em>' . $formValues->garagekeycode . '</em></p>
            <p>Are you aware of any safety hazards in your home (i.e. lead paint, carbon monoxide risk, flooding, faulty electrical wiring, etc.)?<em>' . $formValues->safetyhazards . '</em></p>
            <p>Are there other items at your house we need to know about (attach a separate page as necessary)?<br />Pool, Hot Tub, Fish Pond, Fountain, Humidifiers/Dehumidifiers, Sump Pump, Septic Tank, French Drains, Dry Wells, Water Well, Dampers in your HVAC system, Gutter Guards, Special Trees/Plants, Specialized wiring or sound systems, etc.<br /><em>' . $formValues->otheritems . '</em></p>
            <p>Do you have any warranties that are still in effect (appliances, windows, roofs, gutter guards, HVAC system, hot water heater, etc.).  Please provide us with copies of all warranties:<em>' . $formValues->otherwarranties . '</em></p>
            <br />

            <h2> Home Owner\'s Association Info</h2>
            <hr />
            <p style="text-align:center; font-weight:normal;">Copies of covenants and restrictions must be left at the property for tenants.  <span style="font-weight:bold;">Please contact the association in writing to let them know we are managing your property.</span>  All communication regarding inspections and violations should be forwarded to us for quick response.  If we are paying your fees/dues, please provide account and payment information and/or coupon books.  Some associations require special addendums or copies of leases.  Please notify us of these requirements so that we can comply.</p>
            <br />
            <p>Will LPM be paying your HOA dues?<em>' . $formValues->hoadues . '</em></p>
            <p>HOA Name:<em>' . $formValues->hoaname . '</em><strong>HOA Phone Number:</strong><em>' . $formValues->hoaphone . '</em></p>
            <p>HOA Account Number, Payment Amount, & Payment Frequency:<em>' . $formValues->hoaaccount . '</em></p>
            <p>HOA Address:<em>' . $formValues->hoaaddress . '</em></p>
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
    $ownerinfoForm->processRequest();/*

        
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
    