<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFERENCE FORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id= "parent">
        
    <div id= "left">

    </div>

    <div id= "right">

    <div id= "divform">

        <form method="post"> <br>

        <?php
        
        include("db_conn.php");
        error_reporting(E_ALL);
        if(isset($_REQUEST["submit"])){
            $fullname = trim(addslashes($_REQUEST["fullname"]));
            $number = trim(addslashes($_REQUEST["number"]));
            $email = trim(addslashes($_REQUEST["email"]));
            $gender = $_REQUEST["gender"];
            $homeaddress = trim(addslashes($_REQUEST["homeaddress"]));
            $state = $_REQUEST["state"];
            $fulladdress = $homeaddress ."". $state;
            $occupation = trim(addslashes($_REQUEST["occupation"]));
            $company = trim(addslashes($_REQUEST["company"]));
            $years = $_REQUEST["years"];
            $area = trim(addslashes($_REQUEST["area"]));
            $attendance = $_REQUEST["attendance"];
            $ticket = $_REQUEST["ticket"];
            $hear = $_REQUEST["hear"];
            $interest = trim(addslashes($_REQUEST["interest"]));
            $hope = $_REQUEST["hope"];
            $network = $_REQUEST["network"];
            $postevent = $_REQUEST["postevent"];
            $terms = $_REQUEST["terms"];

            // INSERTING VALUES INTO TABLE(conferenceform) ON THE DATABSE

            $sql = "INSERT INTO conferenceform(fullname, phone, email, gender, homeaddress, `state`, occupation, company, years, area, attendance, ticket, hear, interest, hope, network, postevent, terms) VALUES ('$fullname','$number','$email','$gender','$homeaddress','$state','$occupation', '$company', '$years', '$area', '$attendance', '$ticket', '$hear', '$interest', '$hope', '$network', '$postevent', '$terms')";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $num = mysqli_insert_id($conn);
            if(mysqli_affected_rows($conn)!=1){
                $message = "Error inserting record into database";
            }
            // END


            if( $gender == "male"){
                $title = "Sir";
                 echo "<script>alert('Dear $title $fullname, your details has been successfully received and these include your home address $fulladdress, email adrress $email, phone number $number, occupation $occupation, company you work for, $company, your ticket category $ticket, your personal interest $interest and others. Thank you for registering for the REAL ESTATE CONFERENCE 1.0, enjoy the event!')</script> ";
            }else{
                $title = "Ma";
                 echo "<script>alert('Dear $title $fullname, your details has been successfully received and these include your home address $address, email adrress $email, phone number $number, occupation $occupation, company you work for, $company, your ticket category $ticket, your personal interest $interest and others. Thank you for registering for the REAL ESTATE CONFERENCE 1.0, enjoy the event!')</script> ";
            }

        }

        ?>

        <fieldset>

            <legend>REGISTRATION FORM</legend>

            <!-- PERSONAL INFORMATION -->

            <div id= "ptag"><p>PERSONAL INFORMATION</p> </div>

            <label for="">FULLNAME</label> <br>
            <input type="text" placeholder= "Enter your fullname" id= "fullname" name= "fullname" required><br><br>

            <label for="">PHONE NUMBER</label> <br>
            <input type="number" placeholder= "Enter your phone number" id= "number" name= "number" required><br><br>

            <label for="">EMAIL ADDRESS</label> <br>
            <input type="email" placeholder= "Enter your email address" id= "email" name= "email" required> <br><br>

            <label for="">GENDER</label> <br>
            <input type="radio" value= "male" name= "gender" required>Male
            <input type="radio" value= "female" name= "gender" required>Female <br><br>

            <label for="">HOME ADDRESS</label> <br>
            <input type="text" placeholder= "Enter your home address" id= "homeaddress" name= "homeaddress" required> <br><br>

            <select name="state" id="state" required>

                <option value="">--SELECT STATE--</option>

                <?php
                
                $statelist = "Abia, Adamawa, Akwa-Ibom, Anambra, Bauchi, Bayelsa, Benue, Borno, Cross River, Delta, Ebonyi, Edo, Ekiti, Enugu, Gombe, Imo, Jigawa, Kaduna, Kano, Katsina, Kebbi, Kogi, Kwara, Lagos, Nasarawa, Niger, Ogun, Ondo, Osun, Oyo, Plateau, Rivers, Sokoto, Taraba, Yobe, Zamfara, Abuja";
                $arrStates = explode("," , $statelist);
                $countState = count($arrStates);
                $maincount = $countState - 1;

                for($x = 0; $x <= $maincount; $x = $x + 1){
                    echo "<option value= '$arrStates[$x]'>$arrStates[$x]</option>";
                }

                ?>

            </select>
            <!-- END -->


            <!-- PROFESSIONAL DETAILS -->
             
            <div id= "ptag"><p>PROFESSIONAL DETAILS</p></div>

            <select name="occupation" id="occupation" required>

            <option value="">--SELECT OCCUPATION--</option>

            <?php
            
            $occupationlist = "Realtor, Investor, Developer, Architect, Student, Lawyer, Banker, Engineer, Other";
            $arrOcc = explode("," , $occupationlist);
            $countOcc = count($arrOcc);
            $maincount = $countOcc - 1;

            for($occ = 0; $occ <= $maincount; $occ = $occ + 1){
                echo "<option value = '$arrOcc[$occ]'>$arrOcc[$occ]</option>";
            }

            ?>

            </select> <br><br>

            <label for="">COMPANY / ORGANIZATION NAME</label> <br>
            <input type="text" placeholder= "Enter your Company's name" name= "company" id= "company" required> <br><br>

            <label for="">YEARS OF EXPERIENCE IN REAL ESTATE</label> <br>
            <input type="text" placeholder= "Enter years of experience" name= "years" id= "years" required> <br><br>

            
            <select name="area" id="area" required>

            <option value="">--AREA OF SPECIALIZATION--</option>

            <?php
            
            $arealist = "Residential, Commercial Land, Property Management, Finance, Other";
            $arrArea = explode("," , $arealist);
            $countArea = count($arrArea);
            $maincount = $countArea - 1;

            for($area = 0; $area <= $maincount; $area = $area + 1){
                echo "<option value = '$arrArea[$area]'>$arrArea[$area]</option>";
            }

            ?>

            </select>
            <!-- END -->



            <!-- CONFERENCE DETAILS -->

            <div id= "ptag"><p>CONFERENCE DETAILS</p></div>

            <label for="">ATTENDANCE TYPE</label> <br>
            
            <input type="radio" name= "attendance" value= "In person" required> In Person
            <input type="radio" name= "attendance" value= "Virtual" required> Virtual <br><br>

            <label for="">TICKET CATEGORY</label> <br>

            <input type="radio" name= "ticket" value= "Regular" required> Regular
            <input type="radio" name= "ticket" value= "VIP" required> VIP
            <input type="radio" name= "ticket" value= "Student" required> Student
            <input type="radio" name= "ticket" value= "Sponsor" required> Sponsor <br><br>

              <select name="hear" id="hear" required>

            <option value="">--HOW DID YOU HEAR ABOUT THIS CONFERENCE?--</option>

            <?php
            
            $hearlist = "Social Media, Referral, Website, Email, Radio, Other";
            $arrHear = explode("," , $hearlist);
            $countHear = count($arrHear);
            $maincount = $countHear - 1;

            for($hear = 0; $hear <= $maincount; $hear = $hear + 1){
                echo "<option value = '$arrHear[$hear]'>$arrHear[$hear]</option>";
            }

            ?>

            </select>
            <!-- END -->

            
            <!-- INTERESTS & EXPECTATIONS -->

            <div id= "ptag"><p>INTERESTS & EXPECTATIONS</p></div>

            <select name="interest" id="interest" required>

            <option value="">--TOPICS OF INTEREST--</option>

            <?php
            
            $interestlist = "Property Investment, Real Estate, Tech, Housing Policy, Financing, Marketing, Legal Issues, Other";
            $arrInterest = explode("," , $interestlist);
            $countInterest = count($arrInterest);
            $maincount = $countInterest - 1;

            for($interest = 0; $interest <= $maincount; $interest = $interest + 1){
                echo "<option value = '$arrInterest[$interest]'>$arrInterest[$interest]</option>";
            }

            ?>

            </select> <br><br>
            <!-- END -->


            
            <!-- PERSONAL EXPECTATIONS -->

            <label for="">PERSONAL EXPECTATIONS</label> <br>
            <textarea name="hope" id="hope" placeholder= "What do you hope to gain from this conference?" required></textarea>

            <div id= "ptag"><p>NETWORKING</p></div>

            <label for="">Would you like to receive networking opportunities?</label> <br>
            <input type="radio" value= "Yes" name= "network" required> Yes
            <input type="radio" value= "No" name= "network" required> No <br><br>
            
            <label for="">Do you want to receive post-event updates and materials??</label> <br>
            <input type="radio" value= "Yes" name= "postevent" required> Yes
            <input type="radio" value= "No" name= "postevent" required> No <br><br>

            <label for="">Terms and conditions agreement</label> <br>
            <input type="checkbox" name="terms" id="terms" value= "I agree" required>I agree <br><br>
            <!-- END -->


            <button type="submit" name= "submit" id= "submit" onclick= "return confirm('Are you sure to submit this form?')">SUBMIT</button>

        </fieldset>
    </form>

    </div>



    </div>

    </div>
    
</body>
</html>