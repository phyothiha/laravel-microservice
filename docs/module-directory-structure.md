## Module Directory
- Inventory/
- Order/
- Payment/
- Shipping/

## Module Layer Architecture
- Module
  - Application/
  - Contracts/
  - Domain/
  - Infrastructure/
  - Providers/
  - Tests/
  - routes.php

## Application Layer Architecture
- Application/
  - Http/
    - Controllers/
    - Middleware/
    - Requests/
    - Resources/
  - Policies/

## Domain Layer Architecture
- Domain/
  - Events/
  - Exceptions/
  - Jobs/
  - Listeners/
  - Models/
  - Rules/
  - Services/
  
## Infrastructure Layer Architecture (Persistence)
- Infrastructure/
  - Database/
    - Factories/
    - Migrations/
    - Seeders/
  - Repositories/
  - Services/ (to call external API)

## Providers Layer Architecture 
- AuthServiceProvider.php
- EventServiceProvider.php
- OrderServiceProvider.php
