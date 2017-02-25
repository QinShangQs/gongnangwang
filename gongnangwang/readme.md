# Laravel PHP Framework


################20170225部署注意事项################
1，增加全局函数配置 app/helpers.php ，须修改 
   "autoload": {
           "files": [
               "app/helpers.php"
           ]
    }
，并执行  composer dump-autoload
2，修改众筹表
##给众筹添加发布状态 
##2017-2-24
alter table gon_project add column pro_publish_status tinyint default 1;

##众筹审核记录表 
##2017-2-24
create table gon_project_audit
(
   id int AUTO_INCREMENT primary key,
   pro_id int not null comment '众筹ID',
   old_publish_status tinyint not null comment '原发布状态',
   new_publish_status tinyint not null comment '新发布状态',
   remark varchar(50) default '' comment '申请备注',
   add_time timestamp default CURRENT_TIMESTAMP  
);