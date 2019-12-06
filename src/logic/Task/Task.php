<?php
namespace TaskForce\logic\Task;

class Task
{
    /* ДЕЙСТВИЯ */
    const ACTION_APPLY = 'ACTION_APPLY';
    const ACTION_CANCEL = 'ACTION_CANCEL';
    const ACTION_COMPLETE = 'ACTION_COMPLETE';
    const ACTION_REFUSE = 'ACTION_REFUSE';

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
        self::ACTION_APPLY => 'Откликнуться',
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_COMPLETE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться',
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
            self::ACTION_CANCEL => self::STATUS_CANCELED, 
            self::ACTION_APPLY => self::STATUS_IN_PROGRESS
        ],
        self::STATUS_IN_PROGRESS => [
            self::ACTION_COMPLETE => self::STATUS_COMPLETED, 
            self::ACTION_REFUSE => self::STATUS_FAILED
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
    public function getNewStatus($actionId)
    {
        return self::$statusManager[$this->activeStatusId][$actionId];
    }
}
