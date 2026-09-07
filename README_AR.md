# Laravel Digital Menu

مشروع مفتوح المصدر لبناء **منيو رقمي للمقاهي والمطاعم** باستخدام Laravel 12، من تطوير **Aya Aljaidi**.

> المشروع مستقل ومخصص للعرض والتعليم والمساهمة المفتوحة، ولا يحتوي على بيانات عميل أو كلمات مرور أو صور أو Branding خاص بأي مشروع تجاري.

## المميزات

- Laravel 12 وPHP 8.2+
- عربي وإنجليزي ودعم RTL/LTR
- أكثر من فرع
- التحكم في توفر المنتج حسب الفرع
- دعم سعر مختلف حسب الفرع في تصميم قاعدة البيانات
- أقسام ومنتجات
- QR لكل فرع
- تسجيل دخول للوحة الإدارة
- CRUD للفروع والأقسام والمنتجات
- بيانات Demo عامة وآمنة
- Feature Tests باستخدام PHPUnit
- GitHub Actions CI
- ترخيص MIT

## التشغيل

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

لإنشاء مستخدم Admin تجريبي ضعي القيم في `.env` محلياً فقط:

```dotenv
SEED_ADMIN_NAME="Demo Admin"
SEED_ADMIN_EMAIL=admin@example.test
SEED_ADMIN_PASSWORD=change-this-locally
```

ثم:

```bash
php artisan db:seed
```

## الاختبارات

```bash
php artisan test
```

## الهدف

المشروع Portfolio + Open Source Starter يوضح بناء Laravel حقيقي فيه علاقات Eloquent، Route Model Binding، Authentication، Localization، Pivot business logic، Migrations، Seeders، Tests وCI.

## المطورة

**Aya Aljaidi** — Laravel / Full-Stack Developer — Tripoli, Libya  
GitHub: [@ayagaidi](https://github.com/ayagaidi)
