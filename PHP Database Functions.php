<?php

/* Initialize the database connection for querying or updating data */ 
function database_initial(){
    //Initialize the database connection. 
    $con = mysqli_init();
    if (!$con){
        die("mysqli_init failed. Cannot connect to database."); 
    }

    //Check for SSL connections in database if necessary. 
    mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL); 

    //Connect to the database instance using the connection. 
    //Note passwords and other components may need to be changed post-testing. 
    if (!mysqli_real_connect($con, "pragmaticstestmysql.mysql.database.azure.com", "InnovationLight@pragmaticstestmysql", "1nnovationLight", "Pragmatics TEST Azure", 3306){
        die("Connect Error: " . mysqli_connect_error());
    }

    return $con; 
}

/* Close the existing database connection */ 
function database_close($con){
    mysqli_close($con); 
}

/* Pull email or phone number for user to send the code */ 
function pull_user_info($empid){
    $con = database_initial(); 
    mysqli_select_db($con,"testdata");
    $query_string = "SELECT personal_email, phone FROM empinfo WHERE empid = '$empid';"

    //Hold the object that contains information including email and phone number (used for sending the code). 
    $information = mysqli_query($con, $query_string); 
    
    // If query was successful add congratulatory message here
    database_close($con); 

    return $information;
}

/* Update the employee id's password and last time password was updated */ 
function update_password($password, $empid){
    $con = database_initial(); 
    mysqli_select_db($con,"testdata");
    $query_string = "UPDATE empinfo SELECT emp_password = '$password', last_pass_reset = SYSDATE() WHERE empid = '$empid';"
    mysqli_query($con, $query_string); 
    database_close($con); 

    // If reset is successful add congratulatory message here
}

/* Update the employee id's phone and personal email. 
This function permits no changes to phone and/or email (they will still be pushed into database for operational basis).

Note the following:
 - This function does not update Employee ID of employee.
 - This function does not update the work email address of employee. 
 - This function does not update the first and last name of employee. 
*/
function update_user_info($phone, $email, $empid){
    $con = database_initial(); 
    mysqli_select_db($con,"testdata");
    $query_string = "UPDATE empinfo SELECT personal_email = '$email', phone = '$phone' WHERE empid = '$empid';"
    mysqli_query($con, $query_string); 
    database_close($con); 

     // If query was successful add congratulatory message here
}

/* Get date of last password reset */ 
function getLastPasswordResetDate($empid){
    $con = database_initial(); 
    mysqli_select_db($con,"testdata");
    $query_string = "SELECT last_pass_reset FROM empinfo WHERE empid='$empid';"

    /* Hold the date object associated from the query */ 
    $date = mysqli_query($con, $query_string); 
    database_close($con); 

    //Send message indicating that application was able to pull from database. 

    return $date; 
}

/* Check if the password is about to expire 
- Should do this for all employees to save computational resources of calling each function? 
*/
function passwordExpire($empid){
    $databaseDate = getLastPasswordResetDate($empid); 
    $systemDate = getdate(); 

    /* Need to retrieve the day and month of date from database 
    AND the day and month from the system. */ 
    ... 

    /* Calculate the number of days since password reset (within 180 days) */
    ...

    /*If it has been 150, 160, 170, 175-179 days since password reset, send notification to user by
    sending an email to the employee */ 


}

/* Send an email to users for 90 days notification reminder to verify their identifying information. 
- Should we continuously remind users to verify their info or is this optional?  
*/
function sendNotificationToVerifyData(){

}
//Used to pull data for each employee for password reset mechanism 
function allEmployees(){}


?> 