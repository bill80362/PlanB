# 專案 B計畫

### 指令集-環境
- 請先複製出一份.env，並設定mysql資料庫(複製根目錄底下.env.example，命名為.env)
- 設定 資料庫名稱:laravel 帳號密碼:root root
- composer install
- php artisan serve 跑測試環境

### 指令集-DB
- 請先啟動docker
- docker-composer up -d 使用docker建立mysql和phpmyadmin(-d代表背景執行)
- 請進入phpmyadmin:localhost:8899/root/root建立laravel資料庫
- php artisan migrate:reset 資料表初始化(全部刪除)
- php artisan migrate 建立資料表
- php artisan db:seed 塞入測試假資料
- php artisan migrate:refresh --seed  資料表全部刪除重建，並跑db seed。

### 其他指令
- 圖片soft link建立，php artisan storage:link
- 清除各式快取，php artisan app:clear

### Session使用Redis說明
- .env 環境設定redis主機連線資料 
- REDIS_HOST=127.0.0.1
- REDIS_PASSWORD=null
- REDIS_PORT=6379
- REDIS_CLIENT=predis
- 然後改 SESSION_DRIVER=redis
- 此時使用session後，可以去http://localhost:8898/查看session資料
- 相關設定參考 https://laravel.com/docs/10.x/redis#configuration
- redis預設架設會有資料庫0~15號，注意使用Cache和Session資料庫要分開

### 產生檔案指令
```
 php artisan make:model User/Photo  -mcr
```

### ICON
- Themify Icons：https://themify.me/themify-icons
- font awesome：https://fontawesome.com/search?o=r&m=free
- ion icon：https://ionic.io/ionicons
- Material Symbols and Icons：https://fonts.google.com/icons
