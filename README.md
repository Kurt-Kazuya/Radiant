# Radiant Hotel — Reservation & Management System

A full-featured hotel reservation web application built with **Laravel 13**, enabling guests to browse accommodations, make bookings, and receive PDF receipts, while administrators manage rooms, reservations, payments, and reports from a dedicated dashboard.

---

## Features

### Guest-Facing
- Browse room types, amenities, dining options, and special offers
- Check room availability by date range
- Complete a checkout flow with personal details, preferences, and extras
- Choose between **Pay at Hotel** (cash) or **Pay Online** (credit card / GCash)
- Receive a booking confirmation with a downloadable **PDF receipt**
- Look up existing reservations via the guest bookings page
- Submit contact messages to hotel staff

### Admin Panel
- **Dashboard** — live overview of reservations, payments, and room occupancy
- **Rooms** — full CRUD (create, edit, delete, status management)
- **Reservations** — confirm, mark done, cancel, delete, view history, and clear all history
- **Payments** — mark payments as paid, delete records
- **Contact Messages** — view, mark as read, delete guest enquiries
- **Reports** — generate and export reports as PDF
- **Profile** — update admin account details

---

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # AdminDashboard, Rooms, Reservations, Payments, Profile, ContactMessages
│   │   ├── Api/            # REST API controllers (Room, Reservation, Payment)
│   │   ├── AuthController.php
│   │   ├── CheckoutController.php
│   │   ├── GuestReservationController.php
│   │   ├── ReportController.php
│   │   └── ReservationsController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/                 # User, Room, Reservation, Payment, ContactMessage
├── Services/
│   └── RoomAvailabilityService.php
database/
├── migrations/             # 14 migration files
├── seeders/
│   ├── DatabaseSeeder.php
│   └── HotelSeeder.php     # Seeds admin user + 20 rooms across 4 categories
resources/views/
├── admin/                  # Admin Blade templates
├── auth/                   # Login & Register
├── checkout/               # Checkout + PDF receipt
├── guest/                  # My Bookings
├── components/             # Shared layout components
└── *.blade.php             # Public pages (home, accommodations, dining, etc.)
routes/
├── web.php                 # All web routes
└── api.php                 # API routes
public/
├── css/                    # Per-page and shared stylesheets
└── images/                 # Hotel photography assets
```

---

## Data Models

| Model | Key Fields |
|---|---|
| **User** | `name`, `email`, `password`, `role` (admin / guest), `phone`, `nationality`, `address` |
| **Room** | `room_number`, `name`, `type` (single / double / suite), `price_per_night`, `status` (available / occupied / maintenance) |
| **Reservation** | `user_id`, `room_id`, `check_in_date`, `check_out_date`, `total_nights`, `total_price`, `status` (pending / confirmed / cancelled / completed), `arrival_time`, `special_requests`, `preferences`, `extras` |
| **Payment** | `reservation_id`, `amount`, `payment_method` (cash / card / gcash), `payment_status` (paid / unpaid / refunded), `paid_at` |
| **ContactMessage** | `name`, `email`, `company`, `phone`, `subject`, `message`, `read_at` |

---

## Default Room Categories (Seeded)

| Room Name | Type | Price / Night | Count |
|---|---|---|---|
| Deluxe Room | Single | ₱3,500 | 5 |
| Superior Room | Double | ₱5,500 | 5 |
| Junior Suite | Suite | ₱9,000 | 5 |
| Penthouse Suite | Suite | ₱18,000 | 5 |

---

## 🚀 Getting Started

### Requirements

- PHP **8.2+**
- Composer
- Node.js & npm
- SQLite (default) or MySQL

### Installation

```bash
# 1. Clone the repository
git clone <repo-url>
cd <project-folder>

# 2. One-command setup (installs deps, generates key, runs migrations)
composer run setup
```

The `setup` script does the following automatically:
1. `composer install`
2. Copies `.env.example` → `.env`
3. `php artisan key:generate`
4. `php artisan migrate`
5. `npm install`
6. `npm run build`

### Run the Development Server

```bash
composer run dev
```

This starts three processes concurrently:
- `php artisan serve` — Laravel development server
- `php artisan queue:listen` — Background job queue
- `npm run dev` — Vite asset watcher

Then visit: **http://localhost:8000**

### Seed the Database

```bash
php artisan db:seed --class=HotelSeeder
```

This creates:
- An **admin** account (`admin@hotel.com` / `password`)
- 20 rooms across the four categories above

---

## ⚙️ Environment Configuration

Copy `.env.example` to `.env` and adjust the values:

```env
APP_NAME=Laravel
APP_ENV=local
APP_URL=http://localhost

# Default: SQLite
DB_CONNECTION=sqlite

# Switching to MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=radiant_hotel
# DB_USERNAME=root
# DB_PASSWORD=your_password
```

> **Note:** When migrating from SQLite to MySQL, update the DB settings above and run `php artisan migrate:fresh --seed` locally to rebuild the schema.

---

## Authentication

| Role | Access |
|---|---|
| **Guest** | Public pages, checkout, my bookings |
| **Admin** | Full admin panel at `/admin/dashboard` |

The admin panel is protected by the `auth` + `admin` middleware. If no admin exists in the database (e.g., after a fresh migration), the system falls back to a hardcoded recovery credential so access is never permanently locked out.

**Default Admin Credentials (seeder):**
- Email: `admin@hotel.com`
- Password: `password`

---

## Key Routes

### Public
| Method | URI | Description |
|---|---|---|
| GET | `/` | Home page |
| GET | `/accommodations` | Room listings |
| GET | `/reservations` | Availability search |
| GET | `/checkout` | Booking form |
| POST | `/checkout` | Submit booking |
| GET | `/checkout/receipt/{id}` | Booking confirmation |
| GET | `/checkout/receipt/{id}/pdf` | Download PDF receipt |
| GET/POST | `/contact` | Contact form |

### Admin (requires auth + admin role)
| Method | URI | Description |
|---|---|---|
| GET | `/admin/dashboard` | Admin dashboard |
| Resource | `/admin/rooms` | Room CRUD |
| GET | `/admin/reservations` | Manage reservations |
| PATCH | `/admin/reservations/{id}/confirm` | Confirm reservation |
| PATCH | `/admin/reservations/{id}/mark-done` | Mark as completed |
| GET | `/admin/payments` | Payments list |
| GET | `/admin/reports` | Revenue reports |
| GET | `/admin/reports/pdf` | Export report as PDF |

---

## Testing

```bash
composer run test
# or
php artisan test
```

Tests are written using **PestPHP** and located in `tests/Feature/` and `tests/Unit/`.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 13 (PHP 8.2+) |
| Frontend | Blade templates, Tailwind CSS v4, Vite |
| Database | SQLite (dev) / MySQL (production) |
| PDF Generation | barryvdh/laravel-dompdf |
| Auth | Laravel built-in + Sanctum (API) |
| Testing | PestPHP |
| Deployment | Nixpacks (Railway-compatible) |

---

## License

This project is for academic/educational purposes.
---
 
## Developers
 
| Name |
|---|
| Justine Barlaan |
| RJ Joshua Zaratan |
| Kurt Palavino |
 
