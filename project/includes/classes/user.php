<?php

/* ------------------------------
    includes/classes/user.php
---------------------------------*/

class User {
    
    private $id;
    private $name;
    private $email;
    
    function __construct($id = 0){
        if($id != 0) {
            $user = sql("SELECT * FROM user WHERE id = '".$id."'");
            $u = $user[0];
            $this->id = $u['id'];
            $this->name = $u['name'];
            $this->email = $u['email'] ;
            
        }
    }
    
    function getId() {
        return $this->id;
    }
    
    function setName($name) {
        $this->name = $name;
    }
    
    function getName() {
        return $this->name;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function modifyPassword($password) {
        $res = sql("
            UPDATE user
            SET password ='".md5($password)."' where id = '".$this->id."'
        ");
        return $res;
    }
    
    static function checkCredentials($email,$password) {
        $res = sql("
            SELECT id
            FROM user
            WHERE email = '".addslashes($email)."'
            AND password = '".md5($password)."' LIMIT 1");
        if($res === FALSE) {
            return FALSE;
        }
        else{
            $total = count($res);
            if($total != 1) {
                return FALSE;
            }
            else {
                return new User($res[0]['id']);
            }
        }
    }
    
    static function checkMail($email) {
        $res = sql("
            SELECT count(*) as total FROM user WHERE email ='".$email."'
        ");
        $check = $res[0];
        if($check['total'] == 1 ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    static function createTmpPassword($email) {
        // Définir le mot de passe aléatoire temporaire
        //liste de caractères qui va être utilisée pour le mot de passe
		$choix = ['0','1','2','3','4','5','6','7','8','9','a','z','e','r','t','y','u','i','p','q','s','d','f','g','h','j','k','m','w','x','c','v','b','n','l','o'];
		
		$pass = '';
		for($i=0;$i<10;$i++){
			$caractereAuHasard = $choix[rand(0,count($choix)-1)];
			$pass = $pass.$caractereAuHasard;
		}
        
        $res = sql("
            UPDATE user
            SET password ='".md5($password)."' where email = '$email'
        ");
        return $password;        
    }
}