<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BallController extends Controller
{
static  function getBaskets($numBas, $maxRand){
    $arr = [];
    for($q=0; $q < $numBas; $q++) {
       $arr[$q] = BallController::getMass(rand(1, 10), $maxRand);
    }
    return $arr;
  }

static  function getMass($size, $maxRand){
      $arr = [];
     for ($i=0; $i < $size ; $i++) {
        do
        {
        $b =rand(1, $maxRand);
        }
        while(in_array($b, $arr));
        $arr[$i] = $b;
      }
      sort($arr);
      return  $arr;
  }

static  function getAnswerB($masBasket, $masUser){
    $answer="";
  foreach ($masBasket as $key => $value)
    {
      $mas = array_intersect($value,  $masUser);
         if(count($mas) === count($value)){
           $answer .=" #".($key+1)." and";
       }
    }
    return substr($answer,0,-3);
  }

static  function getAnswerC($masBasket, $masUser){
    $answer="";
    foreach ($masBasket as $key => $value)
    {
      $mas = array_intersect($value,  $masUser);
         if(count($mas) === 1){
           $answer .=" #".($key+1)." and";
       }
    }
    return substr($answer,0,-3);
  }

  public function index( Request $request)
  {
    if ($request->has('numBaskets'))
        {
          $numBas=$request->numBaskets;
        }
        else {
          $numBas=30;
        }
    if ($request->has('numRand'))
        {
          $maxRand=$request->numRand;
        }
        else {
          $maxRand=999;
        }
    $arrBasket = BallController::getBaskets($numBas, $maxRand);
    $arrUser = BallController::getMass(rand(1, 100), $maxRand);
    $b=BallController::getAnswerB($arrBasket, $arrUser);
    $c=BallController::getAnswerC($arrBasket, $arrUser);
      return view('index')->with([
        'arrBasket'=>$arrBasket,
        'arrUser'=>$arrUser,
        'b'=>$b,
        'c'=>$c
      ]);
  }
}
?>
