# Wordpress Starter
Starter repo for WordPress projects. 

## Installation
1. Download and install a fresh version of WordPress. 
    - Recommended to use Laravel Valet
2. Replace `wp-content` with this repository
3. Under `themes/sage` run:
    - `composer install`
    - `yarn build`
4. Proceed to migration for the first time.

## Migration

Migrate production to your local by running `./migrate.sh`

Make sure migrate.sh is executable: `chmod +x migrate.sh`

## Deployment

Push to #master branch. This will auto-deploy to stage for QA. After QA, you may manually run the production pipeline (also from #master) in Buddy.
