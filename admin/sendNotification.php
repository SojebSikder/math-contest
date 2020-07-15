<?php
define('DIR','Math Contest');

include "header.php";
include "sidebar.php";
include("../classes/getFetch.php");

$format = new Format();
//Get web data 
    $username = isset($_SESSION['admin_name']);
    $login = $_SESSION['admin_login'];
    $db = new Database();
    $queryweb = "SELECT * FROM web";
    $GetDataweb =$db->select($queryweb)->fetch_assoc();
// </>

//Get User data data 
$queryUser = "SELECT * FROM instructor";
$GetDataUser = $db->select($queryUser)->fetch_assoc();

$queryUserNameIns = "SELECT * FROM instructor";
$GetDataUserNameIns = $db->select($queryUserNameIns);

$queryUserName = "SELECT * FROM register";
$GetDataUserName = $db->select($queryUserName);
// </>

    
?>

<?php
        
    if(isset($_POST['submit'])){

        //echo $format->Stext($_POST['message']);
        //echo $GetDataUser['ins_name'];
        $message = $format->Stext($_POST['message']);
        $name = $format->Stext($_POST['name']);
        $type = $format->Stext($_POST['type']);
  
        sendNotification($message,$name,$type);
    }
          
?>


<div class="grid_10">

    <div class="box round first grid">
    <h2>Update Site Title and Description</h2>
    <div class="block sloginblock">               
        <form method="POST" action="">
        <table class="form" >	

            <tr>
                <td>
                    <label>Sent to</label>
                </td>
                <td>    

                    <input list="name" name="name" autocomplete="off">
                    <datalist id="name">
                    <option value='all'>
                    <?php
                   while($listN = $GetDataUserName->fetch_assoc())
                   {
                        //echo "<option value='user: {$listN['user_name']}'>";
                        echo "<option value='{$listN['user_name']}'>User";
                   }

                   while($listN = $GetDataUserNameIns->fetch_assoc())
                   {
                        //echo "<option value='user: {$listN['user_name']}'>";
                        echo "<option value='{$listN['ins_name']}'>Instructor";
                   }


                    ?>
                    </datalist> 

                </td>
            </tr>
                <tr>
                <td>
                    <label>Notification Message</label>
                </td>
                <td>
                    <input type="text" placeholder="Enter Message..." value="" name="message" class="medium" />
                </td>
            </tr>

            </tr>
                <tr>
                <td>
                    <label>Notification Type</label>
                </td>
                <td>
                    <input type="radio" id="info" name="type" value="info" checked="checked">
                    <label for="info">Info</label><br>
                    <input type="radio" id="warning" name="type" value="warning">
                    <label for="warning">Warning</label><br>
                </td>
            </tr>
                
            
                <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="submit" Value="Update" />
                </td>
            </tr>
        </table>
        </form>
    </div>
    </div>
</div>
<?php include "footer.php";?>