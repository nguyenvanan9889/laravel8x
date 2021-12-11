<?php

namespace RefactoringGuru\FactoryMethod\Conceptual;

abstract class Creator
{
    abstract public function factoryMethod(): Product;

    public function someOperation()
    {
        return $this->factoryMethod();
    }
}

class ConcreteCreator1 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}

interface Product
{

}

class ConcreteProduct1 implements Product
{
    
}

class ConcreteProduct2 implements Product
{
    
}

class clientCode {
	public static function clientCode(Creator $creator)
	{
		return $creator->someOperation();
	}
}
$alo = clientCode::clientCode(new ConcreteCreator1());
$blo = clientCode::clientCode(new ConcreteCreator2());
echo '<pre>'; var_dump($alo, $blo); die(); echo '</pre>';