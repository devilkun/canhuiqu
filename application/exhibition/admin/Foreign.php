<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2017 河源市卓锐科技有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------
// | 开源协议 ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

namespace app\exhibition\admin;

use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\exhibition\model\Classification as ClassificationModel;
use app\exhibition\model\Venues as VenuesModel;
use app\exhibition\model\Foreign as ForeignModel;
use app\exhibition\model\District as DistrictModel;
use app\exhibition\model\Organizer as OrganizerModel;
use think\Request;
use think\Db;
use util\Tree;
/**
 * 仪表盘控制器
 * @package app\cms\admin
 */
class Foreign extends Admin
{
    /**
     * 首页
     * @author 蔡伟明 <314013107@qq.com>
     * @return mixed
     */
    public function index()
    {
       cookie('__forward__', $_SERVER['REQUEST_URI']);
       // 查询
        $map = $this->getMap();
        $map['dp_exhibition_detail.status'] = 1;
        // 数据列表
        $data_list = ForeignModel::getList($map);
          return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'exhibition_detail.name' => '会展名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['name', '展会名称'],
                ['t_name','展会类别'],
                ['c_name', '所属城市'],
                ['username', '发布人'],
                ['update_time', '更新时间', 'datetime'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons(['edit', 'delete']) // 批量添加右侧按钮
            ->setTableName('exhibition_detail')
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }
 public function add($cid = 0, $model = '')
    {

        if($this->request->isPost()){
                $data = $this->request->post();
                // 验证失败 输出错误信息
                $result = $this->validate($data, 'Foreign');
                    if(true !== $result) $this->error($result);
                    $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($data['address'])."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
                    $latlngByAddress = json_decode($this->curl_request($url));
                     if($latlngByAddress && $latlngByAddress->status=="OK"){
                         $data['lat']=$latlngByAddress->results[0]->geometry->location->lat;
                         $data['lng']=$latlngByAddress->results[0]->geometry->location->lng;
                     }else{
                         $city = Db::table('dp_exhibition_district')->where('id',$data['city_id'])->value('name');
                         $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($city)."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
                         $latlngByCity = json_decode($this->curl_request($url));
                         if($latlngByCity && $latlngByCity->status=="OK"){
                            $data['lat']=$latlngByCity->results[0]->geometry->location->lat;
                            $data['lng']=$latlngByCity->results[0]->geometry->location->lng;
                         }
                     }
                    $data['startime']=strtotime($data['startime']);
                    $data['endtime']=strtotime($data['endtime']);
                    $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
                        if(array_key_exists('status',$data)){
                            $data['status'] = 1;
                        }
                            if ($list=ForeignModel::create($data)) {
                                  $this->success('新增成功','index');
                            } else {
                                  $this->error('新增失败');
                            }
        }
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['text', 'name', '展会名称', '<span class="text-danger">必填</span>'],
                ['text', 'ename', '展会英文名称', '<span class="text-danger">必填</span>'],
                ['linkages','type', '选择会展分类','<span class="text-danger">必选</span>','exhibition_classification',2],
                ['text','venues', '展馆信息','<span class="text-danger">必选</span>'],
                ['linkages','city_id', '选择所在区域','<span class="text-danger">必填</span>', 'exhibition_district', 3],
                ['text','address', '详细地址','<span class="text-danger">必填</span>'],
                ['daterange','startime,endtime','会展举办时间','<span class="text-danger">必填</span>'],
                ['ckeditor','content','展会简介','<span class="text-danger">必填</span>'],
                ['ckeditor','range','展品范围','<span class="text-danger">必填</span>'],
                ['text','organizer', '主办单位','<span class="text-danger">必填</span>'],
                ['text','view','点击量','<span class="text-danger">必填</span>',0],
                ['switch','status','状态','','1'],
                ['image','picture','主图片上传','<span class="text-danger">必选</span>'],
                ['images','photos','附属图片上传','<span class="text-danger">选填，使用Control键选取</span>']
            ])
            ->fetch();
    }
  public function edit($id = null, $model = '')
    {
        if ($id === null) $this->error('参数错误');
        // 保存数据
        if ($this->request->isPost()){
            // 表单数据
            $data = $this->request->post();
            $result = $this->validate($data, 'Foreign');
            if(true !== $result) $this->error($result);
            $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($data['address'])."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
            $latlngByAddress = json_decode($this->curl_request($url));
            if($latlngByAddress && $latlngByAddress->status=="OK"){
                $data['lat']=$latlngByAddress->results[0]->geometry->location->lat;
                $data['lng']=$latlngByAddress->results[0]->geometry->location->lng;
            }else{
                $city = Db::table('dp_exhibition_district')->where('id',$data['city_id'])->value('name');
                $url = "https://ditu.google.cn/maps/api/geocode/json?address=".urlencode($city)."&key=AIzaSyA5uMFeNxZ45Xqzvm_jawEOU2l0PFJVlSQ";
                $latlngByCity = json_decode($this->curl_request($url));
                if($latlngByCity && $latlngByCity->status=="OK"){
                    $data['lat']=$latlngByCity->results[0]->geometry->location->lat;
                    $data['lng']=$latlngByCity->results[0]->geometry->location->lng;
                }
            }
            $data['startime']=strtotime($data['startime']);
            $data['endtime']=strtotime($data['endtime']);
            $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
            if(array_key_exists('status',$data)){
                $data['status'] = 1;
            }
            if ($district = ForeignModel::update($data)) {
                $this->success('编辑成功','index');
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = ForeignModel::get($id);
        $info['startime'] = date('Y-m-d',$info['startime']);
        $info['endtime'] = date('Y-m-d',$info['endtime']);
        //创建额外的html页面

        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['text', 'name', '会展名称', '<span class="text-danger">必填</span>'],
                ['text', 'ename', '展会英文名称', '<span class="text-danger">必填</span>'],
                ['linkages','type', '选择会展分类','<span class="text-danger">必选</span>','exhibition_classification',2],
                ['text','venues', '展馆信息','<span class="text-danger">必选</span>'],
                ['linkages','city_id', '选择所在区域','<span class="text-danger">必填</span>', 'exhibition_district', 3],
                ['text','address', '详细地址','<span class="text-danger">必填</span>'],
                ['daterange','startime,endtime','会展举办时间','<span class="text-danger">必填</span>'],
                ['ckeditor','content','展会简介','<span class="text-danger">必填</span>'],
                ['ckeditor','range','展品范围','<span class="text-danger">必填</span>'],
                ['text','organizer', '主办单位','<span class="text-danger">必填</span>'],
                ['text','view','点击量','<span class="text-danger">必填</span>',0],
                ['switch','status','状态','','1'],
                ['image','picture','主图片上传','<span class="text-danger">必选</span>'],
                ['images','photos','附属图片上传','<span class="text-danger">选填，使用Control键选取</span>']
            ])
            ->isAjax(false)
            ->setFormData($info)
            ->fetch();
    }
    /**
     * 删除
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function delete($record = [])
    {
        return $this->setStatus('delete');
    }

    /**
     * 设置配置状态：删除、禁用、启用
     * @param string $type 类型：delete/enable/disable
     * @param array $record
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function setStatus($type = '', $record = [])
    {
        $ids        = $this->request->isPost() ? input('post.ids/a') : input('param.ids');
        $uid_delete = is_array($ids) ? '' : $ids;
        $ids        = DistrictModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['district_'.$type, 'exhibition_district', $uid_delete, UID, implode('、', $ids)]);
    }
    //curl获取展会位置经纬度
    public function curl_request($url,$post='',$cookie='', $returnCookie=0){
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查  
      curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36');
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
      curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
      if($post) {
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
      }
      if($cookie) {
          curl_setopt($curl, CURLOPT_COOKIE, $cookie);
      }
      curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
      curl_setopt($curl, CURLOPT_TIMEOUT, 10);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $data = curl_exec($curl);
      if (curl_errno($curl)) {
          return curl_error($curl);
      }
      curl_close($curl);
      if($returnCookie){
          list($header, $body) = explode("\r\n\r\n", $data, 2);
          preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
          $info['cookie']  = substr($matches[1][0], 1);
          $info['content'] = $body;
          return $info;
      }else{
          return $data;
      }
  }
}