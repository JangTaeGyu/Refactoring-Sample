<?php

return [
  'name' => '이름::required|max:50',
  'email' => '이메일::required|max:255|email|only_email_users',
  'password' => '비밀번호::required|min:5|max:15',
  'password_match' => '비밀번호 확인::required|match:password'
];
