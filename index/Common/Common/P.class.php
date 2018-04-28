<?php
namespace Sys;

final class P {
    // 防止创建实例
    private function __construct () { }
   
    // 版本定义
    // 系统版本号定义：x.y.z   
    // x:大版本，功能、UI、数据结构有重大改动时变更
    // y:增加或删除功能模块时变更
    // x:小功能变更，批量BUG修复时变更
    // 其他：alpha 开发预览版本  beta 上线公测版本  release最终确定版本
	const  VERSION         =   "1.2.0";
	const  VERSION_CODE    =   "20180201";
	const  VERSION_NAME    =   "中科教";
	const  SYSTEM_NAME     =   "中国科学院科学教育联盟";
    
    
    // 常用参数定义
    const  YES            =    1;   // 是
    const  NO             =    0;   // 否
    const  ENABLE         =    1;   // 允许，启用，可用
    const  DISABLE        =    0;   // 不可用，未开启
    const  SUCCESS        =    0;   // 成功
    const  ERROR          =    -1;  // 失败
    
    // 性别常量
    const  SEX_MALE       =    1;   // 性别 男
    const  SEX_FAMALE     =    2;   // 性别 女
    const  SEX_UNKOWN     =    0;   // 性别 未知
    
    // 页面
    const  PAGE_SIZE      =    15;  //每页记录条数
	
	const  ERROR_MYSQL_ADD_NOT      =  '-1000=数据保存失败';   
	const  ERROR_MYSQL_SAVE_NOT     =  '-1001=数据更新失败';   
	
	//错误对照码
	const  ERROR_EMAIN_CODE_NOT     =   '1000=邮箱验证码不正确';
	const  ERROR_EMAIN_ACCOUNT_NOT  =   '1001=邮箱已被注册';
	const  ERROR_EMAIN_SEND_NOT     =   '1002=邮件发送失败';
	const  ERROR_EMAIN_SEND_FAST    =   '1003=邮件发送过于频繁';
	const  ERROR_ACCOUNT_NOT        =   '2000=用户不存在';
	const  ERROR_USER_PWD_NOT       =   '2001=邮箱或者密码错误';
	const  ERROR_ACCOUNT_STATUS_NO  =   '2002=账户不可用';
	const  ERROR_TRAIN_OPEN         =   '3000=课程已开课了，无法报名';
	const  ERROR_TRAIN_REPEAT       =   '3001=您已经报过名了';
	const  ERROR_TRAIN_NOT          =   '3002=无效课程，无法报名';
	const  ERROR_TRAIN_REPEAT_NOT   =   '3003=您还没报名，取消失败';
	const  ERROR_CANCEL_REPEAT      =   '3004=您已经取消过了哦';
	const  ERROR_CANCEL_OPEN        =   '3005=课程已开课，取消失败';
	const  ERROR_TRAIN_CANCEL_NOT   =   '3006=无效课程，取消失败';
	const  ERROR_QUIZ_REPEAT        =   '4000=您已经提过该问题了';
	const  ERROR_ANSWER_NOT         =   '5000=交卷失败';
	const  ERROR_ANSWER_MORE        =   '5001=答题次数超限';
	const  ERROR_COMMENT_NOT        =   '6000=未获取到评价信息';
	const  ERROR_COMMENT_REPEAT     =   '6001=无需重复评价';
	const  ERROR_VOTE_REPEAT        =   '6002=您已经投过票了';
	const  ERROR_UPLOAD_NOT         =   '7000=上传失败';

    const  TYPE_RES                 =   2;  //素材类型为资源
    const  TYPE_MOREPIC_RES         =   3;  //素材类型为资源(多图片,类似于科研院所)
    const  TYPE_PIC_NEWS            =   4;  //素材类型为大图新闻(内容为一张大图,纯图片)
    const  TYPE_TRAVEL_NEWS         =  14; //旅游文章
    const  TYPE_SCIENCE             =    9;  //科学课程(表格类型)
    
}


