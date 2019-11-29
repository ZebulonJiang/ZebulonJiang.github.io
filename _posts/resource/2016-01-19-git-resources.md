---
layout: post
title: Git资源汇总
subtitle:   汇集git常用命令
date:       2016-01-19
author:     "Zebulon"
category:  资源
tags:
    - git
keywords:
    - git,
    - git用法
description: 这里汇集了git的常用资源。
header-img: ../res/blog%2Fpost-img%2Fgirls.jpg
---
* content  
{:toc} 

## 前言

由于工作原因，之前一直用的是svn，由于某些原因接触了git，之后就深深地喜欢了git。目前git托管的网站也非常的多。譬如[github](http://www.github.com)、国内的[coding](http://www.coding.net)、[GitCafe](http://www.GitCafe.com);目前也是在慢慢熟悉git的一些功能，特此将自己常用的一些命令和遇到的一些问题记录在这篇blog里，希望和小白一起学习。

## Git的基本操作

### 设置用户名和邮箱

1. 设置用户名
`git config user.name "Your Name"`
`git config  --global user.name "Your Name"`


2. 设置用户邮箱
`git config user.email "demo@test.com"`
`git config  --global user.email "demo@test.com"`


3. 查看设置
```git config --list```

### Git命令帮助 

通过```git help ```来获取命令帮助
通过``` git help 特定cmd```获取特定指定的帮助

### 常用命令
1. 克隆项目 ``` git clone URL```
2. 添加文件``` git add * ```
3. 查看状态 ``` git status ```
4. 提交代码 ``` git commit -m "打标内容"  ```
5. 向远程仓库推送代码``` git push ```
6. 从远程仓库下载代码``` git pull ```
7. 部署时经常会遇到，远程版本与本地冲突，需要用远程版本覆盖本地版本。则执行
```git reset --hard```
```git pull```
8. 放弃本地修改（未提交）```git checkout -f```

## 参考资源

1. [廖雪峰git教程](http://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000/)
2. [boot-css-git教程](http://www.bootcss.com/p/git-guide/)
3. [coding-git教程](https://coding.net/help/faq/git/git.html)

