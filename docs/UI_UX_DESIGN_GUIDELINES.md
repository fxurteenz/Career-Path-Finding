# คู่มือและแม่แบบการออกแบบ UX/UI (Design System Guidelines & Prompts Catalog)
## โครงการ: แพลตฟอร์มวัดระดับทักษะและสรุป Resume อิงสมรรถนะสำหรับนักศึกษา IT (Career-Path-Finding)

> **เอกสารอ้างอิงประจำโปรเจกต์:** จัดทำขึ้นเพื่อเป็นมาตรฐานและแนวทางปฏิบัติ (Living Guideline) สำหรับทีมนักพัฒนา, UX/UI Designer, และ AI Agent ในการออกแบบหน้าจอและแปลงเป็นโค้ดจริง (Blade + Livewire + Alpine.js + Tailwind CSS v4) ให้เป็นไปในทิศทางเดียวกัน 100%

---

## 1. วิสัยทัศน์และสไตล์การออกแบบ (Design Vision & Core Archetype)

แพลตฟอร์ม Career-Path-Finding ได้รับการออกแบบภายใต้แนวคิด **"Modern EdTech LMS with Gamified Bento Grid"** โดยผสมผสานความน่าเชื่อถือทางวิชาการ (Academic Credibility) ของกรอบสมรรถนะสากล **SFIA 9 (ระดับ 1–4)** เข้ากับความกระตือรือร้น ทันสมัย และเป็นมิตรต่อนักศึกษายุคใหม่:

1. **Bento Grid Architecture:** โครงสร้างหน้าจอหลักใช้เลย์เอาต์แบบ Bento Box จัดหมวดหมู่สารสนเทศ ตัวเลขสถิติ กราฟเรดาร์ และประวัติทักษะเป็นบล็อกสัดส่วนที่ชัดเจน เข้าใจง่ายในพริบตา
2. **Dark Sidebar + Light Content Canvas:**
   * **Sidebar (เมนูข้าง):** ใช้โทนสีมืดลึก (Dark Zinc/Deep Violet `#18181B`) ให้ความรู้สึกหรูหรา มั่นคง และช่วยลดสิ่งรบกวนสายตา
   * **Main Canvas (พื้นที่ทำงาน):** ใช้โทนสว่าง สะอาดตา คอนทราสต์สูง (`#F8FAFC` / `#FFFFFF`) พร้อมเงาฟุ้งนุ่มนวล (Soft Diffused Shadows) ทำให้อ่านข้อมูลผลการเรียนและคำอธิบายทักษะได้อย่างสบายตา
3. **Color Palette (ม่วง + เหลือง + Neon Pastel):**
   * **สีหลัก (Primary):** ม่วงสดลึก (Electric Violet `#7C3AED`) สะท้อนถึงปัญญา เทคโนโลยี และวิสัยทัศน์สู่อนาคต
   * **สีรอง (Secondary):** เหลืองอำพันสดใส (Vibrant Amber `#F59E0B`) สื่อถึงความสำเร็จ พลังงาน และการเติบโต
   * **Neon Pastel Accents:** เขียวมิ้นต์นีออน (`#A7F3D0`), ฟ้าไซแอนพาสเทล (`#BAE6FD`), ม่วงลาเวนเดอร์นีออน (`#DDD6FE`), และกุหลาบพาสเทล (`#FECDD3`) สำหรับป้ายระดับทักษะ SFIA และแจ้งเตือน Must-Have Flags
4. **Gamified Micro-Elements:**
   * เหรียญตราทักษะ (Skill Mastery Badges) แสดงเลเวล 1 ถึง 4
   * วงแหวนและแถบความคืบหน้า (Progress Rings & Level Bars)
   * ป้ายแจ้งเตือน Must-Have Alert Flag สำหรับทักษะจำเป็นที่ยังขาด
5. **Button & Icon Aesthetics:**
   * **Pill-shaped Buttons:** ปุ่มทรงแคปซูลโค้งมนสมบูรณ์ (`rounded-full`) เพิ่มความนุ่มนวล ทันสมัย
   * **3D Matte Icons:** ไอคอน 3 มิติผิวด้านโทนอบอุ่น (Claymorphic Matte Style) เป็นจุดนำสายตาสำหรับหัวข้อแดชบอร์ด

---

## 2. ระบบการออกแบบและโทเคน (Design Tokens & Utility Classes)

ระบบโทเคนถูกกำหนดไว้ใน `resources/css/app.css` ตามมาตรฐาน **Tailwind CSS v4** โดยใช้ CSS-first `@theme`:

### 2.1 ตารางโทนสี (Color Tokens)

| Token Name | ค่าสี (HEX) | Tailwind Utility Class | วัตถุประสงค์การใช้งาน |
|---|---|---|---|
| `primary` | `#7C3AED` | `bg-primary`, `text-primary` | ปุ่มหลัก, หัวข้อสำคัญ, แถบสถานะหลัก, แถบ Active ใน Sidebar |
| `primary-hover` | `#6D28D9` | `hover:bg-primary-hover` | สถานะ Hover ของปุ่มหลัก |
| `primary-light` | `#EDE9FE` | `bg-primary-light` | พื้นหลังป้ายกำกับ, กรอบการ์ดไฮไลต์ |
| `secondary` | `#F59E0B` | `bg-secondary`, `text-secondary` | ปุ่มรอง, ค่า % Match สูง, ไฮไลต์เป้าหมายอาชีพ |
| `secondary-light`| `#FEF3C7` | `bg-secondary-light` | พื้นหลังป้ายแจ้งเตือน, แถบสะสมคะแนน |
| `sidebar` | `#18181B` | `bg-sidebar` | พื้นหลังแถบนำทางด้านข้าง (Dark Zinc) |
| `sidebar-surface`| `#27272A` | `bg-sidebar-surface` | พื้นหลังปุ่มเมนู หรือการ์ดโปรไฟล์ย่อใน Sidebar |
| `canvas` | `#F8FAFC` | `bg-canvas` | พื้นหลังหน้าจอทำงานหลัก (Light Slate) |
| `surface` | `#FFFFFF` | `bg-surface` | พื้นหลังการ์ด Bento, ตาราง, และ Modal Dialog |
| `border` | `#E2E8F0` | `border-border` | เส้นขอบการ์ดและเส้นแบ่งทั่วไป (1px subtle border) |
| `foreground` | `#0F172A` | `text-foreground` | ข้อความหลักภาษาไทยและอังกฤษ (Slate 900) |
| `muted` | `#64748B` | `text-muted` | ข้อความรอง, คำอธิบายกำกับ, วันที่ |

### 2.2 โทนสีประจำระดับสมรรถนะ SFIA 9 (Gamified SFIA Tokens)

```
[Level 1: Follow]     ──> Neon Mint     (bg-[#A7F3D0] text-[#065F46])  (วิชาพื้นฐาน / เข้าร่วม)
[Level 2: Apply]      ──> Neon Cyan     (bg-[#BAE6FD] text-[#075985])  (วิชาประยุกต์ / โครงงานกลุ่ม)
[Level 3: Guide]      ──> Neon Lavender (bg-[#DDD6FE] text-[#5B21B6])  (หัวหน้าโครงงาน / การแข่งขัน)
[Level 4: Enable]     ──> Neon Amber    (bg-[#FDE68A] text-[#92400E])  (ผลงานวิจัย / Cert สากลขั้นสูง)
[Must-Have Flag Gap]  ──> Neon Rose     (bg-[#FECDD3] text-[#9F1239])  (ทักษะจำเป็นขาดเกณฑ์เตือนสีแดง)
```

### 2.3 ระบบตัวอักษร (Typography)

* **ฟอนต์หลักภาษาไทย:** `Prompt` (Google Fonts) — ฟอนต์ลูปเลส (Loopless) สไตล์โมเดิร์น ไร้หัว ลายเส้นคมชัด อ่านง่ายบนจอความละเอียดสูง
* **ฟอนต์หลักภาษาอังกฤษ/ตัวเลข:** `Plus Jakarta Sans` — สไตล์เรขาคณิต เรียบหรู เหมาะกับตัวเลขสถิติ, รหัสทักษะ SFIA (เช่น `PROG`, `SWDN`, `DBDS`), และอัตราร้อยละ

```html
<!-- ตัวอย่างการนำเข้าฟอนต์ใน Blade layout (<head>) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
```

### 2.4 กฎการแสดงผลและการเข้าถึง (Accessibility & Component Rules)
1. **Pill Buttons:** ปุ่มทั้งหมดใช้คลาส `rounded-full px-5 py-2.5 font-medium transition-all duration-200`
2. **Bento Card Styling:** การ์ดกล่องข้อมูลใช้ `bg-surface rounded-bento border border-border shadow-soft-sm p-6 hover:shadow-soft-md transition-shadow`
3. **Contrast Ratio:** ข้อความทั้งหมดต้องมีอัตราส่วนคอนทราสต์ไม่น้อยกว่า $4.5:1$ เทียบกับสีพื้นหลังตามมาตรฐาน WCAG 2.1 AA
4. **Mobile Responsiveness:** ในจอมือถือ (`< 768px`) ให้พับ Sidebar เป็น Bottom Navigation Bar หรือ Drawer อัตโนมัติ และแปลง Bento Grid จาก 3–4 คอลัมน์เป็น 1 คอลัมน์เรียงเดี่ยว

