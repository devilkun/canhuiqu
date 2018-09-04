<?php
namespace app\venues\admin;
use app\admin\controller\Admin;
use app\common\builder\ZBuilder;
use app\venues\model\Venues as VenuesModel;
use app\venues\model\Tag as TagModel;
use app\venues\model\Tagmap as TagmapModel;
use think\Db;
use util\Tree;
/**
 * 展馆控制器
 * @package app\exhibition\admin
 */
class Venues extends Admin
{
    /**
     * 首页
     * @author devilkun  <zwy876910200@qq.com>
     * @return mixed
     */
    public function index()
    {
        $map = $this->getMap();
        $data_list = VenuesModel::get_list($map);
        return ZBuilder::make('table')
            ->setSearch(['title' => '标题', 'exhibition_venues.name' => '展馆名称']) // 设置搜索框
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['name','展馆名称'],
                ['city', '所属城市'],
                ['username','发布人'],
                ['create_time','发布时间','datetime'],
                ['status','状态','status','',['禁用', '启用']],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete') // 批量添加顶部按钮
            ->addRightButtons('edit,delete') //右按钮
            ->addOrder('id')
            ->setTableName('exhibition_venues')
            ->addFilter(['column_name' => 'exhibition_venues.name', 'username' => 'admin_user'])
            ->setRowList($data_list) // 设置表格数据
            ->fetch(); // 渲染模板
    }

    /**
     * 添加展馆
     */
    public function add(){
            if($this->request->isPost()){
                $data = $this->request->post();
                if(isset($data['tags'])){
                    $tags = $data['tags'];
                    $data['tags']=implode(',',$data['tags']);
                }
                //经纬度
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
                $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
                // 验证
                $info = $this->validate($data, 'Venues');
                // 验证失败 输出错误信息
                if(true !== $info) $this->error($info);
                if(array_key_exists('status',$data)){
                    $data['status'] = 1;
                }
                if ($result = VenuesModel::create($data)) {
                    foreach($tags as $k=>$v){
                        TagmapModel::create(['vid'=>$result['id'],'tagid'=>$v]);
                    }
                    $this->success('新增成功', url('index'));
                } else {
                    $this->error('新增失败');
                }
            }
                return ZBuilder::make('form')
                        ->addFormItems([
                            ['image','logo','展馆Logo','<span class="text-danger">必选</span>'],
                            ['text', 'name', '展馆名称', '<span class="text-danger">必填</span>'],
                            ['select', 'tags', '标签', '<span class="text-danger">选填</span>',TagModel::getTag(),'', 'multiple'],
                            ['linkages','city_id', '选择所在区域', '<span class="text-danger">必填</span>', 'exhibition_district', 3],
                            ['ckeditor','introduction','展馆介绍','<span class="text-danger">必填</span>'],
                            ['ckeditor','route','展馆路线','<span class="text-danger">选填</span>'],
                            ['switch', 'status', '状态','<span class="text-danger">默认为开启状态</span>','true'],
                            ['text','acreage','面积(M²)','<span class="text-danger">选填</span>'],
                            ['text','email','展馆邮件','<span class="text-danger">必填</span>'],
                            ['text','fax','展馆传真','<span class="text-danger">必填</span>'],
                            ['text','contacts','展馆联系方式','<span class="text-danger">必填</span>'],
                            ['text','address','展馆地址','<span class="text-danger">必填</span>'],
                            ['time:6','start_time','展馆开放起始时间','<span class="text-danger">必选</span>'],
                            ['time:6','end_time','展馆开放结束时间','<span class="text-danger">必选</span>'],
                            ['text','people','可容纳人数','<span class="text-danger">选填</span>'],
                            ['text','website','展馆网址','<span class="text-danger">必填,示例:https://www.baidu.com</span>'],
                        ])
                        ->fetch();
    }

    /**
     * 编辑
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function edit($id = null, $model = '')
    {

        if ($id === null) $this->error('参数错误');
        // 保存数据
        if ($this->request->isPost()){
            // 表单数据
            $data = $this->request->post();
            if(isset($data['tags'])){
                $tags =$data['tags'];
                $data['tags']=implode(',',$data['tags']);
            }
            //经纬度
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
            $data['author']= $_SESSION['dolphin_admin_']['user_auth']['uid'];
            // 验证
            $info = $this->validate($data, 'Venues');
            // 验证失败 输出错误信息
            if(true !== $info) $this->error($info);
            if(array_key_exists('status',$data)){
                $data['status'] = 1;
            }
            if ($district = VenuesModel::update($data)) {
                $del = Db::table('dp_venues_tagmap')->where('vid',$data['id'])->delete();
                if($del){
                    foreach($tags as $k=>$v){
                        TagmapModel::create(['vid'=>$data['id'],'tagid'=>$v]);
                    }
                }
                $this->success('编辑成功',url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        // 获取数据
        $info = VenuesModel::get($id);
        return ZBuilder::make('form')
            ->addHidden('id')
            ->addFormItems([
                ['image','logo','展馆Logo','<span class="text-danger">必选</span>'],
                ['text', 'name', '展馆名称', '<span class="text-danger">必填</span>'],
                ['select', 'tags', '标签', '<span class="text-danger">选填</span>',TagModel::getTag(),'', 'multiple'],
                ['linkages','city_id', '选择所在区域', '<span class="text-danger">必填</span>', 'exhibition_district', 3],
                ['ckeditor','introduction','展馆介绍','<span class="text-danger">必填</span>'],
                ['ckeditor','route','展馆路线','<span class="text-danger">选填</span>'],
                ['switch', 'status', '状态','<span class="text-danger">默认为开启状态</span>','true'],
                ['text','acreage','面积(M²)','<span class="text-danger">选填</span>'],
                ['text','email','展馆邮件','<span class="text-danger">必填</span>'],
                ['text','fax','展馆传真','<span class="text-danger">必填</span>'],
                ['text','contacts','展馆联系方式','<span class="text-danger">必填</span>'],
                ['text','address','展馆地址','<span class="text-danger">必填</span>'],
                ['time:6','start_time','展馆开放起始时间','<span class="text-danger">必选</span>'],
                ['time:6','end_time','展馆开放结束时间','<span class="text-danger">必选</span>'],
                ['text','people','可容纳人数','<span class="text-danger">选填</span>'],
                ['text','website','展馆网址','<span class="text-danger">必填</span>'],
            ])
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
     * 启用配置
     * @param array $record 行为日志
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function enable($record = [])
    {
        return $this->setStatus('enable');
    }

    /**
     * 禁用配置
     * @param array $record 行为日志
     * @author devilkun <zwy876910200@qq.com>
     * @return mixed
     */
    public function disable($record = [])
    {
        return $this->setStatus('disable');
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
        $ids        = VenuesModel::where('id', 'in', $ids)->column('name');
        return parent::setStatus($type, ['venues_'.$type, 'exhibition_venues', $uid_delete, UID, implode('、', $ids)]);
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