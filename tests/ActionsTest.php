<?php
use PHPUnit\Framework\TestCase;


class ActionsTest extends TestCase
{
  public function testReturnStatuses():void
  {
    $actions = new Actions(12, 13, '12.20.2019', 'Новое');
    $this->assertTrue(!empty(array_diff($actions->getStatuses(), ['Откликнуться', 'Отказаться', 'Отменить', 'Выполнено'])));
  }

  public function testReturnActions():void
  {
    $actions = new Actions(12, 13, '12.20.2019', 'Новое');
    $this->assertTrue(!empty(array_diff($actions->getActions(), ['Новое', 'Выполнено', 'Провалено', 'Отменено', 'В работе'])));
  }

  public function testReturnNewStatus():void
  {
    $actions = new Actions(12, 13, '12.20.2019', 'Новое');
    $this->assertTrue($actions->getNewStatus('Отменить') === 'Отменено');
  }
}

