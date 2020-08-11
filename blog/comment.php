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
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment added :)");
        }else{
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment not added :(");
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
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment reply added :)");
        }else{
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment reply not added :(");
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
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"reply deleted :)");
        }else{
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"reply not delete :(");
        }
    }else{
        Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Your not eligible to delete :(");
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
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment deleted :)");
        }else{
            Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Comment not delete :(");
        }
    }else{
        Format::jumpTo("blog-single.php?id=$post_id&name=".getPostNameById($post_id),"Your not eligible to delete :(");
    }

    

}
//end deleting comment

?>