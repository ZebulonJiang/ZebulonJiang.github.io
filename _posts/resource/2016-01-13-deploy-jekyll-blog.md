---
layout: post
title: 用Jekyll和GitHub搭建自己的Blog[1]
subtitle:   初识Jekyll的运行环境
date:       2016-01-13
author:     "Zebulon"
category:  技术
tags:
    - jekyll
keywords:
    - Jekyll,
    - Jekyll+GitHub 
description: 利用GitHub＋Jekyll搭建一个免费的Blog。
header-img: /res/blog%2Fpost-img%2Fbookshelf.jpg
---
* content  
{:toc} 

## 介绍

### GitHub Pages
GitHub就不多说了，世界上最大也是最流行的代码托管仓库，[GitHub官网](www.github.com)地址。

### Jekyll
Jekyll主要用于生成静态页面，它可以根据配置项将你的**Markdown**文件（不限于Markdown）“编译”成静态的HTML文件。

* [项目位置](https://github.com/mojombo/jekyll)
* [项目Wiki](https://github.com/mojombo/jekyll/wiki)

### Why?
[GitHub Pages](https://pages.github.com/)作为一个免费的代码托管站点，无限空间、无限流量可以说业界良心。web服务器＋代码托管让你省去了不少的麻烦。

[Jekyll](http://jekyllrb.com/)不用再多说了，加上GitHub Pages简直就是**完美** **完美** **完美**

---


## 安装步骤

### GitHub账号
首先，你需要拥有一个GitHub账号，已经拥有账号的童鞋，请直接创建pages仓库，并命名为**username**.github.io;具体的步骤请参考 **[GitHub官网步骤](https://pages.github.com/)**.

### 本地环境
我搭建本地环境主要是为了开发用，因为开发阶段总不能一直push push来看效果吧。在本地搭建一个jekyll运行环境，修改站点文件后，能很快看到演示效果。怎么搭建一个jekyll的本地环境网上资料很多，就不赘述了，在安装Jekyll前，你需要在你机器（无论是windows、mac还是linux）上安装**[Ruby](http://www.ruby-lang.org/en/documentation/installation/)**，然后用Gems安装Jekyll，**[Jekyll安装流程](http://jekyllrb.com/docs/installation/)**.

### 好的主题
如果你是一个web程序猿，相信好的主题对你来说小case，对web不是很熟的同学，完全可以从别人那fork一个自己喜欢的主题，[推荐主题站点](http://jekyllthemes.org/);主题下载下来后，你可以直接到项目路径，运行

```jekyll serve``` (如遇权限不足，请在前面加上sudo)
如果没有报错,你就可以通过localhost:4000来预览主题啦。

![jekyll正常运行](/res/blog/post-img/jekyll serve.png)

### 修改配置
修改配置[官网](http://jekyllrb.com/docs/structure/)也讲的非常清楚了，大家可以看文档自己修改一下。今天太晚了，下次我会专门写一篇文章介绍Jekyll配置吧。


---

## 总结
想要完成一个免费Blog的搭建，你只需要执行以下几个步骤：

1. 拥有一个GitHub账号；
2. 本地安装ruby ＋ Jekyll；
3. 选择一个自己喜欢的主题；
4. 修改项目配置，在_post目录下编辑自己的文章；
5. push到GitHub

---

## 下篇预告
下篇文章主要讲讲jekyll的配置和部署吧。大家晚安。


