<?php
namespace TaskForce\logic;

class AvailableTasks
{
    /* ДЕЙСТВИЯ */
    const ACTION_APPLY = 'ACTION_APPLY';
    const ACTION_CANCEL = 'ACTION_CANCEL';
    const ACTION_COMPLETE = 'ACTION_COMPLETE';
    const ACTION_REFUSE = 'ACTION_REFUSE';

    const ACTION_ID_TO_CLASS = [
      self::ACTION_APPLY => 'TaskActionApply',
      self::ACTION_CANCEL => 'TaskActionCancel',
      self::ACTION_COMPLETE => 'TaskActionComplete',
      self::ACTION_REFUSE => 'TaskActionRefuse'
    ];
}