<?php
abstract class Unit {
	protected $name;
	protected $hp;
	protected $damage;
	protected $armor;
	public function __construct($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getHp()
	{
		return $this->hp;
	}
	public function getDamage()
	{
		return $this->damage;
	}
	public function getArmor()
	{
		return $this->armor;
	}
	public function setArmor(Armor $armor)
	{
		$this->armor = $armor;
	}
	public function attack(Unit $unit)
	{
		$unit->takeDamage($this->damage);
	}
	public function takeDamage($damage)
	{
		if ($this->armor != null) {
			$damage = $this->armor->giamThietHai($damage);
		}
		$this->hp -= $damage;
		if ($this->hp <= 0) {
			$unit->die();
		}
	}
	public function die()
	{
		die($this->name.' die!.');
	}
}
interface Armor {
	public function giamThietHai($damage);
}
class SilverArmor implements Armor {
	public function giamThietHai($damage)
	{
		return $damage / 2;
	}
}
class GoldArmor implements Armor {
	public function giamThietHai($damage)
	{
		return $damage / 3;
	}
}
class Solider extends Unit {
	protected $hp = 40;
	protected $damage = 10;
	public function __construct($name)
	{
		parent::__construct($name);
	}
}
class Monster extends Unit {
	protected $hp = 50;
	protected $damage = 20;
	public function __construct($name)
	{
		parent::__construct($name);
	}
}
$solider = new Solider('tna');
$solider->setArmor(new GoldArmor);
$monster = new Monster('monster');
$monster->attack($solider);
echo $solider->getHp();