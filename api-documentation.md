# Customers and Invoices API Documentation

This documentation provides details about the RESTful API that interacts with the Customers and Invoices tables.

## Introduction

The API serves as a tool to manage customer and invoice data. Below, you'll find crucial information about the API.

- **API Base URL**: `https://localhost/api/v1/`

## Authentication

To access the API, you must include an authentication token in the request header.

Authentication
Authentication is required to access the API. Include the following header with each request:
Authorization: Bearer <your_access_token>

There are 3 login tokens. Admin, update and basic token. Url <https://localhost/setup> must be used to get the tokens.
   Token entitlements are:

> Admin Token: Create, Update, Delete
> Update Token: Create, Update
> Basic Token: none

Customers
  Get Customer List (GET /customers):  This endpoint returns a list of all customers.
Parameters:
> -None.
Request:
> GET /api/v1/customers
Response:
        {
            "id": 1,
            "name": "Damian Marley",
            "type": "I",
            "email": "<dammy@patient.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "82221"
        },
        {
            "id": 2,
            "name": "Tracey Lowe",
            "type": "I",
            "email": "<audreanne89@beahan.com>",
            "address": "1582 Penelope Lake Suite 775",
            "city": "West Brian",
            "state": "Maine",
            "postalCode": "63033-3264"
        },
        {
            "id": 3,
            "name": "Boehm PLC",
            "type": "B",
            "email": "<linda28@dare.biz>",
            "address": "96753 Wellington Shoal Suite 687",
            "city": "East Frank",
            "state": "Mississippi",
            "postalCode": "91694-1698"
        },
        {
            "id": 4,
            "name": "Parker, Ebert and Treutel",
            "type": "B",
            "email": "<block.aisha@gmail.com>",
            "address": "3773 Witting Plains Suite 880",
            "city": "Altenwerthshire",
            "state": "Oklahoma",
            "postalCode": "65849"
        }
Get Customer Details (GET /customers/{id}): Retrieve details for the customer with the specified ID.
Parameters:
> id: Customer ID
Request
> GET api/v1/customers/1
Response
        {
            "id": 1,
            "name": "Damian Marley",
            "type": "I",
            "email": "<dammy@patient.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "82221"
        }

Invoices
Get Invoice List (GET /invoices): This endpoint returns a list of all invoices.

Parameters
> None.
Request
> GET api/v1/invoices
Response
"data": [
        {
            "id": 1,
            "customerId": 1,
            "status": "B",
            "amount": 4678,
            "billedDate": "2014-01-08 09:41:25",
            "paidDate": null
        },
        {
            "id": 2,
            "customerId": 1,
            "status": "B",
            "amount": 9413,
            "billedDate": "2021-04-05 19:03:02",
            "paidDate": null
        },
        {
            "id": 3,
            "customerId": 1,
            "status": "V",
            "amount": 5378,
            "billedDate": "2019-10-10 00:37:04",
            "paidDate": null
        }
]

Get Invoice Details (GET /invoices/{id}): Retrieve details for the invoice with the specified ID.
Parameters
> id: Invoice ID
Request
> GET /invoices/101

Response{
            "id": 101,
            "customerId": 1,
            "status": "V",
            "amount": 5378,
            "billedDate": "2019-10-10 00:37:04",
            "paidDate": null
        }

Get Customer Details With Invoices (GET /customers?includeInvoices=true): Retrieve details for the customers with them invoices.
Parameters
>includeInvoices=true
Request
>GET /customers/1?includeInvoices=true
Response
{
    "data": {
        "id": 1,
        "name": "Damian Marley",
        "type": "I",
        "email": "<dammy@patient.com>",
        "address": "54553 Will Street Apt. 920",
        "city": "Kingston",
        "state": "Jamaica",
        "postalCode": "82221",
        "invoices": [
            {
                "id": 1,
                "customerId": 1,
                "status": "B",
                "amount": 4678,
                "billedDate": "2014-01-08 09:41:25",
                "paidDate": null
            },
            {
                "id": 2,
                "customerId": 1,
                "status": "B",
                "amount": 9413,
                "billedDate": "2021-04-05 19:03:02",
                "paidDate": null
            },
            {
                "id": 3,
                "customerId": 1,
                "status": "V",
                "amount": 5378,
                "billedDate": "2019-10-10 00:37:04",
                "paidDate": null
            },
            {
                "id": 4,
                "customerId": 1,
                "status": "B",
                "amount": 15090,
                "billedDate": "2019-06-28 15:07:58",
                "paidDate": null
            },
            {
                "id": 5,
                "customerId": 1,
                "status": "V",
                "amount": 3710,
                "billedDate": "2016-12-30 12:13:34",
                "paidDate": null
            }
        ]
    }
}

