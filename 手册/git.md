#GIT使用手册

|	命令	|	说明	|	备注	|
|-----------|-----------|-----------|
|git config --global user.name 'name'|配置用户名|用以在版本库中跟踪用户|
|git config --global user.email 'email'|配置用户邮箱|用以在版本库中跟踪用户|
|git init   |初始化本地仓库|会在当前目录下创建.git文件夹|
|git add file|将修改的文件添加到暂存区|	|
|git commit -m 'remark'|提交到本地仓库|remark为提交备注信息，便于后期查看|
|git reset HEAD file|将暂存区的文件从暂存区移除|仅将暂存区文件回滚到之前，本地文件保持修改之后|
|git checkout -- file| 将本地文件回滚到修改之前|从暂存区取上次放入的文件覆盖到本地|
|git reset --hard git_NO|代码回滚|将代码回滚到某一个版本，git_NO为git版本号|
|git status |查看文件状态|红色：本地有修改未提交到暂存区；  绿色：暂存区未提交到版本库|
|git log    |查看提交历史|每次显示三条|
|git rm [--cached] file|删除暂存区和本地文件|--cached：删除暂存区文件，本地保留|
|git clone url  |克隆|从远程仓库克隆代码到本地|