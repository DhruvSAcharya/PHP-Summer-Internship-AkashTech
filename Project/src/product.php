<?php 
class ProductModel{
    public $productid;
    public $shopid;
    public $userid;
    public $name;
    public $price;
    public $category;
    public $offer;
    public $descriptions;
    public $avilibility;
    public $priority;
    public $quantity;
    public $imgpath;

    public function getProductid()
    {
        return $this->productid;
    }

   
    public function setProductid($productid)
    {
        $this->productid = $productid;

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


    public function getUserid()
    {
        return $this->userid;
    }


    public function setUserid($userid)
    {
        $this->userid = $userid;

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

   
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

   
    public function getOffer()
    {
        return $this->offer;
    }

  
    public function setOffer($offer)
    {
        $this->offer = $offer;

        return $this;
    }

   
    public function getDescriptions()
    {
        return $this->descriptions;
    }

  
    public function setDescriptions($descriptions)
    {
        $this->descriptions = $descriptions;

        return $this;
    }

  
    public function getAvilibility()
    {
        return $this->avilibility;
    }

    
    public function setAvilibility($avilibility)
    {
        $this->avilibility = $avilibility;

        return $this;
    }

 
    public function getPriority()
    {
        return $this->priority;
    }

   
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

 
    public function getQuantity()
    {
        return $this->quantity;
    }

   
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

  
    public function getImgpath()
    {
        return $this->imgpath;
    }

    
    public function setImgpath($imgpath)
    {
        $this->imgpath = $imgpath;

        return $this;
    }
}
?>