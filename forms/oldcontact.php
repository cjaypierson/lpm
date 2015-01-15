<div class="row-fluid">
    <div class="span6 cnter">
    <h2>Contact Information</h2>
        <h4>Phone</h4>
            <p><strong>Message Center:</strong> (757) 886-3022</p>
            <p><strong>Office:</strong> 757-265-1525</p>
        <h4>Fax</h4>
            <p>(480) 393-4327</p>
        <h4>Mailing Address</h4>
            <p>128 Rockmor Lane<br /> Yorktown, VA, 23693</p>
        <h4>E-mail</h4>
            <p>lpm@leeppropmgt.com</p>
        <em style="font-size:1.1em;">*If you would like to contact a specific employee<br /> please refer to our <a href="about">About Us</a> page</em>
    </div>

    <div class="span6 cnter">
        <h2>Send Us A Message</h2>
        <?php
            // display form if user has not clicked submit
            if (isset($_POST["name"]))
              {
                $from = $_POST["email"]; // sender
                $subject = "LPM Information Request";
                $message = $_POST["cmessage"];
                // message lines should not exceed 70 characters (PHP rule), so wrap it
                $message = wordwrap($message, 70);
                // send mail
                mail("cjaypetter@gmail.com",$subject,$message,"From: $from\n");
                echo "Thank you for contacting us.  We will get back to you shortly.";
             } else {
        ?>

            <form method="post" action="http://propertymanagement.io/content/uncategorised/location">
                <p><label class="iconic user" for="name"> Name <span class="required">*</span></label> <input id="name" type="text" name="name" /></p>
                <p><label class="iconic mail-alt" for="email"> E-mail address <span class="required">*</span></label> <input id="email" type="email" name="email" /></p>
                <p><label class="iconic link" for="phone"> Phone Number* </label> <input id="phone" type="text" name="phone" /></p>
                <p><label class="iconic comment" for="cmessage"> Message <span class="required">*</span></label> <textarea style="margin: 2px; height: 80px; width: 300px;" id="cmessage" name="cmessage">I'd like to learn more about your services.</textarea></p>
                <input type="submit" value="submit" /></form>
        <?php
            }
        ?>
    </div>

    <hr />
    
</div>