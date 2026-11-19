# มาตรฐานและข้อกำหนดการพัฒนาซอฟต์แวร์สำหรับ AI Agent (Career-Path-Finding)

> **สำหรับ AI Agent ทุกตัว (Antigravity, Cursor, Claude Code, GitHub Copilot):**
> คุณกำลังทำงานร่วมกับทีมผู้พัฒนาในตำแหน่ง Junior/Intern และมี Tech Lead ดูแลภาพรวม
> คุณต้องปฏิบัติตามมาตรฐานและกฎเกณฑ์ในเอกสารนี้อย่างเคร่งครัดในทุกไฟล์และทุกคำสั่ง เพื่อให้คุณภาพโค้ดและสถาปัตยกรรมเป็นไปในทิศทางเดียวกัน 100%

---

## 1. ขอบเขตและสเปกระบบ (System Specifications)
* **เอกสารอ้างอิงสูงสุด:** ข้อกำหนดและฟังก์ชันทั้งหมดต้องยึดตามเอกสาร `docs/SRS.md` เป็นหลัก
* **ความถูกต้องตามฟีเจอร์:** ทุกงานที่ทำต้องระบุรหัสฟีเจอร์เสมอ (เช่น `F01`, `F10`) และต้องตรวจสอบให้ผ่านเกณฑ์ **Acceptance Criteria** ในตาราง Must-Have ของฟีเจอร์นั้นๆ ก่อนถือว่าเสร็จสิ้นงาน
* **ภาษาของระบบ:** หน้าจอ UI, ข้อความแจ้งเตือน (Flash messages, Validation errors), คำอธิบายทักษะ SFIA และเอกสารเรซูเม่อิงสมรรถนะ ให้ใช้ **ภาษาไทย** เป็นหลักตามที่กำหนดใน SRS

---

## 2. กฎเหล็กด้านฐานข้อมูล (Database & DevOps Policy)
> [!CAUTION]
> **Tech Lead เป็นผู้รับผิดชอบดูแล Database และ Server เพียงผู้เดียว**

1. **ห้ามสร้างหรือแก้ไข Migration เองเด็ดขาด:** AI Agent ห้ามรันคำสั่งสร้างไฟล์ migration ใหม่ หรือแก้ไขไฟล์ในโฟลเดอร์ `database/migrations/` โดยไม่ได้รับอนุญาต
2. **ใช้ Schema และ Model ตามที่เตรียมไว้:** ให้เรียกใช้งานโครงสร้างตารางและ Eloquent Model ตามที่กำหนดในหัวข้อที่ 5 (Data Specifications) ของ `docs/SRS.md` เท่านั้น
3. **กรณีต้องการฟิลด์เพิ่ม:** หากพบว่าฟิลด์ในฐานข้อมูลไม่เพียงพอต่อการทำงาน ให้หยุดและแจ้งให้นักพัฒนาปรึกษา Tech Lead เพื่อดำเนินการปรับแต่ง Schema
4. **ห้ามรันคำสั่งทำลายข้อมูล:** ห้ามรันคำสั่ง `php artisan migrate:fresh`, `migrate:reset`, หรือ `db:wipe` ในทุกกรณี

---

## 3. สถาปัตยกรรม Backend (Backend Architecture)
ใช้รูปแบบ **Skinny Controller + Form Request + Service Layer** เพื่อความสะอาดและง่ายต่อการดูแล:

```
[ Request ] ──> [ FormRequest ] ──> [ Controller ] ──> [ Service Layer ] ──> [ Model / DB ]
                     (Validate)          (Route/Call)        (Business Logic)
```

1. **Controller (Skinny):**
   * มีหน้าที่เพียงรับคำสั่งจาก Route, เรียกใช้ Service หรือ Model และส่งผลลัพธ์กลับไปยัง View หรือ Redirect
   * ห้ามเขียน Business Logic, การคำนวณซับซ้อน หรือการจัดการไฟล์ดิบยาวเหยียดใน Controller
2. **Validation (Form Request):**
   * การตรวจสอบความถูกต้องของข้อมูล (Validation) ทั้งหมด ต้องสร้างเป็น Form Request Class ใน `app/Http/Requests/` เสมอ
   * ห้ามเขียน `$request->validate([...])` แบบ inline ภายใน Controller
3. **Business Logic & Calculations (Service Layer):**
   * ตรรกะการประมวลผลที่ซับซ้อน (เช่น การคำนวณคะแนน SFIA `F06`, การแปลงเกรด `F05`, การวิเคราะห์ CSV `F04`, การสร้าง PDF `F13`) ต้องเขียนไว้ใน `app/Services/`
4. **Strict Typing & Code Style:**
   * บังคับใส่ `declare(strict_types=1);` ที่บรรทัดแรกของไฟล์ PHP ทุกคลาส
   * กำหนด Type Hinting สำหรับ Parameters และ Return Type ในทุก Method อย่างเคร่งครัด
5. **Code Comments เป็นภาษาไทย:**
   * เพื่อให้น้องฝึกงานอ่านและทำความเข้าใจโค้ดได้ง่าย ให้เขียน DocBlock และ Comment อธิบายตรรกะที่ซับซ้อนเป็น **ภาษาไทย**

