-- create database tas;
use tas;
CREATE TABLE  IF NOT EXISTS OrdinaryUser (   -- 包含所有的用户，助教和管理员直接用这个
  userID varchar(20) NOT NULL,
  username varchar(20) not NULL,
  password varchar(20) not null,  -- md5加密
  type int not null,              -- 1学生，2助教，4老师，8管理员
  permission int not null,        -- 与一下然后判断有什么权限
  nickname varchar(20) not null,
  gender int not null,            -- male, female, why do you ask
  age    int not null,
  email  varchar(255) not null,
  mobilephone varchar(20) not null,
  PRIMARY KEY (userID)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS Teacher (
  userID varchar(20) NOT NULL,
  honor VARCHAR(255),
  resume varchar(255),
  PRIMARY KEY (userID)
) CHARACTER SET utf8;
-- CREATE TABLE IF NOT EXISTS student (
--   userID varchar(20) not null,
--   eduStartDate date,
--   eduEndDate date,
--   total_credit numeric(5,1),
--   total_avg_score numeric(5,1),
--   credit1 numeric(5,1),
--   avg_score1 numeric(5,1),
--   credit2 numeric(5,1),
--   avg_score2 numeric(5,1),
--   credit3 numeric(5,1),
--   avg_score3 numeric(5,1),
--   credit4 numeric(5,1),
--   avg_score4 numeric(5,1),
--   credit5 numeric(5,1),
--   avg_score5 numeric(5,1),
--   credit6 numeric(5,1),
--   avg_score6 numeric(5,1),
--   credit7 numeric(5,1),
--   avg_score7 numeric(5,1),
--   credit8 numeric(5,1),
--   avg_score8 numeric(5,1),
--   credit9 numeric(5,1),
--   avg_score9 numeric(5,1),
--   credit10 numeric(5,1),
--   avg_score10 numeric(5,1),
--   credit11 numeric(5,1),
--   avg_score11 numeric(5,1),
--   PRIMARY KEY (userID)
-- ) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS Course (
  year varchar(20) not null,
  course_id varchar(20)not null,
  course_name VARCHAR(255)not null,
  Course_type varchar(20),        -- 课程类别
  language int,             -- 0默认，1双语，2英语，3其他语言
  introduction varchar(1000) not null,  -- 课程介绍
  content varchar(1000) not null,   -- 课程概要
  plan varchar(5000) not null,      -- 课程计划
  English_name varchar(30),       -- 英文名
  department varchar(30),       -- 院系
  credit numeric(3,1),          -- 学分
  prerequisite_course varchar(255),
  PRIMARY KEY (course_id,year)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS student_class (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  userID VARCHAR(20) not null,
  year varchar(20) not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  PRIMARY KEY (id)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS SingleClass ( -- 一个班级上课的时间地点
  year varchar(20) not null,
   course_id varchar(20)not null,
   teacher_assistant_id varchar(20) not null,   -- 新增助教
   Teacher1 varchar(20) not null,
   Teacher2 varchar(20),
   Teacher3 varchar(20),
   Teacher4 varchar(20),
   Teacher5 varchar(20),
   course_time1 varchar(255) not null,
   course_place1 varchar(255) not null,
   course_time2 varchar(255),
   course_place2 varchar(255),
   course_time3 varchar(255),
   course_place3 varchar(255),
   course_time4 varchar(255),
   course_place4 varchar(255),
   course_time5 varchar(255),
   course_place5 varchar(255),
   course_time6 varchar(255),
   course_place6 varchar(255),
   PRIMARY KEY (course_id,Teacher1,course_time1,year)
) CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS student_grade (   -- 一门课学生的成绩
  year varchar(20) not null,
  student_id varchar(20) not null,
  course_id varchar(20) not null,
  score_100 int,
 -- score_5 numeric(3,1),
  PRIMARY KEY (student_id,course_id,year)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS examination (     -- 一个班级的考试时间地点
  year varchar(20) not null,
  course_id varchar(20) not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  exam_start_time varchar(20) not null,
  exam_end_time varchar(20) not null,
  exam_place1 varchar(20) not null,
  exam_place2 varchar(20),
  exam_place3 varchar(20),
  duration int,       -- 单位是分钟
  PRIMARY KEY (course_id,Teacher1,course_time1,year)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS Notice (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  year varchar(20) not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  message varchar(255),
  pub_date varchar(20),
  PRIMARY KEY (id,pub_date)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS board (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  introduction varchar(255),
  year varchar(20) not null,
  course_id varchar(20)not null,
  boardmaster varchar(20),
  PRIMARY KEY (id)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS post (
  type int,       -- 是否解决，这个题目的情况
  board_id int,
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(255),   -- 标题
  pre_id int,       -- 回复哪个帖子的，如果没有那就是0
  floor int,        -- 楼层
  userID varchar(20),   -- 发帖人
  post_time varchar(20),     -- 发帖时间
  message VARCHAR(255), -- 发帖内容，如果有图片什么的都是写链接
  update_time varchar(20),       -- 修改时间
  PRIMARY KEY (id)
) CHARACTER SET utf8;
/*
作业ID
作业名称
作业描述
作业文件
作业发布时间
作业更新时间
作业截止时间
成绩规则
*/
CREATE TABLE IF NOT EXISTS homework (   -- 直接链接就是链到作业id
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  type int not null,      -- 作业形式 1选择题，2问答题
  state int not null,     -- 作业批改状态
  year varchar(20) not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  name VARCHAR(255),
  content varchar(255),           -- 有图片的用链接
  post_time varchar(20),
  update_time varchar(20),
  deadline varchar(20),
  score int,
  submit_limit int,
  answer varchar(255),
  PRIMARY KEY (id)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS homework_submit (
  year varchar(20) not null,
  course_id varchar(20)not null,
  student_id varchar(20),
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  submit_url varchar(255),
  submit_cnt int,     -- 超过限制就不能上传了
  homework_id int,
  name VARCHAR(255),  
  feedback varchar(255),
  score int,
  PRIMARY KEY (id)
) CHARACTER SET utf8;
CREATE TABLE IF NOT EXISTS material (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  year varchar(20) not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  name VARCHAR(255),
  content varchar(255),   -- 描述       
  post_time varchar(20),
  update_time varchar(20),
  url varchar(255),
  PRIMARY KEY (id)
) CHARACTER SET utf8;