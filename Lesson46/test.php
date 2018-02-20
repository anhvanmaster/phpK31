<?php 
namespace CN;


class ConNguoi
{
    private $name = 'Con Người';
    public function getName()
    {
        echo $this->name;
        //echo define('namespacee', __NAMESPACE__);
    }
}
namespace CN2;
class ConNguoi2
{
    private $name2 = 'Con Người';
    public function getName2()
    {
        echo $this->name2;
        define('namespacee', __NAMESPACE__);
        echo namespacee;
    }
}
 ?>