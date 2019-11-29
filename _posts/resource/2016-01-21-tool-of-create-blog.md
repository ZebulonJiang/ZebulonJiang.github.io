---
layout: post
title: 写博客常用工具 @Jekyll
subtitle:   
date:       2016-01-21
author:     "Zebulon"
category:  资源
tags:
    - jekyll
keywords:
    - markdown编辑器,
    - 图床,
    - mou
description: 讲述如何快捷方便的创建自己的博客。推荐一些非常好用的编辑器。让你事半功倍。
header-img: /res/blog/post-img/template.png
---
* content  
{:toc} 

## 前言

Markdown 是一种简单的、轻量级的标记语法。用户可以使用简单的标记符号以最小的输入代价生成极富表现力的文档。

Markdown具有很多***优点***：

- 排版简单，通过一些简单的标记字符，轻松完成页面排版。你不用花太多的时间在格式排版上。尽情地享受码字给你带来的快乐吧。
- 格式转换方便，可以轻松转化成html、pdf；
- 可以保存称纯文本

## 编辑器

Markdown的编辑器非常多

- 在线编辑器，如[简书](http://www.jianshu.com/)，[worktile](http://www.worktile.com)等等。
- 编辑器应用程序，如[mou](http://25.io/mou/) 、[Markdownpad](http://markdownpad.com/)等等。
- 其他类型。主要是其他的文本编辑器 or 笔记管理软件自带markdown编辑器。如[为知笔记](http://www.wiz.cn/)。
今天我给大家推荐几个自己常用的mMrkdown编辑器。

### osX

[mou](http://25.io/mou/) 是一个OS X下的非常好用的Markdown编辑器。其具有以下特性：

- 实时预览
- 同步滚动
- 自动保存
- 自动补全
- 定制主题以
- CSS/HTML/PDF格式导出文件
- 支持在编辑器内内联HTML代码

![mou](/res/blog/post-img/mou.png)

### Win

如果在win下，打开一现有的markdown文件修改，我一般会使用[Markdownpad](http://markdownpad.com/)。一边编辑一边预览的效果还是很棒的。
![Markdownpad](/res/blog/post-img/markdownpad2.png)

### 其它

一般情况我会用[为知笔记](http://www.wiz.cn/)做日常工作笔记，通常一些博客素材也会用[为知笔记](http://www.wiz.cn/)来写。整体来说[为知笔记](http://www.wiz.cn/)笔记在文字编辑体验还不错。多终端同步也比较方便。

![为知笔记markdown](/res/blog/post-img/wiz.gif)

除了使用[为知笔记](http://www.wiz.cn/)偶尔也会用[sublime](http://www.sublimetext.com/)写markdown。譬如需要修改网页的一些东西，打开了整个工程。顺便就用sublime把blog也可以写了。

## 图床工具

如果你用在线的markdown编辑器。也许就不用担心图床问题。一般在线编辑器都提供图床。你可以直接插入图片。但是如果你是本地的markdwon文件，则需要找一个可靠的图床，虽然很多在线的编辑器都提供稳定的图床，在你的网站也可以直接引用。譬如[worktile](http://www.worktile.com)。你完全可以在上面写文章，然后同步到你自己的网站上，都没有问题。
但是在这里我还是要推荐[七牛云存储](http://www.qiniu.com/)。[注册七牛账户](https://portal.qiniu.com/signup?code=3lqda82g9fuqa)后，认证成为标准用户，你将拥有以下资源：

- 10GB永久免费存储空间
- 每月10GB下载流量
- 每月10万次Put请求 
- 每月100万次Get请求

对于个人博客和小型网站，这个免费的额度已经足够使用了，如果真的超了，价格也不贵。完全可以接受。

![七牛云存储](/res/blog/post-img/qiniu.png)

如果你也用[七牛云存储](http://www.qiniu.com/)做图床，那么我强烈推荐[七牛chrome插件](https://chrome.google.com/webstore/detail/emmfkgdgapbjphdolealbojmcmnphdcc) ，谷歌商店上安装，如果下载不了，请自行出轨安装。

![七牛chrome插件](/res/blog/post-img/qiniu-chrome2.gif)

有了chrome插件上传图片到七牛就方便多了。上传后将url拷贝到markdown中引用即可。

## 创建模板

使用Jekyll写blog的头部会用到[YAML标记符](http://jekyllrb.com/docs/frontmatter/)，如果每次都敲一遍，非常的费事，所以我想着用脚本自动添加一个头部，顺便自动命名文件。我实现的基本思路是

- 创建一个模板
-  用脚本拷贝模板到_posts目录
- 脚本获取当前时间，替换模板中的date
- 将当前时间添加到文件名中去。

以下是我的脚本

```
#!/bin/sh
filename=$(date +%Y-%m-%d)-$1    #将传入的文件名与日期拼成一个新的文件名
cd /Users/robin/prj/web/coffeboy   #进入到项目路径
from_path="./"
to_path="./_posts/"
cp -i  ${from_path}.postTemplate.md  ${to_path}${filename}.md   #拷贝一个模版文件
echo "new a blog: ${filename}.md"   #输出一下文件信息
cd _posts
sed   "s/replaceDate/$(date +%Y-%m-%d)/g" ${filename}.md>${filename}.mdg  #替换里面的日期
mv ${filename}.mdg ${filename}.md   #将修改日期后的文件覆盖到新建文件

```

以下是我写blog的头部模板

```
---
layout:      post
title:       
subtitle:    
date:        replaceDate  #replaceDate  是用来动态替换日期用
author:      Zebulon
category:    
tags:        
keywords:    
description: 
header-img:  
---

#下面是生成目录用的
* content  
{:toc} 

```
为了方便，我会在系统环境变量中添加一个自定义命令。`alias newblog='YOUR_PATH/newblog.sh'`。这样就可以直接通过命令`newblog BLOGNAME`在_posts下生成一个YY-MM-DD-BLOGNAME.md的模板文件。
还是挺方便的
![自动生成模版](/res/blog/post-img/template.gif)

## 下篇预告

讲完了blog常用工具，下期给大家分享一下出轨工具吧。敬请期待。