# Filtering Data

=====================================================================================

Get Customers Filtered By Greater Than (GET /customers?postalCode[gt]=40000): Retrieve details for the customers filtered by postal code greater than 40.000.
Parameters:
> postalCode[gt]=40000
Request:
> /customers?postalCode[gt]=40000
Response:
        "data":
{
            "id": 1,
            "name": "Damian Marley",
            "type": "I",
            "email": "<dammy@patient.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "82221"
        },
{
            "id": 2,
            "name": "Tracey Lowe",
            "type": "I",
            "email": "<audreanne89@beahan.com>",
            "address": "1582 Penelope Lake Suite 775",
            "city": "West Brian",
            "state": "Maine",
            "postalCode": "63033-3264"
        },
{
            "id": 3,
            "name": "Boehm PLC",
            "type": "B",
            "email": "<linda28@dare.biz>",
            "address": "96753 Wellington Shoal Suite 687",
            "city": "East Frank",
            "state": "Mississippi",
            "postalCode": "91694-1698"
        }

Get Customers Filtered By Less Than (GET /customers?postalCode[lt]=40000): Retrieve details for the customers filtered by postal code less than 40.000.
Parameters:
> postalCode[lt]=40000
Request:
> /customers?postalCode[lt]=40000
Response:
        "data":[
{
            "id": 1,
            "name": "Damian Marley",
            "type": "I",
            "email": "<dammy@patient.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "38000"
        },
{
            "id": 2,
            "name": "Tracey Lowe",
            "type": "I",
            "email": "<audreanne89@beahan.com>",
            "address": "1582 Penelope Lake Suite 775",
            "city": "West Brian",
            "state": "Maine",
            "postalCode": "1000-3264"
        },
{
            "id": 3,
            "name": "Boehm PLC",
            "type": "B",
            "email": "<linda28@dare.biz>",
            "address": "96753 Wellington Shoal Suite 687",
            "city": "East Frank",
            "state": "Mississippi",
            "postalCode": "23000-1698"
        }]

Get Customers Filtered By Less Than (GET /customers?type[eq]=B): Retrieve details for the customers filtered by postal code less than 40.000.
Parameters:
> type[eq]=B
Request:
> /customers?type[eq]=B
Response:

        "data": [
{
            "id": 3,
            "name": "Boehm PLC",
            "type": "B",
            "email": "<linda28@dare.biz>",
            "address": "96753 Wellington Shoal Suite 687",
            "city": "East Frank",
            "state": "Mississippi",
            "postalCode": "91694-1698"
        },
{
            "id": 4,
            "name": "Parker, Ebert and Treutel",
            "type": "B",
            "email": "<block.aisha@gmail.com>",
            "address": "3773 Witting Plains Suite 880",
            "city": "Altenwerthshire",
            "state": "Oklahoma",
            "postalCode": "65849"
        },
{
            "id": 6,
            "name": "Tremblay-Schultz",
            "type": "B",
            "email": "<sango@pango.com>",
            "address": "126 Kadin Underpass Apt. 419",
            "city": "Danielmouth",
            "state": "Indiana",
            "postalCode": "77966-1017"
        }]

Get Invoices Filtered By Not Equal (GET /invoices?status[ne]=v): Retrieve details for the invoices filtered by status not equal to void.
Parameters:
> status[ne]=v
Request:
> /invoices?status[ne]=v
Response:
"data": [
        {
            "id": 1,
            "customerId": 1,
            "status": "B",
            "amount": 4678,
            "billedDate": "2014-01-08 09:41:25",
            "paidDate": null
        },
        {
            "id": 2,
            "customerId": 1,
            "status": "B",
            "amount": 9413,
            "billedDate": "2021-04-05 19:03:02",
            "paidDate": null
        },
        {
            "id": 4,
            "customerId": 1,
            "status": "B",
            "amount": 15090,
            "billedDate": "2019-06-28 15:07:58",
            "paidDate": null
        }]

