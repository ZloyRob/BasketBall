@extends('layouts.app')
@section('title')
  Balls and Baskets
@stop

@section('variables')
<form action = "">
 <input id="numBaskets" name="numBaskets" type="number" min="0"  class="form-control inputWight" placeholder="Число корзин" >
<input id="numRand" name="numRand" type="number" min="100" class="form-control inputWight" placeholder="Число для рандома">

<button type="submit"  id="test" class="btn vari" >ИЗМЕНИТЬ/Обновить</button>
@endsection
@section('content')
<div id="testim">
<?php
foreach ($arrBasket as $key => $basket)
{
  echo "Basket #".($key+1).": ";
   foreach ($basket as $ball) {
     echo  "<div class=\"example effect4\">".$ball."</div>";
   }
   echo "<br>";
}

echo "User’s basket: ";
foreach ($arrUser as $key => $value) {
  echo  "<div class=\"example\">".$value."</div>";
}

echo "<ul>";
echo "<li>Answer to B: ".$b."</li>";
echo "<li>Answer to C: ".$c."</li>";
echo "</ul>";
?>
</div>
@stop
