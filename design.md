# Design System Document

**Project:** Portfolio Website
**Version:** 1.0
**Date:** June 13, 2026

---

## 1. Design Principles

1. **Minimalis** - Tampilan bersih tanpa elemen berlebih
2. **Konsisten** - Warna, tipografi, dan spasi seragam di semua halaman
3. **Responsif** - Berfungsi dengan baik di mobile, tablet, dan desktop
4. **Aksesibel** - Kontras warna memenuhi standar WCAG

---

## 2. Color Palette

### 2.1 Public Pages (Dark Theme)

| Token | Hex | RGB | Penggunaan |
|-------|-----|-----|------------|
| `bg-primary` | `#0a0a0a` | 10, 10, 10 | Background utama |
| `bg-card` | `rgba(255,255,255,0.03)` | - | Background card |
| `border-card` | `rgba(255,255,255,0.1)` | - | Border card |
| `text-primary` | `#ffffff` | 255, 255, 255 | Teks utama |
| `text-secondary` | `rgba(255,255,255,0.6)` | - | Teks deskripsi |
| `text-muted` | `#6b7280` | 107, 114, 128 | Teks tidak aktif |
| `accent-emerald` | `#34d399` | 52, 211, 153 | Aksen HIMA |
| `accent-blue` | `#3b82f6` | 59, 130, 246 | Aksen BEM |

### 2.2 Admin Panel (Light Theme)

| Token | Hex | RGB | Penggunaan |
|-------|-----|-----|------------|
| `bg-primary` | `#ffffff` | 255, 255, 255 | Background utama |
| `bg-secondary` | `#f9fafb` | 249, 250, 251 | Background sidebar |
| `bg-gray` | `#f3f4f6` | 243, 244, 246 | Background input |
| `border-default` | `#e5e7eb` | 229, 231, 235 | Border default |
| `text-primary` | `#111827` | 17, 24, 39 | Teks utama |
| `text-secondary` | `#6b7280` | 107, 114, 128 | Teks sekunder |
| `primary` | `#2563eb` | 37, 99, 235 | Tombol utama |
| `primary-hover` | `#1d4ed8` | 29, 78, 216 | Hover tombol |
| `success` | `#10b981` | 16, 185, 129 | Success message |
| `danger` | `#ef4444` | 239, 68, 68 | Hapus/error |

---

## 3. Typography

### 3.1 Font Family

```css
font-family: 'Inter', sans-serif;
```

### 3.2 Font Sizes (Tailwind Classes)

| Class | Size | Weight | Penggunaan |
|-------|------|--------|------------|
| `text-xs` | 12px | 400-500 | Label, badge |
| `text-sm` | 14px | 400-500 | Deskripsi, input |
| `text-base` | 16px | 400 | Body text |
| `text-lg` | 18px | 400-600 | Sub-heading |
| `text-xl` | 20px | 600-700 | Card title |
| `text-2xl` | 24px | 700 | Section title |
| `text-3xl` | 30px | 700-800 | Page title |
| `text-4xl` | 36px | 700-800 | Hero title |
| `text-5xl` | 48px | 700-800 | Hero title (large) |

### 3.3 Line Heights

| Class | Value | Penggunaan |
|-------|-------|------------|
| `leading-tight` | 1.25 | Heading |
| `leading-snug` | 1.375 | Sub-heading |
| `leading-normal` | 1.5 | Body text |
| `leading-relaxed` | 1.625 | Long description |

---

## 4. Spacing System

### 4.1 Padding & Margin (Tailwind Scale)

| Class | Value | Penggunaan |
|-------|-------|------------|
| `p-2` | 8px | Padding kecil |
| `p-4` | 16px | Padding card |
| `p-5` | 20px | Padding card besar |
| `p-6` | 24px | Padding section |
| `px-6` | 24px (horizontal) | Container padding |
| `py-20` | 80px (vertical) | Section spacing |
| `gap-4` | 16px | Grid gap |
| `gap-6` | 24px | Grid gap besar |
| `gap-8` | 32px | Grid gap ekstra |

### 4.2 Container Max Width

