<?php
/**
 * 测试类
 * User: Turing Group
 * Date: 2016/11/18
 * Time: 15:11
 */

require_once __DIR__ . "/turingsdk.php";

echo "<pre>";
print_r(request_turing("11", "北京市中关村"));
echo "</pre>";