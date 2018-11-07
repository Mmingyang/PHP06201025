# ELE点餐平台

## 项目介绍

整个系统分为三个不同的网站，分别是 

- 平台：网站管理者 admin
- 商户：入住平台的餐馆  shop
- 用户：订餐的用户 user

## Day01

### 开发任务

#### 平台端 

- 商家分类管理 （admin）
- 商家管理  (admin)
- 商家审核 (admin)

#### 商户端 

- 商家注册 (shop)

#### 要求 

- 商家注册时，同步填写商家信息，商家账号和密码 
- 商家注册后，需要平台审核通过，账号才能使用 
- 平台可以直接添加商家信息和账户，默认已审核通过

### 实现步骤

1. 下载命令

   ```php
   composer create-project --prefer-dist laravel/laravel elm "5.5.*" -vvv
   ```

2. 配置虚拟主机

3. 配置env

4. 配置汉化包

5. 数据迁移

6. 建立模型

7. 想思路

## day02

### 开发任务

- 完善day1的功能，要用事务保证同时删除用户和店铺，删除图片
- 平台：平台管理员账号管理
- 平台：管理员登录和注销功能，修改个人密码(参考微信修改密码功能)
- 平台：商户账号管理，重置商户密码
- 商户端：商户登录和注销功能，修改个人密码
- 修改个人密码需要用到验证密码功能,[参考文档](https://laravel-china.org/docs/laravel/5.5/hashing)
- 商户登录正常登录，登录之后判断店铺状态是否为1，不为1不能做任何操作

### 实现步骤

1. 在商户端口和平台端都要创建BaseController 以后都要继承自己的BaseController

2. 商户的登录和以前一样

3. 平台的登录，模型中必需继承 use Illuminate\Foundation\Auth\User as Authenticatable

4. 设置配置文件config/auth.php

5. 平台登录的时候

6. 平台AUTH权限判断

7. 设置认证失败后回跳地址

8. 想思路

# day03

### 开发任务

#### 商户端 

- 菜品分类管理 
- 菜品管理 

#### 要求

- 一个商户只能有且仅有一个默认菜品分类 
- 只能删除空菜品分类 
- 必须登录才能管理商户后台（使用中间件实现） 
- 可以按菜品分类显示该分类下的菜品列表 
- 可以根据条件（按菜品名称和价格区间）搜索菜品

### 数据表设计

### 实现步骤

1. 百度

2. 想

3. 问

4. 看

# day04

### 开发任务

优化 - 将网站图片上传到阿里云OSS对象存储服务，以减轻服务器压力(<https://github.com/jacobcyl/Aliyun-oss-storage>) - 使用webuploder图片上传插件，提升用户上传图片体验

平台 - 平台活动管理（活动列表可按条件筛选 未开始/进行中/已结束 的活动） - 活动内容使用ueditor内容编辑器(<https://github.com/overtrue/laravel-ueditor>)

商户端 - 查看平台活动（活动列表和活动详情） - 活动列表不显示已结束的活动

### 数据表设计

### 实现步骤

1. 百度

2. 想

3. 问

4. 看

# day05
### 开发任务

商家列表接口(支持商家搜索)

获取指定商家接口

实现步骤

### 实现步骤

1. https://www.showdoc.cc/Myang?page_id=1065007876894245

2. https://www.showdoc.cc/Myang?page_id=1065099112977989

# Day06

## 开发任务

接口开发

- 用户注册
- 用户登录
- 忘记密码
- 发送短信 要求
- 创建会员表
- 短信验证码发送成功后,保存到redis,并设置有效期5分钟
- 用户注册时,从redis取出验证码进行验证

## 实现步骤

1.短信发送

```php
 //发送
        $config = [
            'access_key' => env("ALIYUN_ACCESS_ID"),
            'access_secret' => env("ALIYUN_ACCESS_KEY"),
            'sign_name' => '个人学习分享',
        ];
```
2.短信验证码发送成功后,保存到redis,并设置有效期5分钟
```php
Redis::set("tel_".$tel,$code);
Redis::expire("tel_".$tel,60*5);
```

3.会员注册实现
```php
public function reg(Request $request)
    {
        $data=$request->post();

        $sms=$data['sms'];
        $sm=Redis::get("tel_".$data['tel']);

        $data['password']=Hash::make($request->password);

        if($sms==$sm){

            Member::create($data);
            $data = [
                'status' => "true",
                'message' => "注册成功 请登录",
            ];
        }else{
            $data = [
                'status' => false,
                'message' => "注册失败",

            ];
        }

        return $data;

    }
```
4.会员实现登录
```php
 public function login()
    {

        //接收数据
        $name=\request()->name;
        $password=\request()->password;

        //判断
        $member=Member::where('username',$name)->first();

        if($member && Hash::check($password,$member->password)){

            $data = [
                'status' => "true",
                'message' => "登录成功",
                'username' => $name,
            ];

        }else{

            $data = [
                'status' => false,
                'message' => "登录失败",
            ];

        }

        return $data;

    }
```
5.忘记密码
```php
 public function forget(Request $request)
    {
        //接收参数
        $data=$request->post();
        $sms=$data['sms'];
        $sm=Redis::get("tel_".$data['tel']);
        //密码加密
        $data['password']=Hash::make($request->password);
        //电话号码为接收的电话号码
        $tel=$data['tel'];
//        dd($data['tel']);
        if($sms==$sm){
            //查找条件为电话号码的一条数据
            $member=Member::where('tel',$tel)->first();
     
            if($member->update($data)){
                $data = [
                    'status' => "true",
                    'message' => "重置成功",
                ];
            }else{
                $data = [
                    'status' => false,
                    'message' => "重置失败",
                ];
            }

        }else{
            $data = [
                'status' => false,
                'message' => "重置失败",
            ];
        }

        return $data;
    }
```
# day07

## 开发任务

1. 用户地址管理相关接口

2. 购物车相关接口

### 实现步骤


1. 用户地址管理相关接口
```html
1. https://www.showdoc.cc/Myang?page_id=1080408729668261
2. https://www.showdoc.cc/Myang?page_id=1080413882636883
3. https://www.showdoc.cc/Myang?page_id=1080444191825026
```
2. 购物车相关接口

# day08

## 开发任务

1. 订单接口(使用事务保证订单和订单商品表同时写入成功)
2. 密码修改和重置密码接口

# day09
## 开发任务
### 商户端

订单管理[订单列表,查看订单,取消订单,发货]

订单量统计[按日统计,按月统计,累计]（每日、每月、总计）

菜品销量统计[按日统计,按月统计,累计]（每日、每月、总计）

### 平台

订单量统计[按商家分别统计和整体统计]（每日、每月、总计）

菜品销量统计[按商家分别统计和整体统计]（每日、每月、总计）

会员管理[会员列表,查询会员,查看会员信息,禁用会员账号]

# day10

## 开发任务

### 平台

权限管理

角色管理[添加角色时,给角色关联权限]

管理员管理[添加和修改管理员时,修改管理员的角色]

# day11

## 开发任务

### 平台

导航菜单管理

根据权限显示菜单

配置RBAC权限管理

### 商家

发送邮件(商家审核通过,以及有订单产生时,给商家发送邮件提醒)用户

下单成功时,给用户发送手机短信提醒