| Class | Value | Penggunaan |
|-------|-------|------------|
| `max-w-2xl` | 672px | Form, kartu sempit |
| `max-w-4xl` | 896px | Grid 2 kolom |
| `max-w-6xl` | 1152px | Container utama |

---

## 5. Border & Radius

### 5.1 Border Radius

| Class | Value | Penggunaan |
|-------|-------|------------|
| `rounded-lg` | 8px | Tombol kecil, badge |
| `rounded-xl` | 12px | Input, card kecil |
| `rounded-2xl` | 16px | Card, foto profil |
| `rounded-3xl` | 24px | Card besar |
| `rounded-full` | 9999px | Avatar, badge |

### 5.2 Border Width

| Class | Value | Penggunaan |
|-------|-------|------------|
| `border` | 1px | Default border |
| `border-2` | 2px | Active border |
| `border-4` | 4px | Foto profil border |

---

## 6. Shadows

### 6.1 Box Shadows

| Class | Penggunaan |
|-------|------------|
| `shadow-lg` | Tombol utama |
| `shadow-xl` | Card hover |
| `shadow-2xl` | Card besar hover |
| `shadow-gray-200/50` | Card admin hover |
| `shadow-emerald-500/10` | Card HIMA hover |
| `shadow-blue-500/10` | Card BEM hover |

---

## 7. Components

### 7.1 Buttons

#### Primary Button
```html
<button class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-lg shadow-blue-500/25">
    Simpan
</button>
```

#### Secondary Button
```html
<button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50">
    Batal
</button>
```

#### Danger Button
```html
<button class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100">
    Hapus
</button>
```

### 7.2 Form Inputs

#### Text Input
```html
<input type="text" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
```

#### File Input
```html
<input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 file:cursor-pointer">
```

#### Select Input
```html
<select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    <option value="hima">HIMA</option>
    <option value="bem">BEM</option>
</select>
```

### 7.3 Cards

#### Public Card (Dark)
```html
<div class="rounded-2xl bg-white/[0.03] border border-white/10 hover:border-emerald-500/40 transition-all duration-500 hover:shadow-2xl">
    <!-- content -->
</div>
```

#### Admin Card (Light)
```html
<div class="bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg hover:shadow-gray-200/50 transition-all duration-300">
    <!-- content -->
</div>
```

### 7.4 Badges

#### HIMA Badge
```html
<span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">HIMA</span>
```

#### BEM Badge
```html
<span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">BEM</span>
```

### 7.5 Navigation Tabs

```html
<button class="tab-btn active px-6 py-4 text-sm font-semibold text-center border-b-2">
    Tab Label
</button>

<style>
    .tab-btn { color: #6b7280; border-color: transparent; }
    .tab-btn.active { color: #2563eb; border-color: #2563eb; }
    .tab-btn:hover:not(.active) { color: #374151; background-color: #f9fafb; }
</style>
```

---

## 8. Layout Patterns

### 8.1 Public Layout

```
┌─────────────────────────────────────┐
│            Hero Section             │
│  ┌──────────┐  ┌────────────────┐  │
│  │  Text    │  │  Foto Profil   │  │
│  └──────────┘  └────────────────┘  │
├─────────────────────────────────────┤
│        Pengalaman Section           │
│  ┌──────────┐  ┌────────────────┐  │
│  │   HIMA   │  │      BEM       │  │
│  └──────────┘  └────────────────┘  │
├─────────────────────────────────────┤
│         Project Section             │
│  ┌─────┐  ┌─────┐  ┌─────┐       │
│  │  1  │  │  2  │  │  3  │       │
│  └─────┘  └─────┘  └─────┘       │
├─────────────────────────────────────┤
│          Contact Section            │
│         [Email] [LinkedIn]          │
├─────────────────────────────────────┤
│             Footer                  │
└─────────────────────────────────────┘
```

### 8.2 Admin Layout

