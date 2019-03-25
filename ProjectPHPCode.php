
<!--
- https://stackoverflow.com/questions/16373217/sending-an-email-verification-after-registering
- https://stackoverflow.com/questions/16698240/how-to-implement-email-verification-with-php
- https://wordpress.stackexchange.com/questions/60318/sending-the-reset-password-link-programatically
- https://www.php.net/manual/en/function.mail.php
- https://www.inmotionhosting.com/support/website/sending-email-from-site/using-the-php-mail-function-to-send-emails
- https://stackoverflow.com/questions/29733471/send-link-using-php-mail-function

-->

<?php 


function createSQLConnection(){
    $host = 'dbinnovationlight.mysql.database.azure.com';
    $username = 'InnovationLight@dbinnovationlight';
    $password = '1nnovationLight';
    $db_name = 'testdata';

    //Establishes the connection
    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
     }
        
    $dbh = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

    return array($conn, $dbh); 
}

//90 DAY NOTIFICATION
function sendSMS90day($dbh){
    $phone = array();
    foreach($dbh->query('SELECT phone FROM empinfo') as $row) {
       $phone[] = implode($row);
    }

    //trim the string to get the 10 digit phone number
    $userPhone = "";
    foreach($phone as $splitme) {
      $s = $splitme;
      $m = "|";
      $split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
      $length = (strlen($split)/2);
      $store = mb_strimwidth($split, 0, $length);
      $userPhone[] = $store;
   }	
   
   //send notification text message to all phone number.
   foreach($userPhone as $phoneNumber) {
       $to = ($phoneNumber);
       $from = "pragmatics@gmail.com";
       $message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~zlaflous/index.php/resetpass.php to confirm your personal email and phone number are correct. \n\nThank you, \nPragmatics Automated Password Reset System";
       $message = wordwrap($message, 70, "\r\n");
       $headers = "From: $from\n";
       mail($to, $from, $message, $headers);
       //echo "sent";
       }
}

//90 DAY NOTIFICATION
function sendEmail90Day($dbh){
    // Queries the Azure database and assembles the work emails into an array
    $emailsDouble = array();

    // CHANGE PERSONAL TO WORK!
    foreach($dbh->query('SELECT personalEmail FROM empinfo') as $row) {
        $emailsDouble[] = implode($row);
    }
        
    // Since the array prints doubles for some reason, dividing the strings in half, so only a valid email is remaining
    $emails = array();
    
    foreach($emailsDouble as $splitme) {
        $s = $splitme;
        $m = "|";
        $split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
        $length = (strlen($split)/2);
        $store = mb_strimwidth($split, 0, $length);
        $emails[] = $store;
    }

    
    //Construct the email message to all employees
	$message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~chong4/IT207/resetpass.php to confirm your personal email and phone number are correct. \n\nThank you, \nPragmatics Automated Password Reset System"; 
    $message = wordwrap($message, 70, "\r\n");
    $subject = "90 Day Notification: Please Confirm Information Is Correct";
    $to = "";
    $from = "pragmatics@gmail.com"; 

	foreach($emails as $emailAddress) {
		mail($emailAddress, $from, $subject, $message);
		echo "sent";
	}
}

//90 DAY NOTIFICATION
function check90DayDate(){
    $day = date("z");
    if ($day == 150 or $day == 310) {
        return true;
    }
    return false;
}

function main() {
    //Forming the SQL Connections
    $SQLconnections = createSQLConnection();
    $conn = $SQLconnections[0]; 
    $dbh = $SQLconnections[1];

    //Check if the date of the year requires 90-day notification to be sent to text messages and emails.
    if (check90DayDate()){
        sendSMS90day($dbh); 
        sendEmail90Day($dbh);
    }
   
    mysqli_close($conn); 
}


///BETA IN PROGRESS
/* We will need to have another table called "PasswordToken" that would hold the following fields: 
- empID (FOREIGN KEY), 
- token (for use of when password has expired or not; to verify user and increase security), 
- isExpired (BOOLEAN - indicating if the user's password has expired or not). 

The other table empInfo would indicate if user has reset their passwords or not before expiration. 
*/
function sendSMSpasswordExpired($dbh){
    $phone = array();
    foreach($dbh->query('SELECT phone FROM empinfo WHERE empid IN (SELECT empid FROM passwordToken WHERE isExpired = 1)')){
        $phone[] = implode($row);
    }

    //trim the string to get the 10 digit phone number
    $userPhone = "";
    foreach($phone as $splitme) {
      $s = $splitme;
      $m = "|";

      //What is $1 and $2???? 
      $split = preg_replace('/(.{'.ceil(strlen($s)/2).'})(.*)/', "$1$m$2", $s);
      $length = (strlen($split)/2);
      $store = mb_strimwidth($split, 0, $length);
      $userPhone[] = $store;
   }	
   
   //send notification text message to all phone number.
   foreach($userPhone as $phoneNumber) {
       $to = ($phoneNumber);
       $from = "pragmatics@gmail.com";
       $headers = "From: $from\n";

       //Generate the token - http://thisinterestsme.com/generating-random-token-php/
       //https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php
       $token = openssl_random_pseudo_bytes(16);
       $token = bin2hex($token); 
       //Puts the token in the database table passwordToken
       $dbh -> query('UPDATE passwordToken SET token = ' . $token . ' WHERE empid IN (SELECT empid FROM empinfo WHERE phone = ' . $phoneNumber . ')');

       $message = "Greetings, \n\nPlease navigate to http://helios.ite.gmu.edu/~zlaflous/index.php/index.php?token=" . $token ." to confirm your personal email and phone number are correct. \n\nThank you, \nPragmatics Automated Password Reset System";
       $message = wordwrap($message, 70, "\r\n");
       
       mail($to, $from, $message, $headers);
       //echo "sent";
       }
}

?>