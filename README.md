# Wordpress Child Theme Generator

Generates a modern Wordpress child theme in one minute! This package
 allows you to generate a Wordpress child theme packed with the perfect setup
 to get started right away developing. 
 
 ## Features
 Simply using the grunt watch command you get:
  * Localization.
  * SCSS compilation.
  * JavaScript Minification.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Give examples
```

### Installing

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## How it works

### Localization
The theme's language file is located within the **languages** 
sub-directory and it's named after the **Text Domain** defined
in **style.scss**, which is usually, by convention, follows the
name of the theme. So for example, for child theme of "twentyfifteen"
you would get a **languages/twentyfifteen-child.pot**. However,
you can change the name within in Text Domain to whatever
you want.

### SCSS
You receive a **style.scss** which resides at the theme's top level directory.
Using grunt sass it's compiled to style.css which is required by
the Wordpress system and by the grunt-wp-i18n package as well.

You will also find a **css** directory with an **src** sub directory.
Inside src, you can add **scss** files that are later compiled to .css
files under the css directory. However, if you don't want them to compile
just create a different directory under css and add them there.

### JavaScript
All files inside **js/src** are concatenated into build.js and minified to
build.min.js.

### Composer support
This package was created with Composer in mind. This means no
Grunt automation is excluded completely from the **vendor** 
directory.

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
