## 專案 B計畫

### 指令集-環境
- 請先複製出一份.env，並設定mysql資料庫
- 設定 資料庫名稱:laravel 帳號密碼:root root
- php artisan serve 跑測試環境

### 指令集-DB
- 請先啟動docker
- docker-composer up -d 使用docker建立mysql和phpmyadmin(-d代表背景執行)
- 請進入phpmyadmin:localhost:8899/root/root建立laravel資料庫
- php artisan migrate:reset 資料表初始化(全部刪除)
- php artisan migrate 建立資料表
- php artisan db:seed 塞入測試假資料

### 使用非官方套件
- Excel https://docs.laravel-excel.com/
