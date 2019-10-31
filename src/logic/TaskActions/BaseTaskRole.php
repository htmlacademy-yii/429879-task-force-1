<?php
namespace TaskForce\logic\TaskActions;

class BaseTaskAction implements TaskActionInterface
{
  /* @var string */
  protected static $id;
  /* @var string */
  protected static $title;

  /**
   * Вовзвращает id действия.
   *
   * @return string
   */
  public function getId(): string
  {
    return self::$id;
  }

  /**
   * Возвращает название действия.
   *
   * @return string
   */
  public function getTitle(): string
  {
    return self::$title;
  }
}