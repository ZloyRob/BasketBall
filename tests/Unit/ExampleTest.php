<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\BallController;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetMasTrue()
    {
      $this->assertTrue(sizeof(BallController::getMass(100, 999))=== 100);
    }

    public function testGetMasFalse()
    {
      $this->assertFalse(sizeof(BallController::getMass(20, 999))=== 100);
    }

    public function testGetMasRandomTrue()
    {
      $this->assertTrue(max(BallController::getMass(100, 999)) <= 999);
    }

    public function testGetMasRandomFalse()
    {
      $this->assertFalse(max(BallController::getMass(20, 999)) > 999);
    }
    public function testGetBasketTrue()
    {
      $this->assertTrue(sizeof(BallController::getBaskets(100, 999))=== 100);
    }

    public function testGetBasketFalse()
    {
      $this->assertFalse(sizeof(BallController::getBaskets(20, 999))=== 100);
    }

    public function testAnswerBTrue()
    {
      $masBasket = array(
      array(1, 2, 3),
      array(4, 5, 6),
      array(7, 8, 9),
      array(10, 12, 13));
      $masUser = array(1, 2, 3, 5, 8, 10, 12, 13);
      $this->assertEquals(BallController::getAnswerB($masBasket, $masUser), ' #1 and #4 ');
    }

    public function testAnswerBFalse()
    {
      $masBasket = array(
      array(1, 2, 3),
      array(4, 5, 6),
      array(7, 8, 9),
      array(10, 12, 13));
      $masUser = array(1, 2, 3, 5, 8, 10, 12, 13);
      $this->assertFalse(BallController::getAnswerB($masBasket, $masUser) === ' #2 and #4 ');
    }

    public function testAnswerCTrue()
    {
      $masBasket = array(
      array(1, 2, 3),
      array(4, 5, 6),
      array(7, 8, 9),
      array(10, 12, 13));
      $masUser = array(1, 2, 3, 5, 8, 10, 12, 13);
      $this->assertEquals(BallController::getAnswerC($masBasket, $masUser), ' #2 and #3 ');
    }

    public function testAnswerCFalse()
    {
      $masBasket = array(
      array(1, 2, 3),
      array(4, 5, 6),
      array(7, 8, 9),
      array(10, 12, 13));
      $masUser = array(1, 2, 3, 5, 8, 10, 12, 13);
      $this->assertFalse(BallController::getAnswerC($masBasket, $masUser) === ' #2 and #4 ');
    }

}
