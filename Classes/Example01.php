<?
/**
 * добавление и удаление елементов
 * 
 * @param int $size
 * @param array $elements
 * @return array
 */

class Stack {
    public $size = 0;
    private $id;  // Read only property
    protected $text; // Read only property
    private $meta; // Read only property
    public $issetRezult;  
    public $chahgeRezult;  

    public function __construct($id, $text, array $meta)
    {
        $this->id = $id;
        $this->text = $text;
        $this->meta = $meta;
    }
    public function __isset($name) 
    {
        try {
            if (!isset($this->$name)) throw new Exception("This is undefined property: '$name'".PHP_EOL);
        } catch (Exception $e) {
            $this->issetRezult = $e->getMessage();
        }
    }
    public function __get($name){
        return $this->$name;
    }
	public function __set( $property, $value ) {
        try {
            throw new Exception("readonly property '$property' can not take value = '$value'".PHP_EOL);
        } catch (Exception $e) {
            $this->chahgeRezult = $e->getMessage();
        }
	}
}
class MyStack extends Stack {
    protected $albumCollection = 'Read only property1.';
    protected $photoCollection = 'Read only property2';
}
