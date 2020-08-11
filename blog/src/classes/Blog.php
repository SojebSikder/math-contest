<?php

$db = new Database();

function getPost(){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_status = 'Publish' ORDER BY id DESC");

    return $result;
}

function getPostNameById($id){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_id='$id' AND blog_status = 'Publish'")->fetch_assoc();

    return $result['blog_name'];
}

function getPostById($id){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE id='$id' AND blog_status = 'Publish'")->fetch_assoc();

    return $result;
}

function getLatestPost(){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_status = 'Publish' ORDER BY id DESC LIMIT 2");

    return $result;
}

function getPostByCategory($category){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_category = '$category' ORDER BY id DESc");

    return $result;
}

function getBlogCategory(){
    global $db;
    $result = $db->select("SELECT * FROM blog_category");

    return $result;
}

function getBlogTagByPostId($id){
    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_id='$id'");

    return $result->fetch_assoc()['blog_tag'];
}

function getBlogIdByBlogName($name){

    global $db;
    $result = $db->select("SELECT * FROM blog_post WHERE blog_name= '$name' ");
    
    if($result){
        $exe = $result->fetch_assoc()['blog_id'];
        return $exe;
    }

}



//user
// Receives a user id and returns the username
function getUsernameById($id)
{
    global $db;
    $result = $db->select("SELECT user_name FROM register WHERE user_id='$id' LIMIT 1");
    // return the username
    return $result->fetch_assoc()['user_name'];
}

//comment code
function getCommentByPostID($id){
    global $db;
    $comments = $db->select("SELECT * FROM blog_comments WHERE post_id = '$id' ORDER BY created_at DESC ");
    
    if($comments){
        $result = $comments;
        return $result;
    }
}


function getCommentCountByPostId($id){
    global $db;
    $result = $db->select("SELECT COUNT(*) AS total FROM blog_comments WHERE post_id='$id' ");
    $data = $result->fetch_assoc();
    return $data['total'];
}

// Receives a comment id and returns the username
function getRepliesByCommentId($id)
{
    global $db;
    $result = $db->select("SELECT * FROM blog_reply WHERE comment_id = '$id' ORDER BY id DESC ");
    $replies = $result;
    return $replies;
}
// Receives a post id and returns the total number of comments on that post
function getCommentsCountByPostId($post_id)
{
    global $db;
    $result = $db->select("SELECT COUNT(*) AS total FROM blog_comments");
    $data = $result->fetch_assoc();
    return $data['total'];
}

function addComments($user_id, $post_id, $body, $comment_id, $type){
    global $db;
    $sql = "INSERT INTO blog_comments(user_id, post_id, body, comment_id, created_at, updated_at, user_type)
         VALUES('$user_id', '$post_id', '$body', '$comment_id', now(), null, '$type')";
    $result = $db->insert($sql);
    $replies = $result;

    if($replies){
        return true;
    }else{
        return false;
    }
    
}

function deleteComment($comment_id){
    global $db;
    $sql = "DELETE FROM blog_comments WHERE comment_id = '$comment_id'";
    $del = $db->delete($sql);

    if($del){
        return true;
    }else{
        return false;
    }
}


function addReply($user_id, $body, $comment_id, $user_type){
    global $db;
    $reply_id = uniqid(true);
    $sql = "INSERT INTO blog_reply(reply_id, user_id, body, comment_id, created_at, updated_at, user_type)
         VALUES('$reply_id', '$user_id', '$body', '$comment_id', now(), null, '$user_type')";
    $result = $db->insert($sql);
    $replies = $result;

    if($replies){
        return true;
    }else{
        return false;
    }
    
}

function deleteReply($reply_id){
    global $db;
    $sql = "DELETE FROM blog_reply WHERE reply_id='$reply_id'";
    $del = $db->delete($sql);

    if($del){
        return true;
    }else{
        return false;
    }
}


?>