<?php
header('Content-Type: text/plain');

class Person{
    // 屬性宣告
    static private $count = 0; // 靜態屬性
    var $name;
    public $mobile;
    private $sno ='secret';

    // 建構函式定義
    function __construct($name='',$mobile='')
    {
        Person::$count++;
        $this->name = $name;
        $this->mobile = $mobile;
    }

    // 方法定義
    static function count(){
        return Person::$count;
    }

};
$p1 = new Person;
$p1->name = 'Paul';
$p1->mobile = '0922345234';
echo "{$p1->name}\n";
echo "{$p1->mobile}\n";
// echo "{$p1->sno}\n"; 會出錯


$p2 = new Person('Bob','0988444232');
var_dump($p2);


// 呼叫function
echo "共有".Person::count()."人";

?>