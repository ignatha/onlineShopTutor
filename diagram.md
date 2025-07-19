```mermaid
erDiagram

  users {
    BIGINT id PK
    STRING name
    STRING email
    STRING password
    TEXT address
    STRING phone
  }

  categories {
    BIGINT id PK
    STRING name
    STRING slug
  }

  products {
    BIGINT id PK
    BIGINT category_id FK
    STRING name
    STRING slug
    TEXT description
    DECIMAL price
    INT stock
    STRING image
  }

  carts {
    BIGINT id PK
    BIGINT user_id FK
    BIGINT product_id FK
    INT quantity
  }

  checkouts {
    BIGINT id PK
    BIGINT user_id FK
    DECIMAL total_price
    ENUM status
    STRING payment_method
    TEXT shipping_address
  }

  product_checkout {
    BIGINT id PK
    BIGINT checkout_id FK
    BIGINT product_id FK
    INT quantity
    DECIMAL price
    DECIMAL subtotal
  }

  users ||--o{ carts : has
  users ||--o{ checkouts : makes

  categories ||--o{ products : has

  products ||--o{ carts : included_in
  products ||--o{ product_checkout : part_of

  checkouts ||--o{ product_checkout : contains
```
