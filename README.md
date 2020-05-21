## 클라이언트 서버 모델의 서버 취약점 점검 시스템
> 리눅스 서버의 취약점 점검 웹 페이지

클라이언트 서버 모델의 서버 취약점 점검 시스템은 리눅스 서버의 74가지의 취약점을 웹에서 보조지표(표, 그래프)를 통해 분석해 주는 웹 페이지 입니다.

## 주요기능

* 시스템 정보 및 취약점 수 알림
* 취약점 갯수 추이 정보 제공
* 취약 항목 별 로그 데이터 제공

## 기술스택
* PHP
* Mysql
* Apache
* Bootstrap

## UI/UX
### 랜딩 페이지
> 해당 웹의 첫 페이지 입니다.

![landing](https://user-images.githubusercontent.com/39932233/82516877-c7cfd280-9b56-11ea-99ac-dcb3be6b563e.jpg)
### 목록 페이지
> 검사 한 리눅스 서버의 IP별로 분류하여, 검사 목록을 제공합니다.

![list](https://user-images.githubusercontent.com/39932233/82516878-c9999600-9b56-11ea-9793-a76d08967d18.jpg)
### 메인 페이지
> 상단에는 검사 결과의 OverView를 차트와 표를 활용하여 보여주며, 하단에는 취약한 항목의 목록을 보여줍니다.

![main](https://user-images.githubusercontent.com/39932233/71879833-5a587200-3172-11ea-8634-6576ef1d1ba4.jpg)
![main2](https://user-images.githubusercontent.com/39932233/71879836-5b899f00-3172-11ea-8953-712357d6374c.jpg)
### 디테일 페이지
> 항목 별 모든 검사 항목의 로그 데이터를 제공합니다.

![detail](https://user-images.githubusercontent.com/39932233/82516881-cacac300-9b56-11ea-88b7-87423082054a.jpg)
