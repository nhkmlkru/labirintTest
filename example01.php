<?php
/**
 * Пример работы с классом имеющим свойства только для чтения.
 *
 * Сначала проверяем наличие свойства.
 * В случае отсутствия свойств указываем на ошибку.
 * Затем пытаемся изменить свойство.
 * Показываем ошибку если область видимости свойства protected или private
 */
include "Classes/Example01.php";
// присваиваем начальные значенмя свойств    
$obj = new MyStack(1, "firstValue", array(1));

// пробуем изменить четыре свойства, "albumCollection" и "meta" readonly, 
// свойства "zero" не существует
$testPropertis = array(
    "albumCollection" => 2, 
    "size" => 2, 
    "meta" => array("someValue"), 
    "zero" => 1
);

foreach ($testPropertis as $testProperty => $newValue) {
    $obj->chahgeRezult = ""; // сюда будем записывать ошибку при записи
    // проверяем существование свойств
    if (isset($obj->$testProperty) || $obj->$testProperty) {
        echo "property '$testProperty' is defined\n";
        echo "value $testProperty = ".$obj->$testProperty.PHP_EOL;
        // присваиваем новые значения свойств
        $obj->$testProperty = $newValue;
        echo $obj->chahgeRezult;
        if ($obj->chahgeRezult) {
            $obj->chahgeRezult; // ошибка попытки изменения readonly свойств
        } else {
            echo 'New value $testProperty = '.$obj->$testProperty.PHP_EOL;
        }
    } else {
        echo $obj->issetRezult;
    }
    echo PHP_EOL;
}
