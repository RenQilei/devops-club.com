<p align="center">devops-club.com</p>

<p align="center">
<a href="https://travis-ci.org/RenQilei/devops-club.com"><img src="https://api.travis-ci.org/RenQilei/devops-club.com.svg" alt="Build Status"></a>
</p>

# 使用步骤

首次使用该项目可将其克隆至本地或服务器，如已克隆则拉取最新代码：

```
# clone
git clone https://github.com/RenQilei/devops-club.com.git
# pull
git pull
```

获取全部 composer 依赖包，生产环境添加 ```--no-dev```：

```
composer install --no-dev
```

数据库迁移，以获得最新数据库环境：
```
php artisan migrate
```

目前，两个 HTTP 请求用于创建初始化分类和角色信息，如需可以修改相关控制器后在访问创建：

```
# 生成初始化分类
http://[your.domain]/category/add
# 生成初始化用户角色
http://[your.domain]/user/role/permission/add
```

# composer 第三方依赖包
* 支持redis：```predis/predis```。官方文档如是说，没毛病。
* UUID生成器：```webpatser/laravel-uuid```。
* RBAC：```klaravel/ntrust```。该包源于 ```Zizaco/entrust```，但后者貌似很久未更新了。

# 其它依赖项目
* [pure](https://purecss.io/)
* [normalize.css](http://necolas.github.io/normalize.css/)
* [font-awesome](http://fontawesome.io/)
* [jquery](http://jquery.com/)
* [vue.js](https://cn.vuejs.org/)
* [highlight.js](https://highlightjs.org/)