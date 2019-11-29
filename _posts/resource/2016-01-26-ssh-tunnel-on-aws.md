---
layout:      post
title:    Aws代理上网[1]   
subtitle: 使用ssh隧道  
date:        2016-01-26
author:      Zebulon
category:    资源
tags:        
    - 科学上网
keywords: 
    - ssh隧道
    - 代理上网
    - 科学上网
    - aws  
description: 工作中经常会需要用谷歌查点资料，原因你懂的。刚好手头有一台[aws](http://aws.amazon.com/)虚拟主机，装的linux系统。后来想着直接用这个主机做代理。然后...
header-img:  /res/blog%2Fpost-img%2Fwhite-legged-damselfly-darter.jpg
---

* content  
{:toc} 

# 前言
工作中经常会需要用谷歌查点资料，原因你懂的。刚好手头有一台[aws](http://aws.amazon.com/)虚拟主机，装的linux系统。后来想着直接用这个主机做代理。然后...
好了，废话不多说了，直接进入主题，今天给大家介绍如何利用ssh隧道搭建代理。

# 步骤

## 配置ssh客户端

[aws](http://aws.amazon.com/)主机需要通过ssh登录。然后在ssh客户端配置一下隧道端口即可。
- 对于windows用户，亚马逊官网推荐使用[putty连接主机](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/putty.html?console_help=true)，将.pem格式的密钥转成.ppk，然后导入putty。
![putty配置](/res/blog/post-img/aws.gif)
- 对于Linux用户（mac与此相同），直接使用自带的ssh客户端连接。然后在/etc/ssh_config文件中配置一下密钥和端口即可。

```
Host amazon   
HostName  ***Your IP***
User ubuntu
IdentityFile  *** Path of key(.pem) ***
ForwardAgent yes
DynamicForward localhost:3128   #Port
SendEnv LANG LC_*

```
当ssh客户端配置好后，接下来我们配置一下浏览器。

## 配置浏览器

### 代理方式

开启ssh代理有两种方式
- 局域网代理设置，即局域网内计算机A开代理，局域网内其他计算机通过计算机A代理上网；
- 本机代理，即本机ssh连接主机，将局域网中计算机A的设置，请将套接字IP(或者SOCKS主机IP)修改成localhost，端口还是填3128；如下图所示
![浏览器配置](/res/blog/post-img/ie-base.jpg)

### 配置浏览器

下面我一本机代理为例说明浏览器配置。我电脑上除了IE还装了chrome（主力浏览器）和firefox（辅助浏览器）。由于主机在国外，并且流量有限（每月15GB），所以通常上国内网站用chrome（不代理），需要上google就用firefox（配置代理）

#### IE/Chrome

- IE选项
![IE配置1](/res/blog/post-img/ie1.png)
- 连接页—局域网设置
![IE配置2](/res/blog/post-img/ie2.png)
- 勾上---高级
![IE配置3](/res/blog/post-img/ie3.png)
- 套接字 localhost (局域网中，填写开putty的计算机IP)  端口 3128
![浏览器配置](/res/blog/post-img/ie-base.jpg)

然后确定  确定  …  就可以了

#### Firefox

- 选项
![firefox配置1](/res/blog/post-img/firefox1.png)
- 高级---网络---设置
![firefox配置2](/res/blog/post-img/firefox2.png)
- 设置代理
![firefox配置3](/res/blog/post-img/firefox3.jpg)  
SOCKS主机： localhost (填写开putty的计算机IP)     端口 3128

## 使用

每次使用前需要用ssh连接主机，然后用配置好的浏览器就可以上网了。
![ssh隧道](/res/blog/post-img/ssh-tunnel.gif)  

# 下篇预告

好了，今天的给大家分享的ssh隧道就差不多这么多，下篇给大家推荐一个更好用的代理工具，[shadowsocks](https://shadowsocks.org/en/index.html)，相信你会喜欢。有什么问题可以随时给我留言。




