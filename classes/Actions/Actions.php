<?php
class Actions {
  private static $ACTIONS = ['Откликнуться', 'Отказаться', 'Отменить', 'Выполнено'];
  private static $STATUSES = ['Новое', 'Выполнено', 'Провалено', 'Отменено', 'В работе'];
  private static $ROLES = ['customer', 'perfomer'];

  private static $actionToStatus = [
    'Отменить' => 'Отменено',
    'Откликнуться' => 'В работе',
    'Выполнено' => 'Выполнено',
    'Отказаться' => 'Провалено'
  ];

  public function __construct(string $performerId, string $customerId, string $dueDate, string $activeStatus)
  {
    $this->performerId = $performerId;
    $this->customerId = $customerId;
    $this->dueDate = $dueDate;
    $this->activeStatus = $activeStatus;
  }

  public function getNewStatus(string $action):string
  {
    return self::$actionToStatus[$action];
  }

  public function getStatuses():array
  {
    return self::$STATUSES;
  }

  public function getActions():array
  {
    return self::$ACTIONS;
  }
}