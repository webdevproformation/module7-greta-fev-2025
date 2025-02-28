<?php 



class Toto {

    private int $prix ;

    public function __construct(int $prix)
    {   
        $this->prix = $prix ; 
    }

}

$t = new Toto(10) ; 

class Titi {

    public function __construct( private int $prix ) // 
    // Constructor property promotion syntaxe disponible à partir de PHP 8 
    {
        
    }

}