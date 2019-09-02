# Themes

Wave has full theme support, which means you can separate your views into separate themes. This will make it easier to create new versions of your site and revert back if needed.

In this section we will only cover how to activate themes and where they are located. For full theme configuration options and to learn how to create your own theme be sure to visit [Themes Basic Concepts](/docs/{{version}}/basic-concepts/themes).

- [Activating Themes](#activate-themes)
- [Theme Options](#theme-options)
- [Theme Location](#theme-location)

---

<a name="activate-themes"></a>
### Activating Themes

If you visit the `/admin/themes` section of your application you’ll see the current themes available in your app.

![](/wave/img/docs/1.0/admin-themes-1.png)

To activate a Theme you can simply click the Activate button for the current theme you would like to activate, and that will be the current active theme.

<a name="theme-options"></a>
### Theme Options

Every theme has options that you can change and configure. If you click on the Theme Options button:

![](/wave/img/docs/1.0/admin-themes-2.png)

You will see the Theme options in front of you. 

![](/wave/img/docs/1.0/admin-themes-3.png)

We will dig into how you can create your own theme options in the Theme Basic Concepts section. 

<a name="theme-location"></a>
### Theme folder location

Every theme is located inside of the `resources/views/themes` folder. You will see there are currently 2 folders which include `bootstrap` and the `uikit` theme folders.
