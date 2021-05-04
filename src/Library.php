<?php
/**
 * 版权所有 ( 汪登科 )
 * 代码维护 ( 汪登科 )
 * 开源协议 ( https://mit-license.org )
 * 联系微信 ( wk9653992 )
 * 启动日期 ( 2021/5/4 20:07 )
 */

namespace Library;

use Library\Cache\File;

class Library
{
    /**
     * 缓存管理
     *
     * @param string $name 缓存名称
     * @param mixed $value 缓存值
     * @param mixed $options 缓存参数
     * @return mixed
     */
    function cache($name = null, $value = '', $options = null)
    {
        $cacheMode = !empty($options['mode']) ? $options['mode'] : 'File';
        $cache     = new $cacheMode($options);
        if ('' === $value) {
            // 获取缓存
            return 0 === strpos($name, '?') ? $cache->has(substr($name, 1)) : $cache->get($name);
        } elseif (is_null($value)) {
            // 删除缓存
            return $cache->delete($name);
        }

        // 缓存数据
        if (is_array($options)) {
            $expire = !empty($options['expire']) ? $options['expire'] : null;
        } else {
            $expire = $options;
        }

        return $cache->set($name, $value, $expire);
    }
}
