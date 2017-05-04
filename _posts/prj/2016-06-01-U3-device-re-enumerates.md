---
layout: post
title: U3-device-re-enumerates
subtitle:   ""
date:       2016-06-01
author:     "Zebulon"
category:  项目
tags:
    - 项目
keywords:
    - 项目,
    - U3设备重枚举,

description: 本次主要对比这两只相机在上电阶段1V2以及3V3的电源跌落情况做测试
header-img: http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40TXVDDQ-2-2.jpg
---
* content
{:toc}

# 20160603 交换芯片

将之前在我们相机上有问题的芯片换到Cypress DVK板子上，结果DVK出现了反复重枚举问题。

## Inter controller

在Inter控制器下，当DVK（换上之前有问题的芯片）接到PC上，设备管理器一直在重枚举；在streamer工具里也能看到设备在反复重枚举；
<video id="video" width="800" height="600" controls="" preload="none" poster="http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2F20160603-intel.png?imageView2/1/w/600/h/400">
      <source id="mp4" src="http://7xq2ld.com1.z0.glb.clouddn.com/video%2FIntel%20controller.mp4" type="video/mp4">
      <p>Your user agent does not support the HTML5 Video element.</p>
    </video>

## Asmdia controller

在Asmdia控制器下，当DVK（换上之前有问题的芯片）接到PC上，设备管理器每次都能枚举成功；在streamer工具里可以正常数据传输；
<video id="video" width="800" height="600" controls="" preload="none" poster="http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2F20160603-asmedia.png?imageView2/1/w/600/h/400">
      <source id="mp4" src="http://7xq2ld.com1.z0.glb.clouddn.com/video%2FAsmdia%20controller.mp4" type="video/mp4">
      <p>Your user agent does not support the HTML5 Video element.</p>
    </video>

******

# 20160602 电源测量


本次主要对比这两只相机在上电阶段1V2以及3V3的电源跌落情况做测试

## 测试环境

两只U3相机，其中一只枚举经常失败，问题描述详见CASE 3230941746和[CASE 3239583050](https://secure.cypress.com/myaccount/?id=25&myCase=489394-3239583050)，disable LPM后正常，另外一只相机正常。
 测试仪器：Agilent MSO9254A(OSC) + Agilent N2796A(Probe)
![测试仪器](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fosc-1.jpg)
![测试仪器](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2FOSC-2.jpg)
![测试仪器](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2FOSC-3.jpg)
![测试点](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Ftest_point.png)
![测试点](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fref_wave.jpg)

## 测试结果

### Bad Camera

![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40TXVDDQ-2.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40TXVDDQ-2-2.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40TXVDDQ-2-3.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40AVDD-1.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40RXVDDQ-1.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40TXVDDQ-1.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40VDD1-1.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD1V2%40VDD8-2-2.jpg)
![Bad Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam%2FVDD3V3%40CVDDQ-1.jpg)

### Bad Camera disable LPM

![Bad Camera with disable LPM](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_disLPM%2FVDD1V2%40TXVDDQ-1.jpg)
![Bad Camera with disable LPM](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_disLPM%2FVDD1V2%40TXVDDQ-2.jpg)

### Bad Camera Optimized Power

![Bad Camera Optimized Power](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_OptimizedPower%2FVDD1V2%40AVDDQ-1.jpg)
![Bad Camera Optimized Power](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_OptimizedPower%2FVDD1V2%40RXVDDQ-1.jpg)
![Bad Camera Optimized Power](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_OptimizedPower%2FVDD1V2%40TXVDDQ-1.jpg)
![Bad Camera Optimized Power](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_OptimizedPower%2FVDD1V2%40VDD1-1.jpg)
![Bad Camera Optimized Power](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fbad_cam_OptimizedPower%2FVDD1V2%40VDD8-1.jpg)

### Good Camera

![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD1V2%40AVDDQ-1.jpg)
![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD1V2%40RXVDDQ-1.jpg)
![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD1V2%40TXVDDQ-1.jpg)
![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD1V2%40VDD1-1.jpg)
![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD1V2%40VDD8-1.jpg)
![Good Camera](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fgood_cam%2FVDD3V3%40CVDDQ-1.jpg)

### Cypress DVK

![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C6-1.jpg)
![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C6-1-2.jpg)
![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C6-1-3.jpg)
![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C6-2.jpg)
![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C73-1.jpg)
![Cypress DVK](http://7xq2ld.com1.z0.glb.clouddn.com/prj/mer/1V2@C45-1.jpg)

## 测试结论

1. 所有相机在上电阶段1V2电源都会有跌落，超过100mV的跌落只会出现一次，后面枚举设备不会再出现电源跌落现象；
2. 有问题的相机、没问题的相机和disable LPM后的相机，上电阶段1V2电源跌落没有区别；但是重枚举的结果差异非常大，先异常的相机disable LPM后就正常了![phy-error](http://7xq2ld.com1.z0.glb.clouddn.com/prj%2Fmer%2Fphy-error.png)
3. 我们的单板与《AN70707.pdf》优化后的测量值相当，如果以Vrms为基准的话，跌落值都是110mV左右。；
4. CVDDQ在上电阶段几乎没有跌落；
5. 对1V2电源做优化后，上电时电源跌落在90mV左右，但实际相机还是反复重枚举；
6. 将之前有问题的3014换到cypress开发板上，开发板在intel控制器下也是反复重枚举。