Get Invoices Filtered By Less Than Or Equal (GET /invoices?amount[lte]=10000): Retrieve details for the invoices filtered by amount less than or equal to 10000.
Parameters:
> amount[lte]=10000
Request:
> /invoices?amount[lte]=10000
Response:
"data": [
        {
            "id": 1,
            "customerId": 1,
            "status": "B",
            "amount": 4678,
            "billedDate": "2014-01-08 09:41:25",
            "paidDate": null
        },
        {
            "id": 2,
            "customerId": 1,
            "status": "B",
            "amount": 9413,
            "billedDate": "2021-04-05 19:03:02",
            "paidDate": null
        }]

Get Invoices Filtered By Greater Than Or Equal (GET /invoices?amount[gte]=10000): Retrieve details for the invoices filtered by amount greater than or equal to 10000.
Parameters:
> amount[gte]=10000
Request:
> /invoices?amount[gte]=10000
Response:
"data": [
        {
            "id": 1,
            "customerId": 1,
            "status": "B",
            "amount": 10000,
            "billedDate": "2014-01-08 09:41:25",
            "paidDate": null
        },
{
            "id": 2,
            "customerId": 1,
            "status": "B",
            "amount": 23000,
            "billedDate": "2021-04-05 19:03:02",
            "paidDate": null
        }]

# Creating Data

======================================================================================

Create Customer (POST /api/v1/customers): This endpoint creates a new customer.

Parameters:
>none
Request:
>POST /customers
>content type application/json
{
            "name": "John Doe",
            "type": "I",
            "email": "<johndoe@nothing.com>",
            "address": "126 Kadin Underpass Apt. 419",
            "city": "Danielmouth",
            "state": "Indiana",
            "postalCode": "77966-1017"
        }
Response:
{
            "name": "John Doe",
            "type": "I",
            "email": "<johndoe@nothing.com>",
            "address": "126 Kadin Underpass Apt. 419",
            "city": "Danielmouth",
            "state": "Indiana",
            "postalCode": "77966-1017"
        }

Create Bulk Invoices (POST /api/v1/invoices/bulk): This endpoint creates a new bulk of invoices.

Parameters:
>none
Request:
>POST /invoices/bulk
>content type application/json
[{
    "customerId": 6,
    "status": "B",
    "amount": 120000,
    "billedDate": "2020-01-08 09:41:25",
    "paidDate": null
},{
    "customerId": 6,
    "status": "P",
    "amount": 1990,
    "billedDate": "2022-01-08 09:41:25",
    "paidDate": "2023-01-08 09:41:25"
},{
    "customerId": 4,
    "status": "B",
    "amount": 21343,
    "billedDate": "2019-01-08 09:41:25",
    "paidDate": null
}]
Response:
{
    "customerId": 6,
    "status": "B",
    "amount": 120000,
    "billedDate": "2020-01-08 09:41:25",
    "paidDate": null
},{
    "customerId": 6,
    "status": "P",
    "amount": 1990,
    "billedDate": "2022-01-08 09:41:25",
    "paidDate": "2023-01-08 09:41:25"
},{
    "customerId": 4,
    "status": "B",
    "amount": 21343,
    "billedDate": "2019-01-08 09:41:25",
    "paidDate": null
}

# Update Data

========================================================================================
Update Customer (PUT /customers/{id}): Update details for a specific customer using their ID.

Parameters:
id: Customer ID

Request:
PUT /customers/1
Content-Type: application/json
{
            "name": "Updated Name",
            "type": "I",
            "email": "<updated@email.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "82221"
        }

Response:
{
            "id": 1,
            "name": "Updated Name",
            "type": "I",
            "email": "<updated@email.com>",
            "address": "54553 Will Street Apt. 920",
            "city": "Kingston",
            "state": "Jamaica",
            "postalCode": "82221"
        }

Errors: The API may return the following status codes for errors:
> 400 Bad Request: The request is invalid or missing required parameters.
> 401 Unauthorized: Authentication failed.
> 404 Not Found: The resource was not found.
> 500 Internal Server Error: Server error occurred.

Contact
For questions or feedback, please send an email to <support@example.com>.
