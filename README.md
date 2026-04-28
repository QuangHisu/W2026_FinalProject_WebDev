# Laravel Delivery System

A delivery management system built with **Laravel** — handling customers, items, orders, shipments, pricing, currency conversion, and API logging.

---

## Environment Setup

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

## Database — Always Use `migrate:fresh`

> **This project requires `migrate:fresh` — never use `migrate` alone.**

```bash
php artisan migrate:fresh
```

### Why `migrate:fresh`?

| Reason             | Detail                                                                                         |
|--------------------|------------------------------------------------------------------------------------------------|
| **Foreign keys**   | Tables like `orders` depend on `customers` and `items` — partial migrations break constraints. |
| **Pivot tables**   | Many-to-many relationships require all parent tables to exist first.                           |
| **Consistency**    | Every developer starts from the exact same state.                                              |

> `migrate:fresh` **drops all tables and data**. Never run on a production database unless you intend a full reset.

---
## API Routes

### Customers

| Method   | Endpoint                | Description           |
|----------|-------------------------|-----------------------|
| `GET`    | `/api/customers`        | List all customers    |
| `POST`   | `/api/customers/create` | Create a new customer |
| `GET`    | `/api/customers/{id}`   | Get customer details  |
| `PUT`    | `/api/customers/{id}`   | Update a customer     |
| `DELETE` | `/api/customers/{id}`   | Delete a customer     |

### Items

| Method   | Endpoint            | Description       |
|----------|---------------------|-------------------|
| `GET`    | `/api/items`        | List all items    |
| `POST`   | `/api/items/create` | Create a new item |
| `GET`    | `/api/items/{id}`   | Get item details  |
| `PUT`    | `/api/items/{id}`   | Update an item    |
| `DELETE` | `/api/items/{id}`   | Delete an item    |

### Orders

| Method   | Endpoint                                                                           | Description                       |
|----------|------------------------------------------------------------------------------------|-----------------------------------|
| `GET`    | `/api/orders/index`                                                                | List all orders                   |
| `POST`   | `/api/orders/create`                                                               | Create order with items           |
| `GET`    | `/api/orders/edit`                                                                 | Edit multiple order statuses      |
| `GET`    | `/orders/create?customer_id=1&orderItem_id=2&provider_key=canadapost&currency=CAD` | Get computed pricing + conversion |
| `DELETE` | `/api/orders/{id}`                                                                 | Cancel an order                   |

### Shipments

| Method    | Endpoint               | Description                     |
|-----------|------------------------|---------------------------------|
| `GET`     | `/api/shipments/index` | List all shipments              |
| `POST`    | `/api/shipments`       | Create a shipment for an order  |
| `GET`     | `/api/shipments/edit`  | Edit multiple shipment statuses |
| `PATCH`   | `/api/shipments/ `     | Update shipment status          |
| `DELETE`  | `api/shipments/{id}`   | Delete a Shipment               |

### Currency

| Method   | Endpoint                  | Description                       |
|----------|---------------------------|-----------------------------------|
| `GET`    | `/api/price/preview`      | Return computed delivery price    |

### API Logs

| Method   | Endpoint               | Description                |
|----------|------------------------|----------------------------|
| `GET`    | `/api/logs`            | List recent API logs       |
| `GET`    | `/api/logs/{id}`       | Get full log entry details |

---
## Example Request
### CUSTOMER
#### Create
```bash
POST /customers
{
"name": "John Doe",
"email": "john@example.com",
"address": "123 Main St"
}
```
#### Update
```bash
PUT /customers/1
{
  "name": "John Updated",
  "email": "john@example.com",
  "address": "999 Updated St"
}
```
### ORDER ITEMS
#### Create
```bash
POST /orderItems
{
  "item_name": "Laptop",
  "item_description": "Dell XPS 13"
}
```
#### Update
```bash
PUT /orderItems/1
{
  "item_name": "Laptop Updated",
  "item_description": "Dell XPS 15"
}
```
### ORDERS
#### Create
```bash
POST /orders
{
  "customer_id": 1,
  "orderItem_id": 2,
  "provider_key": "canadapost",
  "currency": "CAD"
}
```
#### Bulk Update Statuses
```bash
PUT /orders
{
  "statuses": {
    "1": "created",
    "2": "in_transit",
    "3": "delivered",
    "4": "cancel"
  }
}
```
### SHIPMENTS
#### Bulk Update Statuses
```bash
PUT /orders
{
  "statuses": {
    "1": "created",
    "2": "in_transit",
    "3": "delivered",
    "4": "cancel"
  }
}
```
#### Delete Shipment
```bash
DELETE /shipments/1
```
### WHEN AN ORDER IS CREATED, A SHIPMENT ALSO IS CREATED AS WELL
```bash
POST /orders
{
  "customer_id": 1,
  "orderItem_id": 2,
  "provider_key": "ups",
  "currency": "USD"
}
```
Then the shipment is created as followed
```bash
{
  "shipment_id": 10,
  "order_id": 5,
  "price": 14.50,
  "currency": "USD",
  "service": "ups",
  "status": "created"
}
```

---
## Run the Application

```bash
php artisan serve
# Available at http://localhost:8000
```

---

## 📄 License

Open-sourced under the [MIT License](LICENSE).
