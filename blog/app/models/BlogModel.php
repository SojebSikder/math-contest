<?php

class BlogModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function fetchBlog($table){

        $execute = $this->db->select("SELECT * FROM $table ORDER BY id DESC");
        return $execute;
    }

    public function postBlog($postTitle, $postDesc, $userEmail){
        
        $execute = $this->db->insert("INSERT INTO blog_post(blog_title, blog_description, user_email) 
            VALUES('$postTitle', '$postDesc', '$userEmail')");

        if($execute){
            return true;
        }else{
            return false;
        }
        
    }


    public function post($id){

        $execute = $this->db->select("SELECT * FROM blog_post WHERE id= $id");
        return $execute->fetch_assoc();
    }
    
    public function comments($id){

        $execute = $this->db->select("SELECT * FROM blog_comments WHERE post_id= $id ORDER BY created_at DESC");
        return $execute->fetch_assoc();
    }

    public function getUserById($id){

        $execute = $this->db->select("SELECT * FROM instructor WHERE id= $id LIMIT 1");
        return $execute->fetch_assoc()['ins_name'];
    }

    public function getRepliesByCommentId($id){

        $execute = $this->db->select("SELECT * FROM blog_reply WHERE comment_id = $id LIMIT 1");
        return $execute->fetch_assoc();
    }

    public function getCommentsCountByPostId($id){

        $execute = $this->db->select("SELECT COUNT(*) AS total FROM blog_comments");
        return $execute->fetch_assoc()['total'];
    }

}


?>