---

## 3. ผังความเชื่อมโยงฟีเจอร์ SRS สู่ 7 หน้าจอสำคัญ (Feature Mapping Matrix)

| รหัสหน้าจอ | ชื่อหน้าจอหลัก | กลุ่มผู้ใช้หลัก | ฟีเจอร์ที่เกี่ยวข้องจาก SRS | จุดเด่นทาง UX/UI |
|---|---|---|---|---|
| **SCREEN-01** | Student Dashboard & Skill Overview | นักศึกษา, บุคคลภายนอก | **F06, F09, F10** | Bento Grid 6 กล่อง, เป้าหมายตำแหน่งงาน, % Match, วงแหวน SFIA, กราฟพัฒนาการย้อนหลัง, ปุ่มลัดยื่นหลักฐาน |
| **SCREEN-02** | Interactive Flowchart Learning Roadmap | นักศึกษา, บุคคลภายนอก | **F08** | ผังภาพโต้ตอบ 2 แทร็ก (ในหลักสูตรตาม Prerequisite + กิจกรรมเสริม), แนะนำวิชาปิด Must-have gap ก่อน |
| **SCREEN-03** | Competency Resume & Privacy / Share Modal | นักศึกษา, บุคคลภายนอก | **F12, F13, F14** | เรซูเม่สไตล์สมรรถนะ, Radar Chart, ตัวนับยอดวิว, ปุ่ม Export PDF ภาษาไทย, ลิงก์แชร์ Token, สวิตช์ Opt-in PDPA |
| **SCREEN-04** | Unified Faculty Dashboard | อาจารย์ผู้สอน, ที่ปรึกษา | **F02, F04, F05** | แดชบอร์ด 2 แท็บ ("วิชาที่ฉันสอน" + "นักศึกษาในที่ปรึกษา"), นำเข้าเกรด CSV พร้อม Pre-validation, Badge งานค้าง |
| **SCREEN-05** | Evidence Verification Queue & Review Modal | อาจารย์ที่ปรึกษา, หน.สาขา | **F11** | ตารางคิวงานตรวจ, Drawer พรีวิวหลักฐานและไฟล์แนบ, ปรับเลเวล SFIA 1–4 หรือปฏิเสธพร้อมเหตุผล, อนุมัติแบบกลุ่ม |
| **SCREEN-06** | Employer Talent Search & Filter | ผู้ประกอบการ (HR) | **F15, F16** | ตัวกรองทักษะ SFIA ขั้นต่ำ, ค้นหาเฉพาะผู้ Opt-in, ป้ายกำกับ นศ. vs บุคคลภายนอก, รายการ Shortlist, ปุ่ม Express Interest |
| **SCREEN-07** | Analytics & Curriculum Gap Dashboard | แอดมิน, หัวหน้าสาขา | **F17** | บอร์ดสถิติ 4 รายงาน: สถิติการใช้งาน, งานตรวจค้าง, Curriculum Gap เทียบตลาด, ส่งออก Anonymized CSV เพื่องานวิจัย |

---

## 4. แคตตาล็อก Prompt สำหรับนำไปใช้งาน (AI Prompts Catalog)

> **วิธีใช้งาน:** คัดลอกข้อความในกล่องโค้ดของแต่ละหน้าจอ นำไปวางใน **Figma AI (Make Designs / First Draft / Plugins)** หรือ **Google Stitch** เพื่อสร้างเลย์เอาต์ต้นแบบทันที

---

### SCREEN-01: แดชบอร์ดนักศึกษาและภาพรวมสมรรถนะ (Student Dashboard & Skill Overview)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design a responsive Web Dashboard for "Career-Path-Finding", a competency-based career guidance platform for IT university students based on the SFIA 9 skill framework.

