# Product Requirements Document (PRD)

**Project:** Portfolio Website
**Version:** 1.0
**Date:** June 13, 2026
**Author:** Wiratama Satrio Herlambang

---

## 1. Overview

Portfolio Website adalah platform personal untuk menampilkan profil, pengalaman organisasi (HIMA & BEM), dan project yang pernah dikerjakan. Platform ini dibangun dengan arsitektur admin panel untuk pengelolaan konten dan halaman publik untuk pengunjung.

---

## 2. Tech Stack

### Backend
- **Framework:** Laravel 12.0
- **PHP:** ^8.2
- **Authentication:** Laravel Breeze (session-based)
- **Database:** MySQL (via Laravel migrations)

### Frontend
- **CSS Framework:** Tailwind CSS 3.1
- **JavaScript:** Alpine.js 3.4, Vanilla JS
- **Build Tool:** Vite 7.0
- **Font:** Inter

---

## 3. Architecture

### 3.1 System Architecture

```
┌─────────────────────────────────────────────────────┐
│                    PUBLIC PAGES                      │
│  ┌─────────┐  ┌──────────────┐  ┌───────────────┐  │
│  │ Homepage │  │  Pengalaman  │  │    Project     │  │
│  │          │  │  HIMA | BEM  │  │   Listing      │  │
│  └─────────┘  └──────────────┘  └───────────────┘  │
└─────────────────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────┐
│                   ADMIN PANEL                        │
│  ┌───────────┐  ┌──────────────┐  ┌─────────────┐  │
│  │ Dashboard  │  │ Edit Profil  │  │Edit Pengalaman│ │
│  └───────────┘  └──────────────┘  └─────────────┘  │
│  ┌──────────────┐  ┌─────────────────────────────┐  │
│  │ Edit Project │  │       Authentication         │  │
│  └──────────────┘  └─────────────────────────────┘  │
└─────────────────────────────────────────────────────┘
```

### 3.2 Database Schema

#### Table: users
| Column | Type | Description |
|--------|------|-------------|
| id | bigint (PK) | Auto-increment ID |
| name | varchar | User name |
| email | varchar | User email (unique) |
| email_verified_at | timestamp | Email verification timestamp |
| password | varchar | Hashed password |
| remember_token | varchar | Remember me token |
| created_at | timestamp | Created timestamp |
| updated_at | timestamp | Updated timestamp |

#### Table: profiles
| Column | Type | Default | Description |
|--------|------|---------|-------------|
| id | bigint (PK) | - | Auto-increment ID |
| nama | varchar | null | Full name |
| deskripsi | text | null | Bio/description |
| foto | varchar | null | Profile photo path |
| foto_hima | varchar | null | HIMA organization photo |
| foto_bem | varchar | null | BEM organization photo |
| judul_hima | varchar | 'HIMA' | HIMA title |
| deskripsi_hima | varchar | 'Himpunan Mahasiswa Informatika' | HIMA description |
| judul_bem | varchar | 'BEM' | BEM title |
| deskripsi_bem | varchar | 'Badan Eksekutif Mahasiswa' | BEM description |
| email | varchar | null | Contact email |
| no_hp | varchar | null | Phone number |
| instagram | varchar | null | Instagram URL |
| linkedin | varchar | null | LinkedIn URL |
| github | varchar | null | GitHub URL |
| created_at | timestamp | - | Created timestamp |
| updated_at | timestamp | - | Updated timestamp |

#### Table: pengalamans
| Column | Type | Default | Description |
|--------|------|---------|-------------|
| id | bigint (PK) | - | Auto-increment ID |
| nama_organisasi | varchar | - | Organization name |
| jabatan | varchar | - | Position/title |
| tanggal_mulai | date | - | Start date |
| tanggal_selesai | date | null | End date (null = current) |
| deskripsi | text | null | Description |
| foto | varchar | null | Photo path |
| kategori | varchar | 'hima' | Category: 'hima' or 'bem' |
| created_at | timestamp | - | Created timestamp |
| updated_at | timestamp | - | Updated timestamp |

