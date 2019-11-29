---
layout:      post
title:       Aws代理上网[2]
subtitle:    使用shadowsocks代理
date:        2016-01-28
author:      Zebulon
category:    资源
tags:        
     - 科学上网
keywords:    
     - aws
     - shadowsocks
     - 代理上网
description: 如果你是一名硬件工程师，免不了会上网查一些芯片手册，当你打开百度搜索，前几页几乎全部被广告和文库占用，而真正的官方手册，却犹抱琵琶半遮面。	
header-img:  /res/blog/post-img/internet-1181586_1280.jpg
---


* content  
{:toc} 

# 前言

为什么要出轨（番羽--土啬）去查资料？当你想安装chrome，打开度娘搜索会是这样的
![百度全家桶](/res/blog%2Fpost-img%2Fbaidu.jpg)
当你想安装一个UE，打开搜索百度却是这样的。
![百度VS谷歌](/res/blog%2Fpost-img%2Fbaidu-google.png)
如果你是一名硬件工程师，免不了会上网查一些芯片手册，当你打开百度搜索，前几页几乎全部被广告和文库占用，而真正的官方手册，却犹抱琵琶半遮面。
关于百度的行为，最近在知乎上也讨论的热火朝天。[知乎链接]( http://www.zhihu.com/question/22732593/answer/83139119)。
我相信作为一名工程师，在这种背景下，出轨成为了必备的技能。

# 如何出轨

### 介绍

出轨的方式有很多种，这里我就给大家介绍一下如何在[aws](http://aws.amazon.com/)上搭建代理服务器。aws优点如下： 

- 简单、方便；
- 便宜，免费使用12个月；
- 可以用于搭建测试网站；
- 可以做代理服务器；

### 步骤

#### 申请aws主机。

去[aws](http://aws.amazon.com/)官网申请一台主机，aws采用的后付费模式。申请时需要先绑定信用卡。月底出账单，所以新手很容易一不小心就用超了，导致信用卡被扣美刀。解决办法有两种：
- 去[马云家](www.taobao.com)买一个***虚拟信用卡***，这个办法简单省事，但是卖家一般会1个卡号卖给多个用户（正常对你也没啥影响），But，But，如果有一个家伙超套餐了（由于是虚拟信用卡，没有额度，亚马逊是没法扣到钱的），亚马逊会关闭相关的帐号。你的帐号也许就会遭殃。
- 严格按照[AWS免费套餐说明](http://aws.amazon.com/cn/free/?sc_ichannel=ha&sc_ipage=signin&sc_iplace=body_link_text&sc_icampaigntype=free_tier&sc_icampaign=ha_en_free_tier_signin_2014_03)，记住几个原则，创建一个实例（***only one!*** ）、安装免费系统（带有free标志）、默认选项创建实例（一般默认的就是免费。如果你需要修改创建实例选项，那么就要好好研究了）；

额，aws申请完，等亚马逊审核通过后（一般都会通过，有时秒通过，有时慢一点，但是肯定在24h内），你就可以连接自己的主机啦，windows用户用putty连接使用[方法](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/putty.html?console_help=true) (密钥用*.ppk)，如果是mac or linux 则用自带的ssh客户端连接（这个不用我教你吧？密钥用*.pem）。

***Tips:***

- aws主机位置优先岛国，新加坡次之;速度最快的就是岛国。据说阿里云的香港服务器都要先经过岛国。
- 记得在防火墙设置端口初入规则。即你代理需要用哪个端口，在防火墙里将该端口设置允许。

#### 服务器设置

##### 安装

***Debian / Ubuntu:***

```apt-get install python-pip```

```pip install shadowsocks```


***CentOS:***

```yum install python-setuptools && easy_install pip```
    
```pip install shadowsocks```
下面我以ubuntu为例讲解一下服务器配置。

##### 配置

安装完shadowsocks后可以用```ssserver -h ```查看帮助信息。
![ssserver -h](/res/blog/post-img/ssserver-h.jpg)


创建shadowsocks目录，并创建其配置文件，如下： 

```sudo mkdir /etc/shadowsocks ```

```sudo vim /etc/shadowsocks/config.json ```

```
{
"server":"0.0.0.0", 
"server_port":1194, 
"local_address":"127.0.0.1", 
"local_port":1080, 
"password":"你的密码", 
"timeout":300, 
"method":"aes-256-cfb", 
"fast_open":false, 
"workers": 1 
}

```
上面的配置你只需要修改你的密码，***server_port***就是你在aws防火墙需要开启的端口号。服务器端就是监控这个端口的数据。如果没有端口冲突就用这个好了。


##### 启动和停止服务

运行shadowsocks服务:

```sudo ssserver -c /etc/shadowsocks/config.json -d start ```

通过```netstat -tunlp ```命令可以查看网络连接情况，我们可以看到服务器正在监听1194端口的数据。

![shadowsocks-start](/res/blog/post-img/shadowsocks-start.jpg)


停止shadowsocks服务:

```sudo ssserver -d stop```

![shadowsocks-stop](/res/blog/post-img/shadowsocks-stop.jpg)

#### 客户端连接
客户端下载:
[windows](https://github.com/shadowsocks/shadowsocks-windows/releases)
[Mac](https://github.com/shadowsocks/shadowsocks-iOS/releases)
其他客户端在[官方github](https://github.com/shadowsocks)上都能找到相应的分支。
下面我以mac为例说一下客户端配置（windows的配置也一样）。

![shadowsocks－config](/res/blog/post-img/shadowsocks-config.jpg)

***ip地址：***填写服务器的ip地址

***端口：***填写服务器配置server_port端口

***加密方式：***跟服务器配置的一致，推荐aes-256-cfb

配置完后点击确定，然后在状态栏打开软件，如下图所示：

![shadowsocks-open](/res/blog/post-img/shadowsocks-open.jpg)

客户端运行起来后，接下来我们就测试一下代理是否成功。在浏览器运行http://www.cip.cc/,如果显示你服务器的ip和地址，那么恭喜你！如果没有成功，可以在下面给我留言。
![cip](/res/blog/post-img/cip.jpg)










