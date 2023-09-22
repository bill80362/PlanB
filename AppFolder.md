# 資料夾架構 
### app資料夾架構
-------
>app  
>>Console (註冊自定義 Artisan 命令和定義計劃任務的地方)  
>>Exceptions (拋出的任何異常的好地方)  
>>Extension (放自訂擴充套件，如擴充原laravel的class覆寫、擴充log channel等等)  
>>Facades (自訂的Facades，如果有用到Facade的話?)  
>>Contracts (放Interface)   
>>Http (此目錄包含您的控制器、中間件和表單請求)  
>>Jobs (應用程序的可排隊作業)  
>>Mail (電子郵件)  
>>Models (包含所有Eloquent 模型類)  
>>Observers (觀察者)  
>>Objects (放一般php class，如果有需要的話？)  
>>Providers (服務提供者通過在服務容器中綁定服務、註冊事件或執行任何其他任務來引導您的應用程序)  
>>SDK (放入第三方SDK，如果第三方套件不支援componser的話)  
>>Services (共用程式、商業邏輯等等)  
>>Traits (放入php trait的地方)  

