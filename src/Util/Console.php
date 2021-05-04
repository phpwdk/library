<?php
/**
 * 版权所有 ( 汪登科 )
 * 代码维护 ( 汪登科 )
 * 开源协议 ( https://mit-license.org )
 * 联系微信 ( wk9653992 )
 * 启动日期 ( 2021/5/4 14:06 )
 */

namespace library\Util;

class Console
{
    public static function logs(...$data)
    {
        $log    = func_get_args();
        $logStr = "";
        foreach ($log as $value) {
            $logStr .= self::getStr($value) . " ";
        }
        echo $logStr . "\n";
    }

    public static function log($data)
    {
        $data = self::getStr($data);
        echo $data . "\n";
    }

    public static function logStr($data, $ln = false)
    {
        if (!is_string($data)) {
            return;
        }
        echo $data;
        if ($ln) {
            echo "\n";
        }
    }

    private static function getStr($data)
    {
        /*
         * "boolean"
         * "integer"
         * "double" (for historical reasons "double" is
         * returned in case of a float, and not simply
         * "float")
         * "string"
         * "array"
         * "object"
         * "resource"
         * "NULL"
         * "unknown type"
         * "resource (closed)" since 7.2.0*/
        if (gettype($data) == "array") {
            $data = json_encode($data);
        } elseif (gettype($data) == "object") {
            $data = json_encode($data);
        }
        return $data;
    }
}
