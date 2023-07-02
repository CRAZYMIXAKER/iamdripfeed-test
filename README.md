# Backend/Full-stack recruitment task

----

### 📋   Requirements

- PHP server (>= 8.0)
  Really, that's all you need 🙂


### ⚙️File structure

```
│   index.php
├───assets
│   ├───css
│   │       styles.css
│   └───js
│           script.js
├───dataset
│       users.json
└───partials
        main.php
```

- Your entry file for PHP is `main.php` - feel free to organize other PHP files just the way you like it
- Your datasource is `users.json` file - all changes (see points 2 and 3) have to be saved
- For scripts and styles, use the `styles.scss` and `script.js` files - those are not necessary, but we will highly appreciate it



### 💻   Your task

The recruitment task consists of 3 steps

1️⃣ Create a simple table which lists the users from `users.json` file

| Name             | Username  | Email              | Address                                     | Phone                 | Company            |
| ---------------- | --------- | ------------------ | ------------------------------------------- | --------------------- | ------------------ |
| Leanne Graham    | Bret      | Sincere@april.biz  | Kulas Light, 92998-3874 Gwenborough         | 1-770-736-8031 x56442 | Romaguera-Crona    |
| Ervin Howell     | Antonette | Shanna@melissa.ts  | Victor Plains, 90566-7771 Wisokyburgh       | 010-692-6593 x09125   | Deckow-Crist       |
| Clementine Bauch | Samantha  | Nathan@yesenia.ner | Douglas Extension, 59590-4157 McKenziehaven | 1-463-123-4447        | Romaguera-Jacobson |

2️⃣ Add a "Remove" button for each row, once clicked - the selected user should be removed from the JSON file, the page should be reloaded after the button is clicked.

| Name             | Username  | Email              | Address                                     | Phone                 | Company            |                   |
| ---------------- | --------- | ------------------ | ------------------------------------------- | --------------------- | ------------------ | ----------------- |
| Leanne Graham    | Bret      | Sincere@april.biz  | Kulas Light, 92998-3874 Gwenborough         | 1-770-736-8031 x56442 | Romaguera-Crona    | **REMOVE BUTTON** |
| Ervin Howell     | Antonette | Shanna@melissa.ts  | Victor Plains, 90566-7771 Wisokyburgh       | 010-692-6593 x09125   | Deckow-Crist       | **REMOVE BUTTON** |
| Clementine Bauch | Samantha  | Nathan@yesenia.ner | Douglas Extension, 59590-4157 McKenziehaven | 1-463-123-4447        | Romaguera-Jacobson | **REMOVE BUTTON** |

3️⃣ Add a simple form for adding a new user to the JSON file.

| Name             | Username  | Email              | Address                                     | Phone                 | Company            |                   |
| ---------------- | --------- | ------------------ | ------------------------------------------- | --------------------- | ------------------ | ----------------- |
| Leanne Graham    | Bret      | Sincere@april.biz  | Kulas Light, 92998-3874 Gwenborough         | 1-770-736-8031 x56442 | Romaguera-Crona    | **REMOVE BUTTON** |
| Ervin Howell     | Antonette | Shanna@melissa.ts  | Victor Plains, 90566-7771 Wisokyburgh       | 010-692-6593 x09125   | Deckow-Crist       | **REMOVE BUTTON** |
| Clementine Bauch | Samantha  | Nathan@yesenia.ner | Douglas Extension, 59590-4157 McKenziehaven | 1-463-123-4447        | Romaguera-Jacobson | **REMOVE BUTTON** |

**Name input** | **Username input** | **Email input** | **Address input** | **Phone Input**	| **Company Input** | **SUBMIT BUTTON**

---


# Commands

## Start project

```
docker-compose up -d --build && 
docker exec iamdripfeed-test_php_1 composer dump-autoload
```

## Stop project

```
docker-compose down
```