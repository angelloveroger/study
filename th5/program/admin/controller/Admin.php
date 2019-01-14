<?php
/**
 * Created by Roger.
 * User: roger
 * Date: 2018/11/29
 * Time: 9:42
 */
namespace app\admin\controller;

use think\Controller;
use think\Config;
use think\Db;

class Admin{

    private $db;

    public function __construct(){
        $this->db = Db::name('user');
    }

    /**
     * 数据库操作
     */
    public function index() {


        /*$data = array();
        for($i=1; $i<6; $i++){
            $data[] = ['username'=>'angel'.$i, 'age'=>18, 'sex'=>2, 'native_place'=>'sky'];
        }*/
        /*======================================================连接数据库======================================================*/
        # 读取数据库配置，连接配置中的数据库，返回object
        //$res = Db::connect();

        # dsn连接，返回object
        //$res = Db::connect('数据库类型://用户:密码@数据库服务器:端口/数据库#字符集');

        /*======================================================插入数据库======================================================*/
        # 插入【execute】。返回插入数据的行数
        //$res = Db::execute('insert test_user set username=?, age=?, sex=?, native_place=? ',['luoenxi', 3, 1, '湖北']);

        # 链式操作->插入【insert】。返回插入数据的行数
        //$res = $db->insert(array('username'=>'yaoyufen', 'age'=>30, 'sex'=>2, 'native_place'=>'四川'));

        # 链式操作->插入【insertGetId】。返回插入数据的ID
        //$res = $db->insertGetId(array('username'=>'yaoyuxin', 'age'=>27, 'sex'=>1, 'native_place'=>'四川'));

        # 链式操作->插入【insertAll】。返回插入数据的行数
        //$res = $db->insertAll($data);

        /*======================================================查询数据库 二维数组======================================================*/
        # 查询【query】。数据存在则返回二维数组
        # 不存在返回空数组
        //$res = Db::query('select * from test_user where id=14');

        # 链式操作->查询【select】。数据存在返回二维数组
        # 如果结果不存在，不存在返回空数组
        //$res = Db::table('test_user')->select();

        # 链式操作->查询指定列【column】。返回数据库中该列的值，返回数据为一维数组，如果存在第二个参数，则把第二个参数当作返回数组的键
        # 如果结果不存在，返回空数组
        //$res = Db::table('test_user')->column('age', 'username');

        /*=======================================================查询数据库 一维数组======================================================*/
        # 链式操作->查询【find】。数据存在返回一维数组
        # 如果结果不存在，不存在返回NULL
        //$res = Db::table('test_user')->find();

        # 链式操作->查询指定字段【value】。数据存在返回该查询字段的值
        # 如果结果不存在，不存在返回NULL
        //$res = Db::table('test_user')->value('username');

        # 数据库操作中 【Db::table(表名)】，需要表前缀。单例模式
        # 可以用【Db::name(表名)】代替，可以省略表前缀。单例模式
        # 也可以用助手函数【db(表名, [], false)】代替，可以省略表前缀。该助手函数每次调用的时候都会实例化一个对象出来，如果不需要实例化新的对象出来，可以传递的三个参数为【false】

        /*======================================================更新数据库======================================================*/
        # 链式操作->更新多字段【update】。方法用于更新多个字段
        # 返回受影响的行数
        //$res = $this->db->where(['id'=>'5'])->update(['native_place'=>'earth', 'age'=>19]);

        # 链式操作->更新单字段【setField】。方法用于更新单个字段
        # 返回受影响的行数
        //$res = $this->db->where(['id'=>'6'])->setField('native_place', 'earth');

        # 链式操作->加法【setInc】。数据库加法操作。如果只有一个参数，每次+1，如果存在第二个参数，每次加上第二个参数的值
        # 返回受影响的行数
        //$res = $this->db->where(['id'=>7])->setInc('age', 3);

        # 链式操作->减法【setDec】。数据库减法操作。如果只有一个参数，每次-1，如果存在第二个参数，每次减去第二个参数的值
        # 返回受影响的行数。如果字段设置为无符号，当字段将要变为负数的时候，sql报错
        //$res = $this->db->where(['id'=>8])->setDec('age', 5);

        /*======================================================删除数据库======================================================*/
        # 链式操作->删除【delete】。如果要删除的数据条件是主键，直接在【delete(primary key)】delete方法中放入主键自增ID即可
        # 返回受影响的行数
        //$res = $this->db->where(['id'=>9])->delete();
        //$res = $this->db->delete(8);

        /*======================================================条件表达式======================================================*/
        # 数组形式的条件
        //$res = $this->db->where(['id'=>5])->buildSql();
        //$res = $this->db->where(['id'=>['EGT', 5]])->buildSql();

        # 字符串形式条件
        //$res = $this->db->where('id=5')->buildSql();
        //$res = $this->db->where('id', 'between', [2,5])->buildSql();

        # 自定义表达式【EXP】
        //$res = $this->db->where('id', 'EXP', 'not in (1,3,5,7,9)')->buildSql();

        # 或条件表达式【whereOr】
        //$res = $this->db->where('id', 'between', [2,5])->whereOr('username', 'roger')->buildSql();

        /*======================================================条件表达式======================================================*/
        # 链式操作
        // field(字段1，字段2，....)  例子：->field('username, age, sex')   指定查询字段
        // order(字段 排序规则(desc/asc))  例子：->order('id desc')    指定返回数据排序规则
        // limit( [数据条数]/[起始位置,数据条数])  例子：->limit(20)/->limit(2,10)      指定返回数据的条数
        // page(页码, 每页条数)  例子：->page(2, 15)      分页搜索
        // group(字段)  例子：->group('sex')      分组

        dump($res);
    }
}