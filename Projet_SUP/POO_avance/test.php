<?php
//invalideArgumentException

namespace Toto;

class testDeBase
{
	public function addition($number_1, $number_2)
	{
		if(!is_numeric($number_1) || !is_numeric($number_2))
			throw new \Exception("Impossible d'afficher une Exception");

		$this->afficheMessage();
		echo"Coucou";
		return $number_1 + $number_2;
	}

	public function afficheMessage()
	{
		throw new Execption("toto");
		echo "Mes aruguments sont correct";
	}
}

$insta = new testDeBase();

try
{
	echo $insta->addition(40, "Coucou");
}
catch(\Exception $e)
{
	//var_dump($e);
	//echo $e->xdebug_message;
	echo "Une exception a ete levee";
}

echo ", Je continue";

?>