<?php
//load up config file
require_once("src/config/conn.php");
require_once("src/lib/Database.php");
require_once("src/helpers/Format.php");
require_once("src/classes/User.php");
require_once("src/classes/Blog.php");

$db = new Database();

?>

<?php
//adding comment
if(!empty($_POST['comment_text'])){

    if(isset($_POST['submitcomment'])){

        $commentId = uniqid(true);
        $post_id = Format::Stext($_POST['post_id']);
        $comment_text = Format::Stext($_POST['comment_text']);

        if(isset($user_name)){
            $user_id = getUIDByName($user_name);
            $user_type = getUserInfoById($user_id, "type");
        }

        if(isset($ins_name)){
            $user_id = getInsUIDByName($ins_name);
            $user_type = getInsUserInfoById($user_id, "ins_type");
        }
        
        $addcomment = addComments($user_id, $post_id, $comment_text, $commentId, $user_type);

        if($addcomment){
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }else{
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }
    }
}else{
    //echo "Please write something first :)";
}
//end adding comment


//adding reply
if(!empty($_POST['reply_text'])){

    if(isset($_POST['submitreply'])){

        $reply_text = Format::Stext($_POST['reply_text']);

        if(isset($user_name)){
            $user_id = getUIDByName($user_name);
            $user_type = getUserInfoById($user_id, "type");
        }

        if(isset($ins_name)){
            $user_id = getInsUIDByName($ins_name);
            $user_type = getInsUserInfoById($user_id, "ins_type");
        }
        
        $commentId = $_POST['comment_id'];
        $post_id = Format::Stext($_POST['post_id']);

        $addcomment = addReply($user_id, $reply_text, $commentId, $user_type);
        if($addcomment){
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }else{
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }
    }
}else{
    //echo "Please write something first :)";
}
//end adding reply



//delete reply

if(isset($_REQUEST['del-rep-comment'])){

    $reply_id = Format::Stext($_REQUEST['del-rep-comment']);
    $post_id = Format::Stext($_REQUEST['post_id']);

    if(isset($user_name)){
        $user_id = getUIDByName($user_name);
        $user_type = getUserInfoById($user_id, "type");
    }

    if(isset($ins_name)){
        $user_id = getInsUIDByName($ins_name);
        $user_type = getInsUserInfoById($user_id, "ins_type");
    }
    
    if($user_id){

        $delcomment = deleteReply($reply_id);
        if($delcomment){
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }else{
            Format::goto("articlep/$post_id/".getPostNameById($post_id));
        }
    }else{
        Format::goto("article/$post_id/".getPostNameById($post_id));
    }

    

}
//end delete reply


//delete Comment

if(isset($_REQUEST['del-comment'])){

    $comment_id = Format::Stext($_REQUEST['del-comment']);
    $post_id = Format::Stext($_REQUEST['post_id']);

    if(isset($user_name)){
        $user_id = getUIDByName($user_name);
        $user_type = getUserInfoById($user_id, "type");
    }

    if(isset($ins_name)){
        $user_id = getInsUIDByName($ins_name);
        $user_type = getInsUserInfoById($user_id, "ins_type");
    }
    
    if($user_id){

        $delcomment = deleteComment($comment_id);
        if($delcomment){
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }else{
            Format::goto("article/$post_id/".getPostNameById($post_id));
        }
    }else{
        Format::goto("article/$post_id/".getPostNameById($post_id));
    }

    

}
//end deleting comment

?>