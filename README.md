# open-orchestra-newsletter-bundle

A Open Orchestra newsletter bundle

| Service       | Badge         |
| ------------- |:-------------:|
| Travis        | [![Build Status](https://travis-ci.org/open-orchestra/open-orchestra-newsletter-bundle.svg?branch=master)](https://travis-ci.org/open-orchestra/open-orchestra-newsletter-bundle) |
| CodeClimate (quality) | [![Code Climate](https://codeclimate.com/github/open-orchestra/open-orchestra-newsletter-bundle/badges/gpa.svg)](https://codeclimate.com/github/open-orchestra/open-orchestra-newsletter-bundle) |
| CodeClimate (coverage) | [![Test Coverage](https://codeclimate.com/github/open-orchestra/open-orchestra-newsletter-bundle/badges/coverage.svg)](https://codeclimate.com/github/open-orchestra/open-orchestra-newsletter-bundle/coverage) |
| Sension Insight | [![SensioLabsInsight](https://insight.sensiolabs.com/projects/539b9cae-9f32-4f08-bf60-463b7223888d/big.png)](https://insight.sensiolabs.com/projects/539b9cae-9f32-4f08-bf60-463b7223888d) |
| VersionEye | [![Dependency Status](https://www.versioneye.com/user/projects/55dae2728d9c4b001b00039d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55dae2728d9c4b001b00039d) |
| Latest Stable Version | [![Latest Stable Version](https://poser.pugx.org/open-orchestra/open-orchestra-newsletter-bundle/v/stable)](https://packagist.org/packages/open-orchestra/open-orchestra-newsletter-bundle) |
| Total Downloads | [![Total Downloads](https://poser.pugx.org/open-orchestra/open-orchestra-newsletter-bundle/downloads)](https://packagist.org/packages/open-orchestra/open-orchestra-newsletter-bundle) |

## Description

The `open-orchestra-newsletter-bundle` provide an easy way to manage a newsletter inside the Open Orchestra project.

It will provide you with :

 - A Front Office block
 - A Back Office integration
 - A way to store the data inside a Mongo database

## Usage

### Front Office

To use the bundle in a front environment, you will need to activate the bundle and the model :

```php
    // app/AppKernel.php
    new OpenOrchestra\NewsletterBundle\OpenOrchestraNewsletterBundle,
    new OpenOrchestra\NewsletterModelBundle\OpenOrchestraNewsletterModelBundle,
```

### Back Office

To use the bundle in a back envirenment, you will have to add the admin bundle :

```php
    // app/AppKernel.php
    new OpenOrchestra\NewsletterBundle\OpenOrchestraNewsletterBundle,
    new OpenOrchestra\NewsletterModelBundle\OpenOrchestraNewsletterModelBundle,
    new OpenOrchestra\NewsletterAdminBundle\OpenOrchestraNewsletterAdminBundle,
```

You will also have to import the route for the bundle :

```yaml
    #app/config/routing.yml
    open_orchestra_newsletter_api:
        resource: "@OpenOrchestraNewsletterAdminBundle/Controller/Api"
        type: annotation
        prefix: /api

    open_orchestra_newsletter_admin:
        resource: "@OpenOrchestraNewsletterAdminBundle/Controller/Admin"
        type: annotation
        prefix: /admin
```
