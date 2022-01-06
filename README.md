## Blurry Vision extension

Small extension to blur sensitive data in admin panel (convenient when sharing screen during calls or during workshops).

Sometimes, when you want to show something on production server, it's always risky to show figures or customer data to someone.
This small extension allows you to define CSS selectors of data that should be blurred by default. 
You can always "unblur" it by pressing `B` key.

This extension doesn't protect sensitive data, it's just CSS filter applied, data can be easily accessed using devtools.

![img](https://github.com/adamkarnowka/magento2-blurry-vision/blob/master/view/adminhtml/web/images/dashboard-blurred.png)

### Installation

To install use:

```
composer require albedo/blurry-vision
```


### Testing

Execute:

```
vendor/bin/mftf run:test BlurredByDefaultTest --remove
```
