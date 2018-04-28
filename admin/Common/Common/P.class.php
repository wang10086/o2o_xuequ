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
	const  VERSION         =   "1.0.1";
	const  VERSION_CODE    =   "20170605";
	const  VERSION_NAME    =   "";
	const  SYSTEM_NAME     =   "中科教科学教育平台";
    
    
    // 常用参数定义
    const  YES            =    1;   // 是
    const  NO             =    0;   // 否
    const  ENABLE         =    1;   // 允许，启用，可用
    const  DISABLE        =    0;   // 不可用，未开启
    const  SUCCESS        =    0;   // 成功
    const  ERROR          =    -1;  // 失败
	
		//素材类型
	const  TYPE_NEWS      =    1;  //素材类型为文章图片
	const  TYPE_RES       =    2;  //素材类型为资源
	const  TYPE_MOREPIC_RES=   3;  //素材类型为资源(多图片,类似于科研院所)
	const  TYPE_PIC_NEWS  =    4;  //素材类型为大图新闻(内容为一张大图,纯图片)
	const  TYPE_SCIENCE   =    9;  //科学课程(表格类型)
	const  TYPE_GOODS     =    10; //游学线路
	const  TYPE_PRODUCT   =    11; //实体商品
	const  TYPE_SCI       =    12; //科技节产品
    const  TYPE_DOOGS_DAY =    13; //线路日程图片
    const  TYPE_TRAVEL_NEWS=   14; //旅游文章

    const  TYPE_UNION           = 15; //联盟网站文章
    const  TYPE_UNION_MOREPIC   = 17; //联盟网站多图文章
    const  TYPE_UNION_UPLOAD    = 16; //联盟网站上传文件(资料下载)
    const  TYPE_UNION_POLICY    = 18; //联盟网站上传文件(政策文件)
    const  TYPE_UNION_NOTIFY    = 19; //联盟网站上传文件(通知公告)
    const  TYPE_UNION_MOVE      = 20; //联盟网站上传文件(视频文件)

    const  TYPE_EXPERT          = 21; //老专家网站新闻管理

    
    // 性别常量
    const  SEX_MALE       =    1;   // 性别 男
    const  SEX_FAMALE     =    2;   // 性别 女
    const  SEX_UNKOWN     =    0;   // 性别 未知
    
    // 页面
    const  PAGE_SIZE      =    15;  //每页记录条数
	
	
	const  ERROR_MYSQL_ADD_NOT      =  '-1000=数据保存失败';   
	const  ERROR_MYSQL_SAVE_NOT     =  '-1001=数据更新失败';   
	
	const  ERROR_NOT_DATA           =  '1000=暂无提交数据';
	
    
}


