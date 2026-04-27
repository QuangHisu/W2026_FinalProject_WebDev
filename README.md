# 📦 Laravel Delivery System

A delivery management system built with **Laravel** — handling customers, items, orders, shipments, pricing, currency conversion, and API logging.

---

## 🚀 Environment Setup

```bash
# 1. Clone & enter the project
git clone https://github.com/your-username/W2026_FinalProject_WebDev.git
cd W2026_FinalProject_WebDev

# 2. Install dependencies
composer install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Set your database credentials in .env
#    DB_DATABASE=shipment_management
#    DB_USERNAME=root
#    DB_PASSWORD=
```

---

## 🗄️ Database — Always Use `migrate:fresh`

> ⚠️ **This project requires `migrate:fresh` — never use `migrate` alone.**

```bash
php artisan migrate:fresh
```

### Why `migrate:fresh`?

| Reason | Detail |
|--------|--------|
| **Foreign keys** | Tables like `orders` depend on `customers` and `items` — partial migrations break constraints. |
| **Pivot tables** | Many-to-many relationships require all parent tables to exist first. |
| **Consistency** | Every developer starts from the exact same state. |

> 🔴 `migrate:fresh` **drops all tables and data**. Never run on a production database unless you intend a full reset.

---

## ▶️ Run the Application

```bash
php artisan serve
# Available at http://localhost:8000
```

---

## 📄 License

Open-sourced under the [MIT License](LICENSE).
