# Clean CRM

A simple, minimal CRM system built with Laravel, designed for small businesses and solo founders.

---

## 🚀 Overview

Clean CRM is a lightweight Customer Relationship Management (CRM) system focusing on simplicity, usability, and fast deployment.

This project is built as an MVP with the goal of evolving into a SaaS product.

---

## ✨ Features

### Core

- Multi-tenant architecture (tenant-based data isolation)
- User authentication (login / register)

### Contacts

- Create, edit, delete contacts
- Basic contact information management

### Deals

- Create and manage deals
- Link deals to contacts
- Track deal amount

### Pipeline

- Kanban-style pipeline view
- Stages: New / In Progress / Won / Lost
- Visual deal tracking

### Activity

- Add activity to deals
- Types: call, meeting, note
- Track interaction history

### Deal Detail

- View full deal information
- View related contact
- Activity timeline

### Dashboard

- Total contacts
- Total deals
- Revenue (won deals)

---

## 🛠 Tech Stack

- Backend: Laravel (PHP)
- Database: MySQL
- Frontend: Blade + Tailwind CSS
- Version Control: Git + GitHub

---

## ⚙️ Installation

1. Clone repository

```
git clone https://github.com/loon1-de/clean_crm.git
```

2. Enter project

```
cd clean_crm
```

3. Install dependencies

```
composer install
npm install
```

4. Copy environment file

```
cp .env.example .env
```

5. Configure database in `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clean_crm
DB_USERNAME=root
DB_PASSWORD=
```

6. Generate app key

```
php artisan key:generate
```

7. Run migrations

```
php artisan migrate
```

8. Run development server

```
php artisan serve
npm run dev
```

---

## 📦 Project Structure

- `app/Models` – Data models (User, Tenant, Contact, Deal, Activity)
- `app/Http/Controllers` – Controllers
- `resources/views` – Blade templates
- `routes/web.php` – Web routes

---

## 📊 Current Status

Version: v0.4

Completed:

- Contacts module
- Deals module
- Pipeline view
- Activity system
- Deal detail page
- Basic UI/UX

---

## 🧭 Roadmap

### Phase 1 (MVP) ✅

- Core CRM functionality

### Phase 2 (Improve)

- Search & filtering
- UI refinement
- Pagination

### Phase 3 (CRM Enhancements)

- Activity timeline improvements
- Deal stage quick update

### Phase 4 (SaaS)

- Subscription plans
- Role & permissions
- Multi-tenant improvements

---

## 🎯 Goal

Build a simple, fast, and scalable CRM system that can evolve into a SaaS product.

---

## 📄 License

MIT License

---

## 👤 Author

Developed by Loon K
