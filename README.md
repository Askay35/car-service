# API Documentation

## ⚠️ Важно: Перед использованием API

Перед началом работы с API необходимо выполнить миграции и заполнить базу данных тестовыми данными:

```bash
# Выполнить миграции
php artisan migrate

# Заполнить базу данных тестовыми данными
php artisan db:seed
```

Или выполнить обе команды одновременно:

```bash
php artisan migrate --seed
```

**Примечание:** Если вы используете Docker, выполните команды внутри контейнера:

```bash
docker exec test-backend php artisan migrate --seed
```

Без выполнения миграций и сидеров API не будет работать корректно, так как в базе данных не будет необходимых таблиц и данных (должности, категории комфорта, модели автомобилей, водители и т.д.).

---

## Base URL
```
http://localhost:8000/api
```

## Authentication

Все защищенные эндпоинты требуют Bearer токен в заголовке:
```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

## Public Endpoints

### POST /register

Регистрация нового пользователя.

**Request:**
```bash
curl -X POST "http://localhost:8000/api/register" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Иван Иванов",
    "email": "ivan@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "position_id": 1
  }'
```

**Response:**
```json
{
  "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
  "user": {
    "id": 1,
    "name": "Иван Иванов",
    "email": "ivan@example.com",
    "position": {
      "id": 1,
      "name": "Директор"
    }
  }
}
```

---

### POST /login

Авторизация пользователя.

**Request:**
```bash
curl -X POST "http://localhost:8000/api/login" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "email": "ivan@example.com",
    "password": "password123"
  }'
```

**Response:**
```json
{
  "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
  "user": {
    "id": 1,
    "name": "Иван Иванов",
    "email": "ivan@example.com",
    "position": {
      "id": 1,
      "name": "Директор"
    }
  }
}
```

---

## Protected Endpoints

### GET /user

Получение информации о текущем пользователе.

**Request:**
```bash
curl -X GET "http://localhost:8000/api/user" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
{
  "id": 1,
  "name": "Иван Иванов",
  "email": "ivan@example.com",
  "position": {
    "id": 1,
    "name": "Директор"
  }
}
```

---

### POST /logout

Выход из системы.

**Request:**
```bash
curl -X POST "http://localhost:8000/api/logout" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
{
  "message": "Logged out successfully"
}
```

---

### GET /positions

Получение списка всех должностей.

**Request:**
```bash
curl -X GET "http://localhost:8000/api/positions" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
[
  {
    "id": 1,
    "name": "Директор"
  },
  {
    "id": 2,
    "name": "Заместитель директора"
  },
  {
    "id": 3,
    "name": "Менеджер"
  }
]
```

---

### GET /comfort-categories

Получение списка уникальных уровней категорий комфорта.

**Request:**
```bash
curl -X GET "http://localhost:8000/api/comfort-categories" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
[
  {
    "id": 1,
    "name": "Первая категория",
    "level": 1
  },
  {
    "id": 2,
    "name": "Вторая категория",
    "level": 2
  },
  {
    "id": 3,
    "name": "Третья категория",
    "level": 3
  },
  {
    "id": 4,
    "name": "Четвертая категория",
    "level": 4
  }
]
```

---

### GET /car-models

Получение списка всех моделей автомобилей.

**Request:**
```bash
curl -X GET "http://localhost:8000/api/car-models" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
[
  {
    "id": 1,
    "brand": "Mercedes-Benz",
    "name": "S-Class",
    "comfort_category": {
      "id": 1,
      "name": "Первая категория",
      "level": 1
    }
  },
  {
    "id": 2,
    "brand": "BMW",
    "name": "7 Series",
    "comfort_category": {
      "id": 1,
      "name": "Первая категория",
      "level": 1
    }
  }
]
```

---

### GET /cars/available

Получение списка доступных автомобилей для текущего пользователя на указанный период времени.

**Query Parameters:**
- `start_time` (required) - Дата и время начала поездки (формат: `2026-01-20T10:00:00`)
- `end_time` (required) - Дата и время окончания поездки (формат: `2026-01-20T18:00:00`)
- `car_model_id` (optional) - Фильтр по ID модели автомобиля
- `comfort_category_id` (optional) - Фильтр по ID категории комфорта

**Request:**
```bash
curl -X GET "http://localhost:8000/api/cars/available?start_time=2026-01-20T10:00:00&end_time=2026-01-20T18:00:00" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Request с фильтрами:**
```bash
curl -X GET "http://localhost:8000/api/cars/available?start_time=2026-01-20T10:00:00&end_time=2026-01-20T18:00:00&car_model_id=1&comfort_category_id=2" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Accept: application/json"
```

**Response:**
```json
[
  {
    "id": 1,
    "license_plate": "А001АА777",
    "year": 2023,
    "color": "Черный",
    "model": {
      "id": 1,
      "brand": "Mercedes-Benz",
      "name": "S-Class"
    },
    "comfort_category": {
      "id": 1,
      "name": "Первая категория",
      "level": 1
    },
    "driver": {
      "id": 1,
      "full_name": "Иван Петров",
      "phone": "+7 (999) 111-22-33"
    }
  },
  {
    "id": 2,
    "license_plate": "В002ВВ777",
    "year": 2023,
    "color": "Белый",
    "model": {
      "id": 2,
      "brand": "BMW",
      "name": "7 Series"
    },
    "comfort_category": {
      "id": 1,
      "name": "Первая категория",
      "level": 1
    },
    "driver": {
      "id": 2,
      "full_name": "Петр Сидоров",
      "phone": "+7 (999) 222-33-44"
    }
  }
]
```

---

## Error Responses

### Validation Error (422)
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "The email field is required."
    ],
    "password": [
      "The password field is required."
    ]
  }
}
```

### Unauthorized (401)
```json
{
  "message": "Unauthenticated."
}
```

### Not Found (404)
```json
{
  "message": "Not Found."
}
```
