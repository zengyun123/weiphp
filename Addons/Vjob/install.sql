﻿CREATE TABLE IF NOT EXISTS `wp_vjob` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`welfare`  varchar(100) NOT NULL  DEFAULT '包吃' COMMENT '吃住待遇',
`area`  varchar(6) NOT NULL  COMMENT '工作地点',
`qualifications`  text NOT NULL  COMMENT '任职资格',
`contacts`  varchar(50)  NULL  COMMENT '联系人 ',
`mobile`  varchar(255) NOT NULL  COMMENT '联系电话',
`address`  text NULL  COMMENT '联系地址',
`gender`  char(10) NOT NULL  DEFAULT '不限制' COMMENT '性别要求',
`cTime`  int(10) NOT NULL  COMMENT '发布时间',
`education`  char(50) NOT NULL  DEFAULT '不限' COMMENT '学历要求',
`experience`  char(50) NOT NULL  DEFAULT '不限' COMMENT '工作年限 ',
`description`  text NOT NULL  COMMENT '岗位职责',
`cover`  int(10) UNSIGNED NOT NULL  COMMENT '封面图片',
`culture`  text NOT NULL  COMMENT '企业文化',
`salary`  char(50) NOT NULL  DEFAULT '面议' COMMENT '每月薪资 ',
`number`  int(10) NOT NULL  DEFAULT 1 COMMENT '招聘人数',
`title`  varchar(100) NOT NULL  COMMENT '职位名称',
`keyword`  varchar(50) NOT NULL  COMMENT '关键词',
`token`  varchar(255) NOT NULL  COMMENT 'Token',
`intro`  text NOT NULL  COMMENT '封面简介',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_vjob` (`id`,`token`,`title`,`keyword`,`cover`,`description`,`number`,`cTime`,`education`,`experience`,`salary`,`qualifications`,`contacts`,`mobile`,`address`,`gender`,`culture`,`area`,`welfare`,`intro`) VALUES ('1','5555533333','急聘平面设计美工多名','平面','369','1、参与公司装饰工程项目的设计管理，提出设计意见；\r\n<br>\r\n2、负责装修施工质量管理、招投标管理；\r\n<br>\r\n3、参加方案设计、初步设计、施工图设计审核；制定项目设计计划及设计任务书；\r\n<br>\r\n4、参加市场调研，编制本系统相关技术经济方案；\r\n<br>\r\n5、负责对项目进行跟踪和监督；\r\n<br>\r\n6、设计师应协助材料部对装修项目材料进行确认工作；\r\n<br>\r\n7、负责案例，技术及资源的整理；\r\n<br>\r\n8、配合项目经理制定工作进度。','55','1403781300','高中','10年以上','5000-8000元','1、装饰设计、室内设计等相关专业本科以上学历；\r\n<br>\r\n2、两年以上相关工作经验，有大中型项目设计经验者优先考虑；\r\n<br>\r\n3、有较强的视觉搭配能力，能熟练操作AutoCAD、、PowerPoint、Photoshop、等软件；\r\n<br>\r\n4、学习能力强、热爱设计工作、有创新精神；<br>\r\n5、善于沟通，表达能力强，有团队精神；\r\n<br>\r\n6、富有创意及执行力，有责任感、表达能力强。\r\n<br>\r\n工作时间：9:00-18:00','张小姐','2147483647','中国东山省','女性','      人生的路上，我们都在奔跑，我们总是在赶超一些人，也总是在被一些人去超越。人生的秘诀，就是寻找一种最适合自己的速度，莫因疾进而不堪重荷，莫要因迟缓而去空耗生命。水过无声，泥泞留痕。人生也许不尽完美，正因为不完美，我们才需要不断地努力创造努力奋斗。','浦东区','包吃,包住','');
INSERT INTO `wp_vjob` (`id`,`token`,`title`,`keyword`,`cover`,`description`,`number`,`cTime`,`education`,`experience`,`salary`,`qualifications`,`contacts`,`mobile`,`address`,`gender`,`culture`,`area`,`welfare`,`intro`) VALUES ('2','5555533333','招PHP程序员多名','程序员','0','这里要求要说点么子','66','0','不限','不限','面议','说不说还不是那样','小老三','1896987689','地球人日本村','0','','','自理','');
INSERT INTO `wp_vjob` (`id`,`token`,`title`,`keyword`,`cover`,`description`,`number`,`cTime`,`education`,`experience`,`salary`,`qualifications`,`contacts`,`mobile`,`address`,`gender`,`culture`,`area`,`welfare`,`intro`) VALUES ('4','5555533333','高薪招聘运营经理一名','CEO','0','','1','0','不限','不限','面议','','11111111','111111111111','11111111111111','0','','','自理','');
INSERT INTO `wp_vjob` (`id`,`token`,`title`,`keyword`,`cover`,`description`,`number`,`cTime`,`education`,`experience`,`salary`,`qualifications`,`contacts`,`mobile`,`address`,`gender`,`culture`,`area`,`welfare`,`intro`) VALUES ('5','','看看','什么不什么','370','能行么','1','0','中专','3-5年','面议','瞠好','奇才','5235235325','42523532','不限制','好好','那坦克','自理','');
INSERT INTO `wp_vjob` (`id`,`token`,`title`,`keyword`,`cover`,`description`,`number`,`cTime`,`education`,`experience`,`salary`,`qualifications`,`contacts`,`mobile`,`address`,`gender`,`culture`,`area`,`welfare`,`intro`) VALUES ('6','5555533333','666666666666666','666666666','373','','1','0','不限','不限','面议','888888888','6666666666666','66666666666','66666666666666','不限制','6666','666666','自理','4444444');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('vjob','微招聘招聘表','0','','1','{"1":["keyword","intro","cover","title","number","gender","education","experience","welfare","area","salary","culture","description","qualifications","contacts","address","mobile","cTime"]}','1:基础','','','','','id:招聘ID\r\nkeyword:关键词\r\ntitle:招聘职位\r\nnumber:招聘人数\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,show?id=[id]&target=_blank|预览','10','title','','1403702100','1403790437','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('welfare','吃住待遇','varchar(100) NOT NULL','checkbox','包吃','','1','包吃:包吃\r\n包住:包住\r\n自理:自理','0','0','1','1403789927','1403726322','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('area','工作地点','varchar(6) NOT NULL','string','','如：城厢区','1','','0','0','1','1403726369','1403726111','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('qualifications','任职资格','text NOT NULL','textarea','','支持HTML换行符','1','','0','0','1','1403789756','1403712615','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('contacts','联系人 ','varchar(50)  NULL','string','','','1','','0','1','1','1403712681','1403712681','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('mobile','联系电话','varchar(255) NOT NULL','string','','','1','','0','1','1','1403716766','1403712736','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('address','联系地址','text NULL','string','','','1','','0','1','1','1403716327','1403712787','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('gender','性别要求','char(10) NOT NULL','radio','不限制','','1','不限制:不限制\r\n女性:女性\r\n男性:男性','0','0','1','1403724463','1403723998','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cTime','发布时间','int(10) NOT NULL','datetime','','','1','','0','0','1','1403781306','1403711256','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('education','学历要求','char(50) NOT NULL','select','不限','','1','不限:不限\r\n中专:中专\r\n高中:高中\r\n大专:大专\r\n本科:本科\r\n硕士:硕士\r\n博士:博士','0','0','1','1403724617','1403712068','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('experience','工作年限 ','char(50) NOT NULL','select','不限','','1','不限:不限\r\n1-2年:1-2年\r\n3-5年:3-5年\r\n6-8年:6-8年\r\n10年以上:10年以上\r\n可应届生:可应届生','0','0','1','1403724675','1403712278','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('description','岗位职责','text NOT NULL','textarea','','支持HTML换行符','1','','0','0','1','1403789721','1403706202','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cover','封面图片','int(10) UNSIGNED NOT NULL','picture','','支持JPG、PNG格式，较好的效果为大图360*200，小图200*200','1','','0','0','1','1403780762','1403705315','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('culture','企业文化','text NOT NULL','textarea','','一段好的企业文化更能激励应聘者加入','1','','0','0','1','1403725148','1403725148','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('salary','每月薪资 ','char(50) NOT NULL','select','面议','','1','面议:面议\r\n1000元以:1000元以下\r\n1000-2000元:1000-2000元\r\n2000-3000元:2000-3000元\r\n3000-5000元:3000-5000元\r\n5000-8000元:5000-8000元\r\n8000-12000元:8000-12000元\r\n12000-50000元:12000-50000元\r\n50000-90000元:50000-90000元\r\n100000元以上:100000元以上','0','0','1','1403724570','1403712540','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('number','招聘人数','int(10) NOT NULL','num','1','','1','','0','0','1','1403706382','1403706382','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','职位名称','varchar(100) NOT NULL','string','','请填写您的招聘岗位信息，如：急聘平面设计多名','1','','0','1','1','1403709550','1403704863','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('keyword','关键词','varchar(50) NOT NULL','string','','用户在微信里回复此关键词将会触发此招聘信息。','1','','0','1','1','1403704951','1403704951','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','Token','varchar(255) NOT NULL','string','','','0','','0','0','1','1403704652','1403704652','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('intro','封面简介','text NOT NULL','textarea','','','1','','0','0','1','1403780676','1403780676','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;