---

## 4. สถาปัตยกรรม Frontend (UI / Component Pattern)
ใช้รูปแบบ **Hybrid (Blade + Livewire + Alpine.js)** ร่วมกับ **Tailwind CSS v4**:

1. **Blade Template (โครงสร้างหลัก):**
   * ใช้ Blade ธรรมดาสำหรับ Layout หลัก, ส่วนหัว-ท้ายเว็บ, และหน้าจอทั่วไปที่มีเนื้อหานิ่ง (Static/Read-only)
2. **Livewire Components (จุดที่มีการส่งข้อมูลหาเซิร์ฟเวอร์):**
   * ใช้ Livewire เฉพาะจุดที่มีการโต้ตอบซับซ้อนกับ Server เช่น:
     * ตัวกรองค้นหานักศึกษาของผู้ประกอบการ (`F15`)
     * ฟอร์มส่งและอัปโหลดหลักฐานผลงาน (`F10`)
     * คิวงานตรวจหลักฐานของอาจารย์ (`F11`)
     * หน้าแสดงและ Preview ข้อมูลจากไฟล์ CSV (`F04`)
3. **Alpine.js (จัดการลูกเล่นหน้าบ้านเบาๆ):**
   * ใช้ Alpine.js สำหรับ UI Micro-interactions ฝั่ง Client-side ที่**ไม่ต้องส่งข้อมูลกลับไปหาเซิร์ฟเวอร์** (เพื่อลดภาระ Server ให้ได้มากที่สุด) เช่น:
     * การเปิด/ปิด Modal และ Drawer
     * การสลับแท็บแสดงผล (Tab Toggle)
     * Dropdown Menu
4. **Tailwind CSS Utility Classes:**
   * ใช้คลาสของ Tailwind CSS v4 ในการตกแต่งหน้าตา ห้ามเขียน Inline Style หรือเขียนแท็ก `<style>` แปลกปลอมในไฟล์ Blade
   * หน้าจอสำหรับนักศึกษาและบุคคลภายนอก ต้องออกแบบให้เป็น **Mobile Responsive 100%**

---

## 5. การควบคุม Dependencies (Package Policy)
> [!IMPORTANT]
> **ห้ามติดตั้ง Package เพิ่มเติมเองโดยพลการ**

* **ห้ามรันคำสั่ง:** `composer require ...` หรือ `npm install ...` เพื่อลง Library แปลกปลอมใหม่เองเด็ดขาด
* หากฟีเจอร์ใดจำเป็นต้องพึ่งพา Third-party Library (เช่น ไลบรารีสร้าง PDF หรือวาดกราฟ) ให้ AI เสนอทางเลือกพร้อมเหตุผล และหยุดรอเพื่อให้นักพัฒนาขออนุมัติจาก Tech Lead ก่อนเสมอ

---

## 6. มาตรฐานการทดสอบและส่งงาน (QA & Manual Testing)
* **ไม่ต้องเขียน Automated Test:** ในระยะนี้ยังไม่ต้องให้ AI เขียน Unit/Feature Test เพื่อประหยัดเวลาและป้องกันปัญหา Test Suite ขัดข้อง
* **เน้น Acceptance Criteria:** ตรวจสอบฟังก์ชันของระบบกับเกณฑ์ในเอกสาร `docs/SRS.md` ให้ครบถ้วน
* **บังคับแนบขั้นตอน Manual Test:** เมื่อทำงานเสร็จในแต่ละ Task AI ต้องสรุป **ขั้นตอนการทดสอบด้วยตนเอง (Manual Test Steps)** พร้อมผลลัพธ์ที่คาดหวัง (Expected Results) ให้น้องฝึกงานและ Tech Lead นำไปกดทดสอบบนหน้าเว็บได้ทันที
* **จัด Format โค้ด:** แนะนำให้รัน `./vendor/bin/pint` เพื่อจัดระเบียบโค้ดให้ถูกต้องตามมาตรฐาน PSR-12 เสมอ

---

## 7. กระบวนการทำงานบน Git (Git Workflow)
เพื่อป้องกันไม่ให้โค้ดของน้องทั้ง 2 คนชนกัน (Conflict) และช่วยให้ Tech Lead ตรวจสอบได้ง่าย:

1. **การตั้งชื่อ Branch:**
   * รูปแบบ: `feat/Fxx-คำอธิบายสั้น`
   * ตัวอย่าง: `feat/F10-evidence-upload-form`, `feat/F03-job-role-crud`
2. **Commit Messages (Conventional Commits ภาษาอังกฤษ):**
   * `feat(F10): create evidence upload form component`
   * `fix(F03): resolve skill level select dropdown bug`
3. **Pull Request (PR):**
   * ทุกครั้งที่สร้าง PR ต้องระบุ:
     * รหัส Feature และชื่อฟังก์ชัน
     * รายการไฟล์ที่เพิ่ม/แก้ไข
     * ขั้นตอนการทดสอบด้วยตัวเอง (Test Steps) ทีละสเต็ป
