<?php
    namespace app\checker\model;

    use think\Model as ThinkModel;
    use think\Db;
    class Foreign extends ThinkModel
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
        //获取审核列表
        public static function getList($map=[]){
            $list = Db::table('dp_exhibition_detail')
                ->alias('a')
                ->field('a.id,a.status,a.ename,c.name as t_name,b.name as c_name,a.view,d.group_name,a.create_time')
                ->join('dp_exhibition_classification c','a.type = c.id')
                ->join('dp_worldevents_organizerinfo d','a.organizer_id=d.id')
                ->join('dp_exhibition_district b','a.city_id=b.id')
                ->where($map)
                ->paginate();
            return $list;
        }

        public static function getExDetailById($id=''){
            $map['dp_exhibition_detail.id']=$id;
            $list = Db::view('dp_exhibition_detail a','id,picture,ename,short_name,city_id,type,create_time,event_frequency,
            startime,endtime,econtent,erange')
                    ->view('dp_worldevents_organizerinfo b','name as organizername,designation,country_code,phone_number,group_name,group_website,group_city,logo as organizer_logo','a.organizer_id=b.id')
                    ->view('dp_worldevents_user c','email','a.author=c.id')
                    ->where($map)
                    ->find();
            return $list;
        }
    }