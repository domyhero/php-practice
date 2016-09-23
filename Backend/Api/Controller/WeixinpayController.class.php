<?php
namespace Api\Controller;

use Think\Controller;

/**
 * 微信支付
 */
class WeixinpayController extends Controller
{

    /**
     * notify_url接收页面
     */
    public function notify($config = null)
    {
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay = new \Weixinpay($config);
        $result = $wxpay->notify();

    }

    /**
     * 公众号支付 必须以get形式传递 out_trade_no 参数
     * 示例请看 /Application/Home/Controller/IndexController.class.php
     * 中的weixinpay_js方法
     */
    public function pay($config = null)
    {
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay = new \Weixinpay($config);
        // 获取jssdk需要用到的数据
        $data = $wxpay->getParameters();
        // 将数据分配到前台页面
        $assign = array(
            'data' => json_encode($data)
        );
        $this->assign($assign);
        $this->display();
    }

}