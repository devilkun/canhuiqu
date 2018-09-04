<?php

namespace plugins\TwoStep\controller;

use app\common\controller\Common;
use app\user\model\User as UserModel;
use plugins\TwoStep\TwoStepVerification;

/**
 * 插件后台管理控制器
 */
class Admin extends Common
{

    /**
     * 两步验证页面
     */
    public function verification()
    {
        return $this->pluginView();
    }

    /**
     * 验证两步验证码
     */
    public function signin()
    {
        $code = input('post.code/d', 0);
        $TwoStepVerification = new TwoStepVerification();
        $secret = UserModel::where(['id'=>session('user_auth.uid')])->value('two_step_secret');
        if ($TwoStepVerification->checkCode($code, $secret)){
            session('two_step_status', 1);  // 标记为已验证
            $this->success('登录成功', url('admin/index/index'));
        }else{
            $this->error('验证失败');
        }
    }

    // 获取 Secret 和 Secret 二维码
    public function generateSecret($secret = null)
    {
        $TwoStepVerification = new TwoStepVerification();
        if (empty($secret)) {
            $secret = $TwoStepVerification->generateSecret();
        }
        $url = $TwoStepVerification->getUrl(session('user_auth.username'), plugin_config('TwoStep.hostname'), $secret);
        return [
            'secret' => $secret,
            'QRCode' => $url,
        ];
    }

}

