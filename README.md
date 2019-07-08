# Adres Seçim Betiği

Bağlantılı olarak İl, İlçe, Mahalle, Cadde, Sokak seçimi sağlayan eğer seçmek istenilen eleman yoksa ekleme alternatifi sunan, ekleme esnasında bir takım kontroller yapan uygulamadır.

  - html css 
  - javascript
  - php 
    ile yazılmıştır
    

### Tech

Şu opensource projeleri kullandım 

* [Bootstrap](https://getbootstrap.com/) - Form ekranı düzenlemesi için
* [Sweeralert](https://sweetalert.js.org/) - Yeni veri kaydetme esnasında alınan hataların gösterimi için
* 

## Yapılabilir
  - Seçimler AutoComplete ile yapılabilir
  - Mevcut il, ilçe, mahalle, cadde, sokak bilgileri olan düzenlenmiş veritabanı paylaşılabilir
  - Seçim sonucunda bir sayfaya yönlendirilerek alınan gösterilebilir
  - Klasörleme vasıtasıyla ajax linkleri api/ şeklinde düzenlenebilir



### Nasıl Çalışır

* Öncelikle proje ana dizinindeki

```
address.sql
```
dosyası ile veritabanınızı oluşturup düzenleyiniz.

* Sonrasında 
```
inc/config.php
```
dosyasındaki veritabanı globallerini düzenleyiniz

* ve çalıştırınız
```
php -S localhost:8000/views/form.view.php
```
