<html>
        <head>
<style>
h1,h2
{
text-shadow: 5px 5px 5px #FF0000;
}
table { border-collapse: collapse; font-family: Futura, Arial, sans-serif; border: 1px solid #777; }
caption { font-size: larger; margin: 1em auto; }
th, td { padding: .65em; }
th, thead { background: #FE0000; color: #fff; border: 1px solid #000; }
tr:nth-child(odd) { background: #ccc; }
tr:hover { background: #aaa; }
td { border-right: 1px solid #777; 
        
</style>
<link rel="stylesheet" type="text/css" href="button/compressed.button.css" />
</head>

    <body>
        <h1>Quiz Result</h1>
        <?php
        if(isset($_POST['submit']))
            {
            $total = 0;
              $ques1 = $_POST['question1'];
              $ques2 = $_POST['question2'];
              $ques3 = $_POST['question3'];
              $ques4 = $_POST['question4'];
              $ques5 = $_POST['question5'];
              $ques6 = $_POST['question6'];
              $ques7 = $_POST['question7'];
              
              if($ques1=='No')
                  $total = $total + 1;
              if($ques1=='No')
                  $total = $total + 1;
              if($ques3=='No')
                  $total = $total + 1;
              if($ques4=='No')
                  $total = $total + 1;
              if($ques5=='No')
                  $total = $total + 1;
              if($ques6=='No')
                  $total = $total + 1;
              if($ques7==='No')
                  $total = $total + 1;
             
              if($total==7){
                  ?>
        <img src="images_imageMenu/complete.png" width =180 height=150>
              <p><font face="algerian" color="RED">CONGRATULATIONS.</font> <b>YOU ARE ELIGIBLE TO DONATE BLOOD. </b><br>*
Every donation can save 3 lives.<br>
if You are unregistered donor,please register yourself as a donor,a life saver.</p><br>
              <a href="reg_Donor_form.php" class="red button criss-cross">Registration</a>
             <?
              }
        else 
        {
          ?>
              <p><font face="algerian" color="RED">Sorry.</font> <b>YOU ARE NOT ELIGIBLE TO DONATE BLOOD. </b><br>*
please check out the eligibility criteria for a successful blood donation</p><br>
              <a href="eligibility.php" class="red button criss-cross">Eligibility</a>
              <?
        }
              
            }
        
        ?>
    </body>
</html>
