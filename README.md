# covid19-cases

[![N|Solid](http://covid19-cases.org/files/uploads/1589190959.png)](https://covid19-cases.org/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

covid19-cases – Coronavirus Live Map – This script developed for all types of Corona virus-infected countries report. This report automatically generates data from trusted API sources like World Helth Organization.

# Source And Credits

 - [WHO (world health organization)](https://www.who.int//)
 - [Fontawsome Icons](https://fortawesome.github.io/Font-Awesome/)

# Software Framework!

  - Laravel

### Installation

covid19-cases requires
> PHP >= 7.2.5
>BCMath PHP Extension	
>Ctype PHP Extension	
>JSON PHP Extension	
>Mbstring PHP Extension	
>OpenSSL PHP Extension	
>PDO PHP Extension	
>Tokenizer PHP Extension	
>XML PHP Extension	
>fileinfo PHP Extension	

### Easy installation

- Step1: Upload Files.zip to your host and unzip.
- Step2: Create mySQL Database and Database User.
- Step3: Open your browser and visit http://your-siteurl/install.

Fill All Information there and click Save & Install and wait minutes if you fill-up right information it will redirect home page nowe your Site System is ready, you able to use now.
Step3: Login to admin panel http://your-siteurl/login with email: admin@admin.com & Password: rootadmin to change Website.

Install the dependencies and devDependencies and start the server.

```sh
$ git clone https://github.com/Refaat-alktifan/covid19-cases.git
$ cd covid19-cases
$ cp -r .env.example .env && php artisan key:generate
$ composer install -d
$ npm install
$ Run 'php artisan serve' to start the inbuilt PHP server
$ You are all set to go. Visit http://127.0.0.1:8000/ to view the latest Covid19-cases Stats
```

### Run the project using docker

Now run the following command from your terminal one by one. Running the commands be sure that you have installed docker.You will get install instructions from this [(link)](https://docs.docker.com/)

```sh
$ docker-compose build
$ docker-compose up -d
Now browse project
$ http://localhost:8083/
```

### Deploy the project using Kubernetes

At first build image running the command:
```sh
$ docker build . -f ./deploy/dockerfile -t laravel:v7
```
Now login in docker hub. Running the command be sure that you have created an account in docker hub. If not go to the [(link)](https://hub.docker.com/) and create account.

```sh
$ docker login
```

Now run the following command for Pushing image in docker registry.In the command nahid35 is my docker id and laravel is repository name and v6 is tag name. Modify command according to your docker id, repository name and tag name.

```sh
$ docker tag laravel:v7 docker.io/nahid35/laravel:v7
$ docker push docker.io/nahid35/laravel:v7
```

Now run minikube. Running the commands be sure that you have installed minikube. If not installed, you can get install instructions from this [(link)](https://kubernetes.io/docs/tasks/tools/install-minikube/)

```sh
$ minikube start
```
Now run the following commands for deploying your project:
```sh
$ kubectl apply -f deploy/app/secret.yml
$ kubectl apply -f deploy/app/deploy.yml
$ kubectl apply -f deploy/app/service.yml
```

Now run the following commands to see minikube dashboard:

```sh
$ minikube dashboard
```
You will get this url :
```sh
http://192.168.99.100:32676/
for more information
$ kubectl get svc
```

Now you can browse your project using following url :

 http://192.168.99.100:32676/


### INFO
- If you modify .env file, You have to run following command:
```sh
    $ base64 -b -i deploy/env/.env
```

