#GIT使用

|       名称      |       命令      |       作用      |
|-----------------|----------------|----------------|
|配置用户名name     | git config --global user.name '配置用户名name'| 提交代码时候身份信息标注    |   
|配置邮箱email      | git config --global user.email 'email' |  提交代码时候身份信息标注    |   
|初始化本地仓库      | git init |  初始化本地仓库，生成.git跟踪文件  |
|提交文件①          | git add 文件/文件夹     | 提交文件第一步 提交到缓存区 |
|提交文件②          | git commit -m '提交说明'  | 提交文件第二步 提交到本地仓库 |
|提交文件③          | git push [-u origin master] | 第一次提交要输入可选信息，用以关联远程仓库 | 
|查看文件状态        | git status | 显示当前文件状态：red 有修改未放入缓存区的  green 缓存区未提交到仓库的 |
|克隆远程仓库文件     | git clone url  |    从已经存在的远程仓库获取文件  |
|