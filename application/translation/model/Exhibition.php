<?php
    namespace app\translation\model;

    use think\Model as ThinkModel;
    use think\Db;
    class Exhibition extends ThinkModel
    {
        // 设置当前模型对应的完整数据表名称
        protected $table = '__EXHIBITION_DETAIL__';
        // 自动写入时间戳
        protected $autoWriteTimestamp = true;

        // 写入时，将菜单id转成json格式
        public function setMenuAuthAttr($value)
        {
            return json_encode($value);
        }

        // 读取时，将菜单id转为数组
        public function getMenuAuthAttr($value)
        {
            return json_decode($value, true);
        }

        public static function getList($map=[]){
            $list = Db::name('exhibition_detail')->where($map)->paginate();
            return $list;
        }

        /**
         * Notes:区域列表展示
         * User: devilkun
         * Date: 2018/5/21
         * Time: 9:51
         */
        public static function getDistrictList(){
            $city_list = Db::name('exhibition_district')->where('level',3)->select();
            $country_list =  Db::name('exhibition_district')->where('level',2)->select();
            $continents_list =  Db::name('exhibition_district')->where('level',1)->select();
            foreach ($city_list as $city){
                  foreach ($country_list as $country){
                      if($city['pid']==$country['id']){
                          foreach ($continents_list as $continents){
                               if($country['pid']==$continents['id']){
                                    $list[$city['id']] = $continents['name'].'-'.$country['name'].'-'.$city['name'];
                               }
                          }
                      }
                  }

            }
            return $list;
        }

        /**
         * Notes:展会分类列表
         * User: devilkun
         * Date: 2018/5/21
         * Time: 10:26
         * @return mixed
         */
        public static function getTypeList(){
            $map['pid']=['neq',0];
            $main_list = Db::name('exhibition_classification')->where('pid',0)->select();
            $children_list = Db::name('exhibition_classification')->where($map)->select();
            foreach ($children_list as $children){
                  foreach ($main_list as $main){
                        if($children['pid']==$main['id']){
                              $list[$children['id']] = $main['name'].'-'.$children['name'];
                        }
                  }
            }
            return $list;
        }

        /**
         * Notes:获取需要翻译的展会内容详情
         * User: devilkun
         * Date: 2018/5/21
         * Time: 11:32
         * @param null $id
         */
        public static function getExTranslateDetailById($id=null){
             $map['dp_exhibition_detail.id']=$id;
             $list = Db::view('dp_exhibition_detail a')
                     ->view('dp_exhibition_venues b','name as venues_name','a.venues_id=b.id')
                     ->view('dp_worldevents_organizerinfo c','group_name as organizer_name','a.organizer_id=c.id')
                     ->where($map)
                     ->find();
             return $list;
        }
    }