## AliyunCdn
refresh aliyun's cdn cache

### install
1. composer require birjemin/aliyun-cdn
2. import `ServiceProvider.php` in `app.php`
3. excute commadn: `php artisan vendor:publish --provider="Birjemin\AliyunCdn\ServiceProvider"`

### Question
Q1:
```
{"Recommend":"https://error-center.aliyun.com/status/search?Keyword=IllegalTimestamp&source=PopGw","Message":"The input parameter \"Timestamp\" that is mandatory for processing this request is not supplied.","RequestId":"790565D3-30D7-44E4-86D9-1CC0A1697D12","HostId":"cdn.aliyuncs.com","Code":"IllegalTimestamp"}
```
A:时区不对

Q2:
```
{"Recommend":"https://error-center.aliyun.com/status/search?Keyword=MissingParameter&source=PopGw","Message":"The input parameter \"Action\" that is mandatory for processing this request is not supplied.","RequestId":"95F47CC4-BADA-4AF6-9EB4-12CCA602062D","HostId":"cdn.aliyuncs.com","Code":"MissingParameter"}
```
A:参数不对

### 备注
无