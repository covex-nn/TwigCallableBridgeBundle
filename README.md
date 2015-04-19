Twig Callable Bridge Bundle
===========================

[![Build Status](https://travis-ci.org/covex-nn/TwigCallableBridgeBundle.svg)](https://travis-ci.org/covex-nn/TwigCallableBridgeBundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/82ede336-9fbe-4cd9-b7ac-2e595162750c/mini.png)](https://insight.sensiolabs.com/projects/82ede336-9fbe-4cd9-b7ac-2e595162750c)

This Symfony2 bundle aims to provide a simple interface to extend Twig with PHP functions

Installation
------------

Add requirements to composer.json:

``` json
{
  "require" : {
    "covex-nn/twig-callable-bridge-bundle" : "~1.0"
  }
}
```

Register the bundle
-------------------

Register the bundle in the `AppKernel.php` file

``` php
// ...other bundles ...
$bundles[] = new Covex\TwigCallableBridgeBundle\CovexTwigCallableBridgeBundle();
```

Configuration
-------------

Add the configuration to `config.yml`

``` yaml
covex_twig_callable_bridge:
    functions:
        uppercase: strtoupper
    filters:
        lowercase: strtolower
    test:
        numeric: is_numeric
```

Twig
----

Use your functions, filters and test in Twig templates:

``` twig
{{ uppercase('qqq') }}
{{ 'WoW'|lowercase }}
{% if 1 is numeric %}yes{% else %}no{% endif %}
```
