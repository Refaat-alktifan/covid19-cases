docker build . -f ./deploy/dockerfile -t laravel:v7

docker tag laravel:v7 docker.io/nahid35/laravel:v7

docker push docker.io/nahid35/laravel:v7


kubectl apply -f deploy/app/secret.yml

kubectl apply -f deploy/app/deploy.yml

kubectl apply -f deploy/app/service.yml
