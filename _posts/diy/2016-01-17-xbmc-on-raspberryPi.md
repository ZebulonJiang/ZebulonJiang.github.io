---
layout: post
title: XBMC on Raspberry Pi 
subtitle:   在树莓派上体验XBMC
date:       2016-01-17
author:     "Zebulon"
category:  DIY
tags:
    - 树莓派
keywords:
    - 树莓派,
    - XBMC，
    - 家庭影院，
    - Openwrt，
    - Aria2，
    - BT下载，
    - NAS
description: 在树莓派上实现XBMC家庭影院。非常的有意思。
header-img: http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/xbmc-home.png
---
* content  
{:toc} 

## 介绍

这是很久以前写过的一个Blog，当时玩[树莓派](https://www.raspberrypi.org/)和openwrt路由。树莓派刷一个XBMC的系统。结合openwrt路由的bt下载。完成了以下功能：

1、用XBMC视频插件在线看视频；主流视频网站如优酷、搜狐、腾讯等插件都能用。搜狐还带电视直播。另外百度云插件支持直接播放。现在很多视频资源都在百度云上了，如果有兴趣不妨收藏到自己的云盘，然后通过XBMC插件直接播放。
2、利用XBMC直接播放局域网共享的视频、音乐资源；
3、支持apple的airplay功能；
4、利用路由器将视频下载到路由的硬盘（U盘或者移动硬盘都可以），然后用树莓派的XBMC直接播放

以下是blog原文：

这两周一直在测试PI的XBMC媒体中心，结果还是令我满意的，至少在WIFI的条件下720P的电影一点都不卡，1080P的电影很卡（大小38G），应该跟局域网限制有关。话不多说，先上图：
![xbmc](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/xbmc.png)
<center >运行XBMC的效果</center >

![video plug](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/video-plug.png)
<center >视频插件</center >

![raspberry pi](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/rasberry-pi.png)
<center >树莓派&路由器</center >

![openwrt](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/openwrt-router.png)
<center >FWR171刷完Openwrt挂载一个32G的优盘</center >

![AirPlay](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/airplay.png)
<center >Airplay效果</center >

![Aria2 BT](http://7xq2ld.com1.z0.glb.clouddn.com/blog/post-img/bt.png)
<center >OpenWrt路由器下载监测界面（Aria2支持手机客户端）</center >

## 注意事项：

1. 关于系统选择
树莓派玩XBMC有三个选择：Raspbmc、Xbian、Openelec；最后我选择的是Openelec；原因如下：Openelec系统启动快。带程序监护功能，即XBMC进程死掉了，自动能重启XBMC；Raspbmc启动时间略微长，关键是Airplay只能将音频投到显示器。airplay没有视频画面，如果用Raspbmc建议将自动更新关掉，否则系统起来它就自动下载更新，时间巨长；而Xbian则没有XBMC监护进程，如果XBMC死掉了，系统会进入命令行界面，这样你必须得给PI配一个专门的键盘了。否则就是强行断电重启。这两个问题不知道是不是跟Raspbmc和Xbian版本有关，我这次测试的是2014-05-16在官网下载的镜像；
2. 关于系统备份
首先声明我的备份是基于Openelec，在Openelec-config界面会有系统自带的一个backup程序，如果大家都是基于Openelec则可以用这套备份程序即可，但是大家有想玩Raspbmc和Xbian的，那么通过openelec系统自带的备份程序就不通用了，所以我采用另一个方式进行备份。XMBC程序插件有一个XMBC backup程序，可以通过这个插件对系统的插件信息进行备份。当下次重新装机或者换别的系统，你只需首先下载一个XMBC backup插件，然后通过这个插件能恢复你目前所有的其它插件。下面链接是我机器的所有插件备份，需要的朋友可以直接下载安装常用插件，如果想自己折腾，我也将XBMC的插件大全（真的很全）分享给大家。
[传送门](http://pan.baidu.com/s/1qXtC4k0)
3. 关于遥控器
手机上可以安装一个XMBC remote的软件。这样你就可以用手机充当XMBC的遥控器了。我猜你们用手机当遥控器时，每次使用一定会拿手机可以对着显示器按～～

暂时就写到这里吧，最后将器件清单列在下面，给大家一个参考

## 器件清单：

1. 显示器，大小根据需求,带DVI或者HDMI接口就行，如果不玩XBMC，显示器也可以省了，直接安装XRDP，然后用windows远程桌面到Raspberry;当然大部分时间不会用桌面操作，都是用SSH命令行控制；
2. 树莓派，TB很多卖这个的，240左右  512M内存版本  
3. 8G+  高速SD卡，其实4G+就行了，但是SD卡8G也不贵，大一点可以同时装多个系统。上官网搜索NOOBS，你就知道怎么安装多系统了。建议CLASS10，因为PI的SD卡充当硬盘作用，所有速度快点会好一些，我自己用的是CLASS4的，和CLASS10比没有慢的感觉。 JD大约30元
4. 如果用显示器需要配一对喇叭，接电视就没必要了。
5. 路由一枚，JD花55买的FWR171，将内存和Flash换掉，然后在主板增加一个USB座，刷一个Openwrt系统（我先测试一段时间，稳定后我会将固件上传到网上分享给大家）这个如果自己有改装工具的话，元件（含路由）成本应该在80（含运费）以内。
6. 如果路由或者树莓派需要挂载移动硬盘，建议配一个带电源的HUB，JD上买的力特的不错（带隔离电源的那种） 50元。
7. [USB wifi](http://item.jd.com/509932.html )    其它品牌的也行   29元
8. USB分线器一根   microUSB一分为二，如果你手头的板子或者手机很多，你会喜欢它的。两个设备挂一起，注意电源功率。4.5元

***最后欢迎有这方面爱好的朋友一起交流***