#### Table: projects
| Column | Type | Description |
|--------|------|-------------|
| id | bigint (PK) | Auto-increment ID |
| judul | varchar | Project title |
| deskripsi | text | Project description (nullable) |
| gambar | varchar | Project image path |
| link_github | varchar | GitHub repository URL |
| link_demo | varchar | Live demo URL |
| teknologi | json | Technology stack (array) |
| created_at | timestamp | Created timestamp |
| updated_at | timestamp | Updated timestamp |

---

## 4. Features

### 4.1 Public Features

#### 4.1.1 Homepage (`/`)
- Hero section with profile photo, name, description
- Social media links (Email, Instagram, LinkedIn, GitHub)
- Pengalaman Organisasi section with 2 clickable cards (HIMA & BEM)
- Project showcase (latest 3 projects)
- Contact section ("Mari Terhubung")

#### 4.1.2 Pengalaman Landing (`/pengalaman`)
- Two selection cards: HIMA (green theme) & BEM (blue theme)
- Configurable title & description from admin
- Organization photos from admin

#### 4.1.3 Pengalaman HIMA (`/pengalaman/hima`)
- Header with HIMA icon, title, description
- List of all HIMA experiences (filtered by kategori='hima')
- Each item shows: photo, organization name, position, date range, description

#### 4.1.4 Pengalaman BEM (`/pengalaman/bem`)
- Same structure as HIMA page but with blue theme
- Lists all BEM experiences (filtered by kategori='bem')

#### 4.1.5 Project Listing (`/project`)
- Responsive grid layout (1/2/3 columns)
- Each project shows: image, title, description, tech stack badges
- Links to GitHub repository and live demo

### 4.2 Admin Features

#### 4.2.1 Dashboard (`/admin`)
- Status profil indicator (Lengkap/Belum Diisi)
- Total pengalaman count
- Total project count

#### 4.2.2 Edit Profil (`/admin/edit-profil`)
- Upload/change profile photo
- Edit basic info: nama, deskripsi
- Edit contact info: email, no_hp
- Edit social media: Instagram, LinkedIn, GitHub

#### 4.2.3 Edit Pengalaman (`/admin/edit-pengalaman`)
- **Foto Organisasi:**
  - Upload foto HIMA & BEM
  - Edit judul & deskripsi HIMA & BEM
- **Daftar Pengalaman:**
  - Add new pengalaman (nama, kategori, jabatan, tanggal, foto, deskripsi)
  - Edit existing pengalaman (inline edit)
  - Delete pengalaman (with confirmation)
  - Category badge: HIMA (green) / BEM (blue)

#### 4.2.4 Edit Project (`/admin/edit-project`)
- Add new project (judul, deskripsi, gambar, links, teknologi)
- Edit existing project (inline edit)
- Delete project (with confirmation)
- Tech stack input: comma-separated, stored as JSON array

### 4.3 Authentication

- Login with email & password
- Registration
- Forgot/Reset password
- Email verification
- Password confirmation
- Logout

---

## 5. Routes

### 5.1 Public Routes

| Method | URI | Description |
|--------|-----|-------------|
| GET | `/` | Homepage |
| GET | `/pengalaman` | Pengalaman landing |
| GET | `/pengalaman/hima` | HIMA experiences |
| GET | `/pengalaman/bem` | BEM experiences |
| GET | `/project` | Project listing |

### 5.2 Admin Routes (auth middleware)

| Method | URI | Description |
|--------|-----|-------------|
| GET | `/admin` | Dashboard |
| GET | `/admin/edit-profil` | Edit profile page |
| PUT | `/admin/edit-profil` | Update profile |
| GET | `/admin/edit-pengalaman` | Edit pengalaman page |
| PUT | `/admin/edit-pengalaman/foto-organisasi` | Update org photos |
| POST | `/admin/edit-pengalaman` | Create pengalaman |
| PUT | `/admin/edit-pengalaman/{id}` | Update pengalaman |
| DELETE | `/admin/edit-pengalaman/{id}` | Delete pengalaman |
| GET | `/admin/edit-project` | Edit project page |
| POST | `/admin/edit-project` | Create project |
| PUT | `/admin/edit-project/{id}` | Update project |
| DELETE | `/admin/edit-project/{id}` | Delete project |