```
┌──────────┬──────────────────────────┐
│ Sidebar  │      Main Content        │
│ ┌──────┐ │  ┌────────────────────┐  │
│ │Logo  │ │  │   Page Title       │  │
│ ├──────┤ │  ├────────────────────┤  │
│ │Dash  │ │  │                    │  │
│ │Profil│ │  │   Form / List      │  │
│ │Pengal│ │  │                    │  │
│ │Proj  │ │  │                    │  │
│ ├──────┤ │  │                    │  │
│ │Logout│ │  └────────────────────┘  │
│ └──────┘ │                          │
└──────────┴──────────────────────────┘
```

---

## 9. Responsive Breakpoints

| Breakpoint | Width | Columns | Padding |
|------------|-------|---------|---------|
| Default | < 640px | 1 | `px-6` |
| `sm:` | ≥ 640px | 2 | `px-6` |
| `lg:` | ≥ 1024px | 3 | `px-8` |

---

## 10. Animations

### 10.1 Page Load

```css
@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-on-load { animation: slideUp 0.6s ease forwards; }
```

### 10.2 Card Scroll

```css
.card-animate {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.5s ease;
}
.card-animate.visible {
    opacity: 1;
    transform: translateY(0);
}
```

### 10.3 Hover Effects

```css
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}
```

### 10.4 Nav Link Underline

```css
.nav-link::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 50%;
    width: 0;
    height: 2px;
    background: #34d399;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}
.nav-link:hover::after,
.nav-link.active::after {
    width: 100%;
}
```

---

## 11. Icon System

### 11.1 Icons Used

| Icon | SVG Path | Penggunaan |
|------|----------|------------|
| Home | `M3 12l2-2m0 0l7-7 7 7M5 10v10a1...` | Dashboard |
| User | `M16 7a4 4 0 11-8 0 4 4 0 018 0...` | Profil |
| Briefcase | `M21 13.255A23.931 23.931 0 0112...` | Pengalaman |
| Code | `M10 20l4-16m4 4l4 4-4 4M6 16...` | Project |
| Plus | `M12 4v16m8-8H4` | Tambah |
| Edit | `M11 5H6a2 2 0 00-2 2v11a2 2...` | Edit |
| Trash | `M19 7l-.867 12.142A2 2 0 0116...` | Hapus |
| Arrow Left | `M15 19l-7-7 7-7` | Kembali |
| Arrow Right | `M9 5l7 7-7 7` | Lihat |
| Check | `M9 12l2 2 4-4m6 2a9 9 0 11-18...` | Success |
| Warning | `M12 8v4m0 4h.01M21 12a9 9 0 11...` | Error |

### 11.2 Icon Sizes

| Class | Size | Penggunaan |
|-------|------|------------|
| `w-4 h-4` | 16px | Inline icons |
| `w-5 h-5` | 20px | Menu icons |
| `w-6 h-6` | 24px | Card icons |
| `w-8 h-8` | 32px | Section icons |
| `w-10 h-10` | 40px | Empty state icons |
| `w-12 h-12` | 48px | Large icons |

---

## 12. Design Constraints

### 12.1 Warna yang Digunakan
- **Public:** Hanya gunakan `emerald` untuk HIMA dan `blue` untuk BEM
- **Admin:** Hanya gunakan `blue` sebagai primary color

### 12.2 Font yang Digunakan
- **Hanya Inter** - Tidak boleh menggunakan font lain

### 12.3 Border Radius yang Digunakan
- **Public:** `rounded-2xl` untuk card, `rounded-xl` untuk foto
- **Admin:** `rounded-xl` untuk input, `rounded-2xl` untuk card

### 12.4 Spacing yang Digunakan
- **Section:** `py-20` (80px vertical padding)
- **Container:** `px-6` mobile, `px-8` desktop
- **Card Gap:** `gap-6` atau `gap-8`

### 12.5禁忌 (Yang Tidak Boleh Dilakukan)
1. ❌ Tidak boleh menggunakan warna selain emerald/blue untuk aksen
2. ❌ Tidak boleh menggunakan font selain Inter
3. ❌ Tidak boleh menggunakan border-radius < 8px
4. ❌ Tidak boleh menggunakan shadow hitam pekat
5. ❌ Tidak boleh menggunakan animasi berlebihan (> 0.7s)
6. ❌ Tidak boleh menggunakan gradient lebih dari 2 warna
