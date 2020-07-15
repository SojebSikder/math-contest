<?php
include "header.php";
include "sidebar.php";

    $db = new Database();
    $format = new Format();

//Get web data 
    $username = isset($_SESSION['admin_name']);
    $login = $_SESSION['admin_login'];

    $queryweb = "SELECT * FROM web";
    $GetDataweb =$db->select($queryweb)->fetch_assoc();
// </>

if(isset($_POST['submit'])){

    $title = $format->Stext($_POST['title']);
    $slogan = $format->Stext($_POST['slogan']);
      
      $queryup = "UPDATE web SET web_title='$title',web_slogan='$slogan' where id=1";
      
      $readup =$db->update($queryup);
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
                    <label>Website Title</label>
                </td>
                <td>
                    <input type="text" placeholder="Enter Website Title..." value="<?php echo $GetDataweb['web_title']; ?>"  name="title" class="medium" />
                </td>
            </tr>
                <tr>
                <td>
                    <label>Website Slogan</label>
                </td>
                <td>
                    <input type="text" placeholder="Enter Website Slogan..." value="<?php echo $GetDataweb['web_slogan']; ?>" name="slogan" class="medium" />
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