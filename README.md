# fabflix
A Netflix clone - http://mymongotest.cloudapp.net/fabflix/

Final module project for "AC51041: DevOps and Microservices" / Data Engineering MSc @ U Dundee '15/'16


For this project I worked on a Microsoft Azure Ubuntu VM and I split my services over five different Docker containers:
- Nginx/RTMP for video streaming;
- MongoDB for video catalogue;
- MySQL for user details;
- Nginx for jpg posters;
- Apache2 for the website in PHP.

![alt tag](https://cloud.githubusercontent.com/assets/14852853/12697273/4b040e4a-c777-11e5-987a-51438f7c5f28.png)

Continuous Deployment with the following PHP package:
https://github.com/antriver/auto-git-pull
