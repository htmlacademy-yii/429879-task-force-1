<?php
namespace TaskForce\logic\TaskStatuses;

class BaseTaskStatus implements TaskStatusInterface
{
  /* @var string */
  protected static $id = 3;
  /* @var string */
  protected static $title;
  /**
   * Вовзвращает id статуса.
   *
   * @return string
   */
  public function getId(): string
  {
    return self::$id;
  }

  /**
   * Возвращает название статуса.
   *
   * @return string
   */
  public function getTitle(): string
  {
    return self::$title;
  }
}