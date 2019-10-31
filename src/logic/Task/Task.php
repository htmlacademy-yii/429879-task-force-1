<?php

namespace TaskForce\logic\Task;

class Task implements TaskInterface
{
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
        int $deadlineAt
    ) {
        $this->contractorId = $contractorId;
        $this->customerId = $customerId;
        $this->deadlineAt = $deadlineAt;
        $this->activeStatus = 'Новое';
    }
}