---

## 6. File Storage Structure

```
storage/app/public/
├── foto-profile/          # Profile photos
├── foto-organisasi/       # HIMA & BEM organization photos
├── foto-pengalaman/       # Experience photos
└── gambar-project/        # Project images
```

- **Allowed formats:** JPG, JPEG, PNG, WebP
- **Max size:** 2MB per file
- Old files are automatically deleted when replaced

---

## 7. Design System

### 7.1 Public Pages
- **Theme:** Dark (`bg-[#0a0a0a]`, white text)
- **Accent Colors:** Emerald (HIMA), Blue (BEM)
- **Font:** Inter
- **Animations:** Slide-up on load, fade-in on scroll, hover effects

### 7.2 Admin Panel
- **Theme:** Light (white/gray background)
- **Primary Color:** Blue (`#2563eb`)
- **Font:** Inter
- **Layout:** Sidebar navigation + main content

---

## 8. Default Credentials

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@portfolio.com | password |

---

## 9. File Structure

```
project_Profile/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── PortfolioController.php
│   │   │   ├── Auth/                    # Breeze auth controllers
│   │   │   ├── HomeController.php
│   │   │   ├── PengalamanController.php
│   │   │   ├── ProfileController.php
│   │   │   └── ProjectController.php
│   │   └── Requests/
│   ├── Models/
│   │   ├── Pengalaman.php
│   │   ├── Profile.php
│   │   ├── Project.php
│   │   └── User.php
│   └── View/Components/
│       ├── AppLayout.php
│       └── GuestLayout.php
├── database/
│   ├── migrations/           # 9 migration files
│   └── seeders/              # 4 seeder files
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── profil/edit.blade.php
│       │   ├── pengalaman/edit.blade.php
│       │   └── project/edit.blade.php
│       ├── auth/             # 6 auth views
│       ├── components/
│       │   ├── layouts/
│       │   │   ├── admin.blade.php
│       │   │   └── portfolio.blade.php
│       │   └── (Breeze components)
│       ├── pengalaman/
│       │   ├── index.blade.php
│       │   ├── hima.blade.php
│       │   └── bem.blade.php
│       ├── project/
│       │   └── index.blade.php
│       └── welcome.blade.php
├── routes/
│   ├── web.php
│   └── auth.php
├── composer.json
├── package.json
├── prd.md                   # This document
└── README.md
```

---

## 10. Validation Rules

### Profile Update
| Field | Rules |
|-------|-------|
| nama | required, string, max:255 |
| deskripsi | nullable, string |
| email | nullable, email, max:255 |
| no_hp | nullable, string, max:20 |
| instagram | nullable, string, max:255 |
| linkedin | nullable, string, max:255 |
| github | nullable, string, max:255 |
| foto | nullable, image, mimes:jpg,jpeg,png,webp, max:2048 |

### Pengalaman
| Field | Rules |
|-------|-------|
| nama_organisasi | required, string, max:255 |
| jabatan | required, string, max:255 |
| kategori | required, in:hima,bem |
| tanggal_mulai | required, date |
| tanggal_selesai | nullable, date, after_or_equal:tanggal_mulai |
| deskripsi | nullable, string |
| foto | nullable, image, mimes:jpg,jpeg,png,webp, max:2048 |

### Project
| Field | Rules |
|-------|-------|
| judul | required, string, max:255 |
| deskripsi | nullable, string |
| gambar | nullable, image, mimes:jpg,jpeg,png,webp, max:2048 |
| link_github | nullable, string, max:255 |
| link_demo | nullable, string, max:255 |
| teknologi | nullable, string |

---

## 11. Future Improvements

- [ ] Role-based access control (admin vs regular user)
- [ ] API endpoints for mobile app integration
- [ ] Image optimization & compression
- [ ] Email notification for contact form
- [ ] SEO meta tags optimization
- [ ] Analytics integration
- [ ] Multi-language support
- [ ] Dark mode toggle for admin panel
- [ ] Drag & drop image upload
- [ ] Rich text editor for descriptions
