# Task Mangment

This API allows for managing tasks, including creating, retrieving, updating, and deleting tasks. Below is a summary of the features and how to use the endpoints.

## Installation
Instructions for setting up your project locally.

## Prerequisites

- PHP >= 8.x
- Composer
- MySQL

Use the package manager [Composer](https://getcomposer.org/) to install project dependencies.
# Steps to Install
- Clone the Repository: Clone the repository to your local machine using Git
```bash
git clone https://github.com/mohamedswelam1/skyloov.git
```

```bash
composer install
```

```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
```bash
php artisan migrate --seed
```
```bash
php artisan serve
```


## API Documentation

### Tasks
### **1. Update Task**
- **Description**: Updates a task's details using query parameters.
- **Method**: `PUT`
- **URL**: `/api/tasks`
- **Query Parameters**:
  - `id` (required): The ID of the task to update.
  - `title` (optional): The new title for the task.
  - `description` (optional): The new description for the task.
  - `status` (optional): The new status for the task.
  - `due_date` (optional): The new due date for the task.
- **Example**
PUT /api/tasks?id=1&title=Updated+Title&status=in_progress
- **Response**:

```json
{
    "status": "success",
    "message": "Task updated successfully.",
    "data": {
        "id": 22,
        "title": "newTitle",
        "description": "Ipsa accusantium omnis architecto praesentium saepe nemo. Pariatur dolorum accusantium enim sit voluptatem.",
        "status": "completed",
        "due_date": "2024-12-08",
        "created_at": "2024-11-22 20:10:38",
        "updated_at": "2024-11-22 20:21:58"
    }
}
```

- **GET /api/tasks**
### **2. Retrieve Tasks (Index)**
- **Description**: Retrieves a list of tasks, optionally filtered by query parameters.
- **Method**: `GET`
- **URL**: `/api/tasks`
- **Query Parameters** (optional):
  - `status` (optional): Filter tasks by status.
  - `title` (optional): Filter tasks by title (partial match).
  - `due_date` (optional): Filter tasks by due date.
  - `per_page` (optional): Number of tasks per page (pagination).
  - `page` (optional): The page number (pagination).
- **Example**:
GET /api/tasks?status=completed&title=Task&due_date=2024-11-22&page=1&per_page=10


    - **Response:** 

      ```json
       "status": "success",
       "message": "Tasks retrieved successfully.",
       "data": [
           {
            "id": 10,
            "title": "Task",
            "description": "Quo optio perferendis quo aut. Deleniti est recusandae totam non. 
            Incidunt debitis dolore impedit quidem. Necessitatibus doloribus quia facilis laboriosam.",
            "status": "completed",
            "due_date": "2024-12-10",
            "created_at": "2024-11-22 20:10:38",
            "updated_at": "2024-11-22 20:10:38"
           },
                ],
        "pagination": {
                        "total": 50,
                        "current_page": 1,
                        "per_page": 10,
                        "last_page": 4
                       }
          }
      ```

- **POST /api/products**
    - **Description:** Create a new task.
    - **Request Body:**
      ```json
      {
        "name": "Product Name",
        "price": 100,
        "description":"description info",
        "quantity": 50
      }
      ```
    - **Response:** 
       ```json
        {
           "status": "success",
           "message": "Task created successfully.",
           "data": {
                     "id": 51,
                     "title": "Finish the report",
                     "description": "Complete the final version of the quarterly report.",
                     "status": "pending",
                     "due_date": "2024-12-31",
                     "created_at": "2024-11-22 17:15:11",
                     "updated_at": "2024-11-22 17:15:11"
                    }
         }


## Testing

- To run the tests, use the command:
```bash
php artisan test
```