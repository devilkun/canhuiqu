<?php
namespace app\exhibition\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Checkbooth as CheckboothModel;
use think\Ucpaas;
use think\Request;
use think\Db;
use util\Tree;
class Checkbooth extends Admin
{
    public function  index(){
        //获取待审核展位信息
        $data_list = CheckboothModel::getCheckboothByStatus();
        $btn_access = [
            'title' => '审核',
            'icon'  => 'fa fa-fw fa-gavel',
            'class' => 'btn btn-xs btn-default',
            'href'  => url('check', ['id' => '__id__'])
        ];
        return ZBuilder::make('table')
            ->hideCheckbox()
            ->addColumns([ // 批量添加数据列
                ['id','ID'],
                ['name','展会名称'],
                ['company', '公司名称'],
                ['status','状态','status','', ['未知', '已审核', '待审核']],
                ['commit_time', '提交时间','date'],
                ['right_button', '操作', 'btn']
            ])
            ->addRightButton('custom', $btn_access) // 批量添加右侧按钮
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }
    public function check($id = null, $model = ''){
        return ZBuilder::make('form')
            ->addText('title', '标题')
            ->addTextarea('summary', '摘要')
            ->addUeditor('content', '内容')
            ->addImage('pic', '封面')
            ->setTemplate('checkbooth/check')
            ->fetch();
//            $data_list = CheckboothModel::getCheckboothById($id);
//            $unit = CheckboothModel::getUnit();
//            return ZBuilder::make('form')
//                ->addHidden('id')
//                ->addFormItems([
//                    ['text:6', 'name', '展会名称'],
//                    ['text:6', 'company', '公司名称'],
//                    ['text:6', 'reg_fee', '注册费'],
//                    ['text:6','reg_cu','注册单位','',$unit[$data_list['regfee_cu']]],
//                    ['textarea','reg_desc','注册费用说明'],
//                    ['text:3','indoor_price','室内光地单位价格'],
//                    ['text:3','in_cu','室内光地价格单位','',$unit[$data_list['indoor_cu']]],
//                    ['text:3','in_au','室内光地面积单位','',$unit[$data_list['indoor_au']]],
//                    ['text:3','indoor_area','室内光地可选面积','<span style="color: red">多个可用面积之间使用.隔开</span>'],
//                    ['textarea','indoor_desc','室内光地预定说明'],
//                    ['text:3','stand_price','标准摊位单位价格'],
//                    ['text:3','st_cu','标准摊位价格单位','',$unit[$data_list['stand_cu']]],
//                    ['text:3','st_au','标准摊位面积单位','',$unit[$data_list['stand_au']]],
//                    ['text:3','stand_area','标准摊位可选面积','<span style="color: red">多个可用面积之间使用.隔开</span>'],
//                    ['textarea','stand_desc','标准摊位预定说明'],
//                    ['text:3','outdoor_price','标准摊位单位价格'],
//                    ['text:3','ou_cu','室外光地价格单位','',$unit[$data_list['outdoor_cu']]],
//                    ['text:3','ou_au','室外光地面积单位','',$unit[$data_list['outdoor_au']]],
//                    ['text:3','outdoor_area','室外光地可选面积','<span style="color: red">多个可用面积之间使用.隔开</span>'],
//                    ['textarea','outdoor_desc','室外光地预定说明'],
//                    ['text:3','other_fee','其他费用单位价格'],
//                    ['text:3','ot_cu','其他费用价格单位','',$unit[$data_list['other_cu']]],
//                    ['text:3','ot_au','其他费用面积单位','',$unit[$data_list['other_au']]],
//                    ['text:3','otherfee_desc','其他费用预定说明'],
//                    ['textarea','stand_config','标摊配置说明'],
//                    ['textarea','price_desc','价格说明'],
//                    ['radio:3','pt','是否提供随团服务','',['0' => '否', '1' => '是'], $data_list['is_pt']],
//                    ['radio:3','ct','是否要求随团','',['0' => '否', '1' => '是'], $data_list['is_ct']],
//                    ['radio:3','dt','是否收取脱团管理费','',['0' => '否', '1' => '是'], $data_list['is_dt']],
//                    ['radio:3','ts','是否要求搭展','',['0' => '否', '1' => '是'], $data_list['is_ts']],
//                    ['text', 'dt_managerfee', '脱团管理费'],
//                    ['textarea','subsidy_desc','补贴说明'],
//                    ['ueditor','other_desc','其他说明'],
//                    ['images','stand_pictures','标摊效果图'],
//                    ['radio','presell','是否预售','',['0' => '否', '1' => '是'], $data_list['is_presell']],
//                    ['images','booth_pictures','展位图'],
//                    ['textarea','booth_desc','展位说明'],
//                    ['date','commit','提交时间','',date('Y-m-d H:i',$data_list['commit_time'])],
//                    ['text', 'telephone', '联系电话'],
//                ])
//                ->setFormData($data_list)
//                ->fetch();
    }
}