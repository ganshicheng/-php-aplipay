<?php
require 'AlipayService.php';


$account = '';      //收款方账户（支付宝登录号，支持邮箱和手机号格式。）
$realName = '';     //收款方真实姓名
$outTradeNo = uniqid();     //商户转账唯一订单号
$amount = 10; //转账金额，单位元，大于0.1
$remark='备注'; // 备注


$alipay = new AlipayService();
$result = $alipay->doPay($amount, $outTradeNo, $account,$realName,$remark);

print_r('<pre>');
print_r($result);
if($result['code'] && $result['code']=='10000'){
    echo '<h1>转账成功</h1>';
}else{
    echo $result['msg'].' : '.$result['sub_msg'];
}