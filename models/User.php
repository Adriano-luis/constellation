<?php 
class User extends Model {
    
    public function isLogged() {
        if(isset($_SESSION['authuser']) && !empty($_SESSION)) {
            return true;
        } else {
            return false;
        }
    }
}