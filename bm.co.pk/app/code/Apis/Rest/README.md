# Mage2 Module Apis Rest

    ``apis/module-rest``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Tst

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Apis`
 - Enable the module by running `php bin/magento module:enable Dev_Rest`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require apis/module-rest`
 - enable the module by running `php bin/magento module:enable Dev_Rest`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - API Endpoint
	- GET - Apis\Rest\Api\GetDataManagementInterface > Apis\Rest\Model\GetDataManagement

 - API Endpoint
	- POST - Apis\Rest\Api\AddDataManagementInterface > Apis\Rest\Model\AddDataManagement

 - API Endpoint
	- PUT - Apis\Rest\Api\EditDataManagementInterface > Apis\Rest\Model\EditDataManagement

 - API Endpoint
	- DELETE - Apis\Rest\Api\DeleteDataManagementInterface > Apis\Rest\Model\DeleteDataManagement


## Attributes



