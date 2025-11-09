# 👑 PicCrown — Laravel 10 + Breeze + TailwindCSS

PicCrown adalah web app berbasis **Laravel 10** yang memanfaatkan **Breeze** untuk autentikasi dan **TailwindCSS** untuk tampilan modern minimalis.  
Dikembangkan untuk memberikan pengalaman kolaboratif yang cepat, efisien, dan responsif menggunakan ekosistem **Vite** dan **NPM**.

---

## 🚀 Tech Stack

-   **Laravel 10** — Framework PHP modern
-   **Laravel Breeze** — Starter kit autentikasi ringan
-   **TailwindCSS** — Utility-first CSS framework
-   **Vite + NPM** — Asset bundler modern
-   **MySQL / PostgreSQL** — Database utama

---

## 🧱 Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/piccrown.git
cd piccrown

composer install
npm install

cp .env.example .env
php artisan key:generate

Atur koneksi database di file .env:

DB_CONNECTION=psql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=piccrown
DB_USERNAME=root
DB_PASSWORD=

npm install
npm run dev
php artisan migrate
```
