<?php
class ShopModel{
    public $userid;
    public $shopid;
    public $shopname;
    public $shopaddress;
    public $shopcontact;
    public $shopaboutus;

    


    public function getUserid()
    {
        return $this->userid;
    }

   
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

 
    public function getShopid()
    {
        return $this->shopid;
    }

  
    public function setShopid($shopid)
    {
        $this->shopid = $shopid;

        return $this;
    }

   
    public function getShopname()
    {
        return $this->shopname;
    }

    public function setShopname($shopname)
    {
        $this->shopname = $shopname;

        return $this;
    }


    public function getShopaddress()
    {
        return $this->shopaddress;
    }

    public function setShopaddress($shopaddress)
    {
        $this->shopaddress = $shopaddress;

        return $this;
    }

   
    public function getShopcontact()
    {
        return $this->shopcontact;
    }

  
    public function setShopcontact($shopcontact)
    {
        $this->shopcontact = $shopcontact;

        return $this;
    }

 
    public function getShopaboutus()
    {
        return $this->shopaboutus;
    }

   
    public function setShopaboutus($shopaboutus)
    {
        $this->shopaboutus = $shopaboutus;

        return $this;
    }
}
?>