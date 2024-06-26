# Storage Station Backend Task

API endpoint that provides the Shipping AWB list. Shipping AWB represented by the records of the AWB table.

## Features

- Filter AWB by one or more filter.
- Paginate the result.

## Requirements

- PHP >= 8.x
- MySQL >= 5.7
- Composer

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/salem-saber/storage-station-task.git
    ```

2. Go to the project directory:

    ```bash
    cd storage-station-task
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Set up your environment variables by copying the `.env.example` file:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Set up your database connection in the `.env` file:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```

7. Database migration and seeding:

    ```bash
    php artisan migrate --seed
    ```

8. Serve the application:

    ```bash
    php artisan serve
    ```
   
9. The API should now be accessible at `http://localhost:8000/api/shipping-awb`.

10. API Documentation can be found at `https://documenter.getpostman.com/view/4199586/2sA3drJaQZ`.

## Usage

### Endpoints

#### Retrieve a list of expenses with optional filter, sort and pagination

<details open>
 <summary><code>POST/GET</code> <code><b>/</b></code> <code>/api/shipping-awb</code></summary>

##### Body Parameters

> | name       | type     | data type   | description                                |
> |------------|----------|-------------|--------------------------------------------|
> | filters    | optional | object      | Filters to apply to the expenses list      |
> | pagination | optional | object      | Pagination options for the expenses list   |
>
> 
> 
> 
> 
> 
> ##### Pagination
> | name           | type     | data type   | description                                |
> |----------------|----------|-------------|--------------------------------------------|
> | current_page   | required | integer     | The current page number                    |
> | per_page       | required | integer     | The number of items per page               |
>


> ##### Example Body
> ```json
> {
>   "filters": [
>     {
>        "filter_name": "created_at_from",
>        "props": {
>          "operators": [">="]
>        },
>        "value": "2023-01-01"
>      },
>      {
>        "filter_name": "shipping_company",
>        "props": {
>          "operators": ["="]
>        },
>        "value": "Aramex"
>      },
>      {
>        "filter_name": "price",
>        "props": {
>          "operators": [">="]
>        },
>        "value": 100
>      }
>    ],
>   "pagination": {
>       "current_page": 1,
>       "per_page": 1
>   }
> }
> ```

##### Responses

