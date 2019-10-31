<?php
namespace TaskForce\logic\TaskActions;

interface TaskActionInterface
{
  public function getId(): string;
  public function getTitle(): string;
}