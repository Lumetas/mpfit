# Установка и использование Laravel-проекта

## Установка

1. **Клонирование репозитория**
   ```sh
   git clone https://github.com/lumetas/mpfit.git
   cd mpfit
   ```

2. **Установка зависимостей**
   ```sh
   composer install
   ```

3. **Создание файла окружения**
   ```sh
   cp .env.example .env
   ```
   Отредактируйте `.env` файл, указав настройки базы данных и другие параметры.

4. **Генерация ключа приложения**
   ```sh
   php artisan key:generate
   ```

5. **Настройка базы данных**
   ```sh
   php artisan migrate --seed
   ```
   Это создаст таблицы и заполнит их начальными данными.

### Управление заказами
- Перейдите в каталог товаров, выберите товар и оформите заказ.
- Список заказов доступен в соответствующем разделе.
- В детальной информации о заказе можно обновить его статус.