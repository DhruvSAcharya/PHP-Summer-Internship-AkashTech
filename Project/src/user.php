<?php 
class UserModel {

    public $id;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $vkey;
    public $is_verified;
    public $otp;
    public $is_shopcreated;
    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

   
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

  
    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    
    public function getVkey()
    {
        return $this->vkey;
    }

  
    public function setVkey($vkey)
    {
        $this->vkey = $vkey;

        return $this;
    }

    
    public function getIs_verified()
    {
        return $this->is_verified;
    }

    
    public function setIs_verified($is_verified)
    {
        $this->is_verified = $is_verified;

        return $this;
    }

    
    public function getOtp()
    {
        return $this->otp;
    }

    
    public function setOtp($otp)
    {
        $this->otp = $otp;

        return $this;
    }

   
    public function getIs_shopcreated()
    {
        return $this->is_shopcreated;
    }

   
    public function setIs_shopcreated($is_shopcreated)
    {
        $this->is_shopcreated = $is_shopcreated;

        return $this;
    }
}


?>