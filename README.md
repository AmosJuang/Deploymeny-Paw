# UBeasiswa
1. Instal laravel, mysql, php, dll lah
2. bikin projek laravel baru
3. merge isinya
4. php artisan serve --> lgsung kebuka ggwp



Note untuk migrasi database : 
1.  Jalankan php artisam migrate
2.  Ganti file untuk buat users table sama isi migrasi users table/table lain yang kubuat
3.  jalanin php artisan migrate:fresh
4. Jalanin php artisan db:seed --class=ScholarshipSeeder
5. Pastiin data dah masuk (ke artisan tinkerer, mysql cli, bebas yang penting mysql kalian) barutu select * from scholarships;
   
