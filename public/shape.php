<?php
abstract class AbstractShape {
    protected $name;
    public abstract function area();
}
class Square extends AbstractShape {
    protected $name = 'square';
    protected $length;
    public function setLenght($length)
    {
        $this->length = $length;
        return $this;
    }
    public function area()
    {
        return $this->length * $this->length;
    }
}
class Circle extends AbstractShape {
    protected $name = 'circle';
    protected $radius;
    public function setRadius($radius)
    {
        $this->radius = $radius;
        return $this;
    }
    public function area()
    {
        return $this->radius * $this->radius * 3.14;
    }
}
abstract class AbstractOutput {
    
}
class JsonOutput extends AbstractOutput {
    public function output($input)
    {
        return json_encode($input);
    }
}
class HtmlOutput extends AbstractOutput {
    public function output($input)
    {
        return '<p>'.$input.'</p>';
    }
}
class AreaCalculator {
    protected $shape;
    protected $output;
    protected $area;
    public function __construct(AbstractShape $shape, AbstractOutput $output)
    {
        $this->shape = $shape;
        $this->output = $output;
    }
    public function getArea()
    {
        return $this->area;
    }
    public function calculator()
    {
        $this->area = $this->shape->area();
        return $this;
    }
    public function output()
    {
        return $this->output($this->area);
    }
}
$square = new Square;
$square->setLenght(4);
$circle = new Circle;
$circle->setRadius(2);
$area = new AreaCalculator($square, new JsonOutput);
$area->calculator();
echo $area->getArea();
// Nói chung vẫn nên dùng kiểu factory dạng switch case(xem ví dụ factory-method.php)