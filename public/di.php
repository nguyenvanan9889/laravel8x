<?php
interface Hash {
    public function execute($name);
}
class Md5 implements Hash {
    public function execute($name)
    {
        return md5($name);
    }
}
class Bcrypt implements Hash {
    public function execute($name)
    {
        return password_hash($name, PASSWORD_BCRYPT);
    }   
}
class Encode {
    public $hash;
    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
    }
    public function show($name)
    {
        return $this->hash->execute($name);
    }
}
$encode = new Encode(new Bcrypt);
echo $encode->show('tna');