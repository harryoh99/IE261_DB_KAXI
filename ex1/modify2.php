<?php
   $servername = 'localhost';
   $username = 'root';
   $pw = '1234';
   $db = 'kaxi';

   $conn = mysqli_connect($servername,$username,$pw,$db) or die("Mysql connection failed");

   $id = $_POST['ID'];
   $u_pw = $_POST['Password'];

   $sql = "select * from personTBL where (userid='".$id."' and pw = '".$u_pw."');";
   $ret = mysqli_query($conn,$sql);
   $continue = 0;
   if($ret){
      $count = mysqli_num_rows($ret);
      if($count==0){

         echo '<script type="text/javascript">alert("no data!!"); history.back(-1)</script>';
      }
      else{
         $continue = 1;
         $row = mysqli_fetch_array($ret);
         $name = $row['username'];
         $sex = $row['sex'];
         $phoneNum = $row['phoneNum'];
      }
   }
   else{
      echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
   }

   assert($continue==1);
   $sql2 = "select * from userTBL where userid='".$id."';";
   $ret2 = mysqli_query($conn,$sql2);
   if($ret2){
      $count = mysqli_num_rows($ret2);
      if($count>0){
         $row = mysqli_fetch_array($ret2);
         $email = $row['email'];
      }
      else{
         //이 부분은 taxi 관련된 거라 따로 뺄꺼면, 사실 따로 쓰면 될듯
         $sql3 = "select * from driverTBL where userid='".$id."';";
         $ret3 = mysqli_query($conn,$sql3);
         if($ret3){
            $count = mysqli_num_rows($ret3);
            if($count>0){
               $row = mysqli_fetch_array($ret3);
               $taxiNum = $row['taxiNUM'];
               $taxiCompanyName = $row['taxiCompanyName'];

            }
            else{
               '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
            }
         }
         else{
            echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
         }
      }
   }
   else{
      echo '<script type="text/javascript">alert("Search Fail"); history.back(-1)</script>';
   }
   



   



?>


<html>
   <head>
   <title> Register </title>
   <style>
      button {
         width:100px;
         background-color: gray;
         border: none;
         border-radius:10px;
         color:#fff;
         padding: 15px 0;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 15px;
         margin: 4px;
         cursor: pointer;
      }
      .txtBox00, .txtBox01, .txtBox02, .txtBox03, .txtBox04 { border-style: solid; border-width: 2px; padding: 12px; word-break: break-all; } .txtBox00 { border-color: LightGray; } .txtBox01 { border-color: DodgerBlue; } .txtBox02 { border-color: LightSalmon; } .txtBox03 { border-color: Tomato; } .txtBox04 { border-color: Crimson; }

      input[type=text] {
         width: 100%;
         box-sizing: border-box;
         border: 2px solid #ccc;
         border-radius: 4px;
         font-size: 16px;
         background-color: white;
         background-image: url('searchicon.png');
         background-position: 10px 10px; 
         background-repeat: no-repeat;
         padding: 12px 20px 12px 40px;
      }
      input[type=submit]{
         width:80px;
         background-color: black;
         border: none;
         border-radius:8px;
         color:#fff;
         padding: 12px 0;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 12px;
         margin: 3.5px;
         cursor: pointer;
      }   

      table {
      width: 100%;
      border-top: 1px solid #ccc;
      border-left: 3px solid #369;
      border-right: 3px solid #369;
      }
      th, td {
      border-bottom: 1px solid #444444;
      }


   </style>
   </head>
   <body>
      <form method = "post" action = 'modify_result.php'>
         <table align='center'  width='500'>
            <tr align='center' height='80'>
               <td colspan='2'> <B>Modify your information!!</B> </td> 
            </tr>
         </table>
         <table align='center'  width='500'>
            <tr align='center' height='50'>
               <td width = '50'> <B>ID</B> </td>
               <td> <input type="text" name="id" size="10" value=<?php echo $id?> readonly/></input><br> </td>
            </tr>
            <tr align = 'center' height = '50'>
               <td> <B>Password</B> </td>
               <td> <input type="text" name="pw" size="10" value=<?php echo $u_pw?> /></input><br> </td>
            </tr>
            <tr align='center' height='50'>
               <td> <B>Name</B> </td>
               <td> <input type="text" name="name" size="10" maxlength="12" value = <?php echo $name?> placeholder="Name.."></input><br> </td>
            </tr>
            <?php
            if ($sex=='Male'){ 
                  echo"
                  <tr align='center' height='50'>
                     <td align='center' colspan='2'> <B> Choose Your Gender: </B> <input type= 'radio', name='gender' value='Male' checked = 'checked'> Male <input type= 'radio', name='gender' value='Female'> Female </td>
                  </tr>
                  ";
            }
            else{
               echo "
               <tr align='center' height='50'>
                  <td align='center' colspan='2'> <B> Choose Your Gender: </B> <input type= 'radio', name='gender' value='Male'> Male <input type= 'radio', name='gender' value='Female' checked = 'checked'> Female </td>
               </tr>
               ";
            }
            
            ?>
            <tr align='center' height='50'>
               <td> <B>PhoneNumber</B> </td>
               <td> <input type="text" name="phonenumber" size="10" maxlength="11" value = <?php echo $phoneNum ?> placeholder="phonenumber.."></input><br> </td>
            </tr>
            <tr align='center' height='50'>
               <td> <B>e-mail</B> </td>
               <td> <input type="text" name="e-mail" size="10" value = <?php echo $email?> placeholder="email.."></input><br> </td>
            </tr>
            <tr align='center' height='40'>
               <td colspan='2'> <input type="submit" value="modify"></input> </td>
            </tr>
         </table>
      </form>
      <button type="button" onclick="location.href='modify.php'"><B>Back</B></button>
   </body>
</html>