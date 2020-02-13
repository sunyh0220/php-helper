<?php
/**
 * Copyright (c) 2020 LKK/lanq.net All rights reserved
 * User: kakuilan@163.com
 * Date: 2020/2/13
 * Time: 10:25
 * Desc:
 */


namespace Kph\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Error;
use Exception;
use ReflectionException;
use Kph\Helpers\ArrayHelper;


class ArrayHelperTest extends TestCase {

    public function testDstrpos() {
        $str = 'hello world. 你好，世界！';
        $arr = ['php', 'Hello', 'today'];

        $res1 = ArrayHelper::dstrpos($str, $arr, false, false);
        $this->assertTrue($res1);

        $res2 = ArrayHelper::dstrpos($str, $arr, true, false);
        $res3 = ArrayHelper::dstrpos($str, $arr, true, true);
        $this->assertEquals('Hello', $res2);
        $this->assertFalse($res3);

        $res4 = ArrayHelper::dstrpos('', $arr);
        $this->assertFalse($res4);
    }


    public function testMultiArraySort() {
        $arr1 = [
            [
                'id' => 9,
                'age' => 19,
                'name' => 'hehe',
                'nick' => '阿斯蒂芬',
            ],
            [
                'id' => 2,
                'age' => 31,
                'name' => 'lizz',
                'nick' => '去玩儿',
            ],
            [
                'id' => 87,
                'age' => 50,
                'name' => 'zhang3',
                'nick' => '谱曲说',
            ],
            [
                'id' => 25,
                'age' => 43,
                'name' => 'wang5',
                'nick' => '阿斯蒂芬',
            ],
            [
                'id' => 24,
                'age' => 63,
                'name' => 'zhao4',
                'nick' => '权威认证',
            ],
        ];

        $arr2 = array_merge($arr1, ['hello']);
        $arr3 = array_merge($arr1, [
            'age' => 44,
            'name' => 'asdf',
            'nick' => '主线程v',
        ]);

        $res1 = ArrayHelper::multiArraySort($arr1, 'id', SORT_ASC);
        $res2 = ArrayHelper::multiArraySort($arr2, 'id', SORT_ASC);
        $res3 = ArrayHelper::multiArraySort($arr3, 'id', SORT_ASC);

        $id1 = $res1[0]['id'] ?? 0;
        $id2 = $res1[1]['id'] ?? 0;
        $this->assertNotEmpty($res1);
        $this->assertGreaterThan($id1, $id2);

        $this->assertEmpty($res2);
        $this->assertEmpty($res3);
    }





}