<?php
include "header.php";
include "sidebar.php";
include "../classes/Web.php";

$db = new Database();
$format = new Format();


if(isset($_POST['reset'])){

    if(isset($_POST['answere'])){
        $db->delete("DELETE FROM answere");
    }

    if(isset($_POST['submitted'])){
        $db->delete("DELETE FROM submitted");
    }

    if(isset($_POST['contact'])){
        $db->delete("DELETE FROM contact");
    }

    if(isset($_POST['notifications'])){
        $db->delete("DELETE FROM notifications");
    }

    if(isset($_POST['leaderboard'])){
        $db->delete("DELETE FROM leaderboard");
    }

    if(isset($_POST['post'])){
        $db->delete("DELETE FROM post");
    }

    if(isset($_POST['winner_list'])){
        $db->delete("DELETE FROM winner_list");
    }
    
}

?>



<div class="grid_10">


    <div class="box round first grid">
    <h2>Basic</h2>
    <div class="block sloginblock">
        

 <div class="container">
    <div class="row">


        <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">

            <h4>Reset</h4>
            <form method="post" action="">

        <div>

        <ul>
            <ol>
                <input type="checkbox" id="ans" name="answere"></input>
                <label for="ans">Answere</label>
            </ol>
            
            <ol>
                <input type="checkbox" id="sub" name="submitted"></input>
                <label for="sub">Submitted</label>
            </ol>

            <ol>
                <input type="checkbox" id="con" name="contact"></input>
                <label for="con">Contact</label>
            </ol>

            <ol>
                <input type="checkbox" id="no" name="notification"></input>
                <label for="no">Notification</label>
            </ol>

            <ol>
                <input type="checkbox" id="le" name="leaderboard"></input>
                <label for="le">Leaderboard</label>
            </ol>

            <ol>
                <input type="checkbox" id="post" name="post"></input>
                <label for="post">Post</label>
            </ol>

            <ol>
                <input type="checkbox" id="win" name="winner"></input>
                <label for="win">Winner List</label>
            </ol>

        </ul>
            
        </div>

            <p>*All  data will be reset</p>
            <input class="m-btn waves-effect" type="submit" name="reset" value="Reset Website">
            

            </div>
           </div>
        </div>



            </form>



    </div>
 </div>






</div>
</div>
</div>



<?php include "footer.php";?>