## Template AdminLTE



### Install
- Clone repo `` https://github.com/Muhamadfahru90/frontend_BRI.git ``
- Jalankan perintah 
	```bash
	composer install
	npm install
	```
- Bikin koneksi 
	```bash
	cp .env.example .env
	```
- Bikin seed data sample
	```bash
	php artisan migrate --seed
	php artisan optimize
	```
- Jalankan server
	```bash
	php artisan serve
	```
- User dan Password login
	```bash
	email: admin@admin.com
	pass: password
	```
