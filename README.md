# Inventory Management System (Laravel API)

## 📌 Project Overview

This project is a RESTful API built using Laravel and MySQL to manage inventory and stock transactions.

---

## ⚙️ Technologies Used

* Laravel 11
* PHP
* MySQL
* Postman

---

## 🚀 Setup Instructions

```bash
composer install
php artisan migrate:fresh --seed
php artisan serve
```

---

## 📡 API Endpoints

### Add Transaction

POST `/api/transaction`

```json
{
  "item_name": "Laptop",
  "quantity": 2,
  "transaction_type": "OUT"
}
```

---

### Inventory Summary

GET `/api/summary`

---

### Category Report

GET `/api/category-report`

---

### Transaction Report

GET `/api/type-report`

---

## 📊 Features

* Stock IN / OUT tracking
* Automatic stock update
* Prevent negative stock
* Reports & summary

---

## 🧠 Notes

This system demonstrates a simple inventory backend with Laravel API and MySQL integration.
