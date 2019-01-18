#THINKPHP手册

|---------------------------|-------------------------------|----------------------------------|----------------------------------|
|        入口                |   /pulic/index.php            |                                  |                                  |
|        项目应用目录         |   /application                |        可在入口文件配置 define('APP_PATH', __DIR__ . '/../program/');|   /program  |
|        常规应用配置         |   /application/config.php     |        可在入口文件配置 define('CONF_PATH', __DIR__. '/../conf/');|    /conf     |
|        扩展配置            |   /conf/extra/...php          | 当配置常规配置之后，在常规配置文件夹conf下新建extra文件夹，然后添加php文件，文件名会当作扩展配置的键|   /conf/extra/....php    |
|        场景配置            |   /conf/home.php              | 当配置常规配置之后，在常规配置中将app_status配置好，再在conf文件夹下新建与app_status值一样的php文件即可|   /conf/home.php         |
|        模块配置            |   /application/index/config.php| 如果有新建常规配置文件夹conf，可在目录下新建与模块同名的文件夹，然后在其中配置(模块配置下还可以添加扩展配置)|   /conf/index/[config.php/database.php]  |
|---------------------------|-------------------------------|----------------------------------|----------------------------------|
|        think类库调用       |   /thinkphp/library/          | 两种方式调用： 1.use think\类名;  类名::方法();       2.\think\类名::方法();  |     |