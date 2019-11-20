<?php
class Task
{
    /* ДЕЙСТВИЯ */
    protected static $taskActionApplyId = 'TASK_ACTION_APPLY';
    protected static $taskActionApplyTitle = 'Откликнуться';

    protected static $taskActionCancelId = 'TASK_ACTION_CANCEL';
    protected static $taskActionCancelTitle = 'Отменить';

    protected static $taskActionCompleteId = 'TASK_ACTION_COMPLETE';
    protected static $taskActionCompleteTitle = 'Выполнено';

    protected static $taskActionRefuseId = 'TASK_ACTION_REFUSE';
    protected static $taskActionRefuseTitle = 'Отказаться';

    /* РОЛИ */
    protected static $taskRoleContractorId = 'TASK_ROLE_CONTRACTOR';
    protected static $taskRoleContractorTitle = 'Исполнитель';

    protected static $taskRoleCustomerId = 'TASK_ROLE_CUSTOMER';
    protected static $taskRoleCustomerTitle = 'Заказчик';

    /* СТАТУСЫ */
    protected static $taskStatusCompletedId = 'TASK_STATUS_COMPLETED';
    protected static $taskStatusCompletedTitle = 'Выполнено';

    protected static $taskStatusFailedId = 'TASK_STATUS_FAILED';
    protected static $taskStatusFailedTitle = 'Провалено';

    protected static $taskStatusInProgressId = 'TASK_STATUS_IN_PROGRESS';
    protected static $taskStatusInProgressTitle = 'В работе';

    protected static $taskStatusCanceledId = 'TASK_STATUS_CANCELED';
    protected static $taskStatusCanceledTitle = 'Отменено';

    protected static $taskStatusNewId = 'TASK_STATUS_NEW';
    protected static $taskStatusNewTitle = 'Новое';

    protected static $statusManager = [
        'TASK_STATUS_NEW' => [
            'TASK_ACTION_CANCEL' => 'TASK_STATUS_CANCELED', 
            'TASK_ACTION_APPLY' => 'TASK_STATUS_IN_PROGRESS'
        ],
        'TASK_STATUS_IN_PROGRESS' => [
            'TASK_ACTION_COMPLETE' => 'TASK_STATUS_COMPLETED', 
            'TASK_ACTION_REFUSE' => 'TASK_STATUS_FAILED'
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
        string $activeStatusId = 'TASK_STATUS_NEW'
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
