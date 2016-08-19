---
layout: post
title: OSX资源汇总
subtitle:   汇集OSX常用命令
date:       2016-03-19
author:     "Zebulon"
category:  资源
tags:
    - OSX
keywords:
    - OSX,
    - OSX用法
description: 这里汇集了OSX的常用资源。
header-img: http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/apple-mac.jpg
---
* content  
{:toc} 

## 前言

osx系统的terminal无疑效率神器，但是从win转过来的自己对unix很多命令并不是很熟悉，仅以此blog记录自己不会但是比较常用的unix命令。
环境：mac电脑osx系统
工具：iterm + zsh



## OSX下的常用命令

### kill特定进程

#### 问题现象
在写blog时用`jekyll serve`启动本地预览，在没有终止serve的情况下关掉iterm，重新打开iterm后，用`jekyll serve`启动本地预览会报错`jekyll 3.0.1 | Error:  Address already in use - bind(2)`
显然可以看出jekyll的预览服务器端口4000 被占用。
![jekyll-serve-error](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/jekyll-serve-error.jpg)

#### 解决办法
因为jekyll本地预览服务器会占用4000端口，在iterm下输入`sudo lsof -i:4000`,找到对应的进程id，然后kill掉就行。再次用`jekyll serve`启动服务正常
![jekyll-serve-kill](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/jekyll-serve-kill.jpg)

### 添加sudo用户

通过查看`/etc/sudoers`文件发现，可以编辑这个文件，将user直接添加到sudoers文件里，也可以通过添加到admin或者sudo用户组也能解决问题。所以直接通过`usermod -G admin username`就可以了。

![sudo](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/2016-05-02-sudo.jpg)


### 新用户无法tab补全

在ubuntu下用useradd添加新用户后，无法用tab补全命令，需要修改user的bash。
`sudo vim   /etc/passwd`
找到你添加的用户XXX
`XXX:x:1000:1000::/home/XXX:`
将这句话修改成`XXX:x:1000:1000::/home/XXX:/bin/bash`
重启终端即可。




