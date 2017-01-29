<?
/**
 * Базовый класс для с доступными только для чтения параметрами
 * 
 * Свойства область видимости которых private или protected
 * можно прочитать , но нельзя изменить
 * 
 * @author Konstantin Lokhov
 *
 * @property integer $size
 * @property-read integer $id
 * @property-read string $myProperty
 * @property-read array $meta
 * @property string $issetRezult useg for set isset Exception
 * @property string $chahgeRezult useg for set p change rezult Exception
 */

class Stack
{
    public $size = 0;
    private $id;
    protected $text;
    private $meta;
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
    public function __get($name)
    {
        return $this->$name;
    }
	public function __set( $property, $value )
    {
        try {
            throw new Exception("readonly property '$property' can not take value = '$value'".PHP_EOL);
        } catch (Exception $e) {
            $this->chahgeRezult = $e->getMessage();
        }
	}
}
class MyStack extends Stack
{
    protected $albumCollection = 'Read only property1.';
    protected $photoCollection = 'Read only property2';
}
