#  musical-octo-meme

# Requirements

For usage:
* PHP 7.0-x64
* Apache 2.4-x64
* MySQL 5.6-x64 

# Installation
The database configuration is in

```bash
  /assets/data/config.php
```

Database connection setiup `/assets/data/`

```bash
  /assets/data/musical-octo-meme.sql
```

Strict mode must be disabled in MySQL `sql_mode= ""`



# API

```http
  GET /todo/tasks
  GET /todo/tasks/${state}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `state`   | `string` | **Required** |

`state` can be like a `inwork` or `finished` and `0` or `1`


```http
  POST /todo/task
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `text`    | `string` | **Required** |
| `state`   | `number` | **Optional** |

`state` can be like a `inwork` or `finished` and `0` or `1`


```http
  GET /todo/task/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** |



```http
  PUT /todo/task/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** |
| `text`    | `string` | **Optional** |
| `state`   | `number` | **Optional** |


```http
  DELETE /todo/task/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `number` | **Required** |

