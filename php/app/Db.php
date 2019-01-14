<?php

    class Db{

        /*  单例模式 连接数据库类
         *  1.构造函数要标记为非public(防止外部使用new创建对象)，单例类不能在其他类中实例化，只能被自身实例化
         *  2.拥有一个保存类的实例的静态成员变量 $_instance
         *  3.拥有一个访问这个实例的公共的静态方法 getInstance()
         * */


        static private $_instance; // 实例化对象装载变量
        static private $_linkResource; //   数据库连接资源
        private $_dbConfig = array(     //  数据库配置
            'host' => '127.0.0.1',
            'user' => 'root',
            'pawd' => '',
            'dbName' => 'test'
        );



        private function __construce(){

        }


        /*
         *  实例化自身方法
         * */
        static public function getInstance(){

            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }

            return self::$_instance;

        }



        /*
         *   连接数据库
         * */
        public function connect(){

            if(!self::$_linkResource){
                self::$_linkResource = @mysql_connect($this->_dbConfig['host'], $this->_dbConfig['user'],
                                        $this->_dbConfig['pawd']);
                if(!self::$_linkResource){
                    throw new Exception('SERVER ERROR!');
                }
                mysql_select_db($this->_dbConfig['dbName'],self::$_linkResource);
                mysql_query('set names utf8',self::$_linkResource);
            }

            return self::$_linkResource;
        }


}
// mysql_num_rows()  查询数据库返回结果集资源的条数
// mysql_fetch_assoc() 从结果集中取一条作为关联数组
