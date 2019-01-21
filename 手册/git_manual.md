# - GIT使用手册

|	命令	|	说明	|	备注	|
|-----------|-----------|-----------|
|>>> git配置   |   |   |
|git config --global [user.name 'name']|配置用户名|用以在版本库中跟踪用户|
|git config --global user.email 'email'|配置用户邮箱|用以在版本库中跟踪用户|
|git config --list  |查看配置   |查看git中的所有配置项|
|>>> 初始化本地仓，代码回滚   |   |   |
|git init   |初始化本地仓库|会在当前目录下创建.git文件夹|
|git add file|将修改的文件添加到暂存区|	|
|git commit -m 'remark'|提交到本地仓库|remark为提交备注信息，便于后期查看|
|git reset HEAD file|将暂存区的文件从暂存区移除|仅将暂存区文件回滚到之前，本地文件保持修改之后|
|git checkout -- file| 将本地文件回滚到修改之前|从暂存区取上次放入的文件覆盖到本地|
|git reset --hard git_NO|代码回滚|将代码回滚到某一个版本，git_NO为git版本号|
|>>> 查看文件状态，提交记录，移除文件   |   |   |
|git status |查看文件状态|红色：本地有修改未提交到暂存区；  绿色：暂存区未提交到版本库|
|git log    |查看提交历史|每次显示三条|
|git rm [--cached] file|删除暂存区和本地文件|--cached：删除暂存区文件，本地保留|
|>>> 代码克隆，本地代码关联远程仓   |   |   |
|git clone git@github.com:userName/repository.git  |从远程仓库克隆代码到本地    |userName:仓库用户名； repository:仓库名|
|git remote add origin git@github.com:userName/repository.git  |将本地仓库和远程仓库关联   |userName:仓库用户名； repository:仓库名|
|git push [-u] origin master    |代码推送远程仓库   |-u可以关联本地和远程仓库，简化之后的操作|
|>>> git文件重命名   |   |   |
|git mv [-f] oldname newname  |重命名    |-f强制性移动/重命名，如果新文件存在则会覆盖旧文件|
|git add [-u] newname |添加到暂存区 |-u会更新git已经跟踪的文件|
|>>> ssh密匙   |   |   |
|ssh-keygen -t rsa [-C 'remark']  |生成ssh密匙    |-C 'remark'为备注信息，密匙生成之后的路径位于：~/.ssh/|
|ssh -T git@github.com  |查看ssh连接状态   |查看当前电脑与远程机器的连接状态|
|>>> git分支管理   |    |   |
|git branch branchName  |创建分支 |branchName:分支名|
|git checkout branchName    |切换分支   |branchName:分支名|
|git checkout -b branchName   |新建分支，并切换到新的分支   |上两条命令合并为当前一条命令|
|git branch    |查看分支 |分支前面的星号表示当前所在的分支    |
|   |-a |查看远程仓所有分支|
|   |-v |查看当前仓库所有分支最后一次提交|
|   |--merged   |当前仓库已经被合并的分支|
|   |--no-merged    |当前仓库未被合并的分支|
|git merge branchName   |合并分支   |branchName:分支名  这个是要被合并的分支，即你当前所在的不是这个分支|
|git branch [-d] branchName   |删除分支   |branchName:分支名，仅删除被合并的分支|
|   |-D |被删除的分支未被合并，将不能直接删除，需要用到-D参数|




# - 常见问题说明
>
>### git push的时候每次都要输入用户名和密码
> - 原因是在添加远程库的时候使用了https的方式。所以每次都要用https的方式push到远程库

>#### 1.查看使用的传输协议:
>>```
$ git remote -v
>>origin  https://github.com/angelloveroger/study (fetch)
>>origin  https://github.com/angelloveroger/study (push)
```

>#### 2.重新设置成ssh的方式:
>>```
>>$ git remote rm origin
>>$ git remote add origin git@github.com:username/repository.git
>>$ git push -u origin master
```

>#### 3.再次查看使用的传输协议:
>>```
>>$ git remote -v
>>origin  git@github.com:angelloveroger/study.git (fetch)
>>origin  git@github.com:angelloveroger/study.git (push)
```
>
---
