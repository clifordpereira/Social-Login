## Requirement

- PHP v8.1+
- Facebook developer account. Kindly add these parameters in .env file  
  - FB_CLIENT_ID="your-fb-client-id"
  - FB_CLIENT_SECRET="your-fb-client-secret"
  - FB_REDIRECT="http://localhost:8000/auth/callback"


## Installation

- git clone https://github.com/clifordpereira/Social-Login.git

- composer install

- php artisan migrate

- php artisan serve

- npm run dev (keep running in another terminal)


## Application Steps

- visit http://localhost:8000

- Click 'Login with Facebook'. This will redirect to facebook login page.

- Enter your facebook mail-id and password. You will be redirected back and loged in to the current system.

- On the landing dashboard page, enter a stock symbol and click the button - 'Get Price'.

- The stock quotes that you queried so far will be listed.


## Main files Used

- resources\views\welcome.blade.php
- App\Http\Controllers\SocialLoginController

- resources\views\dashboard.blade.php
- App\Http\Controllers\StockQuoteController