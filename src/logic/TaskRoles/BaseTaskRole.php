<?php
namespace TaskForce\logic\TaskRoles;

class BaseTaskRole implements TaskRoleInterface
{
  /* @var string */
  protected static $id;
  /* @var string */
  protected static $title;

  /**
   * Вовзвращает id роли.
   *
   * @return string
   */
  public function getId(): string
  {
    return self::$id;
  }

  /**
   * Возвращает название роли.
   *
   * @return string
   */
  public function getTitle(): string
  {
    return self::$title;
  }
}