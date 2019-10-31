<?php
namespace TaskForce\logic\TaskStatuses;

interface TaskStatusInterface
{
  public function getId(): string;
  public function getTitle(): string;
}