Aesthetic & Theme:
- Layout: Modern Bento Grid architecture with a Dark Sidebar on the left (w-64, background #18181B) and a crisp Light Canvas for the main dashboard (background #F8FAFC).
- Color Palette: Deep Electric Violet (#7C3AED) as primary, Vibrant Amber/Sun Yellow (#F59E0B) for target matches, with Neon Pastel badges (Mint #A7F3D0 for Level 1, Cyan #BAE6FD for Level 2, Lavender #DDD6FE for Level 3, Amber #FDE68A for Level 4, Rose #FECDD3 for Must-Have Flags).
- Buttons: All buttons must be pill-shaped (rounded-full).
- Visual Accents: Soft diffused shadows, subtle 1px border (#E2E8F0), 3D claymorphic matte icon accents.
- Typography: Thai headings in "Prompt", English/Numbers in "Plus Jakarta Sans".

Structure & Sections:
1. Left Sidebar (Dark #18181B):
   - Logo: "CareerPath IT" with a 3D matte purple rocket icon.
   - User Profile Snippet: "กิตติศักดิ์ สุขใจ" (Student ID: 66050123, ชั้นปีที่ 3 วิทยาการคอมพิวเตอร์) with avatar and level badge "Level 3 Explorer".
   - Navigation Menu with pill active indicators:
     * แดชบอร์ดภาพรวม (Active, bg-primary/20 text-purple-300 with purple glow)
     * แผนที่การเรียนรู้ (Roadmap)
     * เรซูเม่และพอร์ตโฟลิโอ
     * ยื่นหลักฐานผลงาน (Badge: 2 Pending)
     * การตั้งค่าความเป็นส่วนตัว
2. Main Content Area (Light #F8FAFC, 12-column Bento Grid):
   - Top Header Bar:
     * Welcome greeting: "สวัสดี กิตติศักดิ์! 🚀 เป้าหมาย: Full-Stack Developer"
     * Quick Action Pill Button: "+ ยื่นหลักฐานผลงานใหม่" (bg-primary text-white hover:bg-primary-hover shadow-soft-sm)
     * Bell icon with notification dot.
   - Bento Box 1 (Span 4, Top Left - Career Goal & Match %):
     * Title: "ความพร้อมสู่ตำแหน่งเป้าหมาย"
     * Large circular progress ring: "78% Match" in bold purple & amber ring.
     * Target Role: "Full-Stack Web Developer (SFIA Level 2-3)"
     * Alert Banner: "⚠️ ต้องเก็บเพิ่ม: SWDN (Software Design) อีก 1 ระดับ" (bg-rose-100 text-rose-800 rounded-xl p-3)
   - Bento Box 2 (Span 8, Top Right - SFIA Competency Mastery Radar & Badges):
     * Mini Radar chart visualizing 6 core SFIA skills: PROG (Level 3), SWDN (Level 2), DBDS (Level 3), TEST (Level 2), METL (Level 1), ITOP (Level 1).
     * 4 Gamified SFIA Level Badges with progress counts:
       - Level 1 Follow: 4 ทักษะ (Neon Mint pill)
       - Level 2 Apply: 3 ทักษะ (Neon Cyan pill)
       - Level 3 Guide: 2 ทักษะ (Neon Lavender pill)
       - Level 4 Enable: 0 ทักษะ (Neon Amber pill)
   - Bento Box 3 (Span 7, Bottom Left - Term Skill Growth Timeline [F09]):
     * Line/Area Chart showing skill index growth from Year 1 Term 1 to Year 3 Term 1.
     * Snapshot tags marking: "ภาค 1/2566: เริ่มต้น", "ภาค 2/2566: ปลดล็อก Level 2", "ภาค 1/2567: ชนะเลิศ Hackathon ได้ Level 3".
   - Bento Box 4 (Span 5, Bottom Right - Evidence Status & Recent Milestones):
     * List of recent activity submissions:
       - "โครงการ Senior Project: ระบบตรวจจับใบหน้า" -> Status: อนุมัติแล้ว (Approved Level 3, Neon Lavender Tag)
       - "ใบรับรอง AWS Cloud Practitioner" -> Status: รอตรวจ (Pending Advisor Review, Yellow Tag)
     * Link: "ดูประวัติหลักฐานทั้งหมด ->"

Tone: Inspiring, gamified, clear, data-driven, clean.
```

#### B. Google Stitch Prompt
```html
<div class="flex min-h-screen bg-[#F8FAFC] font-sans antialiased text-[#0F172A]">
  <!-- Dark Sidebar -->
  <aside class="w-64 bg-[#18181B] text-[#F4F4F5] flex flex-col justify-between p-6 border-r border-[#27272A] shrink-0 hidden md:flex">
    <div class="space-y-8">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-[#7C3AED] to-[#F59E0B] flex items-center justify-center shadow-lg text-white font-bold text-xl">CP</div>
        <div>
          <h1 class="font-bold text-lg tracking-tight">CareerPath</h1>
          <p class="text-xs text-[#A1A1AA]">IT Competency v1.0</p>
        </div>
      </div>

      <nav class="space-y-1.5">
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full bg-[#7C3AED] text-white font-medium shadow-md shadow-[#7C3AED]/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          <span>ภาพรวมทักษะ</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-[#A1A1AA] hover:text-white hover:bg-[#27272A] transition">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
          <span>แผนที่การเรียนรู้</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-full text-[#A1A1AA] hover:text-white hover:bg-[#27272A] transition">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          <span>เรซูเม่อิงสมรรถนะ</span>
        </a>
        <a href="#" class="flex items-center justify-between px-4 py-3 rounded-full text-[#A1A1AA] hover:text-white hover:bg-[#27272A] transition">
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            <span>ส่งหลักฐานผลงาน</span>
          </div>
          <span class="bg-[#F59E0B] text-black text-xs font-bold px-2 py-0.5 rounded-full">2</span>
        </a>
      </nav>
    </div>

    <!-- User Profile Card -->
    <div class="p-4 rounded-2xl bg-[#27272A] border border-[#3F3F46] flex items-center gap-3">
      <div class="w-10 h-10 rounded-full bg-[#7C3AED] text-white flex items-center justify-center font-bold">กส</div>
      <div class="overflow-hidden">
        <p class="text-sm font-semibold truncate">กิตติศักดิ์ สุขใจ</p>
        <p class="text-xs text-[#A1A1AA] truncate">นศ. ปี 3 • วิทยาการคอมฯ</p>
      </div>
    </div>
  </aside>

  <!-- Main Canvas -->
  <main class="flex-1 p-8 overflow-y-auto">
    <!-- Top Action Bar -->
    <header class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
      <div>
        <h2 class="text-2xl font-bold font-heading text-[#0F172A]">ภาพรวมระดับทักษะ & ความก้าวหน้า</h2>
        <p class="text-sm text-[#64748B]">อัปเดตล่าสุด: ประจำภาคการศึกษา 1/2567 (อิงกรอบสมรรถนะ SFIA 9)</p>
      </div>
      <div class="flex items-center gap-3">
        <button class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white px-6 py-2.5 rounded-full font-medium shadow-md shadow-[#7C3AED]/25 flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          <span>ยื่นหลักฐานผลงาน</span>
        </button>
      </div>
    </header>

    <!-- Bento Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
      <!-- Bento 1: Job Match -->
      <div class="md:col-span-4 bg-white rounded-[1.25rem] border border-[#E2E8F0] p-6 shadow-sm flex flex-col justify-between">
        <div>
          <span class="text-xs font-bold uppercase tracking-wider text-[#64748B]">เป้าหมายอาชีพในฝัน</span>
          <h3 class="text-xl font-bold text-[#0F172A] mt-1">Full-Stack Developer</h3>
          <p class="text-xs text-[#64748B] mt-0.5">เกณฑ์เป้าหมาย: SFIA Level 2-3</p>

          <div class="my-6 flex items-center justify-center">
            <div class="relative w-36 h-36 flex items-center justify-center">
              <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                <path class="text-[#EDE9FE]" stroke-width="3.5" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                <path class="text-[#7C3AED]" stroke-dasharray="78, 100" stroke-width="3.5" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
              </svg>
              <div class="absolute text-center">
                <span class="text-3xl font-extrabold text-[#7C3AED]">78%</span>
                <span class="block text-[11px] text-[#64748B] font-medium">ความพร้อม</span>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-[#FECDD3]/40 border border-[#FECDD3] rounded-2xl p-3 flex items-start gap-2.5">
          <span class="text-base">⚠️</span>
          <div class="text-xs">
            <span class="font-bold text-[#9F1239]">Must-Have Gap:</span>
            <span class="text-[#9F1239]"> ขาดทักษะ SWDN (Software Design) อีก 1 ระดับ</span>
          </div>
        </div>
      </div>

      <!-- Bento 2: SFIA Levels Mastery -->
      <div class="md:col-span-8 bg-white rounded-[1.25rem] border border-[#E2E8F0] p-6 shadow-sm flex flex-col justify-between">
        <div class="flex justify-between items-center mb-4">
          <div>
            <span class="text-xs font-bold uppercase tracking-wider text-[#64748B]">สมรรถนะสะสม (SFIA Framework)</span>
            <h3 class="text-lg font-bold text-[#0F172A]">ระดับทักษะที่ผ่านการรับรอง</h3>
          </div>
          <span class="text-xs font-semibold px-3 py-1 rounded-full bg-[#EDE9FE] text-[#7C3AED]">รวม 9 ทักษะ</span>
        </div>

        <!-- 4 Badges Row -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
          <div class="bg-[#F8FAFC] rounded-2xl p-4 border border-[#E2E8F0] text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#A7F3D0] text-[#065F46] mb-1">Level 1: Follow</span>
            <p class="text-2xl font-extrabold text-[#0F172A]">4</p>
            <p class="text-[11px] text-[#64748B]">วิชาพื้นฐาน</p>
          </div>
          <div class="bg-[#F8FAFC] rounded-2xl p-4 border border-[#E2E8F0] text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#BAE6FD] text-[#075985] mb-1">Level 2: Apply</span>
            <p class="text-2xl font-extrabold text-[#0F172A]">3</p>
            <p class="text-[11px] text-[#64748B]">วิชาประยุกต์</p>
          </div>
          <div class="bg-[#F8FAFC] rounded-2xl p-4 border border-[#E2E8F0] text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#DDD6FE] text-[#5B21B6] mb-1">Level 3: Guide</span>
            <p class="text-2xl font-extrabold text-[#0F172A]">2</p>
            <p class="text-[11px] text-[#64748B]">โครงงาน/แข่งขัน</p>
          </div>
          <div class="bg-[#F8FAFC] rounded-2xl p-4 border border-[#E2E8F0] text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#FDE68A] text-[#92400E] mb-1">Level 4: Enable</span>
            <p class="text-2xl font-extrabold text-[#0F172A]">0</p>
            <p class="text-[11px] text-[#64748B]">วิจัย/วุฒิบัตรขั้นสูง</p>
          </div>
        </div>

        <div class="flex flex-wrap gap-2">
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#5B21B6] border border-[#DDD6FE]">
            <span>PROG (Programming)</span>
            <span class="bg-[#7C3AED] text-white text-[10px] px-1.5 py-0.2 rounded-full">L3</span>
          </span>
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#5B21B6] border border-[#DDD6FE]">
            <span>DBDS (Database Design)</span>
            <span class="bg-[#7C3AED] text-white text-[10px] px-1.5 py-0.2 rounded-full">L3</span>
          </span>
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-[#E0F2FE] text-[#075985] border border-[#BAE6FD]">
            <span>SWDN (Software Design)</span>
            <span class="bg-[#0284C7] text-white text-[10px] px-1.5 py-0.2 rounded-full">L2</span>
          </span>
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-[#E0F2FE] text-[#075985] border border-[#BAE6FD]">
            <span>TEST (Software Testing)</span>
            <span class="bg-[#0284C7] text-white text-[10px] px-1.5 py-0.2 rounded-full">L2</span>
          </span>
        </div>
      </div>

      <!-- Bento 3: Skill Growth Chart -->
      <div class="md:col-span-7 bg-white rounded-[1.25rem] border border-[#E2E8F0] p-6 shadow-sm">
        <div class="flex justify-between items-center mb-4">
          <h4 class="font-bold text-[#0F172A]">พัฒนาการทักษะรายภาคเรียน (Skill Growth Snapshot)</h4>
          <span class="text-xs text-[#64748B]">ปี 1 ถึง ปี 3</span>
        </div>
        <!-- Mock Chart Visualization -->
        <div class="h-44 w-full bg-[#F8FAFC] rounded-2xl flex items-end justify-between p-4 gap-3 border border-dashed border-[#CBD5E1]">
          <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-[10px] text-[#64748B]">1.2</span>
            <div class="w-full bg-[#EDE9FE] rounded-t-lg h-12"></div>
            <span class="text-[10px] font-medium text-[#64748B]">1/2565</span>
          </div>
          <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-[10px] text-[#64748B]">1.8</span>
            <div class="w-full bg-[#DDD6FE] rounded-t-lg h-20"></div>
            <span class="text-[10px] font-medium text-[#64748B]">2/2565</span>
          </div>
          <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-[10px] text-[#64748B]">2.3</span>
            <div class="w-full bg-[#C4B5FD] rounded-t-lg h-28"></div>
            <span class="text-[10px] font-medium text-[#64748B]">1/2566</span>
          </div>
          <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-[10px] text-[#64748B]">2.7</span>
            <div class="w-full bg-[#A78BFA] rounded-t-lg h-34"></div>
            <span class="text-[10px] font-medium text-[#64748B]">2/2566</span>
          </div>
          <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-[10px] font-bold text-[#7C3AED]">3.1</span>
            <div class="w-full bg-[#7C3AED] rounded-t-lg h-40 shadow-sm"></div>
            <span class="text-[10px] font-bold text-[#7C3AED]">1/2567</span>
          </div>
        </div>
      </div>

      <!-- Bento 4: Evidence Queue Status -->
      <div class="md:col-span-5 bg-white rounded-[1.25rem] border border-[#E2E8F0] p-6 shadow-sm flex flex-col justify-between">
        <div>
          <div class="flex justify-between items-center mb-4">
            <h4 class="font-bold text-[#0F172A]">หลักฐานผลงานล่าสุด</h4>
            <a href="#" class="text-xs font-semibold text-[#7C3AED] hover:underline">ดูทั้งหมด -></a>
          </div>

          <div class="space-y-3">
            <div class="p-3 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
              <div>
                <p class="text-xs font-bold text-[#0F172A]">ระบบตรวจจับใบหน้า AI (Senior Project)</p>
                <p class="text-[11px] text-[#64748B]">อาจารย์ที่ปรึกษาอนุมัติแล้ว • PROG L3</p>
              </div>
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#A7F3D0] text-[#065F46]">อนุมัติ</span>
            </div>
            <div class="p-3 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
              <div>
                <p class="text-xs font-bold text-[#0F172A]">ใบรับรอง AWS Cloud Practitioner</p>
                <p class="text-[11px] text-[#64748B]">ยื่นเมื่อ 12 พ.ย. 2567 • ITOP L2</p>
              </div>
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#FEF3C7] text-[#92400E]">รอตรวจ</span>
            </div>
          </div>
        </div>

        <button class="w-full mt-4 py-2.5 rounded-full border border-dashed border-[#CBD5E1] text-[#64748B] hover:text-[#7C3AED] hover:border-[#7C3AED] text-xs font-semibold transition">
          + ส่งหลักฐานผลงานเพื่อเพิ่มคะแนน
        </button>
      </div>
    </div>
  </main>
</div>
```

---

### SCREEN-02: แผนที่เส้นทางการเรียนรู้ 2 แทร็ก (Interactive Visual Flowchart Roadmap)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design an interactive Visual Flowchart Learning Roadmap page for the "Career-Path-Finding" system [Feature F08].

Theme & Aesthetics:
- Visual Flowchart with a modern Dark Sidebar (#18181B) and Light Workspace (#F8FAFC).
- High visual hierarchy: Clear separation of 2 distinct learning tracks:
  1. แทร็กที่ 1: รายวิชาในหลักสูตร (Academic Track) - Organized strictly by Prerequisites and Terms (ปี 1 เทอม 1 ถึง ปี 4 เทอม 2), prioritizing courses that close Must-Have Skill Gaps first.
  2. แทร็กที่ 2: กิจกรรมเสริมและวุฒิบัตรสากล (Extracurricular & Industry Certifications) - Recommending competitions, hackathons, and global certs (AWS, Google Cloud, Cisco) to boost skills to SFIA Level 3 and Level 4.
- Node States:
  * Passed/Completed (bg-white border-2 border-emerald-400 with green checkmark and earned SFIA pill)
  * Recommended Next (bg-gradient-to-r from-purple-50 to-amber-50 border-2 border-purple-500 shadow-md with pulsing "แนะนำลงเทอมนี้" pill)
  * Locked/Prerequisite Not Met (bg-slate-100 border border-slate-300 opacity-60 with padlock icon)
- Connectors: Clean curved SVG bezier arrows showing prerequisite dependencies between course nodes.

Key UI Elements:
- Filter & Simulation Bar at Top:
  * Dropdown: "เป้าหมาย: Data Engineer (SFIA L2-3)"
  * Toggle: "โหมดจำลอง (What-If Simulation Mode F09)"
  * Legend: Passed (Mint), Recommended (Purple), Locked (Gray), Must-Have Gap closer (Amber badge).
- Flowchart Canvas: Interactive pan/zoom area containing the 2 tracks side-by-side or stacked with distinct color-coded lane headers.
- Course Node Details on Click (Right Drawer or Tooltip): Course code, title, prerequisites, mapped SFIA skills with expected level cap, and grade conversion rule.
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] flex flex-col font-sans text-[#0F172A]">
  <!-- Top Control Header -->
  <header class="bg-white border-b border-[#E2E8F0] px-8 py-5 flex flex-wrap items-center justify-between gap-4 sticky top-0 z-20 shadow-sm">
    <div class="flex items-center gap-4">
      <div class="w-10 h-10 rounded-2xl bg-[#7C3AED] text-white flex items-center justify-center font-bold">RM</div>
      <div>
        <h1 class="text-xl font-bold font-heading">แผนที่การเรียนรู้เชิงโต้ตอบ (Visual Flowchart Roadmap)</h1>
        <p class="text-xs text-[#64748B]">เส้นทางแนะนำสำหรับปิดช่องว่างทักษะสู่ตำแหน่ง: <span class="font-bold text-[#7C3AED]">Full-Stack Web Developer</span></p>
      </div>
    </div>

    <!-- Filter & Track Switcher -->
    <div class="flex items-center gap-3">
      <span class="text-xs text-[#64748B] font-medium hidden sm:inline">สัญลักษณ์:</span>
      <span class="inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full bg-[#A7F3D0] text-[#065F46]">✓ ผ่านแล้ว</span>
      <span class="inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full bg-[#EDE9FE] text-[#7C3AED] ring-2 ring-[#7C3AED]">★ แนะนำเทอมนี้</span>
      <span class="inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full bg-[#F1F5F9] text-[#64748B]">🔒 ติดเงื่อนไข</span>
      <button class="ml-2 bg-[#F59E0B] hover:bg-[#D97706] text-black font-semibold text-xs px-5 py-2 rounded-full transition shadow-sm">
        เปิดโหมด What-If
      </button>
    </div>
  </header>

  <!-- Flowchart Workspace -->
  <main class="flex-1 p-8 grid grid-cols-1 lg:grid-cols-12 gap-8 overflow-x-auto">
    <!-- Track 1: Academic Courses (8 Cols) -->
    <section class="lg:col-span-8 space-y-6">
      <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-3">
        <div class="flex items-center gap-2">
          <span class="w-3 h-3 rounded-full bg-[#7C3AED]"></span>
          <h2 class="text-lg font-bold text-[#0F172A]">แทร็กที่ 1: รายวิชาตามหลักสูตร (Academic Track)</h2>
        </div>
        <span class="text-xs text-[#64748B]">จัดลำดับเพื่อปิด Must-Have Gap ก่อน</span>
      </div>

      <!-- Term Group: ปี 2 เทอม 2 (Current / Recommended) -->
      <div class="space-y-4">
        <h3 class="text-xs font-bold uppercase tracking-wider text-[#7C3AED] bg-[#EDE9FE] inline-block px-3 py-1 rounded-full">
          ภาคการศึกษา 2/2566 (เทอมถัดไปที่ต้องลงทะเบียน)
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Recommended Node (Priority Gap Closer) -->
          <div class="bg-white rounded-2xl border-2 border-[#7C3AED] p-5 shadow-md relative hover:shadow-lg transition">
            <div class="absolute -top-3 right-4 bg-[#F59E0B] text-black text-[10px] font-extrabold px-3 py-0.5 rounded-full shadow-sm">
              ปิด Must-Have Gap
            </div>
            <div class="flex items-start justify-between">
              <div>
                <span class="text-xs font-bold text-[#7C3AED]">IT220</span>
                <h4 class="font-bold text-base text-[#0F172A] mt-0.5">Software Engineering</h4>
              </div>
              <span class="text-xs font-bold bg-[#EDE9FE] text-[#7C3AED] px-2 py-1 rounded-lg">3 หน่วยกิต</span>
            </div>
            <p class="text-xs text-[#64748B] mt-2">Prerequisite: IT110 Computer Programming (ผ่านแล้ว ✓)</p>
            <div class="mt-4 pt-3 border-t border-[#F1F5F9] flex items-center justify-between">
              <span class="text-xs font-medium text-[#64748B]">ทักษะเป้าหมาย:</span>
              <span class="bg-[#DDD6FE] text-[#5B21B6] text-xs font-bold px-2.5 py-0.5 rounded-full">SWDN Level 2</span>
            </div>
          </div>

          <!-- Normal Recommended Node -->
          <div class="bg-white rounded-2xl border border-[#CBD5E1] p-5 shadow-sm hover:border-[#7C3AED] transition">
            <div class="flex items-start justify-between">
              <div>
                <span class="text-xs font-bold text-[#64748B]">IT224</span>
                <h4 class="font-bold text-base text-[#0F172A] mt-0.5">Database Systems</h4>
              </div>
              <span class="text-xs font-bold bg-[#F1F5F9] text-[#64748B] px-2 py-1 rounded-lg">3 หน่วยกิต</span>
            </div>
            <p class="text-xs text-[#64748B] mt-2">Prerequisite: ไม่มี</p>
            <div class="mt-4 pt-3 border-t border-[#F1F5F9] flex items-center justify-between">
              <span class="text-xs font-medium text-[#64748B]">ทักษะเป้าหมาย:</span>
              <span class="bg-[#DDD6FE] text-[#5B21B6] text-xs font-bold px-2.5 py-0.5 rounded-full">DBDS Level 2</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Term Group: ปี 3 (Future / Prerequisite locked) -->
      <div class="space-y-4 pt-4">
        <h3 class="text-xs font-bold uppercase tracking-wider text-[#64748B] bg-[#F1F5F9] inline-block px-3 py-1 rounded-full">
          ภาคการศึกษา 1/2567 (ปี 3)
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-[#F8FAFC] rounded-2xl border border-dashed border-[#CBD5E1] p-5 opacity-75">
            <div class="flex items-start justify-between">
              <div>
                <span class="text-xs font-bold text-[#94A3B8]">IT331</span>
                <h4 class="font-bold text-base text-[#475569] mt-0.5">Web Application Architecture</h4>
              </div>
              <span class="text-xs text-[#94A3B8]">🔒 ล็อก</span>
            </div>
            <p class="text-xs text-[#94A3B8] mt-2">ต้องผ่าน: IT220 และ IT224 ก่อน</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Track 2: Extracurricular & Industry Certifications (4 Cols) -->
    <section class="lg:col-span-4 bg-white rounded-[1.25rem] border border-[#E2E8F0] p-6 shadow-sm space-y-6">
      <div class="border-b border-[#E2E8F0] pb-3">
        <div class="flex items-center gap-2">
          <span class="w-3 h-3 rounded-full bg-[#F59E0B]"></span>
          <h2 class="text-lg font-bold text-[#0F172A]">แทร็กที่ 2: กิจกรรมเสริม & Cert</h2>
        </div>
        <p class="text-xs text-[#64748B] mt-1">ดันสมรรถนะสู่ SFIA ระดับ 3–4 (ต้องมีหลักฐาน ≥ 2 แหล่ง)</p>
      </div>

      <!-- Opportunity Card 1 -->
      <div class="bg-[#FEF3C7]/40 border border-[#FDE68A] rounded-2xl p-4 space-y-2">
        <span class="bg-[#F59E0B] text-black text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">แนะนำสู่ Level 3</span>
        <h4 class="font-bold text-sm text-[#0F172A]">โครงการประกวดนวัตกรรม NSC / Hackathon</h4>
        <p class="text-xs text-[#64748B]">ยื่นผลงานพัฒนาโปรแกรมจริงในบทบาท Tech Lead หรือ Full-Stack Dev</p>
        <div class="pt-2 flex justify-between items-center text-xs">
          <span class="font-semibold text-[#7C3AED]">ยกระดับ: PROG -> L3</span>
          <button class="text-[#7C3AED] hover:underline font-bold">ส่งหลักฐาน -></button>
        </div>
      </div>

      <!-- Opportunity Card 2 -->
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-4 space-y-2">
        <span class="bg-[#EDE9FE] text-[#7C3AED] text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">Cert สากล</span>
        <h4 class="font-bold text-sm text-[#0F172A]">AWS Certified Developer Associate</h4>
        <p class="text-xs text-[#64748B]">สามารถใช้เทียบเคียงสมรรถนะคลาวด์และการติดตั้งระบบ</p>
        <div class="pt-2 flex justify-between items-center text-xs">
          <span class="font-semibold text-[#075985]">ยกระดับ: ITOP -> L3</span>
          <button class="text-[#7C3AED] hover:underline font-bold">ส่งหลักฐาน -></button>
        </div>
      </div>
    </section>
  </main>
</div>
```

---

### SCREEN-03: เรซูเม่และพอร์ตโฟลิโออิงสมรรถนะ (Competency Resume & Privacy Control)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design a Competency-Based Resume and Portfolio preview page with Granular Privacy & Public Share controls for "Career-Path-Finding" [Features F12, F13, F14].

Theme & Aesthetics:
- Minimalist Clean White Document Canvas (#FFFFFF) with subtle grey border (#E2E8F0), surrounded by a modern application interface with dark sidebar (#18181B).
- Header Action Bar:
  * Button 1 (Pill): "ดาวน์โหลด PDF ภาษาไทย" (bg-primary text-white rounded-full px-5 py-2.5 with printer/download icon) [F13].
  * Button 2 (Pill): "สร้างลิงก์แชร์ออนไลน์" (bg-secondary text-black rounded-full px-5 py-2.5 with link icon) [F14].
  * Button 3 (Pill): "ตั้งค่าความเป็นส่วนตัว (PDPA)" (border border-slate-300 text-slate-700 rounded-full px-5 py-2.5 with shield/gear icon) [F12].
  * Analytics Pill: "👁️ มีผู้เข้าชมแล้ว 42 ครั้ง" (bg-slate-100 text-slate-700 text-xs px-3 py-1 rounded-full).

Document Canvas (Formal Competency-Based Resume Style):
1. Candidate Header:
   - Full Name: "นายกิตติศักดิ์ สุขใจ (Kittisak Sukjai)"
   - Target Career: "Full-Stack Web Developer & Software Engineer"
   - Contact Info (Respecting Privacy Toggles): University Email, LinkedIn profile, GitHub URL. Phone number hidden based on student privacy setting.
2. Verified SFIA Skill Summary & Radar Chart:
   - SFIA Radar Chart showing 6 verified skills.
   - Skill Badges categorized by verified level with Faculty Advisor verification checkmark icons.
3. Verified Coursework & Academic Evidence:
   - List of key courses with grades and verified SFIA levels (e.g. IT220 Software Engineering - Grade A - SFIA SWDN Level 2).
4. Evidence & Projects Portfolio:
   - Project cards with GitHub links, project role, description, and faculty approved badge (Level 3 Verified).

Interactive Privacy Modal / Drawer [F12]:
- Master Switch: "เปิดให้ผู้ประกอบการค้นพบโปรไฟล์ (Employer Opt-In)" [ON/OFF]
- Granular Checkboxes:
  * [x] ซ่อนเบอร์โทรศัพท์ส่วนตัว (แสดงเฉพาะอีเมล)
  * [ ] ซ่อนเกรดเฉลี่ยสะสม (GPA) (แสดงเฉพาะระดับสมรรถนะ SFIA)
  * [x] แสดงเฉพาะผลงานที่ได้รับการอนุมัติแล้วเท่านั้น
- Danger Zone: "ขอลบบัญชีและทำลายข้อมูลส่วนบุคคลทั้งหมดตามสิทธิ์ PDPA" (Text button in red).
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] flex justify-center py-10 px-4 font-sans text-[#0F172A]">
  <div class="w-full max-w-4xl space-y-6">
    <!-- Action Bar -->
    <div class="bg-white rounded-2xl border border-[#E2E8F0] p-4 flex flex-wrap items-center justify-between gap-4 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#7C3AED]">
          <span class="w-2 h-2 rounded-full bg-[#7C3AED]"></span>
          เรซูเม่มาตรฐาน SFIA 9
        </span>
        <span class="text-xs text-[#64748B]">👁️ ผู้เข้าชม: <strong class="text-[#0F172A]">48 ครั้ง</strong></span>
      </div>

      <div class="flex items-center gap-2">
        <!-- Privacy Trigger -->
        <button class="px-4 py-2 rounded-full border border-[#CBD5E1] text-[#475569] hover:bg-[#F1F5F9] text-xs font-semibold transition flex items-center gap-1.5">
          <svg class="w-4 h-4 text-[#7C3AED]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          <span>ตั้งค่าความเป็นส่วนตัว</span>
        </button>

        <!-- Share Link -->
        <button class="px-4 py-2 rounded-full bg-[#FEF3C7] text-[#92400E] hover:bg-[#FDE68A] text-xs font-bold transition flex items-center gap-1.5">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
          <span>แชร์ลิงก์ออนไลน์</span>
        </button>

        <!-- Download PDF -->
        <button class="px-5 py-2 rounded-full bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold transition shadow-sm flex items-center gap-1.5">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
          <span>ดาวน์โหลด PDF</span>
        </button>
      </div>
    </div>

    <!-- Resume Document Sheet -->
    <article class="bg-white rounded-2xl border border-[#CBD5E1] p-10 shadow-lg space-y-8 font-sans">
      <!-- Candidate Header -->
      <header class="border-b border-[#E2E8F0] pb-6 flex justify-between items-start">
        <div>
          <h1 class="text-3xl font-extrabold font-heading text-[#0F172A]">นายกิตติศักดิ์ สุขใจ</h1>
          <p class="text-base font-semibold text-[#7C3AED] mt-1">Full-Stack Web Developer & Software Engineer</p>
          <p class="text-xs text-[#64748B] mt-1">สาขาวิชาวิทยาการคอมพิวเตอร์ • คณะเทคโนโลยีสารสนเทศ</p>
        </div>
        <div class="text-right text-xs space-y-1 text-[#64748B]">
          <p>📧 kittisak.s@university.ac.th</p>
          <p>🔗 github.com/kittisak-dev</p>
          <p class="text-emerald-600 font-semibold">✓ ยืนยันตัวตนผ่านมหาวิทยาลัยแล้ว</p>
        </div>
      </header>

      <!-- Competency Summary -->
      <section class="space-y-4">
        <div class="flex items-center gap-2 border-l-4 border-[#7C3AED] pl-3">
          <h2 class="text-base font-bold uppercase tracking-wider text-[#0F172A]">สมรรถนะทักษะที่ผ่านการรับรอง (SFIA 9 Verified Skills)</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div class="p-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-[#0F172A]">PROG : Programming / Software Development</span>
              <p class="text-[11px] text-[#64748B]">ผ่านการรับรอง 2 แหล่ง (วิชาเรียน + Senior Project)</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#DDD6FE] text-[#5B21B6]">Level 3</span>
          </div>

          <div class="p-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-[#0F172A]">DBDS : Database Design</span>
              <p class="text-[11px] text-[#64748B]">ผ่านการรับรอง 2 แหล่ง (วิชา IT224 + กิจกรรม)</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#DDD6FE] text-[#5B21B6]">Level 3</span>
          </div>

          <div class="p-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-[#0F172A]">SWDN : Software Design</span>
              <p class="text-[11px] text-[#64748B]">ผ่านการรับรอง 1 แหล่ง (วิชา IT220 Grade A)</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#BAE6FD] text-[#075985]">Level 2</span>
          </div>

          <div class="p-3 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-between">
            <div>
              <span class="text-xs font-bold text-[#0F172A]">TEST : Software Testing</span>
              <p class="text-[11px] text-[#64748B]">ผ่านการรับรอง 1 แหล่ง (วิชา IT330 Grade B+)</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#BAE6FD] text-[#075985]">Level 2</span>
          </div>
        </div>
      </section>

      <!-- Verified Evidence Projects -->
      <section class="space-y-4">
        <div class="flex items-center gap-2 border-l-4 border-[#F59E0B] pl-3">
          <h2 class="text-base font-bold uppercase tracking-wider text-[#0F172A]">ผลงานและหลักฐานเชิงประจักษ์ (Evidence & Projects)</h2>
        </div>

        <div class="border border-[#E2E8F0] rounded-2xl p-5 space-y-2">
          <div class="flex justify-between items-start">
            <h3 class="font-bold text-sm text-[#0F172A]">ระบบตรวจจับและรู้จำใบหน้าสำหรับการบันทึกเวลาเรียน (Face Attendance AI)</h3>
            <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-[#A7F3D0] text-[#065F46]">อาจารย์ที่ปรึกษารับรองแล้ว</span>
          </div>
          <p class="text-xs text-[#475569]">
            บทบาท: Full-Stack Developer & AI Integrator | พัฒนาด้วย Laravel, Python OpenCV, และ Tailwind CSS รองรับผู้ใช้กว่า 500 คน
          </p>
          <div class="text-xs text-[#7C3AED] font-semibold pt-1">
            🔗 github.com/kittisak-dev/face-attendance-sys
          </div>
        </div>
      </section>
    </article>
  </div>
</div>
```

---

### SCREEN-04: แดชบอร์ดอาจารย์รวม 2 แท็บ (Unified Faculty Dashboard)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design the Unified Faculty Dashboard for university course instructors and academic advisors [Features F02, F04, F05].

Theme & Aesthetics:
- Professional, Clean, Academic-Management layout.
- Left Dark Sidebar (#18181B) with Faculty profile badge "ผศ.ดร. ภาณุพงศ์ (อาจารย์ผู้สอน & ที่ปรึกษา)".
- Main Canvas (#F8FAFC) featuring a high-contrast Tabbed Navigation:
  * Tab 1: "วิชาที่ฉันสอน (Course Teaching & Grade Import)" [F04, F05]
  * Tab 2: "นักศึกษาในที่ปรึกษา (Advisee Verification Queue)" with red badge indicator "8 งานค้างตรวจ" [F02, F11]

Tab 1: วิชาที่ฉันสอน:
- Active Courses Grid/List:
  * Card: "IT220 Software Engineering (ภาค 1/2567)" - 74 นักศึกษา
  * Quick Actions on Card:
    - Button (Pill): "นำเข้าเกรดจาก CSV" (with Pre-validation preview modal F04)
    - Button (Pill): "ตั้งค่าเกณฑ์แปลงเกรดเป็น SFIA" (F05 modal showing A, B+ -> Cap Level 2; B, C+ -> Level 1)
- Recent Grade Import Status Table with validation errors highlighted in soft red rows.

Tab 2: นักศึกษาในที่ปรึกษา:
- Summary KPI Cards:
  * Card 1: "นักศึกษาในความดูแลทั้งหมด: 42 คน"
  * Card 2: "คำขอตรวจหลักฐานที่รออนุมัติ: 8 รายการ" (Highlighted in soft amber)
  * Card 3: "อนุมัติแล้วในเทอมนี้: 34 รายการ"
- Table previewing students with pending evidence submissions, showing student name, activity title, proposed SFIA skill, and "ตรวจหลักฐาน" button.
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] flex font-sans text-[#0F172A]">
  <!-- Dark Sidebar -->
  <aside class="w-64 bg-[#18181B] text-white p-6 flex flex-col justify-between hidden md:flex shrink-0">
    <div class="space-y-6">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-[#7C3AED] flex items-center justify-center font-bold">FA</div>
        <div>
          <h2 class="font-bold text-sm">Faculty Portal</h2>
          <p class="text-[11px] text-[#A1A1AA]">คณะเทคโนโลยีสารสนเทศ</p>
        </div>
      </div>
      <nav class="space-y-2">
        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-full bg-[#7C3AED] text-white text-xs font-semibold">
          <span>📊 แดชบอร์ดอาจารย์</span>
        </a>
        <a href="#" class="flex items-center justify-between px-4 py-2.5 rounded-full text-[#A1A1AA] hover:bg-[#27272A] text-xs font-medium">
          <span>คิวตรวจหลักฐาน</span>
          <span class="bg-[#EF4444] text-white text-[10px] px-2 py-0.5 rounded-full font-bold">8</span>
        </a>
      </nav>
    </div>

    <div class="p-3 bg-[#27272A] rounded-2xl flex items-center gap-3">
      <div class="w-8 h-8 rounded-full bg-[#F59E0B] text-black font-bold flex items-center justify-center text-xs">ผศ</div>
      <div class="overflow-hidden">
        <p class="text-xs font-semibold truncate">ผศ.ดร. ภาณุพงศ์</p>
        <p class="text-[10px] text-[#A1A1AA] truncate">อาจารย์ที่ปรึกษา & ผู้สอน</p>
      </div>
    </div>
  </aside>

  <!-- Main Canvas -->
  <main class="flex-1 p-8 overflow-y-auto">
    <div class="max-w-6xl mx-auto space-y-6">
      <header class="flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-bold font-heading">แดชบอร์ดงานอาจารย์ (Unified Faculty Hub)</h1>
          <p class="text-xs text-[#64748B]">จัดการเกรดรายวิชาและตรวจรับรองสมรรถนะนักศึกษาในที่ปรึกษา</p>
        </div>
      </header>

      <!-- 2 Tabs Switcher -->
      <div class="flex border-b border-[#E2E8F0] gap-4">
        <button class="pb-3 px-2 border-b-2 border-[#7C3AED] text-[#7C3AED] font-bold text-sm flex items-center gap-2">
          <span>📚 วิชาที่ฉันสอน (Grade & Mapping)</span>
        </button>
        <button class="pb-3 px-2 border-b-2 border-transparent text-[#64748B] hover:text-[#0F172A] font-semibold text-sm flex items-center gap-2">
          <span>🎓 นักศึกษาในที่ปรึกษา (Advisee Queue)</span>
          <span class="bg-[#EF4444] text-white text-[10px] font-bold px-2 py-0.2 rounded-full">8</span>
        </button>
      </div>

      <!-- Tab Content 1: Teaching Courses -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 shadow-sm space-y-4">
          <div class="flex justify-between items-start">
            <div>
              <span class="text-xs font-bold text-[#7C3AED]">ภาคเรียนที่ 1/2567</span>
              <h3 class="text-lg font-bold text-[#0F172A] mt-0.5">IT220 Software Engineering</h3>
              <p class="text-xs text-[#64748B]">จำนวนนักศึกษา: 74 คน • ทักษะ: SWDN (Cap Level 2)</p>
            </div>
            <span class="bg-[#A7F3D0] text-[#065F46] text-[10px] font-bold px-2.5 py-1 rounded-full">บันทึกเกรดแล้ว</span>
          </div>

          <div class="flex items-center gap-2 pt-2 border-t border-[#F1F5F9]">
            <button class="flex-1 py-2 rounded-full border border-[#CBD5E1] text-[#475569] hover:bg-[#F8FAFC] text-xs font-semibold transition">
              ⚙️ ปรับเกณฑ์แปลงเกรด
            </button>
            <button class="flex-1 py-2 rounded-full bg-[#7C3AED] text-white hover:bg-[#6D28D9] text-xs font-semibold transition">
              📥 นำเข้า CSV ซ่อมเกรด
            </button>
          </div>
        </div>

        <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 shadow-sm space-y-4">
          <div class="flex justify-between items-start">
            <div>
              <span class="text-xs font-bold text-[#7C3AED]">ภาคเรียนที่ 1/2567</span>
              <h3 class="text-lg font-bold text-[#0F172A] mt-0.5">IT331 Web Architecture</h3>
              <p class="text-xs text-[#64748B]">จำนวนนักศึกษา: 48 คน • ทักษะ: PROG (Cap Level 3)</p>
            </div>
            <span class="bg-[#FEF3C7] text-[#92400E] text-[10px] font-bold px-2.5 py-1 rounded-full">รอนำเข้าเกรด</span>
          </div>

          <div class="flex items-center gap-2 pt-2 border-t border-[#F1F5F9]">
            <button class="flex-1 py-2 rounded-full border border-[#CBD5E1] text-[#475569] hover:bg-[#F8FAFC] text-xs font-semibold transition">
              ⚙️ ปรับเกณฑ์แปลงเกรด
            </button>
            <button class="flex-1 py-2 rounded-full bg-[#7C3AED] text-white hover:bg-[#6D28D9] text-xs font-semibold transition">
              📥 นำเข้าเกรด CSV
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
```

---

### SCREEN-05: คิวงานตรวจหลักฐานและการอนุมัติ (Faculty Evidence Verification Queue & Modal)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design the Faculty Evidence Verification Queue & Detail Approval Modal for academic advisors [Feature F11].

Theme & Aesthetics:
- Clean, High-Contrast Data Table with Batch Actions and a slide-over Review Drawer / Modal.
- Table Layout:
  * Columns: Checkbox, วันที่ยื่น, รหัสนักศึกษา/ชื่อ, ชื่องาน/กิจกรรม, หมวดหมู่ (การแข่งขัน/โครงการ/Cert), ทักษะที่ขอรับรอง (Self-declared SFIA), ไฟล์แนบ, การกระทำ.
  * Status Pills: "รอตรวจ (Pending)" in Amber, "อนุมัติแล้ว (Approved)" in Mint, "ปฏิเสธ (Rejected)" in Rose.
- Top Action Bar:
  * Search bar & Filters (Filter by Category, Skill, Status).
  * Batch Button: "อนุมัติตามที่เสนอ (Batch Approve)" (Pill button).

Review Drawer / Modal Design:
- Left Column (Evidence Details & File Preview):
  * Student Name & Avatar.
  * Activity Title & Role: "รองชนะเลิศ Hackathon ประจำปี 2567 (บทบาท Full-Stack Dev)".
  * Description & External Link (GitHub repo / Drive link).
  * Embedded PDF / Image viewer showing the uploaded certificate.
- Right Column (Faculty Decision Panel):
  * Requested SFIA Skill: "PROG - Programming (ระดับที่ขอ: Level 3)".
  * Radio options to adjust level:
    - ( ) อนุมัติที่ Level 1
    - ( ) อนุมัติที่ Level 2
    - (*) อนุมัติที่ Level 3 (ตามที่เสนอ)
    - ( ) อนุมัติที่ Level 4 (ต้องส่งต่อหัวหน้าสาขาวิชา)
  * Reject option with required reason text area.
  * Buttons: "ยกเลิก" (Cancel), "ยืนยันผลการประเมิน (Submit Review)" (bg-primary text-white rounded-full).
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] p-8 font-sans text-[#0F172A]">
  <div class="max-w-6xl mx-auto space-y-6">
    <div class="flex justify-between items-center">
      <div>
        <h1 class="text-2xl font-bold font-heading">คิวงานตรวจหลักฐานผลงานนักศึกษา</h1>
        <p class="text-xs text-[#64748B]">อาจารย์ที่ปรึกษาสามารถตรวจสอบเอกสารและอนุมัติระดับสมรรถนะ SFIA ได้ทันที</p>
      </div>
      <div class="flex gap-2">
        <button class="bg-[#10B981] text-white px-5 py-2 rounded-full text-xs font-bold shadow-sm hover:bg-[#059669] transition">
          ✓ อนุมัติที่เลือก (Batch Approve)
        </button>
      </div>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm overflow-hidden">
      <table class="w-full text-left text-xs border-collapse">
        <thead class="bg-[#F8FAFC] text-[#64748B] border-b border-[#E2E8F0]">
          <tr>
            <th class="p-4 w-10"><input type="checkbox" class="rounded text-[#7C3AED]"></th>
            <th class="p-4 font-semibold">นักศึกษา</th>
            <th class="p-4 font-semibold">ชื่อผลงาน / กิจกรรม</th>
            <th class="p-4 font-semibold">ทักษะที่เสนอ (Self-declare)</th>
            <th class="p-4 font-semibold">ไฟล์แนบ</th>
            <th class="p-4 font-semibold">สถานะ</th>
            <th class="p-4 font-semibold text-right">ดำเนินการ</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#F1F5F9]">
          <tr class="hover:bg-[#F8FAFC] transition">
            <td class="p-4"><input type="checkbox" class="rounded text-[#7C3AED]"></td>
            <td class="p-4 font-medium">
              <p class="font-bold text-[#0F172A]">กิตติศักดิ์ สุขใจ</p>
              <p class="text-[11px] text-[#64748B]">66050123 • ชั้นปีที่ 3</p>
            </td>
            <td class="p-4">
              <p class="font-semibold text-[#0F172A]">ระบบตรวจจับใบหน้า AI (Senior Project)</p>
              <p class="text-[11px] text-[#64748B]">หมวด: โครงงานวิชาการ</p>
            </td>
            <td class="p-4">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#DDD6FE] text-[#5B21B6] font-bold">
                PROG Level 3
              </span>
            </td>
            <td class="p-4">
              <a href="#" class="text-[#7C3AED] hover:underline font-semibold flex items-center gap-1">
                📄 cert.pdf (2.4MB)
              </a>
            </td>
            <td class="p-4">
              <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#FEF3C7] text-[#92400E]">รอการตรวจ</span>
            </td>
            <td class="p-4 text-right">
              <button class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white px-4 py-1.5 rounded-full font-semibold text-xs shadow-sm transition">
                ตรวจหลักฐาน
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
```

---

### SCREEN-06: ระบบค้นหาและคัดกรองของผู้ประกอบการ (Employer Talent Search & Filter)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design the Employer Talent Search & Candidate Filter page for corporate recruiters and HR managers [Features F15, F16].

Theme & Aesthetics:
- Fast, Responsive, High-Contrast Talent Discovery Portal.
- Top / Left Filter Panel:
  * Multi-select SFIA Skill filter with minimum required level slider (e.g. PROG ≥ Level 2, DBDS ≥ Level 2).
  * Candidate Type Toggle: All / Only University Students (Verified) / External Learners.
  * Opt-in Filter: Only displays candidates who enabled "Employer Discovery" [F12].
  * Sort by: Highest % Match, Skill Level, Recent Activity.

Candidate Results Grid:
- Cards displaying candidate profiles in Bento Card style:
  * Name & Target Role: "กิตติศักดิ์ สุขใจ • Full-Stack Developer"
  * Tag Badges: "Verified Student" (Green pill) or "External / Self-declared" (Orange pill) [F15].
  * Match Score Widget: Big pill "92% Job Match".
  * Verified SFIA Skills pills.
  * Contact info preview: Email, LinkedIn, GitHub (Respecting privacy settings).
  * Action Buttons:
    - Button 1: "บันทึกใน Shortlist" (Heart / Bookmark icon) [F16].
    - Button 2: "ส่งอีเมล Express Interest" (bg-secondary text-black rounded-full font-bold) [F16].
    - Button 3: "ดู Resume เต็ม" (text-primary hover:underline).
- Top Right Batch Export: "ส่งออกรายชื่อ Shortlist เป็น CSV" (Pill button) [F16].
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] p-8 font-sans text-[#0F172A]">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="flex flex-wrap justify-between items-center gap-4">
      <div>
        <h1 class="text-2xl font-bold font-heading">ระบบค้นหาผู้มีความสามารถอิงสมรรถนะ (Talent Search)</h1>
        <p class="text-xs text-[#64748B]">ค้นหานักศึกษาและผู้เรียนที่มีทักษะ SFIA ตรงตามความต้องการขององค์กร</p>
      </div>
      <div class="flex items-center gap-3">
        <button class="bg-white border border-[#CBD5E1] text-[#475569] px-4 py-2 rounded-full text-xs font-semibold hover:bg-[#F1F5F9] transition flex items-center gap-2">
          <span>❤️ รายชื่อที่บันทึก (Shortlist: 3 คน)</span>
        </button>
        <button class="bg-[#F59E0B] text-black font-bold px-5 py-2 rounded-full text-xs shadow-sm hover:bg-[#D97706] transition">
          📥 ส่งออก CSV
        </button>
      </div>
    </header>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-5 rounded-2xl border border-[#E2E8F0] shadow-sm grid grid-cols-1 md:grid-cols-4 gap-4">
      <div>
        <label class="block text-xs font-bold text-[#64748B] mb-1">ทักษะ SFIA ที่ต้องการ</label>
        <select class="w-full text-xs rounded-xl border-[#CBD5E1] p-2 bg-[#F8FAFC]">
          <option>PROG - Programming (ขั้นต่ำ L2)</option>
          <option>DBDS - Database Design</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-[#64748B] mb-1">ตำแหน่งงานเป้าหมาย</label>
        <select class="w-full text-xs rounded-xl border-[#CBD5E1] p-2 bg-[#F8FAFC]">
          <option>Full-Stack Web Developer</option>
          <option>Data Engineer</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-[#64748B] mb-1">กลุ่มผู้สมัคร</label>
        <select class="w-full text-xs rounded-xl border-[#CBD5E1] p-2 bg-[#F8FAFC]">
          <option>นักศึกษาในสถาบัน (รับรองโดยอาจารย์)</option>
          <option>บุคคลภายนอก (Self-declared)</option>
        </select>
      </div>
      <div class="flex items-end">
        <button class="w-full bg-[#7C3AED] hover:bg-[#6D28D9] text-white py-2 rounded-full text-xs font-bold transition shadow-sm">
          🔍 ค้นหาผู้สมัคร
        </button>
      </div>
    </div>

    <!-- Candidate Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 shadow-sm hover:shadow-md transition flex flex-col justify-between space-y-4">
        <div>
          <div class="flex justify-between items-start">
            <span class="bg-[#A7F3D0] text-[#065F46] text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">นักศึกษาในสถาบัน</span>
            <span class="bg-[#EDE9FE] text-[#7C3AED] text-xs font-extrabold px-3 py-1 rounded-full">92% Match</span>
          </div>

          <div class="mt-4">
            <h3 class="text-lg font-bold text-[#0F172A]">กิตติศักดิ์ สุขใจ</h3>
            <p class="text-xs text-[#7C3AED] font-semibold">เป้าหมาย: Full-Stack Web Developer</p>
            <p class="text-xs text-[#64748B] mt-0.5">คณะเทคโนโลยีสารสนเทศ • นศ. ปี 3</p>
          </div>

          <div class="mt-4 flex flex-wrap gap-1.5">
            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-[#DDD6FE] text-[#5B21B6]">PROG L3</span>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-[#DDD6FE] text-[#5B21B6]">DBDS L3</span>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-[#BAE6FD] text-[#075985]">SWDN L2</span>
          </div>
        </div>

        <div class="pt-4 border-t border-[#F1F5F9] flex items-center gap-2">
          <button class="flex-1 bg-[#F59E0B] hover:bg-[#D97706] text-black text-xs font-bold py-2 rounded-full transition shadow-sm">
            Express Interest ✉️
          </button>
          <button class="p-2 border border-[#CBD5E1] rounded-full hover:bg-[#F8FAFC] text-[#64748B]">
            ❤️
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
```

---

### SCREEN-07: แดชบอร์ดสถิติและรายงานเพื่อการวิจัย (Analytics & Curriculum Gap Dashboard)

#### A. Figma AI Design Prompt
```text
Role & Context:
Design the Administrator and Department Head Analytics Dashboard for curriculum improvement and institutional research [Feature F17].

Theme & Aesthetics:
- Deep Analytics Bento Grid combining KPI counters, Curriculum Gap Radar/Bar charts, and Research Data Exporting.
- Dark Sidebar (#18181B) with Department Head profile indicator.
- Main Canvas (#F8FAFC) featuring 4 Core Reports:
  1. สถิติการใช้งานระบบ (System Usage & Student Engagement)
  2. งานตรวจค้างสะสม (Pending Advisor Reviews Bottleneck Tracker)
  3. Curriculum Skill Gap Analysis (เปรียบเทียบระดับทักษะที่หลักสูตรผลิตได้ vs ความต้องการของตลาดแรงงานตามประกาศงาน)
  4. Anonymized Data Export for Academic Research (ส่งออก CSV นิรนามที่ตัดชื่อและรหัสนักศึกษาออก)

Visual Charts:
- Curriculum Gap Bar Chart: Comparing average SFIA levels achieved by graduating seniors vs Industry standard. Highlights gaps in red/amber (e.g. Software Testing gap -0.8 level).
- Advisor Review Workload Table: Listing faculty members and average review turnaround time in days.
- Research Action: Big button with lock/shield icon: "ส่งออกชุดข้อมูลนิรนามเพื่องานวิจัย (Export Anonymized CSV)" [F17].
```

#### B. Google Stitch Prompt
```html
<div class="min-h-screen bg-[#F8FAFC] p-8 font-sans text-[#0F172A]">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="flex justify-between items-center">
      <div>
        <h1 class="text-2xl font-bold font-heading">แดชบอร์ดสถิติ & รายงานวิเคราะห์หลักสูตร</h1>
        <p class="text-xs text-[#64748B]">สำหรับหัวหน้าสาขาวิชาและผู้ดูแลระบบ (อิงกรอบสมรรถนะ SFIA 9 เพื่องานวิจัยและประกันคุณภาพ)</p>
      </div>
      <button class="bg-[#18181B] hover:bg-black text-white px-5 py-2.5 rounded-full text-xs font-bold transition shadow-md flex items-center gap-2">
        <svg class="w-4 h-4 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <span>ส่งออก Anonymized CSV (เพื่องานวิจัย)</span>
      </button>
    </header>

    <!-- 4 KPI Bento Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
      <div class="bg-white p-5 rounded-2xl border border-[#E2E8F0] shadow-sm">
        <span class="text-xs font-bold text-[#64748B]">นักศึกษาใช้งานสะสม</span>
        <p class="text-2xl font-extrabold text-[#7C3AED] mt-1">482 คน</p>
        <span class="text-[11px] text-emerald-600 font-semibold">↑ 18% จากเทอมก่อน</span>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-[#E2E8F0] shadow-sm">
        <span class="text-xs font-bold text-[#64748B]">งานตรวจค้างของอาจารย์</span>
        <p class="text-2xl font-extrabold text-[#EF4444] mt-1">24 รายการ</p>
        <span class="text-[11px] text-[#64748B]">ระยะเวลาเฉลี่ย: 2.1 วัน</span>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-[#E2E8F0] shadow-sm">
        <span class="text-xs font-bold text-[#64748B]">ทักษะที่ผ่านการรับรอง</span>
        <p class="text-2xl font-extrabold text-[#0F172A] mt-1">1,420 ทักษะ</p>
        <span class="text-[11px] text-[#7C3AED] font-semibold">เฉลี่ย 2.9 ทักษะ/คน</span>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-[#E2E8F0] shadow-sm">
        <span class="text-xs font-bold text-[#64748B]">ผู้ประกอบการที่ติดต่อ</span>
        <p class="text-2xl font-extrabold text-[#F59E0B] mt-1">36 บริษัท</p>
        <span class="text-[11px] text-emerald-600 font-semibold">ส่ง Express Interest 84 ครั้ง</span>
      </div>
    </div>

    <!-- Curriculum Skill Gap Analysis Report -->
    <div class="bg-white rounded-2xl border border-[#E2E8F0] p-6 shadow-sm space-y-4">
      <div class="flex justify-between items-center">
        <div>
          <h2 class="text-lg font-bold text-[#0F172A]">การวิเคราะห์ช่องว่างทักษะหลักสูตร (Curriculum Skill Gap Report)</h2>
          <p class="text-xs text-[#64748B]">เปรียบเทียบระดับสมรรถนะเฉลี่ยของบัณฑิต กับความต้องการของตลาดงานสาย IT</p>
        </div>
      </div>

      <div class="space-y-3 pt-2">
        <div>
          <div class="flex justify-between text-xs font-semibold mb-1">
            <span>PROG : Programming & Development</span>
            <span class="text-emerald-600 font-bold">เกินเกณฑ์ตลาด (+0.3)</span>
          </div>
          <div class="w-full bg-[#EDE9FE] h-3 rounded-full overflow-hidden">
            <div class="bg-[#7C3AED] h-full rounded-full" style="width: 85%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between text-xs font-semibold mb-1">
            <span>TEST : Software Testing & Quality Assurance</span>
            <span class="text-rose-600 font-bold">ต่ำกว่าเกณฑ์ตลาด (-0.7) ⚠️ ต้องเสริมวิชาเลือก</span>
          </div>
          <div class="w-full bg-[#FECDD3] h-3 rounded-full overflow-hidden">
            <div class="bg-[#EF4444] h-full rounded-full" style="width: 45%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```

---

## 5. คำแนะนำสำหรับการแปลงเป็นโค้ดจริง (Developer Implementation Guide)

สำหรับทีมพัฒนาและน้องฝึกงาน เมื่อนำ Mockup หรือ Wireframe จาก Figma/Stitch มาแปลงเป็นโค้ดจริง ให้ปฏิบัติตามกฎใน `AGENTS.md` อย่างเคร่งครัด:

1. **โครงสร้าง Layout (Blade Template):**
   * ใช้ Blade Layout ร่วมกันที่ `resources/views/layouts/app.blade.php` โดยมี Sidebar โทนเข้ม (`#18181B`) และพื้นที่ Content Canvas สว่าง (`#F8FAFC`)
2. **การจัดการจุดโต้ตอบ (Interactive Micro-interactions):**
   * **Alpine.js:** ใช้จัดการการเปิด/ปิด Modal ตั้งค่าความเป็นส่วนตัว (PDPA), Dropdown, Tab toggling, หรือ Tooltip พรีวิว เพื่อไม่ให้สร้างภาระแก่ Server
   * **Livewire 3 Components:** ใช้สำหรับจุดที่มีการส่งข้อมูลหาเซิร์ฟเวอร์แบบ Dynamic เช่น:
     * ตัวกรองค้นหานักศึกษาของผู้ประกอบการ (`F15`)
     * ฟอร์มส่งและอัปโหลดหลักฐานผลงาน (`F10`)
     * คิวงานตรวจหลักฐานของอาจารย์ (`F11`)
     * หน้าแสดงและ Preview ข้อมูลจากไฟล์ CSV (`F04`)
3. **การตกแต่งด้วย Tailwind CSS v4:**
   * เรียกใช้ Utility Classes ตาม Semantic Tokens ที่กำหนดไว้ใน `resources/css/app.css` เช่น `bg-primary`, `bg-secondary`, `bg-neon-mint`, `rounded-full`, `rounded-bento`
   * ห้ามเขียน Inline Style หรือ `<style>` ในไฟล์ Blade
4. **การคำนวณและ Business Logic:**
   * ตรรกะการคำนวณ % Job Match, SFIA Level cap, หรือการวิเคราะห์ช่องว่างทักษะ ต้องเขียนใน `app/Services/` เท่านั้น ห้ามเขียนใน Controller หรือ View
