<?php 
// define('linee', __LINE__); //hiện dòng hiện tại của hằng
// define('filee', __FILE__); //đường dẫn tuyệt đối tới file hiện tại
// define('dirr', __DIR__); //đường dẫn thư mục tuyệt đối tới file hiện tại
// function test(){
// 	define('functionn', __FUNCTION__); // hiện thị tên function chưa hằng
// 	echo functionn.'<br>';
// }
// // test();
// define('classs', __CLASS__); //hiển thị tên class chứa hằng
// define('traitt', __TRAIT__); // hiển thị tên đặc điểm chứa hằng này, traits giống class
// define('method', __METHOD__); hiển thị tên phương thức + tên class chứa hằng
// // define('namespacee', __NAMESPACE__); // hiển thị namespace chứa hằng này
// // echo linee.'<br>';
// // echo filee.'<br>';
// // echo dirr.'<br>';
// // echo classs.'<br>';
// // echo traitt.'<br>';
// /**
//  * summary
//  */
// class ecc
// {
//     /**
//      * summary
//      */
//     public function ec()
//     {
//         echo  __METHOD__.'<br>';
//         echo  __CLASS__.'<br>';
        
//         define('classs', ecc::class);
//         echo classs;
//     }
// }
// $obj = new ecc;
// $obj->ec();
// echo method.'<br>';
// // echo namespacee.'<br>';

?>
<?php
// trait PeanutButter {
// 	function traitName() {echo __TRAIT__;}
// }

// trait PeanutButterAndJelly {
// 	use PeanutButter;
// }

// class Test {
// 	use PeanutButterAndJelly;
// }

// (new Test)->traitName(); //PeanutButter
?>
<?php 
// // include 'test.php';
// namespace CN;


// class ConNguoi
// {
//     private $name = 'Con Người';
//     public function getName()
//     {
//         echo $this->name;
//         //echo define('namespacee', __NAMESPACE__);
//     }
// }
// $connguoi = new CN\ConNguoi();
// echo $connguoi->getName();
// //kết quả: Con Người
trait Codable  
{
    public function code()
    {
        echo 'I can code';
    }
}

trait Testable  
{
    public function test()
    {
        echo 'I can test';
    }
}
class t{
	use Codable, Testable;
}
t::test();
 ?>
