---
layout: post
title: 用Jekyll和GitHub搭建自己的Blog[2]
subtitle:   自己配置jekyll项目
date:       2016-01-15 
author:     "Zebulon"
category:  技术
tags:
    - jekyll
keywords:
    - Jekyll,
    - Jekyll+GitHub 
description: 利用GitHub＋Jekyll搭建一个免费的Blog。
header-img: /res/blog%2Fpost-img%2Fdamselfly.jpg
---
* content  
{:toc} 

## 配置jekyll

### jekyll目录结构
用`jekyll new projectname` 一个项目时，默认的文件结构如[官网](http://jekyllrb.com/docs/structure/) 所示:

```
.
├── _config.yml    #项目的配置文件，可以定义工程的基本信息、插件、自定义的宏变量等等
├── _drafts   #草稿箱，有空时你可以多写一些blog，然后慢慢发表，可以先放草稿箱，草稿箱的文件没有署名日期。
|   ├── begin-with-the-crazy-ideas.textile
|   └── on-simplicity-in-technology.markdown
├── _includes   #公共布局模板文件，譬如nav header foot等等这些可能是每个页面都需要包含的，这样方便维护。
|   ├── footer.html
|   └── header.html
├── _layouts    #布局模板。不同的页面可以选择不同的布局模板。
|   ├── default.html
|   └── post.html
├── _posts    #blog文章。格式必须要符合: YEAR-MONTH-DAY-title.MARKUP。通常我们用md结尾表示markdown
|   ├── 2007-10-29-why-every-programmer-should-play-nethack.textile
|   └── 2009-04-26-barcamp-boston-4-roundup.textile
├── _data  #额，这个我也没用到过。等用到了再跟大家说吧。
|   └── members.yml
├── _site  #生成的静态页面存放的目录。如果你要部署到自己的服务器，请将web的根路径设置到_site下。
├── .jekyll-metadata
└── index.html #根目录下的.html只要你选择了layouts布局，jekyll都会帮你转换成静态页面。index通常转成首页。
```

### 我的blog目录结构

```
│  .gitignore  #git 忽略文件配置
│  .postTemplate.md  #我自己用的脚本文件，用jekyll生成blog，每篇都有一些固定的格式，用脚本生成比较方便。
│  404.html     #404页面，不解释，大家都清楚
│  category.html   #分类页面
│  CNAME  #域名解析文件，譬如你部署在github，自定义的域名只需要填入这个文件即可
│  feed.xml  #RSS相关的，我暂时没用到
│  index.html  #首页
│  LICENSE
│  README.md #readme
│  tags.html  #标签页面
│  _config.yml   #配置文件
├─css  #静态CSS文件夹
│      
├─fonts  #字体文件夹。
│      glyphicons-halflings-regular.eot
│      glyphicons-halflings-regular.svg
│      glyphicons-halflings-regular.ttf
│      glyphicons-halflings-regular.woff
│      glyphicons-halflings-regular.woff2
│              
├─js #JS文件夹
│      bootstrap.js
│      bootstrap.min.js
│      
│      
├─_includes  #公共布局文件
│      footer.html
│      head.html
│      nav.html
│      
├─_layouts  #布局样式表
│      default.html
│      keynote.html
│      page.html
│      post.html
│      
├─_posts  #blog文件夹
│      2016-01-10-hello-Zebulon.md
│      2016-01-13-deploy-jekyll-blog.md
│      
└─_site #静态站点文件夹
```

### 我的配置文件

```
# Site settings
title: Zebulon
SEOTitle: Zebulon Blog
header-img: /res/blog/img/waterfall-1081997_1920.jpg #头部图片
default-img: /res%2Fblog%2Fimg%2Fhome-bg2.jpg  #默认图片
email: Zebulon.Jiang@gmail.com
description: "一名硬件工程师的个人blog，在这里你不但可以看到好玩的智能硬件，还能看到web的的身影。"
keywords: "Jekyll 智能硬件 电子diy laravel php"
url: "http://coffeboy.com"              # your host, for absolute URL
baseurl: ""                             # for example, '/blog' if your blog hosted on 'host/blog'

# SNS settings
RSS: false
weibo_username:     jzb8736
github_username:    Zebulonjiang
zhihu_username:     zebulon.jiang
#twitter_username:  
#facebook_username:  

# Build settings
highlighter: pygments
permalink: /:year/:month/:day/:title/
#permalink: pretty
gems: [jekyll-paginate]
paginate: 10
exclude: ["less","node_modules","Gruntfile.js","package.json","README.md"]
anchorjs: true                          # if you want to customize anchor. check out line:181 of `post.html`

# Markdown settings
# replace redcarpet to kramdown,
# although redcarpet can auto highlight code, the lack of header-id make the catalog impossible, so I switch to kramdown
# document: http://jekyllrb.com/docs/configuration/#kramdown
markdown: kramdown
kramdown:
  input: GFM                            # use Github Flavored Markdown !important

# Disqus settings
#disqus_username: _your_disqus_short_name_

# Duoshuo settings
duoshuo_username: coffeboy
# Share component is depend on Comment so we can NOT use share only.
duoshuo_share: true                     # set to false if you want to use Comment without Sharing

# Analytics settings
# Baidu Analytics
##ba_track_id: 
# Google Analytics
##ga_track_id: ''            # Format: UA-xxxxxx-xx
##ga_domain:         

# Sidebar settings
sidebar: true                           # whether or not using Sidebar.
sidebar-about-description: "做一个自由的人、潇洒地周游世界"
sidebar-avatar: /res/blog/img/avatar2.png      # use absolute URL, seeing it's used in both `/` and `/about/`

# Featured Tags
featured-tags: true                     # whether or not using Feature-Tags
featured-condition-size: 0              # A tag will be featured if the size of it is more than this condition value

# Friends
friends: [
    {
        title: "MicroRTL",
        href: "http://micrortl.com/"
    }
]

```

这个配置其他的不想多说，大家都能看明白。我主要讲一下以下两点
1. `permalink: /:year/:month/:day/:title/` 这个配置，你可能在很多不同项目有不同的配置方法。譬如 `#permalink: pretty`  或者 `permalink: /:year/:month/:day/:title.html`  但是这两个配置很可能生成的url在你的服务器上就会有问题。如果有url not found，请修改一下这个配置。
2. 关于插件使用，当你fork一个项目，然后准备运行时，很多时候会提示缺少某个插件，最多的就是paginate分页。如果你也碰到这个错误，首先安装`jekyll-paginate`运行命令`gem install jekyll-paginate`，然后在配置文件中加上一下部分。
```
gems: [jekyll-paginate]   #引入分页插件
paginate: 10   #每页的数量。
```

## 部署

### 部署到github

如果你打算将blog部署到[GitHub](www.github.com)，ok ，很简单，你只需在CNAME 文件中填上自己的域名，然后将代码push到 ***username.github.io***仓库里。在域名解析控制台将解析记录指向github即可。

### 部署到自己的服务器

如果你自己有服务器，并且有其他网站同时运行。你可以将jekyll项目部署到自己的服务器，只需要将域名对应网站根目录设置到_site目录即可。
***注意:***
1. 服务器上要[安装jekyll](http://www.coffeboy.com/2016/01/14/deploy-jekyll-blog/)的环境；
2. 每次代码上传后，都需要运行`jekyll build`  或者 `jekyll serve`，权限不够加sudo。

## 下篇预告

到这里，jekyll的配置就差不多了，你应该可以独立配置和部署一个jekyll项目了。下一篇我准备给大家讲讲用jekyll写blog用到的一些工具。譬如markdown工具、图床使用。Happy Coding。




