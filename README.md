# Ecommistry_ProductList
The module allows to list products on a single page which is only accessible by logged in users.

The module adds a new attribute(yes/no) to products. Admin can select "Yes" for any product to display it on a separate page.
Admin can limit to display number of products on the page.

The module will add a Link to "My Account" section on To Links in Magento header section.
If a Guest user will try to access the page by clicking on page link in top links, he will be redirected to login page with custom message.

Once user logs in using his login details, he will be redirected to Product list page.**

The page comes with two layouts.<br>
1. Grid<br>
2. Slider

Grid view displays products on a grid layout while Slider view shows the products in a carousel slider layout.

Admin Configuration Section

![ScreenShot](https://jsutariya.files.wordpress.com/2017/08/configuration.png?w=640)

Front page layout (Grid)

![ScreenShot](https://jsutariya.files.wordpress.com/2017/08/desktop-grid.png?w=800)

Front page layout (Slider)

![ScreenShot](https://jsutariya.files.wordpress.com/2017/08/desktop-slider.png?w=800)

Front page layout (Mobile)

![ScreenShot](https://jsutariya.files.wordpress.com/2017/08/mobile.png?w=300)

 **: To achieve this, please check below settings<br>
Go to System > Configuration > Customer Configuration > Login Options
Set "Redirect Customer to Account Dashboard after Logging in" to "No"
