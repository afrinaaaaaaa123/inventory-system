# Inventory Management System (Laravel API)

## Project Overview

This project is a RESTful API built using Laravel and MySQL to manage inventory and stock transactions. It allows tracking of stock movements (IN/OUT), inventory levels, and generating reports.

---

## Technologies Used

* Laravel 11
* PHP
* MySQL
* Postman (API Testing)

---

## Setup Instructions

### 1. Clone Repository

```bash
git clone <your-repo-link>
cd inventory-system
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

Update `.env` file:

```env
DB_CONNECTION=mysql
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migration & Seeder

```bash
php artisan migrate:fresh --seed
```

### 5. Start Server

```bash
php artisan serve
```

---

## API Endpoints

### 1. Add Stock Transaction

**POST** `/api/transaction`

**Request Body:**

```json
{
  "item_name": "Laptop",
  "quantity": 2,
  "transaction_type": "OUT"
}
```

**Response:**

```json
{
  "message": "Transaction successful"
}
```

---

### 2. Inventory Summary

**GET** `/api/summary`

**Response:**

```json
[
    {
        "name": "Laptop",
        "stock_quantity": 14,
        "total_value": 49000
    },
    {
        "name": "Keyboard",
        "stock_quantity": 50,
        "total_value": 6000
    },
    {
        "name": "Mouse",
        "stock_quantity": 100,
        "total_value": 6000
    },
    {
        "name": "A4 Paper",
        "stock_quantity": 30,
        "total_value": 1350
    },
    {
        "name": "LAN Cable",
        "stock_quantity": 500,
        "total_value": 1500
    }
]
```

---

### 3. Category Report

**GET** `/api/category-report`

**Response:**

```json
[
    {
        "category": "Accessories",
        "total_stock": "150"
    },
    {
        "category": "Electronics",
        "total_stock": "12"
    },
    {
        "category": "Supplies",
        "total_stock": "530"
    }
]
```

---

### 4. Transaction Type Report

**GET** `/api/type-report`

**Response:**

```json
[
  {
    "transaction_type": "OUT",
    "total": 2
  }
]
```

---

## System Features

* Add stock transactions (IN / OUT)
* Automatically updates stock quantity
* Prevents negative stock
* Tracks all transaction history
* Generates inventory summary
* Generates category-based reports
* Generates transaction-type reports

---

## Additional Questions

### a. Extensibility – New Category

To support dynamic categories, a separate `categories` table can be created and linked to products using a foreign key (`category_id`). This allows adding new categories via an API or admin panel.

---

### b. Extensibility – Pricing Updates

A `price_history` table can be introduced to track changes in product prices over time. Each record would store product ID, price, and effective date.

---

### c. Low Stock Alerts

A `low_stock_threshold` column can be added to the products table. The system can trigger alerts (e.g., email or notification) when stock falls below the threshold.

---

### d. Multi-Branch Support (Optional)

To support multiple branches, create:

* `branches` table
* `product_branch_stock` table

This allows tracking inventory separately for each branch.

---

## Conclusion

This system demonstrates a complete Laravel-based API for managing inventory, including stock transactions, reporting, and scalable design considerations.
