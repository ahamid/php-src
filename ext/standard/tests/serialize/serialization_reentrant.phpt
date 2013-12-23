--TEST--
--FILE--
<?php
class test implements Serializable {
    public $a;

    public function __construct( $_val ){
        $this->a = $_val;
    }

    public function serialize() {
        $tmp = (object) array();
        $tmp->a = $this->a;
        echo serialize( $tmp ) . "\n";
        return serialize( $tmp );
    }

    public function unserialize($var) {}
}

$n = array();
$n[] = new test("temp1");
$n[] = new test("temp2");
$n[] = new test("temp3");
$n[] = new test("temp4");
$n[] = new test("temp5");
$n[] = new test("temp6");
$n[] = new test("temp7");
$n[] = new test("temp8");
$n[] = new test("temp9");
print_r( unserialize( serialize( $n ) ) );
?>
--EXPECTF--
