<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>
<?php
/**
 * Role CLass
 */
class Role{
    private $db;
    private $format;

    protected $permissions;

    protected function __construct(){
        $this->db = new Database();
        $this->format = new Format();

        $this->permissions = array();
    }

    //Return a role object with associated permissions
    public static function getRolePerms($role_id){
        $role = new Role();

        $sql = "SELECT * FROM role_perm as contest JOIN permissions as contest2 ON perm_id = perm_id WHERE role_id  = :role_id";
        //$sth = $this->db->select($sql);

        while ($row = $sth->fetch_assoc()) {
            $role->permissions[$row["perm_desc"]] = true;
        }
        return $role;

    }

    //check if a permission is set
    public function hasPerm($permission){
        return isset($this->permissions[$permission]);
    }

    //insert a new role
    public static function insertRole($role_name){
        //$role_name = $this->format->Stext($role_name);

        $sql = "INSERT INTO roles(role_name) values ('$role_name')";
        //$sth = $this->db->insert($sql);
    }

    //insert array of roles for specified user id
    public static function insertUserRoles($user_id, $roles){
        //$user_id = $this->format->Stext($user_id);
        //$roles = $this->format->Stext($roles);

        $sql = "INSERT INTO user_role(user_id, role_id) VALUES('$user_id','$roles')";
        //$sth = $this->db->insert($sql);
        return true;
    }
    
}


?>