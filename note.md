# DỰ ÁN WEBSITE HỌC TRỰC TUYẾN


## DANH CHO NGƯỜI DÙNG
- Hiển thị danh sách khoa học
- Hiển thị thông tin chi tiết khóa học
- Hiển thị danh sách tn tức
- Hiển thị chi tiết tin tức
- Phân quyền khóa học cho học viên
- Xem video bài giảng
- Download tài liệu bài giảng
- Học thử bài giảng
- Giỏ hàng
- Đăng ký/Đăng nhập
- Mua khóa học
- Trang tài khoản : Thông tin ca nhân, khóa học của tôi

## Dành cho quản tri

- Quản lý danh mục
- Quản lý học viên
- Quản lý khóa học
- Quản lý giảng viên
- Quản lý bài giảng
- Quản lý danh mục tin tức
- Quản lý tin tức
- Quản lý người dùng ( Quản lý hệ thống )
- Kích hoạt khóa học cho học viên
- Phân quyền quản trị hệ thống
- Báo cáo, thông kê ....
- Quản lý file tài liệu
- Quản lý đơn hàng
- Quản lý video 


## API

- Xây dựng API hoàn chỉnh

## Phân tích Database


1. Table categories => Quản lý danh mục

- id => int
- name => varchar(200)
- slug => varchar(200)
- parent_id => int
- created_at => timestamp
- updated_at => timestamp

2. Table courses => Quản lý khóa học

- id => int
- name => varchar (255)
- slug => varchar (255)
- detail => text
- teacher_id => int
- thumbnail => varchar(255)
- price => float
- sale_price => float
- code => varchar (100)
- durations =>float
- is_document => tinyint
- supports => text
- status => tinyint
- created_at => timestamp
- updated_at => timestamp

3. Table lessions => Quản lý bài giảng

- id =>int
- name =>varchar(200)
- slug => varchar(200)
- video_id => int
- document_id => int
- parent_id => int
- is_trial => tinyint
- views => int
- position => int
- duration => float
- description => text
- created_at => timestamp
- updated_at => timestamp

4. Table category_courses => Trung gian liên kết giữa danh mục và khóa học


- id => int
- category_id => int
- course_id => int
- created_at => timestamp
- updated_at => timestamp

5. Table teacher => Giảng viên


- id => int
- name => varchar(100)
- slug => varchar(100)
- description => text
- epx => float
- image =>  varchar(255)
- created_at => timestamp
- updated_at => timestamp

6. Table videos => Quản lý video bài giảng

- id => int
- name => varchar(255)
- url => varchar(255)
- created_at => timestamp
- updated_at => timestamp


7. Table document => Quản lý tài liệu bài giảng

- id => int
- name => varchar(255)
- url => varchar(255)
- size => float
- created_at => timestamp
- updated_at => timestamp


8. Table category_posts => Quản lý danh mục tin tức

- id => int
- name => varchar(200)
- slug => varchar(200)
- parent_id => int
- created_at => timestamp
- updated_at => timestamp

9. Table posts => Quản lý bài viết

- id => int
- title => varchar(255)
- slug => varchar(255)
- content => text
- exceprt => text
- thumbnail => varchar(255)
- category_post_id => int
- created_at => timestamp
- updated_at => timestamp

10. Table students => Quản lý học viên

- id => int
- name => varchar(100)
- email => varchar(100)
- phone => varchar(20)
- password => varchar(100)
- address => varchar(200)
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

11. Table student_courses => Trung gian học viên và khóa học

- id => int
- course_id => int
- student_id => int
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

12. Table orders => Quản lý đơn đăng ký của học viên

- id => int
- student_id => int
- total => float
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

13. Table order_detail => chi tiết đơn hàng

- id => int
- order_id => int
- course_id => int
- price => float
- created_at => timestamp
- updated_at => timestamp

14. Table order_status => Quản lý trạng thái đơn hàng

- id => int
- name => varchar(200)
- created_at => timestamp
- updated_at => timestamp

15.  Table users => Quản trị hệ thống

- id => int
- name => varchar(100)
- email => varchar(100)
- password => varchar(100)
- group_id => int
- created_at => timestamp
- updated_at => timestamp

16. Table groups => Quản trị nhóm người dùng

- id => int
- name => varchar(100)
- permissions => text
- created_at => timestamp
- updated_at => timestamp

17. Table modules => Danh sách các module trong trang quản trị

- id => int
- name => varchar(200)
- title => varchar(200)
- role => text
- created_at => timestamp
- updated_at => timestamp

18. Table options => Quản lý các thiết lập

- id => int
- name => varchar(100)
- value => text

## Cài đặt Project và kết nối với Github

composer create-project laravel/laravel 

### Kết nối với Github

- Đăng ký tài khoản Github (Nếu có rồi hãy đăng nhập)
- Tạo Repository
- Kết nối với folder project trên máy tính
- Push code lên Github

### Quy trinh update code len github
- git add .
- git commit -m "Noi dung update"
- git push
+ clear cache git
- git rm -r --cached

### Cai dat laravel module



