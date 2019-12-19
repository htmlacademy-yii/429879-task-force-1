<?php
namespace TaskForce\logic;

use TaskForce\logic\AvailableTasks;
use TaskForce\logic\TaskActions\TaskActionApply;
use TaskForce\logic\TaskActions\TaskActionCancel;
use TaskForce\logic\TaskActions\TaskActionComplete;
use TaskForce\logic\TaskActions\TaskActionRefuse;
class Task
{
    /* РОЛИ */
    const ROLE_CONTRACTOR = 'ROLE_CONTRACTOR';
    const ROLE_CUSTOMER = 'ROLE_CUSTOMER';
    
    /* СТАТУСЫ */
    const STATUS_COMPLETED = 'STATUS_COMPLETED';
    const STATUS_FAILED = 'STATUS_FAILED';
    const STATUS_IN_PROGRESS = 'STATUS_IN_PROGRESS';
    const STATUS_CANCELED = 'STATUS_CANCELED';
    const STATUS_NEW = 'STATUS_NEW';

    const TASK_NAMES = [
        self::ROLE_CONTRACTOR => 'Исполнитель',
        self::ROLE_CUSTOMER => 'Заказчик',
        self::STATUS_COMPLETED => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
        self::STATUS_IN_PROGRESS => 'В работе',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_NEW => 'Новое',
    ];

    protected static $statusManager = [
        self::STATUS_NEW => [
            AvailableTasks::ACTION_CANCEL => self::STATUS_CANCELED, 
            AvailableTasks::ACTION_APPLY => self::STATUS_IN_PROGRESS
        ],
        self::STATUS_IN_PROGRESS => [
            AvailableTasks::ACTION_COMPLETE => self::STATUS_COMPLETED, 
            AvailableTasks::ACTION_REFUSE => self::STATUS_FAILED
        ]
    ];

    /**
     * Конструктор класса.
     *
     * @param string $contractorId Id исполнителя.
     * @param string $customerId Id заказчика.
     * @param int $deadlineAt Срок завершения.
     *
     * @return void
     */
    public function __construct(
        string $contractorId,
        string $customerId,
        int $deadlineAt,
        string $activeStatusId
    ) {
        $this->contractorId = $contractorId;
        $this->customerId = $customerId;
        $this->deadlineAt = $deadlineAt;
        $this->activeStatusId = $activeStatusId;
    }

    /**
     * Возвращает идентификатор нового статуса задания после совершения действия.
     *
     * @param string $actionId Идентификатор действия.
     *
     * @return string Идентификатор нового статуса.
     */
    public function getNewStatus(string $actionId)
    {
        return self::$statusManager[$this->activeStatusId][$actionId];
    }

    /**
     * Возвращает доступное действие согласно статусу задания и роли пользователя.
     *
     * @param string $userId Идентификатор текущего пользователя.
     *
     * @return string Идентификатор действия.
     */
    public function getAvailableAction(string $userId)
    {
        $actions = self::$statusManager[$this->activeStatusId];
        foreach ($actions as $action => $status)
        {
            $className = 'TaskForce\logic\TaskActions\\' . AvailableTasks::ACTION_ID_TO_CLASS[$action];
            $actionClass = new $className();
            $isAvailable = $actionClass->isValidUser($this->contractorId, $this->customerId, $userId); 
            if ($isAvailable)
            {
                return $action;
            }
        }
    }
}
