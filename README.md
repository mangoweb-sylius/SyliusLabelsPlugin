<p align="center">
    <a href="https://www.mangoweb.cz/en/" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/38423357?s=200&v=4"/>
    </a>
</p>

<h1 align="center">Labels plugin</h1>

## Installation

1. `composer require mangoweb-sylius/sylius-labels-plugin`
1. Add plugin classes to your `config/bundles.php`:
   ```php
   return [
      ...
      MangoSylius\LabelsPlugin\MangoSyliusLabelsPlugin::class => ['all' => true],
   ];
   ```
1. Add resource to `config/packages/_sylius.yaml`
    ```yaml
    imports:
         ...
         - { resource: "@MangoSyliusLabelsPlugin/Resources/config/resources.yml" }
    ```
1. Add routing to `config/_routes.yaml`
    ```yaml
    mango_sylius_extended_channels:
        resource: '@MangoSyliusLabelsPlugin/Resources/config/routing.yml'
        prefix: /admin
    ```
1. Override `Sylius/Bundle/AdminBundle/Resources/views/Order/Show/_header.html.twig` template and after the end of `<div class="sub header">` add: 
```
<div class="sub header">
    <div class="ui horizontal divided list">
        <div class="item">
            {% include "@MangoSyliusLabelsPlugin/Admin/Order/labels-select.html.twig"%}
        </div>
    </div>
</div>
```

1. Run `bin/console sylius:install:assets`