> | http code | content-type       | response                                                                                       |
> |-----------|--------------------|------------------------------------------------------------------------------------------------|
> | `200`     | `application/json` | `{"data":{...},"errors":[],"message":"","status_code":200}`                                    |
> | `429`     | `application/json` | `{"data":null,"errors":["Too many requests"],"message":"Too many requests","status_code":429}` |
>
> ##### Example Success Response
> ```json
> {
>   "data": {
>       "tableName": "shipping_awbs",
>       "columns": [
>           {
>               "type": "text",
>               "label": "ID",
>               "name": null,
>               "sortable": true,
>               "data_src": "id",
>               "showable": false,
>               "minWidth": "50px",
>               "showInMobileApp": false,
>               "loadIf": true
>           },
>           {
>               "type": "text",
>               "label": "Name",
>               "name": null,
>               "sortable": true,
>               "data_src": "name",
>               "showable": true,
>               "minWidth": "50px",
>               "showInMobileApp": true,
>               "loadIf": true
>           }
>       ],
>       "filters": [
>           {
>               "type": "text",
>               "filter_name": "name",
>               "label": "Name",
>               "loadIf": true,
>               "props": {
>                   "operators": [
>                       "="
>                   ]
>               }
>           },
>           {
>               "type": "date",
>               "filter_name": "created_at_from",
>               "label": "Created Date From",
>               "loadIf": true,
>               "props": {
>                   "is_from": true,
>                   "operators": [
>                       ">="
>                   ]
>               }
>           },
>           {
>               "type": "date",
>               "filter_name": "created_at_to",
>               "label": "Created Date To",
>               "loadIf": true,
>               "props": {
>                   "is_from": false,
>                   "operators": [
>                       "<="
>                   ]
>               }
>           }
>       ],
>       "data": {
>           "items": [
>               {
>                   "id": 1,
>                   "created_date": "26/06/2024 09:33",
>                   "shipping_company": "adwar",
>                   "tracking_number": {
>                       "value": "/sawb-tracking/357021280663",
>                       "label": "357021280663"
>                   },
>                   "public_link": {
>                       "value": "!#",
>                       "label": null,
>                       "type": "copy_value"
>                   },
>                   "bill_link": null,
>                   "status_code": null,
>                   "cod_withdrawal_allowed": false,
>                   "is_paid": true,
>                   "is_delivered": true,
>                   "order_number": "7DQJZ1F",
>                   "payment_type": "cc",
>                   "shipment_direction": null,
>                   "price": "445.3",
>                   "pickup_id": null,
>                   "consignee_name": "Kenya Feeney",
>                   "consignee_phone": "+1 (640) 796-5999",
>                   "ext_integration": false,
>                   "integrated_store_id": null,
>                   "actions": {
>                       "show_details": {
>                           "action_key": "show_details",
>                           "action_type": "normal",
>                           "showInMobileApp": true,
>                           "showInWeb": true,
>                           "need_confirmation": false,
>                           "applicableAsBulkAction": false,
>                           "action": {
>                               "api": "/api/control-tables/row-table-action/shipping_awbs/show_details/1",
>                               "web": "/control-tables/row-table-action/shipping_awbs/show_details/1"
>                           },
>                           "button": {
>                               "label": "عرض",
>                               "btnClasses": [
>                                   "btn-opac-info"
>                               ]
>                           },
>                           "method": "post",
>                           "onSuccess": "DisplayOnModal",
>                           "payload_keys": [],
>                           "applicableForRow": "showDetailsBtn"
>                       },
>                       "update_track_status": {
>                           "action_key": "update_track_status",
>                           "action_type": "normal",
>                           "showInMobileApp": true,
>                           "showInWeb": true,
>                           "need_confirmation": false,
>                           "applicableAsBulkAction": true,
>                           "action": {
>                               "api": "/api/control-tables/row-table-action/shipping_awbs/update_track_status/1",
>                               "web": "/control-tables/row-table-action/shipping_awbs/update_track_status/1"
>                           },
>                           "button": {
>                               "label": "تحديث حالة الشحن",
>                               "btnClasses": [
>                                   "btn-opac-success"
>                               ]
>                           },
>                           "method": "post",
>                           "onSuccess": "refetchRow",
>                           "payload_keys": [],
>                           "applicableForRow": "showUpdateStatusBtn",
>                           "onBulkSuccess": "refetchData",
>                           "bulk_actions_url": {
>                               "api": "/api/control-tables/row-bulk-table-action/shipping_awbs/update_track_status",
>                               "web": "/control-tables/row-bulk-table-action/shipping_awbs/update_track_status"
>                           }
>                       }
>                   }
>               }
>           ],
>           "pagination": {
>               "total": 50,
>               "perPage": 1,
>               "currentPage": 1,
>               "lastPage": 50,
>               "from": 1,
>               "to": 1
>           }
>       }
>   },
>   "errors": [],
>   "message": "",
>   "status_code": 200
>
> ```
>
> ##### Example Failure Response
> ```json
> {
>   "data": null,
>   "errors": [
>     "Server Error"
>   ],
>   "message": "Server Error",
>   "status_code": 500
> }
> ```

##### Example cURL

> ```bash
> curl --location 'http://localhost:8000/api/shipping-awb' \
>    --header 'Content-Type: application/json' \
>    --data '{
>    "filters": [
>    {
>    "filter_name": "created_at_from",
>    "props": {
>>    },
>    "value": "2023-01-01"
>    },
>    "filter_name": "shipping_company",
>    "props": {
>    "operators": ["="]
>    },
>    "value": "Aramex"
>    },
>    {
>    "filter_name": "price",
>    "props": {
>    "operators": [">="]
>    },
>    "value": 100
>    }
>    ],
>    "pagination": {
>    "current_page": 1,
>    "per_page": 1
>    }
>    }'
> ```

</details>
