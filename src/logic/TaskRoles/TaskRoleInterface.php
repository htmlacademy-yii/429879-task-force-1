<?php
namespace TaskForce\logic\TaskRoles;

interface TaskRoleInterface
{
  public function getId(): string;
  public function getTitle(): string;
}