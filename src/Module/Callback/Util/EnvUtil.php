<?php

namespace App\Module\Callback\Util;

use App\Constant\EnvConst;

class EnvUtil
{
    /**
     * callback 本地是否执行
     */
    public static function isRun(): bool
    {
        try {
            return EnvConst::CALLBACK_RUN;
        } catch (\Throwable $throwable) {
            return true;
        }
    }
}
