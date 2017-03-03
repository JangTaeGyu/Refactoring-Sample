# Database 생성
create database development;

use mysql;

# 계정 확인
select * from user;

# 계정 생성
create user noise@localhost identified by '#cosmos01!';

# Database 계정 권한 부여
grant all privileges on board.* to noise@localhost;

# 권한 확인
show grants for noise@localhost;
