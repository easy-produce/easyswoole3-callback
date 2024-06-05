<?php

namespace App\Module\Callback\Crontab;


use EasySwoole\EasySwoole\Crontab\AbstractCronTask;
use EasySwoole\EasySwoole\Task\TaskManager;


class TaskClearCrontab extends AbstractCronTask
{
    /**
     * 执行规则
     */
    public static function getRule(): string
    {
        return '0 12 * * *';
//        return '*/1 * * * *';
    }

    /**
     * 任务名称
     */
    public static function getTaskName(): string
    {
        return 'TaskClearCrontab';
    }

    public function run(int $taskId, int $workerIndex)
    {
        TaskManager::getInstance()->async(function () {
            $taskService = new \App\Module\Callback\Service\TaskService();
            $taskService->taskClear();
        });
    }

    /**
     * 出现异常
     */
    public function onException(\Throwable $throwable, int $taskId, int $workerIndex)
    {
        echo $throwable->getMessage();
    }
}